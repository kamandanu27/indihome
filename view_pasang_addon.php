<?php
require_once "koneksi/config.php";
$q_pelanggan = mysqli_query($con, "select * from tbl_pelanggan where id_user = '$_SESSION[id_user]'");
$pelanggan = mysqli_fetch_array($q_pelanggan);
?>
        <div class="row">
        <?php
        $q_addon = mysqli_query($con, "select * from tbl_addon");
        while($data = mysqli_fetch_array($q_addon)){
            $harga = number_format($data['harga'],2,',','.');
        ?>
            <div class="col-sm-4">
            <form class="form-horizontal" method="POST" action="aksi_upgrade.php">
                <div class="panel panel-danger" style="height: 250px;">
                    <div class="box-body">
                        <img class="img-responsive pad" src="assets/img/addon/<?php echo $data['banner']; ?>" style="width:100%; height:130px;">
                    </div>
                    <div class="panel-body text-center" style="color:black; font-weight:bold;">
                        <?php echo $data['nama_layanan']; ?>
                        <input type="hidden" class="form-control" name="no_inet" value="<?php echo $pelanggan['no_inet']; ?>">
                        <input type="hidden" class="form-control" name="id_addon" value="<?php echo $data['id_addon']; ?>">

                    </div>
                    <div class="panel-footer" style="color:blue;">
                        <ul class="nav">
                            <?php 
                            $q_upgrade = mysqli_query($con, "select * from tbl_upgrade 
                            where no_inet = '$pelanggan[no_inet]' and id_addon = '$data[id_addon]' order by id_upgrade Desc");
                            if(mysqli_num_rows($q_upgrade) > 0){
                                $upgrade = mysqli_fetch_array($q_upgrade);
                            
                                if($upgrade['status'] == 'Belum Aktif'){

                                    echo "<li style='color:red;'>Rp. $harga <span class='pull-right text-warning'> Request Aktif</span></li>";

                                }

                                if($upgrade['status'] == 'Aktif'){
                                    echo "<input type='hidden' class='form-control' name='act' value='menunggu_berhenti'>"; 

                                    echo "<input type='hidden' class='form-control' name='id_upgrade' value='$upgrade[id_upgrade]'>"; 

                                    echo "<li style='color:red;'>Rp. $harga <button type='submit' class='pull-right btn-primary btn-sm' disable><i class='fa fa-trash'></i> Berhenti</span></button></li>";

                                }

                                if($upgrade['status'] == 'Menunggu Berhenti'){

                                    echo "<li style='color:red;'>Rp. $harga <span class='pull-right text-warning'> Request Berhenti</span></li>";

                                }
                                if($upgrade['status'] == 'Berhenti'){

                                    echo "<input type='hidden' class='form-control' name='act' value='tambah'>"; 
        
                                    echo "<li style='color:red;'>Rp. $harga <button type='submit' class='pull-right btn-danger btn-sm' disable><i class='fa fa-plus'></i> Pasang</span></button></li>";

                                }

                            }else{
                                    echo "<input type='hidden' class='form-control' name='act' value='tambah'>"; 
        
                                    echo "<li style='color:red;'>Rp. $harga <button type='submit' class='pull-right btn-danger btn-sm' disable><i class='fa fa-plus'></i> Pasang</span></button></li>";
                                
                            }
                            
                            

                            ?>
                        </ul>
                    </div>
                </div>
            </form>
            </div>
        <?php 
        }
        ?>
            
        </div>
    


    