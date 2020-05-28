<?php
require_once "koneksi/config.php";
?>
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-danger">
                <div class="panel-heading">
				<div class="col-sm-4">
                    <h3>Data Pelanggan [<?php echo $_GET['cari']; ?>]</h3>
				</div>
				
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
						
                        <a href="tcpdf/examples/lap_pelanggan.php?&t=<?php echo $_GET['cari']; 
                        if(isset($_POST['cari'])){
                            echo '&tgl1='.$_POST['tgl1'].'&tgl2='.$_POST['tgl2'];
                        }else{
                            $tgl_sekarang = date('Y-m-d');
                            echo '&tgl1='.$tgl_sekarang.'&tgl2='.$tgl_sekarang;
                        } ?>" class="btn btn-default btn-sm" target="_blank">
                            <i class="fa fa-print"> Cetak Pdf </i>
                        </a>

                        <a href="export_pelanggan.php?&t=<?php echo $_GET['cari']; 
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
                                    <th>Nama</th>
                                    <th>No. Inet</th>
                                    <th>Tanggal</th>
                                    <th>No. Hp</th>
                                    <th>Kota / Kab</th>
                                    <th>Paket</th>
                                    <th>Add On</th>
                                </tr>
                            </thead>
                            <tbody style="text-transform: uppercase;">
                                <?php
                                if(isset($_GET['cari'])){
                                    if(isset($_POST['cari'])){ 
                                        if($_GET['cari'] == 'Aktif'){
                                            $q_pelanggan = mysqli_query($con ,"SELECT * FROM tbl_pelanggan 
                                            inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
                                            inner join tbl_kecamatan on tbl_pelanggan.id_kecamatan = tbl_kecamatan.id_kecamatan 
                                            inner join tbl_kelurahan on tbl_pelanggan.id_kelurahan = tbl_kelurahan.id_kelurahan 
                                            inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket 
                                            where tbl_pelanggan.status = '$_GET[cari]' and tbl_pelanggan.tgl_aktivasi between '$_POST[tgl1]' and '$_POST[tgl2]'");

                                        }else{
                                            $q_pelanggan = mysqli_query($con ,"SELECT * FROM tbl_pelanggan 
                                            inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
                                            inner join tbl_kecamatan on tbl_pelanggan.id_kecamatan = tbl_kecamatan.id_kecamatan 
                                            inner join tbl_kelurahan on tbl_pelanggan.id_kelurahan = tbl_kelurahan.id_kelurahan 
                                            inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket 
                                            where tbl_pelanggan.status = '$_GET[cari]' and tbl_pelanggan.tgl_berhenti between '$_POST[tgl1]' and '$_POST[tgl2]'");

                                        }
                                        

                                    }else{
                                        $q_pelanggan = mysqli_query($con ,"SELECT * FROM tbl_pelanggan 
                                        inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
                                        inner join tbl_kecamatan on tbl_pelanggan.id_kecamatan = tbl_kecamatan.id_kecamatan 
                                        inner join tbl_kelurahan on tbl_pelanggan.id_kelurahan = tbl_kelurahan.id_kelurahan 
                                        inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket 
                                        where tbl_pelanggan.status = '$_GET[cari]'");
                                    }
                                
                                    $no = 1;
                                    while($pelanggan = mysqli_fetch_array($q_pelanggan)){
                                        if($_GET['cari'] == 'Aktif'){
                                            $f_tanggal = date("d-m-yy",strtotime($pelanggan['tgl_aktivasi']));
                                        }else{
                                            $f_tanggal = date("d-m-yy",strtotime($pelanggan['tgl_berhenti']));
                                        }
                                        echo "<tr class='odd gradeX'>
                                            <td>$no</td>
                                            <td>$pelanggan[nama_pelanggan]</td>
                                            <td>$pelanggan[no_inet]</td>
                                            <td>$f_tanggal</td>
                                            <td>$pelanggan[no_tlp]</td>
                                            <td>$pelanggan[nama_kab_kota]</td>
                                            <td>$pelanggan[nama_paket]</td>
                                            <td>";
                                            $q_upgrade = mysqli_query($con, "select * from tbl_upgrade 
                                            inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon 
                                            where tbl_upgrade.no_inet = '$pelanggan[no_inet]' and tbl_upgrade.status = 'Aktif' 
                                            or tbl_upgrade.no_inet = '$pelanggan[no_inet]' and tbl_upgrade.status = 'Menunggu Berhenti'");
                                            while($upgrade = mysqli_fetch_array($q_upgrade)){
                                                echo "[<span style='color:blue'>$upgrade[nama_layanan] </span>] ";
                                            }
                                        echo "</td>
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

    