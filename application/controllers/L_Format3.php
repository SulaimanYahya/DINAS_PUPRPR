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
            $tanggal = $_POST["tanggal"];
            $tujuan = $_POST["tujuan"];
            $id_belanja = $_POST["id_belanjax"];

            $this->session->set_userdata('tanggal', $tanggal);
            $this->session->set_userdata('tujuan', $tujuan);
            $this->session->set_userdata('id_belanjax', $id_belanja);

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

            $pdf->SetFont('Arial', 'BU', 10);
            $pdf->Cell(0, 6, 'PERINCIAN PERJALANAN DINAS', 0, 1, 'C');

            $pdf->SetFont('Arial', '', 9);
            $pdf->Cell(0, 8, '', 0, 1, 'C');

            $this->db->join('tb_pegawai', 'tb_pegawai.id=tb_lampiran_format2.id_pegawai');
            $pegawai = $this->db->get_where('tb_lampiran_format2')->result();

            foreach ($pegawai as $rowpg) {

                $pdf->Cell(50, 5, 'NAMA', 0, 0);
                $pdf->Cell(10, 5, ':', 0, 0);
                $pdf->Cell(0, 5, strtoupper($rowpg->nama), 0, 1);
                $pdf->Cell(50, 5, 'JABATAN', 0, 0);
                $pdf->Cell(10, 5, ':', 0, 0);
                $pdf->Cell(0, 5, strtoupper($rowpg->jabatan), 0, 1);
            }
            $pdf->Cell(0, 8, '', 0, 1, 'C');
            $pdf->Cell(50, 5, 'Tanggal', 0, 0);
            $pdf->Cell(10, 5, ':', 0, 0);
            $pdf->Cell(0, 5, strtoupper($tanggal), 0, 1);
            $pdf->Cell(50, 5, 'Tujuan', 0, 0);
            $pdf->Cell(10, 5, ':', 0, 0);
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

            $pdf->Cell(130, 6, '1  PERJALANAN DINAS', 'LTB', 0);
            $pdf->Cell(10, 6, 'Rp.', 'BT', 0);
            $pdf->Cell(0, 6, number_format($totals['total_uang']), 'TBR', 1, 'R');

            foreach ($hasil as $rowhs) {

                $pdf->Cell(45, 10, '    Gol. ' . $rowhs->golongan, 'LB', 0);
                $pdf->Cell(10, 10, 'Rp.', 'B', 0);
                $pdf->Cell(25, 10, number_format($rowhs->biaya) . ' x ', 'B', 0);
                $pdf->Cell(15, 10, $rowhs->total_pg . ' org x ', 'B', 0);
                $pdf->Cell(15, 10, $rowhs->hari . ' hari = ', 'B', 0);
                $pdf->Cell(0, 10, 'Rp.' . number_format($rowhs->total_uang), 'BR', 1);
            }

            $pdf->Cell(100, 6, '', 'LB', 0);
            $pdf->Cell(30, 6, 'JUMLAH', 'B', 0);
            $pdf->Cell(10, 6, 'Rp.', 'B', 0);
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(0, 6, number_format($totals['total_uang']), 'BR', 1, 'R');
            $pdf->SetFont('Arial', '', 9);

            $pdf->Cell(100, 6, '', 'LB', 0);
            $pdf->Cell(30, 6, '', 'B', 0);
            $pdf->Cell(10, 6, '', 'B', 0);
            $pdf->Cell(0, 6, '', 'BR', 1, 'R');

            $pdf->Cell(60, 10, '    Dengan Huruf : ', 'LB', 0);
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->Cell(0, 10, terbilang($totals['total_uang']), 'RB', 1);

            $pdf->Cell(100, 6, '', 'LB', 0);
            $pdf->Cell(30, 6, '', 'B', 0);
            $pdf->Cell(10, 6, '', 'B', 0);
            $pdf->Cell(0, 6, '', 'BR', 1, 'R');
            $pdf->SetFont('Arial', '', 9);

            $pdf->Cell(0, 6, 'Suwawa,        ' . tanggalIndonesiaTanpaDay($tanggal), 0, 1, 'C');
            $pdf->Cell(0, 6, 'YANG MENERIMA', 0, 1, 'C');
            $pdf->Cell(0, 15, '', 0, 1, 'C');

            $no = 1;
            foreach ($pegawai as $rowpg) {

                $pdf->Cell(5, 13, $no . '.', 0, 0);
                $pdf->Cell(70, 13, strtoupper($rowpg->nama), 0, 0);
                if ($no % 2 == 0) {
                    $posisi = 'R';
                } else {
                    $posisi = 'L';
                }
                $pdf->Cell(75, 13, '.................................', 0, 1, $posisi);

                $no++;
            }

            // membuat halaman baru

            $pdf->SetLeftMargin(23);
            $pdf->SetRightMargin(23);
            $pdf->SetTopMargin(20);
            $pdf->AddPage('O');

            $pdf->SetFont('Times', 'B', 11);
            $pdf->Cell(0, 6, 'LAMPIRAN DAFTAR PENERIMAAN', 0, 1, 'C');
            $pdf->Cell(0, 6, 'PERJALANAN DINAS BIASA DALAM PROVINSI', 0, 1, 'C');
            $pdf->Cell(0, 6, 'DINAS PEKERJAAN UMUM,PENATAAN RUANG DAN PERUMAHAN RAKYAT KAB. BONE BOLANGO TAHUN ANGGARAN ' . date('Y', strtotime($tanggal)), 0, 1, 'C');

            $pdf->SetFont('Times', '', 11);
            $pdf->Cell(0, 10, '', 0, 1, 'C');

            $pdf->SetFont('Times', '', 10);
            $pdf->AddFont('FontUTF8', '', 'Arimo-Regular.php');
            $pdf->AddFont('FontUTF8', 'B', 'Arimo-Bold.php');
            $pdf->AddFont('FontUTF8', 'I', 'Arimo-Italic.php');
            $pdf->AddFont('FontUTF8', 'BI', 'Arimo-BoldItalic.php');

            $table = new easyTable($pdf, '{10, 65, 65, 30, 30, 60}', 'width:220; border-color:#000000; font-size:10; border:1; paddingY:5;');

            $table->rowStyle('align:{CCCCCC};');
            $table->easyCell("NO", 'rowspan:1');
            $table->easyCell("NAMA", 'rowspan:1');
            $table->easyCell("JABATAN", 'rowspan:1');
            $table->easyCell("JUMLAH DITERIMA (Rp)", 'rowspan:1');
            $table->easyCell("KETERANGAN", 'rowspan:1');
            $table->easyCell("TANDA TANGAN", 'rowspan:1');
            $table->printRow();

            $nom = 1;
            foreach ($pegawai as $rowpg) {

                $table->easyCell($nom, 'align:C');
                $table->easyCell($rowpg->nama);
                $table->easyCell($rowpg->jabatan, 'align:C');
                $table->easyCell(number_format($rowpg->biaya), 'align:R');
                $table->easyCell($rowpg->hari . ' HARI', 'align:C');
                if ($nom % 2 == 0) {
                    $posisi = 'align:C';
                } else {
                    $posisi = 'align:L';
                }
                $table->easyCell($nom, $posisi);
                $table->printRow(true);

                $nom++;
            }

            $pdf->SetFont('Times', 'B', 11);
            $table->easyCell('', 'border:LB');
            $table->easyCell('', 'border:B');
            $table->easyCell('JUMLAH', 'border:RB');
            $table->easyCell(number_format($totals['total_uang']), 'align:R');
            $table->easyCell('');
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
