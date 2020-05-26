<?php

include "../../koneksi/config.php";
$ket = $_GET[t];
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
$pdf->SetHeaderData( PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 13, PDF_MARGIN_RIGHT);
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
<h2>Laporan Data Gangguan $ket</h2>
OED;

$pdf->WriteHTMLCell(0,0,'','',$title,0,1,0,true,'C',true);


$table = '<table style="border:1px solid #000; padding:6px;">
		<tr style = "background-color:#ccc;">
			<th style="border:1px solid #000; width:50px;">No.</th>
			<th style="border:1px solid #000; width:150;">No. Tiket</th>
			<th style="border:1px solid #000; width:100;">Tgl. Lapor</th>
			<th style="border:1px solid #000; width:200;">Jenis</th>
			<th style="border:1px solid #000; width:400">Deskripsi</th>
		</tr>';

			$sql = mysqli_query($con,"SELECT tbl_gangguan.no_tiket_gangguan, tbl_gangguan.tgl_lapor, tbl_gangguan.jenis, tbl_gangguan.deskripsi, tbl_gangguan.status 
			FROM tbl_gangguan 
			inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_pelanggan.no_inet 
			where tbl_gangguan.status = '$ket' order by tbl_gangguan.tgl_lapor Desc");
			$no=1;
			while ($gangguan = mysqli_fetch_array($sql)) {
				$tgl = $gangguan['tgl_lapor'];
				$tgl_lapor = date('d/m/Y', strtotime($tgl));
								$table .='
								<tr>
									<td style="border:1px solid #000;">'.$no++.'</td>
									<td style="border:1px solid #000;">'.$gangguan['no_tiket_gangguan'].'</td>
									<td style="border:1px solid #000;">'.$tgl_lapor.'</td>
									<td style="border:1px solid #000;">'.$gangguan['jenis'].'</td>
									<td style="border:1px solid #000;">'.$gangguan['deskripsi'].'</td>
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