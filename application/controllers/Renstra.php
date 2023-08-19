<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renstra extends CI_Controller 
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
		$data['title'] = 'Renstra';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		// fungsi untuk sasaran
		$this->db->order_by('tb_sasaran.id_sasaran', 'DESC');
		$this->db->join('tb_target', 'tb_target.id_sasaran=tb_sasaran.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$data['sasaran'] = $this->db->get_where('tb_sasaran')->result_array();

		$data['jenis_sasaran'] = $this->db->get_where('tb_jenis_sasaran')->result_array();

		// batas fungsi sasaran

		// fungsi untuk program
		$this->db->order_by('tb_program.id_program', 'DESC');
		$this->db->join('tb_target_program', 'tb_target_program.id_program=tb_program.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$data['program'] = $this->db->get_where('tb_program')->result_array();

		// batas fungsi program

		// fungsi untuk kegiatan
		$this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$this->db->join('tb_target_kegiatan', 'tb_target_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
		$data['kegiatan'] = $this->db->get_where('tb_kegiatan')->result_array();

		// batas fungsi kegiatan

		// fungsi untuk sub kegiatan
		$this->db->order_by('tb_sub_kegiatan.id_sub_kegiatan', 'DESC');
		$this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
		$this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
		$data['sub_kegiatan'] = $this->db->get_where('tb_sub_kegiatan')->result_array();

		// batas fungsi sub kegiatan

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('renstra/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function tambah_program($id)
	{
		$data['title'] = 'Renstra';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$data['sasaran_data'] = $this->db->get_where('tb_sasaran', ['id_sasaran' => $id])->row_array();

		$this->db->order_by('tb_program.id_program', 'DESC');
		$this->db->join('tb_target_program', 'tb_target_program.id_program=tb_program.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$data['program'] = $this->db->get_where('tb_program', ['tb_program.id_sasaran' => $id])->result_array();

		$data['jenis_program'] = $this->db->get_where('tb_jenis_program')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('renstra/tambah_program', $data);
		$this->load->view('templates/footer');
		
	}

	public function tambah_kegiatan($id)
	{
		$data['title'] = 'Renstra';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$data['program_data'] = $this->db->get_where('tb_program', ['id_program' => $id])->row_array();

		$this->db->order_by('tb_kegiatan.id_kegiatan', 'DESC');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_target_kegiatan', 'tb_target_kegiatan.id_kegiatan=tb_kegiatan.id_kegiatan');
		$data['kegiatan'] = $this->db->get_where('tb_kegiatan', ['tb_kegiatan.id_program' => $id])->result_array();

		$data['jenis_kegiatan'] = $this->db->get_where('tb_jenis_kegiatan')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('renstra/tambah_kegiatan', $data);
		$this->load->view('templates/footer');
		
	}

	public function tambah_sub_kegiatan($id)
	{
		$data['title'] = 'Renstra';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$data['kegiatan_data'] = $this->db->get_where('tb_kegiatan', ['id_kegiatan' => $id])->row_array();

		$this->db->order_by('tb_sub_kegiatan.id_sub_kegiatan', 'DESC');
		$this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
		$this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
		$data['sub_kegiatan'] = $this->db->get_where('tb_sub_kegiatan', ['tb_sub_kegiatan.id_kegiatan' => $id])->result_array();

		$data['jenis_sub_kegiatan'] = $this->db->get_where('tb_jenis_sub_kegiatan')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('renstra/tambah_sub_kegiatan', $data);
		$this->load->view('templates/footer');
		
	}

	public function hapus_sasaran($id){

		$this->session->set_userdata('kode_aktif', 'sasaran');

		$this->db->where('id_sasaran', $id);
		$this->db->delete('tb_sasaran');

		$this->db->where('id_sasaran', $id);
		$this->db->delete('tb_target');


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data sasaran telah dihapus!');
		redirect('renstra');
	}

	public function hapus_program($id){

		$this->session->set_userdata('kode_aktif', 'sasaran');

		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$ambil = $this->db->get_where('tb_program', ['id_program' => $id])->row_array();

		$id_sasaran = $ambil['id_sasaran'];

		$this->db->where('id_program', $id);
		$this->db->delete('tb_program');

		$this->db->where('id_program', $id);
		$this->db->delete('tb_target_program');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data program telah dihapus!');
		redirect('renstra/tambah_program/'.$id_sasaran);
	}

	public function hapus_kegiatan($id){

		$this->session->set_userdata('kode_aktif', 'sasaran');

		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$ambil = $this->db->get_where('tb_kegiatan', ['id_kegiatan' => $id])->row_array();

		$id_program = $ambil['id_program'];

		$this->db->where('id_kegiatan', $id);
		$this->db->delete('tb_kegiatan');

		$this->db->where('id_kegiatan', $id);
		$this->db->delete('tb_target_kegiatan');


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data kegiatan telah dihapus!');
		redirect('renstra/tambah_kegiatan/'.$id_program);
	}

	public function hapus_sub_kegiatan($id){

		$this->session->set_userdata('kode_aktif', 'sasaran');

		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
		$ambil = $this->db->get_where('tb_sub_kegiatan', ['id_sub_kegiatan' => $id])->row_array();

		$id_kegiatan = $ambil['id_kegiatan'];

		$this->db->where('id_sub_kegiatan', $id);
		$this->db->delete('tb_sub_kegiatan');

		$this->db->where('id_sub_kegiatan', $id);
		$this->db->delete('tb_target_sub');


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a> Delete successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data sub kegiatan telah dihapus!');
		redirect('renstra/tambah_sub_kegiatan/'.$id_kegiatan);
	}

	public function input_sasaran(){

		$this->session->set_userdata('kode_aktif', 'sasaran');

		function random_word($id = 30){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
		}

		$random = random_word(30);
				
		$data = [
			'id_sasaran' => htmlspecialchars($random),
			'id_jenis_sasaran' => htmlspecialchars($this->input->post('id_jenis_sasaran', true)),
			'indikator_kerja' => htmlspecialchars($this->input->post('indikator_kerja', true)),
			'formulasi_indikator' => htmlspecialchars($this->input->post('formulasi_indikator', true)),
			'satuan' => htmlspecialchars($this->input->post('satuan', true))
			];

		$this->db->insert('tb_sasaran', $data);

		$data = [
			'tahun' => htmlspecialchars($this->input->post('tahun_1', true)),
			'target' => htmlspecialchars($this->input->post('t_tahun_1', true)),
			'status_target' => htmlspecialchars("tunggu"),
			'id_sasaran' => htmlspecialchars($random),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];

		$this->db->insert('tb_target', $data);

		$data = [
			'tahun' => htmlspecialchars($this->input->post('tahun_2', true)),
			'target' => htmlspecialchars($this->input->post('t_tahun_2', true)),
			'status_target' => htmlspecialchars("tunggu"),
			'id_sasaran' => htmlspecialchars($random),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];

		$this->db->insert('tb_target', $data);

		$data = [
			'tahun' => htmlspecialchars($this->input->post('tahun_3', true)),
			'target' => htmlspecialchars($this->input->post('t_tahun_3', true)),
			'status_target' => htmlspecialchars("tunggu"),
			'id_sasaran' => htmlspecialchars($random),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];

		$this->db->insert('tb_target', $data);

		$data = [
			'tahun' => htmlspecialchars($this->input->post('tahun_4', true)),
			'target' => htmlspecialchars($this->input->post('t_tahun_4', true)),
			'status_target' => htmlspecialchars("tunggu"),
			'id_sasaran' => htmlspecialchars($random),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];

		$this->db->insert('tb_target', $data);

		$data = [
			'tahun' => htmlspecialchars($this->input->post('tahun_5', true)),
			'target' => htmlspecialchars($this->input->post('t_tahun_5', true)),
			'status_target' => htmlspecialchars("tunggu"),
			'id_sasaran' => htmlspecialchars($random),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];

		$this->db->insert('tb_target', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data sasaran telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data sasaran!');
		redirect('renstra');

	}

	public function input_program(){

		$cek_angka1 = $this->input->post('a_tahun_1');
		$a_tahun_1 = str_replace(",", "", $cek_angka1);
		$cek_angka2 = $this->input->post('a_tahun_2');
		$a_tahun_2 = str_replace(",", "", $cek_angka2);
		$cek_angka3 = $this->input->post('a_tahun_3');
		$a_tahun_3 = str_replace(",", "", $cek_angka3);
		$cek_angka4 = $this->input->post('a_tahun_4');
		$a_tahun_4 = str_replace(",", "", $cek_angka4);
		$cek_angka5 = $this->input->post('a_tahun_5');
		$a_tahun_5 = str_replace(",", "", $cek_angka5);

		function random_word($id = 30){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
		}

		$random = random_word(30);
				
		$data = [
			'id_program' => htmlspecialchars($random),
			'id_jenis_program' => htmlspecialchars($this->input->post('id_jenis_program', true)),
			'sasaran_program' => htmlspecialchars($this->input->post('sasaran_program', true)),
			'indikator_kinerja_program' => htmlspecialchars($this->input->post('indikator_kinerja_program', true)),
			'formulasi_indikator_program' => htmlspecialchars($this->input->post('formulasi_indikator_program', true)),
			'satuan_program' => htmlspecialchars($this->input->post('satuan_program', true)),
			'id_sasaran' => htmlspecialchars($this->input->post('id_sasaran', true)),
			];

		$this->db->insert('tb_program', $data);

		$data = [
			'id_program' => htmlspecialchars($random),
			'tahun_program' => htmlspecialchars($this->input->post('tahun_1', true)),
			'target_anggaran' => htmlspecialchars($a_tahun_1),
			'target_fisik' => htmlspecialchars($this->input->post('f_tahun_1', true)),
			'status_program' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];

		$this->db->insert('tb_target_program', $data);

		$data = [
			'id_program' => htmlspecialchars($random),
			'tahun_program' => htmlspecialchars($this->input->post('tahun_2', true)),
			'target_anggaran' => htmlspecialchars($a_tahun_2),
			'target_fisik' => htmlspecialchars($this->input->post('f_tahun_2', true)),
			'status_program' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];

		$this->db->insert('tb_target_program', $data);

		$data = [
			'id_program' => htmlspecialchars($random),
			'tahun_program' => htmlspecialchars($this->input->post('tahun_3', true)),
			'target_anggaran' => htmlspecialchars($a_tahun_3),
			'target_fisik' => htmlspecialchars($this->input->post('f_tahun_3', true)),
			'status_program' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];

		$this->db->insert('tb_target_program', $data);

		$data = [
			'id_program' => htmlspecialchars($random),
			'tahun_program' => htmlspecialchars($this->input->post('tahun_4', true)),
			'target_anggaran' => htmlspecialchars($a_tahun_4),
			'target_fisik' => htmlspecialchars($this->input->post('f_tahun_4', true)),
			'status_program' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];

		$this->db->insert('tb_target_program', $data);

		$data = [
			'id_program' => htmlspecialchars($random),
			'tahun_program' => htmlspecialchars($this->input->post('tahun_5', true)),
			'target_anggaran' => htmlspecialchars($a_tahun_5),
			'target_fisik' => htmlspecialchars($this->input->post('f_tahun_5', true)),
			'status_program' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];

		$this->db->insert('tb_target_program', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data program telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data program!');
		redirect('renstra/tambah_program/'.$this->input->post('id_sasaran'));

	}

	public function input_kegiatan(){

		$cek_angka1 = $this->input->post('ka_tahun_1');
		$ka_tahun_1 = str_replace(",", "", $cek_angka1);
		$cek_angka2 = $this->input->post('ka_tahun_2');
		$ka_tahun_2 = str_replace(",", "", $cek_angka2);
		$cek_angka3 = $this->input->post('ka_tahun_3');
		$ka_tahun_3 = str_replace(",", "", $cek_angka3);
		$cek_angka4 = $this->input->post('ka_tahun_4');
		$ka_tahun_4 = str_replace(",", "", $cek_angka4);
		$cek_angka5 = $this->input->post('ka_tahun_5');
		$ka_tahun_5 = str_replace(",", "", $cek_angka5);

		function random_word($id = 30){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
		}

		$random = random_word(30);
				
		$data = [
			'id_kegiatan' => htmlspecialchars($random),
			'id_jenis_kegiatan' => htmlspecialchars($this->input->post('id_jenis_kegiatan', true)),
			'sasaran_kegiatan' => htmlspecialchars($this->input->post('sasaran_kegiatan', true)),
			'indikator_kinerja_kegiatan' => htmlspecialchars($this->input->post('indikator_kinerja_kegiatan', true)),
			'satuan_kegiatan' => htmlspecialchars($this->input->post('satuan_kegiatan', true)),
			'id_program' => htmlspecialchars($this->input->post('id_program', true)),
			];

		$this->db->insert('tb_kegiatan', $data);

		$data = [
			'id_kegiatan' => htmlspecialchars($random),
			'tahun_kegiatan' => htmlspecialchars($this->input->post('tahun_1', true)),
			'target_anggaran_keg' => htmlspecialchars($ka_tahun_1),
			'target_fisik_keg' => htmlspecialchars($this->input->post('kf_tahun_1', true)),
			'status_kegiatan' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];
		$this->db->insert('tb_target_kegiatan', $data);

		$data = [
			'id_kegiatan' => htmlspecialchars($random),
			'tahun_kegiatan' => htmlspecialchars($this->input->post('tahun_2', true)),
			'target_anggaran_keg' => htmlspecialchars($ka_tahun_2),
			'target_fisik_keg' => htmlspecialchars($this->input->post('kf_tahun_2', true)),
			'status_kegiatan' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];
		$this->db->insert('tb_target_kegiatan', $data);

		$data = [
			'id_kegiatan' => htmlspecialchars($random),
			'tahun_kegiatan' => htmlspecialchars($this->input->post('tahun_3', true)),
			'target_anggaran_keg' => htmlspecialchars($ka_tahun_3),
			'target_fisik_keg' => htmlspecialchars($this->input->post('kf_tahun_3', true)),
			'status_kegiatan' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];
		$this->db->insert('tb_target_kegiatan', $data);

		$data = [
			'id_kegiatan' => htmlspecialchars($random),
			'tahun_kegiatan' => htmlspecialchars($this->input->post('tahun_4', true)),
			'target_anggaran_keg' => htmlspecialchars($ka_tahun_4),
			'target_fisik_keg' => htmlspecialchars($this->input->post('kf_tahun_4', true)),
			'status_kegiatan' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];
		$this->db->insert('tb_target_kegiatan', $data);

		$data = [
			'id_kegiatan' => htmlspecialchars($random),
			'tahun_kegiatan' => htmlspecialchars($this->input->post('tahun_5', true)),
			'target_anggaran_keg' => htmlspecialchars($ka_tahun_5),
			'target_fisik_keg' => htmlspecialchars($this->input->post('kf_tahun_5', true)),
			'status_kegiatan' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];
		$this->db->insert('tb_target_kegiatan', $data);


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data kegiatan telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data kegiatan!');
		redirect('renstra/tambah_kegiatan/'.$this->input->post('id_program'));

	}

	public function input_sub_kegiatan(){

		$cek_angka1 = $this->input->post('sa_tahun_1');
		$sa_tahun_1 = str_replace(",", "", $cek_angka1);
		$cek_angka2 = $this->input->post('sa_tahun_2');
		$sa_tahun_2 = str_replace(",", "", $cek_angka2);
		$cek_angka3 = $this->input->post('sa_tahun_3');
		$sa_tahun_3 = str_replace(",", "", $cek_angka3);
		$cek_angka4 = $this->input->post('sa_tahun_4');
		$sa_tahun_4 = str_replace(",", "", $cek_angka4);
		$cek_angka5 = $this->input->post('sa_tahun_5');
		$sa_tahun_5 = str_replace(",", "", $cek_angka5);

		function random_word($id = 30){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
		}

		$random = random_word(30);
				
		$data = [
			'id_sub_kegiatan' => htmlspecialchars($random),
			'id_jenis_sub_kegiatan' => htmlspecialchars($this->input->post('id_jenis_sub_kegiatan', true)),
			'sasaran_sub_kegiatan' => htmlspecialchars($this->input->post('sasaran_sub_kegiatan', true)),
			'indikator_kinerja_sub_kegiatan' => htmlspecialchars($this->input->post('indikator_kinerja_sub_kegiatan', true)),
			'satuan_sub_kegiatan' => htmlspecialchars($this->input->post('satuan_sub_kegiatan', true)),
			'id_kegiatan' => htmlspecialchars($this->input->post('id_kegiatan', true)),
			];

		$this->db->insert('tb_sub_kegiatan', $data);

		$data = [
			'id_sub_kegiatan' => htmlspecialchars($random),
			'tahun_sub' => htmlspecialchars($this->input->post('tahun_1', true)),
			'target_anggaran_sub' => htmlspecialchars($sa_tahun_1),
			'target_fisik_sub' => htmlspecialchars($this->input->post('sf_tahun_1', true)),
			'status_sub' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];
		$this->db->insert('tb_target_sub', $data);

		$data = [
			'id_sub_kegiatan' => htmlspecialchars($random),
			'tahun_sub' => htmlspecialchars($this->input->post('tahun_2', true)),
			'target_anggaran_sub' => htmlspecialchars($sa_tahun_2),
			'target_fisik_sub' => htmlspecialchars($this->input->post('sf_tahun_2', true)),
			'status_sub' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];
		$this->db->insert('tb_target_sub', $data);

		$data = [
			'id_sub_kegiatan' => htmlspecialchars($random),
			'tahun_sub' => htmlspecialchars($this->input->post('tahun_3', true)),
			'target_anggaran_sub' => htmlspecialchars($sa_tahun_3),
			'target_fisik_sub' => htmlspecialchars($this->input->post('sf_tahun_3', true)),
			'status_sub' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];
		$this->db->insert('tb_target_sub', $data);

		$data = [
			'id_sub_kegiatan' => htmlspecialchars($random),
			'tahun_sub' => htmlspecialchars($this->input->post('tahun_4', true)),
			'target_anggaran_sub' => htmlspecialchars($sa_tahun_4),
			'target_fisik_sub' => htmlspecialchars($this->input->post('sf_tahun_4', true)),
			'status_sub' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];
		$this->db->insert('tb_target_sub', $data);

		$data = [
			'id_sub_kegiatan' => htmlspecialchars($random),
			'tahun_sub' => htmlspecialchars($this->input->post('tahun_5', true)),
			'target_anggaran_sub' => htmlspecialchars($sa_tahun_5),
			'target_fisik_sub' => htmlspecialchars($this->input->post('sf_tahun_5', true)),
			'status_sub' => htmlspecialchars("tunggu"),
			'status_dua' => htmlspecialchars("tunggu"),
			'status_tiga' => htmlspecialchars("tunggu"),
			];
		$this->db->insert('tb_target_sub', $data);


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data sub_kegiatan telah ditambahkan!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Berhasil menambahkan Data sub kegiatan!');
		redirect('renstra/tambah_sub_kegiatan/'.$this->input->post('id_kegiatan'));

	}

	public function edit_sasaran($id){

		$data['title'] = 'Renstra';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$data['sasaran_data'] = $this->db->get_where('tb_sasaran', ['id_sasaran' => $id])->row_array();

		$data['target'] = $this->db->get_where('tb_target', ['id_sasaran' => $id])->result_array();

		$data['jenis_sasaran'] = $this->db->get_where('tb_jenis_sasaran')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('renstra/edit_sasaran', $data);
		$this->load->view('templates/footer');
	}

	public function edit_program($id){

		$data['title'] = 'Renstra';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$data['program_data'] = $this->db->get_where('tb_program', ['id_program' => $id])->row_array();

		$data['jenis_program'] = $this->db->get_where('tb_jenis_program')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('renstra/edit_program', $data);
		$this->load->view('templates/footer');
	}

	public function edit_kegiatan($id){

		$data['title'] = 'Renstra';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$data['kegiatan_data'] = $this->db->get_where('tb_kegiatan', ['id_kegiatan' => $id])->row_array();

		$data['jenis_kegiatan'] = $this->db->get_where('tb_jenis_kegiatan')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('renstra/edit_kegiatan', $data);
		$this->load->view('templates/footer');
	}

	public function edit_sub_kegiatan($id){

		$data['title'] = 'Renstra';
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data['user'] = $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array();

		$this->db->join('tb_kegiatan', 'tb_kegiatan.id_kegiatan=tb_sub_kegiatan.id_kegiatan');
		$this->db->join('tb_jenis_kegiatan', 'tb_jenis_kegiatan.id_jenis_kegiatan=tb_kegiatan.id_jenis_kegiatan');
		$this->db->join('tb_program', 'tb_program.id_program=tb_kegiatan.id_program');
		$this->db->join('tb_jenis_program', 'tb_jenis_program.id_jenis_program=tb_program.id_jenis_program');
		$this->db->join('tb_sasaran', 'tb_sasaran.id_sasaran=tb_program.id_sasaran');
		$this->db->join('tb_jenis_sasaran', 'tb_jenis_sasaran.id_jenis_sasaran=tb_sasaran.id_jenis_sasaran');
		$this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
		$data['sub_kegiatan_data'] = $this->db->get_where('tb_sub_kegiatan', ['id_sub_kegiatan' => $id])->row_array();

		$data['jenis_sub_kegiatan'] = $this->db->get_where('tb_jenis_sub_kegiatan')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('renstra/edit_sub_kegiatan', $data);
		$this->load->view('templates/footer');
	}

	public function edit_proses_sasaran(){

		$this->session->set_userdata('kode_aktif', 'sasaran');

		$id_jenis_sasaran = $this->input->post('id_jenis_sasaran');
		$indikator_kerja = $this->input->post('indikator_kerja');
		$formulasi_indikator = $this->input->post('formulasi_indikator');
		$satuan = $this->input->post('satuan');
		$tahun_1 = $this->input->post('tahun_1');
		$tahun_2 = $this->input->post('tahun_2');
		$tahun_3 = $this->input->post('tahun_3');
		$tahun_4 = $this->input->post('tahun_4');
		$tahun_5 = $this->input->post('tahun_5');
		$t_tahun_1 = $this->input->post('t_tahun_1');
		$t_tahun_2 = $this->input->post('t_tahun_2');
		$t_tahun_3 = $this->input->post('t_tahun_3');
		$t_tahun_4 = $this->input->post('t_tahun_4');
		$t_tahun_5 = $this->input->post('t_tahun_5');
		$id_sasaran = $this->input->post('id_sasaran');
		$this->db->set('indikator_kerja', $indikator_kerja);
		$this->db->set('id_jenis_sasaran', $id_jenis_sasaran);
		$this->db->set('formulasi_indikator', $formulasi_indikator);
		$this->db->set('satuan', $satuan);
		$this->db->set('tahun_1', $tahun_1);
		$this->db->set('tahun_2', $tahun_2);
		$this->db->set('tahun_3', $tahun_3);
		$this->db->set('tahun_4', $tahun_4);
		$this->db->set('tahun_5', $tahun_5);
		$this->db->set('t_tahun_1', $t_tahun_1);
		$this->db->set('t_tahun_2', $t_tahun_2);
		$this->db->set('t_tahun_3', $t_tahun_3);
		$this->db->set('t_tahun_4', $t_tahun_4);
		$this->db->set('t_tahun_5', $t_tahun_5);
		$this->db->where('id_sasaran', $id_sasaran);
		$this->db->update('tb_sasaran');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data sasaran telah diperbaharui!');
		redirect('renstra');

	}

	public function edit_proses_program(){

		$this->session->set_userdata('kode_aktif', 'sasaran');

		$id_jenis_program = $this->input->post('id_jenis_program');
		$indikator_kinerja_program = $this->input->post('indikator_kinerja_program');
		$formulasi_indikator_program = $this->input->post('formulasi_indikator_program');
		$satuan_program = $this->input->post('satuan_program');
		$sasaran_program = $this->input->post('sasaran_program');
		$f_tahun_1 = $this->input->post('f_tahun_1');
		$f_tahun_2 = $this->input->post('f_tahun_2');
		$f_tahun_3 = $this->input->post('f_tahun_3');
		$f_tahun_4 = $this->input->post('f_tahun_4');
		$f_tahun_5 = $this->input->post('f_tahun_5');
		$cek_angka1 = $this->input->post('a_tahun_1');
		$a_tahun_1 = str_replace(",", "", $cek_angka1);
		$cek_angka2 = $this->input->post('a_tahun_2');
		$a_tahun_2 = str_replace(",", "", $cek_angka2);
		$cek_angka3 = $this->input->post('a_tahun_3');
		$a_tahun_3 = str_replace(",", "", $cek_angka3);
		$cek_angka4 = $this->input->post('a_tahun_4');
		$a_tahun_4 = str_replace(",", "", $cek_angka4);
		$cek_angka5 = $this->input->post('a_tahun_5');
		$a_tahun_5 = str_replace(",", "", $cek_angka5);
		$id_program = $this->input->post('id_program');
		$this->db->set('indikator_kinerja_program', $indikator_kinerja_program);
		$this->db->set('id_jenis_program', $id_jenis_program);
		$this->db->set('formulasi_indikator_program', $formulasi_indikator_program);
		$this->db->set('satuan_program', $satuan_program);
		$this->db->set('sasaran_program', $sasaran_program);
		$this->db->set('f_tahun_1', $f_tahun_1);
		$this->db->set('f_tahun_2', $f_tahun_2);
		$this->db->set('f_tahun_3', $f_tahun_3);
		$this->db->set('f_tahun_4', $f_tahun_4);
		$this->db->set('f_tahun_5', $f_tahun_5);
		$this->db->set('a_tahun_1', $a_tahun_1);
		$this->db->set('a_tahun_2', $a_tahun_2);
		$this->db->set('a_tahun_3', $a_tahun_3);
		$this->db->set('a_tahun_4', $a_tahun_4);
		$this->db->set('a_tahun_5', $a_tahun_5);
		$this->db->where('id_program', $id_program);
		$this->db->update('tb_program');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data program telah diperbaharui!');
		redirect('renstra/tambah_program/'.$this->input->post('id_sasaran'));

	}

	public function edit_proses_kegiatan(){

		$this->session->set_userdata('kode_aktif', 'sasaran');

		$id_jenis_kegiatan = $this->input->post('id_jenis_kegiatan');
		$indikator_kinerja_kegiatan = $this->input->post('indikator_kinerja_kegiatan');
		$satuan_kegiatan = $this->input->post('satuan_kegiatan');
		$sasaran_kegiatan = $this->input->post('sasaran_kegiatan');
		$kf_tahun_1 = $this->input->post('kf_tahun_1');
		$kf_tahun_2 = $this->input->post('kf_tahun_2');
		$kf_tahun_3 = $this->input->post('kf_tahun_3');
		$kf_tahun_4 = $this->input->post('kf_tahun_4');
		$kf_tahun_5 = $this->input->post('kf_tahun_5');
		$cek_angka1 = $this->input->post('ka_tahun_1');
		$ka_tahun_1 = str_replace(",", "", $cek_angka1);
		$cek_angka2 = $this->input->post('ka_tahun_2');
		$ka_tahun_2 = str_replace(",", "", $cek_angka2);
		$cek_angka3 = $this->input->post('ka_tahun_3');
		$ka_tahun_3 = str_replace(",", "", $cek_angka3);
		$cek_angka4 = $this->input->post('ka_tahun_4');
		$ka_tahun_4 = str_replace(",", "", $cek_angka4);
		$cek_angka5 = $this->input->post('ka_tahun_5');
		$ka_tahun_5 = str_replace(",", "", $cek_angka5);
		$id_kegiatan = $this->input->post('id_kegiatan');
		$this->db->set('indikator_kinerja_kegiatan', $indikator_kinerja_kegiatan);
		$this->db->set('id_jenis_kegiatan', $id_jenis_kegiatan);
		$this->db->set('satuan_kegiatan', $satuan_kegiatan);
		$this->db->set('sasaran_kegiatan', $sasaran_kegiatan);
		$this->db->set('kf_tahun_1', $kf_tahun_1);
		$this->db->set('kf_tahun_2', $kf_tahun_2);
		$this->db->set('kf_tahun_3', $kf_tahun_3);
		$this->db->set('kf_tahun_4', $kf_tahun_4);
		$this->db->set('kf_tahun_5', $kf_tahun_5);
		$this->db->set('ka_tahun_1', $ka_tahun_1);
		$this->db->set('ka_tahun_2', $ka_tahun_2);
		$this->db->set('ka_tahun_3', $ka_tahun_3);
		$this->db->set('ka_tahun_4', $ka_tahun_4);
		$this->db->set('ka_tahun_5', $ka_tahun_5);
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update('tb_kegiatan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data kegiatan telah diperbaharui!');
		redirect('renstra/tambah_kegiatan/'.$this->input->post('id_program'));

	}

	public function edit_proses_sub_kegiatan(){

		$this->session->set_userdata('kode_aktif', 'sasaran');

		$id_jenis_sub_kegiatan = $this->input->post('id_jenis_sub_kegiatan');
		$indikator_kinerja_sub_kegiatan = $this->input->post('indikator_kinerja_sub_kegiatan');
		$satuan_sub_kegiatan = $this->input->post('satuan_sub_kegiatan');
		$sasaran_sub_kegiatan = $this->input->post('sasaran_sub_kegiatan');
		$sf_tahun_1 = $this->input->post('sf_tahun_1');
		$sf_tahun_2 = $this->input->post('sf_tahun_2');
		$sf_tahun_3 = $this->input->post('sf_tahun_3');
		$sf_tahun_4 = $this->input->post('sf_tahun_4');
		$sf_tahun_5 = $this->input->post('sf_tahun_5');
		$cek_angka1 = $this->input->post('sa_tahun_1');
		$sa_tahun_1 = str_replace(",", "", $cek_angka1);
		$cek_angka2 = $this->input->post('sa_tahun_2');
		$sa_tahun_2 = str_replace(",", "", $cek_angka2);
		$cek_angka3 = $this->input->post('sa_tahun_3');
		$sa_tahun_3 = str_replace(",", "", $cek_angka3);
		$cek_angka4 = $this->input->post('sa_tahun_4');
		$sa_tahun_4 = str_replace(",", "", $cek_angka4);
		$cek_angka5 = $this->input->post('sa_tahun_5');
		$sa_tahun_5 = str_replace(",", "", $cek_angka5);
		$id_sub_kegiatan = $this->input->post('id_sub_kegiatan');
		$this->db->set('indikator_kinerja_sub_kegiatan', $indikator_kinerja_sub_kegiatan);
		$this->db->set('id_jenis_sub_kegiatan', $id_jenis_sub_kegiatan);
		$this->db->set('satuan_sub_kegiatan', $satuan_sub_kegiatan);
		$this->db->set('sasaran_sub_kegiatan', $sasaran_sub_kegiatan);
		$this->db->set('sf_tahun_1', $sf_tahun_1);
		$this->db->set('sf_tahun_2', $sf_tahun_2);
		$this->db->set('sf_tahun_3', $sf_tahun_3);
		$this->db->set('sf_tahun_4', $sf_tahun_4);
		$this->db->set('sf_tahun_5', $sf_tahun_5);
		$this->db->set('sa_tahun_1', $sa_tahun_1);
		$this->db->set('sa_tahun_2', $sa_tahun_2);
		$this->db->set('sa_tahun_3', $sa_tahun_3);
		$this->db->set('sa_tahun_4', $sa_tahun_4);
		$this->db->set('sa_tahun_5', $sa_tahun_5);
		$this->db->where('id_sub_kegiatan', $id_sub_kegiatan);
		$this->db->update('tb_sub_kegiatan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Data sub kegiatan telah diperbaharui!');
		redirect('renstra/tambah_sub_kegiatan/'.$this->input->post('id_kegiatan'));

	}

} 