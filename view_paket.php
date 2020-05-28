<?php
require_once "koneksi/config.php";
if(isset($_GET['act'])){
	if($_GET['act'] == 't'){
    ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Tambah Data paket
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <form class="form-horizontal" method="POST" action="aksi_paket.php?act=t">
                                <div class="box-body">

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Nama Paket</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_paket" placeholder="Nama Paket" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Spesifikasi</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="spesifikasi" placeholder="Spesifikasi" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Harga</label>
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control" name="harga" placeholder="Rp." required>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer" style="margin-top:50px;">
                                    <a href="main.php?module=paket" class="btn btn-warning btn-sm"><i class='fa fa-rotate-left'></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary pull-right btn-sm"><i class='fa fa-save'></i> Simpan</button>
								</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php 
    }if($_GET['act'] == 'e'){
        $q_data 	= mysqli_query($con,"SELECT * FROM tbl_paket 
        where tbl_paket.id_paket = '$_GET[id]'");
        $data			= mysqli_fetch_array($q_data);
    ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Edit Data paket
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <form class="form-horizontal" method="POST" action="aksi_paket.php?act=e">
                                <div class="box-body">

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Nama Paket</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_paket" placeholder="Nama Paket" value="<?php echo $data['nama_paket'] ?>" required>
                                        <input type="hidden" class="form-control" name="id_paket" placeholder="Nama Paket" value="<?php echo $data['id_paket'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Spesifikasi</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="spesifikasi" placeholder="Spesifikasi" value="<?php echo $data['spesifikasi'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Harga</label>
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control" name="harga" value="<?php echo $data['harga'] ?>" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="box-footer" style="margin-top:50px;">
                                    <a href="main.php?module=paket" class="btn btn-warning btn-sm"><i class='fa fa-rotate-left'></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary pull-right btn-sm"><i class='fa fa-save'></i> Simpan</button>
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
    
}else{

    ?>
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3>Data Paket</h3>
                    <div class="panel-heading text-right">
                        <a href="main.php?module=paket&act=t" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"> Tambah </i>
                        </a>
                        <a href="tcpdf/examples/lap_paket.php" class="btn btn-success btn-sm" target="_blank">
                            <i class="fa fa-print"> Cetak PDF </i>
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-transform: uppercase;">
                                <?php 
                                $q_paket = mysqli_query($con ,"SELECT * FROM tbl_paket");
                                $no = 1;
                                while($paket = mysqli_fetch_array($q_paket)){
                                    $harga = number_format($paket['harga'],2,',','.');
                                    echo "<tr class='odd gradeX'>
                                        <td>$no</td>
                                        <td>$paket[nama_paket]</td>
                                        <td>Rp. $harga</td>
                                        <td>
                                            <a href='main.php?module=paket&act=e&id=$paket[id_paket]' class='btn btn-warning btn-xs'>
                                            <i class='fa fa-edit'></i> Edit</a>
                                            
                                            <a href='aksi_paket.php?&act=h&id=$paket[id_paket]' class='btn btn-danger btn-xs'>
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
    <?php 
    }
?>

    