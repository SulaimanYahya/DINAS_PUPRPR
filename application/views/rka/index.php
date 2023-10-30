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
    <li class="nav-item">
      <a class="nav-link" href="#belanja" role="tab" data-toggle="tab">Rincian Belanja</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Halaman Sasaran -->
    <div role="tabpanel" class="tab-pane fade show active" id="sasaran">

      <div class="row mt-2">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header text-primary gradient-card">
              <form class="form-inline" method="post" action="rka/minta_tahun">


                <div class="col-lg-2">
                  Data Sasaran Tahun <?php
                                      date_default_timezone_set('Asia/Makassar');
                                      echo date('Y'); ?>
                </div>
                <div class="col">
                  <select name="tahun" class="form-control" id="selek" required>
                    <option value="">--Pilih Tahun--</option>
                    <?php foreach ($tahun as $key) : ?>
                      <option value="<?= $key['tahun']; ?>"><?= $key['tahun']; ?></option>
                    <?php endforeach ?>
                  </select>
                  <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-fw fa-eye"></i>&nbsp; Lihat RKA</button>
                </div>

              </form>

            </div>
            <div class="card-body table-responsive">

              <?= $this->session->flashdata('message'); ?>

              <table class="table table-hover" id="table">
                <thead class="">
                  <tr>
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
                      <th scope="row"><?= $no; ?></th>
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
              <span class="text-primary">Data Program Tahun <?php
                                                            date_default_timezone_set('Asia/Makassar');
                                                            echo date('Y'); ?>
              </span>
            </div>
            <div class="card-body table-responsive">

              <?= $this->session->flashdata('message'); ?>

              <table class="table table-hover" style="width: 100%" id="table2">
                <thead>
                  <tr>

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
                    <th scope="col" class="">Target Anggaran</th>
                    <th scope="col" class="">Target Fisik</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($program as $i) : ?>

                    <tr>

                      <th scope="row"><?= $no; ?></th>
                      <td><?= $i['nama_jenis_sasaran']; ?></td>
                      <td><?= $i['nama_jenis_program']; ?></td>
                      <td><?= $i['sasaran_program']; ?></td>
                      <td><?= $i['indikator_kinerja_program']; ?></td>
                      <td><?= $i['formulasi_indikator_program']; ?></td>
                      <td><?= $i['satuan']; ?></td>
                      <td><?= $i['rp_tahun']; ?></td>
                      <td><?php if ($i['rp_target_anggaran'] != '0') {
                            echo number_format($i['rp_target_anggaran']);
                          } else {
                            echo "";
                          } ?>
                        <form method="post" action="rka/tambah_anggaran_program">
                          <input type="hidden" name="id_renja_program" value="<?= $i['id_renja_program']; ?>">
                          <input type="<?php if ($i['rp_target_anggaran'] != '0') {
                                          echo "hidden";
                                        } else {
                                          echo "text";
                                        } ?>" class="form-control form-control-sm" placeholder="0" name="rp_target_anggaran" onkeyup="convertToRupiah(this);" required>
                          <button type="submit" class="btn btn-success btn-sm <?php if ($i['rp_target_anggaran'] != '0') {
                                                                                echo "d-none";
                                                                              } else {
                                                                                echo "";
                                                                              } ?>" onclick="return confirm('Yakin update anggaran?');">update</button>
                        </form>
                      </td>
                      <td><?php if ($i['rp_target_fisik'] != '0') {
                            echo $i['rp_target_fisik'];
                          } else {
                            echo "";
                          } ?>
                        <form method="post" action="rka/tambah_fisik_program">
                          <input type="hidden" name="id_renja_program" value="<?= $i['id_renja_program']; ?>">
                          <input type="<?php if ($i['rp_target_fisik'] != '0') {
                                          echo "hidden";
                                        } else {
                                          echo "text";
                                        } ?>" class="form-control form-control-sm" placeholder="0" name="rp_target_fisik" required>
                          <button type="submit" class="btn btn-success btn-sm <?php if ($i['rp_target_fisik'] != '0') {
                                                                                echo "d-none";
                                                                              } else {
                                                                                echo "";
                                                                              } ?>" onclick="return confirm('Yakin update fisik?');">update</button>
                        </form>
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

    </div>
    <!-- Batas Halaman Program -->

    <!-- Halaman Kegiatan -->
    <div role="tabpanel" class="tab-pane fade" id="kegiatan">

      <div class="row mt-2">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header text-white gradient-card">
              <span class="text-primary">Data Kegiatan Tahun <?php
                                                              date_default_timezone_set('Asia/Makassar');
                                                              echo date('Y'); ?></span>
            </div>
            <div class="card-body table-responsive">

              <?= $this->session->flashdata('message'); ?>

              <table class="table table-hover" style="width: 100%" id="table3">
                <thead class="">
                  <tr>
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
                      <th scope="row"><?= $no; ?></th>
                      <td><?= $i['nama_jenis_sasaran']; ?></td>
                      <td><?= $i['nama_jenis_program']; ?></td>
                      <td><?= $i['nama_jenis_kegiatan']; ?></td>
                      <td><?= $i['sasaran_kegiatan']; ?></td>
                      <td><?= $i['indikator_kinerja_kegiatan']; ?></td>
                      <td><?= $i['satuan_kegiatan']; ?></td>
                      <td><?= $i['rk_tahun']; ?></td>
                      <td><?php if ($i['rk_target_anggaran'] != '0') {
                            echo number_format($i['rk_target_anggaran']);
                          } else {
                            echo "";
                          } ?>
                        <form method="post" action="rka/tambah_anggaran_kegiatan">
                          <input type="hidden" name="id_renja_kegiatan" value="<?= $i['id_renja_kegiatan']; ?>">
                          <input type="<?php if ($i['rk_target_anggaran'] != '0') {
                                          echo "hidden";
                                        } else {
                                          echo "text";
                                        } ?>" class="form-control form-control-sm" placeholder="0" name="rk_target_anggaran" onkeyup="convertToRupiah(this);" required>
                          <button type="submit" class="btn btn-success btn-sm <?php if ($i['rk_target_anggaran'] != '0') {
                                                                                echo "d-none";
                                                                              } else {
                                                                                echo "";
                                                                              } ?>" onclick="return confirm('Yakin update anggaran?');">update</button>
                        </form>
                      </td>
                      <td><?php if ($i['rk_target_fisik'] != '0') {
                            echo $i['rk_target_fisik'];
                          } else {
                            echo "";
                          } ?>
                        <form method="post" action="rka/tambah_fisik_kegiatan">
                          <input type="hidden" name="id_renja_kegiatan" value="<?= $i['id_renja_kegiatan']; ?>">
                          <input type="<?php if ($i['rk_target_fisik'] != '0') {
                                          echo "hidden";
                                        } else {
                                          echo "text";
                                        } ?>" class="form-control form-control-sm" placeholder="0" name="rk_target_fisik" required>
                          <button type="submit" class="btn btn-success btn-sm <?php if ($i['rk_target_fisik'] != '0') {
                                                                                echo "d-none";
                                                                              } else {
                                                                                echo "";
                                                                              } ?>" onclick="return confirm('Yakin update fisik?');">update</button>
                        </form>
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

    </div>
    <!-- Batas Halaman Kegiatan -->

    <!-- Halaman Sub Kegiatan -->
    <div role="tabpanel" class="tab-pane fade" id="subkegiatan">

      <div class="row mt-2">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header text-white gradient-card">
              <span class="text-primary">Masuk pada record Sub Kegiatan untuk Buat Daftar Belanja</span>
            </div>
            <div class="card-body table-responsive">

              <?= $this->session->flashdata('message'); ?>

              <table class="table table-hover" style="width: 100%" id="table4">
                <thead class="">
                  <tr>
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
                      <th scope="row"><a href="<?= base_url('rka/tambah_belanja/') . $i['id_renja_sub']; ?>"><i class="fas fa-fw fa-forward"></i></a></th>
                      <td><?= $i['nama_jenis_sasaran']; ?></td>
                      <td><?= $i['nama_jenis_program']; ?></td>
                      <td><?= $i['nama_jenis_kegiatan']; ?></td>
                      <td><?= $i['nama_jenis_sub_kegiatan']; ?></td>
                      <td><?= $i['sasaran_sub_kegiatan']; ?></td>
                      <td><?= $i['indikator_kinerja_sub_kegiatan']; ?></td>
                      <td><?= $i['satuan_sub_kegiatan']; ?></td>
                      <td><?= $i['rs_tahun']; ?></td>
                      <td><?php if ($i['rs_target_anggaran'] != '0') {
                            echo number_format($i['rs_target_anggaran']);
                          } else {
                            echo "";
                          } ?>
                        <form method="post" action="rka/tambah_anggaran_sub">
                          <input type="hidden" name="id_renja_sub" value="<?= $i['id_renja_sub']; ?>">
                          <input type="<?php if ($i['rs_target_anggaran'] != '0') {
                                          echo "hidden";
                                        } else {
                                          echo "text";
                                        } ?>" class="form-control form-control-sm" placeholder="0" name="rs_target_anggaran" onkeyup="convertToRupiah(this);" required>
                          <button type="submit" class="btn btn-success btn-sm <?php if ($i['rs_target_anggaran'] != '0') {
                                                                                echo "d-none";
                                                                              } else {
                                                                                echo "";
                                                                              } ?>" onclick="return confirm('Yakin update anggaran?');">update</button>
                        </form>
                      </td>
                      <td><?php if ($i['rs_target_fisik'] != '0') {
                            echo $i['rs_target_fisik'];
                          } else {
                            echo "";
                          } ?>
                        <form method="post" action="rka/tambah_fisik_sub">
                          <input type="hidden" name="id_renja_sub" value="<?= $i['id_renja_sub']; ?>">
                          <input type="<?php if ($i['rs_target_fisik'] != '0') {
                                          echo "hidden";
                                        } else {
                                          echo "text";
                                        } ?>" class="form-control form-control-sm" placeholder="0" name="rs_target_fisik" required>
                          <button type="submit" class="btn btn-success btn-sm <?php if ($i['rs_target_fisik'] != '0') {
                                                                                echo "d-none";
                                                                              } else {
                                                                                echo "";
                                                                              } ?>" onclick="return confirm('Yakin update fisik?');">update</button>
                        </form>
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

    </div>
    <!-- Batas Halaman Sub Kegiatan -->

    <!-- Halaman Belanja -->
    <div role="tabpanel" class="tab-pane fade show" id="belanja">

      <div class="row mt-2">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header text-primary gradient-card">
              Rincian Belanja Tahun <?php
                                    date_default_timezone_set('Asia/Makassar');
                                    echo date('Y'); ?>, Untuk Melihat Struktur Belanja Masuk Dari Sub Kegiatan >>
            </div>
            <div class="card-body table-responsive">

              <?= $this->session->flashdata('message'); ?>
              <?php foreach ($belanja as $key) : ?>
                <div class="alert alert-success">
                  <table>
                    <tr>
                      <td>No. Rekening</td>
                      <td>:</td>
                      <td><?= $key['no_rek']; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Rekening</td>
                      <td>:</td>
                      <td><?= $key['nama_rek']; ?></td>
                    </tr>
                  </table>
                </div>

                <table class="table table-bordered">
                  <thead class="">
                    <tr>
                      <th scope="col" class="">#</th>
                      <th scope="col" class="">Kode RUP</th>
                      <th scope="col" class="">Rincian</th>
                      <th scope="col" class="">Satuan</th>
                      <th scope="col" class="">Volume</th>
                      <th scope="col" class="">Harga Satuan</th>
                      <th scope="col" class="">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php
                    $this->db->join('tb_kp_belanja', 'tb_kp_belanja.id_kp_belanja=tb_belanja.id_kp_belanja');
                    $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
                    $this->db->join('tb_sub_kegiatan', 'tb_sub_kegiatan.id_sub_kegiatan=tb_renja_sub.id_sub_kegiatan');
                    $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
                    $this->db->join('tb_target_sub', 'tb_target_sub.id_sub_kegiatan=tb_sub_kegiatan.id_sub_kegiatan');
                    $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
                    $this->db->join('tb_satuan', 'tb_satuan.id_satuan=tb_belanja.id_satuan');
                    $rincians = $this->db->get_where('tb_belanja', ['status_dua' => 'renwal', 'tahun_sub' => $key['tahun_sub'], 'tb_belanja.id_kp_belanja' => $key['id_kp_belanja']])->result_array();
                    foreach ($rincians as $i) : ?>

                      <tr>
                        <th scope="row"><?= $no; ?></th>
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

              <?php endforeach ?>

            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Batas Halaman Belanja -->


  </div>


  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->