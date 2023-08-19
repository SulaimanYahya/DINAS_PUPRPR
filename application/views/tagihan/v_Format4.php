<div class="container-fluid">
    <h5><strong><?= $title ?></strong></h5>
    <hr>

    <div class="card">
        <div class="card-body">
            <form method="POST">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id = $_POST["f_nama"];
                    $nama = masterGetId('nama', 'tb_pegawai', 'id', $_POST["f_nama"]);
                    $nip = masterGetId('nip', 'tb_pegawai', 'id', $_POST["f_nama"]);
                    $jabatan = $_POST["f_jabatan"];

                    $data = array(
                        "id_pegawai" => $id,
                        "nama" => $nama,
                        "nama" => $nama,
                        "nip" => $nip,
                        "jabatan" => $jabatan
                    );
                    $_SESSION["data_array"][] = $data;
                    // echo "Data berhasil disimpan.";
                }
                ?>
                <div class="row">
                    <div class="col-4">
                        <span class="font-weight-bold">Yang Bertanda Tangan (SPTJM):</span>
                        <div class="row">
                            <div class="form-group">
                                <!-- <label for="inputNama">NAMA</label> -->
                                <select name="f_nama" id="f_nama" class="form-control form-control-sm">
                                    <?php foreach ($pegawai as $r) : ?>
                                        <option value="<?= $r->id ?>"><?= $r->nama ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <!-- <label for="inputJabatan">JABATAN</label> -->
                                <select name="f_jabatan" id="f_jabatan" class="form-control form-control-sm">
                                    <option value="Pengguna Anggaran">Pengguna Anggaran</option>
                                    <option value="Pejabat Pembuat Komitmen">Pejabat Pembuat Komitmen</option>
                                    <option value="Pejabat Penata Usahaan Keuangan">Pejabat Penata Usahaan Keuangan</option>
                                    <option value="Bendahara Pengeluaran">Bendahara Pengeluaran</option>
                                </select>

                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary float-right" type="submit">Tambah</button>
                    </div>
                    <div class="col-8">
                        <span class="font-weight-bold">Daftar nama yang bertanda tangan pada lembar SPTJM:</span>
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
                            <tbody>
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
                                                <td><a href="<?= base_url("format4/delSession/$key/") ?>">del</a></td>
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
            <form method="POST" action="<?= base_url('Format4/simpan') ?>">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="jenis_tagihan">Jenis Tagihan</label>
                            <select class="form-control form-control-sm" id="jenis_tagihan" name="jenis_tagihan">
                                <?php foreach ($jenis_tagihan as $r) : ?>
                                    <option value="<?= $r->id_jenis_tagihan ?>"><?= $r->id_jenis_tagihan . '. ' . $r->nama_jenis_tagihan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="rekening">Rekening</label>
                            <select class="form-control form-control-sm" id="rekening" name="rekening">
                                <?php foreach ($rekening as $r) : ?>
                                    <option value="<?= $r->id_rek ?>" data-chained="<?= $r->id_jenis_tagihan ?>"><?= $r->nama_rek ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="Uraian">Uraian</label>
                            <select class="form-control form-control-sm" id="uraian" name="id_belanja">
                                <?php foreach ($belanja as $r) : ?>
                                    <option value="<?= enkrip($r->id_belanja) ?>" data-chained="<?= $r->id_rek ?>"><?= $r->uraian_belanja ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h6><strong>Nama-nama yang terlibat: </strong></h6>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="bendahara">Bendahara</label>
                                    <select name="bendahara" id="bendahara" class="form-control form-control-sm">
                                        <option value="">-Pilih-</option>
                                        <?php $no = 1; ?>
                                        <?php foreach ($pegawai as $r) : ?>
                                            <option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penerima">Yang Menerima</label>
                                    <select name="penerima" id="penerima" class="form-control form-control-sm">
                                        <option value="">-Pilih-</option>
                                        <?php $no = 1; ?>
                                        <?php foreach ($pegawai as $r) : ?>
                                            <option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ppk_keuangan">Pengguna Anggaran</label>
                                    <select name="pengguna_angg" id="disetujui" class="form-control form-control-sm">
                                        <option value="">-Pilih-</option>
                                        <?php $no = 1; ?>
                                        <?php foreach ($pegawai as $r) : ?>
                                            <option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6">
                        <h6>.</h6>
                        <hr>
                        <div class="form-group">
                            <label for="ppk_keuangan">PPK Keuangan SKPD</label>
                            <select name="ppk_keuangan" id="ppk_keuangan" class="form-control form-control-sm">
                                <option value="">-Pilih-</option>
                                <?php $no = 1; ?>
                                <?php foreach ($pegawai as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ppk">Pejabat Pembuat Komitmen</label>
                            <select name="ppk" id="ppk" class="form-control form-control-sm">
                                <option value="">-Pilih-</option>
                                <?php $no = 1; ?>
                                <?php foreach ($pegawai as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
                                    <?php $no++ ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kadis">Kepala Dinas</label>
                            <select name="kadis" id="kadis" class="form-control form-control-sm">
                                <option value="">-Pilih-</option>
                                <?php $no = 1; ?>
                                <?php foreach ($pegawai as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $no . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="SPM">Nomor Surat Perintah Membayar (SPM)</label>
                            <input type="text" class="form-control form-control-sm" id="SPM" placeholder="...../SPM-LS/0000/23" name="no_spm">
                        </div>
                        <div class="form-group">
                            <label for="no_sppls">Nomor Surat Pernyataan Verifikasi PPK-SKPD</label>
                            <input type="text" class="form-control form-control-sm" id="no_sppls" name="no_sppls" placeholder="………../PUPR.PR/PPK/583/VII/2023">
                        </div>
                        <div class="form-group">
                            <label for="no_sppls">Nomor Kwitansi</label>
                            <input type="text" class="form-control form-control-sm" id="no_kwitansi" name="no_kwitansi" placeholder="………../DPUPRPR-BB/2023">
                        </div>
                        <div class="form-group">
                            <label for="jenis_spm">Jenis Pembayaran</label>
                            <select class="form-control form-control-sm" name="jenis_pembayaran" id="jenis_pembayaran">
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
                                <input type="text" oninput="formatAngka(this)" class="form-control form-control-sm" id="nilai" name="nilai">
                            </div>
                        </div>
                        <div class="form-group input-group-sm mb-2">
                            <label for="jml_angg">Jumlah Anggaran</label>
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
                                </div>
                                <input type="text" oninput="formatAngka(this)" class="form-control form-control-sm" id="jml_angg" name="jml_angg">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="realisasi">Realisasi s/d SPP Lalu</label>
                            <div class="input-group input-group-sm mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="inputGroup-sizing-sm">Rp.</div>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="realisasi" name="realisasi" value="0">
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
                                <input type="text" class="form-control form-control-sm" id="jml_yg_diminta" name="jml_diminta" value="0">
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
                            <select class="form-control form-control-sm" id="id_prog" name="id_prog">
                                <option value=""> - Pilih - </option>
                                <?= $program ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_keg">Kegiatan</label>
                            <select class="form-control form-control-sm" id="id_keg" name="id_keg">
                                <option value=""> - Pilih - </option>
                                <?= $kegiatan ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_subkeg">Sub Kegiatan</label>
                            <select class="form-control form-control-sm" id="id_subkeg" name="id_subkeg">
                                <option value=""> - Pilih - </option>
                                <?= $subKegiatan ?>
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
                </div>
                <!-- <a href="<?= base_url('format4/lampiran') ?>" target="_blank" class="btn btn-secondary btn-sm">Lampiran</a> -->
                <button type="submit" class="btn btn-primary btn-sm float-right">Simpan</button>
            </form>
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
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            input.value = value;
        }

        function calculate() {
            const num1 = parseFloat(numberInput1.value.replace(/\./g, ""));
            const num2 = parseFloat(numberInput2.value.replace(/\./g, ""));
            const num3 = parseFloat(jml_yg_diminta.value.replace(/\./g, ""));

            const result = num1 - num2;
            sisa_angg1.value = new Intl.NumberFormat().format(result);

            const result2 = result - num3;
            sisa_angg2.value = new Intl.NumberFormat().format(result2);
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