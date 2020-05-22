<?php
require_once "koneksi/config.php";
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'pelanggan'){
        $q_data = mysqli_query($con, "select * from tbl_pelanggan inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket");
        $data = mysqli_fetch_array($q_data);
        ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Lapor Gangguan Layanan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <form class="form-horizontal" method="POST" action="aksi_lapor_gangguan.php?act=t" enctype="multipart/form-data">
                                    <div class="box-body">
        
                                        <div class="form-group"> 
                                            <label class="col-sm-3  control-label">No. Inet</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" name="no_inet" value="<?php echo $data['no_inet'] ?>" readonly>
                                            </div>
                                        </div>
        
                                        <div class="form-group"> 
                                            <label class="col-sm-3  control-label">Nama Pelanggan</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_pelanggan'] ?>" readonly>
                                            </div>
                                        </div>
        
                                        <div class="form-group"> 
                                            <label class="col-sm-3  control-label">Nama Paket</label>
                                            <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_paket" value="<?php echo $data['nama_paket'] ?>" readonly>
                                            </div>
                                        </div>
        
                                        <div class="form-group">
                                            <label class="col-sm-3  control-label">Layanan</label>
                                            <div class="col-sm-9">
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" name="jenis[]" value="Internet">
                                                    Internet
                                                    </label>
                                                </div>
        
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" name="jenis[]" value="Telepon">
                                                    Telepon
                                                    </label>
                                                </div>
        
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" name="jenis[]" value="Usee Tv">
                                                    Usee Tv
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="form-group"> 
                                            <label class="col-sm-3  control-label">Deskripsi Keluhan</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                                                <span>Max 200 Karakter</span>
                                                <br>
                                            </div>
                                        </div>
        
                                        <div class="form-group"> 
                                            <label class="col-sm-3  control-label"></label>
                                            <div class="col-sm-9">
                                                
                                                <span>* Data di atas telah sesuai dan tidak dapat diubah setelah Anda tekan tombol lapor</span>
                                            </div>
                                        </div>
        
                                    </div>
                                    <div class="box-footer" style="margin-top:50px;">
                                        <a href="main.php?module=home" class="btn btn-warning btn-sm"><i class='fa fa-rotate-left'></i> Kembali</a>
                                        <button type="submit" class="btn btn-primary pull-right btn-sm"><i class='fa fa-save'></i> Lapor</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
    }
}
?>

    