<div class="container-fluid small">
    <table style="width: 100%" id="table2" class="table table-hover">
        <thead>
            <tr>
                <th>NO</th>
                <th style="width: 150px">NO SPM</th>
                <th style="width: 120px">TGL SPM</th>
                <th>JENIS</th>
                <th>URAIAN</th>
                <th>STATUS</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($list as $r) : ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $r->no_spm ?></td>
                    <td><?= $r->tgl_spm ?></td>
                    <td><?= $r->jenis_spm ?></td>
                    <td><?= masterGetId('uraian_belanja', 'tb_belanja', 'id_belanja', $r->id_belanja) ?></td>
                    <td><?= $r->status ?></td>
                    <td>
                        <a href="#" class="text-decoration-none badge badge-success">Ubah</a>
                        <a href="#" class="text-decoration-none badge badge-primary">Detail</a>
                        <a href="#" class="text-decoration-none badge badge-danger">Hapus</a>
                        <a href="<?= base_url('Format1pdf/cetak/'). $r->kode_spm ;?>" class="text-decoration-none badge badge-secondary" target="_blank">Cetak</a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>