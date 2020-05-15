<?php
include "koneksi/config.php";
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'karyawan'){
        if($_GET['act'] == 't'){
            $nama_paket   = $_POST['nama_paket'];
            $harga        = $_POST['harga'];
            $spesifikasi  = $_POST['spesifikasi'];
            
            $query = "INSERT into tbl_paket(nama_paket,spesifikasi,harga) 
            values ('$nama_paket','$spesifikasi','$harga')";
            $hasil = mysqli_query($con, $query);
            
            echo "<script>window.alert('Data Paket Berhasil Ditambahkan');
            window.location=('main.php?module=paket')</script>";
        
        }
        
        if($_GET['act'] == 'e'){
            $id_paket     = $_POST['id_paket'];
            $nama_paket   = $_POST['nama_paket'];
            $harga        = $_POST['harga'];
            $spesifikasi  = $_POST['spesifikasi'];

                mysqli_query($con, "UPDATE tbl_paket SET nama_paket = '$nama_paket', spesifikasi = '$spesifikasi',
                                    harga = '$harga'
                                    WHERE id_paket = '$id_paket'");
                echo "<script>window.alert('Data Paket Berhasil Dirubah');
                        window.location=('main.php?module=paket')</script>";
        
        
        }
        
        if($_GET['act'] == 'h'){
            $id		= $_GET['id'];
        
            mysqli_query($con, "Delete from tbl_paket where id_paket = '$id'");
        
            echo "<script>window.alert('Data Paket Berhasil Dihapus');
                    window.location=('main.php?module=paket')</script>";
        }
    }
}


?>