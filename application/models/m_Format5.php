<?php
class m_Format5 extends CI_Model
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
			'id_belanja'                     => dekrip($id_belanja),
			'kuasa_pengguna_anggaran'        => $this->input->post('kuasa_pengguna_anggaran'),
			'pejabat_penetausahaan_anggaran' => $this->input->post('pejabat_penetausahaan_anggaran'),
			'pejabat_pembuat_komite'         => $this->input->post('pejabat_pembuat_komite'),
			'bendahara_pengeluaran_pembantu' => $this->input->post('bendahara_pengeluaran_pembantu'),
			'surat_pernyataan_nosurat'       => $this->input->post('surat_pernyataan_nosurat'),
			'surat_pernyataan_tanggal'       => $this->input->post('surat_pernyataan_tanggal'),
			'surat_pernyataan_besaran'       => $this->input->post('surat_pernyataan_besaran'),
			'surat_pernyataan_ppk_keuangan'  => $this->input->post('surat_pernyataan_ppk_keuangan'),
			'kwintasi_tahun_anggaran'        => $this->input->post('kwintasi_tahun_anggaran'),
			'kwitansi_jumlah_uang'           => $this->input->post('kwitansi_jumlah_uang'),
			'kwitansi_untuk_pembayaran'      => $this->input->post('kwitansi_untuk_pembayaran'),
			'kwitansi_pptk'                  => $this->input->post('kwitansi_pptk'),
			'kwitansi_pihak_penyedia'        => $this->input->post('kwitansi_pihak_penyedia'),
			'kwitansi_nama_perusahaan'       => $this->input->post('kwitansi_nama_perusahaan'),
			'bap_nobap'                      => $this->input->post('bap_nobap'),
			'bap_pihak_kesatu'               => $this->input->post('bap_pihak_kesatu'),
			'bap_pihak_kedua'                => $this->input->post('bap_pihak_kedua'),
			'bap_pekerjaan'                  => $this->input->post('bap_pekerjaan'),
			'bap_npwp'                       => $this->input->post('bap_npwp'),
			'bap_norek'                      => $this->input->post('bap_norek'),
			'bap_bank'                       => $this->input->post('bap_bank'),
			'bap_nokotrak'                   => $this->input->post('bap_nokotrak'),
			'bap_tgl_kontrak'                => $this->input->post('bap_tgl_kontrak'),
			'bap_noamandemen'                => $this->input->post('bap_noamandemen'),
			'bap_tgl_amandemen'              => $this->input->post('bap_tgl_amandemen'),
			'bap_nilai_kotrak'               => $this->input->post('bap_nilai_kotrak'),
			'bap_pembayaran'                 => $this->input->post('bap_pembayaran'),
			'bap_pot40'                      => $this->input->post('bap_pot40'),
			'bap_realisasi_bln_lalu'         => $this->input->post('bap_realisasi_bln_lalu'),
			'bap_pot0'                       => $this->input->post('bap_pot0'),
			'bap_pot_uang_muka'              => $this->input->post('bap_pot_uang_muka'),
			'bap_pot45'                      => $this->input->post('bap_pot45'),
			'bap_ppn11'                      => $this->input->post('bap_ppn11'),
			'bap_jml_pembayaran_fisik'       => $this->input->post('bap_jml_pembayaran_fisik'),
			'bap_pph_p4a2'                   => $this->input->post('bap_pph_p4a2'),
			'bap_pph'                        => $this->input->post('bap_pph'),
			'bap_jml_pot_pajak'              => $this->input->post('bap_jml_pot_pajak'),
			'bap_sisa_dana_pihak2'           => $this->input->post('bap_sisa_dana_pihak2'),
			'lvs_nospm'                      => $this->input->post('lvs_nospm'),
			'lvs_nospv'                      => $this->input->post('lvs_nospv'),
			'lvs_nokw'                       => $this->input->post('lvs_nokw'),
			'jenis_pembayaran'               => $this->input->post('jenis_pembayaran'),
			'tgl_spm'                        => $this->input->post('tgl_spm'),
			'nilai'                          => cleanKarakter($this->input->post('nilai')),
			'jml_angg'                       => cleanKarakter($this->input->post('jml_angg')),
			'realisasi'                      => cleanKarakter($this->input->post('realisasi')),
			'sisa_angg1'                     => cleanKarakter($this->input->post('sisa_angg1')),
			'jml_diminta'                    => cleanKarakter($this->input->post('jml_diminta')),
			'sisa_angg2'                     => cleanKarakter($this->input->post('sisa_angg2')),
			'id_prog'                        => $this->input->post('id_prog'),
			'id_keg'                         => $this->input->post('id_keg'),
			'id_subkeg'                      => $this->input->post('id_subkeg'),
			'ppn'                            => $this->input->post('ppn'),
			'pph21'                          => $this->input->post('pph21'),
			'pph22'                          => $this->input->post('pph22'),
			'pph23'                          => $this->input->post('pph23'),
			'pph25'                          => $this->input->post('pph25'),
			'kode_spm'                       => $kode,
			'status'                         => 'PROCESS',
		];
		$this->db->insert('tb_format5', $data);
		if ($this->db->affected_rows() > 0) {
			$this->db->where('id_belanja', dekrip($id_belanja)); // Update the user with id = 1
			$this->db->set('total_realisasi', $total_realisasi);
			$this->db->update('tb_belanja');
			return redirect(base_url('homekeu'));
		} else {
			echo "SISTEM GAGAL..!!";
		}
		return redirect(base_url('homekeu'));
	}

	function simpanLampiran()
	{
		$data = [
			'uraian'              => $this->input->post('uraian'),
			'nilai_fisik'         => $this->input->post('nilai_fisik'),
			'ppn'                 => $this->input->post('ppn'),
			'jumlah'              => $this->input->post('jumlah'),
			'pptk'                => $this->input->post('pptk'),
			'nama_perusahaan'     => $this->input->post('nama_perusahaan'),
			'direktur_perusahaan' => $this->input->post('direktur_perusahaan'),

		];
	}

	function tambah_pihak()
	{
		$data = [
			'nm_perusahaan' => $this->input->post('nm_perusahaan'),
			'nama' => $this->input->post('nama'),
			'jabatan' => $this->input->post('jabatan'),
		];

		$this->db->insert('tb_pihak_kedua', $data);
		return redirect(base_url('format5/pihak_kedua'));
	}

	function hapus_pihak($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_pihak_kedua');
		return redirect(base_url('format5/pihak_kedua'));
	}
}
