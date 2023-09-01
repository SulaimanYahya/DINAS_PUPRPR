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
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$rekanan = $_POST["rekanan"];
			$pemilik = $_POST["pemilik"];

			$this->session->set_userdata('pptk', $_POST["pptk"]);
			$this->session->set_userdata('rekanan', $rekanan);
			$this->session->set_userdata('pemilik', $pemilik);

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

			$pdf->SetFont('helvetica', '', 10);
			$pdf->AddFont('FontUTF8', '', 'Arimo-Regular.php');
			$pdf->AddFont('FontUTF8', 'B', 'Arimo-Bold.php');
			$pdf->AddFont('FontUTF8', 'I', 'Arimo-Italic.php');
			$pdf->AddFont('FontUTF8', 'BI', 'Arimo-BoldItalic.php');

			$table = new easyTable($pdf, '{10, 40, 20, 30, 10, 40, 10, 40, 30}', 'width:220; border-color:#000000; font-size:8; border:1; paddingY:2;');

			$table->rowStyle('align:{CCCCCCC}; font-style:B');
			$table->easyCell("No", 'rowspan:1');
			$table->easyCell("JENIS ALAT/BAHAN", 'rowspan:1');
			$table->easyCell("MERK", 'rowspan:1');
			$table->easyCell("UKURAN", 'rowspan:1');
			$table->easyCell("HARGA SATUAN", 'colspan:2');
			$table->easyCell("JUMLAH HARGA", 'colspan:2');
			$table->easyCell("KET.", 'rowspan:1');
			$table->printRow();

			$this->db->order_by('id', 'DESC');
			$datalap = $this->db->get_where('tb_lampiran_format1')->result_array();
			$no = 1;
			foreach ($datalap as $row) {

				$table->easyCell($no, 'align:C');
				$table->easyCell($row['bahan']);
				$table->easyCell($row['merk']);
				$table->easyCell($row['volume'] . " " . $row['satuan'], 'align:C');
				$table->easyCell("Rp", 'border: LBT');
				$table->easyCell(number_format($row['harga_satuan']), 'align:R; border: RBT');
				$table->easyCell("Rp", 'border: LBT');
				$table->easyCell(number_format($row['jml_harga']), 'align:R; border: RBT');
				$table->easyCell($row['ket']);
				$table->printRow(true);

				$no++;
			}

			$this->db->select('SUM(jml_harga) as total');
			$totalsmua = $this->db->get_where('tb_lampiran_format1')->row_array();
			$table->easyCell('');
			$table->easyCell('');
			$table->easyCell('');
			$table->easyCell('');
			$table->easyCell("", 'border: LBT');
			$table->easyCell('', 'align:R; border: RBT');
			$table->easyCell("Rp. ", 'border: LBT');
			$table->easyCell(number_format($totalsmua['total']), 'align:R; border: RBT; font-style:B');
			$table->easyCell('');
			$table->printRow(true);


			$table->endTable(10);

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

			$id_pegawai = $this->session->userdata("pptk");
			$pegawai = $this->db->get_where('tb_pegawai', ['id' => $id_pegawai])->row_array();


			$pdf->Cell(0, 4, strtoupper($pegawai['nama']), 0, 1, 'C'); //session nama pptk
			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(50, 4, 'PEMILIK', 0, 0, 'C');
			$pdf->Cell(70, 4, '', 0, 0, 'C');
			$pdf->Cell(0, 4, strtoupper($pegawai['nip']), 0, 1, 'C'); //session nip pptk



			$pdf->Output('I', 'NotaPesananATK-' . time() . '.pdf');
		} else {
			echo "GAGAL";
		}
	}
}
