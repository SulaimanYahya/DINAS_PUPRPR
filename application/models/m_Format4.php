<?php
class m_Format4 extends CI_Model
{
	function save()
	{
		$kode = getKodeSPM();
		$this->db->set('kode', $kode);
		$this->db->insert('tb_kode');

		$id_belanja = $this->input->post('id_belanja');
		$lalu = masterGetId('total_realisasi', 'tb_belanja', 'id_belanja', dekrip($id_belanja));
		$sekarang = cleanKarakter($this->input->post('jml_diminta'));
		$total_realisasi = $lalu + $sekarang;

		$data = [
			'id_belanja'        => dekrip($id_belanja),
			'bendahara'         => $this->input->post('bendahara'),
			'penerima'          => $this->input->post('penerima'),
			'pengguna_angg'     => $this->input->post('pengguna_angg'),
			'ppk_keuangan'      => $this->input->post('ppk_keuangan'),
			'ppk'               => $this->input->post('ppk'),
			'kadis'             => $this->input->post('kadis'),
			'no_spm'            => $this->input->post('no_spm'),
			'no_sppls'          => $this->input->post('no_sppls'),
			'no_kwitansi'       => $this->input->post('no_kwitansi'),
			'jenis_pembayaran'  => $this->input->post('jenis_pembayaran'),
			'tgl_spm'           => $this->input->post('tgl_spm'),
			'nilai'             => cleanKarakter($this->input->post('nilai')),
			'jml_angg'          => cleanKarakter($this->input->post('jml_angg')),
			'realisasi'         => cleanKarakter($this->input->post('realisasi')),
			'sisa_angg1'        => cleanKarakter($this->input->post('sisa_angg1')),
			'jml_diminta'       => cleanKarakter($this->input->post('jml_diminta')),
			'sisa_angg2'        => cleanKarakter($this->input->post('sisa_angg2')),
			'id_prog'           => $this->input->post('id_prog'),
			'id_keg'            => $this->input->post('id_keg'),
			'id_subkeg'         => $this->input->post('id_subkeg'),
			'ppn'               => $this->input->post('ppn'),
			'pph21'             => $this->input->post('pph21'),
			'pph22'             => $this->input->post('pph22'),
			'pph23'             => $this->input->post('pph23'),
			'pph25'             => $this->input->post('pph25'),
			'kode_spm'          => $kode,
			'status'            => 'PROCESS'
		];
		$this->db->insert('tb_format4', $data);
		if ($this->db->affected_rows() > 0) {
			$this->db->where('id_belanja', dekrip($id_belanja)); // Update the user with id = 1
			$this->db->set('total_realisasi', $total_realisasi);
			$this->db->update('tb_belanja');
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data Tagihan <strong>Berhasil</strong> Di input</div>');
			return redirect('Daftar_Tagihan/F4');
		} else {
			echo "SISTEM GAGAL..!!";
		}
		return redirect(base_url('homekeu'));
	}

	function simpanLampiran()
	{
		$kode = getKodeSPM();
		$this->db->set('kode', $kode);
		$this->db->insert('tb_kode');

		$data = [
			'id_pegawai' 		 => $this->input->post('id_pegawai'),
			'jml_honor_perbulan' => cleanKarakter($this->input->post('jml_honor_perbulan')),
			'jml_honor' 		 => cleanKarakter($this->input->post('jml_honor')),
			'pph_pasal21' 		 => cleanKarakter($this->input->post('pph_pasal21')),
			'jml_diterima' 		 => cleanKarakter($this->input->post('jml_diterima')),
			'ket' 				 => cleanKarakter($this->input->post('ket')),
		];

		$this->db->insert('tb_lampiran_format4', $data);
		return redirect(base_url('lampiran/lamp4'));
	}
}
