<?php
header('Content-Type: application/json');

require_once "koneksi/config.php";

$sqlQuery = mysqli_query($con, "SELECT tbl_kab_kota.id_kab_kota as id_kota , tbl_kab_kota.nama_kab_kota as nama_kota, (select sum(tbl_paket.harga) from tbl_pelanggan 
inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket
where tbl_pelanggan.id_kab_kota = id_kota and tbl_pelanggan.status = 'Aktif' 
or tbl_pelanggan.id_kab_kota = id_kota and tbl_pelanggan.status = 'Menunggu Berhenti')as jumlah from tbl_pelanggan RIGHT JOIN tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota where tbl_kab_kota.id_provinsi = '63' GROUP by tbl_kab_kota.id_kab_kota");

$data = array();
$i = 0;
foreach ($sqlQuery as $row) {
	$data[] = $row;

	$q_upgrade = mysqli_query($con, "SELECT sum(tbl_addon.harga) as total FROM tbl_upgrade 
	inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_pelanggan.no_inet 
	inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon
	where tbl_pelanggan.id_kab_kota = '$row[id_kota]' and tbl_upgrade.status = 'Aktif' 
	or tbl_pelanggan.id_kab_kota = '$row[id_kota]' and tbl_upgrade.status = 'Menunggu Berhenti'");
	$upgrade = mysqli_fetch_array($q_upgrade);
	$bayar_upgrade = $upgrade['total'];

	$data[$i]['total'] = $bayar_upgrade + $row['jumlah'];
	
	$i++;
}

mysqli_close($con);

echo json_encode($data);
?>