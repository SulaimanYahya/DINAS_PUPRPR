<div class="container-fluid small">
	<?= $this->session->flashdata('msg'); ?>
	<table style="width: 100%" id="table2" class="table table-hover">
		<thead>
			<tr>
				<th>NO</th>
				<th>JENIS PEMBAYARAN</th>
				<th>URAIAN</th>
				<th>JUMLAH YANG DIMINTA</th>
				<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($list as $r) : ?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $r->jenis_pembayaran ?></td>
					<td><?= masterGetId('uraian_belanja', 'tb_belanja', 'id_belanja', $r->id_belanja) ?></td>
					<td><?= $r->jml_diminta ?></td>
					<td>
						<a href="#" class="text-decoration-none badge badge-success">Ubah</a>
						<a href="#" class="text-decoration-none badge badge-primary">Detail</a>
						<a href="<?= base_url('Daftar_Tagihan/delete/' . enkrip($r->id) . '/F5') ?>" class="text-decoration-none badge badge-danger">Hapus</a>
						<a href="<?= base_url('Format5pdf/cetak/') . $r->kode_spm; ?>" class="text-decoration-none badge badge-secondary" target="_blank">Cetak</a>
					</td>
				</tr>
				<?php $no++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>