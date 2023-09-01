<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
		$this->load->model('m_pju', 'M_PJU');
	}

	public function index($id = 0, $id_prog = 0, $id_keg = 0, $id_subkeg = 0)
	{
		// $this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');

		// $this->db->join('tb_kp_belanja', 'tb_kp_belanja.id_kp_belanja=tb_belanja.id_kp_belanja');
		$id_kp_belanja = masterGetId('id_kp_belanja', 'tb_belanja', 'id_belanja', dekrip($id));
		$id_rek = masterGetId('id_rek', 'tb_kp_belanja', 'id_kp_belanja', $id_kp_belanja);
		$kd_rek = masterGetId('no_rek', 'tb_rek', 'id_rek', $id_rek);


		$data = [
			'title'  => 'TAGIHAN',
			// 'user'   => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
			'user'   => $this->db->query("SELECT * FROM tb_admin 
                                          INNER JOIN tb_role ON tb_role.id_role=tb_admin.id_role 
                                          WHERE username='$_SESSION[username]'")->row_array(),
			'kd_rek' => $kd_rek,
			'uraian' => masterGetId('uraian_belanja', 'tb_belanja', 'id_belanja', dekrip($id)),
			'program' => dekrip($id_prog),
			'jenis_program' => masterGetId(
				'nama_jenis_program',
				'tb_jenis_program',
				'id_jenis_program',
				dekrip($id_prog)
			),
			'kegiatan' => dekrip($id_keg),
			'jenis_kegiatan' => masterGetId(
				'nama_jenis_kegiatan',
				'tb_jenis_kegiatan',
				'id_jenis_kegiatan',
				dekrip($id_keg)
			),
			'subKegiatan' => dekrip($id_subkeg),
			'jenis_subkegiatan' => masterGetId('nama_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan', 'id_jenis_sub_kegiatan', dekrip($id_subkeg)),
			'id_belanja'  => dekrip($id),
			'total_anggaran'  => masterGetId('total', 'tb_belanja', 'id_belanja', dekrip($id)),
			'pegawai'       => $this->db->get('tb_pegawai')->result(),
			'jabatan'       => $this->db->get('tb_role_respon')->result(),
			'realisasilalu' => masterGetId('total_realisasi', 'tb_belanja', 'id_belanja', dekrip($id)),
		];

		$this->template->load('tagihan/index', $data);
	}

	function riwayat()
	{
		$this->db->join('tb_role', 'tb_role.id_role=tb_admin.id_role');
		$data = [
			'title'  => 'TAGIHAN',
			'user'   => $this->db->get_where('tb_admin', ['username' => $this->session->userdata('username')])->row_array(),
			'list'   => $this->M_PJU->getDataTagihan()
		];

		$this->template->load('tagihan/v_DaftarTagihan', $data);
	}

	public function delSession($index = '', $seg1, $seg2, $seg3, $seg4)
	{
		if ($index != '') {
			unset($_SESSION['data_array'][$index]);
			redirect(base_url("tagihan/$seg1/$seg2/$seg3/$seg4"));
		}
	}

	function HapusRiwayat($id)
	{
		$this->db->delete('tb_spm', ['id' => dekrip($id)]);
		return redirect(base_url('tagihan/riwayat'));
	}

	public function simpan($aksi = '')
	{
		if ($aksi == '') {
			$this->M_PJU->save();
		} elseif ($aksi == 'edit') {
			$this->M_PJU->updateLampiran();
		} else {
			$this->M_PJU->saveLampiran();
		}
	}

	function hapusLampiran($id)
	{
		$this->db->delete('tb_lampiran_format1', ['id' => dekrip($id)]);
		return redirect(base_url('tagihan/lampiran/1'));
	}
}
