<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller 
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
		$data['title'] = 'Program';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->order_by('id_jenis_program', 'DESC');
		$this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_jenis_program.id_bidang');
		$data['jenis_program'] = $this->db->get_where('tb_jenis_program')->result_array();

		$data['bidang'] = $this->db->get_where('tb_bidang')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('program/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$this->db->where('id_jenis_program', $id);
		$this->db->delete('tb_jenis_program');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data program telah dihapus!');
		redirect('program');
	}

	public function input(){
				
		$data = [
			'nama_jenis_program' => htmlspecialchars($this->input->post('nama_jenis_program', true)),
			'id_bidang' => htmlspecialchars($this->input->post('id_bidang', true)),
			];

		$this->db->insert('tb_jenis_program', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data program telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data program!');
		redirect('program');

	}

	public function edit($id){

		$data['title'] = 'Program';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_jenis_program.id_bidang');
		$data['program_data'] = $this->db->get_where('tb_jenis_program', ['id_jenis_program' => $id])->row_array();
		$data['bidang'] = $this->db->get_where('tb_bidang')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('program/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$nama_jenis_program = $this->input->post('nama_jenis_program');
		$id_bidang = $this->input->post('id_bidang');
		$id_jenis_program = $this->input->post('id_jenis_program');
		$this->db->set('nama_jenis_program', $nama_jenis_program);
		$this->db->set('id_bidang', $id_bidang);
		$this->db->where('id_jenis_program', $id_jenis_program);
		$this->db->update('tb_jenis_program');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data program telah diperbaharui!');
		redirect('program');

	}

} 