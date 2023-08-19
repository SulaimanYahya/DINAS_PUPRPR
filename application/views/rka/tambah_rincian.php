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
                                              <span class="text small">Tambah Rincian Belanja</span></a> 
                    </div>
                    <div class="card-body table-responsive">
                        
                        <?= $this->session->flashdata('message'); ?>

                       <table class="table table-hover" id="table">
                    <thead class="">
                      <tr>
                        <th scope="col" class="">Action</th>
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
                        <td>
                            <a href="<?= base_url('rka/hapus_belanja/'). $i['id_belanja'];?>" class="btn btn-danger btn-sm btn-icon-split" onclick="return confirm('yakin hapus data?');"><span class="icon text-white-50">
                                              <i class="fas fa-fw fa-trash"></i>
                                          </span></a>
                        </td>
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

      <!-- Modal Add Data -->

    <div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newDataModalLabel">Tambah Rincian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open_multipart('rka/input_belanja');?>
          <div class="modal-body">

          	<div class="form-group">
              <input type="text" class="form-control" placeholder="Kode RUP" name="kode_rup" required>
            </div>

            <div class="form-group">
            	<input type="hidden" name="id_kp_belanja" value="<?=$kp_belanja_data['id_kp_belanja'];?>">
              <textarea type="text" class="form-control" placeholder="Uraian" name="uraian_belanja" required></textarea>
            </div>

            <div class="form-group">
              <select name="id_satuan" style="width: 100%" class="form-control" id="selek" required>
                <option value="">--Pilih Satuan--</option>
                <?php foreach ($satuan as $key): ?>         
                  <option value="<?=$key['id_satuan'];?>"><?=$key['satuan'];?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="number-decimal" placeholder="Volume" name="volume" required>
            </div>

            <div class="form-group">
              <input type="text" onkeyup="convertToRupiah(this);" class="form-control" placeholder="Harga Satuan" name="harga_satuan" required>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i>&nbsp;Batal</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-save"></i>&nbsp;Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>