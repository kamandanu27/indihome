<?php

include "../../koneksi/config.php";
$ket = $_GET['t'];
$angka = $_GET['t'];
switch ($angka) {
	case 1:
        $alias = 'Permintaan';
        $status = 'Belum Aktif';
		break;
	case 2:
        $alias = 'Permintaan Berhenti';
        $status = 'Menunggu Berhenti';
		break;
	case 3:
        $alias = 'Aktif';
        $status = 'Aktif';
		break;
	case 4:
        $alias = 'Berhenti';
        $status = 'Berhenti';
		break;
}
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Kamandanu');
$pdf->SetTitle('Laporan Upgrade');
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
<h2>Laporan Data Pelanggan $alias Upgrade Addon</h2>
OED;

$pdf->WriteHTMLCell(0,0,'','',$title,0,1,0,true,'C',true);


$table = '<table style="border:1px solid #000; padding:6px;">
		<tr style = "background-color:#ccc;">
			<th style="border:1px solid #000; width:50px;">No.</th>
			<th style="border:1px solid #000; width:250;">Nama</th>
			<th style="border:1px solid #000; width:200;">No. Inet</th>
			<th style="border:1px solid #000; width:150;">Addon</th>
			<th style="border:1px solid #000; width:150;">Harga</th>
		</tr>';

				$sql = mysqli_query($con,"SELECT tbl_upgrade.id_upgrade,tbl_pelanggan.no_inet, tbl_pelanggan.nama_pelanggan, tbl_addon.nama_layanan, tbl_addon.harga, tbl_upgrade.status FROM tbl_upgrade inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_pelanggan.no_inet inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon
				where tbl_upgrade.status = '$status'");
			
				$no=1;
				while ($upgrade = mysqli_fetch_array($sql)) {
					$harga = number_format($upgrade['harga'],2,',','.');
					$table .='
					<tr>
						<td style="border:1px solid #000;">'.$no++.'</td>
						<td style="border:1px solid #000;">'.$upgrade['nama_pelanggan'].'</td>
						<td style="border:1px solid #000;">'.$upgrade['no_inet'].'</td>
						<td style="border:1px solid #000;">'.$upgrade['nama_layanan'].'</td>
						<td style="border:1px solid #000;">'.$harga.'</td>
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

$pdf->Output('Laporan Upgrade.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>