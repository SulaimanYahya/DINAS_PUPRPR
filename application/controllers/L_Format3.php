<?php
class L_Format3 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
    }

    function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $tujuan = $_POST["tujuan"];
            $id_belanja = $_POST["id_belanjax"];

            $this->session->set_userdata('tujuan', $tujuan);
            $this->session->set_userdata('id_belanjax', $id_belanja);

            $get_lampiran = $this->db->get_where('tb_lampiran_format3')->row_array();
            $tanggal = $get_lampiran['tanggal'];

            $this->db->join('tb_kp_belanja', 'tb_kp_belanja.id_kp_belanja=tb_belanja.id_kp_belanja');
            $this->db->join('tb_renja_sub', 'tb_renja_sub.id_renja_sub=tb_kp_belanja.id_renja_sub');
            $this->db->join('tb_sub_kegiatan', 'tb_sub_kegiatan.id_sub_kegiatan=tb_renja_sub.id_sub_kegiatan');
            $this->db->join('tb_jenis_sub_kegiatan', 'tb_jenis_sub_kegiatan.id_jenis_sub_kegiatan=tb_sub_kegiatan.id_jenis_sub_kegiatan');
            $this->db->join('tb_rek', 'tb_rek.id_rek=tb_kp_belanja.id_rek');
            $get_sub = $this->db->get_where('tb_belanja', ['tb_belanja.id_belanja' => $id_belanja])->row_array();

            $pdf = new exFPDF('p', 'mm', array(210, 330));
            $pdf->SetTitle('PERJALANAN DINAS');
            // membuat halaman baru

            $pdf->SetLeftMargin(23);
            $pdf->SetRightMargin(23);
            $pdf->SetTopMargin(23);
            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(0, 4, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', 0, 1, 'C');
            $pdf->Cell(99, 4, '', 0, 0);
            $pdf->Cell(0, 4, 'LAMPIRAN VII', 0, 1);
            $pdf->Cell(88, 4, '', 0, 0);
            $pdf->Cell(0, 4, 'PERATURAN MENTERI KEUANGAN        NO.', 0, 1);
            $pdf->Cell(88, 4, '', 0, 0);
            $pdf->Cell(0, 4, '45/PMK.05/2007 TTG PERJALANAN DINAS JABATAN', 0, 1);
            $pdf->Cell(88, 4, '', 0, 0);
            $pdf->Cell(0, 4, 'DALAM NEGERI BAGI PEJABAT NEGARA,PEGAWAI', 0, 1);
            $pdf->Cell(88, 4, '', 0, 0);
            $pdf->Cell(0, 4, 'NEGERI DAN PEGAWAI TIDAK TETAP', 0, 1);

            $pdf->Cell(0, 4, '', 0, 1);

            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(0, 6, 'PERINCIAN PERJALANAN DINAS', 0, 1, 'C');

            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(0, 4, '', 0, 1, 'C');

            $this->db->join('tb_pegawai', 'tb_pegawai.id=tb_lampiran_format3.id_pegawai');
            $pegawai = $this->db->get_where('tb_lampiran_format3')->result();

            foreach ($pegawai as $rowpg) {

                $pdf->Cell(30, 5, 'Nama', 0, 0);
                $pdf->Cell(8, 5, ':', 0, 0);
                $pdf->Cell(0, 5, strtoupper($rowpg->nama), 0, 1);
                $pdf->Cell(30, 5, 'Jabatan', 0, 0);
                $pdf->Cell(8, 5, ':', 0, 0);
                $pdf->Cell(0, 5, strtoupper($rowpg->jabatan), 0, 1);
                $pdf->Cell(30, 5, 'Instansi', 0, 0);
                $pdf->Cell(8, 5, ':', 0, 0);
                $pdf->Cell(0, 5, 'Dinas Pekerjaan Umum, Penataan Ruang dan Perumahan Rakyat Kab. Bone Bolango', 0, 1);
                $pdf->Cell(30, 5, 'SPT No.', 0, 0);
                $pdf->Cell(8, 5, ':', 0, 0);
                $pdf->Cell(0, 5, '', 0, 1);
                $pdf->Cell(30, 5, 'SPPD No.', 0, 0);
                $pdf->Cell(8, 5, ':', 0, 0);
                $pdf->Cell(0, 5, '', 0, 1);
                $pdf->Cell(30, 5, 'No. Register', 0, 0);
                $pdf->Cell(8, 5, ':', 0, 0);
                $pdf->Cell(0, 5, '', 0, 1);
            }
            $pdf->Cell(30, 5, 'Tanggal', 0, 0);
            $pdf->Cell(8, 5, ':', 0, 0);
            $pdf->Cell(0, 5, strtoupper($tanggal), 0, 1);
            $pdf->Cell(30, 5, 'Tujuan', 0, 0);
            $pdf->Cell(8, 5, ':', 0, 0);
            $pdf->MultiCell(0, 5, strtoupper($tujuan . ' yang dipakai pada ' . $get_sub['nama_jenis_sub_kegiatan']), 0);

            $pdf->Cell(0, 8, '', 0, 1, 'C');

            $this->db->join('tb_pegawai', 'tb_pegawai.id=tb_lampiran_format2.id_pegawai');
            $this->db->select('*');
            $this->db->select('SUM(total) as total_uang');
            $this->db->group_by('golongan');
            $totals = $this->db->get_where('tb_lampiran_format2')->row_array();

            $this->db->join('tb_pegawai', 'tb_pegawai.id=tb_lampiran_format2.id_pegawai');
            $this->db->select('*');
            $this->db->select('SUM(total) as total_uang, COUNT(*) as total_pg');
            $this->db->group_by('golongan');
            $hasil = $this->db->get_where('tb_lampiran_format2')->result();

            $pdf->Cell(20, 6, 'TIKET', 'LTB', 0);
            $pdf->Cell(70, 6, $get_lampiran['pg_dari'], 'BT', 0);
            $pdf->Cell(20, 6, number_format($get_lampiran['pg_jml_satuan']), 'BT', 0);
            $pdf->Cell(16, 6, 'x ' . $get_lampiran['pg_qty'] . ' Org', 'BT', 0);
            $pdf->Cell(16, 6, 'x ' . $get_lampiran['pg_hari'] . ' Hari', 'BT', 0);
            $pdf->Cell(5, 6, '=', 'BT', 0);
            $pdf->Cell(0, 6, number_format($get_lampiran['pg_total']), 'TBR', 1, 'R');

            $pdf->Cell(20, 6, 'TIKET', 'LTB', 0);
            $pdf->Cell(70, 6, $get_lampiran['pl_dari'], 'BT', 0);
            $pdf->Cell(20, 6, number_format($get_lampiran['pl_jml_satuan']), 'BT', 0);
            $pdf->Cell(16, 6, 'x ' . $get_lampiran['pl_qty'] . ' Org', 'BT', 0);
            $pdf->Cell(16, 6, 'x ' . $get_lampiran['pl_hari'] . ' Hari', 'BT', 0);
            $pdf->Cell(5, 6, '=', 'BT', 0);
            $pdf->Cell(0, 6, number_format($get_lampiran['pl_total']), 'TBR', 1, 'R');

            $pdf->Cell(142, 6, 'Rill PP (Transport Bandara-Hotel PP)', 'LTB', 0);
            $pdf->Cell(5, 6, '=', 'BT', 0);
            $pdf->Cell(0, 6, number_format($get_lampiran['rill_pp']), 'TBR', 1, 'R');
            $pdf->Cell(0, 6, '', 1, 1);

            $pdf->Cell(142, 6, 'Uang Harian', 'LTB', 0);
            $pdf->Cell(5, 6, '', 'BT', 0);
            $pdf->Cell(0, 6, number_format($get_lampiran['total_uh1']), 'TBR', 1, 'R');
            $pdf->Cell(0, 3, '', 'LR', 1);

            $pdf->Cell(80, 6, $get_lampiran['pangkat1'], 'L', 0);
            $pdf->Cell(10, 6, 'Rp.', 0, 0);
            $pdf->Cell(20, 6, number_format($get_lampiran['jml_uh1']), 0, 0);
            $pdf->Cell(16, 6, 'x ' . $get_lampiran['qty_uh1'] . ' Org', 0, 0);
            $pdf->Cell(16, 6, 'x ' . $get_lampiran['jml_huh1'] . ' Hari', 0, 0);
            $pdf->Cell(5, 6, '=', 0, 0);
            $pdf->Cell(0, 6, number_format($get_lampiran['total_uh1']), 'R', 1, 'R');

            if ($get_lampiran['pangkat2'] != '') {
                $pdf->Cell(80, 6, $get_lampiran['pangkat2'], 'L', 0);
                $pdf->Cell(10, 6, 'Rp.', 0, 0);
                $pdf->Cell(20, 6, number_format($get_lampiran['jml_uh2']), 0, 0);
                $pdf->Cell(16, 6, 'x ' . $get_lampiran['qty_uh2'] . ' Org', 0, 0);
                $pdf->Cell(16, 6, 'x ' . $get_lampiran['jml_huh2'] . ' Hari', 0, 0);
                $pdf->Cell(5, 6, '=', 0, 0);
                $pdf->Cell(0, 6, number_format($get_lampiran['total_uh2']), 'R', 1, 'R');
            }

            if ($get_lampiran['pangkat3'] != '') {
                $pdf->Cell(80, 6, $get_lampiran['pangkat3'], 'L', 0);
                $pdf->Cell(10, 6, 'Rp.', 0, 0);
                $pdf->Cell(20, 6, number_format($get_lampiran['jml_uh3']), 0, 0);
                $pdf->Cell(16, 6, 'x ' . $get_lampiran['qty_uh3'] . ' Org', 0, 0);
                $pdf->Cell(16, 6, 'x ' . $get_lampiran['jml_huh3'] . ' Hari', 0, 0);
                $pdf->Cell(5, 6, '=', 0, 0);
                $pdf->Cell(0, 6, number_format($get_lampiran['total_uh3']), 'R', 1, 'R');
            }

            $pdf->Cell(0, 3, '', 'LR', 1);

            $pdf->Cell(142, 6, 'Uang Penginapan', 'LTB', 0);
            $pdf->Cell(5, 6, '', 'BT', 0);
            $pdf->Cell(0, 6, number_format($get_lampiran['total_semua_up']), 'TBR', 1, 'R');
            $pdf->Cell(0, 3, '', 'LR', 1);

            $pdf->Cell(80, 6, $get_lampiran['tempat_penginapan1'], 'L', 0);
            $pdf->Cell(10, 6, 'Rp.', 0, 0);
            $pdf->Cell(20, 6, number_format($get_lampiran['jml_up1']), 0, 0);
            $pdf->Cell(16, 6, 'x ' . $get_lampiran['qty_up1'] . ' Org', 0, 0);
            $pdf->Cell(16, 6, 'x ' . $get_lampiran['jml_hup1'] . ' Hari', 0, 0);
            $pdf->Cell(5, 6, '=', 0, 0);
            $pdf->Cell(0, 6, number_format($get_lampiran['total_up1']), 'R', 1, 'R');

            $pdf->Cell(80, 6, $get_lampiran['tempat_penginapan2'], 'L', 0);
            $pdf->Cell(10, 6, 'Rp.', 0, 0);
            $pdf->Cell(20, 6, number_format($get_lampiran['jml_up2']), 0, 0);
            $pdf->Cell(16, 6, 'x ' . $get_lampiran['qty_up2'] . ' Org', 0, 0);
            $pdf->Cell(16, 6, 'x ' . $get_lampiran['jml_hup2'] . ' Hari', 0, 0);
            $pdf->Cell(5, 6, '=', 0, 0);
            $pdf->Cell(0, 6, number_format($get_lampiran['total_up2']), 'R', 1, 'R');

            $pdf->Cell(0, 3, '', 'LR', 1);

            $pdf->Cell(80, 6, 'By. Refresentatife', 'LBT', 0);
            $pdf->Cell(10, 6, 'Rp.', 'BT', 0);
            $pdf->Cell(20, 6, '', 'BT', 0);
            $pdf->Cell(16, 6, 'x ' . ' ' . ' Org', 'BT', 0);
            $pdf->Cell(16, 6, 'x ' . ' ' . ' Hari', 'BT', 0);
            $pdf->Cell(5, 6, '=', 'BT', 0);
            $pdf->Cell(0, 6, '', 'BTR', 1, 'R');

            $pdf->Cell(142, 6, 'By. Kebutuhan Dilat Kontribusi', 'LTB', 0);
            $pdf->Cell(5, 6, '', 'BT', 0);
            $pdf->Cell(0, 6, '', 'TBR', 1, 'R');

            $pdf->Cell(142, 6, 'JUMLAH', 'LTB', 0, 'C');
            $pdf->Cell(5, 6, '', 'BT', 0);
            $pdf->Cell(0, 6, number_format($get_lampiran['total_semua'] + $get_lampiran['rill_pp']), 'TBR', 1, 'R');

            $table = new easyTable($pdf, '{40, 200}', 'width:220; border-color:#000000; font-size:9; border:1; paddingY:2;');
            $table->easyCell('Dengan Huruf :', 'border:LBT');
            $table->easyCell(terbilang($get_lampiran['total_semua'] + $get_lampiran['rill_pp']), 'border:BTR');
            $table->printRow();
            $table->endTable(10);

            $pdf->SetFont('Arial', '', 9);

            $pdf->Cell(0, 6, 'Suwawa,        ' . tanggalIndonesiaTanpaDay($tanggal), 0, 1, 'R');
            $pdf->Cell(0, 6, 'YANG MENERIMA', 0, 1);
            $pdf->Cell(0, 15, '', 0, 1, 'C');

            foreach ($pegawai as $rowpg) {

                $pdf->Cell(15, 7, 'Nama', 0, 0);
                $pdf->Cell(5, 7, ':', 0, 0);
                $pdf->Cell(70, 7, strtoupper($rowpg->nama), 0, 1);
                $pdf->Cell(15, 7, 'TTD', 0, 0);
                $pdf->Cell(5, 7, ':', 0, 1);
                $pdf->Cell(15, 5, '', 0, 1);
            }

            // halaman baru Rincian Rill PP

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


            $pdf->Cell(10, 6, '', 0, 1);
            $pdf->SetFont('Arial', 'BU', 11);
            $pdf->Cell(0, 5, 'RINCIAN TRANSPORT', 0, 1, 'C');

            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(10, 8, '', 0, 1);
            $pdf->MultiCell(0, 6, 'Yang bertanda tangan di bawah ini :', 0);
            foreach ($pegawai as $rowpg) {

                $pdf->Cell(20, 6, 'Nama', 0, 0);
                $pdf->Cell(5, 6, ':', 0, 0);
                $pdf->Cell(0, 6, strtoupper($rowpg->nama), 0, 1);
                $pdf->Cell(20, 6, 'Jabatan', 0, 0);
                $pdf->Cell(5, 6, ':', 0, 0);
                $pdf->Cell(0, 6, strtoupper($rowpg->jabatan), 0, 1);
            }

            $pdf->Cell(10, 6, '', 0, 1);
            $pdf->MultiCell(0, 6, 'Berdasarkan Surat Perintah Tugas (SPT) Tanggal                              ' . date('Y', strtotime($tanggal)) . ' Nomor :', 0);
            $pdf->Cell(10, 6, '', 0, 1);
            $pdf->MultiCell(0, 6, 'Dengan ini saya/kami menyatakan dengan sesungguhnya bahwa :', 0);
            $pdf->Cell(5, 6, '1.', 0, 0);
            $pdf->MultiCell(0, 6, 'Biaya Transport Pegawai di bawah ini yang tidak dapat diperoleh bukti-bukti pengeluarannya, meliputi :', 0);
            $pdf->Cell(6, 6, '', 0, 1);

            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(6, 6, '', 0, 0);
            $pdf->Cell(8, 6, 'NO', 1, 0, 'C');
            $pdf->Cell(110, 6, 'URAIAN', 1, 0, 'C');
            $pdf->Cell(0, 6, 'JUMLAH', 1, 1, 'C');

            $pdf->Cell(6, 6, '', 0, 0);
            $pdf->Cell(8, 6, '1', 1, 0, 'C');
            $pdf->Cell(70, 6, 'Dari Tempat Kedudukan ke Bandara', 'LBT', 0);
            $pdf->Cell(15, 6, $get_lampiran['transport_qty1'] . ' Orang', 'BT', 0);
            $pdf->Cell(5, 6, 'x', 'BT', 0);
            $pdf->Cell(20, 6, number_format($get_lampiran['transport_jml1']), 'BT', 0, 'R');
            $pdf->Cell(0, 6, number_format($get_lampiran['transport_hasil1']), 1, 1, 'R');

            $pdf->Cell(6, 7, '', 0, 0);
            $pdf->Cell(8, 7, '2', 1, 0, 'C');
            $pdf->Cell(70, 7, 'Dari Bandara ke Tempat Penginapan', 'LBT', 0);
            $pdf->Cell(15, 7, $get_lampiran['transport_qty2'] . ' Orang', 'BT', 0);
            $pdf->Cell(5, 7, 'x', 'BT', 0);
            $pdf->Cell(20, 7, number_format($get_lampiran['transport_jml2']), 'BT', 0, 'R');
            $pdf->Cell(0, 7, number_format($get_lampiran['transport_hasil2']), 1, 1, 'R');

            $pdf->Cell(6, 7, '', 0, 0);
            $pdf->Cell(8, 7, '3', 1, 0, 'C');
            $pdf->Cell(70, 7, 'Dari Tempat Penginapan ke Bandara', 'LBT', 0);
            $pdf->Cell(15, 7, $get_lampiran['transport_qty3'] . ' Orang', 'BT', 0);
            $pdf->Cell(5, 7, 'x', 'BT', 0);
            $pdf->Cell(20, 7, number_format($get_lampiran['transport_jml3']), 'BT', 0, 'R');
            $pdf->Cell(0, 7, number_format($get_lampiran['transport_hasil3']), 1, 1, 'R');

            $pdf->Cell(6, 7, '', 0, 0);
            $pdf->Cell(8, 7, '4', 1, 0, 'C');
            $pdf->Cell(70, 7, 'Dari Bandara ke Tempat Kedudukan', 'LBT', 0);
            $pdf->Cell(15, 7, $get_lampiran['transport_qty4'] . ' Orang', 'BT', 0);
            $pdf->Cell(5, 7, 'x', 'BT', 0);
            $pdf->Cell(20, 7, number_format($get_lampiran['transport_jml4']), 'BT', 0, 'R');
            $pdf->Cell(0, 7, number_format($get_lampiran['transport_hasil4']), 1, 1, 'R');

            $pdf->Cell(6, 7, '', 0, 0);
            $pdf->Cell(118, 7, 'JUMLAH', 1, 0, 'C');
            $pdf->Cell(0, 7, number_format($get_lampiran['rill_pp']), 1, 1, 'R');

            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(6, 6, '', 0, 1);
            $pdf->Cell(5, 6, '2.', 0, 0);
            $pdf->MultiCell(0, 6, 'Jumlah uang tersebut pada angka 1 di atas benar-benar dikeluarkan untuk pelaksanaan perjalanan Dinas dimaksud dan apabila dikemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke kas Negara.', 0);
            $pdf->Cell(0, 6, '', 0, 1);
            $pdf->MultiCell(0, 6, 'Demikian pernyataan ini kami buat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.', 0);

            $pdf->Cell(0, 6, '', 0, 1);

            $pdf->Cell(0, 6, 'Suwawa,        ' . tanggalIndonesiaTanpaDay($tanggal), 0, 1, 'R');
            $pdf->Cell(0, 6, 'Yang Melakukan Perjalanan Dinas', 0, 1);
            $pdf->Cell(0, 15, '', 0, 1, 'C');

            foreach ($pegawai as $rowpg) {

                $pdf->Cell(15, 7, 'Nama', 0, 0);
                $pdf->Cell(5, 7, ':', 0, 0);
                $pdf->Cell(70, 7, strtoupper($rowpg->nama), 0, 1);
                $pdf->Cell(15, 7, 'TTD', 0, 0);
                $pdf->Cell(5, 7, ':', 0, 1);
                $pdf->Cell(15, 5, '', 0, 1);
            }


            // membuat lampiran penerimaan biaya

            $pdf->SetLeftMargin(23);
            $pdf->SetRightMargin(23);
            $pdf->SetTopMargin(20);
            $pdf->AddPage('O');

            $pdf->SetFont('Times', 'B', 10);
            $pdf->Cell(0, 6, 'LAMPIRAN PENERIMAAN PEMBAYARAN BIAYA', 0, 1, 'C');
            $pdf->Cell(0, 6, 'PERJALANAN DINAS BIASA PADA BELANJA LANGSUNG', 0, 1, 'C');
            $pdf->Cell(0, 6, 'DINAS PEKERJAAN UMUM, PENATAAN RUANG DAN PERUMAHAN RAKYAT KAB. BONE BOLANGO TAHUN ANGGARAN ' . date('Y', strtotime($tanggal)), 0, 1, 'C');

            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 10, '', 0, 1, 'C');
            $pdf->Cell(10, 10, '', 0, 0, 'C');
            $pdf->Cell(0, 10, 'Tanggal :', 0, 1);

            $pdf->SetFont('Times', '', 10);
            $pdf->AddFont('FontUTF8', '', 'Arimo-Regular.php');
            $pdf->AddFont('FontUTF8', 'B', 'Arimo-Bold.php');
            $pdf->AddFont('FontUTF8', 'I', 'Arimo-Italic.php');
            $pdf->AddFont('FontUTF8', 'BI', 'Arimo-BoldItalic.php');

            $table = new easyTable($pdf, '{10, 60, 30, 30, 30, 30, 30, 40}', 'width:220; border-color:#000000; font-size:10; border:1;');

            $table->rowStyle('align:{CCCCCC};');
            $table->easyCell("NO", 'rowspan:1');
            $table->easyCell("NAMA", 'rowspan:1');
            $table->easyCell("JABATAN", 'rowspan:1');
            $table->easyCell("JUMLAH DITERIMA (Rp)", 'rowspan:1');
            $table->easyCell("TRANSPORT", 'rowspan:1');
            $table->easyCell("KET", 'rowspan:1');
            $table->easyCell("JUMLAH", 'rowspan:1');
            $table->easyCell("TANDA TANGAN", 'rowspan:1');
            $table->printRow();

            $nom = 1;
            foreach ($pegawai as $rowpg) {

                $table->easyCell($nom, 'align:C; paddingY:10;');
                $table->easyCell($rowpg->nama, 'paddingY:10;');
                $table->easyCell($rowpg->jabatan, 'align:C; paddingY:10;');
                $table->easyCell(number_format($rowpg->total_semua), 'align:R; paddingY:10;');
                $table->easyCell(number_format($rowpg->rill_pp), 'align:R; paddingY:10;');
                $table->easyCell($rowpg->jml_huh1 . ' HARI', 'align:C; paddingY:10;');
                $table->easyCell(number_format($rowpg->total_semua + $rowpg->rill_pp), 'align:R; paddingY:10;');
                if ($nom % 2 == 0) {
                    $posisi = 'align:C; paddingY:10;';
                } else {
                    $posisi = 'align:L; paddingY:10;';
                }
                $table->easyCell($nom, $posisi);
                $table->printRow(true);

                $nom++;
            }

            $pdf->SetFont('Times', '', 10);
            $table->easyCell('', 'border:LB');
            $table->easyCell('', 'border:B');
            $table->easyCell('JUMLAH', 'border:RB');
            $table->easyCell(number_format($get_lampiran['total_semua']), 'align:R');
            $table->easyCell(number_format($get_lampiran['rill_pp']), 'align:R');
            $table->easyCell('');
            $table->easyCell(number_format($get_lampiran['rill_pp'] + $get_lampiran['total_semua']), 'align:R');
            $table->easyCell('');
            $table->printRow(true);

            $table->endTable(10);

            $pdf->Cell(140, 6, 'PENGGUNA ANGGARAN', 0, 0, 'C');
            $pdf->Cell(0, 6, 'BENDAHARA PENGELUARAN', 0, 1, 'C');

            $pdf->Cell(0, 15, '', 0, 1, 'C');
            $pdf->SetFont('Times', 'U', 11);

            $pdf->Cell(140, 6, '..........................................', 0, 0, 'C');
            $pdf->Cell(0, 6, '..........................................', 0, 1, 'C');

            $pdf->SetFont('Times', '', 11);
            $pdf->Cell(140, 6, 'NIP. .................................', 0, 0, 'C');
            $pdf->Cell(0, 6, 'NIP. .................................', 0, 1, 'C');


            $pdf->Output('I', 'PerjalananDinas2-' . time() . '.pdf');
        } else {
            echo "GAGAL";
        }
    }
}
