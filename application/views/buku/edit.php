<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-7">

            <div class="card">
                <div class="card-header text-white gradient-status">
                    <a href="<?= base_url('buku'); ?>" class="btn btn-warning btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-arrow-alt-circle-left"></i>
                        </span>
                        <span class="text small">Kembali</span>
                    </a>
                </div>
                <div class="card-body">

                    <?= $this->session->flashdata('message'); ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo form_open_multipart('buku/edit_proses'); ?>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="id_file" value="<?= $file['id_file']; ?>">
                                    <input type="text" class="form-control" name="judul" value="<?= $file['judul']; ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea type="text" class="form-control" name="ket" required><?= $file['ket']; ?></textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-3">File</div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <a target="_blank" href="<?= base_url('assets/file/') . $file['file']; ?>"><?= $file['file']; ?></a>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="custom-file">
                                                <input type="hidden" name="gambar_lama" id="gambar_lama" value="<?= $file['file']; ?>">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                <label class="custom-file-label" for="gambar" aria-describedby="gambar">Pilih File PDF/Word/Excel/Rar/Zip</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-50">
                                            <i class="fas fa-fw fa-save"></i>
                                        </span>
                                        <span class="text">Simpan Perubahan</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->