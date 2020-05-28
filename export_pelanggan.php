<?php 
require_once "koneksi/config.php";
$status = $_GET['t'];
$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

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
	header("Content-Disposition: attachment; filename=Data Pelanggan.xls");
	?>

	<center>
		<h1>Data Pelanggan <?php echo $status ?></h1>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>No. Internet</th>
			<th>Nama Pelanggan</th>
			<th>No. Telp</th>
			<?php 
			if($status == 'Aktif'){
				echo "<th>Tanggal Pasang</th>";
			}else{
				echo "<th>Tanggal Berhenti</th>";
			}
			?>
			<th>Kota / Kabupaten</th>
			<th>Status</th>
		</tr>
		<?php 

		// menampilkan data pegawai
		if($status == 'Aktif'){
			$data = mysqli_query($con,"select * from tbl_pelanggan 
			inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota where status = '$status' and tbl_pelanggan.tgl_aktivasi between '$tgl1' and '$tgl2'");
		}else{
			$data = mysqli_query($con,"select * from tbl_pelanggan 
			inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota where status = '$status' and tbl_pelanggan.tgl_berhenti between '$tgl1' and '$tgl2'");

		}
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['no_inet']; ?></td>
			<td><?php echo $d['nama_pelanggan']; ?></td>
			<td><?php echo $d['no_tlp']; ?></td>
			<td><?php echo $d['tgl_aktivasi']; ?></td>
			<td><?php echo $d['nama_kab_kota']; ?></td>
			<td><?php echo $d['status']; ?></td>
		</tr>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>