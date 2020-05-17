<?php
// Bagian Home
if ($_GET['module']=='login'){
	include "view_login.php";
}

if ($_GET['module']=='home'){
	include "home.php";
}

if(isset($_SESSION['level'])){
    if($_SESSION['level'] == 'admin'){

		if ($_GET['module']=='karyawan'){
			include "view_karyawan.php";
		}
		if ($_GET['module']=='profil'){
			include "view_profil.php";
		}

	}

	if($_SESSION['level'] == 'karyawan'){

		if ($_GET['module']=='addon'){
			include "view_addon.php";
		}
		if ($_GET['module']=='paket'){
			include "view_paket.php";
		}
		if ($_GET['module']=='pelanggan_baru'){
			include "view_pelanggan_baru.php";
		}
		if ($_GET['module']=='pelanggan_aktif'){
			include "view_pelanggan_aktif.php";
		}
		if ($_GET['module']=='pelanggan_berhenti'){
			include "view_pelanggan_berhenti.php";
		}
		if ($_GET['module']=='profil'){
			include "view_profil.php";
		}
		
	}

	if($_SESSION['level'] == 'pelanggan'){
		if ($_GET['module']=='profil'){
			include "view_profil.php";
		}

	}

}


	
?>
