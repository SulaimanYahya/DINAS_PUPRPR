<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?></title>

	<!-- Custom fonts for this template-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>ok/css/dataTables.bootstrap4.css">

	<script type="text/javascript" src="<?= base_url('assets/'); ?>ok/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/'); ?>ok/js/datatables.min.js"></script>
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<link href="<?= base_url('assets/'); ?>plugin/css/bootstrap-datepicker.min.css" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.css" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>selek2/css/select2.css" rel="stylesheet">

</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div class="container">
		<div class="pt-5 text-gray-900">
			<label for=""><u><strong>Lampiran:</strong> <?= $title ?></u></label>
			<button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
			<button type="button" class="btn btn-sm btn-secondary float-right mr-2" data-toggle="modal" data-target="#cetak">
				<i class="fas fa fa-fw fa-print"></i> Cetak
			</button>
			<div class="mt-3">
				<table class="table table-sm text-gray-900" id="table">
					<thead>
						<tr>
							<th>NO</th>
							<th>NAMA</th>
							<th>JABATAN</th>
							<th>GOLONGAN</th>
							<th>BIAYA</th>
							<th>JUMLAH HARI</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ?>
						<?php foreach ($data as $r) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= masterGetId('nama', 'tb_pegawai', 'id', $r->id_pegawai) ?></td>
								<td><?= masterGetId('jabatan', 'tb_pegawai', 'id', $r->id_pegawai) ?></td>
								<td><?= masterGetId('golongan', 'tb_pegawai', 'id', $r->id_pegawai) ?></td>
								<td><?= 'Rp. ' . number_format($r->biaya) ?></td>
								<td><?= $r->hari . " Hari" ?></td>
								<td>
									<a href="#" class="text-decoration-none badge badge-success" data-toggle="modal" data-target="#editData" data-id="<?= enkrip($r->id) ?>" data-id_pegawai="<?= $r->id_pegawai ?>" data-biaya="<?= $r->biaya ?>" data-hari="<?= $r->hari ?>" data-total="<?= $r->total ?>" id="edit">
										<i class="fas fa-fw fa-edit"></i>
									</a>
									<a href="<?= base_url('Lampiran/delete/lamp2/' . enkrip($r->id)) ?>" class="text-decoration-none badge badge-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data">
										<i class="fas fa-fw fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="text-center">
				<a href="javascript:void(0);" onclick="window.close();" class="btn btn-danger btn-sm mt-5"><i class="fas fa-times-circle"></i> Close</a>
			</div>
			<!-- MODAL CETAK -->
			<div class="modal fade" id="cetak" tabindex="-1" aria-labelledby="cetakLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="cetakLabel"><strong>Cetak <?= $title ?></strong></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="POST" action="<?= base_url('L_PerjalananDinas') ?>" target="_blank">
							<input type="hidden" name="id_belanjax" id="inputData" value="">
							<div class="modal-body">
								<div class="form-group row">
									<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
									<div class="col-sm-10 row">
										<input type="date" class="form-control form-control-sm w-25" name="tanggal" id="tanggal" autocomplete="off" required>
									</div>
								</div>
								<div class="row">
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
													<option value="<?= $r->id_kp_belanja ?>" data-chained="<?= $r->id_jenis_tagihan ?>"><?= $r->nama_rek ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group">
											<label for="Uraian">Uraian</label>
											<select class="form-control form-control-sm" id="uraian" name="id_belanja">
												<?php foreach ($belanja as $r) : ?>
													<option value="<?= $r->uraian_belanja ?>" data-idbelanja="<?= $r->id_belanja ?>" data-chained="<?= $r->id_kp_belanja ?>"><?= $r->uraian_belanja ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="tujuan" class="col-sm-2 col-form-label">Tujuan </label>
									<div class="col-sm-10 row">
										<textarea class="form-control form-control-sm" name="tujuan" id="tujuan" autocomplete="off" rows="7"></textarea>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Cetak</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- MODAL TAMBAH DATA -->
			<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="tambahDataLabel"><strong>Tambah Data</strong> (Yang melakukan Perjalanan Dinas)</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="pjuForm" method="POST" action="<?= base_url('Lampiran/insert/lamp2') ?>">
							<div class="modal-body">
								<div class="form-group row">
									<label for="nama" class="col-sm-2 col-form-label">Nama</label>
									<div class="col-sm-10 row">
										<select class="form-control form-control-sm" name="id_pegawai" id="id_pegawai">
											<option value="">-Pilih-</option>
											<?php $i = 1; ?>
											<?php foreach ($pegawai as $r) : ?>
												<option value="<?= $r->id ?>"><?= $i++ . '. ' . $r->nama ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="uangsaku" class="col-sm-2 col-form-label">Biaya</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="biaya" id="biaya" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label for="hari" class="col-sm-2 col-form-label">Berapa Hari</label>
									<div class="col-sm-10 row">
										<input type="text" min="1" class="form-control form-control-sm" name="hari" id="hari" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label for="total" class="col-sm-2 col-form-label">Total</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="total" id="total" autocomplete="off" value="0" readonly>
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-sm btn-primary" id="saveBtn">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- MODAL EDIT DATA -->
			<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="EditDataLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="EditDataLabel"><strong>Edit Data</strong> (Yang melakukan Perjalanan Dinas)</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="pjuForm" method="POST" action="<?= base_url('Lampiran/update/lamp2') ?>">
							<input type="hidden" id="idx" name="id" value="" readonly hidden>
							<div class="modal-body">
								<div class="form-group row">
									<label for="nama" class="col-sm-2 col-form-label">Nama</label>
									<div class="col-sm-10 row">
										<select class="form-control form-control-sm" name="id_pegawai" id="id_pegawaix">
											<?php $i = 1; ?>
											<?php foreach ($pegawai as $r) : ?>
												<option value="<?= $r->id ?>"><?= $i++ . '. ' . $r->nama ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label for="uangsaku" class="col-sm-2 col-form-label">Biaya</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="biaya" id="biayax" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label for="hari" class="col-sm-2 col-form-label">Berapa Hari</label>
									<div class="col-sm-10 row">
										<input type="text" min="1" class="form-control form-control-sm" name="hari" id="harix" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label for="total" class="col-sm-2 col-form-label">Total</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="total" id="totalx" autocomplete="off" value="0" readonly>
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-sm btn-primary" id="saveBtn">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End of Page Wrapper -->

	<script>
		$(document).ready(function() {
			$('#table').DataTable();
		});


		function formatAndCalculate() {
			// TAMBAH
			const biaya = document.getElementById("biaya");
			const hari = document.getElementById("hari");
			const total = document.getElementById("total");

			// EDIT
			const biayax = document.getElementById("biayax");
			const harix = document.getElementById("harix");
			const totalx = document.getElementById("totalx");


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
				const num1 = parseFloat(biaya.value.replace(/\,/g, "")) || 0;
				const num2 = parseFloat(hari.value.replace(/\,/g, "")) || 0;
				const num3 = parseFloat(total.value.replace(/\,/g, "")) || 0;

				const num1x = parseFloat(biayax.value.replace(/\,/g, "")) || 0;
				const num2x = parseFloat(harix.value.replace(/\,/g, "")) || 0;
				const num3x = parseFloat(totalx.value.replace(/\,/g, "")) || 0;

				const result = num1 * num2;
				const resultx = num1x * num2x;

				// console.log(result);

				total.value = result.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				totalx.value = resultx.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			}

			biaya.addEventListener("input", function() {
				formatNumber(biaya);
				calculate();
			});

			hari.addEventListener("input", function() {
				formatNumber(hari);
				calculate();
			});

			total.addEventListener("input", function() {
				formatNumber(total);
				calculate();
			});

			biayax.addEventListener("input", function() {
				formatNumber(biayax);
				calculate();
			});

			harix.addEventListener("input", function() {
				formatNumber(harix);
				calculate();
			});

			totalx.addEventListener("input", function() {
				formatNumber(totalx);
				calculate();
			});

		}

		window.onload = formatAndCalculate;

		document.addEventListener('DOMContentLoaded', function() {
			var editLinks = document.querySelectorAll('.badge-success');

			editLinks.forEach(function(link) {
				link.addEventListener('click', function() {
					var id = this.getAttribute('data-id');
					var id_pegawai = this.getAttribute('data-id_pegawai');
					var biaya = this.getAttribute('data-biaya');
					var hari = this.getAttribute('data-hari');
					var total = this.getAttribute('data-total');

					$('#idx').val(id);
					$('#id_pegawaix').val(id_pegawai);
					$('#biayax').val(formatNumber(biaya));
					$('#harix').val(hari);
					$('#totalx').val(formatNumber(total));

					$('#id_pegawaix option').removeAttr('selected');
					// Menambahkan atribut 'selected' pada elemen option yang sesuai
					$('#id_pegawaix option[value="' + id_pegawai + '"]').attr('selected', 'selected');

				});
			});
		});
	</script>


	<!-- <script src="<?= base_url('assets/'); ?>js/jquery_3.5.1.min.js"></script> -->
	<!-- Bootstrap core JavaScript-->

	<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Plugin datepicker-->
	<script src="<?= base_url('assets/'); ?>plugin/js/bootstrap-datepicker.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="<?= base_url('assets/'); ?>js/chart.js/Chart.min.js"></script>

	<script src="<?= base_url('assets/'); ?>js/my_js.js"></script>
	<script src="<?= base_url('assets/'); ?>selek2/js/select2.js"></script>
	<script src="<?= base_url('assets/'); ?>js/jquery.chained.min.js"></script>

	<script>
		$("#rekening").chained("#jenis_tagihan");
		$("#uraian").chained("#rekening");

		// Dapatkan elemen select dan textarea
		var selectElem = document.getElementById('uraian');
		var textareaElem = document.getElementById('tujuan');

		// Tambahkan event listener ke elemen select
		selectElem.addEventListener('click', function() {
			// Set nilai textarea menjadi nilai yang dipilih dari select
			textareaElem.value = selectElem.value;

		});
		textareaElem.setAttribute("readonly", "readonly");

		// Mendapatkan referensi ke elemen select dan input
		var selectElement = document.getElementById('uraian');
		var inputData = document.getElementById('inputData');

		// Menambahkan event listener ke elemen select
		selectElement.addEventListener('change', function() {
			// Mendapatkan opsi yang dipilih
			var selectedOption = selectElement.options[selectElement.selectedIndex];

			// Mendapatkan nilai atribut data-nama dari opsi yang dipilih
			var dataNama = selectedOption.getAttribute('data-idbelanja');

			// Menampilkan nilai atribut di elemen input
			inputData.value = dataNama;
		});
	</script>
</body>

</html>