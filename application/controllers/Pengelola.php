<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengelola extends CI_Controller
{


	public function __construct()
	{


		parent::__construct();
		if (!$this->session->userdata('nama_cafe')) {
			redirect('auth');
		}
		$this->load->library('form_validation');
	}


	public function index()
	{
		$id_cafe = $this->session->userdata("id_cafe");
		$data['side'] = 'home';
		$data['menu'] = $this->db->query("SELECT COUNT(id_menu) as jumlah_menu from menu where id_cafe = $id_cafe")->row_array();

		$data['komentar'] = $this->db->query("SELECT COUNT(id_komentar) as jumlah_komentar from cafe s join menu k on k.id_cafe = s.id_cafe join komentar ko on k.id_menu = ko.id_menu where s.id_cafe = $id_cafe")->row_array();
		$this->load->view('admin/template/header', $data);
		$this->load->view('pengelola/dashboard');
		$this->load->view('admin/template/footer');
	}
	public function kelolacafe()
	{
		$id_cafe = $this->session->userdata('id_cafe');
		$data['cafe'] = $this->db->query("SELECT * FROM cafe s join kelurahan k on s.id_kelurahan = k.id_kelurahan join kecamatan kc on k.id_kecamatan = kc.id_kecamatan WHERE s.id_cafe = '$id_cafe'")->row_array();
		$data['side'] = 'kelolaCafe';
		$this->load->view('admin/template/header', $data);
		$this->load->view('pengelola/kelolaCafe', $data);
		$this->load->view('admin/template/footer');
	}

	public function editcafe()
	{
		$id_cafe = $this->session->userdata('id_cafe');
		$nama_cafe = $this->input->post('nama_cafe');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$deskripsi = $this->input->post('deskripsi');

		$query = $this->db->query("UPDATE cafe set nama_cafe = '$nama_cafe',nama_pemilik = '$nama_pemilik',deskripsi = '$deskripsi' where id_cafe = '$id_cafe'");

		if ($query) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diubah</div>');
			header('location:' . base_url() . 'pengelola/kelolacafe');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-dangger text-center" role="alert">Data gagal diubah</div>');
			header('location:' . base_url() . 'pengelola/kelolacafe');
		}
	}

	public function menu()
	{
		$id_cafe = $this->session->userdata('id_cafe');
		$this->form_validation->set_rules('nama_menu', 'Nama menu', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');

		$data['menu'] = $this->db->query("SELECT * FROM menu where id_cafe = '$id_cafe' order by id_menu desc")->result();
		$data['side'] = 'menu';
		if ($this->form_validation->run() == false) {

			$this->load->view('admin/template/header', $data);
			$this->load->view('pengelola/menu', $data);
			$this->load->view('admin/template/footer');
		} else {

			if (!empty($_FILES['foto_menu']['name'])) {
				$config['upload_path'] = 'upload/menu';
				//restrict uploads to this mime types
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 999999999;
				$config['file_name1'] = $_FILES['foto']['name'];

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$this->upload->do_upload('foto_menu');
				$uploadFoto = $this->upload->data();
				$fileFoto = $uploadFoto['file_name'];

				$data = [
					'nama_menu' => $this->input->post('nama_menu'),
					'id_cafe' => $id_cafe,
					'harga' => $this->input->post('harga'),
					'foto_menu' => $fileFoto,
					'detail' => $this->input->post('detail'),
				];

				$query = $this->db->insert('menu', $data);
				if ($query) {
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diunggah</div>');
					header('location:' . base_url() . 'pengelola/menu');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-dangger text-center" role="alert">Data gagal diunggah</div>');
					header('location:' . base_url() . 'pengelola/menu');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-dangger text-center" role="alert">Data gagal diunggah s</div>');
				header('location:' . base_url() . 'pengelola/menu');
			}
		}
	}

	public function hapusmenu($id_menu)
	{

		$querymenu = $this->db->query("SELECT * FROM menu where id_menu = $id_menu")->row_array();

		$foto = $querymenu['foto_menu'];
		unlink(FCPATH . 'upload/' . $foto);

		$queryKoment = $this->db->query("SELECT * FROM komentar where id_menu = $id_menu")->result();

		foreach ($queryKoment as $key => $value) {
			# code...
			$id_komentar = $value->id_komentar;
			$queryBalas = $this->db->query("DELETE FROM balas_komentar where id_komentar = $id_komentar");
		}
		$queryDeleteKoment = $this->db->query("DELETE FROM komentar where id_menu = $id_menu");
		$query = $this->db->query("DELETE FROM menu WHERE id_menu ='$id_menu'");

		if ($query) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil dihapus</div>');
			header('location:' . base_url() . 'pengelola/menu');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-dangger text-center" role="alert">Data gagal dihapus s</div>');
			header('location:' . base_url() . 'pengelola/menu');
		}
	}

	public function detailmenu($id_menu)
	{
		$id_cafe = $this->session->userdata('id_cafe');
		$this->form_validation->set_rules('nama_menu', 'Nama menu', 'required');
		$this->form_validation->set_rules('harga', 'harga', 'required');

		$data['menu'] = $this->db->query("SELECT * FROM menu where id_menu = '$id_menu'")->row_array();
		$data['side'] = 'menu';
		if ($this->form_validation->run() == false) {

			$this->load->view('admin/template/header', $data);
			$this->load->view('pengelola/menuDetail', $data);
			$this->load->view('admin/template/footer');
		} else {

			if (!empty($_FILES['foto']['name'])) {
				$config['upload_path'] = 'upload/menu';
				//restrict uploads to this mime types
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 999999999;
				$config['file_name1'] = $_FILES['foto']['name'];

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$this->upload->do_upload('foto');
				$uploadFoto = $this->upload->data();
				$fileFoto = $uploadFoto['file_name'];

				$nama_menu = $this->input->post('nama_menu');
				$harga = $this->input->post('harga');
				$foto = $fileFoto;

				$query = $this->db->query("UPDATE menu set nama_menu = '$nama_menu', harga = '$harga',foto_menu = '$foto' where id_menu = '$id_menu' ");
				if ($query) {
					$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data berhasil diunggah</div>');
					header('location:' . base_url() . 'pengelola/menu');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data gagal diunggah</div>');
					header('location:' . base_url() . 'pengelola/menu');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Data gagal diunggah s</div>');
				header('location:' . base_url() . 'pengelola/menu');
			}
		}
	}

	public function balasKomentar($id_menu, $id_komen)
	{

		$data = [
			'balas_komen' => $this->input->post('balas'),
			'id_komentar' => $id_komen
		];

		$query = $this->db->insert('balas_komentar', $data);

		if ($query) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">komentar diunggah s</div>');
			header('location:' . base_url() . 'pengelola/detailmenu/' . $id_menu);
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">komentar gagal diubah s</div>');
			header('location:' . base_url() . 'pengelola/detailmenu/' . $id_menu);
		}
	}

	public function ubahPassword()
	{

		$data['side'] = 'password';
		$data['user'] = $this->db->get_where('cafe', ['email_pemilik' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header', $data);
			$this->load->view('pengelola/ubahPassword');
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
					redirect('pengeola/ubahPassword');
				}
			}
		}
	}
}