<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homekeu extends CI_Controller
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

		$this->template->load('homekeu/index', $data);
	}

	public function program()
	{
		$kode = $this->input->post('kode');
		$get_jenis_tag = $this->db->get_where('tb_jenis_tagihan', ['id_jenis_tagihan' => $kode])->row_array();
		$jenis_tagihan = $get_jenis_tag['nama_jenis_tagihan'];
		$data['title'] = $jenis_tagihan;
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->group_by('tahun');
		$this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
		$data['tahun'] = $this->db->get_where('tb_sasaran')->result_array();

		date_default_timezone_set('Asia/Makassar');
		$tahun_skrg = date('Y');

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$get_bidang = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
		$id_bidang = $get_bidang['id_bidang'];
		$data['mykode'] = $kode;

		$this->db->order_by('tb_program.id_program', 'DESC');
		$this->db->join('tb_target_program', 'tb_target_program.id_program=tb_program.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_jenis_program.id_bidang');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$this->db->join('tb_renja_program', 'tb_renja_program.id_program=tb_program.id_program');
		$data['program'] = $this->db->get_where('tb_program', ['status_dua' => 'renwal', 'tahun_program' => $tahun_skrg, 'tb_bidang.id_bidang' => $id_bidang])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('homekeu/program', $data);
		$this->load->view('templates/footer');
	}

	public function kegiatan()
	{
		$kode = $this->input->post('kode');
		$get_jenis_tag = $this->db->get_where('tb_jenis_tagihan', ['id_jenis_tagihan' => $kode])->row_array();
		$jenis_tagihan = $get_jenis_tag['nama_jenis_tagihan'];
		$data['title'] = $jenis_tagihan;
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$id = $this->input->post('id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');

		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$data['program_data'] = $this->db->get_where('tb_program', ['id_program' => $id])->row_array();

		$this->db->group_by('tahun');
		$this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
		$data['tahun'] = $this->db->get_where('tb_sasaran')->result_array();

		date_default_timezone_set('Asia/Makassar');
		$tahun_skrg = date('Y');
		$tahun = $this->input->post('tahun');

		$data['mykode'] = $kode;

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$get_bidang = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
		$id_bidang = $get_bidang['id_bidang'];

		$this->db->group_by('tb_kegiatan.id_kegiatan');
		$this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_jenis_program.id_bidang');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$this->db->join('tb_target_kegiatan', 'tb_target_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
		$this->db->join('tb_renja_kegiatan', 'tb_renja_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
		$data['kegiatan'] = $this->db->get_where('tb_kegiatan', ['status_dua' => 'renwal', 'tahun_kegiatan' => $tahun, 'tb_bidang.id_bidang' => $id_bidang])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('homekeu/kegiatan', $data);
		$this->load->view('templates/footer');
	}

	public function sub_kegiatan()
	{
		$kode = $this->input->post('kode');
		$get_jenis_tag = $this->db->get_where('tb_jenis_tagihan', ['id_jenis_tagihan' => $kode])->row_array();
		$jenis_tagihan = $get_jenis_tag['nama_jenis_tagihan'];
		$data['title'] = $jenis_tagihan;
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$id = $this->input->post('id_kegiatan');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$this->db->join('tb_target_kegiatan', 'tb_target_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
		$data['kegiatan_data'] = $this->db->get_where('tb_kegiatan', ['tb_kegiatan.id_kegiatan' => $id])->row_array();

		$this->db->group_by('tahun');
		$this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
		$data['tahun'] = $this->db->get_where('tb_sasaran')->result_array();

		date_default_timezone_set('Asia/Makassar');
		$tahun_skrg = date('Y');
		$tahun = $this->input->post('tahun');
		$data['tahun'] = $tahun;
		$data['mykode'] = $kode;

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$get_bidang = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
		$id_bidang = $get_bidang['id_bidang'];

		$this->db->order_by('tb_sub_kegiatan.id_sub_kegiatan', 'DESC');
		$this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_bidang', 'tb_bidang.id_bidang=tb_jenis_program.id_bidang');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
		$this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
		$data['sub_kegiatan'] = $this->db->get_where('tb_sub_kegiatan', ['status_dua' => 'renwal', 'tahun_sub' => $tahun, 'tb_bidang.id_bidang' => $id_bidang])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('homekeu/sub_kegiatan', $data);
		$this->load->view('templates/footer');
	}

	public function belanja()
	{
		$kode = $this->input->post('kode');
		$get_jenis_tag = $this->db->get_where('tb_jenis_tagihan', ['id_jenis_tagihan' => $kode])->row_array();
		$jenis_tagihan = $get_jenis_tag['nama_jenis_tagihan'];
		$data['title'] = $jenis_tagihan;
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$id = $this->input->post('id_sub_kegiatan');
		$this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
		$this->db->join('tb_sub_kegiatan', 'tb_sub_kegiatan.id_sub_kegiatan=tb_renja_sub.id_sub_kegiatan');
		$this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
		$this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
		$this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
		$data['aktivitas_data'] = $this->db->get_where('tb_kp_belanja', ['tb_sub_kegiatan.id_sub_kegiatan' => $id])->row_array();

		$this->db->group_by('tahun');
		$this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
		$data['tahun'] = $this->db->get_where('tb_sasaran')->result_array();

		date_default_timezone_set('Asia/Makassar');
		$tahun_skrg = date('Y');

		$tahun = $this->input->post('tahun');
		$data['tahun'] = $tahun;

		$data['mykode'] = $kode;

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$get_bidang = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
		$id_bidang = $get_bidang['id_bidang'];

		$this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
		$this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
		$data['kp_belanja'] = $this->db->get_where('tb_kp_belanja', ['tb_renja_sub.id_sub_kegiatan' => $id, 'rs_tahun' => $tahun, 'id_jenis_tagihan' => $kode])->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('homekeu/belanja', $data);
		$this->load->view('templates/footer');
	}

	public function tagihan()
	{
		$kode = $this->input->post('kode');
		$get_jenis_tag = $this->db->get_where('tb_jenis_tagihan', ['id_jenis_tagihan' => $kode])->row_array();
		$jenis_tagihan = $get_jenis_tag['nama_jenis_tagihan'];
		$data['title'] = $jenis_tagihan;
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$id = $this->input->post('id_kp_belanja');
		$this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
		$this->db->join('tb_sub_kegiatan', 'tb_sub_kegiatan.id_sub_kegiatan=tb_renja_sub.id_sub_kegiatan');
		$this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
		$this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
		$this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
		$data['tagihan_data'] = $this->db->get_where('tb_kp_belanja', ['tb_kp_belanja.id_kp_belanja' => $id])->row_array();

		$this->db->group_by('tahun');
		$this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
		$data['tahun'] = $this->db->get_where('tb_sasaran')->result_array();

		date_default_timezone_set('Asia/Makassar');
		$tahun_skrg = date('Y');

		$data['mykode'] = $kode;
		$data['id_kp_belanja'] = $id;
		$tahun = $this->input->post('tahun');
		$data['tahun'] = $tahun;

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$get_bidang = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
		$id_bidang = $get_bidang['id_bidang'];

		$this->db->join('tb_satuan', 'tb_satuan.id_satuan=tb_belanja.id_satuan');
		$data['tagihan'] = $this->db->get_where('tb_belanja', ['id_kp_belanja' => $id])->result_array();

		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar', $data);
		// $this->load->view('templates/topbar', $data);
		// $this->load->view('homekeu/tagihan', $data);
		// $this->load->view('templates/footer');
		$this->template->load('homekeu/tagihan', $data);
	}
}
