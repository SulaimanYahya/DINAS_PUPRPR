<?php

function tanggalIndonesiaTanpaDay($date)
{
	$days = [
		'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
	];

	$months = [
		'', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
	];

	$dateComponents = explode('-', $date);
	$year = $dateComponents[0];
	$month = (int)$dateComponents[1];
	$day = (int)$dateComponents[2];

	$timestamp = mktime(0, 0, 0, $month, $day, $year);
	$dayOfWeek = date('w', $timestamp);

	return $months[$month] . ' ' . $year;
}

function HanyaBulan($date)
{

	$months = [
		'', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
	];

	$dateComponents = explode('-', $date);
	$year = $dateComponents[0];
	$month = (int)$dateComponents[1];

	$timestamp = mktime(0, 0, 0, $month, $year);

	return $months[$month];
}

function tanggalIndonesia($date)
{
	$days = [
		'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
	];

	$months = [
		'', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
	];

	$dateComponents = explode('-', $date);
	$year = $dateComponents[0];
	$month = (int)$dateComponents[1];
	$day = (int)$dateComponents[2];

	$timestamp = mktime(0, 0, 0, $month, $day, $year);
	$dayOfWeek = date('w', $timestamp);

	return $day . ' ' . $months[$month] . ' ' . $year;
}

function haritanggalIndonesia($date)
{
	$days = [
		'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
	];

	$months = [
		'', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
	];

	$dateComponents = explode('-', $date);
	$year = $dateComponents[0];
	$month = (int)$dateComponents[1];
	$day = (int)$dateComponents[2];

	$timestamp = mktime(0, 0, 0, $month, $day, $year);
	$dayOfWeek = date('w', $timestamp);

	return $days[$dayOfWeek] . ', ' . $day . ' ' . $months[$month] . ' ' . $year;
}

function penyebut($nilai)
{
	$nilai = abs($nilai);
	$huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
	$temp = "";
	if ($nilai < 12) {
		$temp = " " . $huruf[$nilai];
	} else if ($nilai < 20) {
		$temp = penyebut($nilai - 10) . " BELAS";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai / 10) . " PULUH" . penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " SERATUS" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai / 100) . " RATUS" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " SERIBU" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai / 1000) . " RIBU" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai / 1000000) . " JUTA" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai / 1000000000) . " MILIYAR" . penyebut(fmod($nilai, 1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai / 1000000000000) . " TRILIYUN" . penyebut(fmod($nilai, 1000000000000));
	}
	return $temp;
}


function terbilang($nilai)
{
	if ($nilai < 0) {
		$hasil = "MINUS " . trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai)) . " RUPIAH";
	}
	return $hasil;
}

function angkaToHuruf($nilai)
{
	if ($nilai < 0) {
		$hasil = "MINUS " . trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}
	return $hasil;
}

function getData($table)
{
	$ci = get_instance();
	return $ci->db->get($table)->result();
}

function masterGetId($select, $table, $where, $id)
{
	$ci = get_instance();
	$ci->db->select($select);
	$data = $ci->db->get_where($table, [$where => $id])->row_array();
	return $data[$select];
}

function getProgram($selected = '')
{
	$ci = get_instance();
	$query = $ci->db->get('tb_jenis_program')->result();
	$list = '';
	$no = 1;
	foreach ($query as $r) {
		$sel = ($r->id_jenis_program == $selected) ? ' selected' : '';
		$list .= "<option value='$r->id_jenis_program' $sel> $no. $r->nama_jenis_program</option>";
		$no++;
	}
	return $list;
}

function getKegiatan($selected = '')
{
	$ci = get_instance();
	$query = $ci->db->get('tb_jenis_kegiatan')->result();
	$list = '';
	$no = 1;
	foreach ($query as $r) {
		$sel = ($r->id_jenis_kegiatan == $selected) ? ' selected' : '';
		$list .= "<option value='$r->id_jenis_kegiatan' $sel> $no. $r->nama_jenis_kegiatan</option>";
		$no++;
	}
	return $list;
}

function getSubKegiatan($selected = 0)
{
	$ci = get_instance();
	$query = $ci->db->get('tb_jenis_sub_kegiatan')->result();
	$list = '';
	$no = 1;
	foreach ($query as $r) {
		$sel = ($r->id_jenis_sub_kegiatan == $selected) ? ' selected' : '';
		$list .= "<option value='$r->id_jenis_sub_kegiatan' $sel> $no. $r->nama_jenis_sub_kegiatan</option>";
		$no++;
	}
	return $list;
}


// ENCRYPT STRING
function enkrip($string, $key = 258456)
{
	$result = '';
	for ($i = 0, $k = strlen($string); $i < $k; $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key)) - 1, 1);
		$char = chr(ord($char) + ord($keychar));
		$result .= $char;
	}
	return base64_encode($result);
}

// DECRYPT STRING
function dekrip($string, $key = 258456)
{
	$result = '';
	$string = base64_decode($string);
	for ($i = 0, $k = strlen($string); $i < $k; $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key)) - 1, 1);
		$char = chr(ord($char) - ord($keychar));
		$result .= $char;
	}
	return $result;
}

function cleanKarakter($angka)
{
	$result = preg_replace("/[^0-9]/", "", $angka);
	return $result;
}

function getKodeSPM()
{
	$ci = get_instance();
	$ci->db->select_max('id');
	$nilai_max_id = $ci->db->get('tb_kode')->row();

	$no = $nilai_max_id->id + 1;

	$waktu = date("Y-m-d H:i:s");
	$dateTime = new DateTime($waktu);
	$detik = $dateTime->format("is");

	$tanggal = date('dmy');
	// $hapus_karakter = str_replace('/', '', $tanggal);
	$hasil = "SPM-" . $tanggal . '.' . $detik . "-$no";

	return enkrip($hasil);
}

function getKodePembayaran()
{
	$ci = get_instance();
	$ci->db->select_max('id');
	$nilai_max_id = $ci->db->get('tb_pembayaran')->row();

	$no = $nilai_max_id->id + 1;

	$waktu = date("Y-m-d H:i:s");
	$dateTime = new DateTime($waktu);
	$detik = $dateTime->format("is");

	$tanggal = date('dmy');
	// $hapus_karakter = str_replace('/', '', $tanggal);
	$hasil = "BYR-" . $tanggal . '.' . $detik . "-$no";

	return enkrip($hasil);
}

function no_resubmit()
{
?>
	<script>
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
<?php
	header("Refresh:0");
}
