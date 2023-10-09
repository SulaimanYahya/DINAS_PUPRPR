<!-- Begin Page Content -->
<div class="container-fluid small">

  <!-- Page Heading -->

  <ul class="nav nav-pills nav-fill border border-primary rounded" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" href="#sasaran" role="tab" data-toggle="tab">Sasaran</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#program" role="tab" data-toggle="tab">Program</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#kegiatan" role="tab" data-toggle="tab">Kegiatan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#subkegiatan" role="tab" data-toggle="tab">Sub Kegiatan</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Halaman Sasaran -->
    <div role="tabpanel" class="tab-pane fade show active" id="sasaran">

      <div class="row mt-2">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header text-white gradient-card">
              <a href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#newDataModalSasaran"><span class="icon text-white-50">
                  <i class="fas fa-fw fa-plus"></i>
                </span>
                <span class="text">Tambah Sasaran</span></a>
            </div>
            <div class="card-body table-responsive">

              <?= $this->session->flashdata('message'); ?>

              <table class="table table-hover" id="table">
                <thead class="">
                  <tr>
                    <th scope="col" class="">Action</th>
                    <th scope="col" class="">#</th>
                    <th scope="col" class="">Nama Sasaran</th>
                    <th scope="col" class="">Indikator Kerja</th>
                    <th scope="col" class="">Formulasi Indikator</th>
                    <th scope="col" class="">Satuan</th>
                    <th scope="col" class="">Tahun</th>
                    <th scope="col" class="">Target</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($sasaran as $i) : ?>

                    <tr>
                      <td>
                        <!-- <a href="<?= base_url('renstra/edit_sasaran/') . $i['id_sasaran']; ?>" class="btn btn-warning btn-sm btn-icon-split"><span class="icon text-white-50">
                                              <i class="fas fa-fw fa-edit"></i>
                                          </span></a> -->
                        <a href="<?= base_url('renstra/hapus_sasaran/') . $i['id_sasaran']; ?>" class="btn btn-danger btn-sm btn-icon-split" onclick="return confirm('yakin hapus data?');"><span class="icon text-white-50">
                            <i class="fas fa-fw fa-trash"></i>
                          </span></a>
                      </td>
                      <th scope="row"><a href="<?= base_url('renstra/tambah_program/') . $i['id_sasaran']; ?>"><i class="fas fa-fw fa-forward"></i></a></th>
                      <td><?= $i['nama_jenis_sasaran']; ?></td>
                      <td><?= $i['indikator_kerja']; ?></td>
                      <td><?= $i['formulasi_indikator']; ?></td>
                      <td><?= $i['satuan']; ?></td>
                      <td><?= $i['tahun']; ?></td>
                      <td><?= $i['target']; ?></td>
                    </tr>

                    <?php $no++; ?>
                  <?php endforeach ?>

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Batas Halaman Sasaran -->

    <!-- Halaman Program -->
    <div role="tabpanel" class="tab-pane fade" id="program">

      <div class="row mt-2">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header text-white gradient-card">
              <span class="text-primary">Untuk Tambah Program Dapat Dilakukan Pada Halaman Sasaran Strategis Dengan Meng-klik >> Icon</span>
            </div>
            <div class="card-body table-responsive">

              <?= $this->session->flashdata('message'); ?>

              <table class="table table-hover" id="table2" style="width: 100%">
                <thead class="">
                  <tr>
                    <th scope="col" rowspan="2" class="">Action</th>
                    <th scope="col" rowspan="2" class="">#</th>
                    <th scope="col" rowspan="2" class="">Sasaran Strategis</th>
                    <th scope="col" rowspan="2" class="">Nama Program</th>
                    <th scope="col" rowspan="2" class="">Sasaran Program</th>
                    <th scope="col" rowspan="2" class="">Indikator Kinerja</th>
                    <th scope="col" rowspan="2" class="">Formulasi Indikator</th>
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
                  <?php foreach ($program as $i) : ?>

                    <tr>
                      <td>
                        <a href="<?= base_url('renstra/hapus_program/') . $i['id_program']; ?>" class="btn btn-danger btn-sm btn-icon-split" onclick="return confirm('yakin hapus data?');"><span class="icon text-white-50">
                            <i class="fas fa-fw fa-trash"></i>
                          </span></a>
                      </td>
                      <th scope="row"><a href="<?= base_url('renstra/tambah_kegiatan/') . $i['id_program']; ?>"><i class="fas fa-fw fa-forward"></i></a></th>
                      <td><?= $i['nama_jenis_sasaran']; ?></td>
                      <td><?= $i['nama_jenis_program']; ?></td>
                      <td><?= $i['sasaran_program']; ?></td>
                      <td><?= $i['indikator_kinerja_program']; ?></td>
                      <td><?= $i['formulasi_indikator_program']; ?></td>
                      <td><?= $i['satuan']; ?></td>
                      <td><?= $i['tahun_program']; ?></td>
                      <td><?= number_format($i['target_anggaran']); ?></td>
                      <td><?= $i['target_fisik']; ?></td>

                    </tr>

                    <?php $no++; ?>
                  <?php endforeach ?>

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Batas Halaman Program -->

    <!-- Halaman Kegiatan -->
    <div role="tabpanel" class="tab-pane fade" id="kegiatan">

      <div class="row mt-2">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header text-white gradient-card">
              <span class="text-primary">Untuk Tambah Kegiatan Dapat Dilakukan Pada Halaman Kegiatan Dengan Meng-klik >> Icon</span>
            </div>
            <div class="card-body table-responsive">

              <?= $this->session->flashdata('message'); ?>

              <table class="table table-hover" id="table3" style="width: 100%">
                <thead class="">
                  <tr>
                    <th scope="col" rowspan="2" class="">Action</th>
                    <th scope="col" rowspan="2" class="">#</th>
                    <th scope="col" rowspan="2" class="">Sasaran Strategis</th>
                    <th scope="col" rowspan="2" class="">Nama Program</th>
                    <th scope="col" rowspan="2" class="">Nama Kegiatan</th>
                    <th scope="col" rowspan="2" class="">Sasaran Kegiatan</th>
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
                  <?php foreach ($kegiatan as $i) : ?>

                    <tr>
                      <td>
                        <a href="<?= base_url('renstra/hapus_kegiatan/') . $i['id_kegiatan']; ?>" class="btn btn-danger btn-sm btn-icon-split" onclick="return confirm('yakin hapus data?');"><span class="icon text-white-50">
                            <i class="fas fa-fw fa-trash"></i>
                          </span></a>
                      </td>
                      <th scope="row"><a href="<?= base_url('renstra/tambah_sub_kegiatan/') . $i['id_kegiatan']; ?>"><i class="fas fa-fw fa-forward"></i></a></th>
                      <td><?= $i['nama_jenis_sasaran']; ?></td>
                      <td><?= $i['nama_jenis_program']; ?></td>
                      <td><?= $i['nama_jenis_kegiatan']; ?></td>
                      <td><?= $i['sasaran_kegiatan']; ?></td>
                      <td><?= $i['indikator_kinerja_kegiatan']; ?></td>
                      <td><?= $i['satuan_kegiatan']; ?></td>
                      <td><?= $i['tahun_kegiatan']; ?></td>
                      <td><?= number_format($i['target_anggaran_keg']); ?></td>
                      <td><?= $i['target_fisik_keg']; ?></td>

                    </tr>

                    <?php $no++; ?>
                  <?php endforeach ?>

                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Batas Halaman Kegiatan -->

    <!-- Halaman KSub Kegiatan -->
    <div role="tabpanel" class="tab-pane fade" id="subkegiatan">

      <div class="row mt-2">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header text-white gradient-card">
              <span class="text-primary">Untuk Tambah Sub Kegiatan Dapat Dilakukan Pada Halaman Kegiatan Dengan Meng-klik >> Icon</span>
            </div>
            <div class="card-body table-responsive">

              <?= $this->session->flashdata('message'); ?>

              <table class="table table-hover" id="table4" style="width: 100%">
                <thead class="">
                  <tr>
                    <th scope="col" rowspan="2" class="">Action</th>
                    <th scope="col" rowspan="2" class="">#</th>
                    <th scope="col" rowspan="2" class="">Sasaran Strategis</th>
                    <th scope="col" rowspan="2" class="">Nama Program</th>
                    <th scope="col" rowspan="2" class="">Nama Kegiatan</th>
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
                        <a href="<?= base_url('renstra/hapus_sub_kegiatan/') . $i['id_sub_kegiatan']; ?>" class="btn btn-danger btn-sm btn-icon-split" onclick="return confirm('yakin hapus data?');"><span class="icon text-white-50">
                            <i class="fas fa-fw fa-trash"></i>
                          </span></a>
                      </td>
                      <th scope="row"><?= $no; ?></th>
                      <td><?= $i['nama_jenis_sasaran']; ?></td>
                      <td><?= $i['nama_jenis_program']; ?></td>
                      <td><?= $i['nama_jenis_kegiatan']; ?></td>
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

    </div>
    <!-- Halaman Sasaran -->


  </div>


  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add Data -->

<div class="modal fade" id="newDataModalSasaran" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newDataModalLabel">Tambah Sasaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('renstra/input_sasaran'); ?>
      <div class="modal-body">

        <div class="form-group">
          <select name="id_jenis_sasaran" style="width: 100%" class="form-control" id="selek" required>
            <option value="">--Sasaran Strategis--</option>
            <?php foreach ($jenis_sasaran as $key) : ?>
              <option value="<?= $key['id_jenis_sasaran']; ?>"><?= $key['nama_jenis_sasaran']; ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Indikator Kinerja" name="indikator_kerja" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Formulasi Indikator" name="formulasi_indikator" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Satuan" name="satuan" required>
        </div>

        <div class="row">
          <div class="col-6">
            <input type="text" class="form-control mb-2" placeholder="Tahun 1" name="tahun_1" required>
          </div>
          <div class="col-6">
            <input type="text" class="form-control" placeholder="Target Tahun 1" name="t_tahun_1" required>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <input type="text" class="form-control mb-2" placeholder="Tahun 2" name="tahun_2" required>
          </div>
          <div class="col-6">
            <input type="text" class="form-control" placeholder="Target Tahun 2" name="t_tahun_2" required>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <input type="text" class="form-control mb-2" placeholder="Tahun 3" name="tahun_3" required>
          </div>
          <div class="col-6">
            <input type="text" class="form-control" placeholder="Target Tahun 3" name="t_tahun_3" required>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <input type="text" class="form-control mb-2" placeholder="Tahun 4" name="tahun_4" required>
          </div>
          <div class="col-6">
            <input type="text" class="form-control" placeholder="Target Tahun 4" name="t_tahun_4" required>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <input type="text" class="form-control mb-2" placeholder="Tahun 5" name="tahun_5" required>
          </div>
          <div class="col-6">
            <input type="text" class="form-control" placeholder="Target Tahun 5" name="t_tahun_5" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i>&nbsp;Batal</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-save"></i>&nbsp;Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>