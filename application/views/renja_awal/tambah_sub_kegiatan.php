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
          <a href="<?= base_url('renja_awal'); ?>" class="btn btn-warning btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-fw fa-arrow-alt-circle-left"></i>
            </span>
            <span class="text small">Kembali</span>
          </a>
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
                <th scope="col" rowspan="2" class="">Opsi</th>
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
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $i['nama_jenis_sub_kegiatan']; ?></td>
                  <td><?= $i['sasaran_sub_kegiatan']; ?></td>
                  <td><?= $i['indikator_kinerja_sub_kegiatan']; ?></td>
                  <td><?= $i['satuan_sub_kegiatan']; ?></td>
                  <td><?= $i['tahun_sub']; ?></td>
                  <td><?= $i['target_anggaran_sub']; ?></td>
                  <td><?= $i['target_fisik_sub']; ?></td>
                  <td>
                    <a href="<?= base_url('renja_awal/validasi_sub_kegiatan/') . $i['id_target_sub']; ?>" class="btn btn-warning btn-sm btn-icon-split" onclick="return confirm('yakin ambil sub kegiatan ke renja awal?');"><span class="icon text-white">
                        <i class="fas fa-fw fa-check-circle"></i>
                      </span></a>
                  </td>

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