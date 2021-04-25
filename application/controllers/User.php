<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['nav'] ='home';
	
        $this->load->view('user/template/header', $data);
		$this->load->view('user/home', $data);
        $this->load->view('user/template/footer');
	}
	public function pengajuan()
	{
		$data['nav'] ='Pengajuan';
        $this->load->view('user/template/header', $data);
		$this->load->view('user/pengajuan');
        $this->load->view('user/template/footer');
	}
	public function form_pengajuan()
	{
		$que = $this->db->query("SELECT id_cafe from cafe order by id_cafe desc limit 1");

		if($que->num_rows() > 0){
			$dt = $que->row_array();
			$kode=intval($dt['id_cafe'])+1;
		}else{
			$kode = 1;
		}

		$kode_max = str_pad($kode,6,"0",STR_PAD_LEFT);
		$kode_jadi = "cafe-".$kode_max;

		$data['kode'] = $kode_jadi;

		$data['kecamatan'] = $this->db->query("SELECT * FROM kecamatan")->result();

		$data['nav'] ='Form Pengajuan';
        $this->load->view('user/template/header', $data);
		$this->load->view('user/form_pengajuan');
        $this->load->view('user/template/footer');
	}

	public function insertPengajuan(){
		if(!empty($_FILES['ktp']['name'])& !empty($_FILES['foto']['name'])){

			$email = $this->input->post('email');

			$id_otomatis = $this->input->post('password');
			$nik = $this->input->post('nik');

			$queryEmail = $this->db->query("SELECT * FROM cafe WHERE email_pemilik = '$email'")->num_rows();
			$queryNik = $this->db->query("SELECT * FROM cafe WHERE nik = '$nik'")->num_rows();

			if($queryEmail > 0){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">email sudah terdaftar</div>');
				header('location:'.base_url().'user/form_pengajuan');
			}else{
				if($queryNik > 0){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nik sudah terdaftar</div>');
					header('location:'.base_url().'user/form_pengajuan');
				}else{
						$config['upload_path'] = 'upload/cafe';
            //restrict uploads to this mime types
					$config['allowed_types'] = 'jpg|jpeg|png|mp3|pdf|docx';
					$config['max_size'] = 999999999;
					$config['file_name1'] = $_FILES['ktp']['name'];
					$config['file_name3'] = $_FILES['foto']['name'];


            //Load upload library and initialize configuration
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					$this->upload->do_upload('ktp');
					$uploadKtp = $this->upload->data();
					$fileKtp = $uploadKtp['file_name'];

					$this->upload->do_upload('foto');
					$uploadFoto = $this->upload->data();
					$fileFoto = $uploadFoto['file_name'];

					$this->upload->do_upload('foto_ketua');
					$uploadFotoKetua = $this->upload->data();
					$fileFotoKetua = $uploadFotoKetua['file_name'];


					$this->upload->do_upload('berkas');
					$uploadBerkas = $this->upload->data();
					$fileBerkas = $uploadBerkas['file_name'];
					$data = [
						'nama_pemilik' => $this->input->post('nama_pemilik'),
						'nama_cafe' => $this->input->post('nama_cafe'),
						'nik' => $this->input->post('nik'),
						'id_otomatis' => $this->input->post('password'),
						'email_pemilik' => $this->input->post('email'),
						'id_kelurahan' => $this->input->post('kelurahan'),
						'longitude' => $this->input->post('longitude'),
						'latitude' => $this->input->post('latitude'),
						'ktp' => $fileKtp,
						'deskripsi' => $this->input->post('deskripsi'),
						'status' => 1,
						'foto' => $fileFoto,
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					];
					$query = $this->db->insert('cafe', $data);
					if ($query) {

						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil diajukan</div>');
						header('location:'.base_url().'user/pengajuan/');
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">file harus gambar</div>');
						header('location:'.base_url().'user/form_pengajuan');

					}
				}
				
			}
		}
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">file harus diisi</div>');
			header('location:'.base_url().'user/form_pengajuan');
		}

	}
	public function list_cafe()
	{
		$data['cafe'] = $this->db->query("SELECT * FROM cafe c join kelurahan k on k.id_kelurahan = c.id_kelurahan join kecamatan kc on kc.id_kecamatan = k.id_kecamatan where c.status = 2")->result();
		$data['nav'] ='List Cafe';
        $this->load->view('user/template/header', $data);
		$this->load->view('user/list_cafe');
        $this->load->view('user/template/footer');
	}
		public function detail_menu()
	{
        $this->load->view('user/template/header');
		$this->load->view('user/detail_menu');
        $this->load->view('user/template/footer');
	}
		public function menu()
	{
		$data['nav'] ='Menu';
		$data['menu'] = $this->db->query("SELECT * FROM menu")->result();
        $this->load->view('user/template/header', $data);
		$this->load->view('user/menu');
        $this->load->view('user/template/footer');
	}

	public function getKelurahan(){
		$id_kec = $this->input->post('kecamatan_id');
		$output ='';
		if($id_kec){
			$data = $this->db->query("SELECT * FROM kelurahan where id_kecamatan = $id_kec")->result();

			foreach ($data as $dt) {

				$nama_kelurahan= $dt->nama_kelurahan;
				$id_kelurahan = $dt->id_kelurahan;

				$output .=' <option style="background-color: #000 !important;" value="'.$id_kelurahan.'">'.$nama_kelurahan.'</option>';
			}
			
			echo json_encode($output);
		}
	}
	
}
