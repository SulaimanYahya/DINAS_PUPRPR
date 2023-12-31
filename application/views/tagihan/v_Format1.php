<div class="container-fluid">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">DATA UMUM (SPM)</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                        <h6 class="font-weight-bold">Kode Rekening:</h6>
                        <h6 class="card-title">
                            <?= $kd_rek ?>
                        </h6>
                        <h6 class="font-weight-bold">Uraian Belanja:</h6>
                        <h6 class="card-title">
                            <?= $uraian ?>
                        </h6>
                    </div>
                    <hr>
                    <form method="POST">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $id = $_POST["f_nama"];
                            $nama = masterGetId('nama', 'tb_pegawai', 'id', $_POST["f_nama"]);
                            $nip = masterGetId('nip', 'tb_pegawai', 'id', $_POST["f_nama"]);
                            $jabatan = masterGetId('jabatan', 'tb_pegawai', 'id', $_POST["f_nama"]);

                            $data = array(
                                "id_pegawai" => $id,
                            );
                            $_SESSION["data_array"][] = $data;
                            // echo "Data berhasil disimpan.";
                        }
                        ?>

                        <div class="row">
                            <div class="col-4">
                                <!-- <span class="font-weight-bold">Masukkan nama yang terlibat:</span>
                                <div class="form-group row">
                                    <label for="inputNama" class="col-sm-2 col-form-label col-form-label-sm">NAMA</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" id="nama" name="f_nama" value="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNIP" class="col-sm-2 col-form-label col-form-label-sm">NIP</label>
                                    <div class="col-sm-10">
                                        <input onkeypress="return hanya_angka(event)" type="text" class="form-control form-control-sm" id="f_nip" name="f_nip" value="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputJabatan" class="col-sm-2 col-form-label col-form-label-sm">JABATAN</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" id="f_jabatan" name="f_jabatan" value="" autocomplete="off">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="f_nama">PPK Keuangan SKPD</label>
                                    <select class="form-control form-control-sm" name="f_nama" id="f_nama">
                                        <option value="">-Pilih-</option>
                                        <?php $i = 1 ?>
                                        <?php foreach ($pegawai as $r) : ?>
                                            <option value="<?= $r->id ?>"><?= $i . '. ' . $r->nama ?></option>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button class="btn btn-sm btn-primary float-right" type="submit">Tambah</button>
                            </div>
                            <div class="col-8">
                                <span class="font-weight-bold">Daftar nama yang bertanda tangan:</span>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NAMA</th>
                                            <th scope="col">NIP</th>
                                            <th scope="col">JABATAN</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: 12px;">
                                        <?php
                                        if (isset($_SESSION["data_array"]) && !empty($_SESSION["data_array"])) {
                                            if (count($_SESSION) > 0) {
                                                $no = 1;
                                                foreach ($_SESSION["data_array"] as $key => $r) :
                                        ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++; ?></th>
                                                        <td><?= $r['nama'] ?></td>
                                                        <td><?= $r['nip'] ?></td>
                                                        <td><?= $r['jabatan'] ?></td>
                                                        <td><a href="<?= base_url("tagihan/delSession/$key/") . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) ?>" class="text-decoration-none badge badge-danger"><i class="fas fa-fw fa-trash"></a></td>
                                                    </tr>
                                        <?php
                                                endforeach;
                                            }
                                        } ?>
                                    </tbody>
                                </table>
                                <!-- <a href="<?= base_url('Tagihan/simpan') ?>" class="badge badge-success">SIMPAN</a> -->
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form action="<?= base_url('Tagihan/simpan') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_belanja" value="<?= enkrip($id_belanja) ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="SPM">Nomor Surat Perintah Membayar (SPM)</label>
                                    <input type="text" class="form-control form-control-sm" id="SPM" placeholder="Nomor SPM" name="no_spm">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_spm">Jenis Tagihan</label>
                                    <select class="form-control form-control-sm" name="jenis_spm" id="jenis_spm">
                                        <option value="LS">Langsung (LS)</option>
                                        <option value="UP">Uang Persediaan (UP)</option>
                                        <option value="GU">Ganti Uang (GU)</option>
                                        <option value="TU">Tambah Uang (TU)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_spm">Tanggal SPM</label>
                                    <input type="date" class="form-control form-control-sm" id="tgl_spm" name="tgl_spm">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah / Nilai (SPM)</label>
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
                                        </div>
                                        <input type="text" value="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="jumlah" name="nilai">
                                    </div>
                                </div>
                                <div class="form-group input-group-sm mb-2">
                                    <label for="jml_angg">Jumlah Anggaran</label>
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" value="<?= number_format($total_anggaran) ?>" id="jml_angg" name="jml_angg" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="realisasi">Realisasi s/d SPP Lalu</label>
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
                                        </div>
                                        <input type="text" value="0" class="form-control form-control-sm" id="realisasi" name="realisasi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sisa_angg1">Sisa Anggaran</label>
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="sisa_angg1" name="sisa_angg1" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jml_yg_diminta">Jumlah yang diminta pada saat SPP ini</label>
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
                                        </div>
                                        <input type="text" value="0" class="form-control form-control-sm" id="jml_yg_diminta" name="jml_yg_diminta">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sisa_angg2">Sisa Anggaran s/d SSP ini</label>
                                    <div class="input-group input-group-sm mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
                                        </div>
                                        <input type="text" class="form-control form-control-sm" id="sisa_angg2" name="sisa_angg2" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="unitkerja">Unit Kerja / Sektor</label>
                                    <input type="text" class="form-control form-control-sm muted" id="unitkerja" name="unitkerja" value="DINAS PEKERJAAN UMUM PENATAAN RUANG DAN PERUMAHAN RAKYAT KABUPATEN BONE BOLANGO" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="id_prog">Program</label>
                                    <select class="form-control form-control-sm" id="id_prog" name="id_prog" readonly>
                                        <option value="<?= $program ?>"> <?= $jenis_program ?> </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_keg">Kegiatan</label>
                                    <select class="form-control form-control-sm" id="id_keg" name="id_keg" readonly>
                                        <option value="<?= $kegiatan ?>"> <?= $jenis_kegiatan ?> </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_subkeg">Sub Kegiatan</label>
                                    <select class="form-control form-control-sm" id="id_subkeg" name="id_subkeg" readonly>
                                        <option value="<?= $subKegiatan ?>"> <?= $jenis_subkegiatan ?> </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ppn">PPN</label>
                                    <input type="number" min="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="ppn" name="ppn" value="0">
                                </div>
                                <div class="form-group">
                                    <label for="pph21">PPH Psl 21</label>
                                    <input type="number" min="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="pph21" name="pph21" value="0">
                                </div>
                                <div class="form-group">
                                    <label for="pph22">PPH Psl 22</label>
                                    <input type="number" min="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="pph22" name="pph22" value="0">
                                </div>
                                <div class="form-group">
                                    <label for="pph23">PPH Psl 23</label>
                                    <input type="number" min="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="pph23" name="pph23" value="0">
                                </div>
                                <div class="form-group">
                                    <label for="pph25">PPH Psl 25</label>
                                    <input type="number" min="0" oninput="formatAngka(this)" class="form-control form-control-sm" id="pph25" name="pph25" value="0">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control-sm" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="gambar" aria-describedby="gambar">Upload Tanda Bukti</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <a href="<?= base_url('tagihan/lampiran/1') ?>" class="btn btn-secondary btn-sm text-decoration-none" target="_blank">Cetak Lampiran</a>
                        <button class="float-right btn btn-sm btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    2
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card">
                <div class="card-body">
                    3
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //Format Angka dan Hitung
    function formatAndCalculate() {
        const numberInput1 = document.getElementById("jml_angg");
        const numberInput2 = document.getElementById("realisasi");
        const sisa_angg1 = document.getElementById("sisa_angg1");
        const jml_yg_diminta = document.getElementById("jml_yg_diminta");
        const sisa_angg2 = document.getElementById("sisa_angg2");

        function formatNumber(input) {
            // Dapatkan nilai dari input
            let value = input.value;

            // Hapus semua karakter selain angka (kecuali tanda negatif di awal)
            value = value.replace(/[^\d-]/g, "");

            // Hapus nol di awal angka (misalnya: 000123 -> 123)
            value = value.replace(/^0+/, "");

            // Jika ada tanda negatif, pastikan hanya satu tanda negatif di awal
            const hasMinusSign = value.startsWith("-");
            value = value.replace(/-/g, "");
            if (hasMinusSign) {
                value = "-" + value;
            }

            // Tambahkan pemisah ribuan (titik) setiap tiga digit dari kanan
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",") || 0;

            input.value = value;
        }

        function calculate() {
            const num1 = parseFloat(numberInput1.value.replace(/\,/g, "")) || 0;
            const num2 = parseFloat(numberInput2.value.replace(/\,/g, "")) || 0;
            const num3 = parseFloat(jml_yg_diminta.value.replace(/\,/g, "")) || 0;

            const result = num1 - num2;

            sisa_angg1.value = result.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            // sisa_angg1.value = new Intl.NumberFormat().format(result);

            const result2 = result - num3;
            sisa_angg2.value = result2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        numberInput1.addEventListener("input", function() {
            formatNumber(numberInput1);
            calculate();
        });

        numberInput2.addEventListener("input", function() {
            formatNumber(numberInput2);
            calculate();
        });

        jml_yg_diminta.addEventListener("input", function() {
            formatNumber(jml_yg_diminta);
            calculate();
        });

    }

    window.onload = formatAndCalculate;


    // function total() {
    //     var jumlah = document.getElementById('jumlah').value;
    //     var jml_angg = document.getElementById('jml_angg').value;

    //     // var harga_printer = document.getElementById('harga_printer').value * document.getElementById('qty_printer').value;
    //     // var harga_harddisk = document.getElementById('harga_harddisk').value * document.getElementById('qty_harddisk').value;
    //     const grand_total = jumlah - jml_angg;
    //     document.getElementById('realisasi').value = grand_total;

    // }
</script>