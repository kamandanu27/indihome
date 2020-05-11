<?php 
require_once "koneksi/config.php";
if (!isset($_SESSION)) {
session_start();
}
  
 if(!isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url("")."';</script>";
  }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Pelanggan Indihome</title>
	<link rel="icon" href="<?=base_url()?>/aset/indihome.png">
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
	<div id="wrapper">
		<?php 
		include "includes/header.php";
		?>
		<nav class="navbar-default navbar-side" role="navigation">
			<?php 
			include "includes/sidebar.php";
			?>
		</nav>
		<div id="page-wrapper" >
			<?php 
			include "includes/content.php";
			include "includes/footer.php";
			?>
		</div>
	</div>
		
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    
   
</body>
</html>
