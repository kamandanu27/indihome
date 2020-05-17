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
                        <h3>8,457</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary text-center no-boder bg-color-danger">
                    <div class="panel-footer back-footer-red" style="background-color:#09192A;">
                        Tagihan
                    </div>
                    <div class="panel-body">
                        <i class="fa fa-credit-card fa-5x"></i>
                        <h3>8,457</h3>
                    </div>
                </div>
            </div>
        </div> 
    <?php 
        }
    }
    ?>
                 <!-- /. ROW  -->
                                 
				<!-- <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3>8,457</h3>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Daily Visits

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                <h3>52,160 </h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Sales

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa fa-comments fa-5x"></i>
                                <h3>15,823 </h3>
                            </div>
                            <div class="panel-footer back-footer-red">
                                Comments

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <h3>36,752 </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                No. of Visits

                            </div>
                        </div>
                    </div>
                </div> -->