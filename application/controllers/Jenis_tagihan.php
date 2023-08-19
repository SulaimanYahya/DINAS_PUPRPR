<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_tagihan extends CI_Controller 
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
		$data['title'] = 'Jenis Tagihan';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->order_by('id_jenis_tagihan', 'DESC');
		$data['jenis_tagihan'] = $this->db->get_where('tb_jenis_tagihan', ['nama_jenis_tagihan!='=>'Tidak Ada'])->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('jenis_tagihan/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$this->db->where('id_jenis_tagihan', $id);
		$this->db->delete('tb_jenis_tagihan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data jenis tagihan telah dihapus!');
		redirect('jenis_tagihan');
	}

	public function input(){
				
		$data = [
			'nama_jenis_tagihan' => htmlspecialchars($this->input->post('nama_jenis_tagihan', true)),
			];

		$this->db->insert('tb_jenis_tagihan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data jenis tagihan telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data jenis tagihan!');
		redirect('jenis_tagihan');

	}

	public function edit($id){

		$data['title'] = 'Jenis Tagihan';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['jenis_tagihan_data'] = $this->db->get_where('tb_jenis_tagihan', ['id_jenis_tagihan' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('jenis_tagihan/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$nama_jenis_tagihan = $this->input->post('nama_jenis_tagihan');
		$id_jenis_tagihan = $this->input->post('id_jenis_tagihan');
		$this->db->set('nama_jenis_tagihan', $nama_jenis_tagihan);
		$this->db->where('id_jenis_tagihan', $id_jenis_tagihan);
		$this->db->update('tb_jenis_tagihan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data jenis tagihan telah diperbaharui!');
		redirect('jenis_tagihan');

	}

} 