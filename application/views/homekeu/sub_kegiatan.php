<!-- Begin Page Content -->
<div class="container-fluid small">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-12">

            <div class="alert alert-primary" role="alert"><strong>Sasaran Strategis:</strong> <?= $kegiatan_data['nama_jenis_sasaran']; ?>
                <br><strong>Program:</strong> <?= $kegiatan_data['nama_jenis_program']; ?>
                <br><strong>Kegiatan:</strong> <?= $kegiatan_data['nama_jenis_kegiatan']; ?>
            </div>

            <div class="card">
                <div class="card-header text-white gradient-status">
                    <form class="form-inline" method="post" action="kegiatan">
                        <input type="hidden" name="kode" value="<?= $mykode; ?>">
                        <input type="hidden" name="id_program" value="<?= $kegiatan_data['id_program']; ?>">
                        <input type="hidden" name="tahun" value="<?= $tahun; ?>">
                        <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-arrow-alt-circle-left"></i>&nbsp;Kembali</button>
                    </form>
                </div>
                <div class="card-body table-responsive">

                    <?= $this->session->flashdata('message'); ?>

                    <table class="table table-hover" id="table">
                        <thead class="">
                            <tr>
                                <th scope="col" rowspan="2" class="">#</th>
                                <th scope="col" rowspan="2" class="">Nama Sub Kegiatan</th>
                                <th scope="col" rowspan="2" class="">Sasaran Sub Kegiatan</th>
                                <th scope="col" rowspan="2" class="">Indikator Kinerja</th>
                                <th scope="col" rowspan="2" class="">Satuan</th>
                                <th scope="col" rowspan="2" class="">Tahun</th>
                                <th scope="col" colspan="2" class="">Target</th>
                            </tr>
                            <tr>
                                <th scope="col" class="">Anggaran</th>
                                <th scope="col" class="">Fisik</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($sub_kegiatan as $i) : ?>

                                <tr>
                                    <td>
                                        <form class="form-inline" method="post" action="belanja">
                                            <input type="hidden" name="kode" value="<?= $mykode; ?>">
                                            <input type="hidden" name="id_sub_kegiatan" value="<?= $i['id_sub_kegiatan']; ?>">
                                            <input type="hidden" name="tahun" value="<?= $i['tahun_sub']; ?>">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-forward"></i></button>
                                        </form>
                                    </td>
                                    <td><?= $i['nama_jenis_sub_kegiatan']; ?></td>
                                    <td><?= $i['sasaran_sub_kegiatan']; ?></td>
                                    <td><?= $i['indikator_kinerja_sub_kegiatan']; ?></td>
                                    <td><?= $i['satuan_sub_kegiatan']; ?></td>
                                    <td><?= $i['tahun_sub']; ?></td>
                                    <td><?= number_format($i['target_anggaran_sub']); ?></td>
                                    <td><?= $i['target_fisik_sub']; ?></td>

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