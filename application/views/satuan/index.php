<!-- Begin Page Content -->
        <div class="container-fluid small">

          <!-- Page Heading -->

          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                    <div class="card-header text-white gradient-status">
                        <a href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#newDataModal"><span class="icon text-white-50">
                                                  <i class="fas fa-fw fa-plus"></i>
                                              </span>
                                              <span class="text">Tambah Satuan</span></a> 
                    </div>
                    <div class="card-body table-responsive">
                        
                        <?= $this->session->flashdata('message'); ?>

                       <table class="table table-hover" id="table">
          <thead class="">
            <tr>
              <th scope="col" class="gradient-huruf">#</th>
              <th scope="col" class="gradient-huruf">Satuan</th>
              <th scope="col" class="gradient-huruf">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;?>
            <?php foreach ($satuan as $i) : ?>

            <tr>
              <th scope="row"><?= $no;?></th>
              <td><?= $i['satuan'];?></td>
              <td>
                  <a href="<?= base_url('satuan/edit/'). $i['id_satuan'];?>" class="btn btn-warning btn-sm btn-icon-split"><span class="icon text-white-50">
                                    <i class="fas fa-fw fa-edit"></i>
                                </span></a>
                  <a href="<?= base_url('satuan/hapus/'). $i['id_satuan'];?>" class="btn btn-danger btn-sm btn-icon-split" onclick="return confirm('yakin hapus data?');"><span class="icon text-white-50">
                                    <i class="fas fa-fw fa-trash"></i>
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

      <!-- Modal Add Data -->

    <div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newDataModalLabel">Tambah Satuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open_multipart('satuan/input');?>
          <div class="modal-body">

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Satuan" name="satuan" required>
            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i>&nbsp;Batal</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-save"></i>&nbsp;Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>