<?php
Class Contoh1 extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
    }
    
    function index(){
        $pdf = new exFPDF('l','mm',array(210,330));
        // membuat halaman baru
        $pdf->SetLeftMargin(23);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(23);
        $pdf->AddPage();
        $pdf->Image('assets/img/profile/pulogo.png',23,24,18,18);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(0,6,'CONTOH COP',0,1,'C');
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(0,7,'KOTA GORONTALO',0,1,'C');
        $pdf->SetFont('Times','BI',12);
        $pdf->Cell(0,7,'Alamat Jl. Ahmad Yani No. 27, Limba B, Kota Selatan, Kota Gorontalo',0,1,'C');
        $pdf->SetLineWidth(1);
        $pdf->Line(23,45,303,45);
        $pdf->SetLineWidth(0);
        $pdf->Line(23,46,303.3,46);

        
        $pdf->Cell(10,8,'',0,1);
        $pdf->SetFont('Times','BU',12);
        $pdf->Cell(0,6,'LAPORAN PENGAJUAN APPROVED',0,1,'C');
        $pdf->SetFont('Times','BU',10);
        $pdf->Cell(10,3,'',0,1);

        // Memberikan space kebawah agar tidak terlalu rapat
        
		$pdf->Cell(10,3,'',0,1);

		 $pdf->SetFont('helvetica','',10);
		 $pdf->AddFont('FontUTF8','','Arimo-Regular.php'); 
		 $pdf->AddFont('FontUTF8','B','Arimo-Bold.php');
		 $pdf->AddFont('FontUTF8','I','Arimo-Italic.php');
		 $pdf->AddFont('FontUTF8','BI','Arimo-BoldItalic.php');

		 $table=new easyTable($pdf, '{10, 50, 50, 50, 50, 50}', 'width:220; border-color:#000000; font-size:10; border:1; paddingY:2;');

		 $table->rowStyle('align:{CCCCCC}; bgcolor:#f0dd3f;font-style:B');
		 $table->easyCell("No", 'rowspan:1');
		 $table->easyCell("Nama", 'rowspan:1');
		 $table->easyCell("NIP", 'rowspan:1');
		 $table->easyCell("Jabatan", 'rowspan:1');
		 $table->easyCell("Golongan", 'rowspan:1');
		 $table->easyCell("Bidang", 'rowspan:1');
		 $table->printRow();

		 $this->db->order_by('id', 'DESC');
        $datalap = $this->db->get_where('tb_pegawai')->result_array();
		 $no=1;
		 foreach ($datalap as $row){
            
		 	$table->easyCell($no, 'align:C');
		    $table->easyCell($row['nama']);
		    $table->easyCell($row['nip']);
		    $table->easyCell($row['jabatan']);
		    $table->easyCell($row['golongan']);
		    $table->easyCell($row['bidang'], 'align:C');
		    $table->printRow(true);

            $no++;
        }

		$table->endTable(10);

        $pdf->Output();
        
    }
 }