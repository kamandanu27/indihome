<?php
include "koneksi/config.php";
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'karyawan' || $_SESSION['level'] == 'pelanggan'){
        
            $id_user    = $_POST['id_user'];
            $password   = $_POST['password'];

                mysqli_query($con, "UPDATE tbl_user SET password = '$password'
                                    WHERE id_user = '$id_user'");
                                    
                echo "<script>window.alert('Data User Berhasil Dirubah');
                        window.location=('main.php?module=home')</script>";
        
    }
}


?>