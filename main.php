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
         <!-- Morris Chart Styles-->
         <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
     <!-- charts Js -->
    <script src="assets/js/charts/Chart.min.js"></script>
    <script src="assets/js/charts/exporting.js"></script>

    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
                showGraph();
                graph_pendapatan_all();
            });
    </script>
      <!-- Custom Js -->
      <script src="assets/js/custom-scripts.js"></script>
     

    <script>
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

    $(document).on("click",".btnlaporrekap",function(){
    var type_lapor  = $("#type_lapor").val();
    var t1          = $("#t1").val();
    var t2          = $("#t2").val();

    if(type_lapor == 'Laporan Rekap Gangguan'){
      window.open('tcpdf/examples/lap_rekap_gangguan.php?&t1='+t1+'&t2='+t2);
    }
    if(type_lapor == 'Laporan Rekap Pelanggan'){
      window.open('tcpdf/examples/lap_rekap_pelanggan.php');
    }
    if(type_lapor == 'Laporan Rekap Pendapatan'){
      window.open('tcpdf/examples/lap_rekap_pendapatan.php');
    }
    
    });
      
    </script>

  <script>

        function showGraph()
        {
            {
                $.post("json_jumlah_pelanggan.php",
                function (data)
                {
                    console.log(data);
                     var b = [];
                    var jumlah = [];

                    for (var i in data) {
                        b.push(data[i].b);
                        jumlah.push(data[i].jumlah);
                    }

                    var chartdata = {
                        labels: b,
                        responsive:true,
                        datasets: [
                            {
                                label: 'Jumlah Pelanggan Aktif',
                                backgroundColor: '#f049ff',
                                borderColor: '#eb46f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data:jumlah
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");
                    var barGraph = new Chart(graphTarget, {
                        type: 'horizontalBar',
                        data: chartdata
                    });
                });
            }
        }

        function graph_pendapatan_all()
        {
            {
                $.post("json_jumlah_pendapatan.php",
                function (data)
                {
                    console.log(data);
                    var nama_kota = [];
                    var total = [];

                    for (var i in data) {
                        nama_kota.push(data[i].nama_kota);
                        total.push(data[i].total);
                    }

                    var chartdata = {
                        labels: nama_kota,
                        responsive:true,
                        animation: false,
                        datasets: [
                            {
                                label: 'Jumlah Pendapatan',
                              backgroundColor: '#f049ff',
                                borderColor: '#eb46f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data:total
                            }
                        ]
                    };


                    var graphTarget = $("#graph_pendapatan_all");
                    var barGraph = new Chart(graphTarget, {
                        type: 'horizontalBar',
                        data: chartdata
                    });
                });
            }
        }
        </script>
   
</body>
</html>
