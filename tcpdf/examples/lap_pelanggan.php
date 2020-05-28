<?php

include "../../koneksi/config.php";
$ket = $_GET['t'];
$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Kamandanu');
$pdf->SetTitle('Laporan Pelanggan');
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
<h2>Laporan Data Pelanggan $ket</h2>
OED;

$pdf->WriteHTMLCell(0,0,'','',$title,0,1,0,true,'C',true);


$table = '<table style="border:1px solid #000; padding:6px;">
		<tr style = "background-color:#ccc;">
			<th style="border:1px solid #000; width:30px;">No.</th>
			<th style="border:1px solid #000; width:150;">Nama</th>
			<th style="border:1px solid #000; width:100;">No. Inet</th>
			<th style="border:1px solid #000; width:80;">Tanggal</th>
			<th style="border:1px solid #000; width:95;">No. Hp</th>
			<th style="border:1px solid #000; width:150;">Kota / Kab</th>
			<th style="border:1px solid #000; width:150;">Kecamatan</th>
			<th style="border:1px solid #000; width:150;">Kelurahan</th>
		</tr>';

			if($ket == 'Aktif'){
				$sql = mysqli_query($con,"SELECT * FROM tbl_pelanggan 
				inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
				inner join tbl_kecamatan on tbl_pelanggan.id_kecamatan = tbl_kecamatan.id_kecamatan 
				inner join tbl_kelurahan on tbl_pelanggan.id_kelurahan = tbl_kelurahan.id_kelurahan 
				inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket 
				where tbl_pelanggan.status = '$ket' and tbl_pelanggan.tgl_aktivasi between '$tgl1' and '$tgl2'");

			}else{
				$sql = mysqli_query($con,"SELECT * FROM tbl_pelanggan 
				inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
				inner join tbl_kecamatan on tbl_pelanggan.id_kecamatan = tbl_kecamatan.id_kecamatan 
				inner join tbl_kelurahan on tbl_pelanggan.id_kelurahan = tbl_kelurahan.id_kelurahan 
				inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket 
				where tbl_pelanggan.status = '$ket' and tbl_pelanggan.tgl_berhenti between '$tgl1' and '$tgl2'");
			}
			
			$no=1;
			while ($pelanggan = mysqli_fetch_array($sql)) {
				if($_GET['cari'] == 'Aktif'){
					$f_tanggal = date("d-m-yy",strtotime($pelanggan['tgl_aktivasi']));
				}else{
					$f_tanggal = date("d-m-yy",strtotime($pelanggan['tgl_berhenti']));
				}
								$table .='
								<tr>
									<td style="border:1px solid #000; width:30;">'.$no++.'</td>
									<td style="border:1px solid #000; width:150;">'.$pelanggan['nama_pelanggan'].'</td>
									<td style="border:1px solid #000;">'.$pelanggan['no_inet'].'</td>
									<td style="border:1px solid #000;">'.$f_tanggal.'</td>
									<td style="border:1px solid #000;">'.$pelanggan['no_tlp'].'</td>
									<td style="border:1px solid #000;">'.$pelanggan['nama_kab_kota'].'</td>
									<td style="border:1px solid #000;">'.$pelanggan['nama_kelurahan'].'</td>
									<td style="border:1px solid #000;">'.$pelanggan['nama_kecamatan'].'</td>
								</tr>';
								
								}
			
				
$table .= '</table>';

$pdf->WriteHTMLCell(0,0,'','',$table,0,1,0,true,'C',true);




// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();
//Close and output PDF document
//$judul	= '/Penawaran'.'_'.$idsuplier.'.pdf';
//$pdf->IncludeJS("print();");
//$pdf->Output(__DIR__.'/LaporanPengaduan.pdf', 'FD');
//$pdf->Output($judul, 'I');

$pdf->Output('Laporan Pengaduan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>