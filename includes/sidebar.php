<div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="main.php?module=home"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
					<?php 
					if ($_SESSION['level'] == 'admin'){
					?>
						<li>
							<a href=""><i class="fa fa-sitemap"></i> Input Data<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="main.php?module=karyawan">Data Karyawan</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="main.php?module=paket"><i class="fa fa-desktop"></i> Laporan Master Paket</a>
						</li>
						<li>
							<a href="main.php?module=addon"><i class="fa fa-desktop"></i> Laporan Master Addon</a>
						</li>
						<li>
							<a href=""><i class="fa fa-sitemap"></i> Laporan Pelanggan<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="main.php?module=laporan_pelanggan&cari=Aktif"> Aktif</a>
								</li>
								<li>
									<a href="main.php?module=laporan_pelanggan&cari=Berhenti"> Berhenti</a>
								</li>
							</ul>
						</li>
						<li>
							<a href=""><i class="fa fa-sitemap"></i> Laporan Gangguan<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="main.php?module=layanan_gangguan&cari=Antri"> Status Antri</a>
								</li>
								<li>
									<a href="main.php?module=layanan_gangguan&cari=Proses"> Status Dalam Proses</a>
								</li>
								<li>
									<a href="main.php?module=layanan_gangguan&cari=Selesai"> Status Selesai</a>
								</li>
							</ul>
						</li>
						<li>
							<a href=""><i class="fa fa-sitemap"></i> Laporan Upgrade Addon<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="main.php?module=laporan_upgrade&cari=1"> Permintaan Upgrade</a>
								</li>
								<li>
									<a href="main.php?module=laporan_upgrade&cari=2"> Permintaan Berhenti</a>
								</li>
								<li>
									<a href="main.php?module=laporan_upgrade&cari=3"> Pelanggan Aktif</a>
								</li>
								<li>
									<a href="main.php?module=laporan_upgrade&cari=4"> Pelanggan Berhenti</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="main.php?module=laporan_pembayaran"><i class="fa fa-desktop"></i> Laporan Pembayaran</a>
						</li>
						<li>
							<a href=""><i class="fa fa-sitemap"></i> Laporan Rekap<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="main.php?module=menu_rekap&cari=pelanggan"> Wilayah Pelanggan</a>
								</li>
								<li>
									<a href="main.php?module=menu_rekap&cari=gangguan"> Wilayah Gangguan</a>
								</li>
								<li>
									<a href="main.php?module=menu_rekap&cari=pendapatan"> Wilayah Pendapatan</a>
								</li>
							</ul>
						</li>
						
					<?php 
					}else if ($_SESSION['level'] == 'karyawan'){
					?>
						<li>
							<a href=""><i class="fa fa-sitemap"></i> Data Pelanggan<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="main.php?module=pelanggan_baru">Data Pelanggan Baru</a>
								</li>
								<li>
									<a href="main.php?module=pelanggan_aktif">Data Pelanggan Aktif</a>
								</li>
								<li>
									<a href="main.php?module=pelanggan_berhenti">Data Pelanggan Berhenti</a>
								</li>
							</ul>
						</li>
						<li>
							<a href=""><i class="fa fa-sitemap"></i> Layanan Add-on<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="main.php?module=layanan_addon&v=1"> Permintaan Aktifasi</a>
								</li>
								<li>
									<a href="main.php?module=layanan_addon&v=2"> Data Pelanggan Aktif</a>
								</li>
								<li>
									<a href="main.php?module=layanan_addon&v=3"> Permintaan Berhenti</a>
								</li>
								<li>
									<a href="main.php?module=layanan_addon&v=4"> Data Berhenti Langganan</a>
								</li>
							</ul>
						</li>
						<li>
							<a href=""><i class="fa fa-sitemap"></i> Layanan Gangguan<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li>
									<a href="main.php?module=layanan_gangguan&cari=Antri"> Status Antri</a>
								</li>
								<li>
									<a href="main.php?module=layanan_gangguan&cari=Proses"> Status Dalam Proses</a>
								</li>
								<li>
									<a href="main.php?module=layanan_gangguan&cari=Selesai"> Status Selesai</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="main.php?module=addon"><i class="fa fa-desktop"></i> Master Addon</a>
						</li>
						<li>
							<a href="main.php?module=paket"><i class="fa fa-desktop"></i> Master Paket</a>
						</li>
					<?php 
					}else if ($_SESSION['level'] == 'pelanggan'){
						$q_cek = mysqli_query($con, "select * from tbl_user 
						inner join tbl_pelanggan on tbl_user.id_user = tbl_pelanggan.id_user where tbl_user.id_user = '$_SESSION[id_user]' and tbl_pelanggan.status = 'Aktif'");
						if(mysqli_num_rows($q_cek) > 0){
						?>
							<li>
								<a href="main.php?module=p_addon"><i class="fa fa-plus"></i> Tambah Add On</a>
							</li>
							<li>
								<a href="main.php?module=lapor_gangguan"><i class="fa fa-flag"></i> Lapor Gangguan</a>
							</li>
							<li>
								<a href="main.php?module=riwayat_gangguan"><i class="fa fa-qrcode" aria-hidden="true"></i> Riwayat Lapor Gangguan</a>
							</li>
						<?php 
						}
					}
					?>
                </ul>
            </div>