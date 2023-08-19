<!-- Begin Page Content -->
        <div class="container-fluid small">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                    	
                  <form class="form-inline" method="post" action="">

                        
                            <div class="col-lg-2">
                              <a href="<?= base_url('homekeu');?>" class="btn btn-warning btn-icon-split">
			                      <span class="icon text-white-50">
			                          <i class="fas fa-fw fa-arrow-alt-circle-left"></i>
			                      </span>
			                      <span class="text small">Kembali</span>
			                  </a>
                            </div>
                            <div class="col">
                              <select name="tahun" class="form-control" id="selek" required>
                              <option value="">--Pilih Tahun--</option>
                              <?php foreach ($tahun as $key): ?>         
                                <option value="<?=$key['tahun'];?>"><?=$key['tahun'];?></option>
                              <?php endforeach ?>
                            </select>
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-fw fa-eye"></i>&nbsp; Lihat Data</button>
                            </div>
                        
                      </form>

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
                        <th scope="col" class="">Anggaran</th>
                        <th scope="col" class="">Fisik</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;?>
                      <?php foreach ($program as $i) : ?>

                      <tr>

                        <td><form class="form-inline" method="post" action="kegiatan">
                          <input type="hidden" name="kode" value="<?=$mykode;?>">
                          <input type="hidden" name="id_program" value="<?= $i['id_program'];?>">
                          <input type="hidden" name="tahun" value="<?= $i['rp_tahun'];?>">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-forward"></i></button>
                        </form>
                        </td>
                        <td><?= $i['nama_jenis_sasaran'];?></td>
                        <td><?= $i['nama_jenis_program'];?></td>
                        <td><?= $i['sasaran_program'];?></td>
                        <td><?= $i['indikator_kinerja_program'];?></td>
                        <td><?= $i['formulasi_indikator_program'];?></td>
                        <td><?= $i['satuan'];?></td>
                        <td><?= $i['rp_tahun'];?></td>
                        <td><?= number_format($i['rp_target_anggaran']);?></td>
                        <td><?= number_format($i['rp_target_fisik']);?></td>
                        
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