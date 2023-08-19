<!-- Begin Page Content -->
<div class="container-fluid small">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-12">

            <div class="alert alert-primary" role="alert"><strong>Sasaran Strategis:</strong> <?= $aktivitas_data['nama_jenis_sasaran']; ?>
                <br><strong>Program:</strong> <?= $aktivitas_data['nama_jenis_program']; ?>
                <br><strong>Kegiatan:</strong> <?= $aktivitas_data['nama_jenis_kegiatan']; ?>
                <br><strong>Sub Kegiatan:</strong> <?= $aktivitas_data['nama_jenis_sub_kegiatan']; ?>
                <br><strong>Tahun:</strong> <?= $tahun; ?>
            </div>

            <div class="card">
                <div class="card-header text-white gradient-status">
                    <form class="form-inline" method="post" action="sub_kegiatan">
                        <input type="hidden" name="kode" value="<?= $mykode; ?>">
                        <input type="hidden" name="tahun" value="<?= $tahun; ?>">
                        <input type="hidden" name="id_kegiatan" value="<?= $aktivitas_data['id_kegiatan']; ?>">
                        <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-arrow-alt-circle-left"></i>&nbsp;Kembali</button>
                    </form>
                </div>
                <div class="card-body table-responsive">

                    <?= $this->session->flashdata('message'); ?>

                    <table class="table table-hover" id="table">
                        <thead class="">
                            <tr>
                                <th scope="col" class="">#</th>
                                <th scope="col" class="">Kode Rek</th>
                                <th scope="col" class="">Nama Belanja</th>
                                <th scope="col" class="">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($kp_belanja as $i) : ?>

                                <tr>
                                    <td>
                                        <form class="form-inline" method="post" action="tagihan">
                                            <input type="hidden" name="kode" value="<?= $mykode; ?>">
                                            <input type="hidden" name="id_kp_belanja" value="<?= $i['id_kp_belanja']; ?>">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-forward"></i></button>
                                        </form>
                                    </td>
                                    <td><?= $i['no_rek']; ?></td>
                                    <td><?= $i['nama_rek']; ?></td>
                                    <td><?= number_format($i['total_kp_belanja']); ?></td>

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