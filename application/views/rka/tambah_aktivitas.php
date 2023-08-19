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
                    	<a href="<?= base_url('rka/tambah_belanja/').$kp_belanja_data['id_renja_sub'];?>" class="btn btn-warning btn-icon-split">
                      <span class="icon text-white-50">
                          <i class="fas fa-fw fa-arrow-alt-circle-left"></i>
                      </span>
                      <span class="text small">Kembali</span>
                  </a>

                        <a href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#newDataModal"><span class="icon text-white-50">
                                                  <i class="fas fa-fw fa-plus"></i>
                                              </span>
                                              <span class="text small">Tambah Aktivitas</span></a> 
                    </div>
                    <div class="card-body table-responsive">
                        
                        <?= $this->session->flashdata('message'); ?>

                       <table class="table table-hover" id="table">
                    <thead class="">
                      <tr>
                        <th scope="col" class="">Action</th>
                        <th scope="col" class="">#</th>
                        <th scope="col" class="">Nama Aktivitas</th>
                        <th scope="col" class="">Jumlah</th>   
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;?>
                      <?php foreach ($aktivitas as $i) : ?>

                      <tr>
                        <td>
                            <a href="<?= base_url('rka/hapus_aktivitas/'). $i['id_aktivitas'];?>" class="btn btn-danger btn-sm btn-icon-split" onclick="return confirm('yakin hapus data?');"><span class="icon text-white-50">
                                              <i class="fas fa-fw fa-trash"></i>
                                          </span></a>
                        </td>
                        <th scope="row"><a href="<?= base_url('rka/tambah_rincian/'). $i['id_aktivitas'];?>"><i class="fas fa-fw fa-forward"></i></a></th>
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

      <!-- Modal Add Data -->

    <div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newDataModalLabel">Tambah Aktivitas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open_multipart('rka/input_aktivitas');?>
          <div class="modal-body">

            <div class="form-group">
            	<input type="hidden" name="id_kp_belanja" value="<?=$kp_belanja_data['id_kp_belanja'];?>">
              <textarea type="text" class="form-control" placeholder="Nama Aktivitas" name="nama_aktivitas" required></textarea>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i>&nbsp;Batal</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-save"></i>&nbsp;Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>