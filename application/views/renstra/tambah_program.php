<!-- Begin Page Content -->
<div class="container-fluid small">

  <!-- Page Heading -->

  <div class="row">
    <div class="col-lg-12">

      <div class="alert alert-primary" role="alert"><strong>Sasaran Strategis:</strong> <?= $sasaran_data['nama_jenis_sasaran']; ?></div>

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
            <span class="text small">Tambah Program</span></a>
        </div>
        <div class="card-body table-responsive">

          <?= $this->session->flashdata('message'); ?>

          <table class="table table-hover" id="table">
            <thead class="">
              <tr>
                <th scope="col" rowspan="2" class="">Action</th>
                <th scope="col" rowspan="2" class="">#</th>
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
                  <td><?= $i['nama_jenis_program']; ?></td>
                  <td><?= $i['sasaran_program']; ?></td>
                  <td><?= $i['indikator_kinerja_program']; ?></td>
                  <td><?= $i['formulasi_indikator_program']; ?></td>
                  <td><?= $i['satuan_program']; ?></td>
                  <td><?= $i['tahun_program']; ?></td>
                  <td><?= $i['target_anggaran']; ?></td>
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

  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add Data -->

<div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newDataModalLabel">Tambah Program</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('renstra/input_program'); ?>
      <div class="modal-body">

        <div class="form-group">
          <select name="id_jenis_program" style="width: 100%" class="form-control" id="selek" required>
            <option value="">--Nama Program--</option>
            <?php foreach ($jenis_program as $key) : ?>
              <option value="<?= $key['id_jenis_program']; ?>"><?= $key['nama_jenis_program']; ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="form-group">
          <input type="hidden" name="id_sasaran" value="<?= $sasaran_data['id_sasaran']; ?>">
          <input type="text" class="form-control" placeholder="Sasaran Program" name="sasaran_program" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Indikator Kinerja" name="indikator_kinerja_program" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Formulasi Indikator" name="formulasi_indikator_program" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Satuan Program" name="satuan_program" required>
        </div>

        <div class="row">
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Tahun" name="tahun_1" required>
          </div>
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Target Fisik Tahun 1" name="f_tahun_1" required>
          </div>
          <div class="col-4">
            <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Target Anggaran Tahun 1" name="a_tahun_1" required>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Tahun" name="tahun_2" required>
          </div>
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Target Fisik Tahun 2" name="f_tahun_2" required>
          </div>
          <div class="col-4">
            <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Target Anggaran Tahun 2" name="a_tahun_2" required>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Tahun" name="tahun_3" required>
          </div>
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Target Fisik Tahun 3" name="f_tahun_3" required>
          </div>
          <div class="col-4">
            <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Target Anggaran Tahun 3" name="a_tahun_3" required>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Tahun" name="tahun_4" required>
          </div>
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Target Fisik Tahun 4" name="f_tahun_4" required>
          </div>
          <div class="col-4">
            <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Target Anggaran Tahun 4" name="a_tahun_4" required>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Tahun" name="tahun_5" required>
          </div>
          <div class="col-4">
            <input type="text" class="form-control mb-2" placeholder="Target Fisik Tahun 5" name="f_tahun_5" required>
          </div>
          <div class="col-4">
            <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Target Anggaran Tahun 5" name="a_tahun_5" required>
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