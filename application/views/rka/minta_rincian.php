<!-- Begin Page Content -->
        <div class="container-fluid small">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">

            	<div class="alert alert-primary" role="alert"><strong>Sasaran Strategis:</strong> <?=$aktivitas_data['nama_jenis_sasaran'];?>
            		<br><strong>Program:</strong> <?=$aktivitas_data['nama_jenis_program'];?>
            		<br><strong>Kegiatan:</strong> <?=$aktivitas_data['nama_jenis_kegiatan'];?>
            		<br><strong>Sub Kegiatan:</strong> <?=$aktivitas_data['nama_jenis_sub_kegiatan'];?>
            		<br><strong>Tahun:</strong> <?=$aktivitas_data['rs_tahun'];?>
            		<br><strong>Kode Rek:</strong> <?=$aktivitas_data['no_rek'];?>
            		<br><strong>Belanja:</strong> <?=$aktivitas_data['nama_rek'];?>
            		<br><strong>Aktivitas:</strong> <?=$aktivitas_data['nama_aktivitas'];?>
            	</div>

              <div class="card">
                    <div class="card-header text-white gradient-status">
                    	<a href="<?= base_url('rka/minta_aktivitas/').$aktivitas_data['id_kp_belanja'];?>" class="btn btn-warning btn-icon-split">
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
                        <th scope="col" class="">Kode RUP</th>
                        <th scope="col" class="">Uraian Belanja</th>
                        <th scope="col" class="">Satuan</th>
                        <th scope="col" class="">Volume</th>
                        <th scope="col" class="">Harga Satuan</th>
                        <th scope="col" class="">Total</th>   
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;?>
                      <?php foreach ($belanja as $i) : ?>

                      <tr>
                        <td><?= $i['kode_rup'];?></td>
                        <td><?= $i['uraian_belanja'];?></td>
                        <td><?= $i['satuan'];?></td>
                        <td><?= number_format($i['volume']);?></td>
                        <td><?= number_format($i['harga_satuan']);?></td>
                        <td><?= number_format($i['total']);?></td>
                        
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
