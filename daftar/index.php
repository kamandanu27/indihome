<?php 
require_once "../koneksi/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>Daftar IndiHome | IndiHome</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">



  <!-- Favicons -->
  <link href="https://pasangindihome.online/assets/landing/img/favicon.png" rel="icon">
  <link href="https://pasangindihome.online/assets/landing/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->

  <!-- Bootstrap CSS File -->
  <link href="../style/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../style/font-awesome.min.css" rel="stylesheet">
  <link href="../style/animate.min.css" rel="stylesheet">
  <link href="../style/ionicons.min.css" rel="stylesheet">
  <link href="../style/owl.carousel.min.css" rel="stylesheet">
  <link href="../style/lightbox.min.css" rel="stylesheet">
  <link href="../style/parsley.css" rel="stylesheet" />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!-- Main Stylesheet File -->
  <link href="../style/style.css" rel="stylesheet">

  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TZJP5DT');</script>
<!-- End Google Tag Manager -->
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TZJP5DT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.3";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <!--SCRIPT CHAT START-->

  <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '636053260554054');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=636053260554054&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
  <style type="text/css">

  	#signatureparent {
  		color:darkblue;
  		background-color:lightgray;
  		/*max-width:600px;*/
      padding-bottom:-30px;
  	}

  	/*This is the div within which the signature canvas is fitted*/
  	#signature {
      min-height:200px;
      background-color:white;
  	}

  	/* Drawing the 'gripper' for touch-enabled devices */
  	html.touch #content {
  		float:left;
  		width:92%;
  	}
  	html.touch #scrollgrabber {
  		float:right;
  		width:4%;
  		margin-right:2%;
  	}
  	html.borderradius #scrollgrabber {
  		border-radius: 1em;
  	}
    .btn-xs{
      padding:5px;
      height:30px;
    }
    .withBackgroundImage{
      background-image:url('https://pasangindihome.online/assets/images/background.png');
      background-repeat: no-repeat;
      background-size: cover;
    }
    @media(min-width: 380px) {
      .withBackgroundImage{
        background-image:url('https://pasangindihome.online/assets/images/TEMPLATE02.png');
        background-repeat: no-repeat;
        background-size: cover;
      }
    }
    label,em{
      color: #fff;
    }
    /*
      ##Device = Desktops
      ##Screen = 1281px to higher resolution desktops
    */
    .container{
            padding-left: 300px;
            padding-right: 300px;
        }
    @media (min-width: 320px) and (max-width: 680px) {
        .container{
            padding-left: 10px;
            padding-right: 10px;
        }
    }
  </style>
  </head>

  <body>

  <!--==========================
  Header
  ============================-->
  <header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="" class="twitter"></i></a>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="logo float-left">
        <a href="#"><img src="../style/logo.png" alt="" class="img-fluid"></a>
      </div>
    </div>
  </header>
  <!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro" class="clearfix" style="height:80px;">
  &nbsp;
</section><!-- #intro -->

<main id="main">
  <section id="banner" class="text-center">
    <div class="container">
        <h3>Saatnya jadi bagian internet cepat mulai dari sekarang</h3>
    </div>
  </section>

  <!--==========================
    About Us Section
  ============================-->
  <section id="about" class="section-bg withBackgroundImage">
    <div class="container" style="">
      <div class="text-center">
        <label><h1>Registrasi Sekarang</h1></label>
      </div>
      <div class="rows">
        <div class="">
          <form method="POST" action="../aksi_pelanggan.php?act=t" data-parsley-validate="true" enctype="multipart/form-data">

          <div class="form-group ">
             <label for="name">Pilih Paket *</label>
             <select class="form-control" id="id_paket" name="id_paket" style="font-height:8px;" pattern="[a-zA-Z0-9- .']*" data-parsley-required="true" required>
                  <option>- Pilih Paket -</option>
                  <?php
                    $q_paket = mysqli_query($con ,"SELECT * FROM tbl_paket");
                    while($paket = mysqli_fetch_array($q_paket)){
                      $harga = number_format($paket['harga'],0,',','.');
                      echo "<option value='$paket[id_paket]'>$paket[spesifikasi] - Rp. $harga</option>";
                    }
                  ?>
                </select>
          </div>

          <div class="form-group ">
             <label for="name">Nama Lengkap *</label>
             <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" pattern="[a-zA-Z0-9- .']*"
             placeholder="Masukkan nama lengkap Anda..." data-parsley-required="true" value="">
          </div>

          <div class="form-group ">
             <label for="msisdn">Nomor Handphone* (Aktif dapat dihubungi Call/WA)</label>
             <input type="tel" name="no_tlp" class="form-control" id="no_tlp" pattern="^(^08\s?)(\d{3,4}-?){2}\d{2,4}$"
             placeholder="08xxxxxxxxx" data-parsley-required="true" data-parsley-type="digits" value=""
              minlength="10" maxlength="13">
          </div>

          <div class="form-group ">
              <label for="email">Email *</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
              placeholder="Masukkan alamat email Anda..."
              pattern="[a-z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-z0-9-]+(\.[a-z0-9-]+)*"
              data-parsley-required="true" value="">
          </div>

          <div class="form-group ">
              <label for="email">Password *</label>
              <input type="text" name="password" class="form-control" id="password" aria-describedby="password"
              placeholder="Masukkan Password..."
              pattern="[a-zA-Z0-9- .']*"
              data-parsley-required="true" value="">
          </div>

          <div class="form-group ">
            <label for="email">Alamat Pemasangan *</label>
            <input type="text" name="alamat" class="form-control" id="alamat" 
            placeholder="Masukkan alamat lengkap pemasangan Anda..."
            data-parsley-required="true" value="">
            <em style="font-size:12px;">(Misal: Perum XXX, Blok A No.1, Jl. Jend. Gatot Subroto, RT.1/RW.4)</em>
          </div>

          <div class="form-group ">
              <label for="email">Kota *</label>
              <select class="form-control" id="id_kab_kota" name="id_kab_kota" style="text-transform: capitalize;" data-parsley-required="true">
                <option>- Pilih Kota -</option>
                <?php 
                $sql_kab_kota = mysqli_query($con,"SELECT * FROM tbl_kab_kota where id_provinsi = '63' ORDER BY id_kab_kota ASC");                   
                  while($rs_kab_kota = mysqli_fetch_assoc($sql_kab_kota)){ 
                  echo '<option value="'.$rs_kab_kota['id_kab_kota'].'">'.$rs_kab_kota['nama_kab_kota'].'</option>';
                  }
                ?>
                                            
              </select>
          </div>

          <div class="form-group ">
              <label for="email">Kecamatan *</label>
              <select class="form-control" id="id_kecamatan" name="id_kecamatan" data-parsley-required="true">
                <option>- Pilih Kecamatan -</option>
              </select>
          </div>

          <div class="form-group ">
              <label for="email">Kelurahan *</label>
              <select class="form-control" id="id_kelurahan" name="id_kelurahan" data-parsley-required="true">
                <option>- Pilih Kelurahan -</option>
              </select>
          </div>

            <div id="full123">
                
                <div class="form-group  has-feedback has-feedback-left">
                    <label for="msisdn">Upload Foto KTP/SIM/Paspor *</label>
                    <a href="#uploadKtp" data-toggle="modal" class="btn btn-danger btn-xs">Panduan</a>
                    <div class="input-group">
                      <input type="file" name="foto_ktp" id="foto_ktp" class="form-control" accept="image/*;capture=camera" data-parsley-required="true">
                    </div>
                    <div><em>Max: 10 M, *.jpg,*.png</em></div>
                </div>

                <div class="form-group  has-feedback has-feedback-left">
                    <label for="msisdn">Upload Selfie dengan KTP/SIM/Paspor *</label>
                    <a href="#uploadSelfie" data-toggle="modal" class="btn btn-danger btn-xs">Panduan</a><br>
                    <a href="#photo_selfie" id="image"><img src="../style/sample_selfie.jpeg" width="200"></a>
                    <div class="input-group">
                      <input type="file" id="foto_selfie" name="foto_selfie" class="form-control" accept="image/*;capture=camera" data-parsley-required="true">
                    </div>
                    <div><em>Max: 10 M, *.jpg,*.png</em></div>
                                    </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger" id="inputSubmit" style="margin-bottom:30px;">
                        <span id="sv_load-text">SUBMIT</span>
                    </button>
                  
                </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section><!-- #about -->
  <div class="modal fade" id="modal_default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Input Gagal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger m-b-0">
						<h5><i class="fa fa-info-circle"></i> Mohon isi lagi</h5>
						<p>
                          </p>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>
  <div class="modal fade" id="uploadKtp">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Panduan Upload KTP/SIM/Paspor</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<div class="alert m-b-0">
            <b>Desktop</b><br>
            1. Siapkan photo KTP di komputer/laptop Anda<br>
            2. Pastikan photo KTP mudah terbaca dan jelas (Tidak Blur)<br><br>
            <b>Mobile</b><br>
            1. Siapkan photo KTP di Photo Library Handphone Anda atau ambil photo langsung dari kamera Anda<br>
            2. Pastikan photo KTP mudah terbaca dan jelas (Tidak Blur)<br><br>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>
  <div class="modal fade" id="uploadSelfie">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Panduan Upload Selfie dengan KTP/SIM/Paspor</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">
					<div class="alert m-b-0">
            <img src="https://pasangindihome.online/assets/images/ferry.jpg" style="width:95%" img="img-responsive">
            <b>Desktop</b><br>
            1. Siapkan photo Selfie dengan KTP di komputer/laptop Anda<br>
            2. Pastikan photo Selfie dengan KTP mudah terbaca dan jelas (Tidak Blur)<br><br>
            <b>Mobile</b><br>
            1. Siapkan photo Selfie dengan KTP di Photo Library Handphone Anda atau ambil photo langsung dari kamera Anda<br>
            2. Pastikan photo Selfie dengan KTP mudah terbaca dan jelas (Tidak Blur)<br><br>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>
  <div class="modal modal-message fade" id="syaratKetentuan">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Syarat dan Kententuan</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body" id="sk" style="font-size:12px;overflow-wrap: break-word;">
          S&K
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Close</a>
				</div>
			</div>
		</div>
	</div>
</main>

    <!--==========================
      Footer
      ============================-->
      <footer id="footer" class="section-bg">
      </footer><!-- #footer -->

      <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
      <!-- Uncomment below i you want to use a preloader -->
      <!-- <div id="preloader"></div> -->

    <!-- JavaScript Libraries -->
    <script src="../style/js/jquery.min.js"></script>
    <script src="../style/js/jquery-migrate.min.js"></script>
    <script src="../style/js/bootstrap.bundle.min.js"></script>
    <script src="../style/js/easing.min.js"></script>
    <script src="../style/js/mobile-nav.js"></script>
    <script src="https://pasangindihome.online/assets/landing/lib/wow/wow.min.js"></script>
    <script src="https://pasangindihome.online/assets/landing/lib/waypoints/waypoints.min.js"></script>
    <script src="https://pasangindihome.online/assets/landing/lib/counterup/counterup.min.js"></script>
    <script src="https://pasangindihome.online/assets/landing/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://pasangindihome.online/assets/landing/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="https://pasangindihome.online/assets/landing/lib/lightbox/js/lightbox.min.js"></script>
    <script src="https://pasangindihome.online/assets/colorsthemes/plugins/select2/dist/js/select2.min.js"></script>
  	<script src="https://pasangindihome.online/assets/colorsthemes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://pasangindihome.online/assets/colorsthemes/plugins/parsley/dist/parsley.js"></script>

    <!-- Template Main Javascript File -->
    <script src="https://pasangindihome.online/assets/landing/js/main.js"></script>
    <script>


    //saat pilihan provinsi di pilih, maka akan mengambil data kota
    //di data-wilayah.php menggunakan ajax
    $("#id_kab_kota").change(function(){
      var id_kab_kota = $(this).val(); 
      $.ajax({
          type: "POST",
          dataType: "html",
          url: "../data_wilayah.php?jenis=kecamatan",
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
          url: "../data_wilayah.php?jenis=kelurahan",
          data: "id_kecamatan="+id_kecamatan,
          success: function(msg){
            $("select#id_kelurahan").html(msg);                                                      
          }
      });                   
    }); 

    </script>

    <!-- <script src="https://pasangindihome.online/assets/jSignature/modernizr.js"></script> -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="https://pasangindihome.online/assets/jSignature/flashcanvas.js"></script>
    <![endif]-->
    <script type="text/javascript">
    //jQuery.noConflict()
    </script>
    <script>
    /*  @preserve
    jQuery pub/sub plugin by Peter Higgins (dante@dojotoolkit.org)
    Loosely based on Dojo publish/subscribe API, limited in scope. Rewritten blindly.
    Original is (c) Dojo Foundation 2004-2010. Released under either AFL or new BSD, see:
    http://dojofoundation.org/license for more information.
    */
    (function($) {
    	var topics = {};
    	$.publish = function(topic, args) {
    	    if (topics[topic]) {
    	        var currentTopic = topics[topic],
    	        args = args || {};

    	        for (var i = 0, j = currentTopic.length; i < j; i++) {
    	            currentTopic[i].call($, args);
    	        }
    	    }
    	};
    	$.subscribe = function(topic, callback) {
    	    if (!topics[topic]) {
    	        topics[topic] = [];
    	    }
    	    topics[topic].push(callback);
    	    return {
    	        "topic": topic,
    	        "callback": callback
    	    };
    	};
    	$.unsubscribe = function(handle) {
    	    var topic = handle.topic;
    	    if (topics[topic]) {
    	        var currentTopic = topics[topic];

    	        for (var i = 0, j = currentTopic.length; i < j; i++) {
    	            if (currentTopic[i] === handle.callback) {
    	                currentTopic.splice(i, 1);
    	            }
    	        }
    	    }
    	};
    })(jQuery);

    </script>
    <script src="https://pasangindihome.online/assets/jSignature/jSignature.min.noconflict.js"></script>
    <script>
    (function($){

    $(document).ready(function() {

    	// This is the part where jSignature is initialized.
    	var $sigdiv = $("#signature").jSignature({ 'signatureLine': false,height: 150,width:'100%','decor-color':'transparent','margin-bottom':'0px'})

    	// All the code below is just code driving the demo.
    	, $tools = $('#tools')
    	, $extraarea = $('#displayarea')
    	, pubsubprefix = 'jSignature.demo.'

    	var export_plugins = $sigdiv.jSignature('listPlugins','export')
    	, chops = ['<span><b>Extract signature data as: </b></span><select>','<option value="">(select export format)</option>']
    	, name
    	for(var i in export_plugins){
    		if (export_plugins.hasOwnProperty(i)){
    			name = export_plugins[i]
    			chops.push('<option value="' + name + '">' + name + '</option>')
    		}
    	}
    	chops.push('</select><span><b> or: </b></span>')
      $("#signature").bind('change', function(e){
        var data = $sigdiv.jSignature('getData', 'image');
        $('#signatureText').val(data);
      })
      $('#loadSign').on('click',function(){
        var data = $sigdiv.jSignature('getData', 'image');
        $('#signatureText').val(data);
      });
      $('#resetSign').on('click',function(){
        $sigdiv.jSignature('reset');
        $('#signatureText').val('');
      });
    })

    })(jQuery)

    </script>

  </body>
  </html>