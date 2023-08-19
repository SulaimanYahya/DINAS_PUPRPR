<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_mhs extends CI_Controller 
{


	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('nim')) {
			redirect('auth');
		}
	}


	public function index()
	{

		$data['title'] = 'Biodata';
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
		$this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=tb_prodi.id_fakultas');
		$data['user'] = $this->db->get_where('tb_mahasiswa', ['nim' => $this->session->userdata('nim')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_mhs', $data);
		$this->load->view('templates/topbar_mhs', $data);
		$this->load->view('user_mhs/index', $data);
		$this->load->view('templates/footer_mhs');

	}

	public function edit($nim)
	{

		$data['title'] = 'Biodata';
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
		$this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=tb_prodi.id_fakultas');
		$data['user'] = $this->db->get_where('tb_mahasiswa', ['nim' => $this->session->userdata('nim')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_mhs', $data);
		$this->load->view('templates/topbar_mhs', $data);
		$this->load->view('user_mhs/edit', $data);
		$this->load->view('templates/footer_mhs');

	}

	public function pass($nim)
	{

		$data['title'] = 'Biodata';
		$this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
		$this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas=tb_prodi.id_fakultas');
		$data['user'] = $this->db->get_where('tb_mahasiswa', ['nim' => $this->session->userdata('nim')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_mhs', $data);
		$this->load->view('templates/topbar_mhs', $data);
		$this->load->view('user_mhs/edit_pass', $data);
		$this->load->view('templates/footer_mhs');

	}

	public function edit_proses(){

		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image){

			$config['upload_path']          = './assets/img/gambar/';
			$config['allowed_types']        = 'jpeg|jpg|png';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')){

				$config['image_library']    = 'gd2';
				$config['source_image']     = './assets/img/gambar/'.$this->upload->data('file_name');
				$config['create_thumb']     = FALSE;
				$config['maintain_ratio']   = FALSE;
				$config['quality']			= '100%';
				$config['width']     		= 350;
				$config['height']        	= 440;
				$config['new_image']        = './assets/img/gambar/'.$this->upload->data('file_name');
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$old_image = $this->input->post('gambar_lama');
				$new_image = $this->upload->data('file_name');

				if ($old_image!='default.jpg') {
					
					unlink(FCPATH . 'assets/img/gambar/' . $old_image);
				}

				$this->db->set('foto_mhs', $new_image);

			}else {

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $this->upload->display_errors() . '</div>');
				$this->session->set_flashdata('kode_gagal', 'gagalModal');
	            $this->session->set_flashdata('pesan_gagal', 'Gagal unggah gambar, Pastikan jenis file jpeg/jpg/png ..!');
				redirect('user_mhs');
			}

		}

		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$no_wa = $this->input->post('no_wa');
		$email = $this->input->post('email');
		$npwp = $this->input->post('npwp');
		$jen_kel = $this->input->post('jen_kel');
		$nim = $this->input->post('nim');
		$this->db->set('nama', $nama);
		$this->db->set('tempat_lahir', $tempat_lahir);
		$this->db->set('nik', $nik);
		$this->db->set('tanggal_lahir', $tanggal_lahir);
		$this->db->set('no_wa', $no_wa);
		$this->db->set('email', $email);
		$this->db->set('npwp', $npwp);
		$this->db->set('jen_kel', $jen_kel);
		$this->db->where('nim', $nim);
		$this->db->update('tb_mahasiswa');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Update successed!</div>');
		$this->session->set_flashdata('kode_berhasil', 'suksesModal');
		$this->session->set_flashdata('pesan_berhasil', 'Biodata anda telah diperbaharui!');
		redirect('user_mhs');

	}

	public function pass_proses(){

		$nim = $this->input->post('nim');
		$new_pass = $this->input->post('new_pass');
		$wkt = time();
			
		$pass = password_hash($new_pass, PASSWORD_DEFAULT);

		$this->db->set('password', $pass);
		$this->db->where('nim', $nim);
		$this->db->update('tb_mahasiswa');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password has changed!</div>');
		redirect('user_mhs');

		
	}

	public function notif_tunggu(){

		$this->session->set_flashdata('kode_gagal', 'gagalModal');
        $this->session->set_flashdata('pesan_gagal', 'Maaf, Kartu Ujian Hanya Bisa Dicetak Saat Ujian Proposal Hasil dan Skripsi!');
		redirect('user_mhs');

	}

} 