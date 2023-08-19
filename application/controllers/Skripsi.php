<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skripsi extends CI_Controller 
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
		$data['title'] = 'Skripsi';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$get_admin = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$roleku = $get_admin['role'];
		if ($roleku=='Fakultas') {
			$this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
			$this->db->order_by('created_at', 'DESC');
			$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa', ['id_fakultas'=>$get_admin['id_fakultas'], 'status_mhs'=> 'hasil'])->result_array();
		}else {
			$this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
			$this->db->order_by('created_at', 'DESC');
			$data['mahasiswa'] = $this->db->get_where('tb_mahasiswa', ['status_mhs'=> 'hasil'])->result_array();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('skripsi/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function validasi($id){

		$data['title'] = 'Skripsi';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$data['mhs_data'] = $this->db->get_where('tb_mahasiswa', ['nim' => $id])->row_array();

		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$get_admin = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();
		$id_fakultas = $get_admin['id_fakultas'];
		$id_role = $get_admin['id_role'];
		$nama_role = $get_admin['role'];

		$this->db->join('tb_syarat', 'tb_syarat.id_syarat=tb_validasi.id_syarat');
		$this->db->join('tb_setting', 'tb_syarat.id_syarat=tb_setting.id_syarat');
		$this->db->where("nim", $id);
		$this->db->where("id_role", $id_role);
		$this->db->where("(id_jenis='3' OR id_jenis='5')");
		$data['validasi'] = $this->db->get('tb_validasi')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('skripsi/tampil_validasi', $data);
		$this->load->view('templates/footer');
	}

	public function selesai($id){

		$get_valid = $this->db->get_where('tb_validasi', ['id_validasi' => $id])->row_array();
		$nim = $get_valid['nim'];

		$this->db->set('status', 'selesai');
		$this->db->where('id_validasi', $id);
		$this->db->update('tb_validasi');

		$this->db->join('tb_syarat', 'tb_syarat.id_syarat=tb_validasi.id_syarat');
		$this->db->where("nim", $nim);
		$this->db->where("status", 'tunggu');
		$this->db->where("(id_jenis='3' OR id_jenis='5')");
		$cek = $this->db->get('tb_validasi')->num_rows();
		if ($cek > 0) {

		}else {
			$this->db->set('status_mhs', 'skripsi');
			$this->db->where('nim', $nim);
			$this->db->update('tb_mahasiswa');
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Validasi berhasil, Status telah perbaharui!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil melakukan Validasi!');

		redirect('skripsi/validasi/'.$nim);
	}

	public function ket_valid($id){

		$data['title'] = 'Skripsi';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_syarat', 'tb_syarat.id_syarat=tb_validasi.id_syarat');
		$data['syarat_data'] = $this->db->get_where('tb_validasi', ['id_validasi' => $id])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('skripsi/keterangan', $data);
		$this->load->view('templates/footer');
	}

	public function ket_valid2($id){

		$data['title'] = 'Skripsi';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_syarat', 'tb_syarat.id_syarat=tb_validasi.id_syarat');
		$data['syarat_data'] = $this->db->get_where('tb_validasi', ['id_validasi' => $id])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('skripsi/keterangan2', $data);
		$this->load->view('templates/footer');
	}

	public function valid_proses(){

		$id = $this->input->post('id_validasi');
		$keterangan = $this->input->post('keterangan');
		$get_valid = $this->db->get_where('tb_validasi', ['id_validasi' => $id])->row_array();
		$nim = $get_valid['nim'];

		$this->db->set('status', 'selesai');
		$this->db->set('keterangan', $keterangan.' %');
		$this->db->where('id_validasi', $id);
		$this->db->update('tb_validasi');

		$this->db->join('tb_syarat', 'tb_syarat.id_syarat=tb_validasi.id_syarat');
		$this->db->where("nim", $nim);
		$this->db->where("status", 'tunggu');
		$this->db->where("(id_jenis='3' OR id_jenis='5')");
		$cek = $this->db->get('tb_validasi')->num_rows();
		if ($cek > 0) {

		}else {
			$this->db->set('status_mhs', 'skripsi');
			$this->db->where('nim', $nim);
			$this->db->update('tb_mahasiswa');
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Validasi berhasil, Status telah perbaharui!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil melakukan Validasi!');

		redirect('skripsi/validasi/'.$nim);
	}

	public function valid_proses2(){

		$id = $this->input->post('id_validasi');
		$keterangan = $this->input->post('keterangan');
		$get_valid = $this->db->get_where('tb_validasi', ['id_validasi' => $id])->row_array();
		$nim = $get_valid['nim'];

		$this->db->set('status', 'selesai');
		$this->db->set('keterangan', $keterangan);
		$this->db->where('id_validasi', $id);
		$this->db->update('tb_validasi');

		$this->db->join('tb_syarat', 'tb_syarat.id_syarat=tb_validasi.id_syarat');
		$this->db->where("nim", $nim);
		$this->db->where("status", 'tunggu');
		$this->db->where("(id_jenis='3' OR id_jenis='5')");
		$cek = $this->db->get('tb_validasi')->num_rows();
		if ($cek > 0) {

		}else {
			$this->db->set('status_mhs', 'skripsi');
			$this->db->where('nim', $nim);
			$this->db->update('tb_mahasiswa');
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Validasi berhasil, Status telah perbaharui!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil melakukan Validasi!');

		redirect('skripsi/validasi/'.$nim);
	}


} 