<?php
require_once "koneksi/config.php";
$q_wilayah = mysqli_query($con, "select * from tbl_karyawan where tbl_karyawan.id_user = '$_SESSION[id_user]'");
$wilayah = mysqli_fetch_array($q_wilayah);
$id_wilayah = $wilayah['id_kab_kota'];
?>
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3>Data Pelanggan Berhenti</h3>
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
                                    <th>Keputusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-transform: uppercase;">
                                <?php 
                                $q_pelanggan = mysqli_query($con ,"SELECT * FROM tbl_pelanggan 
                                inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
                                inner join tbl_kecamatan on tbl_pelanggan.id_kecamatan = tbl_kecamatan.id_kecamatan 
                                inner join tbl_kelurahan on tbl_pelanggan.id_kelurahan = tbl_kelurahan.id_kelurahan
                                where tbl_pelanggan.status = 'Berhenti' and tbl_pelanggan.id_kab_kota = '$id_wilayah'");
                                $no = 1;
                                while($pelanggan = mysqli_fetch_array($q_pelanggan)){
                                    echo "<tr class='odd gradeX'>
                                        <td>$no</td>
                                        <td>$pelanggan[nama_pelanggan]</td>
                                        <td>$pelanggan[no_inet]</td>
                                        <td>$pelanggan[tgl_jtt]</td>
                                        <td>$pelanggan[no_tlp]</td>
                                        <td>$pelanggan[alamat]</td>
                                        <td>
                                            <a href='aksi_pelanggan.php?&act=aktifkan&id=$pelanggan[id_pelanggan]' class='btn btn-info btn-xs'>
                                            <i class='fa fa-check'></i> Aktifkan</a>
                                        </td>
                                        <td>
                                            <a href='main.php?module=pelanggan_baru&act=e&id=$pelanggan[id_pelanggan]' class='btn btn-warning btn-xs'>
                                            <i class='fa fa-edit'></i> Edit</a>
                                            
                                            <a href='aksi_pelanggan.php?&act=h_baru&id=$pelanggan[id_pelanggan]' class='btn btn-danger btn-xs'>
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

    