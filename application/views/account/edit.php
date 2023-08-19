<!-- Begin Page Content -->
<div class="container-fluid holis" style="height: 90%">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-2"><a href="<?= base_url('account'); ?>" class="btn btn-warning btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-fw fa-arrow-alt-circle-left"></i>
                </span>
                <span class="text small">Kembali</span>
            </a></div>
        <div class="col-sm-9">
            <h1 class="h3 mb-4 text-gray-800">Edit Data</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <?= form_open_multipart('account/edit_proses'); ?>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="hidden" name="id" value="<?= $admin_data['id']; ?>">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin_data['nama']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $admin_data['alamat']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-3 col-form-label">Kontak</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $admin_data['no_hp']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $admin_data['email']; ?>" required>
                </div>
            </div>



            <div class="form-group row">
                <div class="col-sm-3">Gambar</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $admin_data['foto']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="hidden" name="gambar_lama" id="gambar_lama" value="<?= $admin_data['foto']; ?>">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar" aria-describedby="gambar">Pilih Gambar</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-info btn-icon-split"><span class="icon text-white-50">
                            <i class="fas fa-fw fa-save"></i>
                        </span>
                        <span class="text">Perbaharui</span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->