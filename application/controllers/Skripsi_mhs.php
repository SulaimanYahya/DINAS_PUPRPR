<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skripsi_mhs extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('nim')) {
			redirect('auth');
		}

	}

	public function index(){

		$data['title'] = 'Skripsi';
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
		$this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=tb_prodi.id_fakultas');
		$data['user'] = $this->db->get_where('tb_mahasiswa', ['nim' => $this->session->userdata('nim')])->row_array();

		$this->db->join('tb_syarat', 'tb_syarat.id_syarat=tb_validasi.id_syarat');
		$this->db->join('tb_setting', 'tb_syarat.id_syarat=tb_setting.id_syarat');
		$this->db->where("nim", $this->session->userdata('nim'));
		$this->db->where("(id_jenis='3' OR id_jenis='5')");
		$data['validasi'] = $this->db->get('tb_validasi')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_mhs', $data);
		$this->load->view('templates/topbar_mhs', $data);
		$this->load->view('user_mhs/skripsi', $data);
		$this->load->view('templates/footer_mhs');
	}

} 