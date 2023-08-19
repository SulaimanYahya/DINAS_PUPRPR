<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
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
		$data['title'] = 'Laporan';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$get_admin = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
		$this->db->order_by('created_at', 'DESC');
		$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa', ['status_mhs'=> 'skripsi'])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function validasi($nim){

		$this->db->set('status_mhs', 'selesai');
		$this->db->where('nim', $nim);
		$this->db->update('tb_mahasiswa');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Validasi berhasil, Mahasiswa dinyatakan telah selesai!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil melakukan Validasi!');

		redirect('laporan');
	}

} 