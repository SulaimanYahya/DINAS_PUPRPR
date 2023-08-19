<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat extends CI_Controller 
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
		$data['title'] = 'Syarat';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_jenis', 'tb_jenis.id_jenis=tb_syarat.id_jenis');
		$this->db->order_by('id_syarat', 'DESC');
		$data['syarat'] = $this->db->get_where('tb_syarat')->result_array();

		$data['jenis'] = $this->db->get_where('tb_jenis')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('syarat/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$this->db->where('id_syarat', $id);
		$this->db->delete('tb_syarat');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data syarat telah dihapus!');
		redirect('syarat');
	}

	public function input(){
				
		$data = [
			'id_jenis' => htmlspecialchars($this->input->post('id_jenis', true)),
			'nama_syarat' => htmlspecialchars($this->input->post('nama_syarat', true)),
			];

		$this->db->insert('tb_syarat', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data syarat telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data syarat!');
		redirect('syarat');

	}

	public function edit($id){

		$data['title'] = 'Syarat';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_jenis', 'tb_jenis.id_jenis=tb_syarat.id_jenis');
		$data['syarat_data'] = $this->db->get_where('tb_syarat', ['id_syarat' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('syarat/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$nama_syarat = $this->input->post('nama_syarat');
		$id_syarat = $this->input->post('id_syarat');
		$this->db->set('nama_syarat', $nama_syarat);
		$this->db->where('id_syarat', $id_syarat);
		$this->db->update('tb_syarat');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data syarat telah diperbaharui!');
		redirect('syarat');

	}

} 