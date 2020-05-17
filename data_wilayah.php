<?php
 include("koneksi/config.php");     
 switch ($_GET['jenis']) {
  //ambil data kota / kabupaten
  case 'kota':
  $id_provinsi = $_POST['id_provinsi'];
  if($id_provinsi == ''){
       exit;
  }else{
       $getcity = mysqli_query($con,"SELECT  * FROM tbl_kab_kota WHERE id_provinsi ='$id_provinsi' ORDER BY nama_kab_kota ASC") or die ('Query Gagal');
       while($data = mysqli_fetch_array($getcity)){
            echo '<option value="'.$data['id_kab_kota'].'">'.$data['nama_kab_kota'].'</option>';
       }
       exit;    
  }
  break;

  //ambil data kecamatan
  case 'kecamatan':
  $id_kab_kota = $_POST['id_kab_kota'];
  if($id_kab_kota == ''){
       exit;
  }else{
       $getcity = mysqli_query($con,"SELECT  * FROM tbl_kecamatan WHERE id_kab_kota ='$id_kab_kota' ORDER BY nama_kecamatan ASC") or die ('Query Gagal');
       while($data = mysqli_fetch_array($getcity)){
            echo '<option value="'.$data['id_kecamatan'].'">'.$data['nama_kecamatan'].'</option>';
       }
       exit;    
  }
  break;
  
  //ambil data kelurahan
  case 'kelurahan':
  $id_kecamatan = $_POST['id_kecamatan'];
  if($id_kecamatan == ''){
       exit;
  }else{
       $getcity = mysqli_query($con,"SELECT * FROM tbl_kelurahan WHERE id_kecamatan ='$id_kecamatan' ORDER BY nama_kelurahan ASC") or die ('Query Gagal');
       while($data = mysqli_fetch_array($getcity)){
            echo '<option value="'.$data['id_kelurahan'].'">'.$data['nama_kelurahan'].'</option>';
       }
       exit;    
  }
  break;
 }
?>