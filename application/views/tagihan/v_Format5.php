<div class="container-fluid">
    <h5><strong>FORM FORMAT 5</strong></h5>
    <hr>

    <div class="card">
        <div class="card-body">
            <form method="POST">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id = $_POST["f_nama"];
                    $nama = masterGetId('nama', 'tb_pegawai', 'id', $_POST["f_nama"]);
                    $nip = masterGetId('nip', 'tb_pegawai', 'id', $_POST["f_nama"]);
                    $jabatan = masterGetId('jabatan', 'tb_pegawai', 'id', $_POST["f_nama"]);

                    $data = array(
                        "id_pegawai" => $id,
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
                        <div class="form-group">
                            <!-- <label for="inputNama">NAMA</label> -->
                            <select name="f_nama" id="f_nama" class="form-control form-control-sm">
                                <?php $i = 1; ?>
                                <?php foreach ($pegawai as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $i . '. ' . $r->nama ?></option>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </select>
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
                                                <td>
                                                    <a href="<?= base_url("format5/delSession/$key/") ?>" class="text-decoration-none badge badge-danger" title="Hapus"><i class="fas fa-fw fa-trash"></i></a>
                                                </td>
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
            <form method="POST" action="<?= base_url('format5/simpan') ?>">
                <h6><strong>1. SURAT PERNYATAAN VERIFIKASI PPK-SKPD</strong></h6>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="no_spm">Nomor SPM</label>
                            <input type="text" class="form-control form-control-sm" id="no_spm" name="no_spm" placeholder=" ...../0002/SPM-LS/CK/DPUPRPR/2023">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal_no_spm">
                        </div>
                        <div class="form-group">
                            <label for="Besaran">Besaran</label>
                            <input type="text" class="form-control form-control-sm" id="besaran" name="besaran" placeholder="Rp.">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ppk_keuangan_skpd">PPK Keuangan SKPD</label>
                            <select class="form-control form-control-sm" name="ppk_keuangan_skpd" id="ppk_keuangan_skpd">
                                <option value="">-Pilih-</option>
                                <?php $i = 1 ?>
                                <?php foreach ($pegawai as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $i . '. ' . $r->nama . ' (' . $r->nip . ')' ?></option>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <h6><strong>2. KWITANSI / BUKTI PEMBAYARAN</strong></h6>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tahun_anggaran">Tahun Anggaran</label>
                            <input type="text" class="form-control form-control-sm" id="tahun_anggaran" name="tahun_anggaran">
                        </div>
                        <div class="form-group">
                            <label for="jml_uang">Jumlah Uang</label>
                            <input type="text" class="form-control form-control-sm" id="jml_uang" name="jml_uang">
                        </div>
                        <div class="form-group">
                            <label for="untuk_pembayaran">Untuk Pembayaran</label>
                            <textarea class="form-control form-control-sm" name="untuk_pembayaran" id="untuk_pembayaran" cols="62" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="PPTK">Pejabat Pelaksana Teknis Kegiatan (PPTK)</label>
                            <input type="text" class="form-control form-control-sm" id="pptk" name="pptk">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jenis_tagihan">Jenis Tagihan</label>
                            <select class="form-control form-control-sm" id="jenis_tagihan" name="jenis_tagihan">
                                <?php foreach ($jenis_tagihan as $r) : ?>
                                    <option value="<?= $r->id_jenis_tagihan ?>"><?= $r->id_jenis_tagihan . '. ' . $r->nama_jenis_tagihan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rekening">Rekening Belanja</label>
                            <select class="form-control form-control-sm" id="rekening" name="rekening_belanja">
                                <?php foreach ($rekening as $r) : ?>
                                    <option value="<?= $r->id_rek ?>" data-chained="<?= $r->id_jenis_tagihan ?>"><?= $r->nama_rek ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Uraian">Uraian</label>
                            <select class="form-control form-control-sm" id="uraian" name="id_belanja">
                                <?php foreach ($belanja as $r) : ?>
                                    <option value="<?= enkrip($r->id_belanja) ?>" data-chained="<?= $r->id_rek ?>"><?= $r->uraian_belanja ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pihak_penyedia">Pihak Penyedia</label>
                            <input type="text" class="form-control form-control-sm" id="pihak_penyedia" name="pihak_penyedia">
                        </div>
                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control form-control-sm" id="nama_perusahaan" name="nama_perusahaan">
                        </div>
                    </div>
                </div>
                <h6><strong>3. BERITA ACARA PEMBAYARAN</strong></h6>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nomor_ba_pembayaran">Nomor Berita Acara Pembayaran</label>
                            <input type="text" class="form-control form-control-sm" id="nomor_ba_pembayaran" name="nomor_ba_pembayaran">
                        </div>
                        <div class="form-group">
                            <label for="pihak_kesatu">Pihak Kesatu</label>
                            <select class="form-control form-control-sm" name="pihak_kesatu" id="pihak_kesatu">
                                <option value="">-Pilih-</option>
                                <?php $i = 1 ?>
                                <?php foreach ($pegawai as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $i . '. ' . $r->nama ?></option>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pihak_kedua">Pihak Kedua</label>
                            <select class="form-control form-control-sm" name="pihak_kedua" id="pihak_kedua">
                                <option value="">-Pilih-</option>
                                <?php $i = 1 ?>
                                <?php foreach ($pihak_kedua as $r) : ?>
                                    <option value="<?= $r->id ?>"><?= $i . '. ' . $r->nama ?></option>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </select>
                            <a href="<?= base_url('format5/pihak_kedua') ?>" target="_blank" class="text-decoration-none badge badge-primary">Tambah Pihak Kedua</a>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control form-control-sm" id="pekerjaan" name="pekerjaan">
                        </div>
                        <div class="form-group">
                            <label for="npwp">Nomor Pokok Wajib Pajak (NPWP)</label>
                            <input type="text" class="form-control form-control-sm" id="npwp" name="npwp">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="no_rekening">Nomor Rekening</label>
                                    <input type="text" class="form-control form-control-sm" id="no_rekening" name="no_rekening">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="bank">BANK</label>
                                    <input type="text" class="form-control form-control-sm" id="bank" name="bank">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_kontrak">Nomor Kontrak</label>
                            <input type="text" class="form-control form-control-sm" id="no_kontrak" name="no_kontrak" placeholder="Contoh: 07/KONTRAK/DPUPPR-BB/CK/RS/VIII/2023">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_kontrak">Tanggal Kontrak</label>
                            <input type="date" class="form-control form-control-sm" id="tgl_kontrak" name="tgl_kontrak">
                        </div>
                        <div class="form-group">
                            <label for="no_amandemen">Nomor Amandemen</label>
                            <input type="text" class="form-control form-control-sm" id="no_amandemen" name="no_amandemen">
                        </div>
                        <div class="form-group">
                            <label for="tgl_amandemen">Tanggal Amandemen</label>
                            <input type="date" class="form-control form-control-sm" id="tgl_amandemen" name="tgl_amandemen">
                        </div>
                        <div class="form-group">
                            <label for="nilai_kontrak">Nilai Kontrak</label>
                            <input type="text" class="form-control form-control-sm" id="nilai_kontrak1" name="nilai_kontrak" oninput="hitungJumlah()">
                        </div>
                    </div>
                    <div class="col-6">
                        <label><i><strong>Pembayaran Termyn Fisik 45% Keu. 40%</strong></i></label>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pembayaran">Pembayaran</label>
                                    <input type="text" class="form-control form-control-sm" name="pembayaran" id="nilai_kontrak2" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="realisasi_bln_lalu">Realisasi Bulan lalu</label>
                                    <input type="text" class="form-control form-control-sm" name="realisasi_bln_lalu1" id="realisasi_bln_lalu1" oninput="hitungJumlah()">
                                </div>
                                <div class="form-group">
                                    <label for="pot_uang_muka">Potongan Uang Muka</label>
                                    <input type="text" class="form-control form-control-sm" id="pot_uang_muka1" name="pot_uang_muka1" oninput="hitungJumlah()">
                                </div>
                                <div class="form-group">
                                    <label for="ppn">PPN (11/111)</label>
                                    <input type="text" class="form-control form-control-sm" id="ppn" name="ppn" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="pph">PPh Pasal 4 Ayat 2</label>
                                    <input type="text" class="form-control form-control-sm" id="pph1" name="pph11" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pembayaran40">40%</label>
                                    <input type="text" class="form-control form-control-sm" value="0" id="pot40" name="pot40" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">0%</label>
                                    <input type="text" class="form-control form-control-sm" id="realisasi_bln_lalu2" name="realisasi_bln_lalu" oninput="hitungJumlah()" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="pot_uang_muka45">45%</label>
                                    <input type="text" class="form-control form-control-sm" id="pot45" name="pot45" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah Pembayaran Fisik</label>
                                    <input type="text" class="form-control form-control-sm" id="jumlah" name="jumlah_pembayaran" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="pph">PPh</label>
                                    <input type="text" class="form-control form-control-sm" id="pph" name="pph" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for=jml_potongan_pajak" class="col-sm-6 col-form-label">Jumlah Potongan Pajak</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="jml_pot_pajak" name="jml_pot_pajak" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sisa_dana" class="col-sm-6 col-form-label">Sisa dana Pihak Kedua</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="sisa_dana" name="sisa_dana" readonly>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary float-right">SIMPAN</button>
                        <a href="<?= base_url('format5/lampiran') ?>" target="_blank" class="text-decoration-none btn btn-secondary btn-sm float-right mr-3">Lampiran</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function hitungJumlah() {
        function getValueAndParseInput(inputId) {
            return parseFloat(document.getElementById(inputId).value.replace(/\D/g, '')) || 0;
        }

        function setOutputValue(outputId, value) {
            document.getElementById(outputId).value = value;
        }

        function formatAndSetInput(inputId, value) {
            document.getElementById(inputId).value = value.toLocaleString('id-ID');
        }

        let nilai_kontrak1 = getValueAndParseInput('nilai_kontrak1');
        let realisasi_bln_lalu1 = getValueAndParseInput('realisasi_bln_lalu1');
        let pot_uang_muka1 = getValueAndParseInput('pot_uang_muka1');

        // RUMUS
        let pot40 = Math.floor(nilai_kontrak1 * 0.4);
        let pot45 = Math.floor(pot_uang_muka1 * 0.45);
        let jumlah = pot40 - pot45;
        let jumlah_ppn = Math.floor(jumlah * 0.0990990990990991);
        let pph1 = Math.floor(jumlah - jumlah_ppn);
        let pph = Math.floor(pph1 * 0.02);
        let jml_pot_pajak = Math.floor(pph + jumlah_ppn);
        let sisa_dana = Math.floor(jumlah - jml_pot_pajak);

        // FORMAT ANGKA TANPA KOMA DI BELAKANG
        setOutputValue('pot40', pot40.toLocaleString('id-ID'));
        setOutputValue('pot45', pot45.toLocaleString('id-ID'));
        setOutputValue('jumlah', jumlah.toLocaleString('id-ID'));
        setOutputValue('ppn', jumlah_ppn.toLocaleString('id-ID'));
        setOutputValue('pph1', pph1.toLocaleString('id-ID'));
        setOutputValue('pph', pph.toLocaleString('id-ID'));
        setOutputValue('jml_pot_pajak', jml_pot_pajak.toLocaleString('id-ID'));
        setOutputValue('sisa_dana', sisa_dana.toLocaleString('id-ID'));

        // MENGUBAH VALUE DALAM FORMAT ANGKA
        formatAndSetInput('nilai_kontrak1', nilai_kontrak1);
        formatAndSetInput('nilai_kontrak2', nilai_kontrak1);
        formatAndSetInput('realisasi_bln_lalu1', realisasi_bln_lalu1);
        formatAndSetInput('realisasi_bln_lalu2', realisasi_bln_lalu1);
        formatAndSetInput('pot_uang_muka1', pot_uang_muka1);
        formatAndSetInput('pot45', pot45);
        formatAndSetInput('jumlah', jumlah);
        formatAndSetInput('ppn', jumlah_ppn);
        formatAndSetInput('pph1', pph1);
        formatAndSetInput('pph', pph);
        formatAndSetInput('jml_pot_pajak', jml_pot_pajak);
        formatAndSetInput('sisa_dana', sisa_dana);
    }
</script>