<?php
Class Laprekapspaldpdf extends CI_Controller{
    
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
        $pdf->Cell(0,6,'DINAS PEKERJAAN UMUM, PENATAAN RUANG DAN PERUMAHAN RAKYAT',0,1,'C');
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(0,7,'KABUPATEN BONE BOLANGO PROVINSI GORONTALO',0,1,'C');
        $pdf->SetFont('Times','BI',12);
        $pdf->Cell(0,7,'Alamat Huluduotamo, Kec. Suwawa, Kabupaten Bone Bolango, Gorontalo 96113',0,1,'C');
        $pdf->SetLineWidth(1);
        $pdf->Line(23,45,303,45);
        $pdf->SetLineWidth(0);
        $pdf->Line(23,46,303.3,46);

        
        $pdf->Cell(10,8,'',0,1);
        $pdf->SetFont('Times','BU',12);
        $pdf->Cell(0,6,'REKAPITULASI LAYANAN AIR LIMBAH DOMESTIK',0,1,'C');
        $pdf->SetFont('Times','BU',10);
        $pdf->Cell(10,3,'',0,1);

        // Memberikan space kebawah agar tidak terlalu rapat
        
		$pdf->Cell(10,3,'',0,1);

		 $pdf->SetFont('helvetica','',10);
		 $pdf->AddFont('FontUTF8','','Arimo-Regular.php'); 
		 $pdf->AddFont('FontUTF8','B','Arimo-Bold.php');
		 $pdf->AddFont('FontUTF8','I','Arimo-Italic.php');
		 $pdf->AddFont('FontUTF8','BI','Arimo-BoldItalic.php');

		 $table=new easyTable($pdf, '{12, 60, 50, 50, 50, 50}', 'width:220; border-color:#000000; font-size:10; border:1; paddingY:2;');

		 $table->rowStyle('align:{CCCCCC}; bgcolor:#f0dd3f;font-style:B');
		 $table->easyCell("No", 'rowspan:2');
		 $table->easyCell("Jenis Pelayanan Dasar", 'rowspan:2');
		 $table->easyCell("Total Rumah di Kabupaten/Kota", 'rowspan:2');
		 $table->easyCell("Realisasi", 'colspan:3; align:C');
		 $table->printRow();

		 $table->rowStyle('align:{CCC}; bgcolor:#f0dd3f;font-style:B');
		 $table->easyCell("Sudah Terlayani");
		 $table->easyCell("Belum Terlayani");
		 $table->easyCell("Persentase Capaian %");
		 $table->printRow(true);

		 $this->db->select('tb_rumah.kode_rumah, tb_terlayani_spald.kode_rumah, tb_desa.id_desa, tb_rumah.id_desa, tb_kecamatan.id_kecamatan, tb_desa.id_kecamatan, nama_kecamatan, nama_desa, count(*) as total, sum(babs) as tbabs, sum(cubluk_perkotaan) as tcublukkota, sum(cubluk) as tcubluk, sum(tangki_individu_layak) as ttakinlay, sum(tangki_komunal_layak) as ttakomlay, sum(mck) as tmck, sum(tangki_individu_spalds) as ttakinspa, sum(tangki_komunal_spalds) as ttakomspa, sum(ipald_mukim) as tipalmuk, sum(ipald_kawasan) as tipalkaw, sum(ipald_kota) as tipalkota');
		$this->db->join('tb_rumah', 'tb_rumah.kode_rumah=tb_terlayani_spald.kode_rumah');
		$this->db->join('tb_desa', 'tb_desa.id_desa=tb_rumah.id_desa');
		$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan=tb_desa.id_kecamatan');
		$this->db->join('tb_kabupaten', 'tb_kabupaten.id_kabupaten=tb_kecamatan.id_kabupaten');
		$this->db->group_by('tb_kabupaten.id_kabupaten');
		$datalap = $this->db->get_where('tb_terlayani_spald')->result_array();
		 $no=1;
		 foreach ($datalap as $row){
            
		 	$table->easyCell($no, 'align:C');
		    $table->easyCell("Penyediaan Pelayanan Pengolahan Air Limbah Domestik");
		    $table->easyCell($row['total'], 'align:C');
		    	// $layan = $row['tjp']+$row['tbjp'];
		    $table->easyCell($row['tcubluk'], 'align:C');
		    	$belum = $row['total'] - $row['tcubluk'];
		    $table->easyCell($belum, 'align:C');
		    	$persen = $row['tcubluk']/$row['total']*100;
		    $table->easyCell($persen." %", 'align:C');
		    $table->printRow(true);

            $no++;
        }

		$table->endTable(10);

        $pdf->Output();
        
    }
 }