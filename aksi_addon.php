<?php
include "koneksi/config.php";
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'karyawan'){
        if($_GET['act'] == 't'){
            $nama_layanan   = $_POST['nama_layanan'];
            $harga          = $_POST['harga'];
            $id_addon       = $_POST['id_addon'];
            
            $query = "INSERT into tbl_addon(id_addon,nama_layanan,harga) 
            values ('$id_addon','$nama_layanan','$harga')";
            $hasil = mysqli_query($con, $query);
            
            echo "<script>window.alert('Data Addon Berhasil Ditambahkan');
            window.location=('main.php?module=addon')</script>";
        
        }
        
        if($_GET['act'] == 'e'){
            $id_addon       = $_POST['id_addon'];
            $nama_layanan   = $_POST['nama_layanan'];
            $harga          = $_POST['harga'];

                mysqli_query($con, "UPDATE tbl_addon SET nama_layanan = '$nama_layanan',
                                    harga = '$harga'
                                    WHERE id_addon = '$id_addon'");
                echo "<script>window.alert('Data Addon Berhasil Dirubah');
                        window.location=('main.php?module=addon')</script>";
        
        
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