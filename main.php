<?php 
require_once "koneksi/config.php";
if (!isset($_SESSION)) {
session_start();
}
  
 if(!isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url("login")."';</script>";
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
   <!-- TABLE STYLES-->
   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

    <script>


      //saat pilihan provinsi di pilih, maka akan mengambil data kota
      //di data-wilayah.php menggunakan ajax
      $("#id_kab_kota").change(function(){
      var id_kab_kota = $(this).val(); 
      $.ajax({
          type: "POST",
          dataType: "html",
          url: "data_wilayah.php?jenis=kecamatan",
          data: "id_kab_kota="+id_kab_kota,
          success: function(msg){
            $("select#id_kecamatan").html(msg); 
            getAjaxKota();                                                        
          }
      });                   
    }); 

    $("#id_kecamatan").change(function(){
      var id_kecamatan = $(this).val(); 
      $.ajax({
          type: "POST",
          dataType: "html",
          url: "data_wilayah.php?jenis=kelurahan",
          data: "id_kecamatan="+id_kecamatan,
          success: function(msg){
            $("select#id_kelurahan").html(msg);                                                      
          }
      });                   
    }); 
      
    </script>

   
</body>
</html>
