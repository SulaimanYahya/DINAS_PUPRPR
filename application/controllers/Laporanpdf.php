<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
    }
    
    function index(){
        $pdf = new FPDF('l','mm',array(215,330));
        // membuat halaman baru
        $pdf->SetLeftMargin(30);
        $pdf->SetRightMargin(23);
        $pdf->SetTopMargin(23);
        $pdf->AddPage();
        $pdf->Image('assets/img/profile/logo_kos.png',30,24,22,22);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',20);
        
        $ambe_user = $this->db->get_where('tb_user', ['nik' => $this->session->userdata('username')])->row_array();
        $id_user = $ambe_user['id_user'];
        $this->db->join('tb_user','tb_kos.id_user=tb_user.id_user');
        $kos = $this->db->get_where('tb_kos', ['tb_kos.id_user'=> $id_user])->row_array();

        $pdf->Cell(0,6,$kos['nama_kos'],0,1,'C');
        $pdf->SetFont('Times','B',16);
        $pdf->Cell(0,7,'Alamat Huluduotamo, Kec. Suwawa, Kabupaten Bone Bolango, Gorontalo 96113',0,1,'C');
        $pdf->SetLineWidth(1);
        $pdf->Line(30,48,292,48);
        $pdf->SetLineWidth(0);
        $pdf->Line(30,49,292.3,49);

        $tahun_cetak = $this->input->post('tahun_cetak');
        $bulan_cetak = $this->input->post('bulan_cetak');
        
        $pdf->SetFont('Times','B',18);
        $pdf->Cell(0,6,'Data Angsuran Bulan '.$bulan_cetak.' Tahun '.$tahun_cetak,0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        // Memberikan space kebawah agar tidak terlalu rapat
        
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(12,9,'No',1,0);
        $pdf->Cell(40,9,'NIK',1,0);
        $pdf->Cell(55,9,'Nama',1,0);
        $pdf->Cell(35,9,'Kamar',1,0);
        $pdf->Cell(30,9,'Jenis',1,0);
        $pdf->Cell(30,9,'Angsuran',1,0);
        $pdf->Cell(30,9,'Bayar',1,0);
        $pdf->Cell(30,9,'Tanggal',1,1);
        $pdf->SetFont('Times','',12);
        $this->db->join('tb_user','tb_angsuran.id_user=tb_user.id_user');
        $this->db->join('tb_penghuni','tb_penghuni.id_user=tb_user.id_user');
        $this->db->join('tb_kamar','tb_kamar.id_kamar=tb_penghuni.id_kamar');
        $this->db->join('tb_kos','tb_kamar.id_kos=tb_kos.id_kos');
        $laporan = $this->db->get_where('tb_angsuran', ['tb_kos.id_user'=> $id_user, 'bulan_cetak'=>$bulan_cetak, 'tahun_cetak'=>$tahun_cetak])->result();
  
        $no = 1;
        foreach ($laporan as $row){
            $pdf->Cell(12,6,$no,1,0);
            $pdf->Cell(40,6,$row->nik,1,0);
            $pdf->Cell(55,6,$row->nama,1,0);
            $pdf->Cell(35,6,$row->no_kamar,1,0);
            $pdf->Cell(30,6,$row->jenis_kamar,1,0);
            $pdf->Cell(30,6,"Rp. ".number_format($row->angsuran),1,0);
            $pdf->Cell(30,6,"Rp. ".number_format($row->jumlah),1,0);
            $pdf->Cell(30,6,$row->tanggal_angsuran,1,1);

            $no++;
        }

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Times','',12);
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('d-m-Y');
        $pdf->Cell(198,5,'',0,0);
        $pdf->Cell(50,5,'Gorontalo, '.$waktu,0,1);
        $pdf->Cell(198,5,'',0,0);
        $pdf->Cell(50,5,'Mengetahui',0,1);
        $pdf->Cell(198,5,'',0,0);
        $pdf->Cell(50,5,'Owner '.$kos['nama_kos'],0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Times','U',12);
        $pdf->Cell(198,5,'',0,0);
        $pdf->Cell(50,7,$kos['nama'],0,1);

        $pdf->Output();
        
    }
 }