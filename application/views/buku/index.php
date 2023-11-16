<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header text-white gradient-status">
                    <a href="" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#newDataModal"><span class="icon text-white-50">
                            <i class="fas fa-fw fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span></a>
                </div>
                <div class="card-body table-responsive">

                    <?= $this->session->flashdata('message'); ?>

                    <table class="table table-hover small" id="table">
                        <thead class="gradient-card-warning">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-dark">Judul</th>
                                <th scope="col" class="text-dark">Keterangan</th>
                                <th scope="col" class="text-dark">File</th>
                                <th scope="col" class="text-dark">Update</th>
                                <th scope="col" class="text-dark">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($file as $i) : ?>

                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><?= $i['judul']; ?></td>
                                    <td><?= $i['ket']; ?></td>
                                    <td><a target="_blank" href="<?= base_url('assets/file/') . $i['file']; ?>"><?= $i['file']; ?></a></td>
                                    <td><?= $i['upload_at']; ?></td>
                                    <td>
                                        <a href="<?= base_url('buku/edit/') . $i['id_file']; ?>" class="btn btn-warning btn-sm btn-icon-split"><span class="icon text-white-50">
                                                <i class="fas fa-fw fa-edit"></i>
                                            </span></a>
                                        <a href="<?= base_url('buku/hapus/') . $i['id_file']; ?>" class="btn btn-danger btn-sm btn-icon-split" onclick="return confirm('yakin hapus data?');"><span class="icon text-white-50">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </span></a>
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

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add Data -->

<div class="modal fade" id="newDataModal" tabindex="-1" role="dialog" aria-labelledby="newDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataModalLabel">Add New Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('buku/input'); ?>
            <div class="modal-body">

                <div class="form-group">
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">
                    <input type="hidden" name="jenis" value="File Dokumen">
                    <input type="text" class="form-control" placeholder="Title..." name="judul" required>
                </div>

                <div class="form-group">
                    <textarea type="text" class="form-control" placeholder="Keterangan..." name="ket"></textarea>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
                            <label class="custom-file-label" for="gambar" name="gambar" aria-describedby="gambar">Masukkan File PDF/Word/Excel/Rar/Zip</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-window-close"></i>&nbsp;Batal</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-save"></i>&nbsp;Simpan</button>
            </div>
        </div>
    </div>
</div>