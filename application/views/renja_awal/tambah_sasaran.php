<!-- Begin Page Content -->
        <div class="container-fluid small">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                    	<a href="<?= base_url('renja_awal');?>" class="btn btn-warning btn-icon-split">
                      <span class="icon text-white">
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
                        <th scope="col" rowspan="2" class="">Nama Sasaran</th>
                        <th scope="col" rowspan="2" class="">Indikator Kerja</th>
                        <th scope="col" rowspan="2" class="">Formulasi Indikator</th>
                        <th scope="col" rowspan="2" class="">Satuan</th>
                        <th scope="col" colspan="2" class="">Tahun</th>
                        <th scope="col" rowspan="2" class="">Opsi</th>
                      </tr>
                      <tr>
                        <th scope="col" class="">Tahun</th>
                        <th scope="col" class="">Target</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;?>
                      <?php foreach ($sasaran as $i) : ?>

                      <tr>
                        <th scope="row"><?=$no;?></th>
                        <td><?= $i['nama_jenis_sasaran'];?></td>
                        <td><?= $i['indikator_kerja'];?></td>
                        <td><?= $i['formulasi_indikator'];?></td>
                        <td><?= $i['satuan'];?></td>
                        <td><?php if ($i['tahun_1']== date('Y', time())) {
                        	echo $i['tahun_1'];
                        }else if ($i['tahun_2']== date('Y', time())) {
                        	echo $i['tahun_2'];
                        }else if ($i['tahun_3']== date('Y', time())) {
                        	echo $i['tahun_3'];
                        }else if ($i['tahun_4']== date('Y', time())) {
                        	echo $i['tahun_4'];
                        }else if ($i['tahun_5']== date('Y', time())) {
                        	echo $i['tahun_5'];
                        } ;?></td>
                        <td><?php if ($i['tahun_1']== date('Y', time())) {
                        	echo $i['t_tahun_1'];
                        }else if ($i['tahun_2']== date('Y', time())) {
                        	echo $i['t_tahun_2'];
                        }else if ($i['tahun_3']== date('Y', time())) {
                        	echo $i['t_tahun_3'];
                        }else if ($i['tahun_4']== date('Y', time())) {
                        	echo $i['t_tahun_4'];
                        }else if ($i['tahun_5']== date('Y', time())) {
                        	echo $i['t_tahun_5'];
                        } ;?></td>
                        <td>
                            <a href="<?= base_url('renja_awal/validasi/'). $i['id_sasaran'];?>" class="btn btn-warning btn-sm btn-icon-split" onclick="return confirm('yakin ambil sasaran strategis ke renja awal?');"><span class="icon text-white">
                                              <i class="fas fa-fw fa-check-circle"></i>
                                          </span></a>
                        </td>

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