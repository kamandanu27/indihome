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
							<a href=""><i class="fa fa-desktop"></i> Laporan Pelanggan</a>
						</li>
						<li>
							<a href=""><i class="fa fa-desktop"></i> Laporan Pembayaran</a>
						</li>
						<li>
							<a href=""><i class="fa fa-desktop"></i> Laporan Pelanggan</a>
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
							<a href="main.php?module=addon"><i class="fa fa-desktop"></i> Data Addon</a>
						</li>
						<li>
							<a href="main.php?module=paket"><i class="fa fa-desktop"></i> Data Paket</a>
						</li>
						<li>
							<a href=""><i class="fa fa-desktop"></i> Data Pembayaran</a>
						</li>
					<?php 
					}else if ($_SESSION['level'] == 'pelanggan'){
						$q_cek = mysqli_query($con, "select * from tbl_user 
						inner join tbl_pelanggan on tbl_user.id_user = tbl_pelanggan.id_user where tbl_user.id_user = '$_SESSION[id_user]' and tbl_pelanggan.status = 'Aktif'");
						if(mysqli_num_rows($q_cek) > 1){
						?>
							<li>
								<a href=""><i class="fa fa-desktop"></i> Data Pelanggan</a>
							</li>
							<li>
								<a href="main.php?module=addon"><i class="fa fa-desktop"></i> Data Addon</a>
							</li>
							<li>
								<a href="main.php?module=paket"><i class="fa fa-desktop"></i> Data Paket</a>
							</li>
							<li>
								<a href=""><i class="fa fa-desktop"></i> Data Pembayaran</a>
							</li>
						<?php 
						}
					}
					?>
                </ul>
            </div>