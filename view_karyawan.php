<?php
require_once "koneksi/config.php";
if(isset($_GET['act'])){
	if($_GET['act'] == 't'){
    ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Tambah Data karyawan
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <form class="form-horizontal" method="POST" action="aksi_karyawan.php?act=t">
                                <div class="box-body">
                                <?php 
                                $carikode = mysqli_query($con, "SELECT nik from tbl_karyawan");
                                $datakode = mysqli_fetch_array($carikode);
                                $jumlah_data = mysqli_num_rows($carikode);
                                    // jika $datakode
                                    if ($datakode) {
                                    $nilaikode = substr($jumlah_data[0], 1);
                                    $kode = (int) $nilaikode;
                                    $kode = $jumlah_data + 1;
                                    $kode_otomatis = "11".str_pad($kode, 6, "0", STR_PAD_LEFT);
                                    } else {
                                    $kode_otomatis = "11000001";
                                    }
                                ?>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">NIK</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nik" value="<?php echo $kode_otomatis ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Nama</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_karyawan" placeholder="Nama karyawan" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Wilayah</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="kota" id="kota" placeholder="Wilayah Kab/Kota" required>
                                            <option></option>
                                                <?php
                                                    $sql_kab_kota = mysqli_query($con,"SELECT * FROM tbl_kab_kota where id_provinsi = '63' ORDER BY id_kab_kota ASC");                   
                                                    while($rs_kab_kota = mysqli_fetch_assoc($sql_kab_kota)){ 
                                                    echo '<option value="'.$rs_kab_kota['id_kab_kota'].'">'.$rs_kab_kota['nama_kab_kota'].'</option>';
                                                    }                  
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer" style="margin-top:50px;">
                                    <a href="main.php?module=karyawan" class="btn btn-warning btn-sm"><i class='fa fa-rotate-left'></i> Kembali</a>
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
        $q_data 	= mysqli_query($con,"SELECT * FROM tbl_karyawan 
        inner join tbl_kab_kota on tbl_karyawan.id_kab_kota = tbl_kab_kota.id_kab_kota 
        inner join tbl_user on tbl_karyawan.id_user = tbl_user.id_user
        where tbl_karyawan.nik = '$_GET[id]'");
        $data			= mysqli_fetch_array($q_data);
    ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Edit Data karyawan
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <form class="form-horizontal" method="POST" action="aksi_karyawan.php?act=e">
                                <div class="box-body">

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">NIK</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nik" value="<?php echo $data['nik'] ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Nama</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_karyawan" placeholder="Nama karyawan" value="<?php echo $data['nama_karyawan'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Wilayah</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="kota" id="kota" placeholder="Wilayah Kab/Kota" required>
                                                <option value="<?php echo $data['id_kab_kota'] ?>"><?php echo $data['nama_kab_kota'] ?></option>
                                                <option></option>
                                                <?php 
                                                $sql_kab_kota = mysqli_query($con,"SELECT * FROM tbl_kab_kota where id_provinsi = '63' ORDER BY id_kab_kota ASC");                   
                                                    while($rs_kab_kota = mysqli_fetch_assoc($sql_kab_kota)){ 
                                                    echo '<option value="'.$rs_kab_kota['id_kab_kota'].'">'.$rs_kab_kota['nama_kab_kota'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Password</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin merubah password">
                                        </div>
                                    </div>

                                </div>
                                <div class="box-footer" style="margin-top:50px;">
                                    <a href="main.php?module=karyawan" class="btn btn-warning btn-sm"><i class='fa fa-rotate-left'></i> Kembali</a>
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
                    <h3>Data karyawan</h3>
                    <div class="panel-heading text-right">
                        <a href="main.php?module=karyawan&act=t" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"> Tambah </i>
                        </a>
                        <a href="tcpdf/examples/lap_karyawan.php" class="btn btn-success btn-sm" target="_blank">
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
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Wilayah</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="text-transform: uppercase;">
                                <?php 
                                $q_karyawan = mysqli_query($con ,"SELECT * FROM tbl_karyawan 
                                inner join tbl_kab_kota on tbl_karyawan.id_kab_kota = tbl_kab_kota.id_kab_kota 
                                inner join tbl_user on tbl_karyawan.id_user = tbl_user.id_user
                                ORDER BY tbl_karyawan.nik ASC");
                                $no = 1;
                                while($karyawan = mysqli_fetch_array($q_karyawan)){
                                    echo "<tr class='odd gradeX'>
                                        <td>$no</td>
                                        <td>$karyawan[nik]</td>
                                        <td>$karyawan[nama_karyawan]</td>
                                        <td>$karyawan[nama_kab_kota]</td>
                                        <td>$karyawan[username]</td>
                                        <td>
                                            <a href='main.php?module=karyawan&act=e&id=$karyawan[nik]' class='btn btn-warning btn-xs'>
                                            <i class='fa fa-edit'></i> Edit</a>
                                            
                                            <a href='aksi_karyawan.php?&act=h&id=$karyawan[nik]' class='btn btn-danger btn-xs'>
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

    