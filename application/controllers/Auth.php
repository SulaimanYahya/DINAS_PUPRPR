<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';

			$data['level'] = $this->db->get_where('tb_role')->result_array();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {

			// validasi succes
			$this->_login();
		}
	}


	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$user = $this->db->get_where('tb_admin', ['username' => $username, 'role' => $level])->row_array();

		// cek usernya ada
		if ($user) {

			// cek password
			if (password_verify($password, $user['password'])) {

				$data = [
					'username' => $user['username'],
					'role' => $user['role'],
					'id_bidang' => $user['id_bidang'],

				];

				$this->session->set_userdata($data);
				if ($level == 'Perencanaan') {
					redirect('user');
				} else {
					redirect('homekeu');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username tidak tersedia!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim');
		$this->form_validation->set_rules('no_telpon', 'No_telpon', 'required|trim');
		$this->form_validation->set_rules('address', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', ['matches' => 'Password dont match!', 'min_length' => 'Password too short!']);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {

			$upload_gambar = $_FILES['gambar']['name'];
			if ($upload_gambar) {

				$config['upload_path']          = './assets/img/profile/';
				$config['allowed_types']        = 'jpeg|jpg|png';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {

					$config['image_library']    = 'gd2';
					$config['source_image']     = './assets/img/profile/' . $this->upload->data('file_name');
					$config['create_thumb']     = FALSE;
					$config['maintain_ratio']   = FALSE;
					$config['quality']          = '50%';
					$config['width']            = 500;
					$config['height']           = 380;
					$config['new_image']        = './assets/img/profile/' . $this->upload->data('file_name');
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$data = [
						'nik' => htmlspecialchars($this->input->post('nik', true)),
						'nama' => htmlspecialchars($this->input->post('name', true)),
						'jen_kel' => htmlspecialchars($this->input->post('jen_kel', true)),
						'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
						'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
						'alamat' => htmlspecialchars($this->input->post('address', true)),
						'no_telpon' => htmlspecialchars($this->input->post('no_telpon', true)),
						'foto_user' => htmlspecialchars($this->upload->data('file_name', true)),
						'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
						'status' => 'aktif',
					];

					$this->db->insert('tb_user', $data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Selamat! Akun anda berhasil dibuat. Silahkan Login!</div>');
					redirect('auth');
				} else {

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
					$this->session->set_flashdata('kode_gagal', 'gagalModal');
					$this->session->set_flashdata('pesan_gagal', 'Gagal unggah Foto, Pastikan jenis file PNG/JPG/JPEG!');
					redirect('auth/registration');
				}
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('nim');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You have been logout!</div>');
		redirect('auth');
	}
}
