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
          <a href="<?= base_url('renstra'); ?>" class="btn btn-warning btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-fw fa-arrow-alt-circle-left"></i>
            </span>
            <span class="text small">Kembali</span>
          </a>

          <a href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#newDataModal"><span class="icon text-white-50">
              <i class="fas fa-fw fa-plus"></i>
            </span>
            <span class="text small">Tambah Sub Kegiatan</span></a>
        </div>
        <div class="card-body table-responsive">

          <?= $this->session->flashdata('message'); ?>

          <table class="table table-hover" id="table">
            <thead class="">
              <tr>
                <th scope="col" rowspan="2" class="">Action</th>
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
                    <a href="<?= base_url('renstra/hapus_sub_kegiatan/') . $i['id_sub_kegiatan']; ?>" class="btn btn-danger btn-sm btn-icon-split" onclick="return confirm('yakin hapus data?');"><span class="icon text-white-50">
                        <i class="fas fa-fw fa-trash"></i>
                      </span></a>
                  </td>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $i['nama_jenis_sub_kegiatan']; ?></td>
                  <td><?= $i['sasaran_sub_kegiatan']; ?></td>
                  <td><?= $i['indikator_kinerja_sub_kegiatan']; ?></td>
                  <td><?= $i['satuan_sub_kegiatan']; ?></td>
                  <td><?= $i['tahun_sub']; ?></td>
                  <td><?= $i['target_anggaran_sub']; ?></td>
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

<!-- Modal Add Data -->

<div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newDataModalLabel">Tambah Sub Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('renstra/input_sub_kegiatan'); ?>
      <div class="modal-body">

        <div class="form-group">
          <select name="id_jenis_sub_kegiatan" style="width: 100%" class="form-control" id="selek" required>
            <option value="">--Nama Sub Kegiatan--</option>
            <?php foreach ($jenis_sub_kegiatan as $key) : ?>
              <option value="<?= $key['id_jenis_sub_kegiatan']; ?>"><?= $key['nama_jenis_sub_kegiatan']; ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="form-group">
          <input type="hidden" name="id_kegiatan" value="<?= $kegiatan_data['id_kegiatan']; ?>">
          <input type="text" class="form-control" placeholder="Sasaran Sub Kegiatan" name="sasaran_sub_kegiatan" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Indikator Kinerja" name="indikator_kinerja_sub_kegiatan" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Satuan Sub Kegiatan" name="satuan_sub_kegiatan" required>
        </div>

        <div class="row">
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Tahun" name="tahun_1" required>
          </div>
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Target Fisik Tahun 1" name="sf_tahun_1" required>
          </div>
          <div class="col-4">
            <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Target Anggaran Tahun 1" name="sa_tahun_1" required>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Tahun" name="tahun_2" required>
          </div>
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Target Fisik Tahun 2" name="sf_tahun_2" required>
          </div>
          <div class="col-4">
            <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Target Anggaran Tahun 2" name="sa_tahun_2" required>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Tahun" name="tahun_3" required>
          </div>
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Target Fisik Tahun 3" name="sf_tahun_3" required>
          </div>
          <div class="col-4">
            <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Target Anggaran Tahun 3" name="sa_tahun_3" required>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Tahun" name="tahun_4" required>
          </div>
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Target Fisik Tahun 4" name="sf_tahun_4" required>
          </div>
          <div class="col-4">
            <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Target Anggaran Tahun 4" name="sa_tahun_4" required>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Tahun" name="tahun_5" required>
          </div>
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Target Fisik Tahun 5" name="sf_tahun_5" required>
          </div>
          <div class="col-4">
            <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Target Anggaran Tahun 5" name="sa_tahun_5" required>
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