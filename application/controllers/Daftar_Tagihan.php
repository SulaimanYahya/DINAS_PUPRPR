<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_Tagihan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
		$this->load->model('m_pju', 'M_PJU');
	}

	public function index($kode)
	{
		if ($kode == 'F1') {
			$data = [
				'title'  => 'Daftar Tagihan Format 1',
				'list' => $this->db->get('tb_spm')->result(),
				'user'   => $this->db->query("SELECT * FROM tb_admin 
									  INNER JOIN tb_role ON tb_role.id_role=tb_admin.id_role 
									  WHERE username='$_SESSION[username]'")->row_array(),
			];
			$this->template->load('tagihan/v_DaftarTagihan_' . $kode, $data);
		} elseif ($kode == 'F2') {
			$data = [
				'title'  => 'Daftar Tagihan Format 2',
				'list' => $this->db->get('tb_pembayaran')->result(),
				'user'   => $this->db->query("SELECT * FROM tb_admin 
									  INNER JOIN tb_role ON tb_role.id_role=tb_admin.id_role 
									  WHERE username='$_SESSION[username]'")->row_array(),
			];
			$this->template->load('tagihan/v_DaftarTagihan_' . $kode, $data);
		}
	}

	function delete($idx, $kode)
	{
		$id = dekrip($idx);
		if ($kode == 'F1') {
			$id_belanja = masterGetId('id_belanja', 'tb_spm', 'id', $id);
			$jml_diminta = masterGetId('jml_diminta', 'tb_spm', 'id', $id);
			$total_realisasi = masterGetId('total_realisasi', 'tb_belanja', 'id_belanja', $id_belanja);

			$total_realisasi_update = $total_realisasi - $jml_diminta;

			$this->db->where('id_belanja', $id_belanja); // Update the user with id = 1
			$this->db->set('total_realisasi', $total_realisasi_update);
			$this->db->update('tb_belanja');

			if ($this->db->affected_rows() > 0) {
				$this->db->where('id', $id);
				$this->db->delete('tb_spm');
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data Deleted Successfully..!!</strong></div>');
				return redirect(base_url('Daftar_Tagihan/' . $kode));
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data Deleted Failed..!!</strong></div>');
				return redirect(base_url('Daftar_Tagihan/' . $kode));
			};
		} elseif ($kode == 'F2') {
			$id_belanja = masterGetId('id_belanja', 'tb_pembayaran', 'id', $id);
			$jml_diminta = masterGetId('jml_diminta', 'tb_pembayaran', 'id', $id);
			$total_realisasi = masterGetId('total_realisasi', 'tb_belanja', 'id_belanja', $id_belanja);

			$total_realisasi_update = $total_realisasi - $jml_diminta;

			$this->db->where('id_belanja', $id_belanja); // Update the user with id = 1
			$this->db->set('total_realisasi', $total_realisasi_update);
			$this->db->update('tb_belanja');

			if ($this->db->affected_rows() > 0) {
				$this->db->where('id', $id);
				$this->db->delete('tb_pembayaran');
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data Deleted Successfully..!!</strong></div>');
				return redirect(base_url('Daftar_Tagihan/' . $kode));
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data Deleted Failed..!!</strong></div>');
				return redirect(base_url('Daftar_Tagihan/' . $kode));
			};
		}
	}
}
