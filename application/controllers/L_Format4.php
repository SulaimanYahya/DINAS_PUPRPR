<?php
class L_Format4 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
    }

    function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $tanggal = $_POST["tgl_pembuatan"];
            $selang_bln = $_POST["selang_bln"];
            $sampai_dengan = $_POST["sampai_dengan"];
            $pejabat_pembuat_komite = $_POST["pejabat_pembuat_komite"];
            $bendahara_pengeluaran = $_POST["bendahara_pengeluaran"];
            $get_bidang = $this->db->get_where('tb_bidang', ['id_bidang' => $this->session->userdata('username')])->row_array();
            $nama_bidang = $get_bidang['nama_bidang'];
            $get_ppk = $this->db->get_where('tb_pegawai', ['id' => $pejabat_pembuat_komite])->row_array();
            $get_bendahara = $this->db->get_where('tb_pegawai', ['id' => $bendahara_pengeluaran])->row_array();
            $get_lampiran = $this->db->get_where('tb_lampiran_format4')->row_array();

            $this->db->join('tb_pegawai', 'tb_pegawai.id=tb_lampiran_format4.id_pegawai');
            $pegawai = $this->db->get_where('tb_lampiran_format4')->result();

            $pdf = new exFPDF('p', 'mm', array(210, 330));
            $pdf->SetTitle('LAMPIRAN FORMAT 4');
            // membuat halaman baru

            $pdf->SetLeftMargin(23);
            $pdf->SetRightMargin(23);
            $pdf->SetTopMargin(20);
            $pdf->AddPage('O');

            $pdf->SetFont('Times', 'B', 11);
            $pdf->Cell(0, 6, 'DAFTAR LAMPIRAN PERMINTAAN PEMBAYARAN BIAYA', 0, 1, 'C');
            $pdf->Cell(0, 6, 'HONORARIUM PEJABAT PENGADAAN BARANG DAN JASA ' . strtoupper($nama_bidang), 0, 1, 'C');
            $pdf->Cell(0, 6, 'SELANG BULAN ' . strtoupper(HanyaBulan($selang_bln)) . ' - ' . strtoupper(HanyaBulan($sampai_dengan)) . ' ' . date('Y', strtotime($tanggal)), 0, 1, 'C');
            $pdf->Cell(0, 6, 'PENYELENGGARAAN PENATAAN BANGUNAN DAN LINGKUNGANNYA DI DAERAH KABUPATEN/KOTA', 0, 1, 'C');
            $pdf->Cell(0, 8, '', 0, 1);
            $pdf->SetFont('Times', '', 10);
            $pdf->AddFont('FontUTF8', '', 'Arimo-Regular.php');
            $pdf->AddFont('FontUTF8', 'B', 'Arimo-Bold.php');
            $pdf->AddFont('FontUTF8', 'I', 'Arimo-Italic.php');
            $pdf->AddFont('FontUTF8', 'BI', 'Arimo-BoldItalic.php');

            $table = new easyTable($pdf, '{10, 60, 30, 30, 30, 30, 30, 30, 40}', 'width:220; border-color:#000000; font-size:10; border:1;');

            $table->rowStyle('align:{CCCCCCCCC};');
            $table->easyCell("NO", 'rowspan:1');
            $table->easyCell("NAMA", 'rowspan:1');
            $table->easyCell("JABATAN", 'rowspan:1');
            $table->easyCell("JUMLAH HONOR PERBULAN", 'rowspan:1');
            $table->easyCell("JUMLAH HONOR (RP)", 'rowspan:1');
            $table->easyCell("PPH PASAL 21 (RP)", 'rowspan:1');
            $table->easyCell("JUMLAH DITERIMA", 'rowspan:1');
            $table->easyCell("KET", 'rowspan:1');
            $table->easyCell("TANDA TANGAN", 'rowspan:1');
            $table->printRow();

            $nom = 1;
            foreach ($pegawai as $rowpg) {

                $table->easyCell($nom, 'align:C; paddingY:10;');
                $table->easyCell($rowpg->nama, 'paddingY:10;');
                $table->easyCell($rowpg->jabatan, 'align:C; paddingY:10;');
                $table->easyCell(number_format($rowpg->jml_honor_perbulan), 'align:R; paddingY:10;');
                $table->easyCell(number_format($rowpg->jml_honor), 'align:R; paddingY:10;');
                $table->easyCell(number_format($rowpg->pph_pasal21), 'align:R; paddingY:10;');
                $table->easyCell(number_format($rowpg->jml_diterima), 'align:R; paddingY:10;');
                $table->easyCell($rowpg->ket . ' Bulan', 'paddingY:10;');
                if ($nom % 2 == 0) {
                    $posisi = 'align:C; paddingY:10;';
                } else {
                    $posisi = 'align:L; paddingY:10;';
                }
                $table->easyCell($nom, $posisi);
                $table->printRow(true);

                $nom++;
            }

            $pdf->SetFont('Times', 'B', 10);
            $table->easyCell('', 'border:LB');
            $table->easyCell('', 'border:B');
            $table->easyCell('JUMLAH', 'border:RB');
            $table->easyCell('');
            $table->easyCell(number_format($get_lampiran['jml_honor']), 'align:R');
            $table->easyCell(number_format($get_lampiran['pph_pasal21']), 'align:R');
            $table->easyCell(number_format($get_lampiran['jml_diterima']), 'align:R');
            $table->easyCell('');
            $table->easyCell('');
            $table->printRow(true);

            $table->endTable(10);

            $pdf->Cell(140, 6, 'PEJABAT PEMBUAT KOMITMEN', 0, 0, 'C');
            $pdf->Cell(0, 6, 'BENDAHARA PENGELUARAN', 0, 1, 'C');

            $pdf->Cell(0, 15, '', 0, 1, 'C');
            $pdf->SetFont('Times', 'U', 11);

            $pdf->Cell(140, 6, $get_ppk['nama'], 0, 0, 'C');
            $pdf->Cell(0, 6, $get_bendahara['nama'], 0, 1, 'C');

            $pdf->SetFont('Times', '', 11);
            $pdf->Cell(140, 6, 'NIP. ' . $get_ppk['nip'], 0, 0, 'C');
            $pdf->Cell(0, 6, 'NIP. ' . $get_bendahara['nip'], 0, 1, 'C');


            $pdf->Output('I', 'Lampiran4-' . time() . '.pdf');
        } else {
            echo "GAGAL";
        }
    }
}
