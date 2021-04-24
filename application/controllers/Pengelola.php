<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelola extends CI_Controller {


	public function __construct(){


		parent::__construct();
		if (!$this->session->userdata('nama_cafe')) {
			redirect('auth');
		}
		$this->load->library('form_validation');

	}
	public function index(){
		$id_cafe = $this->session->userdata("id_cafe");
		$data['side'] = 'home';
		// $data['kegiatan'] = $this->db->query("SELECT COUNT(id_kegiatan) as jumlah_kegiatan from kegiatan where id_cafe = $id_cafe")->row_array();

		// $data['komentar'] = $this->db->query("SELECT COUNT(id_komentar) as jumlah_komentar from cafe s join kegiatan k on k.id_cafe = s.id_cafe join komentar ko on k.id_kegiatan = ko.id_kegiatan where s.id_cafe = $id_cafe")->row_array();
		$this->load->view('admin/template/header',$data);
		$this->load->view('pemilik/dashboard');
		$this->load->view('admin/template/footer');
	}

	public function kelolaCafe(){
		$id_cafe = $this->session->userdata('id_cafe');
		$data['cafe'] = $this->db->query("SELECT * FROM cafe s join kelurahan k on s.id_kelurahan = k.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan WHERE s.id_cafe = '$id_cafe'")->row_array();
		$data['side'] = 'kelola';
		$this->load->view('admin/template/header',$data);
		$this->load->view('pemilik/kelolaCafe',$data);
		$this->load->view('admin/template/footer');
	}

	public function editcafe(){
		$id_cafe = $this->session->userdata('id_cafe');
		$nama_cafe = $this->input->post('nama_cafe');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$deskripsi = $this->input->post('deskripsi');

		$query = $this->db->query("UPDATE cafe set nama_cafe = '$nama_cafe',nama_pemilik = '$nama_pemilik',deskripsi = '$deskripsi' where id_cafe = '$id_cafe'");

		if($query){
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diubah</div>');
			header('location:'.base_url().'pengelola/kelolacafe');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-dangger text-center" role="alert">Data gagal diubah</div>');
			header('location:'.base_url().'pengelola/kelolacafe');
		}
	}

	public function ubahPassword(){

		$data['side'] = 'password';
		$data['user'] = $this->db->get_where('cafe', ['email_pemilik' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header',$data);
			$this->load->view('pemilik/ubahPassword');
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
					redirect('pengelola/ubahPassword');
				} else {
                    // password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);


					$this->db->set('password', $password_hash);
					$this->db->where('email_pemilik', $this->session->userdata('email'));
					$this->db->update('cafe');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti! </div>');
					redirect('pengelola/ubahPassword');
				}
			}
		}
	}
}