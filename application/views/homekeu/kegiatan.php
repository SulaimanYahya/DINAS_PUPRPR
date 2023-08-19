<!-- Begin Page Content -->
        <div class="container-fluid small">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">

              <div class="alert alert-primary" role="alert"><strong>Sasaran Strategis:</strong> <?=$program_data['nama_jenis_sasaran'];?>
                <br><strong>Program:</strong> <?=$program_data['nama_jenis_program'];?>
              </div>

              <div class="card">
                    <div class="card-header text-white gradient-status">
                      		<form class="form-inline" method="post" action="program">
		                    <input type="hidden" name="kode" value="<?=$mykode;?>">
		                      <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-arrow-alt-circle-left"></i>&nbsp;Kembali</button>
		                  </form>
                    </div>
                    <div class="card-body table-responsive">
                        
                        <?= $this->session->flashdata('message'); ?>

                       <table class="table table-hover" id="table">
                    <thead class="">
                      <tr>
                        <th scope="col" rowspan="2" class="">#</th>
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
                      <?php $no = 1;?>
                      <?php foreach ($kegiatan as $i) : ?>

                      <tr>
                        <td><form class="form-inline" method="post" action="sub_kegiatan">
                          <input type="hidden" name="kode" value="<?=$mykode;?>">
                          <input type="hidden" name="tahun" value="<?= $i['tahun_kegiatan'];?>">
                          <input type="hidden" name="id_kegiatan" value="<?= $i['id_kegiatan'];?>">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-forward"></i></button>
                        </form>
                        </td>
                        <td><?= $i['nama_jenis_kegiatan'];?></td>
                        <td><?= $i['sasaran_kegiatan'];?></td>
                        <td><?= $i['indikator_kinerja_kegiatan'];?></td>
                        <td><?= $i['satuan_kegiatan'];?></td>
                        <td><?= $i['tahun_kegiatan'];?></td>
                        <td><?= number_format($i['target_anggaran_keg']);?></td>
                        <td><?= $i['target_fisik_keg'];?></td>
                        
                      </tr>

                      <?php $no++; ?>
                      <?php endforeach?>

                    </tbody>
                  </table>

            </div>
          </div>
        </div>
      </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->