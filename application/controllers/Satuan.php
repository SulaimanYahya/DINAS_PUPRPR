<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller 
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
		$data['title'] = 'Satuan';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->order_by('id_satuan', 'DESC');
		$data['satuan'] = $this->db->get_where('tb_satuan')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('satuan/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$this->db->where('id_satuan', $id);
		$this->db->delete('tb_satuan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data satuan telah dihapus!');
		redirect('satuan');
	}

	public function input(){
				
		$data = [
			'satuan' => htmlspecialchars($this->input->post('satuan', true)),
			];

		$this->db->insert('tb_satuan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data satuan telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data satuan!');
		redirect('satuan');

	}

	public function edit($id){

		$data['title'] = 'Satuan';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['satuan_data'] = $this->db->get_where('tb_satuan', ['id_satuan' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('satuan/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$satuan = $this->input->post('satuan');
		$id_satuan = $this->input->post('id_satuan');
		$this->db->set('satuan', $satuan);
		$this->db->where('id_satuan', $id_satuan);
		$this->db->update('tb_satuan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data satuan telah diperbaharui!');
		redirect('satuan');

	}

} 