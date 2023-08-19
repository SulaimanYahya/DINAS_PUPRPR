<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sasaran extends CI_Controller 
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
		$data['title'] = 'Sasaran';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->order_by('id_jenis_sasaran', 'DESC');
		$data['jenis_sasaran'] = $this->db->get_where('tb_jenis_sasaran')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sasaran/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$this->db->where('id_jenis_sasaran', $id);
		$this->db->delete('tb_jenis_sasaran');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data sasaran telah dihapus!');
		redirect('sasaran');
	}

	public function input(){
				
		$data = [
			'nama_jenis_sasaran' => htmlspecialchars($this->input->post('nama_jenis_sasaran', true)),
			];

		$this->db->insert('tb_jenis_sasaran', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data sasaran telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data sasaran!');
		redirect('sasaran');

	}

	public function edit($id){

		$data['title'] = 'Sasaran';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['sasaran_data'] = $this->db->get_where('tb_jenis_sasaran', ['id_jenis_sasaran' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sasaran/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$nama_jenis_sasaran = $this->input->post('nama_jenis_sasaran');
		$id_jenis_sasaran = $this->input->post('id_jenis_sasaran');
		$this->db->set('nama_jenis_sasaran', $nama_jenis_sasaran);
		$this->db->where('id_jenis_sasaran', $id_jenis_sasaran);
		$this->db->update('tb_jenis_sasaran');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data sasaran telah diperbaharui!');
		redirect('sasaran');

	}

} 