<div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
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
					?>
                </ul>
            </div>