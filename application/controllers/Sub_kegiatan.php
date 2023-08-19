<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_kegiatan extends CI_Controller 
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
		$data['title'] = 'Sub Kegiatan';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->order_by('id_jenis_sub_kegiatan', 'DESC');
		$data['jenis_sub_kegiatan'] = $this->db->get_where('tb_jenis_sub_kegiatan')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sub_kegiatan/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$this->db->where('id_jenis_sub_kegiatan', $id);
		$this->db->delete('tb_jenis_sub_kegiatan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data sub kegiatan telah dihapus!');
		redirect('sub_kegiatan');
	}

	public function input(){
				
		$data = [
			'nama_jenis_sub_kegiatan' => htmlspecialchars($this->input->post('nama_jenis_sub_kegiatan', true)),
			];

		$this->db->insert('tb_jenis_sub_kegiatan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data sub_kegiatan telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data sub kegiatan!');
		redirect('sub_kegiatan');

	}

	public function edit($id){

		$data['title'] = 'Sub Kegiatan';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['sub_kegiatan_data'] = $this->db->get_where('tb_jenis_sub_kegiatan', ['id_jenis_sub_kegiatan' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('sub_kegiatan/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$nama_jenis_sub_kegiatan = $this->input->post('nama_jenis_sub_kegiatan');
		$id_jenis_sub_kegiatan = $this->input->post('id_jenis_sub_kegiatan');
		$this->db->set('nama_jenis_sub_kegiatan', $nama_jenis_sub_kegiatan);
		$this->db->where('id_jenis_sub_kegiatan', $id_jenis_sub_kegiatan);
		$this->db->update('tb_jenis_sub_kegiatan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data sub kegiatan telah diperbaharui!');
		redirect('sub_kegiatan');

	}

} 