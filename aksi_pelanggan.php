<?php
include "koneksi/config.php";
        if($_GET['act'] == 't'){
            $id_paket		= $_POST['id_paket'];
            $nama_pelanggan	= $_POST['nama_pelanggan'];
            $no_tlp		= $_POST['no_tlp'];
            $email		= $_POST['email'];
            $password		= $_POST['password'];
            $alamat		= $_POST['alamat'];
            $id_kab_kota	= $_POST['id_kab_kota'];
            $id_kecamatan	= $_POST['id_kecamatan'];
            $id_kelurahan	= $_POST['id_kelurahan'];
    
            $foto_ktp                   = $_FILES['foto_ktp']['name'];
            $lokasi_ktp                 = $_FILES['foto_ktp']['tmp_name'];
            $ukuran_ktp                 = $_FILES['foto_ktp']['size'];
            $tipe_file_ktp              = $_FILES['foto_ktp']['type'];

            $foto_selfie                   = $_FILES['foto_selfie']['name'];
            $lokasi_selfie                 = $_FILES['foto_selfie']['tmp_name'];
            $ukuran_selfie                 = $_FILES['foto_selfie']['size'];
            $tipe_file_selfie              = $_FILES['foto_selfie']['type'];
    
            $ekstensi_ktp_d         = explode('.', $foto_ktp);
            $ekstensi_ktp           = $ekstensi_ktp_d[1];

            $ekstensi_selfie_d      = explode('.', $foto_selfie);
            $ekstensi_selfie        = $ekstensi_selfie_d[1];

            $valid_file        = array('jpeg', 'jpg', 'png');
    
                if(in_array($ekstensi_ktp, $valid_file) == 0){
                        echo "<script>window.alert('Type Foto KTP Tidak Diijinkan')</script>";
                }else if($ukuran_ktp > 50000000){
                        echo "<script>window.alert('Ukuran Foto KTP Tidak Diijinkan')</script>";
                }else if(in_array($ekstensi_selfie, $valid_file) == 0){
                            echo "<script>window.alert('Type Foto Selfie Tidak Diijinkan')</script>";
                }else if($ukuran_selfie > 50000000){
                            echo "<script>window.alert('Ukuran Foto Selfie Tidak Diijinkan')</script>";
                }else{
                    $namafile_ktp = time()."_".$foto_ktp;
                    move_uploaded_file($lokasi_ktp, "assets/img/pelanggan/".$namafile_ktp);

                    $namafile_selfie = time()."_".$foto_selfie;
                    move_uploaded_file($lokasi_selfie, "assets/img/pelanggan/".$namafile_selfie);

                    $query = "INSERT into tbl_user(username,password,level) 
                    values ('$email','$password','pelanggan')";
                    $hasil = mysqli_query($con, $query);
                
                    $q_user		= mysqli_query($con, "select * from tbl_user order by id_user Desc");
                    $id 		= mysqli_fetch_array($q_user);
                    $id_user 	        = $id['id_user'];
    
                    mysqli_query($con,"insert into tbl_pelanggan(nama_pelanggan,alamat,id_kab_kota,id_kecamatan,id_kelurahan,no_tlp,email,password,foto_ktp,foto_selfie,id_paket,id_user,status) 
                    values('$nama_pelanggan','$alamat','$id_kab_kota','$id_kecamatan','$id_kelurahan','$no_tlp','$email','$password','$namafile_ktp','$namafile_selfie','$id_paket','$id_user','Belum Aktif')");
    
                    echo "<script>window.alert('Pendaftaran Berhasil. Silahkan untuk Login');
                            window.location='".base_url("login")."';</script>";
                }
            
        }
        
        
if(isset($_SESSION['level'])){
        if($_SESSION['level'] == 'karyawan' or $_SESSION['level'] == 'admin'){
                if($_GET['act'] == 'e_baru'){
                        $id_pelanggan	= $_POST['id_pelanggan'];
                        $id_paket	= $_POST['id_paket'];
                        $nama_pelanggan	= $_POST['nama_pelanggan'];
                        $id_pelanggan	= $_POST['id_pelanggan'];
                        $no_tlp		= $_POST['no_tlp'];
                        $email		= $_POST['email'];
                        $alamat		= $_POST['alamat'];
                        $id_kab_kota	= $_POST['id_kab_kota'];
                        $id_kecamatan	= $_POST['id_kecamatan'];
                        $id_kelurahan	= $_POST['id_kelurahan'];

                        if($_FILES['foto_ktp']['name'] !== ''){
                                $foto_ktp                   = $_FILES['foto_ktp']['name'];
                                $lokasi_ktp                 = $_FILES['foto_ktp']['tmp_name'];
                                $ukuran_ktp                 = $_FILES['foto_ktp']['size'];
                                $tipe_file_ktp              = $_FILES['foto_ktp']['type'];

                                $ekstensi_ktp_d         = explode('.', $foto_ktp);
                                $ekstensi_ktp           = $ekstensi_ktp_d[1];

                                $valid_file        = array('jpeg', 'jpg', 'png');

                                if(in_array($ekstensi_ktp, $valid_file) == 0){
                                        echo "<script>window.alert('Type Foto KTP Tidak Diijinkan')</script>";
                                }else if($ukuran_ktp > 50000000){
                                        echo "<script>window.alert('Ukuran Foto KTP Tidak Diijinkan')</script>";
                                }else{
                                        $namafile_ktp = time()."_".$foto_ktp;
                                        move_uploaded_file($lokasi_ktp, "assets/img/pelanggan/".$namafile_ktp);

                                        mysqli_query($con, "UPDATE tbl_pelanggan SET foto_ktp = '$namafile_ktp'
                                        WHERE id_pelanggan = '$id_pelanggan'");

                                }

                        }if($_FILES['foto_selfie']['name'] !== ''){
                                $foto_selfie                   = $_FILES['foto_selfie']['name'];
                                $lokasi_selfie                 = $_FILES['foto_selfie']['tmp_name'];
                                $ukuran_selfie                 = $_FILES['foto_selfie']['size'];
                                $tipe_file_selfie              = $_FILES['foto_selfie']['type'];

                                $ekstensi_selfie_d         = explode('.', $foto_selfie);
                                $ekstensi_selfie           = $ekstensi_selfie_d[1];

                                $valid_file        = array('jpeg', 'jpg', 'png');

                                if(in_array($ekstensi_selfie, $valid_file) == 0){
                                        echo "<script>window.alert('Type Foto selfie Tidak Diijinkan')</script>";
                                }else if($ukuran_selfie > 50000000){
                                        echo "<script>window.alert('Ukuran Foto selfie Tidak Diijinkan')</script>";
                                }else{
                                        $namafile_selfie = time()."_".$foto_selfie;
                                        move_uploaded_file($lokasi_selfie, "assets/img/pelanggan/".$namafile_selfie);

                                        mysqli_query($con, "UPDATE tbl_pelanggan SET foto_selfie = '$namafile_selfie'
                                        WHERE id_pelanggan = '$id_pelanggan'");

                                }

                        }

                        mysqli_query($con, "UPDATE tbl_pelanggan SET nama_pelanggan = '$nama_pelanggan', alamat = '$alamat', id_kecamatan = '$id_kecamatan', id_kelurahan = '$id_kelurahan', no_tlp = '$no_tlp', email ='$email', id_paket = '$id_paket' where id_pelanggan = '$id_pelanggan'");
                        
                        echo "<script>window.alert('Data Pelanggan Baru Berhasil Dirubah');
                                window.location=('main.php?module=pelanggan_baru')</script>";
                }
                if($_GET['act'] == 'h_baru'){
                        $id = $_GET['id'];
                        $q_iduser = mysqli_query($con, "select * from tbl_pelanggan where id_pelanggan = '$id'");
                        $iduser = mysqli_fetch_array($q_iduser);
                        $id_user = $iduser['id_user'];
                        
                        mysqli_query($con, "Delete from tbl_user where id_user = '$id_user'");
                        mysqli_query($con, "Delete from tbl_pelanggan where id_pelanggan = '$id'");
                        
                        echo "<script>window.alert('Data Pelanggan Baru Berhasil Dihapus');
                                window.location=('main.php?module=pelanggan_baru')</script>";
                }

                if($_GET['act'] == 'aktifkan'){
                        $id = $_GET['id'];
                        $tgl =  date('Y-m-d');

                        for ($i= 0; $i <= 1; $i++)
                        {
                        $n_inet_p1 = mt_rand(1,999999); 
                        $n_inet_p2 = mt_rand(1,999999); 

                        $n_inet = $n_inet_p1.$n_inet_p2; 

                        $q_inet = mysqli_query($con, "select * from tbl_pelanggan where no_inet = '$n_inet'");
                                if(mysqli_num_rows($q_inet) > 0)
                                {
                                        $i = 0;
                                }else{
                                        $no_inet = $n_inet;
                                        $i = 2;
                                }
                        }


                        
                        mysqli_query($con, "UPDATE tbl_pelanggan SET tgl_jtt = '$tgl', tgl_aktivasi = '$tgl', no_inet = '$no_inet', status = 'Aktif'
                                        WHERE id_pelanggan = '$id'");
                        
                        echo "<script>window.alert('Pelanggan Baru Berhasil Diaktifkan');
                                window.location=('main.php?module=pelanggan_baru')</script>";
                }

                if($_GET['act'] == 'nonaktifkan'){
                        $id = $_GET['id'];
                        $tgl =  date('Y-m-d');
                        
                        mysqli_query($con, "UPDATE tbl_pelanggan SET tgl_berhenti = '$tgl', status = 'Berhenti'
                                        WHERE id_pelanggan = '$id'");
                        
                        echo "<script>window.alert('Pelanggan Berhasil DiNonaktifkan');
                                window.location=('main.php?module=pelanggan_aktif')</script>";
                }
        }
}

?>