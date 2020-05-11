<div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
					<?php 
					if ($_SESSION['level'] == 'admin'){
					?>
						<li>
							<a href=""><i class="fa fa-desktop"></i> Data Pelanggan</a>
						</li>
						<li>
							<a href=""><i class="fa fa-desktop"></i> Data Paket</a>
						</li>
						<li>
							<a href=""><i class="fa fa-desktop"></i> Data Karyawan</a>
						</li>
						<li>
							<a href=""><i class="fa fa-desktop"></i> Laporan Gangguan</a>
						</li>
					<?php 
					}else if ($_SESSION['level'] == 'pegawai'){
					?>
						<li>
							<a href=""><i class="fa fa-desktop"></i> Data Pelanggan</a>
						</li>
						<li>
							<a href=""><i class="fa fa-desktop"></i> Data Addon</a>
						</li>
						<li>
							<a href=""><i class="fa fa-desktop"></i> Data Pembayaran</a>
						</li>
					<?php 
					}
					?>
                </ul>
            </div>