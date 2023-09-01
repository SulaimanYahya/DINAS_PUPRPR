<?php
class m_Pembayaran extends CI_Model
{
	function save()
	{
		$id_belanja = $this->input->post('id_belanja');
		$lalu = masterGetId('total_realisasi', 'tb_belanja', 'id_belanja', dekrip($id_belanja));
		$sekarang = cleanKarakter($this->input->post('jml_yg_diminta'));
		$total_realisasi = $lalu + $sekarang;

		$data = [
			'id_belanja'        => dekrip($this->input->post('id_belanja')),
			'no_kwitansi'       => $this->input->post('no_kwitansi'),
			'jenis_pembayaran'  => $this->input->post('jenis_pembayaran'),
			'jumlah'            => cleanKarakter($this->input->post('jml_yg_diminta')),
			'no_spm'            => $this->input->post('no_spm'),
			'tgl_spm'           => $this->input->post('tgl_spm'),
			'nilai'             => cleanKarakter($this->input->post('nilai')),
			'jml_angg'          => cleanKarakter($this->input->post('jml_angg')),
			'realisasi'         => $total_realisasi,
			'sisa_angg1'        => cleanKarakter($this->input->post('sisa_angg1')),
			'jml_diminta'       => cleanKarakter($this->input->post('jml_yg_diminta')),
			'sisa_angg2'        => cleanKarakter($this->input->post('sisa_angg2')),
			'id_prog'           => $this->input->post('id_prog'),
			'id_keg'            => $this->input->post('id_keg'),
			'id_subkeg'         => $this->input->post('id_subkeg'),
			'ppn'               => $this->input->post('ppn'),
			'pph21'             => $this->input->post('pph21'),
			'pph22'             => $this->input->post('pph22'),
			'pph23'             => $this->input->post('pph23'),
			'pph25'             => $this->input->post('pph25'),
			'bendahara'         => $this->input->post('bendahara'),
			'penerima'          => $this->input->post('penerima'),
			'pengguna_angg'     => $this->input->post('pengguna_angg'),
			'kode_spm'          => dekrip(getKodePembayaran()),
			'status'            => 'PROCESS'
		];
		$this->db->insert('tb_pembayaran', $data);
		if ($this->db->affected_rows() > 0) {
			$this->db->where('id_belanja', dekrip($this->input->post('id_belanja'))); // Update the user with id = 1
			$this->db->set('total_realisasi', $total_realisasi);
			$this->db->update('tb_belanja');
			return redirect(base_url('homekeu'));
		} else {
			echo "SISTEM GAGAL..!!";
		}
	}
}
