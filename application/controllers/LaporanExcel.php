<?php
Class LaporanExcel extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Pdf');
    }
    
    function index(){

  		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
	    // Panggil class PHPExcel nya
	    $excel = new PHPExcel();
	    // Settingan awal fil excel
	    $excel->getProperties()->setCreator('Admin BAAKSI')
	                 ->setLastModifiedBy('Admin BAAKSI')
	                 ->setTitle("Data Mahasiswa Skripsi")
	                 ->setSubject("Mahasiswa")
	                 ->setDescription("Laporan Semua Data Mahasiswa")
	                 ->setKeywords("Data Mahasiswa Skripsi");
	    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
	    $style_col = array(
	      'font' => array('bold' => true), // Set font nya jadi bold
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
	        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );
	    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
	    $style_row = array(
	      'alignment' => array(
	        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER // Set text jadi di tengah secara vertical (middle)
	      ),
	      'borders' => array(
	        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
	        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
	        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
	        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	      )
	    );
	    // $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA MAHASISWA"); 
	    // $excel->getActiveSheet()->mergeCells('A1:E1'); 
	    // $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); 
	    // $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); 
	    // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
	    // Buat header tabel nya pada baris ke 3
	    $excel->setActiveSheetIndex(0)->setCellValue('A1', "NO"); // Set kolom A1 dengan tulisan "NO"
	    $excel->setActiveSheetIndex(0)->setCellValue('B1', "NIM"); // Set kolom B1 dengan tulisan "NIS"
	    $excel->setActiveSheetIndex(0)->setCellValue('C1', "NAMA"); // Set kolom C1 dengan tulisan "NAMA"
	    $excel->setActiveSheetIndex(0)->setCellValue('D1', "TEMPAT LAHIR"); // Set kolom D1 dengan tulisan "JENIS KELAMIN"
	    $excel->setActiveSheetIndex(0)->setCellValue('E1', "TANGGAL LAHIR"); // Set kolom E1 dengan tulisan "ALAMAT"
	    $excel->setActiveSheetIndex(0)->setCellValue('F1', "TAHUN MASUK");
	    $excel->setActiveSheetIndex(0)->setCellValue('G1', "JENJANG");
	    $excel->setActiveSheetIndex(0)->setCellValue('H1', "PRODI");
	    $excel->setActiveSheetIndex(0)->setCellValue('I1', "IPK");
	    $excel->setActiveSheetIndex(0)->setCellValue('J1', "TOTAL SKS");
	    $excel->setActiveSheetIndex(0)->setCellValue('K1', "JENS_PENDAFTAR");
	    $excel->setActiveSheetIndex(0)->setCellValue('L1', "PLAGIASI");
	    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
	    $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
	    $excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
	    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
	    $this->db->join('tb_prodi', 'tb_prodi.id_prodi=tb_mahasiswa.id_prodi');
			$this->db->order_by('created_at', 'DESC');
		$mhs = $this->db->get_where('tb_mahasiswa', ['status_mhs'=> 'skripsi'])->result();
	    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
	    $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
	    foreach($mhs as $data){ // Lakukan looping pada variabel siswa
	      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
	      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nim);
	      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, strtoupper($data->nama));
	      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, strtoupper($data->tempat_lahir));
	      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tanggal_lahir);
	      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tahun_masuk);
	      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->jenjang);
	      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, strtoupper($data->nama_prodi));
	      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->ipk);
	      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->total_sks);
	      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, strtoupper($data->jenis_pendaftar));
	      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->turnitin);
	      
	      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	      
	      $no++; // Tambah 1 setiap kali looping
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    // Set width kolom
	    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
	    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(10); // Set width kolom B
	    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
	    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom D
	    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
	    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
	    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
	    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(8);
	    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(12);
	    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
	    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
	    
	    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
	    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
	    // Set orientasi kertas jadi LANDSCAPE
	    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	    // Set judul file excel nya
	    $excel->getActiveSheet(0)->setTitle("Laporan Data Mahasiswa");
	    $excel->setActiveSheetIndex(0);
	    // Proses file excel
	    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	    header('Content-Disposition: attachment; filename="DataMahasiswa'.time().'.xlsx"'); // Set nama file excel nya
	    header('Cache-Control: max-age=0');
	    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	    ob_end_clean();
	    $write->save('php://output');

	    // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		// header('Content-type: application/vnd.ms-excel');
	  
    }

}