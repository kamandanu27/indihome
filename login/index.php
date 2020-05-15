<?php
require_once "../koneksi/config.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - INDIHOME</title>
    <!-- Bootstrap Core CSS -->
    <link href="../aset/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../aset/indihome.png">
    <style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .logo{
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	  width: 50%;
    }
	</style>
	</head>

	<body style="background: #eeeeee;">
      <?php 
		if(isset($_POST['login'])){
		  $user = $_POST['user'];
		  $pass = $_POST['pass'];
		  $query = mysqli_query($con, "SELECT * FROM tbl_user WHERE username = '$user' AND password = '$pass'");
		  if(mysqli_num_rows($query) == 0){
			echo "<script>alert('Login Gagal, Pastikan Username & Password Benar!');window.reload;</script>";
		  }else{
			$data = mysqli_fetch_array($query);
				$_SESSION['user'] = $user;
				$_SESSION['level'] = $data['level'];              
				echo "<script language='javascript'>alert('Login Berhasil!');window.location='../main.php?module=home';</script>";
			}
		}
		 
        ?>
	<div class="login-form" >
		<form action="" method="post">
		<img src="../assets/img/indihome.png" width="130px" height="130px" class="logo" alt="indihome">
			<h2 class="text-center" style="font-family: cursive;">Halaman Login</h2>       
			<div class="form-group">
				<input type="text" name="user" class="form-control" placeholder="Username" required="required">
			</div>
			<div class="form-group">
				<input type="password" name="pass" class="form-control" placeholder="Password" required="required">
			</div>
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
			</div>
			<div class="clearfix">
			</div>        
		</form>
		<div class="footer text-muted text-center">
			&copy; 2020. Sistem Informasi Pengolahan Data Pelanggan Indihome
		</div>
	</div> 
<script src="<?php echo base_url(); ?>/aset/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>/aset/js/bootstrap.min.js"></script>
</body>

</html>
