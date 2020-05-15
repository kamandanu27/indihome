<?php
include "koneksi/config.php";
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'admin'){
        if($_GET['act'] == 't'){
            $nik            = $_POST['nik'];
            $nama_karyawan  = $_POST['nama_karyawan'];
            $id_kab_kota    = $_POST['kota'];
            
            $query = "INSERT into tbl_user(username,password,level) 
            values ('$nik','$nik','karyawan')";
            $hasil = mysqli_query($con, $query);
        
            $q_user		= mysqli_query($con, "select * from tbl_user order by id_user Desc");
            $id 		= mysqli_fetch_array($q_user);
            $id_user 	= $id['id_user'];
                
        
            mysqli_query($con,"insert into tbl_karyawan(nik,nama_karyawan,id_kab_kota,id_user) 
            values('$nik','$nama_karyawan','$id_kab_kota','$id_user')");
            
            echo "<script>window.alert('Data karyawan Berhasil Ditambahkan');
            window.location=('main.php?module=karyawan')</script>";
        
        }
        
        if($_GET['act'] == 'e'){
            $nik            = $_POST['nik'];
            $nama_karyawan  = $_POST['nama_karyawan'];
            $id_kab_kota    = $_POST['kota'];
            $password       = $_POST['password'];
        
            if($password == ''){
                mysqli_query($con, "UPDATE tbl_karyawan SET nama_karyawan = '$nama_karyawan',
                                    id_kab_kota = '$id_kab_kota'
                                    WHERE nik = '$nik'");
                echo "<script>window.alert('Data karyawan Berhasil Dirubah');
                        window.location=('main.php?module=karyawan')</script>";
        
            }else{
                mysqli_query($con, "UPDATE tbl_user SET password = '$password'
                                    WHERE username = '$nik'");
                                    
                mysqli_query($con, "UPDATE tbl_karyawan SET nama_karyawan = '$nama_karyawan',
                                    id_kab_kota = '$id_kab_kota'
                                    WHERE nik = '$nik'");
                echo "<script>window.alert('Data karyawan Berhasil Dirubah');
                        window.location=('main.php?module=karyawan')</script>";
        
            }
        
                
            mysqli_query($con, "UPDATE tbl_karyawan SET nama_karyawan = '$nama_karyawan',
                                    stok = '$stok',
                                    harga_jual = '$harga_jual'
                                    WHERE kode_karyawan = '$kode_karyawan'");
        
                        echo "<script>window.alert('Data karyawan Berhasil Dirubah');
                                window.location=('main.php?module=karyawan')</script>";
            
            
        
        
        }
        
        if($_GET['act'] == 'h'){
            $id		= $_GET['id'];
        
            mysqli_query($con, "Delete from tbl_karyawan where nik = '$id'");
            mysqli_query($con, "Delete from tbl_user where username = '$id' and level = 'karyawan'");
        
            echo "<script>window.alert('Data Karyawan Berhasil Dihapus');
                    window.location=('main.php?module=karyawan')</script>";
        }
    }
}


?>