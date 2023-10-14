<?php
class m_Format3 extends CI_Model
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
			'id_belanja'    => dekrip($this->input->post('id_belanja')),
			'bendahara'     => $this->input->post('bendahara'),
			'penerima'      => $this->input->post('penerima'),
			'pengguna_angg' => $this->input->post('pengguna_angg'),
			'ppk'           => $this->input->post('ppk_keuangan'),
			'pptk'          => $this->input->post('pptk'),
			'no_sppls'      => $this->input->post('no_sppls'),
			'no_spm'        => $this->input->post('no_spm'),
			'jenis_spm' 	=> $this->input->post('jenis_pembayaran'),
			'tgl_spm'       => $this->input->post('tgl_spm'),
			'jml_angg'      => $this->input->post('jml_angg'),
			'nilai'         => cleanKarakter($this->input->post('nilai')),
			'jml_angg'      => cleanKarakter($this->input->post('jml_angg')),
			'realisasi'     => cleanKarakter($this->input->post('realisasi')),
			'sisa_angg1'    => cleanKarakter($this->input->post('sisa_angg1')),
			'jml_diminta'   => cleanKarakter($this->input->post('jml_diminta')),
			'sisa_angg2'    => cleanKarakter($this->input->post('sisa_angg2')),
			'id_prog'       => $this->input->post('id_prog'),
			'id_keg'        => $this->input->post('id_keg'),
			'id_subkeg'     => $this->input->post('id_subkeg'),
			'ppn'           => $this->input->post('ppn'),
			'pph21'         => $this->input->post('pph21'),
			'pph22'         => $this->input->post('pph22'),
			'pph23'         => $this->input->post('pph23'),
			'pph25'         => $this->input->post('pph25'),
			'kode_spm'      => $kode,
			'status'        => 'PROCESS'
		];

		$this->db->insert('tb_format3', $data);
		if ($this->db->affected_rows() > 0) {
			$this->db->where('id_belanja', dekrip($this->input->post('id_belanja'))); // Update the user with id = 1
			$this->db->set('total_realisasi', $total_realisasi);
			$this->db->update('tb_belanja');
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data Tagihan <strong>Berhasil</strong> Diinput</div>');
			return redirect('Daftar_Tagihan/F3');
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
			'id_pegawai'    => $this->input->post('id_pegawai'),
			'tanggal'       => $this->input->post('tanggal'),
			'pg_dari'       => $this->input->post('pergi_dari'),
			'pg_tujuan'     => $this->input->post('pergi_tujuan'),
			'pg_jml_satuan' => cleanKarakter($this->input->post('pergi_jumlah_satuan')),
			'pg_qty'        => cleanKarakter($this->input->post('pergi_qty')),
			'pg_hari'       => cleanKarakter($this->input->post('pergi_hari')),
			'pg_total'      => cleanKarakter($this->input->post('pergi_total')),
			'pl_dari'       => $this->input->post('pulang_dari'),
			'pl_tujuan'     => $this->input->post('pulang_tujuan'),
			'pl_jml_satuan' => cleanKarakter($this->input->post('pulang_jumlah_satuan')),
			'pl_qty'        => cleanKarakter($this->input->post('pulang_qty')),
			'pl_hari'       => cleanKarakter($this->input->post('pulang_hari')),
			'pl_total'      => cleanKarakter($this->input->post('pulang_total')),

			'pangkat1'      => $this->input->post('pangkat1'),
			'jml_uh1'       => cleanKarakter($this->input->post('jml_uh1')),
			'qty_uh1'       => cleanKarakter($this->input->post('qty_uh1')),
			'jml_huh1'      => cleanKarakter($this->input->post('jml_huh1')),
			'total_uh1'     => cleanKarakter($this->input->post('total_uh1')),

			'pangkat2'      => $this->input->post('pangkat2'),
			'jml_uh2'       => cleanKarakter($this->input->post('jml_uh2')),
			'qty_uh2'       => cleanKarakter($this->input->post('qty_uh2')),
			'jml_huh2'      => cleanKarakter($this->input->post('jml_huh2')),
			'total_uh2'     => cleanKarakter($this->input->post('total_uh2')),

			'pangkat3'      => $this->input->post('pangkat3'),
			'jml_uh3'       => cleanKarakter($this->input->post('jml_uh3')),
			'qty_uh3'       => cleanKarakter($this->input->post('qty_uh3')),
			'jml_huh3'      => cleanKarakter($this->input->post('jml_huh3')),
			'total_uh3'     => cleanKarakter($this->input->post('total_uh3')),

			'tempat_penginapan1'  => $this->input->post('tempat_penginapan1'),
			'jml_up1'       => cleanKarakter($this->input->post('jml_up1')),
			'qty_up1'       => cleanKarakter($this->input->post('qty_up1')),
			'jml_hup1'      => cleanKarakter($this->input->post('jml_hup1')),
			'total_up1'     => cleanKarakter($this->input->post('total_up1')),

			'tempat_penginapan2'  => $this->input->post('tempat_penginapan2'),
			'jml_up2'       => cleanKarakter($this->input->post('jml_up2')),
			'qty_up2'       => cleanKarakter($this->input->post('qty_up2')),
			'jml_hup2'      => cleanKarakter($this->input->post('jml_hup2')),
			'total_up2'     => cleanKarakter($this->input->post('total_up2')),

			'total_semua_pp'  => cleanKarakter($this->input->post('total_semua_pp')),
			'total_semua_uh'  => cleanKarakter($this->input->post('total_semua_uh')),
			'total_semua_up'  => cleanKarakter($this->input->post('total_semua_up')),
			'total_semua'     => cleanKarakter($this->input->post('total_semua')),
			'kode_spm'        => $kode,
			'status'          => 'PROCESS',

			'transport_qty1'   => cleanKarakter($this->input->post('transport_qty1')),
			'transport_qty2'   => cleanKarakter($this->input->post('transport_qty2')),
			'transport_qty3'   => cleanKarakter($this->input->post('transport_qty3')),
			'transport_qty4'   => cleanKarakter($this->input->post('transport_qty4')),
			'transport_jml1'   => cleanKarakter($this->input->post('transport_jml1')),
			'transport_jml2'   => cleanKarakter($this->input->post('transport_jml2')),
			'transport_jml3'   => cleanKarakter($this->input->post('transport_jml3')),
			'transport_jml4'   => cleanKarakter($this->input->post('transport_jml4')),
			'transport_hasil1' => cleanKarakter($this->input->post('transport_hasil1')),
			'transport_hasil2' => cleanKarakter($this->input->post('transport_hasil2')),
			'transport_hasil3' => cleanKarakter($this->input->post('transport_hasil3')),
			'transport_hasil4' => cleanKarakter($this->input->post('transport_hasil4')),
			'rill_pp'     	   => cleanKarakter($this->input->post('rill_pp')),
		];

		$this->db->insert('tb_lampiran_format3', $data);
		return redirect(base_url('lampiran/lamp3'));
	}
}
