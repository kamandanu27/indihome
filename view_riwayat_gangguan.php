<?php
require_once "koneksi/config.php";
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'pelanggan'){
        if(isset($_GET['module'])){
            if($_GET['module'] == 'riwayat_gangguan'){
                if(isset($_GET['cari'])){
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3>Data Lapor Gangguan Layanan [<?php echo $_GET['cari']; ?>]</h3>
                                    <div class="panel-heading text-right">
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>No. Tiket</th>
                                                    <th style="width:80px">Tgl Lapor</th>
                                                    <th>Jenis</th>
                                                    <th>Deskripsi</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-transform: uppercase;">
                                                <?php
                                                $q_gangguan = mysqli_query($con ,"SELECT * FROM tbl_gangguan where status = '$_GET[cari]' order by tgl_lapor Desc");
                                                $no = 1;
                                                while($gangguan = mysqli_fetch_array($q_gangguan)){
                                                    $tgl = $gangguan['tgl_lapor'];
                                                    $tgl_lapor = date('d/m/Y', strtotime($tgl));
                                                    echo "<tr class='odd gradeX'>
                                                        <td>$no</td>
                                                        <td>$gangguan[no_tiket_gangguan]</td>
                                                        <td>$tgl_lapor</td>
                                                        <td>$gangguan[jenis]</td>
                                                        <td>$gangguan[deskripsi]</td>
                                                        <td>$gangguan[status]</td>
                                                        <td>";
                                                        if($gangguan['status'] == 'Proses'){
                                                            echo "<a href='aksi_lapor_gangguan.php?&act=s&id=$gangguan[no_tiket_gangguan]' class='btn btn-info btn-xs'><i class='fa fa-check'></i> Selesai</a>";}
                                                    echo "</td>
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
                else{
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                Proses Laporan Gangguan Layanan
                                </div>

                                <div class="panel-body"> 
                                        <div class="panel">
                                            <a href="main.php?module=riwayat_gangguan&cari=Antri" class="btn btn-danger btn-block">Laparan Gangguan Anda Sedang Dalam Antrin</a>
                                        </div>
                                        <div class="panel">
                                            <a href="main.php?module=riwayat_gangguan&cari=Proses" class="btn btn-warning btn-block">Laporan Gangguan Anda Sedang Dalam Proses</a>
                                        </div>
                                        <div class="panel">
                                            <a href="main.php?module=riwayat_gangguan&cari=Selesai" class="btn btn-success btn-block">Laporan Gangguan Anda Sudah Terselesaikan</a>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                <?php 
                }
            }
        }
    }//akhir pelanggan


    if($_SESSION['level'] == 'karyawan'){
        $q_wilayah = mysqli_query($con, "select * from tbl_karyawan where tbl_karyawan.id_user = '$_SESSION[id_user]'");
        $wilayah = mysqli_fetch_array($q_wilayah);
        $id_wilayah = $wilayah['id_kab_kota'];

        if(isset($_GET['module'])){
            if($_GET['module'] == 'layanan_gangguan'){
                if(isset($_GET['cari'])){
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3>Data Lapor Gangguan Layanan [<?php echo $_GET['cari']; ?>]</h3>
                                    <div class="panel-heading text-right">
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>No. Tiket</th>
                                                    <th style="width:80px">Tgl Lapor</th>
                                                    <th>Jenis</th>
                                                    <th>Deskripsi</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-transform: uppercase;">
                                                <?php
                                                $q_gangguan = mysqli_query($con ,"SELECT tbl_gangguan.no_tiket_gangguan, tbl_gangguan.tgl_lapor, tbl_gangguan.jenis, tbl_gangguan.deskripsi, tbl_gangguan.status FROM tbl_gangguan 
                                                inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_pelanggan.no_inet 
                                                where tbl_gangguan.status = '$_GET[cari]' and tbl_pelanggan.id_kab_kota = '$id_wilayah' order by tbl_gangguan.tgl_lapor Desc");
                                                $no = 1;
                                                while($gangguan = mysqli_fetch_array($q_gangguan)){
                                                    $tgl = $gangguan['tgl_lapor'];
                                                    $tgl_lapor = date('d/m/Y', strtotime($tgl));
                                                    echo "<tr class='odd gradeX'>
                                                        <td>$no</td>
                                                        <td>$gangguan[no_tiket_gangguan]</td>
                                                        <td>$tgl_lapor</td>
                                                        <td>$gangguan[jenis]</td>
                                                        <td>$gangguan[deskripsi]</td>
                                                        <td>$gangguan[status]</td>
                                                        <td>";
                                                        if($gangguan['status'] == 'Antri'){
                                                            echo "<a href='aksi_lapor_gangguan.php?&act=p&id=$gangguan[no_tiket_gangguan]' class='btn btn-info btn-xs'><i class='fa fa-check'></i> Proses</a>";}
                                                    echo "</td>
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
        }
    }//akhir pegawai

    if($_SESSION['level'] == 'admin'){

        if(isset($_GET['module'])){
            if($_GET['module'] == 'layanan_gangguan'){
                if(isset($_GET['cari'])){
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3>Data Lapor Gangguan Layanan [<?php echo $_GET['cari']; ?>]</h3>
                                    <div class="panel-heading text-right">
                                        <a href="tcpdf/examples/lap_gangguan.php?&t=<?php echo $_GET['cari']; ?>" class="btn btn-default btn-sm" target="_blank">
                                            <i class="fa fa-print"> Cetak Pdf </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>No. Tiket</th>
                                                    <th style="width:80px">Tgl Lapor</th>
                                                    <th>Jenis</th>
                                                    <th>Deskripsi</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-transform: uppercase;">
                                                <?php
                                                $q_gangguan = mysqli_query($con ,"SELECT tbl_gangguan.no_tiket_gangguan, tbl_gangguan.tgl_lapor, tbl_gangguan.jenis, tbl_gangguan.deskripsi, tbl_gangguan.status FROM tbl_gangguan 
                                                inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_pelanggan.no_inet 
                                                where tbl_gangguan.status = '$_GET[cari]' order by tbl_gangguan.tgl_lapor Desc");
                                                $no = 1;
                                                while($gangguan = mysqli_fetch_array($q_gangguan)){
                                                    $tgl = $gangguan['tgl_lapor'];
                                                    $tgl_lapor = date('d/m/Y', strtotime($tgl));
                                                    echo "<tr class='odd gradeX'>
                                                        <td>$no</td>
                                                        <td>$gangguan[no_tiket_gangguan]</td>
                                                        <td>$tgl_lapor</td>
                                                        <td>$gangguan[jenis]</td>
                                                        <td>$gangguan[deskripsi]</td>
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
        }
    }//akhir pegawai
}
?>

    