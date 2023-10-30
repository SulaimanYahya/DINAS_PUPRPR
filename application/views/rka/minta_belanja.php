<!-- Begin Page Content -->
<div class="container-fluid small">

  <!-- Page Heading -->

  <div class="row">
    <div class="col-lg-12">

      <div class="alert alert-primary" role="alert"><strong>Sasaran Strategis:</strong> <?= $sub_kegiatan_data['nama_jenis_sasaran']; ?>
        <br><strong>Program:</strong> <?= $sub_kegiatan_data['nama_jenis_program']; ?>
        <br><strong>Kegiatan:</strong> <?= $sub_kegiatan_data['nama_jenis_kegiatan']; ?>
        <br><strong>Sub Kegiatan:</strong> <?= $sub_kegiatan_data['nama_jenis_sub_kegiatan']; ?>
        <br><strong>Tahun:</strong> <?= $sub_kegiatan_data['rs_tahun']; ?>
      </div>

      <div class="card">
        <div class="card-header text-white gradient-status">

          <div class="col">
            <form class="form-inline" method="post" action="<?= base_url('rka/minta_tahun'); ?>">
              <input type="hidden" name="tahun" value="<?= $sub_kegiatan_data['rs_tahun']; ?>">
              <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-arrow-alt-circle-left"></i>&nbsp; Kembali</button>
            </form>
          </div>

        </div>
        <div class="card-body table-responsive">

          <?= $this->session->flashdata('message'); ?>

          <table class="table table-hover" id="table">
            <thead class="">
              <tr>
                <th scope="col" class="">#</th>
                <th scope="col" class="">Kode Rekening</th>
                <th scope="col" class="">Nama Belanja</th>
                <th scope="col" class="">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($kp_belanja as $i) : ?>

                <tr>
                  <th scope="row"><a href="<?= base_url('rka/minta_rincian/') . $i['id_kp_belanja']; ?>"><i class="fas fa-fw fa-forward"></i></a></th>
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