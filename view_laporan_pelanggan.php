<?php
require_once "koneksi/config.php";
?>
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3>Data Pelanggan Aktif</h3>
                    <div class="panel-heading text-right">
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
                                    <th>Tgl. Jtt</th>
                                    <th>No. Hp</th>
                                    <th>Alamat</th>
                                    <th>Kota / Kab</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Paket</th>
                                    <th>Add On</th>
                                </tr>
                            </thead>
                            <tbody style="text-transform: uppercase;">
                                <?php 
                                $q_pelanggan = mysqli_query($con ,"SELECT * FROM tbl_pelanggan 
                                inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
                                inner join tbl_kecamatan on tbl_pelanggan.id_kecamatan = tbl_kecamatan.id_kecamatan 
                                inner join tbl_kelurahan on tbl_pelanggan.id_kelurahan = tbl_kelurahan.id_kelurahan 
                                inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket 
                                where tbl_pelanggan.status = 'Aktif'");
                                $no = 1;
                                while($pelanggan = mysqli_fetch_array($q_pelanggan)){
                                    echo "<tr class='odd gradeX'>
                                        <td>$no</td>
                                        <td>$pelanggan[nama_pelanggan]</td>
                                        <td>$pelanggan[no_inet]</td>
                                        <td>$pelanggan[tgl_jtt]</td>
                                        <td>$pelanggan[no_tlp]</td>
                                        <td>$pelanggan[alamat]</td>
                                        <td>$pelanggan[nama_kab_kota]</td>
                                        <td>$pelanggan[nama_kecamatan]</td>
                                        <td>$pelanggan[nama_kelurahan]</td>
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
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>

    