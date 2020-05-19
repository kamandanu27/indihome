<?php
include "koneksi/config.php";
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'karyawan'){
        if($_GET['act'] == 't'){
            $nama_layanan   = $_POST['nama_layanan'];
            $harga          = $_POST['harga'];
            $id_addon       = $_POST['id_addon'];

                $foto_banner                   = $_FILES['banner']['name'];
                $lokasi_banner                 = $_FILES['banner']['tmp_name'];
                $ukuran_banner                 = $_FILES['banner']['size'];
                $tipe_file_banner              = $_FILES['banner']['type'];

                $ekstensi_banner_d         = explode('.', $foto_banner);
                $ekstensi_banner           = $ekstensi_banner_d[1];

                $valid_file        = array('jpeg', 'jpg', 'png');

                if(in_array($ekstensi_banner, $valid_file) == 0){
                        echo "<script>window.alert('Type Foto banner Tidak Diijinkan')</script>";
                }else if($ukuran_banner > 50000000){
                        echo "<script>window.alert('Ukuran Foto banner Tidak Diijinkan')</script>";
                }else{
                        $namafile_banner = time()."_".$foto_banner;
                        move_uploaded_file($lokasi_banner, "assets/img/addon/".$namafile_banner);

                        mysqli_query($con, "UPDATE tbl_addon SET banner = '$namafile_banner',
                        nama_layanan = '$nama_layanan',
                        harga = '$harga'
                        WHERE id_addon = '$id_addon'");

                        $query = "INSERT into tbl_addon(id_addon,nama_layanan,harga,banner) 
                        values ('$id_addon','$nama_layanan','$harga','$namafile_banner')";
                        $hasil = mysqli_query($con, $query);

                        echo "<script>window.alert('Data Addon Berhasil Ditambahkan');
                        window.location=('main.php?module=addon')</script>";

                }
            
           
        
        }
    
        if($_GET['act'] == 'e'){
            $id_addon       = $_POST['id_addon'];
            $nama_layanan   = $_POST['nama_layanan'];
            $harga          = $_POST['harga'];

            if($_FILES['banner']['name'] !== ''){
                $foto_banner                   = $_FILES['banner']['name'];
                $lokasi_banner                 = $_FILES['banner']['tmp_name'];
                $ukuran_banner                 = $_FILES['banner']['size'];
                $tipe_file_banner              = $_FILES['banner']['type'];

                $ekstensi_banner_d         = explode('.', $foto_banner);
                $ekstensi_banner           = $ekstensi_banner_d[1];

                $valid_file        = array('jpeg', 'jpg', 'png');

                if(in_array($ekstensi_banner, $valid_file) == 0){
                        echo "<script>window.alert('Type Foto banner Tidak Diijinkan')</script>";
                }else if($ukuran_banner > 50000000){
                        echo "<script>window.alert('Ukuran Foto banner Tidak Diijinkan')</script>";
                }else{
                        $namafile_banner = time()."_".$foto_banner;
                        move_uploaded_file($lokasi_banner, "assets/img/addon/".$namafile_banner);

                        mysqli_query($con, "UPDATE tbl_addon SET banner = '$namafile_banner',
                        nama_layanan = '$nama_layanan',
                        harga = '$harga'
                        WHERE id_addon = '$id_addon'");

                        echo "<script>window.alert('Data Addon Berhasil Dirubah');
                        window.location=('main.php?module=addon')</script>";

                }

            }else{
                mysqli_query($con, "UPDATE tbl_addon SET nama_layanan = '$nama_layanan',
                                    harga = '$harga'
                                    WHERE id_addon = '$id_addon'");
                echo "<script>window.alert('Data Addon Berhasil Dirubah');
                        window.location=('main.php?module=addon')</script>";
            }
            
        
        
        }
        
        if($_GET['act'] == 'h'){
            $id		= $_GET['id'];
        
            mysqli_query($con, "Delete from tbl_addon where id_addon = '$id'");
        
            echo "<script>window.alert('Data Addon Berhasil Dihapus');
                    window.location=('main.php?module=addon')</script>";
        }
    }
}


?>