<div class="container-fluid">
	<h5><strong>FORM FORMAT 5</strong></h5>
	<hr>

	<div class="card">
		<div class="card-body">
			<div class="alert alert-warning" role="alert">
				<h6 class="font-weight-bold">Kode Rekening:</h6>
				<h6 class="card-title">
					<?= $kd_rek ?>
				</h6>
				<h6 class="font-weight-bold">Uraian Belanja:</h6>
				<h6 class="card-title">
					<?= $uraian ?>
				</h6>
			</div>
			<form method="POST" action="<?= base_url('format5/simpan') ?>">
				<input type="hidden" name="id_belanja" value="<?= enkrip($id_belanja) ?>" readonly>
				<div class="row">
					<div class="col-6">
						<h6><strong>Yang Bertanda tangan SPTJM: </strong></h6>
						<hr>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="ppk_keuangan">Kuasa Pengguna Anggaran</label>
									<select name="kuasa_pengguna_anggaran" id="disetujui" class="form-control form-control-sm">
										<option value="">-Pilih-</option>
										<?php $no = 1; ?>
										<?php foreach ($pegawai as $r) : ?>
											<option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
											<?php $no++; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="ppk_keuangan">Pejabat Penatausahaan Keuangan</label>
									<select name="pejabat_penetausahaan_anggaran" id="ppk_keuangan" class="form-control form-control-sm">
										<option value="">-Pilih-</option>
										<?php $no = 1; ?>
										<?php foreach ($pegawai as $r) : ?>
											<option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
											<?php $no++; ?>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6">
						<h6>.</h6>
						<hr>
						<div class="form-group">
							<label for="ppk">Pejabat Pembuat Komitmen (PPK)</label>
							<select name="pejabat_pembuat_komite" id="ppk" class="form-control form-control-sm">
								<option value="">-Pilih-</option>
								<?php $no = 1; ?>
								<?php foreach ($pegawai as $r) : ?>
									<option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
									<?php $no++ ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="bendahara">Bendahara Pengeluaran Pembantu</label>
							<select name="bendahara_pengeluaran_pembantu" id="bendahara" class="form-control form-control-sm">
								<option value="">-Pilih-</option>
								<?php $no = 1; ?>
								<?php foreach ($pegawai as $r) : ?>
									<option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
									<?php $no++; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<hr>
				<h6><strong>1. SURAT PERNYATAAN VERIFIKASI PPK-SKPD</strong></h6>
				<hr>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="no_surat">Nomor Surat Pernyataan</label>
							<input type="text" class="form-control form-control-sm" id="surat_pernyataan_nosurat" name="surat_pernyataan_nosurat">
						</div>
						<div class="form-group">
							<label for="tanggal">Tanggal</label>
							<input type="date" class="form-control form-control-sm" id="tanggal" name="surat_pernyataan_tanggal">
						</div>
						<div class="form-group">
							<label for="Besaran">Besaran</label>
							<input type="text" class="form-control form-control-sm" id="besaran" name="surat_pernyataan_besaran" placeholder="Rp.">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="ppk_keuangan_skpd">PPK Keuangan SKPD</label>
							<select class="form-control form-control-sm" name="surat_pernyataan_ppk_keuangan" id="ppk_keuangan_skpd">
								<option value="">-Pilih-</option>
								<?php $i = 1 ?>
								<?php foreach ($pegawai as $r) : ?>
									<option value="<?= $r->id ?>"><?= $i . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
									<?php $i++; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
				<h6><strong>2. KWITANSI / BUKTI PEMBAYARAN</strong></h6>
				<hr>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="tahun_anggaran">Tahun Anggaran</label>
							<input type="text" class="form-control form-control-sm" id="tahun_anggaran" name="kwintasi_tahun_anggaran">
						</div>
						<div class="form-group">
							<label for="jml_uang">Jumlah Uang</label>
							<input type="text" class="form-control form-control-sm" id="jml_uang" name="kwitansi_jumlah_uang">
						</div>
						<div class="form-group">
							<label for="untuk_pembayaran">Untuk Pembayaran</label>
							<textarea class="form-control form-control-sm" name="kwitansi_untuk_pembayaran" id="untuk_pembayaran" cols="62" rows="5"></textarea>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="PPTK">Pejabat Pelaksana Teknis Kegiatan (PPTK)</label>
							<input type="text" class="form-control form-control-sm" id="pptk" name="kwitansi_pptk">
						</div>
						<div class="form-group">
							<label for="pihak_penyedia">Pihak Penyedia</label>
							<input type="text" class="form-control form-control-sm" id="pihak_penyedia" name="kwitansi_pihak_penyedia">
						</div>
						<div class="form-group">
							<label for="nama_perusahaan">Nama Perusahaan</label>
							<input type="text" class="form-control form-control-sm" id="nama_perusahaan" name="kwitansi_nama_perusahaan">
						</div>
					</div>
				</div>
				<h6><strong>3. BERITA ACARA PEMBAYARAN</strong></h6>
				<hr>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="nomor_ba_pembayaran">Nomor Berita Acara Pembayaran</label>
							<input type="text" class="form-control form-control-sm" id="nomor_ba_pembayaran" name="bap_nobap">
						</div>
						<div class="form-group">
							<label for="pihak_kesatu">Pihak Kesatu</label>
							<select class="form-control form-control-sm" name="bap_pihak_kesatu" id="pihak_kesatu">
								<option value="">-Pilih-</option>
								<?php $i = 1 ?>
								<?php foreach ($pegawai as $r) : ?>
									<option value="<?= $r->id ?>"><?= $i . '. ' . $r->nama ?></option>
									<?php $i++; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="pihak_kedua">Pihak Kedua</label>
							<select class="form-control form-control-sm" name="bap_pihak_kedua" id="pihak_kedua">
								<option value="">-Pilih-</option>
								<?php $i = 1 ?>
								<?php foreach ($pihak_kedua as $r) : ?>
									<option value="<?= $r->id ?>"><?= $i . '. ' . $r->nama ?></option>
									<?php $i++; ?>
								<?php endforeach; ?>
							</select>
							<a href="<?= base_url('format5/pihak_kedua') ?>" target="_blank" class="text-decoration-none badge badge-primary">Tambah Pihak Kedua</a>
						</div>
						<div class="form-group">
							<label for="pekerjaan">Pekerjaan</label>
							<input type="text" class="form-control form-control-sm" id="pekerjaan" name="bap_pekerjaan">
						</div>
						<div class="form-group">
							<label for="npwp">Nomor Pokok Wajib Pajak (NPWP)</label>
							<input type="text" class="form-control form-control-sm" id="npwp" name="bap_npwp">
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="no_rekening">Nomor Rekening</label>
									<input type="text" class="form-control form-control-sm" id="no_rekening" name="bap_norek">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="bank">BANK</label>
									<input type="text" class="form-control form-control-sm" id="bank" name="bap_bank">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="no_kontrak">Nomor Kontrak</label>
							<input type="text" class="form-control form-control-sm" id="no_kontrak" name="bap_nokotrak" placeholder="Contoh: 07/KONTRAK/DPUPPR-BB/CK/RS/VIII/2023">
						</div>
						<div class="form-group">
							<label for="tanggal_kontrak">Tanggal Kontrak</label>
							<input type="date" class="form-control form-control-sm" id="tgl_kontrak" name="bap_tgl_kontrak">
						</div>
						<div class="form-group">
							<label for="no_amandemen">Nomor Amandemen</label>
							<input type="text" class="form-control form-control-sm" id="no_amandemen" name="bap_noamandemen">
						</div>
						<div class="form-group">
							<label for="tgl_amandemen">Tanggal Amandemen</label>
							<input type="date" class="form-control form-control-sm" id="tgl_amandemen" name="bap_tgl_amandemen">
						</div>
					</div>
					<div class="col-6">
						<label><i><strong>Pembayaran Termyn Fisik 45% Keu. 40%</strong></i></label>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="nilai_kontrak">Nilai Kontrak</label>
									<input type="text" class="form-control form-control-sm" id="nilai_kontrak1" name="bap_nilai_kotrak" oninput="hitungJumlah()">
								</div>
								<div class="form-group">
									<label for="pembayaran">Pembayaran</label>
									<input type="text" class="form-control form-control-sm" name="bap_pembayaran" id="nilai_kontrak2" readonly>
								</div>
								<div class="form-group">
									<label for="realisasi_bln_lalu">Realisasi Bulan lalu</label>
									<input type="text" class="form-control form-control-sm" name="bap_realisasi_bln_lalu" id="realisasi_bln_lalu1" oninput="hitungJumlah()">
								</div>
								<div class="form-group">
									<label for="pot_uang_muka">Potongan Uang Muka</label>
									<input type="text" class="form-control form-control-sm" id="pot_uang_muka1" name="bap_pot_uang_muka" oninput="hitungJumlah()">
								</div>
								<div class="form-group">
									<label for="ppn">PPN (11/111)</label>
									<input type="text" class="form-control form-control-sm" 1 name="bap_ppn11" readonly>
								</div>
								<div class="form-group">
									<label for="pph">PPh Pasal 4 Ayat 2</label>
									<input type="text" class="form-control form-control-sm" id="pph1" name="bap_pph_p4a2" readonly>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="pembayaran40">40%</label>
									<input type="text" class="form-control form-control-sm" value="0" id="pot40" name="bap_pot40" readonly>
								</div>
								<div class="form-group">
									<label for="">0%</label>
									<input type="text" class="form-control form-control-sm" id="realisasi_bln_lalu2" name="bap_pot0" oninput="hitungJumlah()" readonly>
								</div>
								<div class="form-group">
									<label for="pot_uang_muka45">45%</label>
									<input type="text" class="form-control form-control-sm" id="pot45" name="bap_pot45" readonly>
								</div>
								<div class="form-group">
									<label for="jumlah">Jumlah Pembayaran Fisik</label>
									<input type="text" class="form-control form-control-sm" id="jumlah" name="bap_jml_pembayaran_fisik" readonly>
								</div>
								<div class="form-group">
									<label for="pph">PPh</label>
									<input type="text" class="form-control form-control-sm" id="pph" name="bap_pph" readonly>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for=jml_potongan_pajak" class="col-sm-6 col-form-label">Jumlah Potongan Pajak</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="jml_pot_pajak" name="bap_jml_pot_pajak" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="sisa_dana" class="col-sm-6 col-form-label">Sisa dana Pihak Kedua</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="sisa_dana" name="bap_sisa_dana_pihak2" readonly>
							</div>
						</div>
					</div>
				</div>
				<h6><strong>4. LEMBAR VERIFIKASI SKPD (SP2D) </strong></h6>
				<hr>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="SPM">Nomor Surat Perintah Membayar (SPM)</label>
							<input type="text" class="form-control form-control-sm" id="SPM" placeholder="...../SPM-LS/0000/23" name="lvs_nospm">
						</div>
						<div class="form-group">
							<label for="no_sppls">Nomor Surat Pernyataan Verifikasi PPK-SKPD</label>
							<input type="text" class="form-control form-control-sm" id="no_sppls" name="lvs_nospv" placeholder="………../PUPR.PR/PPK/583/VII/2023">
						</div>
						<div class="form-group">
							<label for="no_sppls">Nomor Kwitansi</label>
							<input type="text" class="form-control form-control-sm" id="no_kwitansi" name="lvs_nokw" placeholder="………../DPUPRPR-BB/2023">
						</div>
						<div class="form-group">
							<label for="jenis_spm">Jenis Pembayaran</label>
							<select class="form-control form-control-sm" name="jenis_pembayaran" id="jenis_pembayaran">
								<option value="LS">Langsung (LS)</option>
								<option value="UP">Uang Persediaan (UP)</option>
								<option value="GU">Ganti Uang (GU)</option>
								<option value="TU">Tambah Uang (TU)</option>
							</select>
						</div>
						<div class="form-group">
							<label for="tgl_spm">Tanggal SPM</label>
							<input type="date" class="form-control form-control-sm" id="tgl_spm" name="tgl_spm">
						</div>
						<div class="form-group">
							<label for="jumlah">Jumlah / Nilai (SPM)</label>
							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
								</div>
								<input type="text" value="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="jumlah_spm" name="nilai" readonly>
							</div>
						</div>
						<div class="form-group input-group-sm mb-2">
							<label for="jml_angg">Jumlah Anggaran</label>
							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
								</div>
								<input type="text" class="form-control form-control-sm" id="jml_angg" name="jml_angg" value="<?= number_format($total_anggaran) ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="realisasi">Realisasi s/d SPP Lalu</label>
							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
								</div>
								<input type="text" value="<?= number_format($realisasilalu) ?>" class="form-control form-control-sm" id="realisasi" name="realisasi" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="sisa_angg1">Sisa Anggaran</label>
							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
								</div>
								<input type="text" class="form-control form-control-sm" id="sisa_angg1" name="sisa_angg1" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="jml_diminta">Jumlah yang diminta pada saat SPP ini</label>
							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
								</div>
								<input type="text" class="form-control form-control-sm" id="jml_diminta" name="jml_diminta" value="0">
							</div>
						</div>
						<div class="form-group">
							<label for="sisa_angg2">Sisa Anggaran s/d SSP ini</label>
							<div class="input-group input-group-sm mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
								</div>
								<input type="text" class="form-control form-control-sm" id="sisa_angg2" name="sisa_angg2" readonly>
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="unitkerja">Unit Kerja / Sektor</label>
							<input type="text" class="form-control form-control-sm muted" id="unitkerja" name="unitkerja" value="DINAS PEKERJAAN UMUM PENATAAN RUANG DAN PERUMAHAN RAKYAT KABUPATEN BONE BOLANGO" readonly>
						</div>
						<div class="form-group">
							<label for="id_prog">Program</label>
							<select class="form-control form-control-sm" id="id_prog" name="id_prog" readonly>
								<option value="<?= $program ?>"> <?= $jenis_program ?> </option>
							</select>
						</div>
						<div class="form-group">
							<label for="id_keg">Kegiatan</label>
							<select class="form-control form-control-sm" id="id_keg" name="id_keg" readonly>
								<option value="<?= $kegiatan ?>"> <?= $jenis_kegiatan ?> </option>
							</select>
						</div>
						<div class="form-group">
							<label for="id_subkeg">Sub Kegiatan</label>
							<select class="form-control form-control-sm" id="id_subkeg" name="id_subkeg" readonly>
								<option value="<?= $subKegiatan ?>"> <?= $jenis_subkegiatan ?> </option>
							</select>
						</div>
						<div class="col-12 row">
							<div class="col-6">
								<div class="form-group">
									<label for="ppn">PPN</label>
									<input type="text" oninput="rumusPersen1(this)" class="form-control form-control-sm" id="ppn1" value="0">
								</div>
								<div class="form-group">
									<label for="pph21">PPH Psl 21</label>
									<input type="text" oninput="rumusPersen2(this)" class="form-control form-control-sm" id="pph21" value="0">
								</div>
								<div class="form-group">
									<label for="pph22">PPH Psl 22</label>
									<input type="text" oninput="rumusPersen3(this)" class="form-control form-control-sm" id="pph22" value="0">
								</div>
								<div class="form-group">
									<label for="pph23">PPH Psl 23</label>
									<input type="text" oninput="rumusPersen4(this)" class="form-control form-control-sm" id="pph23" value="0">
								</div>
								<div class="form-group">
									<label for="pph25">PPH Psl 25</label>
									<input type="text" oninput="rumusPersen5(this)" class="form-control form-control-sm" id="pph25" value="0">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="ppnPersen">.</label>
									<input type="text" class="form-control form-control-sm" id="ppnPersen" name="ppn" value="0" readonly>
								</div>
								<div class="form-group">
									<label for="ppnPersen21">.</label>
									<input type="text" class="form-control form-control-sm" id="ppnPersen21" name="pph21" value="0" readonly>
								</div>
								<div class="form-group">
									<label for="ppnPersen22">.</label>
									<input type="text" class="form-control form-control-sm" id="ppnPersen22" name="pph22" value="0" readonly>
								</div>
								<div class="form-group">
									<label for="ppnPersen23">.</label>
									<input type="text" class="form-control form-control-sm" id="ppnPersen23" name="pph23" value="0" readonly>
								</div>
								<div class="form-group">
									<label for="ppnPersen25">.</label>
									<input type="text" class="form-control form-control-sm" id="ppnPersen25" name="pph25" value="0" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-sm btn-primary float-right">SIMPAN</button>
				<a href="<?= base_url('format5/lampiran') ?>" target="_blank" class="text-decoration-none btn btn-secondary btn-sm float-right mr-3">Lampiran</a>
			</form>
		</div>
	</div>
</div>
<script>
	function hitungJumlah() {
		function getValueAndParseInput(inputId) {
			return parseFloat(document.getElementById(inputId).value.replace(/\D/g, '')) || 0;
		}

		function setOutputValue(outputId, value) {
			document.getElementById(outputId).value = value;
		}

		function formatAndSetInput(inputId, value) {
			document.getElementById(inputId).value = value.toLocaleString('id-ID');
		}

		let nilai_kontrak1 = getValueAndParseInput('nilai_kontrak1');
		let realisasi_bln_lalu1 = getValueAndParseInput('realisasi_bln_lalu1');
		let pot_uang_muka1 = getValueAndParseInput('pot_uang_muka1');

		// RUMUS
		let pot40 = Math.floor(nilai_kontrak1 * 0.4);
		let pot45 = Math.floor(pot_uang_muka1 * 0.45);
		let jumlah = pot40 - pot45;
		let jumlah_ppn = Math.floor(jumlah * 0.0990990990990991);
		let pph1 = Math.floor(jumlah - jumlah_ppn);
		let pph = Math.floor(pph1 * 0.02);
		let jml_pot_pajak = Math.floor(pph + jumlah_ppn);
		let sisa_dana = Math.floor(jumlah - jml_pot_pajak);

		// FORMAT ANGKA TANPA KOMA DI BELAKANG
		setOutputValue('pot40', pot40.toLocaleString('id-ID'));
		setOutputValue('pot45', pot45.toLocaleString('id-ID'));
		setOutputValue('jumlah', jumlah.toLocaleString('id-ID'));
		setOutputValue('ppn', jumlah_ppn.toLocaleString('id-ID'));
		setOutputValue('pph1', pph1.toLocaleString('id-ID'));
		setOutputValue('pph', pph.toLocaleString('id-ID'));
		setOutputValue('jml_pot_pajak', jml_pot_pajak.toLocaleString('id-ID'));
		setOutputValue('sisa_dana', sisa_dana.toLocaleString('id-ID'));

		// MENGUBAH VALUE DALAM FORMAT ANGKA
		formatAndSetInput('nilai_kontrak1', nilai_kontrak1);
		formatAndSetInput('nilai_kontrak2', nilai_kontrak1);
		formatAndSetInput('realisasi_bln_lalu1', realisasi_bln_lalu1);
		formatAndSetInput('realisasi_bln_lalu2', realisasi_bln_lalu1);
		formatAndSetInput('pot_uang_muka1', pot_uang_muka1);
		formatAndSetInput('pot45', pot45);
		formatAndSetInput('jumlah', jumlah);
		formatAndSetInput('ppn', jumlah_ppn);
		formatAndSetInput('pph1', pph1);
		formatAndSetInput('pph', pph);
		formatAndSetInput('jml_pot_pajak', jml_pot_pajak);
		formatAndSetInput('sisa_dana', sisa_dana);
	}

	var jumlah2 = document.getElementById('jumlah_spm');
	//Format Angka dan Hitung
	function formatAndCalculate() {
		const numberInput1 = document.getElementById("jml_angg");
		const numberInput2 = document.getElementById("realisasi");
		const sisa_angg1 = document.getElementById("sisa_angg1");
		const jml_diminta = document.getElementById("jml_diminta");
		const sisa_angg2 = document.getElementById("sisa_angg2");

		function formatNumber(input) {
			// Dapatkan nilai dari input
			let value = input.value;

			// Hapus semua karakter selain angka (kecuali tanda negatif di awal)
			value = value.replace(/[^\d-]/g, "");

			// Hapus nol di awal angka (misalnya: 000123 -> 123)
			value = value.replace(/^0+/, "");

			// Jika ada tanda negatif, pastikan hanya satu tanda negatif di awal
			const hasMinusSign = value.startsWith("-");
			value = value.replace(/-/g, "");
			if (hasMinusSign) {
				value = "-" + value;
			}

			// Tambahkan pemisah ribuan (titik) setiap tiga digit dari kanan
			value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",") || 0;

			input.value = value;
		}

		function calculate() {
			const num1 = parseFloat(numberInput1.value.replace(/\,/g, "")) || 0;
			const num2 = parseFloat(numberInput2.value.replace(/\,/g, "")) || 0;
			const num3 = parseFloat(jml_diminta.value.replace(/\,/g, "")) || 0;

			const result = num1 - num2;

			sisa_angg1.value = result.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			// sisa_angg1.value = new Intl.NumberFormat().format(result);

			const result2 = result - num3;
			sisa_angg2.value = result2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

			rumusPersen1();
			rumusPersen2();
			rumusPersen3();
			rumusPersen4();
			rumusPersen5();
		}

		numberInput1.addEventListener("input", function() {
			formatNumber(numberInput1);
			calculate();
		});

		numberInput2.addEventListener("input", function() {
			formatNumber(numberInput2);
			calculate();
		});

		jml_diminta.addEventListener("input", function() {
			formatNumber(jml_diminta);
			calculate();
		});
	}

	window.onload = formatAndCalculate;

	// Menambahkan event listener pada input form pertama
	jml_diminta.addEventListener('input', function() {
		// Mengatur nilai input form kedua sama dengan input form pertama
		jumlah2.value = jml_diminta.value;
	});


	// POTONGAN 
	function rumusPersen1() {
		const nilai = document.getElementById("jml_diminta").value;
		const ppn = document.getElementById("ppn1").value;
		const ppnPersen = document.getElementById("ppnPersen");
		ppnPersen.value = formatNumber(nilai.replace(/,/g, '') * ppn / 100);
	}

	function rumusPersen2() {
		const nilai2 = document.getElementById("jml_diminta").value;
		const pph21 = document.getElementById("pph21").value;
		const ppnPersen21 = document.getElementById("ppnPersen21");
		ppnPersen21.value = formatNumber(nilai2.replace(/,/g, '') * pph21 / 100);

	}

	function rumusPersen3() {
		const nilai3 = document.getElementById("jml_diminta").value;
		const pph22 = document.getElementById("pph22").value;
		const ppnPersen22 = document.getElementById("ppnPersen22");
		ppnPersen22.value = formatNumber(nilai3.replace(/,/g, '') * pph22 / 100);
	}

	function rumusPersen4() {
		const nilai4 = document.getElementById("jml_diminta").value;
		const pph23 = document.getElementById("pph23").value;
		const ppnPersen23 = document.getElementById("ppnPersen23");
		ppnPersen23.value = formatNumber(nilai4.replace(/,/g, '') * pph23 / 100);

	}

	function rumusPersen5() {
		const nilai5 = document.getElementById("jml_diminta").value;
		const pph25 = document.getElementById("pph25").value;
		const ppnPersen25 = document.getElementById("ppnPersen25");
		ppnPersen25.value = formatNumber(nilai5.replace(/,/g, '') * pph25 / 100);
	}
</script>