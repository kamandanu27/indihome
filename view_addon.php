<?php
require_once "koneksi/config.php";
if(isset($_GET['act'])){
	if($_GET['act'] == 't'){
    ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Tambah Data addon
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <form class="form-horizontal" method="POST" action="aksi_addon.php?act=t" enctype="multipart/form-data">
                                <div class="box-body">
                                <?php 
                                $carikode = mysqli_query($con, "SELECT id_addon from tbl_addon");
                                $datakode = mysqli_fetch_array($carikode);
                                $jumlah_data = mysqli_num_rows($carikode);
                                    // jika $datakode
                                    if ($datakode) {
                                    $nilaikode = substr($jumlah_data[0], 1);
                                    $kode = (int) $nilaikode;
                                    $kode = $jumlah_data + 1;
                                    $kode_otomatis = "ADD".str_pad($kode, 3, "0", STR_PAD_LEFT);
                                    } else {
                                    $kode_otomatis = "ADD001";
                                    }
                                ?>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Kode Addon</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="id_addon" value="<?php echo $kode_otomatis ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Nama Layanan</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_layanan" placeholder="Nama layanan" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Harga</label>
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control" name="harga" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Banner</label>
                                        <div class="col-sm-9">
                                        <input type="file" class="form-control" name="banner" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer" style="margin-top:50px;">
                                    <a href="main.php?module=addon" class="btn btn-warning btn-sm"><i class='fa fa-rotate-left'></i> Kembali</a>
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
        $q_data 	= mysqli_query($con,"SELECT * FROM tbl_addon 
        where tbl_addon.id_addon = '$_GET[id]'");
        $data			= mysqli_fetch_array($q_data);
    ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Edit Data addon
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <form class="form-horizontal" method="POST" action="aksi_addon.php?act=e" enctype="multipart/form-data">
                                <div class="box-body">

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Kode Addon</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="id_addon" value="<?php echo $data['id_addon'] ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Nama Layanan</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_layanan" placeholder="Nama layanan" value="<?php echo $data['nama_layanan'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Harga</label>
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control" name="harga" value="<?php echo $data['harga'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-3  control-label">Banner</label>
                                        <div class="col-sm-9">
                                        <img src="assets/img/addon/<?php echo $data['banner'] ?>" width="200">
                                        <input type="file" class="form-control" name="banner">
                                        </div>
                                    </div>

                                </div>
                                <div class="box-footer" style="margin-top:50px;">
                                    <a href="main.php?module=addon" class="btn btn-warning btn-sm"><i class='fa fa-rotate-left'></i> Kembali</a>
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
                    <h3>Data Addon</h3>
                    <div class="panel-heading text-right">
                        <a href="main.php?module=addon&act=t" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"> Tambah </i>
                        </a>
                        <a href="tcpdf/examples/lap_addon.php" class="btn btn-success btn-sm" target="_blank">
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
                                    <th>Banner</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-transform: uppercase;">
                                <?php 
                                $q_addon = mysqli_query($con ,"SELECT * FROM tbl_addon");
                                $no = 1;
                                while($addon = mysqli_fetch_array($q_addon)){
                                    echo "<tr class='odd gradeX'>
                                        <td>$no</td>
                                        <td><img src='assets/img/addon/$addon[banner]' style='width:100px; height:100px;'></td>
                                        <td>$addon[nama_layanan]</td>
                                        <td>$addon[harga]</td>
                                        <td>
                                            <a href='main.php?module=addon&act=e&id=$addon[id_addon]' class='btn btn-warning btn-xs'>
                                            <i class='fa fa-edit'></i> Edit</a>
                                            
                                            <a href='aksi_addon.php?&act=h&id=$addon[id_addon]' class='btn btn-danger btn-xs'>
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

    