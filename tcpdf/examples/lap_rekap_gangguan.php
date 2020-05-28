<?php

include "../../koneksi/config.php";
$t1 = $_GET['t1'];
$t2 = $_GET['t2'];

$f_t1 = date('d/m/Y', strtotime($t1));
$f_t2 = date('d/m/Y', strtotime($t2));

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Kamandanu');
$pdf->SetTitle('Laporan Rekap Gangguan');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 9);

// add a page
$pdf->AddPage('L');

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$title = <<<OED
<h2><u>Laporan Rekap Gangguan</u></h2>
OED;

$title_tanggal = <<<OED
<h2>Tanggal $f_t1 s.d $f_t2</h2>
OED;

$pdf->WriteHTMLCell(0,0,'','',$title,0,1,0,true,'C',true);
$pdf->WriteHTMLCell(0,0,'','',$title_tanggal,0,1,0,true,'C',true);


$table = '<table style="border:1px solid #000; padding:6px;">
		<tr style = "background-color:#ccc;">
			<th style="border:1px solid #000; width:50px;" rowspan="2">No.</th>
			<th style="border:1px solid #000; width:300px;" rowspan="2">Wilayah</th>
			<th style="border:1px solid #000; width:300px;" colspan="3">Jenis Gangguan</th>
			<th style="border:1px solid #000; width:300px;" colspan="3">Status Gangguan</th>
		</tr>
		<tr style = "background-color:#ccc;">
			<th style="border:1px solid #000; width:100px;">Internet</th>
			<th style="border:1px solid #000; width:100px;">Telepon</th>
			<th style="border:1px solid #000; width:100px;">Usee Tv</th>
			<th style="border:1px solid #000; width:100px;">Dalam Antrian</th>
			<th style="border:1px solid #000; width:100px;">Dalam Proses</th>
			<th style="border:1px solid #000; width:100px;">Terselesaikan</th>
		</tr>';

$sql_kab_kota = mysqli_query($con,"SELECT * FROM tbl_kab_kota where id_provinsi = '63' ORDER BY id_kab_kota ASC");
$no = 1;                   
while($rs_kab_kota = mysqli_fetch_array($sql_kab_kota)){
	$q_internet = mysqli_query($con, "SELECT count(*) as j_internet FROM tbl_gangguan 
	inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_pelanggan.no_inet 
	WHERE tbl_pelanggan.id_kab_kota = '$rs_kab_kota[id_kab_kota]' and tbl_gangguan.jenis LIKE '%Internet%' and tbl_gangguan.tgl_lapor between '$t1' and '$t2'");
	$internet = mysqli_fetch_array($q_internet);
	if($internet['j_internet'] == 0){
		$j_internet = '-';
	}else{
		$j_internet = $internet['j_internet'];
	}

	$q_telepon = mysqli_query($con, "SELECT count(*) as j_telepon FROM tbl_gangguan 
	inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_pelanggan.no_inet 
	WHERE tbl_pelanggan.id_kab_kota = '$rs_kab_kota[id_kab_kota]' and tbl_gangguan.jenis LIKE '%telepon%' and tbl_gangguan.tgl_lapor between '$t1' and '$t2'");
	$telepon = mysqli_fetch_array($q_telepon);
	if($telepon['j_telepon'] == 0){
		$j_telepon = '-';
	}else{
		$j_telepon = $telepon['j_telepon'];
	}

	$q_tv = mysqli_query($con, "SELECT count(*) as j_tv FROM tbl_gangguan 
	inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_pelanggan.no_inet 
	WHERE tbl_pelanggan.id_kab_kota = '$rs_kab_kota[id_kab_kota]' and tbl_gangguan.jenis LIKE '%Usee Tv%' and tbl_gangguan.tgl_lapor between '$t1' and '$t2'");
	$tv = mysqli_fetch_array($q_tv);
	if($tv['j_tv'] == 0){
		$j_tv = '-';
	}else{
		$j_tv = $tv['j_tv'];
	}

	$q_antri = mysqli_query($con, "SELECT count(*) as j_antri FROM tbl_gangguan 
	inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_pelanggan.no_inet 
	WHERE tbl_pelanggan.id_kab_kota = '$rs_kab_kota[id_kab_kota]' and tbl_gangguan.status LIKE '%Antri%' and tbl_gangguan.tgl_lapor between '$t1' and '$t2'");
	$antri = mysqli_fetch_array($q_antri);
	if($antri['j_antri'] == 0){
		$j_antri = '-';
	}else{
		$j_antri = $antri['j_antri'];
	}

	$q_proses = mysqli_query($con, "SELECT count(*) as j_proses FROM tbl_gangguan 
	inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_pelanggan.no_inet 
	WHERE tbl_pelanggan.id_kab_kota = '$rs_kab_kota[id_kab_kota]' and tbl_gangguan.status LIKE '%proses%' and tbl_gangguan.tgl_lapor between '$t1' and '$t2'");
	$proses = mysqli_fetch_array($q_proses);
	if($proses['j_proses'] == 0){
		$j_proses = '-';
	}else{
		$j_proses = $proses['j_proses'];
	}

	$q_selesai = mysqli_query($con, "SELECT count(*) as j_selesai FROM tbl_gangguan 
	inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_pelanggan.no_inet 
	WHERE tbl_pelanggan.id_kab_kota = '$rs_kab_kota[id_kab_kota]' and tbl_gangguan.status LIKE '%Selesai%' and tbl_gangguan.tgl_lapor between '$t1' and '$t2'");
	$selesai = mysqli_fetch_array($q_selesai);
	if($selesai['j_selesai'] == 0){
		$j_selesai = '-';
	}else{
		$j_selesai = $selesai['j_selesai'];
	}

	$table .= '<tr>
			<td style="border:1px solid #000;">'.$no++.'</td>
			<td style="border:1px solid #000;">'.$rs_kab_kota['nama_kab_kota'].'</td>
			<td style="border:1px solid #000;">'.$j_internet.'</td>
			<td style="border:1px solid #000;">'.$j_telepon.'</td>
			<td style="border:1px solid #000;">'.$j_tv.'</td>
			<td style="border:1px solid #000;">'.$j_antri.'</td>
			<td style="border:1px solid #000;">'.$j_proses.'</td>
			<td style="border:1px solid #000;">'.$j_selesai.'</td>
		</tr>';
}
			
				
$table .= '</table>';

$pdf->WriteHTMLCell(0,0,'','',$table,0,1,0,true,'C',true);

$today = date("d-m-Y");
$ttd = '<table>';
$ttd .= '
		<tr style="padding:30px;">
			<th>Mengetahui</th>
			<th></th>
			<th>Banjarmasin '.$today.'</th>
		</tr>
		<tr>
			<th>Manager</th>
			<th></th>
			<th>Kepala Bagian</th>
		</tr>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
		<tr style="padding:30px;">
			<th style="padding:30px;"></th>
			<th></th>
			<th></th>
		</tr>
		<tr style="padding:2px;">
			<th><u>Reza Abdillah</u></th>
			<th></th>
			<th><u>Riyan Maulana</u></th>
		</tr>
		<tr style="padding:1px;">
			<th>NIP. 2088913340012</th>
			<th></th>
			<th>NIP. 2088913340033</th>
		</tr>';

$ttd .= '</table>';
$pdf->WriteHTMLCell(0,0,'','',$ttd,0,1,0,true,'C',true);



// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();
//Close and output PDF document
//$judul	= '/Penawaran'.'_'.$idsuplier.'.pdf';
//$pdf->IncludeJS("print();");
//$pdf->Output(__DIR__.'/LaporanPengaduan.pdf', 'FD');
//$pdf->Output($judul, 'I');

$pdf->Output('Laporan Gangguan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>