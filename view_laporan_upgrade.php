<?php
require_once "koneksi/config.php";
$angka = $_GET['cari'];
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
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3>Data Pelanggan Upgrade [<?php echo $alias; ?>]</h3>
				
                    <div class="panel-heading text-right">
                    <div class="row">
                    <form method="POST" action="">
						<div class="col-sm-3">
                            <input type="date" class="form-control" name="tgl1" 
                            value="<?php 
                            if(isset($_POST['cari'])){
                                echo $_POST['tgl1'];
                            }else{
                                echo date("Y-m-d");
                            }
                                 ?>" required>
						</div>
						<div class="col-sm-3">
                        <input type="date" class="form-control" name="tgl2" 
                            value="<?php 
                            if(isset($_POST['cari'])){
                                echo $_POST['tgl2'];
                            }else{
                                echo date("Y-m-d");
                            }
                                 ?>" required>
						</div>
						<div class="col-sm-2 text-right">
                            <button type="submit" name="cari" class="btn btn-sm btn-warning"><i class="fa fa-search"></i> Cari</button>
						</div>
                    </form>
					</div>
					
						
                    <a href="tcpdf/examples/lap_upgrade.php?&t=<?php echo $_GET['cari']; 
                        if(isset($_POST['cari'])){
                            echo '&tgl1='.$_POST['tgl1'].'&tgl2='.$_POST['tgl2'];
                        }else{
                            $tgl_sekarang = date('Y-m-d');
                            echo '&tgl1='.$tgl_sekarang.'&tgl2='.$tgl_sekarang;
                        } ?>" class="btn btn-default btn-sm" target="_blank">
                            <i class="fa fa-print"> Cetak Pdf </i>
                        </a>

                        <a href="export_upgrade.php?&t=<?php echo $_GET['cari']; 
                        if(isset($_POST['cari'])){
                            echo '&tgl1='.$_POST['tgl1'].'&tgl2='.$_POST['tgl2'];
                        }else{
                            $tgl_sekarang = date('Y-m-d');
                            echo '&tgl1='.$tgl_sekarang.'&tgl2='.$tgl_sekarang;
                        } ?>" class="btn btn-success btn-sm" target="_blank">
                            <i class="fa fa-excel"> Cetak excel </i>
                        </a>
						
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Inet</th>
                                    <th>Nama</th>
                                    <th>AddOn</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody style="text-transform: uppercase;">
                                <?php
                                if(isset($_GET['cari'])){

                                   $q_upgrade = mysqli_query($con ,"SELECT tbl_upgrade.id_upgrade,tbl_pelanggan.no_inet, tbl_pelanggan.nama_pelanggan, tbl_addon.nama_layanan, tbl_addon.harga, tbl_upgrade.status FROM tbl_upgrade inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_pelanggan.no_inet inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon
                                    where tbl_upgrade.status = '$status'");
                                    $no = 1;
                                    while($upgrade = mysqli_fetch_array($q_upgrade)){
                                        $harga = number_format($upgrade['harga'],2,',','.');
                                    echo "<tr class='odd gradeX'>
                                            <td>$no</td>
                                            <td>$upgrade[no_inet]</td>
                                            <td>$upgrade[nama_pelanggan]</td>
                                            <td>$upgrade[nama_layanan]</td>
                                            <td>Rp. $harga</td>
                                            </tr>";
                                        $no++;
                                        } 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>

    