<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct(){


		parent::__construct();

		if (!$this->session->userdata('role_id')) {
			redirect('auth');
		}
	}

		public function index(){
		$data['cafe'] = $this->db->query("SELECT COUNT(id_cafe) as jumlah_cafe from cafe where id_cafe = 2")->row_array();
		$data['pengajuan'] = $this->db->query("SELECT COUNT(id_cafe) as jumlah_pengajuan from cafe where id_cafe != 2")->row_array();
		$data['menu'] = $this->db->query("SELECT count(id_menu) as jumlah_menu from menu where id_cafe != 1")->row_array();
		$data['kecamatan'] = $this->db->query("SELECT count(id_kecamatan) as jumlah_kecamatan from kecamatan")->row_array();
		$data['kelurahan'] = $this->db->query("SELECT count(id_kelurahan) as jumlah_kelurahan from kelurahan")->row_array();
		$data['side'] = 'home';
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/template/footer');
	}

	public function kelolaPengajuan(){
		$data['side'] = 'pengajuan';
		$data['pengajuan'] = $this->db->query("SELECT * FROM cafe c join kelurahan k on k.id_kelurahan = c.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan where c.status != 2")->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/pengajuan');
		$this->load->view('admin/template/footer');
	}
	public function kelolaCafe(){
		$data['side'] = 'Cafe';
		$data['kelola'] = $this->db->query("SELECT * FROM cafe c join kelurahan k on k.id_kelurahan = c.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan where c.status != 1")->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/kelolaCafe');
		$this->load->view('admin/template/footer');
	}

	public function detailCafe($id_cafe){
		$data['side'] = 'detailCafe';
		$data['menu'] = $this->db->query("SELECT count(id_menu) as jumlah_menu from menu where id_cafe = $id_cafe")->row_array();
		$data['kelola'] = $this->db->query("SELECT * FROM cafe c join kelurahan k on k.id_kelurahan = c.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan where c.id_cafe = '$id_cafe'")->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/detailCafe');
		$this->load->view('admin/template/footer');
	}
	
	public function pengajuanDetail($id_cafe){
		$data['side'] = 'pengajuan';
		$data['cafe'] = $this->db->query("SELECT * FROM cafe s join kelurahan k on k.id_kelurahan = s.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan where s.id_cafe = '$id_cafe'")->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/pengajuanDetail');
		$this->load->view('admin/template/footer');
	}

	public function sendEmail($id_cafe,$konf){

		$query = $this->db->query("SELECT email_pemilik,id_otomatis FROM cafe where id_cafe = $id_cafe")->row_array();
		$token = base64_encode(random_bytes(29));
		$user_token = [
			'email' => $query['email_pemilik'],
			'token' => $token,
			'date_created' => time()
		];
		$this->db->insert('user_token', $user_token);
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'oa.corp101@gmail.com',
			'smtp_pass' => 'somepassword',
			'smtp_port' =>  465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('oa.corp101@gmail.com', 'Coffe shop kabupaten Batang');
		$this->email->to($query['email_pemilik']);

		// verifikasi token
		$this->email->subject('Pengajuan Coffe shop kabupaten Batang');

		if($konf == 'tolak'){
			$this->email->message('pengajuan cafe anda <p style="font-size:17px; font-weight:bold">Ditolak</p> berkas yang di kirimkan tidak valid');
		}else{
			$this->email->message('pengajuan anda telah disetujui gunakan <p style="font-size:17px; font-weight:bold"> '.$query['id_otomatis'].' </p> sebagai password login, segera ganti password anda untuk menjaga keamanan,  Klik tombol aktivasi dibawah ini untuk verifikasi akun cafe anda : <br />
				<div style="border-radius: 50px;font-size: 14px;color: #fff;text-transform: capitalize;background-size: 200% auto;border: 1px solid transparent;box-shadow: 0px 12px 20px 0px rgba(255, 126, 95, 0.15);">
				<a href="' . base_url() . 'auth/verify?email=' . $query['email_pemilik'] . '&token=' . urlencode($token) . '">Aktivasi</a></div>');
		}

		if ($this->email->send()) {
			if($konf == 'tolak'){
				$queryUpdate = $this->db->query("UPDATE cafe set status = 4 where id_cafe= $id_cafe");
			}else{
				$queryUpdate = $this->db->query("UPDATE cafe set status = 3 where id_cafe= $id_cafe");
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">berhasil dikonfirmasi status cafe</div>');
			redirect('dashboard/kelolaPengajuan');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">konfirmasi gagal ulangi lagi</div>');
			redirect('dashboard/kelolaPengajuan');
		}
	}

	public function hapusPengajuan($id_cafe){
		$query = $this->db->query("SELECT * FROM cafe where id_cafe = $id_cafe")->row_array();

		$fotoKtp = $query['ktp'];
		$foto = $query['foto'];
		unlink(FCPATH . 'upload/cafe/'.$foto);
		unlink(FCPATH . 'upload/cafe/'.$fotoKtp);

		$queryHapus = $this->db->query("DELETE from cafe where id_cafe = $id_cafe");

		if($query){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Pengajuan Berhasil Dihapus</div>');
			redirect('dashboard/kelolaPengajuan');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">pengajuan gagal dihapus</div>');
			redirect('dashboard/kelolaPengajuan');
		}
	}

	public function ubahPassword(){

		$data['side'] = 'password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header',$data);
			$this->load->view('admin/template/ubahPassword');
			$this->load->view('admin/template/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah! </div>');
				redirect('user/changepassword');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru harus berbeda dengan password lama! </div>');
					redirect('dashboard/ubahPassword');
				} else {
                    // password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);


					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti! </div>');
					redirect('dashboard/ubahPassword');
				}
			}
		}
	}
}