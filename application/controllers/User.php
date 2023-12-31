<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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

		$data['title'] = 'Dashboard';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['jum_sasaran'] = $this->db->get_where('tb_sasaran')->num_rows();
		$data['jum_program'] = $this->db->get_where('tb_program')->num_rows();
		$data['jum_kegiatan'] = $this->db->get_where('tb_kegiatan')->num_rows();
		$data['jum_sub_kegiatan'] = $this->db->get_where('tb_sub_kegiatan')->num_rows();

		// $this->db->group_by('status_mhs');
		// $this->db->select('status_mhs');
		// $this->db->select('count(*) as total');
		// $data['untuk_status'] = $this->db->get_where('tb_mahasiswa', ['status_mhs !='=> 'tunggu'])->result();

		// $this->db->group_by('nama_prodi');
		// $this->db->select('nama_prodi, tb_prodi.id_prodi, tb_mahasiswa.id_prodi');
		// $this->db->select('count(*) as total');
		// $this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
		// $data['untuk_mhs'] = $this->db->get_where('tb_mahasiswa')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}
}
