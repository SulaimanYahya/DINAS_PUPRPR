<?php
class Format4pdf extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
    }

    function cetak($kode)
    {
        $pdf = new exFPDF('p', 'mm', array(210, 330));
        $pdf->SetTitle('FORMAT 4');
        // membuat halaman baru
        $pdf->SetLeftMargin(20);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(18);
        $pdf->AddPage();

        $get_spm = $this->db->get_where('tb_format4', ['kode_spm' => $kode])->row_array();
        if ($get_spm['jenis_pembayaran'] = "LS") {
            $jenis_blnja = "Langsung";
        } else if ($get_spm['jenis_pembayaran'] = "UP") {
            $jenis_blnja = "Uang Persediaan";
        } else if ($get_spm['jenis_pembayaran'] = "GU") {
            $jenis_blnja = "Ganti Uang";
        } else if ($get_spm['jenis_pembayaran'] = "TU") {
            $jenis_blnja = "Tambah Uang";
        }

        $get_program = $this->db->get_where('tb_jenis_program', ['id_jenis_program' => $get_spm['id_prog']])->row_array();
        $get_kegiatan = $this->db->get_where('tb_jenis_kegiatan', ['id_jenis_kegiatan' => $get_spm['id_keg']])->row_array();
        $get_sub_kegiatan = $this->db->get_where('tb_jenis_sub_kegiatan', ['id_jenis_sub_kegiatan' => $get_spm['id_subkeg']])->row_array();

        $id_belanja = $get_spm['id_belanja'];
        $this->db->join('tb_kp_belanja', 'tb_kp_belanja.id_kp_belanja=tb_belanja.id_kp_belanja');
        $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
        $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
        $get_belanja = $this->db->get_where('tb_belanja', ['tb_belanja.id_belanja' => $id_belanja])->row_array();
        date_default_timezone_set('Asia/Makassar');
        $tanggalskrg = date('Y-m-d');

        $id_penerima = $get_spm['penerima'];
        $id_bendahara = $get_spm['bendahara'];
        $id_pengguna_anggaran = $get_spm['pengguna_angg'];
        $id_ppk = $get_spm['ppk'];
        $id_pptk = $get_spm['ppk_keuangan'];

        $pegawai_satu = $this->db->get_where('tb_pegawai', ['id' => $id_pengguna_anggaran])->row_array();
        if ($pegawai_satu['jabatan'] == 'KEPALA DINAS') {
            $jabatan_verif = "Pengguna Anggaran";
        } else {
            $jabatan_verif = "Kuasa Pengguna Anggaran";
        }

        $pegawai_dua = $id_penerima;
        $pegawai_tiga = $this->db->get_where('tb_pegawai', ['id' => $id_bendahara])->row_array();
        $pegawai_lima = $this->db->get_where('tb_pegawai', ['id' => $id_ppk])->row_array();
        $pegawai_empat = $this->db->get_where('tb_pegawai', ['id' => $id_pptk])->row_array();

        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 6, 'CHECKLIST VERIFIKASI KELENGKAPAN DOKUMEN', 0, 1, 'C');
        $pdf->Cell(0, 4, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(30, 6, 'Nomor SPM', 0, 0);
        $pdf->Cell(5, 6, ':', 0, 0, 'C');
        $pdf->Cell(0, 6, $get_spm['no_spm'], 0, 1);

        $pdf->Cell(30, 6, 'Tanggal SPM', 0, 0);
        $pdf->Cell(5, 6, ':', 0, 0, 'C');
        $pdf->Cell(0, 6, tanggalIndonesia($get_spm['tgl_spm']), 0, 1);
        $pdf->Cell(0, 4, '', 0, 1);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 6, 'Check list pemeriksaan kelengkapan dokumen Surat Perintah Membayar APBD TA. ' . date('Y', strtotime($get_spm['tgl_spm'])), 0, 1);

        $pdf->Cell(0, 4, '', 'B', 1);
        $dok = $this->db->get_where('tb_ceklis')->result();

        $no = 1;
        foreach ($dok as $rdk) {

            $pdf->Cell(5, 5.5, '', 'L', 0);
            $pdf->Cell(6, 5.5, '', 1, 0);
            $pdf->Cell(6, 5.5, $no, 0, 0, 'C');
            $pdf->Cell(0, 5.5, $rdk->nama_ceklis, 'R', 1);

            $no++;
        }
        $pdf->Cell(0, 4, '', 'T', 1);

        $pdf->Cell(70, 6, '', 0, 0);
        $pdf->Cell(0, 6, 'Bone Bolango,                       ' . date('Y', strtotime($get_spm['tgl_spm'])), 0, 1, 'C');
        $pdf->Cell(0, 2, '', 0, 1);
        $pdf->Cell(70, 6, '', 0, 0);
        $pdf->Cell(0, 6, 'PPK SKPD', 0, 1, 'C');
        $pdf->Cell(0, 15, '', 0, 1);
        $pdf->Cell(70, 6, '', 0, 0);
        $pdf->SetFont('Arial', 'BU', 10);
        $pdf->Cell(0, 4, strtoupper($pegawai_empat['nama']), 0, 1, 'C');
        $pdf->Cell(70, 4, '', 0, 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 4, 'NIP.' . strtoupper($pegawai_empat['nip']), 0, 1, 'C');

        // SPP

        $pdf->SetLeftMargin(23);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(23);
        $pdf->AddPage();
        $pdf->Image('assets/img/profile/logo_bonbol.png', 23, 25, 10, 13);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 6, 'PEMERINTAH KABUPATEN BONE BOLANGO', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, 'DINAS PEKERJAAN UMUM PENATAAN RUANG DAN PERUMAHAN RAKYAT', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, 'Alamat Jl. Makam Nani Wartabone Kec. Suwawa Kab. Bone Bolango', 0, 1, 'C');
        $pdf->SetLineWidth(1);
        $pdf->Line(23, 42, 187, 42);
        $pdf->SetLineWidth(0);
        $pdf->Line(23, 43, 187.3, 43);


        $pdf->Cell(10, 8, '', 0, 1);
        $pdf->SetFont('Arial', 'BU', 11);
        $pdf->Cell(0, 5, 'SURAT PERNYATAAN VERIFIKASI PPK-SKPD', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 5, 'Nomor :       /PUPR.PR/PPK/    /    /' . date('Y', strtotime($get_spm['tgl_spm'])), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10, 8, '', 0, 1);
        $pdf->MultiCell(0, 6, 'Sehubungan dengan Pengajuan Surat Perintah Membayar (SPM) ' . $get_spm['jenis_pembayaran'] . ' sesuai SPM Nomor : ' . $get_spm['no_spm'] . ' Tanggal ' . tanggalIndonesia($get_spm['tgl_spm']) . ' dengan nilai Rp. ' . number_format($get_spm['nilai'], 0, ',', '.') . ' (' . terbilang($get_spm['nilai']) . '), Kami selaku Pejabat Penata Usahaan Keuangan (PPK) dengan ini menyatakan bahwa :', 0);

        $pdf->Cell(5, 6, '', 0, 0);
        $pdf->Cell(6, 6, '1.', 0, 0);
        $pdf->MultiCell(0, 6, 'Telah menjadi dokumen DPA untuk memastikan bahwa belanja terkait tidak melebihi sisa anggaran', 0);

        $pdf->Cell(5, 6, '', 0, 0);
        $pdf->Cell(6, 6, '2.', 0, 0);
        $pdf->MultiCell(0, 6, 'Telah meneliti DPA untuk memastikan bahwa rekening belanja terkait sudah sesuai dengan kode rekening belanja yang tepat', 0);

        $pdf->Cell(5, 6, '', 0, 0);
        $pdf->Cell(6, 6, '3.', 0, 0);
        $pdf->MultiCell(0, 6, 'Meneliti dokumen SPD untuk memastikan dana belanja terkait telah disediakan', 0);

        $pdf->Cell(5, 6, '', 0, 0);
        $pdf->Cell(6, 6, '4.', 0, 0);
        $pdf->MultiCell(0, 6, 'Telah memverifikasi Tagihan LS beserta bukti kelengkapannya yang diajukan oleh bendahara pengeluaran/bendahara pengeluaran pembantu beserta bukti pendukung lainnya termasuk dokumen perpajakan terkait dan dinyatakan benar dan sah sesuai ketentuan perundang-undangan', 0);

        $pdf->Cell(5, 6, '', 0, 0);
        $pdf->Cell(6, 6, '5.', 0, 0);
        $pdf->MultiCell(0, 6, 'Meneliti kesesuaian perhitungan LS', 0);

        $pdf->Cell(5, 6, '', 0, 0);
        $pdf->Cell(6, 6, '6.', 0, 0);
        $pdf->MultiCell(0, 6, 'Verifikasi yang dilakukan untuk kelengkapan dan keabsahan SPJ', 0);

        $pdf->Cell(5, 6, '', 0, 0);
        $pdf->Cell(6, 6, '7.', 0, 0);
        $pdf->MultiCell(0, 6, 'Bukti-bukti pengeluaran yang telah disahkan tersebut disimpan pada OPD kami dan siap ditunjukan apabila diperlukan dalam rangka audit dari aparat pemeriksa/pengawas baik internal dan eksternal;', 0);

        $pdf->Cell(5, 6, '', 0, 0);
        $pdf->Cell(6, 6, '8.', 0, 0);
        $pdf->MultiCell(0, 6, 'Jika dikemudian hari pernyataan saya ini tidak benar, maka saya bersedia menerima sanksi sesuai peraturan yang berlaku', 0);


        $pdf->MultiCell(0, 6, 'Demikian Surat Pernyataan ini dibuat untuk melengkapi persyaratan pengajuan SPM-' . $get_spm['jenis_pembayaran'] . ' SKPD Kami.', 0);
        $pdf->Cell(10, 6, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(70, 6, '', 0, 0);
        $pdf->Cell(0, 6, 'Bone Bolango,                         ' . date('Y', strtotime($get_spm['tgl_spm'])), 0, 1, 'C');
        $pdf->Cell(0, 2, '', 0, 1);
        $pdf->Cell(70, 6, '', 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, 'PPK Keuangan SKPD', 0, 1, 'C');
        $pdf->Cell(0, 15, '', 0, 1);
        $pdf->Cell(70, 6, '', 0, 0);
        $pdf->SetFont('Arial', 'BU', 10);
        $pdf->Cell(0, 4, strtoupper($pegawai_empat['nama']), 0, 1, 'C');
        $pdf->Cell(70, 4, '', 0, 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 4, 'NIP.' . strtoupper($pegawai_empat['nip']), 0, 1, 'C');


        // TANDA TERIMA


        $pdf->SetLeftMargin(23);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(23);
        $pdf->AddPage();

        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(135, 6, '', 0, 0);
        $pdf->Cell(0, 6, 'Lembar Ke :', 0, 1);
        $pdf->Cell(0, 6, '', 0, 1);

        $pdf->SetFont('Arial', 'BU', 14);
        $pdf->Cell(0, 6, 'TANDA PENERIMAAN', 0, 1, 'C');
        $pdf->Cell(0, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(50, 6, 'Sudah terima dari', 0, 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(4, 6, ':', 0, 0);
        $pdf->MultiCell(0, 6, 'BENDAHARA PENGELUARAN DINAS PEKERJAAN UMUM KAB. BONE BOLANGO', 0);
        $pdf->Cell(0, 2, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(50, 6, 'Sejumlah Uang', 0, 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(4, 6, ':', 0, 0);
        $pdf->MultiCell(0, 6, terbilang($get_spm['nilai']), 0);
        $pdf->Cell(0, 2, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(50, 6, 'Untuk Pembayaran', 0, 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(4, 6, ':', 0, 0);
        $pdf->MultiCell(0, 6, strtoupper($get_belanja['uraian_belanja']) . ' MELALUI SUB KEGIATAN ' . strtoupper($get_sub_kegiatan['nama_jenis_sub_kegiatan']) . ' TAHUN ANGGARAN ' . $get_belanja['rs_tahun'], 0);
        $pdf->Cell(0, 15, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(25, 8, 'Terbilang', 0, 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(15, 8, 'Rp', 'LBT', 0);
        $pdf->Cell(35, 8, number_format($get_spm['nilai']), 'RBT', 1, 'R');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, 'Suwawa,        ' . tanggalIndonesiaTanpaDay($tanggalskrg), 0, 1, 'R');

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(50, 4, 'MENGETAHUI', 0, 0, 'C');
        $pdf->Cell(70, 4, 'BENDAHARA PENGELUARAN', 0, 0, 'C');
        $pdf->Cell(0, 4, 'YANG MENERIMA', 0, 1, 'C');

        $pdf->Cell(50, 4, 'PEJABAT PEMBUAT KOMITMEN', 0, 0, 'C');
        $pdf->Cell(70, 4, '', 0, 0, 'C');
        $pdf->Cell(0, 4, '', 0, 1, 'C');
        $pdf->Cell(0, 30, '', 0, 1);

        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(50, 4, strtoupper($pegawai_lima['nama']), 0, 0, 'C');
        $pdf->Cell(70, 4, strtoupper($pegawai_tiga['nama']), 0, 0, 'C');
        $pdf->Cell(0, 4, strtoupper($pegawai_dua), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(50, 4, 'NIP.' . strtoupper($pegawai_lima['nip']), 0, 0, 'C');
        $pdf->Cell(70, 4, 'NIP.' . strtoupper($pegawai_tiga['nip']), 0, 0, 'C');
        $pdf->Cell(0, 4, '', 0, 1, 'C');

        $pdf->Cell(0, 20, '', 0, 1);
        $pdf->SetFont('Arial', 'BI', 12);
        $pdf->Cell(100, 6, 'KODE REKENING', 1, 0, 'C');
        $pdf->Cell(0, 6, 'DIBUKUKAN', 1, 1, 'C');
        $pdf->Cell(100, 6, '', 'LR', 0, 'C');
        $pdf->Cell(0, 6, '', 'R', 1);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(100, 6, $get_belanja['no_rek'], 'LR', 0, 'C');
        $pdf->SetFont('Arial', 'I', 9);
        $pdf->Cell(0, 6, 'TANGGAL', 'R', 1);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(100, 6, strtoupper($get_belanja['nama_rek']), 'LR', 0, 'C');
        $pdf->SetFont('Arial', 'I', 9);
        $pdf->Cell(0, 6, 'NOMOR BKU', 'R', 1);
        $pdf->Cell(100, 6, '', 'LBR', 0, 'C');
        $pdf->Cell(0, 6, '', 'RB', 1);

        // KWITANSI


        $pdf->SetLeftMargin(23);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(23);
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(0, 6, 'PEMERINTAH KABUPATEN BONE BOLANGO', 0, 1);
        $pdf->Cell(0, 6, 'DINAS PEKERJAAN UMUM PENATAAN RUANG DAN PERUMAHAN RAKYAT', 0, 1);
        $pdf->Cell(0, 6, '', 0, 1);

        $pdf->SetFont('Times', 'BU', 14);
        $pdf->Cell(0, 6, 'K W I T A N S I', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(50, 4, '', 0, 0);
        $pdf->Cell(30, 4, 'Nomor', 0, 0);
        $pdf->Cell(4, 4, ':', 0, 1);
        $pdf->Cell(50, 4, '', 0, 0);
        $pdf->Cell(30, 4, 'Jenis Pembayaran', 0, 0);
        $pdf->Cell(4, 4, ': LS/GU', 0, 1);

        $pdf->Cell(0, 6, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(50, 6, 'Sudah terima dari', 0, 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(4, 6, ':', 0, 0);
        $pdf->MultiCell(0, 6, 'BENDAHARA PENGELUARAN DINAS PUPR KAB. BONE BOLANGO', 0);
        $pdf->Cell(0, 2, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(50, 6, 'Terbilang', 0, 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(4, 6, ':', 0, 0);
        $pdf->MultiCell(0, 6, terbilang($get_spm['nilai']), 0);
        $pdf->Cell(0, 2, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(50, 6, 'Yakni', 0, 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(4, 6, ':', 0, 0);
        $pdf->MultiCell(0, 6, strtoupper($get_belanja['uraian_belanja']) . ' PADA SUB KEGIATAN ' . strtoupper($get_sub_kegiatan['nama_jenis_sub_kegiatan']), 0);
        $pdf->Cell(0, 6, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(25, 8, 'Sejumlah', 0, 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(15, 8, 'Rp', 'LBT', 0);
        $pdf->Cell(35, 8, number_format($get_spm['nilai']), 'RBT', 1, 'R');
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 8, 'Suwawa,        ' . tanggalIndonesiaTanpaDay($tanggalskrg), 0, 1, 'R');
        $pdf->Cell(0, 4, '', 0, 1);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(50, 4, 'BENDAHARA PENGELUARAN', 0, 0, 'C');
        $pdf->Cell(70, 4, '', 0, 0, 'C');
        $pdf->Cell(0, 4, 'YANG MENERIMA', 0, 1, 'C');


        $pdf->Cell(0, 20, '', 0, 1);

        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(50, 4, strtoupper($pegawai_tiga['nama']), 0, 0, 'C');
        $pdf->Cell(70, 4, '', 0, 0, 'C');
        $pdf->Cell(0, 4, strtoupper($pegawai_dua), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(50, 4, 'NIP.' . strtoupper($pegawai_tiga['nip']), 0, 0, 'C');
        $pdf->Cell(70, 4, '', 0, 0, 'C');
        $pdf->Cell(0, 4, '', 0, 1, 'C');
        $pdf->Cell(0, 6, '', 0, 1);

        // $pdf->Cell(0, 4, 'MENYETUJUI', 0, 1, 'C');
        // $pdf->Cell(0, 4, strtoupper($jabatan_verif), 0, 1, 'C');
        // $pdf->Cell(0, 20, '', 0, 1);
        // $pdf->SetFont('Arial', 'U', 9);
        // $pdf->Cell(0, 4, strtoupper($pegawai_satu['nama']), 0, 1, 'C');
        // $pdf->SetFont('Arial', '', 9);
        // $pdf->Cell(0, 4, 'NIP.' . strtoupper($pegawai_satu['nip']), 0, 1, 'C');
        // $pdf->Cell(0, 10, '', 0, 1);

        $pdf->Cell(0, 4, 'PEJABAT PEMBUAT KOMITMEN', 0, 1, 'C');
        $pdf->Cell(0, 20, '', 0, 1);
        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(0, 4, strtoupper($pegawai_lima['nama']), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 4, 'NIP.' . strtoupper($pegawai_lima['nip']), 0, 1, 'C');
        $pdf->Cell(0, 10, '', 0, 1);

        $pdf->SetFont('helvetica', '', 8);
        $pdf->AddFont('FontUTF8', '', 'Arimo-Regular.php');
        $pdf->AddFont('FontUTF8', 'B', 'Arimo-Bold.php');
        $pdf->AddFont('FontUTF8', 'I', 'Arimo-Italic.php');
        $pdf->AddFont('FontUTF8', 'BI', 'Arimo-BoldItalic.php');

        $table = new easyTable($pdf, '{30, 50, 20, 20, 20, 20, 20}', 'width:220; border-color:#000000; font-size:8; border:1; paddingY:2;');

        $table->rowStyle('align:{CCCCCC}; font-style:B');
        $table->easyCell("KODE REKENING", 'colspan:1; align:C');
        $table->easyCell("PPTK", 'colspan:1; align:C');
        $table->easyCell("VERIFIKATOR", 'colspan:3; align:C');
        $table->easyCell("BUKU KAS UMUM", 'colspan:2; align:C');
        $table->printRow();

        $table->rowStyle('align:{CC}; font-style:B');
        $table->easyCell($get_belanja['no_rek'], 'align:C');
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("", 'font-size:7');
        $table->easyCell("");
        $table->easyCell("NOMOR");
        $table->easyCell("TANGGAL");
        $table->printRow(true);

        $table->rowStyle('align:{CC}; border:LTR;');
        $table->easyCell($get_belanja['nama_rek'], 'align:C');
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->printRow(true);

        $table->rowStyle('border:LR');
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->printRow(true);

        $table->rowStyle('border:LR; paddingY:1;');
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->printRow(true);

        $table->rowStyle('border:LBR; paddingY:1;');
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell(" ");
        $table->printRow(true);



        $table->endTable(10);



        // KWITANSI


        $pdf->SetLeftMargin(23);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(23);
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(0, 6, 'KABUPATEN BONE BOLANGO', 0, 1);
        $pdf->Cell(0, 6, '', 0, 1);

        $pdf->SetFont('Times', 'BU', 14);
        $pdf->Cell(0, 6, 'K W I T A N S I', 0, 1, 'C');

        $pdf->Cell(0, 6, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(50, 6, 'Sudah terima dari', 0, 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(4, 6, ':', 0, 0);
        $pdf->MultiCell(0, 6, 'BENDAHARA UMUM DAERAH KAB. BONE BOLANGO', 0);
        $pdf->Cell(0, 2, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(50, 6, 'Sejumlah Uang', 0, 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(4, 6, ':', 0, 0);
        $pdf->MultiCell(0, 6, terbilang($get_spm['nilai']), 0);
        $pdf->Cell(0, 2, '', 0, 1);

        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(50, 6, 'Yakni', 0, 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(4, 6, ':', 0, 0);
        $pdf->MultiCell(0, 6, strtoupper($get_belanja['uraian_belanja']) . ' PADA SUB KEGIATAN ' . strtoupper($get_sub_kegiatan['nama_jenis_sub_kegiatan']), 0);
        $pdf->Cell(0, 6, '', 0, 1);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 8, 'Suwawa,        ' . tanggalIndonesiaTanpaDay($tanggalskrg), 0, 1, 'R');

        $pdf->Cell(50, 4, '', 0, 0, 'C');
        $pdf->Cell(70, 4, '', 0, 0, 'C');
        $pdf->Cell(0, 4, 'Yang Menerima', 0, 1, 'C');

        $pdf->Cell(50, 4, '', 0, 0, 'C');
        $pdf->Cell(70, 4, '', 0, 0, 'C');
        $pdf->Cell(0, 4, 'BENDAHARA PENGELUARAN', 0, 1, 'C');
        $pdf->Cell(0, 20, '', 0, 1, 'C');

        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetFont('Arial', 'I', 11);
        $pdf->Cell(25, 8, 'Terbilang', 'B', 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(15, 8, 'Rp', 'B', 0);
        $pdf->Cell(35, 8, number_format($get_spm['nilai']), 'B', 0, 'R');
        $pdf->Cell(45, 4, '', 0, 0, 'C');
        $pdf->SetFont('Arial', 'U', 9);
        $pdf->Cell(0, 4, strtoupper($pegawai_tiga['nama']), 0, 1, 'C');

        $pdf->Cell(50, 4, '', 0, 0, 'C');
        $pdf->Cell(70, 4, '', 0, 0, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 4, 'NIP.' . strtoupper($pegawai_tiga['nip']), 0, 1, 'C');



        $pdf->Cell(0, 4, '', 0, 1);


        $pdf->SetFont('helvetica', '', 8);
        $pdf->AddFont('FontUTF8', '', 'Arimo-Regular.php');
        $pdf->AddFont('FontUTF8', 'B', 'Arimo-Bold.php');
        $pdf->AddFont('FontUTF8', 'I', 'Arimo-Italic.php');
        $pdf->AddFont('FontUTF8', 'BI', 'Arimo-BoldItalic.php');

        $table = new easyTable($pdf, '{50, 30, 40, 40}', 'width:220; border-color:#000000; font-size:8; border:1; paddingY:2;');

        $table->rowStyle('align:{CCCCCC}; font-style:B');
        $table->easyCell("Tanda Tangan Setuju Membayar", 'colspan:1; align:C');
        $table->easyCell("Pembebanan", 'colspan:1; align:C');
        $table->easyCell("S.P.D", 'colspan:1; align:C');
        $table->easyCell("Di SPM Kan", 'colspan:1; align:C');
        $table->printRow();

        $table->rowStyle('align:{CC}; border:LTR;');
        $table->easyCell(strtoupper($jabatan_verif), 'align:C');
        $table->easyCell($get_belanja['no_rek'], 'align:C');
        $table->easyCell("Tggl");
        $table->easyCell("Tggl");
        $table->printRow(true);

        $table->rowStyle('border:LR');
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->printRow(true);

        $table->rowStyle('border:LR');
        $table->easyCell("");
        $table->easyCell($get_belanja['nama_rek'], 'align:C');
        $table->easyCell("No.");
        $table->easyCell("No.");
        $table->printRow(true);

        $table->rowStyle('border:LR; paddingY:1;');
        $table->easyCell(strtoupper($pegawai_satu['nama']), 'align:C; font-size:7; font-style:U');
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->printRow(true);

        $table->rowStyle('border:LR; paddingY:1;');
        $table->easyCell('NIP.' . strtoupper($pegawai_satu['nip']), 'align:C');
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->printRow(true);

        $table->rowStyle('border:LBR');
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell("");
        $table->easyCell(" ");
        $table->printRow(true);



        $table->endTable(10);


        // SPTJM


        $pdf->SetLeftMargin(20);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(18);
        $pdf->AddPage();
        $pdf->Image('assets/img/profile/logo_bonbol.png', 23, 20, 10, 13);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 6, 'PEMERINTAH KABUPATEN BONE BOLANGO', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, 'DINAS PEKERJAAN UMUM PENATAAN RUANG DAN PERUMAHAN RAKYAT', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, 'Alamat Jl. Makam Nani Wartabone Kec. Suwawa Kab. Bone Bolango', 0, 1, 'C');
        $pdf->SetLineWidth(1);
        $pdf->Line(23, 37, 187, 37);
        $pdf->SetLineWidth(0);
        $pdf->Line(23, 38, 187.3, 38);

        $pdf->Cell(10, 6, '', 0, 1);
        $pdf->SetFont('Arial', '', 11);
        $pdf->Cell(0, 6, 'SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK (SPTJM)', 0, 1, 'C');
        $pdf->Cell(0, 6, 'DINAS PEKERJAAN UMUM PENATAAN RUANG KAB. BONE BOLANGO', 0, 1, 'C');
        $pdf->Cell(10, 3, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 6, 'Yang bertanda tangan dibawah ini :', 0, 1);
        $pdf->Cell(10, 3, '', 0, 1);

        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(5, 5, '1.', 0, 0);
        $pdf->Cell(30, 5, 'Nama', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_satu['nama'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'NIP', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_satu['nip'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'Jabatan', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, strtoupper($jabatan_verif), 0, 1);
        $pdf->Cell(10, 3, '', 0, 1);

        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(5, 5, '2.', 0, 0);
        $pdf->Cell(30, 5, 'Nama', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_lima['nama'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'NIP', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_lima['nip'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'Jabatan', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, 'PEJABAT PEMBUAT KOMITMEN', 0, 1);
        $pdf->Cell(10, 3, '', 0, 1);

        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(5, 5, '3.', 0, 0);
        $pdf->Cell(30, 5, 'Nama', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_empat['nama'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'NIP', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_empat['nip'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'Jabatan', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, 'PEJABAT PENATAUSAHAAN KEUANGAN', 0, 1);
        $pdf->Cell(10, 3, '', 0, 1);

        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(5, 5, '4.', 0, 0);
        $pdf->Cell(30, 5, 'Nama', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_tiga['nama'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'NIP', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_tiga['nip'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'Jabatan', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, 'BENDAHARA PENGELUARAN', 0, 1);

        $pdf->Cell(10, 4, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 5, 'Berdasarkan Peraturan Menteri Dalam Negeri Nomor 77 Tahun 2020 tentang Pedoman Pengelolaan Keuangan Daerah., Maka dengan ini kami menyatakan :', 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 3, '', 0, 1);
        $pdf->Cell(5, 5, '1', 0, 0);
        $pdf->MultiCell(00, 5, 'Bahwa kami bertanggungjawab penuh atas kelengkapan administrasi dan bukti - bukti yang dipersyaratkan dalam peraturan perundang-undangan yang berlaku.', 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 3, '', 0, 1);
        $pdf->Cell(5, 5, '2', 0, 0);
        $pdf->MultiCell(00, 5, 'Bahwa kami bertanggungjawab penuh atas kebenaran perhitungan, pencairan dan Penggunaan dana pembayaran tagihan belanja ' . $jenis_blnja . ' sesuai Surat Perintah Membayar (SPM) Nomor: ' . $get_spm['no_spm'] . ' Tanggal ' . tanggalIndonesia($get_spm['tgl_spm']) . ' dengan nilai Rp. ' . number_format($get_spm['nilai'], 0, ',', '.') . ' (' . terbilang($get_spm['nilai']) . ') Melalui Sub Kegiatan ' . $get_sub_kegiatan['nama_jenis_sub_kegiatan'] . ' Tahun Anggaran ' . $get_belanja['rs_tahun'], 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 4, '', 0, 1);
        $pdf->Cell(5, 5, '3', 0, 0);
        $pdf->MultiCell(0, 5, 'Bukti-bukti realisasi pembayaran disimpan sesuai ketentuan yang berlaku untuk kelengkapan administrasi dan keperluan pemeriksaan dan pengawas fungsional dan auditor eksternal.', 0);
        $pdf->Cell(2, 3, '', 0, 1);
        $pdf->Cell(5, 5, '', 0, 0);
        $pdf->Cell(50, 5, 'Demikian Pernyataan ini kami buat dengan sesungguhnya.', 0, 1);
        $pdf->Cell(50, 5, 'Bone Bolango,     ' . tanggalIndonesiaTanpaDay($tanggalskrg), 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10, 3, '', 0, 1);

        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(5, 5, '1.', 0, 0);
        $pdf->Cell(30, 5, 'Nama', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_satu['nama'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'NIP', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_satu['nip'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'Tanda Tangan', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, '', 0, 1);
        $pdf->Cell(10, 6, '', 0, 1);

        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(5, 5, '2.', 0, 0);
        $pdf->Cell(30, 5, 'Nama', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_lima['nama'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'NIP', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_lima['nip'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'Tanda Tangan', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, '', 0, 1);
        $pdf->Cell(10, 6, '', 0, 1);

        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(5, 5, '3.', 0, 0);
        $pdf->Cell(30, 5, 'Nama', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_empat['nama'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'NIP', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_empat['nip'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'Tanda Tangan', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, '', 0, 1);
        $pdf->Cell(10, 6, '', 0, 1);

        $pdf->Cell(20, 5, '', 0, 0);
        $pdf->Cell(5, 5, '4.', 0, 0);
        $pdf->Cell(30, 5, 'Nama', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_tiga['nama'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'NIP', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, $pegawai_tiga['nip'], 0, 1);
        $pdf->Cell(25, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'Tanda Tangan', 0, 0);
        $pdf->Cell(5, 5, ':', 0, 0);
        $pdf->Cell(50, 5, '', 0, 1);


        // Verifikasi


        $pdf->SetLeftMargin(20);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(18);
        $pdf->AddPage();

        // $pdf->Image('assets/img/profile/atas.png', 23, 20, 160, 27);

        $pdf->SetFont('Arial', '', 10);

        // $pdf->Cell(0, 35, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 5, 'LEMBAR VERIFIKASI PENERBITAN (SPA2D)', 0, 1, 'C');
        // $pdf->Cell(0, 5, 'SURAT PERINTAH UNTUK MEMBAYAR (SPUM)', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->Cell(5, 7, '1.', 0, 0);
        $pdf->Cell(39, 7, 'SPM Nomor', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);
        $pdf->Cell(0, 7, $get_spm['no_spm'], 0, 1);
        $pdf->Cell(5, 7, '', 0, 0);
        $pdf->Cell(39, 7, 'Jenis SPM', 0, 0);
        $pdf->Cell(4, 7, ':', 0, 0, 'C');
        $pdf->DrawSquare(4);
        $pdf->Cell(4, 7, '', 0, 0);
        $pdf->Cell(30, 7, 'Uang Persediaan', 0, 0);
        $pdf->Cell(4, 7, ':', 0, 0, 'C');
        $pdf->DrawSquare(4);
        $pdf->Cell(4, 7, '', 0, 0);
        $pdf->Cell(20, 7, 'Tambahan Uang', 0, 1);
        $pdf->Cell(5, 7, '', 0, 0);
        $pdf->Cell(39, 7, '', 0, 0);
        $pdf->Cell(4, 7, ':', 0, 0, 'C');
        $pdf->DrawSquare(4);
        $pdf->Cell(4, 7, '', 0, 0);
        $pdf->Cell(30, 7, 'Ganti Uang', 0, 0);
        $pdf->Cell(4, 7, ':', 0, 0, 'C');
        $pdf->DrawSquare(4);
        $pdf->Cell(4, 7, '', 0, 0);
        $pdf->Cell(20, 7, 'Langsung', 0, 1);

        $pdf->Cell(5, 7, '2.', 0, 0);
        $pdf->Cell(39, 7, 'Unit Kerja /Sektor', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(0, 7, 'DINAS PEKERJAAN UMUM PENATAAN RUANG DAN PERUMAHAN RAKYAT KABUPATEN BONE BOLANGO', 0, 1);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(5, 7, '3.', 0, 0);
        $pdf->Cell(39, 7, 'Program', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);
        $pdf->SetFont('Arial', '', 8);
        $pdf->MultiCell(0, 7, $get_program['nama_jenis_program'], 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(5, 7, '4.', 0, 0);
        $pdf->Cell(39, 7, 'Kegiatan', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);
        $pdf->MultiCell(0, 7, $get_kegiatan['nama_jenis_kegiatan'], 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(5, 7, '', 0, 0);
        $pdf->Cell(39, 7, 'Sub Kegiatan', 0, 0);
        $pdf->Cell(2, 7, '', 0, 0);
        $pdf->MultiCell(0, 7, $get_sub_kegiatan['nama_jenis_sub_kegiatan'], 0);

        $pdf->Cell(5, 7, '5.', 0, 0);
        $pdf->Cell(39, 7, 'Uraian Pembayaran', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);
        $pdf->MultiCell(0, 7, $get_belanja['uraian_belanja'], 0);

        $pdf->Cell(5, 7, '6.', 0, 0);
        $pdf->Cell(39, 7, 'No. Rekening Anggaran', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);
        $pdf->Cell(55, 7, $get_belanja['no_rek'], 'B', 0);
        $pdf->Cell(4, 7, '', 0, 0);
        $pdf->DrawPersegiPanjang(62, 50);
        $pdf->SetFont('Arial', 'I', 9);
        $pdf->SetFillColor(200, 220, 255);
        $pdf->Cell(0, 7, 'JUMLAH POTONGAN', 1, 1, 'C', true);

        $pdf->Cell(5, 4, '', 0, 1);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(5, 7, '7.', 0, 0);
        $pdf->Cell(39, 7, 'Jumlah Anggaran', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);
        $pdf->Cell(55, 7, 'Rp. ' . number_format($get_spm['jml_angg'], 0, ',', '.'), 'B', 0);
        $pdf->Cell(7, 7, '', 0, 0);
        $pdf->DrawSquare(4);
        $pdf->SetFont('Arial', 'I', 7);
        $pdf->Cell(4, 7, '', 0, 0);
        $pdf->Cell(15, 7, 'PPn', 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 7, 'Rp.', 0, 0);
        $pdf->Cell(0, 7, number_format($get_spm['ppn'], 0, ',', '.'), 'B', 1);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(5, 7, '8.', 0, 0);
        $pdf->Cell(39, 7, 'Realisasi s/d SPP Lalu', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);
        $pdf->Cell(55, 7, 'Rp. ' . number_format($get_spm['realisasi'], 0, ',', '.'), 'B', 0);
        $pdf->Cell(7, 7, '', 0, 0);
        $pdf->DrawSquare(4);
        $pdf->SetFont('Arial', 'I', 7);
        $pdf->Cell(4, 7, '', 0, 0);
        $pdf->Cell(15, 7, 'PPh Psl 21', 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 7, 'Rp.', 0, 0);
        $pdf->Cell(0, 7, number_format($get_spm['pph21'], 0, ',', '.'), 'B', 1);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(5, 7, '9.', 0, 0);
        $pdf->Cell(39, 7, 'Sisa Anggaran (7-8)', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);

        $pdf->Cell(55, 7, 'Rp. ' . number_format($get_spm['sisa_angg1'], 0, ',', '.'), 'B', 0);
        $pdf->Cell(7, 7, '', 0, 0);
        $pdf->DrawSquare(4);
        $pdf->SetFont('Arial', 'I', 7);
        $pdf->Cell(4, 7, '', 0, 0);
        $pdf->Cell(15, 7, 'PPh Psl 22', 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 7, 'Rp.', 0, 0);
        $pdf->Cell(0, 7, number_format($get_spm['pph22'], 0, ',', '.'), 'B', 1);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(5, 7, '10.', 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(39, 7, 'Jmh Yg diminta pd saat SPP ini', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(55, 7, 'Rp. ' . number_format($get_spm['jml_diminta'], 0, ',', '.'), 'B', 0);
        $pdf->Cell(7, 7, '', 0, 0);
        $pdf->DrawSquare(4);
        $pdf->SetFont('Arial', 'I', 7);
        $pdf->Cell(4, 7, '', 0, 0);
        $pdf->Cell(15, 7, 'PPh Psl 23', 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 7, 'Rp.', 0, 0);
        $pdf->Cell(0, 7, number_format($get_spm['pph23'], 0, ',', '.'), 'B', 1);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(5, 7, '11.', 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(39, 7, 'Sisa Anggaran S/D SSP ini (9-10)', 0, 0);
        $pdf->Cell(2, 7, ':', 0, 0);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(55, 7, 'Rp. ' . number_format($get_spm['sisa_angg2'], 0, ',', '.'), 'B', 0);
        $pdf->Cell(7, 7, '', 0, 0);
        $pdf->DrawSquare(4);
        $pdf->SetFont('Arial', 'I', 7);
        $pdf->Cell(4, 7, '', 0, 0);
        $pdf->Cell(15, 7, 'PPh Psl 25', 0, 0);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(8, 7, 'Rp.', 0, 0);
        $pdf->Cell(0, 7, number_format($get_spm['pph25'], 0, ',', '.'), 'B', 1);


        $titik_panjang = "............................................................................................................";

        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(5, 10, '', 0, 1);
        $pdf->Cell(8, 7, 'NO', 1, 0, 'C');
        $pdf->Cell(120, 7, 'DIVERIFIKASI OLEH', 1, 0, 'C');
        $pdf->Cell(39, 7, 'PARAF', 1, 1, 'C');


        $pdf->Cell(8, 5, '1.', 'LTR', 0, 'C');
        $pdf->Cell(120, 5, strtoupper($jabatan_verif)  . ' / ' . $pegawai_satu['nama'], 'LTR', 0);
        $pdf->Cell(39, 5, '', 'LTR', 1, 'C');

        $pdf->Cell(8, 5, '', 'LR', 0, 'C');
        $pdf->Cell(20, 5, 'Catatan :', 'L', 0);
        $pdf->Cell(100, 5, $titik_panjang, 'R', 0);
        $pdf->Cell(39, 5, '', 'LR', 1, 'C');

        $pdf->Cell(8, 5, '', 'LR', 0, 'C');
        $pdf->Cell(20, 5, '', 'L', 0);
        $pdf->Cell(100, 5, $titik_panjang, 'R', 0);
        $pdf->Cell(39, 5, '', 'LR', 1, 'C');

        $pdf->Cell(8, 5, '', 'LR', 0, 'C');
        $pdf->Cell(20, 5, '', 'L', 0);
        $pdf->Cell(100, 5, $titik_panjang, 'R', 0);
        $pdf->Cell(39, 5, '', 'LR', 1, 'C');

        $pdf->Cell(8, 2, '', 'LBR', 0, 'C');
        $pdf->Cell(20, 2, '', 'LB', 0);
        $pdf->Cell(100, 2, '', 'RB', 0);
        $pdf->Cell(39, 2, '', 'LBR', 1, 'C');


        $pdf->Cell(8, 5, '2.', 'LTR', 0, 'C');
        $pdf->Cell(120, 5, 'PEJABAT PEMBUAT KOMITMEN / ' . $pegawai_lima['nama'], 'LTR', 0);
        $pdf->Cell(39, 5, '', 'LTR', 1, 'C');

        $pdf->Cell(8, 5, '', 'LR', 0, 'C');
        $pdf->Cell(20, 5, 'Catatan :', 'L', 0);
        $pdf->Cell(100, 5, $titik_panjang, 'R', 0);
        $pdf->Cell(39, 5, '', 'LR', 1, 'C');

        $pdf->Cell(8, 5, '', 'LR', 0, 'C');
        $pdf->Cell(20, 5, '', 'L', 0);
        $pdf->Cell(100, 5, $titik_panjang, 'R', 0);
        $pdf->Cell(39, 5, '', 'LR', 1, 'C');

        $pdf->Cell(8, 5, '', 'LR', 0, 'C');
        $pdf->Cell(20, 5, '', 'L', 0);
        $pdf->Cell(100, 5, $titik_panjang, 'R', 0);
        $pdf->Cell(39, 5, '', 'LR', 1, 'C');

        $pdf->Cell(8, 2, '', 'LBR', 0, 'C');
        $pdf->Cell(20, 2, '', 'LB', 0);
        $pdf->Cell(100, 2, '', 'RB', 0);
        $pdf->Cell(39, 2, '', 'LBR', 1, 'C');


        $pdf->Cell(8, 5, '3.', 'LTR', 0, 'C');
        $pdf->Cell(120, 5, 'PEJABAT PENATAUSAHAAN KEUANGAN / ' . $pegawai_empat['nama'], 'LTR', 0);
        $pdf->Cell(39, 5, '', 'LTR', 1, 'C');

        $pdf->Cell(8, 5, '', 'LR', 0, 'C');
        $pdf->Cell(20, 5, 'Catatan :', 'L', 0);
        $pdf->Cell(100, 5, $titik_panjang, 'R', 0);
        $pdf->Cell(39, 5, '', 'LR', 1, 'C');

        $pdf->Cell(8, 5, '', 'LR', 0, 'C');
        $pdf->Cell(20, 5, '', 'L', 0);
        $pdf->Cell(100, 5, $titik_panjang, 'R', 0);
        $pdf->Cell(39, 5, '', 'LR', 1, 'C');

        $pdf->Cell(8, 5, '', 'LR', 0, 'C');
        $pdf->Cell(20, 5, '', 'L', 0);
        $pdf->Cell(100, 5, $titik_panjang, 'R', 0);
        $pdf->Cell(39, 5, '', 'LR', 1, 'C');

        $pdf->Cell(8, 4, '', 'LBR', 0, 'C');
        $pdf->Cell(20, 4, '', 'LB', 0);
        $pdf->Cell(100, 4, '', 'RB', 0);
        $pdf->Cell(39, 4, '', 'LBR', 1, 'C');

        $pdf->SetFont('Arial', 'UI', 8);
        $pdf->Cell(0, 7, '', 0, 1);

        $pdf->Cell(0, 7, 'Catatan:', 0, 1);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(0, 4, '1. Total Potongan Mengurangi Jumlah Yang DIminta pada SPP ini', 0, 1);


        // SPP

        $pdf->SetLeftMargin(23);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(23);
        $pdf->AddPage();
        $pdf->Image('assets/img/profile/logo_bonbol.png', 23, 25, 10, 13);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 6, 'PEMERINTAH KABUPATEN BONE BOLANGO', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, 'DINAS PEKERJAAN UMUM PENATAAN RUANG DAN PERUMAHAN RAKYAT', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 6, 'Alamat Jl. Makam Nani Wartabone Kec. Suwawa Kab. Bone Bolango', 0, 1, 'C');
        $pdf->SetLineWidth(1);
        $pdf->Line(23, 42, 187, 42);
        $pdf->SetLineWidth(0);
        $pdf->Line(23, 43, 187.3, 43);


        $pdf->Cell(10, 8, '', 0, 1);
        $pdf->SetFont('Arial', 'BU', 12);
        $pdf->Cell(0, 6, 'SURAT PERNYATAAN PENGAJUAN SPP-' . $get_spm['jenis_pembayaran'], 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10, 8, '', 0, 1);
        $pdf->MultiCell(0, 6, '      Sehubungan dengan Surat Permintaan Pembayaran ' . $jenis_blnja . ' (SPP-' . $get_spm['jenis_pembayaran'] . ') Nomor : ' . $get_spm['no_spm'] . ' Tanggal ' . tanggalIndonesia($get_spm['tgl_spm']) . ' yang kami ajukan sebesar Rp. ' . number_format($get_spm['nilai'], 0, ',', '.') . ' (' . terbilang($get_spm['nilai']) . ') untuk Keperluan SKPD Dinas Pekerjaan Umum, Penataan Ruang Dan Perumahan Rakyat Kabupaten Bone Bolango Tahun Anggaran ' . $get_belanja['rs_tahun'] . '. Dengan perincian sebagai berikut:', 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(15, 4, '', 0, 1);
        $pdf->Cell(15, 6, '', 0, 0);
        $pdf->Cell(5, 6, '1.', 0, 0);
        $pdf->MultiCell(0, 6, $get_belanja['nama_rek'] . ' No Rek : ' . $get_belanja['no_rek'] . ' Melalui Sub Kegiatan ' . $get_sub_kegiatan['nama_jenis_sub_kegiatan'] . ' TA ' . $get_belanja['rs_tahun'], 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(15, 6, '', 0, 0);
        $pdf->Cell(5, 6, '2.', 0, 0);
        $pdf->MultiCell(0, 6, 'Jumlah Belanja ' . $jenis_blnja . ' (' . $get_spm['jenis_pembayaran'] . ') tersebut di atas akan dipergunakan untuk keperluan membiayai kegiatan yang akan kami laksanakan sesuai DPA-SKPD', 0);
        $pdf->Cell(15, 6, '', 0, 0);
        $pdf->Cell(5, 6, '3.', 0, 0);
        $pdf->MultiCell(0, 6, 'Jumlah Belanja ' . $jenis_blnja . ' (' . $get_spm['jenis_pembayaran'] . ') tersebut tidak akan dipergunakan untuk membiayai pengeluaran-pengeluaran menurut ketentuan yang berlaku harus dilakukan dengan pembayaran langsung.', 0);
        $pdf->Cell(15, 6, '', 0, 1);
        $pdf->MultiCell(0, 6, '      Demikian Surat Pernyataan ini dibuat untuk melengkapi persyaratan pengajuan SPP-LS SKPD Kami.', 0);
        $pdf->Cell(10, 8, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(90, 8, '', 0, 0);
        date_default_timezone_set('Asia/Makassar');
        $tanggalskrg = date('Y-m-d');
        $pdf->Cell(0, 5, 'Suwawa, ' . tanggalIndonesia($tanggalskrg), 0, 1, 'C');
        $pdf->Cell(90, 8, '', 0, 0);
        $pdf->Cell(0, 6, 'Mengetahui Penggunaan Anggaran', 0, 1, 'C');
        $pdf->Cell(90, 8, '', 0, 0);
        $pdf->Cell(0, 6, 'KEPALA DINAS', 0, 1, 'C');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'BU', 10);
        $pdf->Cell(35, 6, '', 0, 1);
        $pdf->Cell(90, 8, '', 0, 0);

        $get_kadis = $this->db->get_where('tb_pegawai', ['jabatan' => 'KEPALA DINAS'])->row_array();

        $pdf->Cell(0, 6, $get_kadis['nama'], 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(90, 5, '', 0, 0);
        $pdf->Cell(0, 5, 'NIP. ' . $get_kadis['nip'], 0, 1, 'C');


        $pdf->Output('I', 'Format4-' . time() . '.pdf');
    }
}
