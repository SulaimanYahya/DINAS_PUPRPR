<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>NOTA PESANAN</title>

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
			<label for=""><u><strong>Lampiran:</strong> NOTA PESANAN</u></label>
			<button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
			<button type="button" class="btn btn-sm btn-secondary float-right mr-2" data-toggle="modal" data-target="#cetak">
				<i class="fas fa fa-fw fa-print"></i> Cetak
			</button>
			<div class="mt-3">
				<table class="table table-sm text-gray-900" id="table">
					<thead>
						<tr>
							<th>NO</th>
							<th>JENIS ALAT/BAHAN</th>
							<th>MERK</th>
							<th>UKURAN</th>
							<th>HARGA SATUAN</th>
							<th>JUMLAH HARGA</th>
							<th>KET</th>
							<th>AKSI</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ?>
						<?php foreach ($nota as $r) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $r->bahan ?></td>
								<td><?= $r->merk ?></td>
								<td><?= $r->volume . ' ' . $r->satuan ?></td>
								<td><?= 'Rp. ' . number_format($r->harga_satuan) ?></td>
								<td><?= 'Rp. ' . number_format($r->jml_harga) ?></td>
								<td><?= $r->ket ?></td>
								<td>
									<a href="#" class="text-decoration-none badge badge-success" data-toggle="modal" data-target="#editData" data-id="<?= enkrip($r->id) ?>" data-bahan="<?= $r->bahan ?>" data-merk="<?= $r->merk ?>" data-volume="<?= $r->volume ?>" data-satuan="<?= $r->satuan ?>" data-harga_satuan="<?= $r->harga_satuan ?>" data-jml_harga="<?= $r->jml_harga ?>" data-ket="<?= $r->ket ?>" id="edit">
										<i class="fas fa-fw fa-edit"></i>
									</a>
									<a href="<?= base_url('Tagihan/hapusLampiran/' . enkrip($r->id)) ?>" class="text-decoration-none badge badge-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data">
										<i class="fas fa-fw fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<!-- MODAL CETAK -->
			<div class="modal fade" id="cetak" tabindex="-1" aria-labelledby="cetakLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="cetakLabel"><strong>Cetak Nota Pesanan</strong></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="POST" action="<?= base_url('L_NotaPesanan') ?>" target="_blank">
							<?php
							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								$pptk = masterGetId('nama', 'tb_pegawai', 'id', $_POST["pptk"]);
								$rekanan = $_POST["rekanan"];
								$pemilik = $_POST["pemilik"];

								$this->session->set_userdata('pptk', $pptk);
								$this->session->set_userdata('rekanan', $rekanan);
								$this->session->set_userdata('pemilik', $pemilik);
							}
							?>
							<div class="modal-body">
								<div class="form-group row">
									<label for="rekanan" class="col-sm-2 col-form-label">Rekanan</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="rekanan" id="rekanan" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label for="pemilik" class="col-sm-2 col-form-label">Pemilik </label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="pemilik" id="pemilik" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label for="pptk" class="col-sm-2 col-form-label">PPTK</label>
									<div class="col-sm-10 row">
										<select name="pptk" id="pptk" class="form-control form-control-sm">
											<option value="">-Pilih-</option>
											<?php $i = 1; ?>
											<?php foreach ($pegawai as $r) : ?>
												<option value="<?= $r->id ?>"><?= $i++ . '. ' . $r->nama ?></option>
											<?php endforeach; ?>
										</select>
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
							<h5 class="modal-title" id="tambahDataLabel"><strong>Tambah Data</strong></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form id="pjuForm" method="POST" action="<?= base_url('Tagihan/simpan/nota') ?>">
							<div class="modal-body">
								<div class="form-group row">
									<label for="bahan" class="col-sm-2 col-form-label">Bahan</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="bahan" id="bahan" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label for="merk" class="col-sm-2 col-form-label">Merk</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="merk" id="merk" autocomplete="off">
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="volume" class="col-sm-2 col-form-label">Ukuran/Volume</label>
											<div class="col-sm-12">
												<input type="text" class="form-control form-control-sm" name="volume" id="volume" autocomplete="off" value="0">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
											<div class="col-sm-12">
												<input type="text" class="form-control form-control-sm" name="satuan" id="satuan" autocomplete="off">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="harga_stuan" class="col-sm-2 col-form-label">Harga Satuan</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="harga_satuan" id="harga_satuan" autocomplete="off" value="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="jml_harga" class="col-sm-2 col-form-label">Jumlah Harga</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="jml_harga" id="jml_harga" autocomplete="off" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="ket" id="ket" autocomplete="off">
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
			<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="editDataLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editDataLabel"><strong>Edit Data</strong></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="POST" action="<?= base_url('Tagihan/simpan/edit') ?>">
							<input type="text" id="idx" name="id" value="" readonly hidden>
							<div class="modal-body">
								<div class="form-group row">
									<label for="bahan" class="col-sm-2 col-form-label">Bahan</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="bahan" id="bahanx" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label for="merk" class="col-sm-2 col-form-label">Merk</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="merk" id="merkx" autocomplete="off">
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="volume" class="col-sm-2 col-form-label">Ukuran/Volume</label>
											<div class="col-sm-12">
												<input type="text" class="form-control form-control-sm" name="volume" id="volumex" autocomplete="off" value="0">
											</div>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
											<div class="col-sm-12">
												<input type="text" class="form-control form-control-sm" name="satuan" id="satuanx" autocomplete="off">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="harga_stuan" class="col-sm-2 col-form-label">Harga Satuan</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="harga_satuan" id="harga_satuanx" autocomplete="off" value="0">
									</div>
								</div>
								<div class="form-group row">
									<label for="jml_harga" class="col-sm-2 col-form-label">Jumlah Harga</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="jml_harga" id="jml_hargax" autocomplete="off" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
									<div class="col-sm-10 row">
										<input type="text" class="form-control form-control-sm" name="ket" id="ketx" autocomplete="off">
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
			const numberInput1 = document.getElementById("volume");
			const numberInput2 = document.getElementById("harga_satuan");
			const jml_harga = document.getElementById("jml_harga");

			// EDIT
			const numberInput1x = document.getElementById("volumex");
			const numberInput2x = document.getElementById("harga_satuanx");
			const jml_hargax = document.getElementById("jml_hargax");

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
				const num3 = parseFloat(jml_harga.value.replace(/\,/g, "")) || 0;

				const num1x = parseFloat(numberInput1x.value.replace(/\,/g, "")) || 0;
				const num2x = parseFloat(numberInput2x.value.replace(/\,/g, "")) || 0;
				const num3x = parseFloat(jml_hargax.value.replace(/\,/g, "")) || 0;

				const result = num1 * num2;
				const resultx = num1x * num2x;

				jml_harga.value = result.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				jml_hargax.value = resultx.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				// sisa_angg1.value = new Intl.NumberFormat().format(result);
			}

			numberInput1.addEventListener("input", function() {
				formatNumber(numberInput1);
				calculate();
			});

			numberInput2.addEventListener("input", function() {
				formatNumber(numberInput2);
				calculate();
			});

			jml_harga.addEventListener("input", function() {
				formatNumber(jml_harga);
				calculate();
			});

			numberInput1x.addEventListener("input", function() {
				formatNumber(numberInput1x);
				calculate();
			});

			numberInput2x.addEventListener("input", function() {
				formatNumber(numberInput2x);
				calculate();
			});

			jml_hargax.addEventListener("input", function() {
				formatNumber(jml_hargax);
				calculate();
			});

		}

		window.onload = formatAndCalculate;

		document.addEventListener('DOMContentLoaded', function() {
			var editLinks = document.querySelectorAll('.badge-success');

			editLinks.forEach(function(link) {
				link.addEventListener('click', function() {
					var id = this.getAttribute('data-id');
					var bahan = this.getAttribute('data-bahan');
					var merk = this.getAttribute('data-merk');
					var volume = this.getAttribute('data-volume');
					var satuan = this.getAttribute('data-satuan');
					var hargaSatuan = this.getAttribute('data-harga_satuan');
					var jmlHarga = this.getAttribute('data-jml_harga');
					var ket = this.getAttribute('data-ket');

					$('#idx').val(id);
					$('#bahanx').val(bahan);
					$('#merkx').val(merk);
					$('#volumex').val(formatNumber(volume));
					$('#satuanx').val(satuan);
					$('#harga_satuanx').val(formatNumber(hargaSatuan));
					$('#jml_hargax').val(formatNumber(jmlHarga));
					$('#ketx').val(ket);
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


</body>

</html>