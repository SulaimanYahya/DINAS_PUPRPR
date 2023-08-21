<?php
class L_NotaPesanan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
    }

    function index()
    {


        $pdf = new exFPDF('p', 'mm', array(210, 330));
        $pdf->SetTitle('NOTA PESANAN ATK');
        // membuat halaman baru

        $pdf->SetLeftMargin(23);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(23);
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'BU', 15);
        $pdf->Cell(0, 6, 'NOTA PESANAN', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 6, 'NOMOR:               /NP/AD/PUPRPR/            /' . date('Y', time()), 0, 1, 'C');
        $pdf->Cell(0, 4, '', 0, 1);

        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 6, 'Kepada Yth', 0);
        $pdf->MultiCell(0, 6, 'Harap dalam waktu singkat dapat memasukkan barang / alat tersebut dibawah ini sebagai pesanan : Belanja ATK yang dipakai pada Dinas PUPRPR Kab. Bone Bolango sebagai berikut :', 0);
        $pdf->Cell(0, 6, '', 0, 1);


        $pdf->Cell(0, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 4, 'REKANAN', 0, 0, 'C');
        $pdf->Cell(70, 4, '', 0, 0, 'C');
        $pdf->Cell(0, 4, 'PPTK', 0, 1, 'C');
        $pdf->Cell(50, 4, strtoupper($this->session->userdata("rekanan")), 0, 0, 'C'); //session nama rekanan
        $pdf->Cell(70, 4, '', 0, 0, 'C');
        $pdf->Cell(0, 4, '', 0, 1, 'C');

        $pdf->Cell(0, 20, '', 0, 1);

        $pdf->SetFont('Arial', 'BU', 10);
        $pdf->Cell(50, 4, strtoupper($this->session->userdata("pemilik")), 0, 0, 'C'); //session nama pemilik
        $pdf->Cell(70, 4, '', 0, 0, 'C');

        $id_pegawai = $this->session->userdata("id");
        $pegawai = $this->db->get_where('tb_pegawai', ['id' => $id_pegawai])->row_array();


        $pdf->Cell(0, 4, strtoupper($pegawai['nama']), 0, 1, 'C'); //session nama pptk
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50, 4, 'PEMILIK', 0, 0, 'C');
        $pdf->Cell(70, 4, '', 0, 0, 'C');
        $pdf->Cell(0, 4, strtoupper($pegawai['nip']), 0, 1, 'C'); //session nip pptk



        $pdf->Output('I', 'NotaPesananATK-' . time() . '.pdf');
    }
}
