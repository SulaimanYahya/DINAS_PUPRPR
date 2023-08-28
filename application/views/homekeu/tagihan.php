<!-- Begin Page Content -->
<div class="container-fluid small">

	<!-- Page Heading -->

	<div class="row">
		<div class="col-lg-12">

			<div class="alert alert-primary" role="alert"><strong>Sasaran Strategis:</strong> <?= $tagihan_data['nama_jenis_sasaran']; ?>
				<br><strong>Program:</strong> <?= $tagihan_data['nama_jenis_program']; ?>
				<br><strong>Kegiatan:</strong> <?= $tagihan_data['nama_jenis_kegiatan']; ?>
				<br><strong>Sub Kegiatan:</strong> <?= $tagihan_data['nama_jenis_sub_kegiatan']; ?>
				<br><strong>Tahun:</strong> <?= $tagihan_data['rs_tahun']; ?>
				<br><strong>Kode Rek:</strong> <?= $tagihan_data['no_rek']; ?>
				<br><strong>Belanja:</strong> <?= $tagihan_data['nama_rek']; ?>
			</div>

			<div class="card">
				<div class="card-header text-white gradient-status">
					<div class="row">
						<div>
							<form class="form-inline" method="post" action="belanja">
								<input type="hidden" name="kode" value="<?= $mykode; ?>">
								<input type="hidden" name="id_sub_kegiatan" value="<?= $tagihan_data['id_sub_kegiatan']; ?>">
								<input type="hidden" name="tahun" value="<?= $tagihan_data['rs_tahun']; ?>">
								<button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-arrow-alt-circle-left"></i>&nbsp;Kembali</button>
							</form>
						</div>
						&nbsp;
						<div>

						</div>
					</div>

				</div>
				<div class="card-body table-responsive">

					<?= $this->session->flashdata('message'); ?>

					<table class="table table-hover" id="table">
						<thead class="">
							<tr>
								<th scope="col" class="">#</th>
								<th scope="col" class="">Kode RUP</th>
								<th scope="col" class="">Uraian Belanja</th>
								<th scope="col" class="">Satuan</th>
								<th scope="col" class="">Volume</th>
								<th scope="col" class="">Harga Satuan</th>
								<th scope="col" class="">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							<?php foreach ($tagihan as $i) : ?>

								<tr>
									<td>
										<form class="form-inline" method="post" action="format_tagihan">
											<input type="hidden" name="kode" value="<?= $mykode; ?>">
											<input type="hidden" name="id_belanja" value="<?= $i['id_belanja']; ?>">
											<a href="<?= base_url('tagihan/' . enkrip($i['id_belanja']) . '/' . enkrip($tagihan_data['id_jenis_program']) . '/' . enkrip($tagihan_data['id_jenis_kegiatan']) . '/' . enkrip($tagihan_data['id_jenis_sub_kegiatan'])) ?>" class="btn btn-primary btn-sm">
												<i class="fas fa-hand-holding-usd"></i>
											</a>
											<a href="<?= base_url('pembayaran/' . enkrip($i['id_belanja']) . '/' . enkrip($tagihan_data['id_jenis_program']) . '/' . enkrip($tagihan_data['id_jenis_kegiatan']) . '/' . enkrip($tagihan_data['id_jenis_sub_kegiatan'])) ?>" class="btn btn-primary btn-sm">
												<i class="fas fa-hand-holding-usd"></i>
											</a>
										</form>
									</td>
									<td><?= $i['kode_rup']; ?></td>
									<td><?= $i['uraian_belanja']; ?></td>
									<td><?= $i['satuan']; ?></td>
									<td><?= number_format($i['volume']); ?></td>
									<td><?= number_format($i['harga_satuan']); ?></td>
									<td><?= number_format($i['total']); ?></td>

								</tr>

								<?php $no++; ?>
							<?php endforeach ?>

						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>

	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->