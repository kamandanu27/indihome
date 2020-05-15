<?php 
require_once('../koneksi/config.php');

if(isset($_GET['acti'])){

    //tampilkan semua data
    if($_GET['acti'] == 'Tampil'){
        $data = array();
        if ($result = mysqli_query($con, "SELECT * FROM tbl_karyawan 
        inner join tbl_kab_kota on tbl_karyawan.id_kab_kota = tbl_kab_kota.id_kab_kota 
        inner join tbl_user on tbl_karyawan.id_user = tbl_user.id_user
        ORDER BY tbl_karyawan.nik ASC")) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        }
        mysqli_close($con);
    }
    if($_GET['acti'] == 'Hapus'){
        if (isset($_GET['id'])) {
            $id  = $_GET['id'];
            
            mysqli_query($con, "DELETE FROM tbl_karyawan WHERE nik = '$id'");

            if(mysqli_error($con)){
                $response = array(
                    'status' => '200',
                    'message' => 'Sukses'
                );
                  echo json_encode($response);
            } else {
                $response = array(
                    'status' => '410',
                    'message' => 'Tidak Tersedia'
                );
                  echo json_encode($response);
            }
        } else {
            $response = array(
                'status' => '404',
                'message' => 'Tidak Ditemukan'
            );
              echo json_encode($response);
        }
    }
    
}else{
    $response = array(
        'status' => '403',
        'message' => 'Access Forbidden'
      );
      echo json_encode($response);
}

?>