<?php
require_once "koneksi/config.php";
$q_wilayah = mysqli_query($con, "select * from tbl_karyawan where tbl_karyawan.id_user = '$_SESSION[id_user]'");
$wilayah = mysqli_fetch_array($q_wilayah);
$id_wilayah = $wilayah['id_kab_kota'];

if(isset($_GET['v'])){
	if($_GET['v'] == 1){
    ?>
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3>Data Request Upgrade Addon</h3>
                    <div class="panel-heading text-right">
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
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-transform: uppercase;">
                                <?php 
                                $q_upgrade = mysqli_query($con ,"SELECT tbl_upgrade.id_upgrade,tbl_pelanggan.no_inet, tbl_pelanggan.nama_pelanggan, tbl_addon.nama_layanan, tbl_addon.harga, tbl_upgrade.status FROM tbl_upgrade inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_pelanggan.no_inet inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon
                                where tbl_pelanggan.id_kab_kota = '$id_wilayah' and tbl_upgrade.status = 'Belum Aktif'");
                                $no = 1;
                                while($upgrade = mysqli_fetch_array($q_upgrade)){
                                    echo "<tr class='odd gradeX'>
                                        <td>$no</td>
                                        <td>$upgrade[no_inet]</td>
                                        <td>$upgrade[nama_pelanggan]</td>
                                        <td>$upgrade[nama_layanan]</td>
                                        <td><a href='aksi_upgrade.php?&act=aktifkan&id=$upgrade[id_upgrade]&v=1' class='btn btn-info btn-xs'>
                                        <i class='fa fa-check'></i> Aktifkan</a></td>
                                        <td>
                                            <a href='aksi_upgrade.php?&act=h&id=$upgrade[id_upgrade]&v=1' class='btn btn-danger btn-xs'>
                                            <i class='fa fa-trash'></i> Hapus</a>
                                        </td>
                                    </tr>";
                                $no++;
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
    <?php 
    }
    if($_GET['v'] == 2){
        ?>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3>Data Pelanggan Aktif Layanan Addon</h3>
                        <div class="panel-heading text-right">
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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody style="text-transform: uppercase;">
                                    <?php 
                                    $q_upgrade = mysqli_query($con ,"SELECT tbl_upgrade.id_upgrade,tbl_pelanggan.no_inet, tbl_pelanggan.nama_pelanggan, tbl_addon.nama_layanan, tbl_addon.harga, tbl_upgrade.status FROM tbl_upgrade inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_pelanggan.no_inet inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon
                                    where tbl_pelanggan.id_kab_kota = '$id_wilayah' and tbl_upgrade.status = 'Aktif'");
                                    $no = 1;
                                    while($upgrade = mysqli_fetch_array($q_upgrade)){
                                        echo "<tr class='odd gradeX'>
                                            <td>$no</td>
                                            <td>$upgrade[no_inet]</td>
                                            <td>$upgrade[nama_pelanggan]</td>
                                            <td>$upgrade[nama_layanan]</td>
                                            <td><a href='aksi_upgrade.php?&act=nonaktifkan&id=$upgrade[id_upgrade]&v=2' class='btn btn-info btn-xs'>
                                            <i class='fa fa-check'></i> Non Aktifkan</a></td>
                                        </tr>";
                                    $no++;
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
        <?php 
    }
    if($_GET['v'] == 3){
        ?>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3>Data Request Berhenti Layanan Addon</h3>
                        <div class="panel-heading text-right">
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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody style="text-transform: uppercase;">
                                    <?php 
                                    $q_upgrade = mysqli_query($con ,"SELECT tbl_upgrade.id_upgrade,tbl_pelanggan.no_inet, tbl_pelanggan.nama_pelanggan, tbl_addon.nama_layanan, tbl_addon.harga, tbl_upgrade.status FROM tbl_upgrade inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_pelanggan.no_inet inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon
                                    where tbl_pelanggan.id_kab_kota = '$id_wilayah' and tbl_upgrade.status = 'Menunggu Berhenti'");
                                    $no = 1;
                                    while($upgrade = mysqli_fetch_array($q_upgrade)){
                                        echo "<tr class='odd gradeX'>
                                            <td>$no</td>
                                            <td>$upgrade[no_inet]</td>
                                            <td>$upgrade[nama_pelanggan]</td>
                                            <td>$upgrade[nama_layanan]</td>
                                            <td><a href='aksi_upgrade.php?&act=nonaktifkan&id=$upgrade[id_upgrade]&v=3' class='btn btn-info btn-xs'>
                                            <i class='fa fa-check'></i> Non Aktifkan</a></td>
                                        </tr>";
                                    $no++;
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
        <?php 
    }
    if($_GET['v'] == 4){
        ?>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3>Data Pelanggan Berhenti Layanan Addon</h3>
                        <div class="panel-heading text-right">
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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody style="text-transform: uppercase;">
                                    <?php 
                                    $q_upgrade = mysqli_query($con ,"SELECT tbl_upgrade.id_upgrade,tbl_pelanggan.no_inet, tbl_pelanggan.nama_pelanggan, tbl_addon.nama_layanan, tbl_addon.harga, tbl_upgrade.status FROM tbl_upgrade inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_pelanggan.no_inet inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon
                                    where tbl_pelanggan.id_kab_kota = '$id_wilayah' and tbl_upgrade.status = 'Berhenti'");
                                    $no = 1;
                                    while($upgrade = mysqli_fetch_array($q_upgrade)){
                                        echo "<tr class='odd gradeX'>
                                            <td>$no</td>
                                            <td>$upgrade[no_inet]</td>
                                            <td>$upgrade[nama_pelanggan]</td>
                                            <td>$upgrade[nama_layanan]</td>
                                            <td><a href='aksi_upgrade.php?&act=aktifkan&id=$upgrade[id_upgrade]&v=4' class='btn btn-info btn-xs'>
                                            <i class='fa fa-check'></i> Aktifkan</a></td>
                                        </tr>";
                                    $no++;
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
        <?php 
    }
    
}
?>

    