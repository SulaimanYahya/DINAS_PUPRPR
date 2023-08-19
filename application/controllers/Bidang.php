<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller 
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
		$data['title'] = 'Bidang';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->order_by('id_bidang', 'DESC');
		$data['bidang'] = $this->db->get_where('tb_bidang', ['nama_bidang!='=>'Tidak Ada'])->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bidang/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$this->db->where('id_bidang', $id);
		$this->db->delete('tb_bidang');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data bidang telah dihapus!');
		redirect('bidang');
	}

	public function input(){
				
		$data = [
			'nama_bidang' => htmlspecialchars($this->input->post('nama_bidang', true)),
			];

		$this->db->insert('tb_bidang', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data bidang telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data bidang!');
		redirect('bidang');

	}

	public function edit($id){

		$data['title'] = 'Bidang';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['bidang_data'] = $this->db->get_where('tb_bidang', ['id_bidang' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('bidang/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$nama_bidang = $this->input->post('nama_bidang');
		$id_bidang = $this->input->post('id_bidang');
		$this->db->set('nama_bidang', $nama_bidang);
		$this->db->where('id_bidang', $id_bidang);
		$this->db->update('tb_bidang');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data bidang telah diperbaharui!');
		redirect('bidang');

	}

} 