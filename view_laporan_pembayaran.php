<?php
require_once "koneksi/config.php";
?>
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3>Laporan Data Pembayaran</h3>
                    <div class="panel-heading text-right">
                        <a href="tcpdf/examples/lap_pembayaran.php" class="btn btn-default btn-sm" target="_blank">
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
                                    <th>Nama</th>
                                    <th>No. Internet</th>
                                    <th>Paket</th>
                                    <th>Add On</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody style="text-transform: uppercase;">
                                <?php 
                                $q_pelanggan = mysqli_query($con ,"SELECT * FROM tbl_pelanggan 
                                inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket 
                                where status = 'Aktif' or status = 'Menunggu Berhenti'");
                                $no = 1;
                                while($pelanggan = mysqli_fetch_array($q_pelanggan)){

                                    $q_paket = mysqli_query($con, "select * from tbl_pelanggan inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket 
                                    where tbl_pelanggan.no_inet = '$pelanggan[no_inet]' and tbl_pelanggan.status = 'Aktif' 
                                    or tbl_pelanggan.no_inet = '$pelanggan[no_inet]' and tbl_pelanggan.status = 'Menunggu Berhenti'");
                                    $paket = mysqli_fetch_array($q_paket);
                                    $bayar_paket = $paket['harga'];
        
                                    $q_upgrade = mysqli_query($con, "SELECT sum(tbl_addon.harga) as total FROM tbl_upgrade 
                                    inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon
                                    where tbl_upgrade.no_inet = '$pelanggan[no_inet]' and tbl_upgrade.status = 'Aktif' 
                                    or tbl_upgrade.no_inet = '$pelanggan[no_inet]' and tbl_upgrade.status = 'Menunggu Berhenti'");
                                    $upgrade = mysqli_fetch_array($q_upgrade);
                                    $bayar_upgrade = $upgrade['total'];
        
                                    $t_bayar = $bayar_paket + $bayar_upgrade;
        
                                    $total_bayar = number_format($t_bayar,2,',','.');

                                    echo "<tr class='odd gradeX'>
                                        <td>$no</td>
                                        <td>$pelanggan[nama_pelanggan]</td>
                                        <td>$pelanggan[no_inet]</td>
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
                                        <td>
                                            Rp. $total_bayar
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


    