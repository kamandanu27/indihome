<?php
$host = "localhost";
$user = "mata7673_kamandanu27";
$pass = "kamandanu27";
$DB = "mata7673_indihome";
$con = new mysqli("$host","$user","$pass","$DB");
if($con -> connect_error){
    echo "<script>alert('Koneksi Gagal Ke Database');</script>".$con->connect_error;
}
?>