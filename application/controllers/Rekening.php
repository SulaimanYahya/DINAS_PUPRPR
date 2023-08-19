<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller 
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
		$data['title'] = 'Rekening';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->order_by('id_rek', 'DESC');
		$this->db->join('tb_jenis_tagihan', 'tb_jenis_tagihan.id_jenis_tagihan=tb_rek.id_jenis_tagihan');
		$data['rek'] = $this->db->get_where('tb_rek')->result_array();
		$data['jenis_tagihan'] = $this->db->get_where('tb_jenis_tagihan')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('rekening/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$this->db->where('id_rek', $id);
		$this->db->delete('tb_rek');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data rekening telah dihapus!');
		redirect('rekening');
	}

	public function input(){
				
		$data = [
			'no_rek' => htmlspecialchars($this->input->post('no_rek', true)),
			'nama_rek' => htmlspecialchars($this->input->post('nama_rek', true)),
			'id_jenis_tagihan' => htmlspecialchars($this->input->post('id_jenis_tagihan', true)),
			];

		$this->db->insert('tb_rek', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data rekening telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data rekening!');
		redirect('rekening');

	}

	public function edit($id){

		$data['title'] = 'Rekening';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_jenis_tagihan', 'tb_jenis_tagihan.id_jenis_tagihan=tb_rek.id_jenis_tagihan');	
		$data['rek_data'] = $this->db->get_where('tb_rek', ['id_rek' => $id])->row_array();
		$data['jenis_tagihan'] = $this->db->get_where('tb_jenis_tagihan')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('rekening/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$nama_rek = $this->input->post('nama_rek');
		$no_rek = $this->input->post('no_rek');
		$id_jenis_tagihan = $this->input->post('id_jenis_tagihan');
		$id_rek = $this->input->post('id_rek');
		$this->db->set('no_rek', $no_rek);
		$this->db->set('nama_rek', $nama_rek);
		$this->db->set('id_jenis_tagihan', $id_jenis_tagihan);
		$this->db->where('id_rek', $id_rek);
		$this->db->update('tb_rek');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data rekening telah diperbaharui!');
		redirect('rekening');

	}

} 