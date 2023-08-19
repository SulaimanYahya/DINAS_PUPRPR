<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan extends CI_Controller 
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
		$data['title'] = 'Potongan';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->order_by('id_potongan', 'DESC');
		$data['potongan'] = $this->db->get_where('tb_potongan')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('potongan/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$this->db->where('id_potongan', $id);
		$this->db->delete('tb_potongan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data potongan telah dihapus!');
		redirect('potongan');
	}

	public function input(){
				
		$data = [
			'nama_potongan' => htmlspecialchars($this->input->post('nama_potongan', true)),
			'persentase' => htmlspecialchars($this->input->post('persentase', true)),
			'ket_pot' => htmlspecialchars($this->input->post('ket_pot', true)),
			'kd_pot' => htmlspecialchars($this->input->post('kd_pot', true)),
			];

		$this->db->insert('tb_potongan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data potongan telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data potongan!');
		redirect('potongan');

	}

	public function edit($id){

		$data['title'] = 'Potongan';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['potongan_data'] = $this->db->get_where('tb_potongan', ['id_potongan' => $id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('potongan/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$nama_potongan = $this->input->post('nama_potongan');
		$ket_pot = $this->input->post('ket_pot');
		$persentase = $this->input->post('persentase');
		$kd_pot = $this->input->post('kd_pot');
		$id_potongan = $this->input->post('id_potongan');
		$this->db->set('ket_pot', $ket_pot);
		$this->db->set('nama_potongan', $nama_potongan);
		$this->db->set('persentase', $persentase);
		$this->db->set('kd_pot', $kd_pot);
		$this->db->where('id_potongan', $id_potongan);
		$this->db->update('tb_potongan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data potongan telah diperbaharui!');
		redirect('potongan');

	}

} 