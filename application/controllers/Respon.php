<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Respon extends CI_Controller 
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
		$data['title'] = 'Responsibility';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->order_by('id_respon', 'DESC');
		$this->db->join('tb_role_respon', 'tb_role_respon.id_role_respon=tb_respon.id_role_respon');
		$this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_respon.id_bidang');
		$data['respon'] = $this->db->get_where('tb_respon')->result_array();
		$data['role_respon'] = $this->db->get_where('tb_role_respon')->result_array();
		$data['bidang'] = $this->db->get_where('tb_bidang')->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('respon/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus($id){

		$this->db->where('id_respon', $id);
		$this->db->delete('tb_respon');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data respon telah dihapus!');
		redirect('respon');
	}

	public function input(){
				
		$data = [
			'nama_respon' => htmlspecialchars($this->input->post('nama_respon', true)),
			'nip' => htmlspecialchars($this->input->post('nip', true)),
			'id_role_respon' => htmlspecialchars($this->input->post('id_role_respon', true)),
			'id_bidang' => htmlspecialchars($this->input->post('id_bidang', true)),
			];

		$this->db->insert('tb_respon', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data respon telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data respon!');
		redirect('respon');

	}

	public function edit($id){

		$data['title'] = 'Responsibility';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_role_respon', 'tb_role_respon.id_role_respon=tb_respon.id_role_respon');
		$this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_respon.id_bidang');
		$data['respon_data'] = $this->db->get_where('tb_respon', ['id_respon' => $id])->row_array();

		$data['role_respon'] = $this->db->get_where('tb_role_respon')->result_array();
		$data['bidang'] = $this->db->get_where('tb_bidang')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('respon/edit', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses(){

		$nama_respon = $this->input->post('nama_respon');
		$nip = $this->input->post('nip');
		$id_role_respon = $this->input->post('id_role_respon');
		$id_bidang = $this->input->post('id_bidang');
		$id_respon = $this->input->post('id_respon');
		$this->db->set('nama_respon', $nama_respon);
		$this->db->set('nip', $nip);
		$this->db->set('id_role_respon', $id_role_respon);
		$this->db->set('id_bidang', $id_bidang);
		$this->db->where('id_respon', $id_respon);
		$this->db->update('tb_respon');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data respon telah diperbaharui!');
		redirect('respon');

	}

} 