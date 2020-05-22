<?php
include "koneksi/config.php";
if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'pelanggan'){
        if($_GET['act'] == 't'){
            $no_inet    = $_POST['no_inet'];
            $deskripsi  = $_POST['deskripsi'];
            $tgl_lapor        =  date('Y-m-d');

            $for_query = '';
            if(!empty($_POST['jenis'])){

                foreach($_POST['jenis'] as $jenis){

                $for_query .= $jenis . ', ';

                }
            }

            $for_query = substr($for_query, 0, -2);

            for ($i= 0; $i <= 1; $i++)
            {
            $no_tiket_p1 = mt_rand(1,999999); 
            $no_tiket_p2 = mt_rand(1,999999); 

            $no_tiket = $no_tiket_p1.$no_tiket_p2; 
            $q_cek = mysqli_query($con, "select * from tbl_gangguan where no_tiket_gangguan = '$no_tiket'");
                    if(mysqli_num_rows($q_cek) > 0)
                    {
                            $i = 0;
                    }else{
                            $no_tiket_gangguan = $no_tiket;
                            $i = 2;
                    }
            }
            
            $query = "INSERT into tbl_gangguan(no_tiket_gangguan,tgl_lapor,no_inet,jenis,deskripsi,status) 
            values ('$no_tiket_gangguan','$tgl_lapor','$no_inet','$for_query','$deskripsi','Antri')";
            $hasil = mysqli_query($con, $query);
            
            echo "<script>window.alert('Terimakasi. Pelaporan keluhan layanan akan segera kami proses.');
            window.location=('main.php?module=riwayat_gangguan&cari=Cari')</script>";
        
        }
        
        if($_GET['act'] == 's'){
            $no_tiket_gangguan    = $_GET['id'];

                mysqli_query($con, "UPDATE tbl_gangguan SET status = 'Selesai' where no_tiket_gangguan = '$no_tiket_gangguan'");
                echo "<script>window.alert('Status Layanan Gangguan Berhasil Dirubah');
                        window.location=('main.php?module=riwayat_gangguan&cari=Proses')</script>";
        }
        
        if($_GET['act'] == 'h'){
            $id		= $_GET['id'];
        
            mysqli_query($con, "Delete from tbl_paket where id_paket = '$id'");
        
            echo "<script>window.alert('Data Paket Berhasil Dihapus');
                    window.location=('main.php?module=paket')</script>";
        }
    }//akhir pelanggan

    if($_SESSION['level'] == 'karyawan'){
        
        if($_GET['act'] == 'p'){
            $no_tiket_gangguan    = $_GET['id'];

                mysqli_query($con, "UPDATE tbl_gangguan SET status = 'Proses' where no_tiket_gangguan = '$no_tiket_gangguan'");
                echo "<script>window.alert('Status Layanan Gangguan Berhasil Dirubah');
                        window.location=('main.php?module=layanan_gangguan&cari=Antri')</script>";
        }

    }//akhir karyawan
}


?>