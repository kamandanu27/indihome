<?php
include "koneksi/config.php";
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'pelanggan'){
    
        if($_POST['act'] == 'tambah'){
            $id_addon      = $_POST['id_addon'];
            $no_inet       = $_POST['no_inet'];
            
            $query = "INSERT into tbl_upgrade(no_inet,id_addon,status) 
                        values ('$no_inet','$id_addon','Belum Aktif')";
                $hasil = mysqli_query($con, $query);

                echo "<script>window.alert('Request Aktifasi Layanan Berhasil Dikirim');
                        window.location=('main.php?module=p_addon')</script>";
        }
        if($_POST['act'] == 'menunggu_berhenti'){
            $id_upgrade      = $_POST['id_upgrade'];
            
            mysqli_query($con, "UPDATE tbl_upgrade SET status = 'Menunggu Berhenti'
                                    WHERE id_upgrade = '$id_upgrade'");

                echo "<script>window.alert('Request Berhenti Layanan Berhasil Dikirim');
                        window.location=('main.php?module=p_addon')</script>";
        }
    }

    if($_SESSION['level'] == 'karyawan'){
        if($_GET['act'] == 'aktifkan'){
            $id_upgrade      = $_GET['id'];
            $v               = $_GET['v'];
            
            mysqli_query($con, "UPDATE tbl_upgrade SET status = 'Aktif'
                                    WHERE id_upgrade = '$id_upgrade'");

                echo "<script>window.alert('Status Upgrade Addon Berhasil DIrubah');
                        window.location=('main.php?module=layanan_addon&v=$v')</script>";
        }

        if($_GET['act'] == 'nonaktifkan'){
            $id_upgrade      = $_GET['id'];
            $v               = $_GET['v'];
            
            mysqli_query($con, "UPDATE tbl_upgrade SET status = 'Berhenti'
                                    WHERE id_upgrade = '$id_upgrade'");

                echo "<script>window.alert('Status Upgrade Addon Berhasil DIrubah');
                        window.location=('main.php?module=layanan_addon&v=$v')</script>";
        }
        
        if($_GET['act'] == 'h'){
            $id		= $_GET['id'];
            $v               = $_GET['v'];
        
            mysqli_query($con, "Delete from tbl_upgrade where id_upgrade = '$id'");
        
            echo "<script>window.alert('Data Berhasil Dihapus');
                    window.location=('main.php?module=layanan_addon&v=$v')</script>";
        }
    }
}


?>