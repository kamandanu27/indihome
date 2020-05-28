<?php 
require_once "koneksi/config.php";
$status = $_GET['t'];
$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

$angka = $_GET['t'];
switch ($angka) {
	case 1:
        $alias = 'Permintaan Upgrade';
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

?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Data Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Upgrade.xls");
	?>

	<center>
		<h1 style="font-size:20px;">Data Pelanggan Upgrade [ <?php echo $alias ?> ]</h1>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>No. Internet</th>
			<th>Nama Pelanggan</th>
			<th>Kota / Kabupaten</th>
			<th>Add On</th>
			<?php 
			if($status == 'Aktif'){
				echo "<th>Tanggal Pasang</th>";
			}else{
				echo "<th>Tanggal Berhenti</th>";
			}
			?>
			<th>Status</th>
		</tr>
		<?php 

		// menampilkan data upgrade
		if($status == 'Aktif' or $status == 'Menunggu Berhenti'){
			$data = mysqli_query($con,"select tbl_upgrade.no_inet, tbl_pelanggan.nama_pelanggan, tbl_kab_kota.nama_kab_kota, tbl_addon.nama_layanan, tbl_upgrade.tgl_berhenti, tbl_upgrade.tgl_aktivasi, tbl_upgrade.status 
			from tbl_upgrade  
			inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_pelanggan.no_inet 
			inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
			inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon 
			where tbl_upgrade.status = '$status' and tbl_upgrade.tgl_aktivasi between '$tgl1' and '$tgl2'");
		}else if($status == 'Berhenti'){
			$data = mysqli_query($con,"select tbl_upgrade.no_inet, tbl_pelanggan.nama_pelanggan, tbl_kab_kota.nama_kab_kota, tbl_addon.nama_layanan, tbl_upgrade.tgl_berhenti, tbl_upgrade.tgl_aktivasi, tbl_upgrade.status 
			from tbl_upgrade 
			inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_pelanggan.no_inet 
			inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
			inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon 
			where tbl_upgrade.status = '$status' and tbl_upgrade.tgl_berhenti between '$tgl1' and '$tgl2'");

		}else{
			$data = mysqli_query($con,"select tbl_upgrade.no_inet, tbl_pelanggan.nama_pelanggan, tbl_kab_kota.nama_kab_kota, tbl_addon.nama_layanan, tbl_upgrade.tgl_berhenti, tbl_upgrade.tgl_aktivasi, tbl_upgrade.status 
			from tbl_upgrade 
			inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_pelanggan.no_inet 
			inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
			inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon 
			where tbl_upgrade.status = '$status' and tbl_upgrade.tgl_berhenti between '$tgl1' and '$tgl2'");

		}
		$no = 1;
		while($d = mysqli_fetch_array($data)){
			if($status == 'Aktif' or $status == 'Menunggu Berhenti'){
				$f_tanggal = date("d-m-yy",strtotime($d['tgl_aktivasi']));
			}else if($status == 'Berhenti'){
				$f_tanggal = date("d-m-yy",strtotime($d['tgl_berhenti']));
			}else{
				$f_tanggal = '-';
			}
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['no_inet']; ?></td>
			<td><?php echo $d['nama_pelanggan']; ?></td>
			<td><?php echo $d['nama_kab_kota']; ?></td>
			<td><?php echo $d['nama_layanan']; ?></td>
			<td><?php echo $f_tanggal ?></td>
			<td><?php echo $d['status']; ?></td>
		</tr>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>