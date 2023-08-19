<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}

	}

	public function index()
	{
		$data['title'] = 'Akun';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->order_by('id', 'DESC');
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_admin.id_bidang');
		$data['akun'] = $this->db->get_where('tb_admin')->result_array();

		$data['role'] = $this->db->get_where('tb_role')->result_array();
		$this->db->order_by('id_bidang', 'ASC');
		$data['bidang'] = $this->db->get_where('tb_bidang')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akun/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$data = $this->db->get_where('tb_admin', ['id' => $id ])->row_array();
		if ($data['foto']!='default.jpg') {
			
			unlink(FCPATH . 'assets/img/profile/' . $data['foto']);
		}

		$this->db->where('id', $id);
		$this->db->delete('tb_admin');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Akun telah dihapus!');
		redirect('akun');
	}

	public function input(){

		$new_pass = $this->input->post('password');
			
		$password = password_hash($new_pass, PASSWORD_DEFAULT);

		$data = [
			'id_role' => htmlspecialchars($this->input->post('id_role', true)),
			'id_bidang' => htmlspecialchars($this->input->post('id_bidang', true)),
			'nama' => htmlspecialchars($this->input->post('nama', true)),
			'alamat' => htmlspecialchars("Belum Diisi"),
			'no_hp' => htmlspecialchars("Belum Disi"),
			'email' => htmlspecialchars("Belum Disi"),
			'username' => htmlspecialchars($this->input->post('username', true)),
			'password' => htmlspecialchars($password),
			'foto' => htmlspecialchars("default.jpg"),
			'date_created' => time(),
		];

		$this->db->insert('tb_admin', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Akun telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Akun!');
		redirect('akun');

	}

	public function edit($id){

		$data['title'] = 'Akun';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_admin.id_bidang');
		$data['akun_data'] = $this->db->get_where('tb_admin', ['tb_admin.id' => $id])->row_array();

		$get_admin = $this->db->get_where('tb_admin', ['tb_admin.id' => $id])->row_array();

		$data['role_data'] = $this->db->get_where('tb_role', ['id_role' => $get_admin['id_role']])->row_array();
		
		$data['role'] = $this->db->get_where('tb_role')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akun/edit', $data);
		$this->load->view('templates/footer');
	}

	public function setting($id){

		$data['title'] = 'Akun';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_admin.id_bidang');
		$data['akun_data'] = $this->db->get_where('tb_admin', ['tb_admin.id' => $id])->row_array();
		
		$data['syarat'] = $this->db->get_where('tb_syarat')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('akun/setting', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$id_role = $this->input->post('id_role');
		$id = $this->input->post('id');
		$this->db->set('nama', $nama);
		$this->db->set('username', $username);
		$this->db->set('id_role', $id_role);
		$this->db->where('id', $id);
		$this->db->update('tb_admin');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Akun telah diperbaharui!');
		redirect('akun');

	}

} 