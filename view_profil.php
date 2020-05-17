<?php
require_once "koneksi/config.php";
$q_data = mysqli_query($con, "select * from tbl_user where id_user = '$_SESSION[id_user]'");
$data   = mysqli_fetch_array($q_data);
?>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-danger">
                <div class="panel-heading">
                   Edit Profil
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                        <form class="form-horizontal" method="POST" action="aksi_profil.php">
                            <div class="box-body">

                                <div class="form-group"> 
                                    <label class="col-sm-3  control-label">Username</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>" readonly>
                                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $data['id_user'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group"> 
                                    <label class="col-sm-3  control-label">Password</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer" style="margin-top:50px;">
                                <a href="main.php?module=home" class="btn btn-warning btn-sm"><i class='fa fa-rotate-left'></i> Kembali</a>
                                <button type="submit" class="btn btn-primary pull-right btn-sm"><i class='fa fa-save'></i> Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    