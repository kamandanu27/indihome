<?php
header('Content-Type: application/json');

require_once "koneksi/config.php";

$sqlQuery = mysqli_query($con, "SELECT tbl_kab_kota.id_kab_kota as a , tbl_kab_kota.nama_kab_kota as b, (SELECT COUNT(*) FROM tbl_pelanggan WHERE tbl_pelanggan.id_kab_kota = a )as jumlah from tbl_pelanggan RIGHT JOIN tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota where tbl_kab_kota.id_provinsi = '63' GROUP by tbl_kab_kota.id_kab_kota");

$data = array();
foreach ($sqlQuery as $row) {
	$data[] = $row;
}

mysqli_close($con);


//$datax = array('data' => $data);
echo json_encode($data);
?>