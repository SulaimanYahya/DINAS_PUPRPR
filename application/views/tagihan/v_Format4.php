<div class="container-fluid">
	<h5><strong><?= $title ?></strong></h5>
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

			<hr>
			<form method="POST" action="<?= base_url('Format4/simpan') ?>">
				<input type="hidden" name="id_belanja" value="<?= enkrip($id_belanja) ?>" readonly>

				<!-- <div class="row">
					<div class="col-4">
						<div class="form-group">
							<label for="jenis_tagihan">Jenis Tagihan</label>
							<select class="form-control form-control-sm" id="jenis_tagihan" name="jenis_tagihan">
								<?php foreach ($jenis_tagihan as $r) : ?>
									<option value="<?= $r->id_jenis_tagihan ?>"><?= $r->id_jenis_tagihan . '. ' . $r->nama_jenis_tagihan ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="rekening">Rekening</label>
							<select class="form-control form-control-sm" id="rekening" name="rekening">
								<?php foreach ($rekening as $r) : ?>
									<option value="<?= $r->id_rek ?>" data-chained="<?= $r->id_jenis_tagihan ?>"><?= $r->nama_rek ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="Uraian">Uraian</label>
							<select class="form-control form-control-sm" id="uraian" name="id_belanja">
								<?php foreach ($belanja as $r) : ?>
									<option value="<?= enkrip($r->id_belanja) ?>" data-chained="<?= $r->id_rek ?>"><?= $r->uraian_belanja ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div> -->
				<div class="row">
					<div class="col-6">
						<h6><strong>Nama-nama yang terlibat: </strong></h6>
						<hr>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="bendahara">Bendahara</label>
									<select name="bendahara" id="bendahara" class="form-control form-control-sm">
										<option value="">-Pilih-</option>
										<?php $no = 1; ?>
										<?php foreach ($pegawai as $r) : ?>
											<option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
											<?php $no++; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="penerima">Yang Menerima</label>
									<input type="text" name="penerima" id="penerima" class="form-control form-control-sm">
								</div>
								<div class="form-group">
									<label for="ppk_keuangan">Pengguna Anggaran</label>
									<select name="pengguna_angg" id="disetujui" class="form-control form-control-sm">
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
					</div>
					<div class="col-6">
						<h6>.</h6>
						<hr>
						<div class="form-group">
							<label for="ppk_keuangan">PPK Keuangan SKPD</label>
							<select name="ppk_keuangan" id="ppk_keuangan" class="form-control form-control-sm">
								<option value="">-Pilih-</option>
								<?php $no = 1; ?>
								<?php foreach ($pegawai as $r) : ?>
									<option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
									<?php $no++; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="ppk">Pejabat Pembuat Komitmen</label>
							<select name="ppk" id="ppk" class="form-control form-control-sm">
								<option value="">-Pilih-</option>
								<?php $no = 1; ?>
								<?php foreach ($pegawai as $r) : ?>
									<option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
									<?php $no++ ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="kadis">Kepala Dinas</label>
							<select name="kadis" id="kadis" class="form-control form-control-sm">
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
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="SPM">Nomor Surat Perintah Membayar (SPM)</label>
							<input type="text" class="form-control form-control-sm" id="SPM" placeholder="...../SPM-LS/0000/23" name="no_spm">
						</div>
						<div class="form-group">
							<label for="no_sppls">Nomor Surat Pernyataan Verifikasi PPK-SKPD</label>
							<input type="text" class="form-control form-control-sm" id="no_sppls" name="no_sppls" placeholder="………../PUPR.PR/PPK/583/VII/2023">
						</div>
						<div class="form-group">
							<label for="no_sppls">Nomor Kwitansi</label>
							<input type="text" class="form-control form-control-sm" id="no_kwitansi" name="no_kwitansi" placeholder="………../DPUPRPR-BB/2023">
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
								<input type="text" value="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="jumlah" name="nilai" readonly>
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
							<label for="jml_yg_diminta">Jumlah yang diminta pada saat SPP ini</label>
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
									<input type="text" oninput="rumusPersen1(this)" class="form-control form-control-sm" id="ppn" value="0">
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
				<!-- <a href="<?= base_url('format4/lampiran') ?>" target="_blank" class="btn btn-secondary btn-sm">Lampiran</a> -->
				<button type="submit" class="btn btn-primary btn-sm float-right">Simpan</button>
			</form>
		</div>
	</div>
</div>

<script>
	var jumlah = document.getElementById('jumlah');

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
		jumlah.value = jml_diminta.value;
	});


	// POTONGAN 
	function rumusPersen1() {
		const nilai = document.getElementById("jml_diminta").value;
		const ppn = document.getElementById("ppn").value;
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