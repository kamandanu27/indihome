<?php
require_once "koneksi/config.php";
$q_wilayah = mysqli_query($con, "select * from tbl_karyawan where tbl_karyawan.id_user = '$_SESSION[id_user]'");
$wilayah = mysqli_fetch_array($q_wilayah);
$id_wilayah = $wilayah['id_kab_kota'];
if(isset($_GET['act'])){
	if($_GET['act'] == 'e'){
        $q_data 	= mysqli_query($con,"SELECT * FROM tbl_pelanggan 
        inner join tbl_kab_kota on tbl_pelanggan.id_kab_kota = tbl_kab_kota.id_kab_kota 
        inner join tbl_kecamatan on tbl_pelanggan.id_kecamatan = tbl_kecamatan.id_kecamatan 
        inner join tbl_kelurahan on tbl_pelanggan.id_kelurahan = tbl_kelurahan.id_kelurahan 
        inner join tbl_paket on tbl_pelanggan.id_paket = tbl_paket.id_paket 
        where tbl_pelanggan.id_pelanggan = '$_GET[id]'");
        $data			= mysqli_fetch_array($q_data);
    ?>
        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Data Pelanggan
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                            <form class="form-horizontal" method="POST" action="aksi_pelanggan.php?act=e_baru" enctype="multipart/form-data">
                                <div class="box-body">

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Nama</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama karyawan" value="<?php echo $data['nama_pelanggan'] ?>" required>
                                        <input type="hidden" class="form-control" name="id_pelanggan" placeholder="Nama karyawan" value="<?php echo $data['id_pelanggan'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Alamat</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="alamat" placeholder="Nama karyawan" value="<?php echo $data['alamat'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Kab / Kota</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="id_kab_kota" id="id_kab_kota" placeholder="Wilayah Provinsi" readonly>
                                                <option value="<?php echo $data['id_kab_kota'] ?>"><?php echo $data['nama_kab_kota'] ?></option>
                                                <option>- Pilih Kab / Kota -</option>
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
                                        <label class="col-sm-2  control-label">Kecamatan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Wilayah Kab/Kota" required>
                                                <option value="<?php echo $data['id_kecamatan'] ?>"><?php echo $data['nama_kecamatan'] ?></option>
                                                <option></option>
                                                <?php 
                                                    $sql_kab_kota = mysqli_query($con,"SELECT * FROM tbl_kecamatan where id_kab_kota = '$data[id_kab_kota]' ORDER BY id_kab_kota ASC");                   
                                                    while($rs_kab_kota = mysqli_fetch_assoc($sql_kab_kota)){ 
                                                    echo '<option value="'.$rs_kab_kota['id_kecamatan'].'">'.$rs_kab_kota['nama_kecamatan'].'</option>';
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Kelurahan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="id_kelurahan" id="id_kelurahan" placeholder="Wilayah Kab/Kota" required>
                                                <option value="<?php echo $data['id_kelurahan'] ?>"><?php echo $data['nama_kelurahan'] ?></option>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">No. Tlp</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_tlp" placeholder="No. Telp / WA" value="<?php echo $data['no_tlp'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Email</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $data['email'] ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Foto KTP</label>
                                        <div class="col-sm-10">
                                        <a href="#photo_selfie" id="image"><img src="assets/img/pelanggan/<?php echo $data['foto_ktp'] ?>" width="200"></a>
                                        <input type="file" class="form-control" name="foto_ktp">
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Foto Selfie KTP</label>
                                        <div class="col-sm-10">
                                        <a href="#photo_selfie" id="image"><img src="assets/img/pelanggan/<?php echo $data['foto_selfie'] ?>" width="200"></a>
                                        <input type="file" class="form-control" name="foto_selfie">
                                        </div>
                                    </div>

                                    <div class="form-group"> 
                                        <label class="col-sm-2  control-label">Paket</label>
                                        <div class="col-sm-10">
                                        <?php 
                                         $harga = number_format($data['harga'],0,',','.');
                                        ?>
                                            <select class="form-control" name="id_paket" id="id_paket" required>
                                                <option value="<?php echo $data['id_paket'] ?>"><?php echo $data['nama_paket'] ?> | <?php echo $data['spesifikasi'] ?> | Rp. <?php echo $harga ?></option>
                                                <option value=""></option>
                                                <?php
                                                    $q_paket = mysqli_query($con ,"SELECT * FROM tbl_paket");
                                                    while($paket = mysqli_fetch_array($q_paket)){
                                                    $harga = number_format($paket['harga'],0,',','.');
                                                    echo "<option value='$paket[id_paket]'>$paket[nama_paket] | $paket[spesifikasi] | Rp. $harga</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="box-footer" style="margin-top:50px;">
                                    <a href="main.php?module=pelanggan_baru" class="btn btn-warning btn-sm"><i class='fa fa-rotate-left'></i> Kembali</a>
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
                    <h3>Data Pelanggan Baru</h3>
                    <div class="panel-heading text-right">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nam Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
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
                                where tbl_pelanggan.status = 'Belum Aktif' and tbl_pelanggan.id_kab_kota = '$id_wilayah'");
                                $no = 1;
                                while($pelanggan = mysqli_fetch_array($q_pelanggan)){
                                    echo "<tr class='odd gradeX'>
                                        <td>$no</td>
                                        <td>$pelanggan[nama_pelanggan]</td>
                                        <td>$pelanggan[alamat]</td>
                                        <td>$pelanggan[nama_kab_kota]</td>
                                        <td>$pelanggan[nama_kecamatan]</td>
                                        <td>$pelanggan[nama_kelurahan]</td>
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
    <?php 
    }
?>

    