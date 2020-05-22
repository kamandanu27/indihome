<div id="page-inner">
    <?php 
    if ($_SESSION['level'] == 'pelanggan'){
        $q_cek = mysqli_query($con, "select * from tbl_user 
        inner join tbl_pelanggan on tbl_user.id_user = tbl_pelanggan.id_user 
        inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket 
        where tbl_user.id_user = '$_SESSION[id_user]'");
        $cek = mysqli_fetch_array($q_cek);

        if($cek['status'] == 'Belum Aktif'){
    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Messages
                    </div>        
                                
                    <div class="panel-body"> 
                        <div class="alert alert-info">
                            <strong>Terimakasih!</strong> Pendaftaran Kamu sedang kami proses.
                        </div>
                    </div>
                </div>
			</div>
        </div> 
    <?php 
        }
        if($cek['status'] == 'Berhenti'){
    ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Messages
                    </div>        
                                
                    <div class="panel-body"> 
                        <div class="alert alert-info">
                            <strong>Maaf!</strong> layanan Kamu dinonaktifkan.
                        </div>
                    </div>
                </div>
			</div>
        </div> 
    <?php 
        }
        if($cek['status'] == 'Aktif'){
            $harga = number_format($cek['harga'],2,',','.');
    ?>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-danger text-center no-boder bg-color-danger">
                    <div class="panel-footer back-footer-blue" style="background-color:#09192A;">
                        Langganan
                    </div>
                    <div class="panel-body">
                        <i class="fa fa-phone-square fa-5x"></i>
                        <h4>Anda Berlangganan Paket <?php echo $cek['nama_paket'] ?></h4>
                        <span><?php echo $cek['spesifikasi'] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-danger">
                    <div class="panel-footer back-footer-red" style="background-color:#09192A;">
                        Add On
                    </div>
                    <div class="panel-body">
                        <i class="fa fa-plus-square fa-5x"></i>
                        <h4>Anda Berlangganan Add On</h4>
                        <?php
                        $q_upgrade = mysqli_query($con, "select * from tbl_upgrade 
                        inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon 
                        where tbl_upgrade.no_inet = '$cek[no_inet]' and tbl_upgrade.status = 'Aktif' 
                        or tbl_upgrade.no_inet = '$cek[no_inet]' and tbl_upgrade.status = 'Menunggu Berhenti'");
                        while($upgrade = mysqli_fetch_array($q_upgrade)){
                            echo "[<span style='color:blue'>$upgrade[nama_layanan] </span>] ";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-danger">
                    <div class="panel-footer back-footer-red" style="background-color:#09192A;">
                        Tagihan
                    </div>
                    <div class="row">
                    
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="panel-body text-right">
                                <i class="fa fa-credit-card fa-5x"></i>
                            </div>
                        </div>

                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <div class="panel-body text-left">
                            <?php

                            $q_paket = mysqli_query($con, "select * from tbl_pelanggan 
                            inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket
                            where tbl_pelanggan.no_inet = '$cek[no_inet]' and tbl_pelanggan.status = 'Aktif' 
                            or tbl_pelanggan.no_inet = '$cek[no_inet]' and tbl_pelanggan.status = 'Menunggu Berhenti'");
                            $paket = mysqli_fetch_array($q_paket);
                            $bayar_paket = $paket['harga'];

                            $q_upgrade = mysqli_query($con, "SELECT sum(tbl_addon.harga) as total FROM tbl_upgrade 
                            inner join tbl_addon on tbl_upgrade.id_addon = tbl_addon.id_addon
                            where tbl_upgrade.no_inet = '$cek[no_inet]' and tbl_upgrade.status = 'Aktif' 
                            or tbl_upgrade.no_inet = '$cek[no_inet]' and tbl_upgrade.status = 'Menunggu Berhenti'");
                            $upgrade = mysqli_fetch_array($q_upgrade);
                            $bayar_upgrade = $upgrade['total'];

                            $t_bayar = $bayar_paket + $bayar_upgrade;

                            $total_bayar = number_format($t_bayar,2,',','.');
                            ?>
                            <h4>Tagihan Bulanan anda sebesar </h4>
                            <h3>Rp. <?php echo $total_bayar ?></h3>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div> 
    <?php 
        }
    }//akhir pelanggan

    if ($_SESSION['level'] == 'karyawan' or $_SESSION['level'] == 'admin'){
        $q_wilayah = mysqli_query($con, "select * from tbl_karyawan where tbl_karyawan.id_user = '$_SESSION[id_user]'");
        $wilayah = mysqli_fetch_array($q_wilayah);
        $id_wilayah = $wilayah['id_kab_kota'];
    ?>
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-green">
                    <div class="panel-body">
                        <i class="fa fa-bar-chart-o fa-5x"></i>
                        <?php
                        if($_SESSION['level'] == 'admin'){
                            $query = mysqli_query($con, "select count(*) as jumlah from tbl_pelanggan where status = 'Aktif'");
                        }else{
                            $query = mysqli_query($con, "select count(*) as jumlah from tbl_pelanggan where status = 'Aktif' and id_kab_kota = '$id_wilayah'");
                        }
                            $pelanggan = mysqli_fetch_array($query);
                            $total = $pelanggan['jumlah'];
                            echo "<h3>$total</h3>";
                        ?>
                        
                    </div>
                    <div class="panel-footer back-footer-green">
                        Jumlah Pelanggan Aktif
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-blue">
                    <div class="panel-body">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        <?php
                        if($_SESSION['level'] == 'admin'){
                            $query = mysqli_query($con, "select count(*) as jumlah from tbl_upgrade inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_upgrade.no_inet 
                            where tbl_upgrade.status = 'Aktif'");
                        }else{
                            $query = mysqli_query($con, "select count(*) as jumlah from tbl_upgrade inner join tbl_pelanggan on tbl_upgrade.no_inet = tbl_upgrade.no_inet 
                            where tbl_upgrade.status = 'Aktif' and tbl_pelanggan.id_kab_kota = '$id_wilayah'");
                        }
                            $pelanggan = mysqli_fetch_array($query);
                            $total = $pelanggan['jumlah'];
                            echo "<h3>$total</h3>";
                        ?>
                    </div>
                    <div class="panel-footer back-footer-blue">
                        Upgrade Add-On Aktif
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-red">
                    <div class="panel-body">
                        <i class="fa fa fa-comments fa-5x"></i>
                        <?php
                        if($_SESSION['level'] == 'admin'){
                            $query = mysqli_query($con, "select count(*) as jumlah from tbl_gangguan inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_pelanggan.no_inet 
                            where tbl_gangguan.status = 'Proses'");
                        }else{
                            $query = mysqli_query($con, "select count(*) as jumlah from tbl_gangguan inner join tbl_pelanggan on tbl_gangguan.no_inet = tbl_gangguan.no_inet 
                            where tbl_gangguan.status = 'Proses' and tbl_pelanggan.id_kab_kota = '$id_wilayah'");
                        }
                            $pelanggan = mysqli_fetch_array($query);
                            $total = $pelanggan['jumlah'];
                            echo "<h3>$total</h3>";
                        ?>
                    </div>
                    <div class="panel-footer back-footer-red">
                        Proses Perbaikan Gangguan
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-brown">
                    <div class="panel-body">
                        <i class="fa fa-users fa-5x"></i>
                        <?php
                        if($_SESSION['level'] == 'admin'){
                            $query = mysqli_query($con, "select count(*) as jumlah from tbl_pelanggan where status = 'Berhenti'");
                        }else{
                            $query = mysqli_query($con, "select count(*) as jumlah from tbl_pelanggan where status = 'Berhenti' and id_kab_kota = '$id_wilayah'");
                        }
                            $pelanggan = mysqli_fetch_array($query);
                            $total = $pelanggan['jumlah'];
                            echo "<h3>$total</h3>";
                        ?>
                    </div>
                    <div class="panel-footer back-footer-brown">
                        Pelanggan Tidak Aktif
                    </div>
                </div>
            </div>
        </div>
    <?php 
    }
    ?>
   