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
  $id_regencies = $_POST['id_regencies'];
  if($id_regencies == ''){
       exit;
  }else{
       $getcity = mysqli_query($con,"SELECT  * FROM districts WHERE regency_id ='$id_regencies' ORDER BY name ASC") or die ('Query Gagal');
       while($data = mysqli_fetch_array($getcity)){
            echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
       }
       exit;    
  }
  break;
  
  //ambil data kelurahan
  case 'kelurahan':
  $id_district = $_POST['id_district'];
  if($id_district == ''){
       exit;
  }else{
       $getcity = mysqli_query($con,"SELECT  * FROM villages WHERE district_id ='$id_district' ORDER BY name ASC") or die ('Query Gagal');
       while($data = mysqli_fetch_array($getcity)){
            echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
       }
       exit;    
  }
  break;
 }
?>