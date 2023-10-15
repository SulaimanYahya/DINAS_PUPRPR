<div class="container-fluid">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">DATA UMUM (SPM)</button>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
					<form method="POST">
						<?php
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							$id = $_POST["f_nama"];
							$nama = masterGetId('nama', 'tb_pegawai', 'id', $_POST["f_nama"]);
							$nip = masterGetId('nip', 'tb_pegawai', 'id', $_POST["f_nama"]);
							$jabatan = masterGetId('id_role_respon', 'tb_role_respon', 'id_role_respon', $_POST["f_jabatan"]);

							$data = array(
								"id_pegawai" => $id,
								"id_role_respon" => $_POST["f_jabatan"],
								"nama" => $nama,
								"nip" => $nip,
								"jabatan" => $jabatan,
							);
							$_SESSION["data_array"][] = $data;
							// echo "Data berhasil disimpan.";
							no_resubmit();
						}
						?>

						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label for="f_nama">PPK Keuangan SKPD</label>
									<select class="form-control form-control-sm" name="f_nama" id="f_nama">
										<option value="">-Pilih-</option>
										<?php $i = 1 ?>
										<?php foreach ($pegawai as $r) : ?>
											<option value="<?= $r->id ?>"><?= $i . '. ' . $r->nama ?></option>
											<?php $i++; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="f_nama">Jabatan</label>
									<select class="form-control form-control-sm" name="f_jabatan" id="f_jabatan">
										<option value="">-Pilih-</option>
										<?php $i = 1 ?>
										<?php foreach ($jabatan as $r) : ?>
											<option value="<?= $r->id_role_respon ?>"><?= $i . '. ' . $r->nama_role ?></option>
											<?php $i++; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<button class="btn btn-sm btn-primary float-right" type="submit">Tambah</button>
							</div>
							<div class="col-8">
								<span class="font-weight-bold">Daftar nama yang bertanda tangan:</span>
								<table class="table table-sm">
									<thead>
										<tr>
											<th scope="col">No</th>
											<th scope="col">NAMA</th>
											<th scope="col">NIP</th>
											<th scope="col">JABATAN</th>
											<th scope="col">AKSI</th>
										</tr>
									</thead>
									<tbody style="font-size: 12px;">
										<?php
										if (isset($_SESSION["data_array"]) && !empty($_SESSION["data_array"])) {
											if (count($_SESSION) > 0) {
												$no = 1;
												foreach ($_SESSION["data_array"] as $key => $r) :
										?>
													<tr>
														<th scope="row"><?= $no++; ?></th>
														<td><?= $r['nama'] ?></td>
														<td><?= $r['nip'] ?></td>
														<td>
															<?= masterGetId('nama_role', 'tb_role_respon', 'id_role_respon', $r['jabatan']) ?>
														</td>
														<td><a href="<?= base_url("tagihan/delSession/$key/") . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) ?>" class="text-decoration-none badge badge-danger"><i class="fas fa-fw fa-trash"></a></td>
													</tr>
										<?php
												endforeach;
											}
										} ?>
									</tbody>
								</table>
								<!-- <a href="<?= base_url('Tagihan/simpan') ?>" class="badge badge-success">SIMPAN</a> -->
							</div>
						</div>
					</form>
					<hr>
					<form action="<?= base_url('Tagihan/simpan') ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id_belanja" value="<?= enkrip($id_belanja) ?>">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="rekanan">Rekanan</label>
									<input type="text" class="form-control form-control-sm" id="rekanan" placeholder="Nama Rekanan" name="rekanan">
								</div>
								<div class="form-group">
									<label for="SPM">Nomor Surat Perintah Membayar (SPM)</label>
									<input type="text" class="form-control form-control-sm" id="SPM" placeholder="Nomor SPM" name="no_spm">
								</div>
								<div class="form-group">
									<label for="jenis_spm">Jenis Tagihan</label>
									<select class="form-control form-control-sm" name="jenis_spm" id="jenis_spm">
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
										<input type="text" class="form-control form-control-sm" value="<?= number_format($total_anggaran) ?>" id="jml_angg" name="jml_angg" readonly>
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
										<input type="text" value="0" class="form-control form-control-sm" id="jml_yg_diminta" name="jml_yg_diminta">
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
									<label for="pemilik">Pemilik</label>
									<input type="text" class="form-control form-control-sm muted" id="pemilik" name="pemilik" value="">
								</div>
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
							<div class="col-6">
								<div class="form-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input form-control-sm" id="gambar" name="gambar" required>
										<label class="custom-file-label" for="gambar" aria-describedby="gambar">Upload Tanda Bukti</label>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<a href="<?= base_url('tagihan/lampiran/1') ?>" class="btn btn-secondary btn-sm text-decoration-none" target="_blank">Cetak Nota Pesanan</a>
						<button class="float-right btn btn-sm btn-primary" type="submit">Simpan</button>
					</form>
				</div>
			</div>
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

	// POTONGAN 
	function rumusPersen1() {
		const nilai = document.getElementById("jml_yg_diminta").value;
		const ppn = document.getElementById("ppn").value;
		const ppnPersen = document.getElementById("ppnPersen");
		ppnPersen.value = formatNumber(nilai.replace(/,/g, '') * ppn / 100);
	}

	function rumusPersen2() {
		const nilai2 = document.getElementById("jml_yg_diminta").value;
		const pph21 = document.getElementById("pph21").value;
		const ppnPersen21 = document.getElementById("ppnPersen21");
		ppnPersen21.value = formatNumber(nilai2.replace(/,/g, '') * pph21 / 100);

	}

	function rumusPersen3() {
		const nilai3 = document.getElementById("jml_yg_diminta").value;
		const pph22 = document.getElementById("pph22").value;
		const ppnPersen22 = document.getElementById("ppnPersen22");
		ppnPersen22.value = formatNumber(nilai3.replace(/,/g, '') * pph22 / 100);
	}

	function rumusPersen4() {
		const nilai4 = document.getElementById("jml_yg_diminta").value;
		const pph23 = document.getElementById("pph23").value;
		const ppnPersen23 = document.getElementById("ppnPersen23");
		ppnPersen23.value = formatNumber(nilai4.replace(/,/g, '') * pph23 / 100);

	}

	function rumusPersen5() {
		const nilai5 = document.getElementById("jml_yg_diminta").value;
		const pph25 = document.getElementById("pph25").value;
		const ppnPersen25 = document.getElementById("ppnPersen25");
		ppnPersen25.value = formatNumber(nilai5.replace(/,/g, '') * pph25 / 100);
	}
</script>