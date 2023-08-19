<!-- Begin Page Content -->
        <div class="container-fluid small">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">

            	<div class="alert alert-primary" role="alert"><strong>Sasaran Strategis:</strong> <?=$kp_belanja_data['nama_jenis_sasaran'];?>
            		<br><strong>Program:</strong> <?=$kp_belanja_data['nama_jenis_program'];?>
            		<br><strong>Kegiatan:</strong> <?=$kp_belanja_data['nama_jenis_kegiatan'];?>
            		<br><strong>Sub Kegiatan:</strong> <?=$kp_belanja_data['nama_jenis_sub_kegiatan'];?>
            		<br><strong>Tahun:</strong> <?=$kp_belanja_data['rs_tahun'];?>
            		<br><strong>Kode Rek:</strong> <?=$kp_belanja_data['no_rek'];?>
            		<br><strong>Belanja:</strong> <?=$kp_belanja_data['nama_rek'];?>
            	</div>

              <div class="card">
                    <div class="card-header text-white gradient-status">
                    	<a href="<?= base_url('rka/minta_belanja/').$kp_belanja_data['id_renja_sub'];?>" class="btn btn-warning btn-icon-split">
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
                        <th scope="col" class="">#</th>
                        <th scope="col" class="">Nama Aktivitas</th>
                        <th scope="col" class="">Jumlah</th>   
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;?>
                      <?php foreach ($aktivitas as $i) : ?>

                      <tr>
                        <th scope="row"><a href="<?= base_url('rka/minta_rincian/'). $i['id_aktivitas'];?>"><i class="fas fa-fw fa-forward"></i></a></th>
                        <td><?= $i['nama_aktivitas'];?></td>
                        <td><?= number_format($i['total_belanja_aktivitas']);?></td>
                        
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
