<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LAMPIRAN</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>ok/css/dataTables.bootstrap4.css">

    <script type="text/javascript" src="<?= base_url('assets/'); ?>ok/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>ok/js/datatables.min.js"></script>
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?= base_url('assets/'); ?>plugin/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>selek2/css/select2.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div class="container">
        <div class="pt-5 text-gray-900">
            <label for=""><strong>Lampiran:</strong> Rincian</label>
            <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
            <button type="button" class="btn btn-sm btn-secondary float-right mr-2" id="saveBtn">
                <i class="fas fa fa-fw fa-print"></i> Cetak
            </button>
            <table class="table table-sm text-gray-900" id="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>URAIAN</th>
                        <th>NILAI FISIK</th>
                        <th>PPN 11/111</th>
                        <th>JUMLAH</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($data as $r) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $r->uraian ?></td>
                            <td class="text-right"><?= number_format($r->nilai_fisik) ?></td>
                            <td class="text-right"><?= number_format($r->ppn) ?></td>
                            <td class="text-right">Rp. <?= number_format($r->jumlah) ?></td>
                            <td>
                                <a href="#" class="text-decoration-none badge badge-success" title="Edit">
                                    <i class="fas fa-fw fa-edit"></i>
                                </a>
                                <a href="<?= base_url('format5/delLampiran/' . $r->id) ?>" class="text-decoration-none badge badge-danger" title="Hapus">
                                    <i class="fas fa-fw fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- MODAL TAMBAH DATA -->
            <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahDataLabel"><strong>Tambah Data</strong></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="<?= base_url('format5/simpan/lampiran') ?>">
                            <input type="hidden" name="id" id="id" readonly>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                                    <div class="col-sm-10 row">
                                        <input type="text" class="form-control form-control-sm" name="uraian" id="uraian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nilai_fisik" class="col-sm-2 col-form-label">Nilai Fisik</label>
                                    <div class="col-sm-10 row">
                                        <input type="text" oninput="formatAngka(this)" class="form-control form-control-sm" name="nilai_fisik" id="nilai_fisik">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ppn" class="col-sm-2 col-form-label">PPN</label>
                                    <div class="col-sm-10 row">
                                        <input type="text" oninput="formatAngka(this)" class="form-control form-control-sm" name="ppn" id="ppn">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                    <div class="col-sm-10 row">
                                        <input type="text" oninput="formatAngka(this)" class="form-control form-control-sm" name="jumlah" id="jumlah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nm_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                    <div class="col-sm-10 row">
                                        <input type="text" class="form-control form-control-sm" name="nm_perusahaan" id="nm_perusahaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="penyedia" class="col-sm-2 col-form-label">Penyedia</label>
                                    <div class="col-sm-10 row">
                                        <input type="text" class="form-control form-control-sm" name="direktur_perusahaan" id="direktur_perusahaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pptk" class="col-sm-2 col-form-label">PPTK</label>
                                    <div class="col-sm-10 row">
                                        <select name="pptk" id="pptk" class="form-control form-control-sm">
                                            <?php $i = 1; ?>
                                            <?php foreach ($pegawai as $r) : ?>
                                                <option value="<?= $r->id ?>"><?= $i . '. ' . $r->nama ?></option>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-primary" id="saveBtn">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <script>
            $(".pindah").keyup(function() {
                if (this.value.length == this.maxLength) {
                    $(this).next('.pindah').focus();
                }
            });
        </script>

    </div>
    <!-- End of Page Wrapper -->

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>


    <!-- <script src="<?= base_url('assets/'); ?>js/jquery_3.5.1.min.js"></script> -->
    <!-- Bootstrap core JavaScript-->

    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Plugin datepicker-->
    <script src="<?= base_url('assets/'); ?>plugin/js/bootstrap-datepicker.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>js/chart.js/Chart.min.js"></script>

    <script src="<?= base_url('assets/'); ?>js/my_js.js"></script>
    <script src="<?= base_url('assets/'); ?>selek2/js/select2.js"></script>


</body>

</html>