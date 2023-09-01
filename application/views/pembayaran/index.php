<div class="container-fluid">
	<h5><strong>Form Pembayaran SPPD</strong></h5>
	<hr>
	<form method="POST" action="<?= base_url('Pembayaran/simpan') ?>">
		<input type="hidden" name="id_belanja" value="<?= enkrip($id_belanja) ?>" readonly>
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

				<div class="row">
					<div class="col-6">
						<h6><strong>Yang Bertanda Tangan Kwitansi: </strong></h6>
						<hr>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="bendahara">Bendahara</label>
									<select name="bendahara" id="bendahara" class="form-control form-control-sm">
										<?php foreach ($pegawai as $r) : ?>
											<option value="<?= $r->id ?>"><?= $r->nama . ' (' . $r->nip . ')' ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="penerima">Penerima</label>
									<select name="penerima" id="penerima" class="form-control form-control-sm">
										<?php foreach ($pegawai as $r) : ?>
											<option value="<?= $r->id ?>"><?= $r->nama . ' (' . $r->nip . ')' ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="disetujui">Pengguna Anggaran</label>
									<select name="pengguna_angg" id="disetujui" class="form-control form-control-sm">
										<?php foreach ($pegawai as $r) : ?>
											<option value="<?= $r->id ?>"><?= $r->nama . ' (' . $r->nip . ')' ?></option>
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
							<label for="no_kwitansi">Nomor Kwitansi</label>
							<input type="text" class="form-control form-control-sm" id="no_kwitansi" name="no_kwitansi" placeholder="………../DPUPRPR-BB/2023" autocomplete="off">
						</div>
						<!-- <div class="form-group">
							<label for="jumlah">Jumlah</label>
							<input type="text" oninput="formatAngka(this)" class="form-control form-control-sm" id="jumlah" name="jumlah" autocomplete="off">
						</div> -->
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="SPM">Nomor Surat Perintah Membayar (SPM)</label>
							<input type="text" class="form-control form-control-sm" id="SPM" placeholder=" /SPM-LS/0000/23" name="no_spm">
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
						<div class=" form-group">
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
								<input type="text" class="form-control form-control-sm" id="jml_yg_diminta" name="jml_yg_diminta" value="0">
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
						<div class="form-group">
							<label for="ppn">PPN</label>
							<input type="number" min="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="ppn" name="ppn" value="0">
						</div>
						<div class="form-group">
							<label for="pph21">PPH Psl 21</label>
							<input type="number" min="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="pph21" name="pph21" value="0">
						</div>
						<div class="form-group">
							<label for="pph22">PPH Psl 22</label>
							<input type="number" min="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="pph22" name="pph22" value="0">
						</div>
						<div class="form-group">
							<label for="pph23">PPH Psl 23</label>
							<input type="number" min="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="pph23" name="pph23" value="0">
						</div>
						<div class="form-group">
							<label for="pph25">PPH Psl 25</label>
							<input type="number" min="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="pph25" name="pph25" value="0">
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary btn-sm float-right">Simpan</button>
			</div>
		</div>
	</form>
</div>

<script>
	var jumlah = document.getElementById('jumlah');

	//Format Angka dan Hitung
	function formatAndCalculate() {
		const numberInput1 = document.getElementById("jml_angg");
		const numberInput2 = document.getElementById("realisasi");
		const sisa_angg1 = document.getElementById("sisa_angg1");
		const jml_yg_diminta = document.getElementById("jml_yg_diminta");
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
			const num3 = parseFloat(jml_yg_diminta.value.replace(/\,/g, "")) || 0;

			const result = num1 - num2;

			sisa_angg1.value = result.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			// sisa_angg1.value = new Intl.NumberFormat().format(result);

			const result2 = result - num3;
			sisa_angg2.value = result2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}

		numberInput1.addEventListener("input", function() {
			formatNumber(numberInput1);
			calculate();
		});

		numberInput2.addEventListener("input", function() {
			formatNumber(numberInput2);
			calculate();
		});

		jml_yg_diminta.addEventListener("input", function() {
			formatNumber(jml_yg_diminta);
			calculate();
		});

	}

	window.onload = formatAndCalculate;

	// Menambahkan event listener pada input form pertama
	jml_yg_diminta.addEventListener('input', function() {
		// Mengatur nilai input form kedua sama dengan input form pertama
		jumlah.value = jml_yg_diminta.value;
	});
</script>