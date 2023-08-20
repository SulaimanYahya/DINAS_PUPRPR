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

	public function index()
	{
		$data = [
			'title'  => 'Daftar Tagihan',
			// 'user'   => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
			'user'   => $this->db->query("SELECT * FROM tb_admin 
                                          INNER JOIN tb_role ON tb_role.id_role=tb_admin.id_role 
                                          WHERE username='$_SESSION[username]'")->row_array(),
			'list' => $this->db->get('tb_spm')->result()
		];

		$this->template->load('tagihan/v_DaftarTagihan', $data);
	}

	function delete($id)
	{
		$idx = dekrip($id);
		$id_belanja = masterGetId('id_belanja', 'tb_spm', 'id', $idx);
		$jml_diminta = masterGetId('jml_diminta', 'tb_spm', 'id', $idx);
		$total_realisasi = masterGetId('total_realisasi', 'tb_belanja', 'id_belanja', $id_belanja);

		$total_realisasi_update = $total_realisasi - $jml_diminta;

		$this->db->where('id_belanja', $id_belanja); // Update the user with id = 1
		$this->db->set('total_realisasi', $total_realisasi_update);
		$this->db->update('tb_belanja');

		if ($this->db->affected_rows() > 0) {
			$this->db->where('id', $idx);
			$this->db->delete('tb_spm');
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data Deleted Successfully..!!</strong></div>');
			return redirect(base_url('daftar_tagihan'));
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Data Deleted Failed..!!</strong></div>');
			return redirect(base_url('daftar_tagihan'));
		};
	}
}
