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
							<th>Nama Penerima</th>
							<th>Tanggal</th>
							<th>Berangkat Dari</th>
							<th>Tujuan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $r) : ?>
							<tr>
								<td><?= masterGetId('nama', 'tb_pegawai', 'id', $r->id_pegawai) ?></td>
								<td><?= $r->tanggal ?></td>
								<td><?= $r->pg_dari ?></td>
								<td><?= $r->pg_tujuan ?></td>
								<td>
									<a href="#" class="text-decoration-none badge badge-success">
										<i class="fas fa-fw fa-edit"></i>
									</a>
									<a href="<?= base_url('Lampiran/delete/lamp3/' . $r->kode_spm) ?>" class="text-decoration-none badge badge-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data">
										<i class="fas fa-fw fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- End of Page Wrapper -->
	<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content text-gray-900">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahDataLabel"><strong>Tambah Data</strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('Lampiran/insert/lamp3') ?>" method="post">
					<div class="card mt-2">
						<div class="card-body">
							<div class="form-group row">
								<label for="nama" class="col-sm-2 col-form-label">Yang Menerima</label>
								<div class="col-sm-10">
									<select class="form-control form-control-sm" name="id_pegawai" id="id_pegawai">
										<?php foreach ($pegawai as $r) : ?>
											<option value="<?= $r->id ?>"><?= $r->nama . " (" . $r->nip . ")" ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
								<div class="col-sm-10">
									<input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" required>
								</div>
							</div>
							<table class="table table-sm">
								<tr>
									<td rowspan="3">TIKET</td>
									<td>DARI</td>
									<td>TUJUAN</td>
									<td>JUMLAH SATUAN</td>
									<td>QTY</td>
									<td>JUMLAH HARI</td>
									<td>TOTAL</td>
								</tr>
								<tr>
									<td><input type="text" class="form-control form-control-sm" id="pergi_dari" name="pergi_dari" placeholder="DARI" required></td>
									<td><input type="text" class="form-control form-control-sm" id="pergi_tujuan" name="pergi_tujuan" placeholder="TUJUAN" required></td>
									<td><input type="text" class="form-control form-control-sm" id="pergi_jumlah_satuan" name="pergi_jumlah_satuan" placeholder="Rp." value="0"></td>
									<td><input type="text" class="form-control form-control-sm" id="pergi_qty" name="pergi_qty" placeholder="Rp." value="0"></td>
									<td><input type="text" class="form-control form-control-sm" id="pergi_hari" name="pergi_hari" placeholder="Rp." value="0"></td>
									<td><input type="text" class="form-control form-control-sm" id="pergi_total" name="pergi_total" placeholder="Rp." value="0" readonly></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control form-control-sm" id="pulang_dari" name="pulang_dari" placeholder="DARI" required></td>
									<td><input type="text" class="form-control form-control-sm" id="pulang_tujuan" name="pulang_tujuan" placeholder="TUJUAN" required></td>
									<td><input type="text" class="form-control form-control-sm" id="pulang_jumlah_satuan" name="pulang_jumlah_satuan" placeholder="Rp." value="0"></td>
									<td><input type="text" class="form-control form-control-sm" id="pulang_qty" name="pulang_qty" placeholder="Rp." value="0"></td>
									<td><input type="text" class="form-control form-control-sm" id="pulang_hari" name="pulang_hari" placeholder="Rp." value="0"></td>
									<td><input type="text" class="form-control form-control-sm" id="pulang_total" name="pulang_total" placeholder="Rp." value="0" readonly></td>
								</tr>
								<tr>
									<td colspan="6">Total PP</td>
									<td colspan="1" class="text-right"><input type="text" class="form-control form-control-sm" id="total_pp" name="total_semua_pp" value="0" readonly></td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td colspan="1" class="text-left">
										Jumlah (<i>Orang</i>)
									</td>
									<td colspan="1" class="text-left">
										Biaya (<i>Rp.</i>)
									</td>
									<td colspan="1" class="text-right"></td>
								</tr>
								<tr>
									<td colspan="4">Dari tempat Kedudukan ke Bandara </td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_qty1" name="transport_qty1" value="0">
									</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_jml1" name="transport_jml1" value="0">
									</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_hasil1" name="transport_hasil1" value="0" readonly>
									</td>
								</tr>
								<tr>
									<td colspan="4">Dari Bandara Ke Tempat Penginapan</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_qty2" name="transport_qty2" value="0">
									</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_jml2" name="transport_jml2" value="0">
									</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_hasil2" name="transport_hasil2" value="0" readonly>
									</td>
								</tr>
								<tr>
									<td colspan="4">Dari Bandara Ke Tempat Penginapan</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_qty3" name="transport_qty3" value="0">
									</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_jml3" name="transport_jml3" value="0">
									</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_hasil3" name="transport_hasil3" value="0" readonly>
									</td>
								</tr>
								<tr>
									<td colspan="4">Dari Bandara Ke Tempat Penginapan</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_qty4" name="transport_qty4" value="0">
									</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_jml4" name="transport_jml4" value="0">
									</td>
									<td colspan="1" class="text-right">
										<input type="text" class="form-control form-control-sm" id="transport_hasil4" name="transport_hasil4" value="0" readonly>
									</td>
								</tr>
								<tr>
									<td colspan="6">Rill PP</td>
									<td colspan="1" class="text-right"><input type="text" class="form-control form-control-sm" id="rill_pp" name="rill_pp" value="0"></td>
								</tr>
								<tr>
									<td colspan="7">
										<hr>
									</td>
								</tr>
								<tr>
									<td colspan="6">Uang Harian</td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="total_uang_harian" name="total_semua_uh" readonly></td>
								</tr>
								<tr>
									<td colspan="3">
										<input type="text" class="form-control form-control-sm" id="gol1" name="pangkat1" placeholder="Golongan..">
									</td>
									<td><input type="text" class="form-control form-control-sm" min="0" value="0" id="jml_uang_harian1" name="jml_uh1"></td>
									<td><input type="text" class="form-control form-control-sm" min="0" value="0" id="qty_uang_harian1" name="qty_uh1"></td>
									<td><input type="text" class="form-control form-control-sm" min="0" value="0" id="jml_hari_uang_harian1" name="jml_huh1"></td>
									<td><input type="text" class="form-control form-control-sm" min="0" value="0" id="total_uang_harian1" name="total_uh1" readonly></td>
								</tr>
								<tr>
									<td colspan="3">
										<input type="text" class="form-control form-control-sm" id="gol2" name="pangkat2" placeholder="Golongan..">
									</td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="jml_uang_harian2" name="jml_uh2"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="qty_uang_harian2" name="qty_uh2"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="jml_hari_uang_harian2" name="jml_huh2"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="total_uang_harian2" name="total_uh2" readonly></td>
								</tr>
								<tr>
									<td colspan="3">
										<input type="text" class="form-control form-control-sm" id="gol3" name="pangkat3" placeholder="Golongan..">
									</td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="jml_uang_harian3" name="jml_uh3"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="qty_uang_harian3" name="qty_uh3"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="jml_hari_uang_harian3" name="jml_huh3"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="total_uang_harian3" name="total_uh3" readonly></td>
								</tr>
								<tr>
									<td colspan="7">
										<hr>
									</td>
								</tr>
								<tr>
									<td colspan="6">Uang Penginapan</td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="total_uang_penginapan" name="total_semua_up" readonly></td>
								</tr>
								<tr>
									<td colspan="3">
										<input type="text" class="form-control form-control-sm" id="tempat_penginapan1" name="tempat_penginapan1" placeholder="Hotel.." required>
									</td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="jml_uang_penginapan1" name="jml_up1"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="qty_uang_penginapan1" name="qty_up1"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="jml_hari_uang_penginapan1" name="jml_hup1"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="total_uang_penginapan1" name="total_up1" readonly></td>
								</tr>
								<tr>
									<td colspan="3">
										<input type="text" class="form-control form-control-sm" id="tempat_penginapan2" name="tempat_penginapan2" placeholder="Hotel..">
									</td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="jml_uang_penginapan2" name="jml_up2"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="qty_uang_penginapan2" name="qty_up2"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="jml_hari_uang_penginapan2" name="jml_hup2"></td>
									<td><input type="text" class="form-control form-control-sm" value="0" id="total_uang_penginapan2" name="total_up2" readonly></td>
								</tr>
								<tr>
									<td colspan="6" class="text-center"><strong>TOTAL</strong></td>
									<td colspan="6">
										<input type="text" class="form-control form-control-sm" value="0" id="total_semua" name="total_semua" readonly>
									</td>
								</tr>
							</table>
							<button type="submit" class="btn btn-sm btn-primary float-right">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="text-center">
		<a href="javascript:void(0);" onclick="window.close();" class="btn btn-danger btn-sm mt-5"><i class="fas fa-times-circle"></i> Close</a>
	</div>

	<!-- MODAL CETAK -->
	<div class="modal fade" id="cetak" tabindex="-1" aria-labelledby="cetakLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="cetakLabel"><strong>CETAK <?= $title ?></strong></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form class="text-gray-900" method="POST" action="<?= base_url('L_Format3') ?>" target="_blank">
					<input type="hidden" name="id_belanjax" id="inputData" value="">
					<div class="modal-body">
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

	<script>
		$(document).ready(function() {
			$('#table').DataTable();
		});

		//Format Angka dan Hitung
		function formatAndCalculate() {
			const pergi_jumlah_satuan = document.getElementById("pergi_jumlah_satuan");
			const pergi_qty = document.getElementById("pergi_qty");
			const pergi_hari = document.getElementById("pergi_hari");
			const pergi_total = document.getElementById("pergi_total");

			const pulang_jumlah_satuan = document.getElementById("pulang_jumlah_satuan");
			const pulang_qty = document.getElementById("pulang_qty");
			const pulang_hari = document.getElementById("pulang_hari");
			const pulang_total = document.getElementById("pulang_total");

			const transport_qty1 = document.getElementById("transport_qty1");
			const transport_jml1 = document.getElementById("transport_jml1");
			const transport_hasil1 = document.getElementById("transport_hasil1");

			const transport_qty2 = document.getElementById("transport_qty2");
			const transport_jml2 = document.getElementById("transport_jml2");
			const transport_hasil2 = document.getElementById("transport_hasil2");

			const transport_qty3 = document.getElementById("transport_qty3");
			const transport_jml3 = document.getElementById("transport_jml3");
			const transport_hasil3 = document.getElementById("transport_hasil3");

			const transport_qty4 = document.getElementById("transport_qty4");
			const transport_jml4 = document.getElementById("transport_jml4");
			const transport_hasil4 = document.getElementById("transport_hasil4");

			const rill_pp = document.getElementById("rill_pp");

			const jml_uang_harian1 = document.getElementById("jml_uang_harian1");
			const jml_uang_harian2 = document.getElementById("jml_uang_harian2");
			const jml_uang_harian3 = document.getElementById("jml_uang_harian3");
			const qty_uang_harian1 = document.getElementById("qty_uang_harian1");
			const qty_uang_harian2 = document.getElementById("qty_uang_harian2");
			const qty_uang_harian3 = document.getElementById("qty_uang_harian3");
			const jml_hari_uang_harian1 = document.getElementById("jml_hari_uang_harian1");
			const jml_hari_uang_harian2 = document.getElementById("jml_hari_uang_harian2");
			const jml_hari_uang_harian3 = document.getElementById("jml_hari_uang_harian3");
			const total_uang_harian1 = document.getElementById("total_uang_harian1");
			const total_uang_harian2 = document.getElementById("total_uang_harian2");
			const total_uang_harian3 = document.getElementById("total_uang_harian3");

			const jml_uang_penginapan1 = document.getElementById("jml_uang_penginapan1");
			const jml_uang_penginapan2 = document.getElementById("jml_uang_penginapan2");
			const qty_uang_penginapan1 = document.getElementById("qty_uang_penginapan1");
			const qty_uang_penginapan2 = document.getElementById("qty_uang_penginapan2");
			const jml_hari_uang_penginapan1 = document.getElementById("jml_hari_uang_penginapan1");
			const jml_hari_uang_penginapan2 = document.getElementById("jml_hari_uang_penginapan2");
			const total_uang_penginapan1 = document.getElementById("total_uang_penginapan1");
			const total_uang_penginapan2 = document.getElementById("total_uang_penginapan2");

			const total_pp = document.getElementById("total_pp");
			const total_uang_harian = document.getElementById("total_uang_harian");
			const total_uang_penginapan = document.getElementById("total_uang_penginapan");
			const total_semua = document.getElementById("total_semua");

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
				value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

				input.value = value;
			}


			function calculate() {
				const num1 = parseFloat(pergi_jumlah_satuan.value.replace(/\./g, ""));
				const num2 = parseFloat(pergi_qty.value.replace(/\./g, ""));
				const num3 = parseFloat(pergi_hari.value.replace(/\./g, ""));
				const num4 = parseFloat(pergi_total.value.replace(/\./g, ""));

				const num5 = parseFloat(pulang_jumlah_satuan.value.replace(/\./g, ""));
				const num6 = parseFloat(pulang_qty.value.replace(/\./g, ""));
				const num7 = parseFloat(pulang_hari.value.replace(/\./g, ""));
				const num8 = parseFloat(pulang_total.value.replace(/\./g, ""));

				const transport_qty1x = parseFloat(transport_qty1.value.replace(/\./g, ""));
				const transport_jml1x = parseFloat(transport_jml1.value.replace(/\./g, ""));
				const transport_hasil1x = parseFloat(transport_hasil1.value.replace(/\./g, ""));
				const transport_qty2x = parseFloat(transport_qty2.value.replace(/\./g, ""));
				const transport_jml2x = parseFloat(transport_jml2.value.replace(/\./g, ""));
				const transport_hasil2x = parseFloat(transport_hasil2.value.replace(/\./g, ""));
				const transport_qty3x = parseFloat(transport_qty3.value.replace(/\./g, ""));
				const transport_jml3x = parseFloat(transport_jml3.value.replace(/\./g, ""));
				const transport_hasil3x = parseFloat(transport_hasil3.value.replace(/\./g, ""));
				const transport_qty4x = parseFloat(transport_qty4.value.replace(/\./g, ""));
				const transport_jml4x = parseFloat(transport_jml4.value.replace(/\./g, ""));
				const transport_hasil4x = parseFloat(transport_hasil4.value.replace(/\./g, ""));

				const rillpp = parseFloat(rill_pp.value.replace(/\./g, ""));

				const jml_uh1 = parseFloat(jml_uang_harian1.value.replace(/\./g, ""));
				const qty_uh1 = parseFloat(qty_uang_harian1.value.replace(/\./g, ""));
				const jml_huh1 = parseFloat(jml_hari_uang_harian1.value.replace(/\./g, ""));
				const ttl_uh1 = parseFloat(total_uang_harian1.value.replace(/\./g, ""));

				const jml_uh2 = parseFloat(jml_uang_harian2.value.replace(/\./g, ""));
				const qty_uh2 = parseFloat(qty_uang_harian2.value.replace(/\./g, ""));
				const jml_huh2 = parseFloat(jml_hari_uang_harian2.value.replace(/\./g, ""));
				const ttl_uh2 = parseFloat(total_uang_harian2.value.replace(/\./g, ""));

				const jml_uh3 = parseFloat(jml_uang_harian3.value.replace(/\./g, ""));
				const qty_uh3 = parseFloat(qty_uang_harian3.value.replace(/\./g, ""));
				const jml_huh3 = parseFloat(jml_hari_uang_harian3.value.replace(/\./g, ""));
				const ttl_uh3 = parseFloat(total_uang_harian3.value.replace(/\./g, ""));

				const jml_up1 = parseFloat(jml_uang_penginapan1.value.replace(/\./g, ""));
				const qty_up1 = parseFloat(qty_uang_penginapan1.value.replace(/\./g, ""));
				const jml_hup1 = parseFloat(jml_hari_uang_penginapan1.value.replace(/\./g, ""));
				const ttl_up1 = parseFloat(total_uang_penginapan1.value.replace(/\./g, ""));
				const jml_up2 = parseFloat(jml_uang_penginapan2.value.replace(/\./g, ""));
				const qty_up2 = parseFloat(qty_uang_penginapan2.value.replace(/\./g, ""));
				const jml_hup2 = parseFloat(jml_hari_uang_penginapan2.value.replace(/\./g, ""));
				const ttl_up2 = parseFloat(total_uang_penginapan2.value.replace(/\./g, ""));
				const ttl_semua = parseFloat(total_semua.value.replace(/\./g, ""));

				const num9 = parseFloat(total_pp.value.replace(/\./g, ""));
				//** Rumus */
				const result1 = (num1 * num2) * num3;
				const result2 = (num5 * num6) * num7;
				const result3 = result1 + result2;
				const total_uh1 = (jml_uh1 * qty_uh1) * jml_huh1;
				const total_uh2 = (jml_uh2 * qty_uh2) * jml_huh2;
				const total_uh3 = (jml_uh3 * qty_uh3) * jml_huh3;
				const total_up1 = (jml_up1 * qty_up1) * jml_hup1;
				const total_up2 = (jml_up2 * qty_up2) * jml_hup2;
				const total_semua_uh = total_uh1 + total_uh2 + total_uh3;
				const total_semua_up = total_up1 + total_up2;
				const total_semuanya = rillpp + result3 + total_semua_uh + total_semua_up;
				const jumlah_transport1 = transport_qty1x * transport_jml1x;
				const jumlah_transport2 = transport_qty2x * transport_jml2x;
				const jumlah_transport3 = transport_qty3x * transport_jml3x;
				const jumlah_transport4 = transport_qty4x * transport_jml4x;
				const total_transport = jumlah_transport1 + jumlah_transport2 + jumlah_transport3 + jumlah_transport4;

				pergi_total.value = new Intl.NumberFormat().format(result1);
				pulang_total.value = new Intl.NumberFormat().format(result2);
				total_pp.value = new Intl.NumberFormat().format(result3);
				total_uang_harian1.value = new Intl.NumberFormat().format(total_uh1);
				total_uang_harian2.value = new Intl.NumberFormat().format(total_uh2);
				total_uang_harian3.value = new Intl.NumberFormat().format(total_uh3);
				total_uang_harian.value = new Intl.NumberFormat().format(total_semua_uh);
				total_uang_penginapan1.value = new Intl.NumberFormat().format(total_up1);
				total_uang_penginapan2.value = new Intl.NumberFormat().format(total_up2);
				total_uang_penginapan.value = new Intl.NumberFormat().format(total_semua_up);
				total_semua.value = new Intl.NumberFormat().format(total_semuanya);

				transport_hasil1.value = new Intl.NumberFormat().format(jumlah_transport1);
				transport_hasil2.value = new Intl.NumberFormat().format(jumlah_transport2);
				transport_hasil3.value = new Intl.NumberFormat().format(jumlah_transport3);
				transport_hasil4.value = new Intl.NumberFormat().format(jumlah_transport4);
				rill_pp.value = new Intl.NumberFormat().format(total_transport);
			}

			pergi_jumlah_satuan.addEventListener("input", function() {
				formatNumber(pergi_jumlah_satuan);
				calculate();
			});
			pergi_qty.addEventListener("input", function() {
				formatNumber(pergi_qty);
				calculate();
			});
			pergi_hari.addEventListener("input", function() {
				formatNumber(pergi_hari);
				calculate();
			});
			rill_pp.addEventListener("input", function() {
				formatNumber(rill_pp);
				calculate();
			});
			pulang_jumlah_satuan.addEventListener("input", function() {
				formatNumber(pulang_jumlah_satuan);
				calculate();
			});
			pulang_qty.addEventListener("input", function() {
				formatNumber(pulang_qty);
				calculate();
			});
			pulang_hari.addEventListener("input", function() {
				formatNumber(pulang_hari);
				calculate();
			});
			jml_hari_uang_harian1.addEventListener("input", function() {
				formatNumber(jml_hari_uang_harian1);
				calculate();
			});
			jml_hari_uang_harian2.addEventListener("input", function() {
				formatNumber(jml_hari_uang_harian2);
				calculate();
			});
			jml_hari_uang_harian3.addEventListener("input", function() {
				formatNumber(jml_hari_uang_harian3);
				calculate();
			});
			qty_uang_harian1.addEventListener("input", function() {
				formatNumber(qty_uang_harian1);
				calculate();
			});
			qty_uang_harian2.addEventListener("input", function() {
				formatNumber(qty_uang_harian2);
				calculate();
			});
			qty_uang_harian3.addEventListener("input", function() {
				formatNumber(qty_uang_harian3);
				calculate();
			});
			jml_uang_harian1.addEventListener("input", function() {
				formatNumber(jml_uang_harian1);
				calculate();
			});
			jml_uang_harian2.addEventListener("input", function() {
				formatNumber(jml_uang_harian2);
				calculate();
			});
			jml_uang_harian3.addEventListener("input", function() {
				formatNumber(jml_uang_harian3);
				calculate();
			});
			total_uang_harian1.addEventListener("input", function() {
				formatNumber(total_uang_harian1);
				calculate();
			});
			total_uang_harian2.addEventListener("input", function() {
				formatNumber(total_uang_harian2);
				calculate();
			});
			total_uang_harian3.addEventListener("input", function() {
				formatNumber(total_uang_harian3);
				calculate();
			});
			total_uang_harian3.addEventListener("input", function() {
				formatNumber(total_uang_harian3);
				calculate();
			});
			jml_uang_penginapan1.addEventListener("input", function() {
				formatNumber(jml_uang_penginapan1);
				calculate();
			});
			qty_uang_penginapan1.addEventListener("input", function() {
				formatNumber(qty_uang_penginapan1);
				calculate();
			});
			jml_hari_uang_penginapan1.addEventListener("input", function() {
				formatNumber(jml_hari_uang_penginapan1);
				calculate();
			});
			jml_uang_penginapan2.addEventListener("input", function() {
				formatNumber(jml_uang_penginapan2);
				calculate();
			});
			qty_uang_penginapan2.addEventListener("input", function() {
				formatNumber(qty_uang_penginapan2);
				calculate();
			});
			jml_hari_uang_penginapan2.addEventListener("input", function() {
				formatNumber(jml_hari_uang_penginapan2);
				calculate();
			});

			transport_qty1.addEventListener("input", function() {
				formatNumber(transport_qty1);
				calculate();
			});

			transport_qty2.addEventListener("input", function() {
				formatNumber(transport_qty2);
				calculate();
			});

			transport_qty3.addEventListener("input", function() {
				formatNumber(transport_qty3);
				calculate();
			});
			transport_qty4.addEventListener("input", function() {
				formatNumber(transport_qty4);
				calculate();
			});
			transport_jml1.addEventListener("input", function() {
				formatNumber(transport_jml1);
				calculate();
			});
			transport_jml2.addEventListener("input", function() {
				formatNumber(transport_jml2);
				calculate();
			});
			transport_jml3.addEventListener("input", function() {
				formatNumber(transport_jml3);
				calculate();
			});
			transport_jml4.addEventListener("input", function() {
				formatNumber(transport_jml4);
				calculate();
			});
		}

		window.onload = formatAndCalculate;

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
	</script>
</body>

</html>