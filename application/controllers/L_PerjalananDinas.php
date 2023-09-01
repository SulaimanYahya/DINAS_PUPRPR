<?php
class L_PerjalananDinas extends CI_Controller
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

			$this->session->set_userdata('tanggal', $tanggal);
			$this->session->set_userdata('tujuan', $tujuan);

			$pdf = new exFPDF('p', 'mm', array(210, 330));
			$pdf->SetTitle('PERJALANAN DINAS');
			// membuat halaman baru


			$pdf->Output('I', 'PerjalananDinas-' . time() . '.pdf');
		} else {
			echo "GAGAL";
		}
	}
}
