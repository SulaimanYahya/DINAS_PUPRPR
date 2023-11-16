<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion gradient-vertical" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
		<div class="sidebar-brand-icon">
			<img style="width: 70%; height: 70%;" src="<?= base_url('assets/img/profile/logo_bonbol.png'); ?>">
		</div>
		<div class="sidebar-brand-text mx-3">Sistem Informasi</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading mb-3">
		User <?= $user['role']; ?>
	</div>

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php
						if ($title == 'Dashboard') {
							echo "active";
						}
						?> <?php
							if ($user['id_role'] != '1') {
								echo "d-none";
							}
							?>">
		<a class="nav-link <?php if ($title == 'Dashboard') {
								echo "bghover";
							} ?>" href="<?= base_url('user'); ?>">
			<i class="fas fa-fw fa-home"></i>
			<span>Home</span></a>

	</li>


	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Menu
	</div>

	<li class="nav-item mt-2 <?php
								if ($title == 'Dashboard') {
									echo "active";
								}
								?> <?php
									if ($user['id_role'] != '2') {
										echo "d-none";
									}
									?>">
		<a class="nav-link <?php if ($title == 'Dashboard') {
								echo "bghover";
							} ?>" href="<?= base_url('homekeu'); ?>">
			<i class="fas fa-fw fa-home"></i>
			<span>Home</span></a>
	</li>

	<li class="nav-item <?php
						if ($title == 'Master Data') {
							echo "active";
						}
						?> <?php
							if ($user['id_role'] != '1') {
								echo "d-none";
							}
							?>">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
			<i class="fas fa-fw fa-laptop"></i>
			<span>Master Data</span>
		</a>
		<!--  langsung show taru di clas colapse -->
		<div id="collapsePages" class="collapse <?php
												if ($title == 'Rekening' || $title == 'Satuan' || $title == 'Responsibility' || $title == 'Akun' || $title == 'Bidang' || $title == 'Potongan' || $title == 'Sasaran' || $title == 'Program' || $title == 'Kegiatan' || $title == 'Sub Kegiatan' || $title == 'Jenis Tagihan') {
													echo "show";
												}
												?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">

				<a class="collapse-item <?php if ($title == 'Sasaran') {
											echo "bghover";
										} ?>" href="<?= base_url('sasaran'); ?>"><i class="fas fa-fw fa-list-ul"></i>&nbsp;Sasaran</a>

				<a class="collapse-item <?php if ($title == 'Program') {
											echo "bghover";
										} ?>" href="<?= base_url('program'); ?>"><i class="fas fa-fw fa-list-alt"></i>&nbsp;Program</a>

				<a class="collapse-item <?php if ($title == 'Kegiatan') {
											echo "bghover";
										} ?>" href="<?= base_url('kegiatan'); ?>"><i class="fas fa-fw fa-clipboard-list"></i>&nbsp;Kegiatan</a>

				<a class="collapse-item <?php if ($title == 'Sub Kegiatan') {
											echo "bghover";
										} ?>" href="<?= base_url('sub_kegiatan'); ?>"><i class="fas fa-fw fa-clipboard-list"></i>&nbsp;Sub Kegiatan</a>



				<a class="collapse-item <?php if ($title == 'Rekening') {
											echo "bghover";
										} ?>" href="<?= base_url('rekening'); ?>"><i class="fas fa-fw fa-credit-card"></i>&nbsp;Rekening</a>
				<a class="collapse-item <?php if ($title == 'Satuan') {
											echo "bghover";
										} ?>" href="<?= base_url('satuan'); ?>"><i class="fas fa-fw fa-list-alt"></i>&nbsp;Satuan</a>
				<a class="collapse-item <?php if ($title == 'Responsibility') {
											echo "bghover";
										} ?>" href="<?= base_url('respon'); ?>"><i class="fas fa-fw fa-user-tie"></i>&nbsp;Responsibility</a>
				<a class="collapse-item <?php if ($title == 'Potongan') {
											echo "bghover";
										} ?>" href="<?= base_url('potongan'); ?>"><i class="fas fa-fw fa-money-check-alt"></i>&nbsp;Potongan</a>

				<a class="collapse-item <?php if ($title == 'Bidang') {
											echo "bghover";
										} ?>" href="<?= base_url('bidang'); ?>"><i class="fas fa-fw fa-users"></i>&nbsp;Bidang</a>
				<a class="collapse-item <?php if ($title == 'Akun') {
											echo "bghover";
										} ?>" href="<?= base_url('akun'); ?>"><i class="fas fa-fw fa-cog"></i>&nbsp;Akun</a>
			</div>
		</div>
	</li>

	<li class="nav-item <?php
						if ($title == 'Master Data') {
							echo "active";
						}
						?> <?php
							if ($user['id_role'] != '2') {
								echo "d-none";
							}
							?>">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#daftar_tagihan" aria-expanded="true" aria-controls="daftar_tagihan">
			<i class="fas fa-fw fa-book"></i>
			<span>Daftar Tagihan</span>
		</a>
		<!--  langsung show taru di clas colapse -->
		<div id="daftar_tagihan" class="collapse <?php
													if ($title == 'Rekening' || $title == 'Satuan' || $title == 'Responsibility' || $title == 'Akun' || $title == 'Bidang' || $title == 'Potongan' || $title == 'Sasaran' || $title == 'Program' || $title == 'Kegiatan' || $title == 'Sub Kegiatan' || $title == 'Jenis Tagihan') {
														echo "show";
													}
													?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">

				<a class="collapse-item <?php if ($title == 'Format 1') {
											echo "bghover";
										} ?>" href="<?= base_url('Daftar_Tagihan/F1'); ?>"><i class="fas fa-file-invoice-dollar"></i>&nbsp;Format 1</a>

				<a class="collapse-item <?php if ($title == 'Format 2') {
											echo "bghover";
										} ?>" href="<?= base_url('Daftar_Tagihan/F2'); ?>"><i class="fas fa-file-invoice-dollar"></i>&nbsp;Format 2</a>
				<a class="collapse-item <?php if ($title == 'Format 3') {
											echo "bghover";
										} ?>" href="<?= base_url('Daftar_Tagihan/F3'); ?>"><i class="fas fa-file-invoice-dollar"></i>&nbsp;Format 3</a>
				<a class="collapse-item <?php if ($title == 'Format 4') {
											echo "bghover";
										} ?>" href="<?= base_url('Daftar_Tagihan/F4'); ?>"><i class="fas fa-file-invoice-dollar"></i>&nbsp;Format 4</a>
				<a class="collapse-item <?php if ($title == 'Format 5') {
											echo "bghover";
										} ?>" href="<?= base_url('Daftar_Tagihan/F5'); ?>"><i class="fas fa-file-invoice-dollar"></i>&nbsp;Format 5</a>

			</div>
		</div>
	</li>


	<li class="nav-item <?php
						if ($title == 'Master Data') {
							echo "active";
						}
						?> <?php
							if ($user['id_role'] != '2') {
								echo "d-none";
							}
							?>">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
			<i class="fas fa-hand-holding-usd"></i>
			<!-- <i class="fas fa-fw fa-laptop"></i> -->
			<span>Tagihan</span>
		</a>
		<!--  langsung show taru di clas colapse -->
		<div id="collapsePages" class="collapse <?php
												if ($title == 'Rekening' || $title == 'Satuan' || $title == 'Responsibility' || $title == 'Akun' || $title == 'Bidang' || $title == 'Potongan' || $title == 'Sasaran' || $title == 'Program' || $title == 'Kegiatan' || $title == 'Sub Kegiatan' || $title == 'Jenis Tagihan') {
													echo "show";
												}
												?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">

				<a class="collapse-item <?php if ($title == 'format3') {
											echo "bghover";
										} ?>" href="<?= base_url('format3'); ?>"><i class="fas fa-fw fa-list-alt"></i>&nbsp;Format 3</a>

				<a class="collapse-item <?php if ($title == 'format4') {
											echo "bghover";
										} ?>" href="<?= base_url('format4'); ?>"><i class="fas fa-fw fa-clipboard-list"></i>&nbsp;Format 4</a>

				<a class="collapse-item <?php if ($title == 'Format5') {
											echo "bghover";
										} ?>" href="<?= base_url('format5'); ?>"><i class="fas fa-fw fa-clipboard-list"></i>&nbsp;Format 5</a>
			</div>
		</div>
	</li>

	<li class="nav-item <?php
						if ($title == 'Master Data') {
							echo "active";
						}
						?> <?php
							if ($user['id_role'] != '2') {
								echo "d-none";
							}
							?>">
		<a class="nav-link" href="#" data-toggle="collapse" data-target="#lampiran" aria-expanded="true" aria-controls="lampiran">
			<i class="fas fa-file-alt"></i>
			<span>Lampiran</span>
		</a>
		<!--  langsung show taru di clas colapse -->
		<div id="lampiran" class="collapse <?php
											if ($title == 'Rekening' || $title == 'Satuan' || $title == 'Responsibility' || $title == 'Akun' || $title == 'Bidang' || $title == 'Potongan' || $title == 'Sasaran' || $title == 'Program' || $title == 'Kegiatan' || $title == 'Sub Kegiatan' || $title == 'Jenis Tagihan') {
												echo "show";
											}
											?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">

				<a class="collapse-item <?php if ($title == 'Nota Pesanan') {
											echo "bghover";
										} ?>" href="<?= base_url('lampiran/lamp1'); ?>" target="_blank"><i class="fas fa-file-invoice-dollar"></i>&nbsp;Nota Pesanan</a>

				<a class="collapse-item <?php if ($title == 'Perjalanan Dinas') {
											echo "bghover";
										} ?>" href="<?= base_url('lampiran/lamp2'); ?>" target="_blank"><i class="fas fa-file-invoice-dollar"></i>&nbsp;Perjalanan Dinas</a>

				<a class="collapse-item <?php if ($title == 'Lampiran 3') {
											echo "bghover";
										} ?>" href="<?= base_url('lampiran/lamp3'); ?>" target="_blank"><i class="fas fa-file-invoice-dollar"></i></i>&nbsp;Lampiran 3</a>

				<a class="collapse-item <?php if ($title == 'Lampiran 4') {
											echo "bghover";
										} ?>" href="<?= base_url('lampiran/lamp4'); ?>" target="_blank"><i class="fas fa-file-invoice-dollar"></i></i>&nbsp;Lampiran 4</a>
				<a class="collapse-item <?php if ($title == 'Lampiran 5') {
											echo "bghover";
										} ?>" href="<?= base_url('lampiran/lamp5'); ?>" target="_blank"><i class="fas fa-file-invoice-dollar"></i></i>&nbsp;Lampiran 5</a>
			</div>
		</div>
	</li>


	<li class="nav-item <?php
						if ($title == 'Perencanaan') {
							echo "active";
						}
						?> <?php
							if ($user['id_role'] != '1') {
								echo "d-none";
							}
							?>">
		<a class="nav-link <?php if ($title == 'Perencanaan') {
								echo "bghover";
							} ?>" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
			<i class="fas fa-fw fa-book"></i>
			<span>Perencanaan</span>
		</a>
		<!--  langsung show taru di clas colapse -->
		<div id="collapsePages2" class="collapse <?php
													if ($title == 'Renstra' || $title == 'Renja Awal' || $title == 'Renja' || $title == 'RKA') {
														echo "show";
													}
													?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item <?php if ($title == 'Renstra') {
											echo "bghover";
										} ?>" href="<?= base_url('renstra'); ?>"><i class="fas fa-fw fa-file-alt"></i>&nbsp;Renstra</a>
				<a class="collapse-item <?php if ($title == 'Renja Awal') {
											echo "bghover";
										} ?>" href="<?= base_url('renja_awal'); ?>"><i class="fas fa-fw fa-file"></i>&nbsp;Renja Awal</a>
				<a class="collapse-item <?php if ($title == 'Renja') {
											echo "bghover";
										} ?>" href="<?= base_url('renja'); ?>"><i class="fas fa-fw fa-file-contract"></i>&nbsp;Renja</a>
				<a class="collapse-item <?php if ($title == 'RKA') {
											echo "bghover";
										} ?>" href="<?= base_url('rka'); ?>"><i class="fas fa-fw fa-file-invoice"></i>&nbsp;RKA</a>
			</div>
		</div>
	</li>

	<li class="nav-item <?php
						if ($title == 'Laporan') {
							echo "active";
						}
						?> <?php
							if ($user['id_role'] != '1') {
								echo "d-none";
							}
							?>">
		<a class="nav-link <?php if ($title == 'Laporan') {
								echo "bghover";
							} ?>" href="#" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages">
			<i class="fas fa-fw fa-book-reader"></i>
			<span>Laporan</span>
		</a>
		<!--  langsung show taru di clas colapse -->
		<div id="collapsePages3" class="collapse <?php
													if ($title == 'Lap Realisasi Keu' || $title == 'Lap Realisasi Fis' || $title == 'Monev Renja' || $title == 'MRA') {
														echo "show";
													}
													?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item <?php if ($title == 'Lap Realisasi Keuangan') {
											echo "bghover";
										} ?>" href="<?= base_url('laporan_keuangan'); ?>"><i class="fas fa-fw fa-book"></i>&nbsp;Lap Realisasi Keu</a>
				<a class="collapse-item <?php if ($title == 'Lap Realisasi Fis') {
											echo "bghover";
										} ?>" href="<?= base_url('lap_fisik'); ?>"><i class="fas fa-fw fa-book"></i>&nbsp;Lap Realisasi Fis</a>
				<a class="collapse-item <?php if ($title == 'Monev Renja') {
											echo "bghover";
										} ?>" href="<?= base_url('monev_renja'); ?>"><i class="fas fa-fw fa-book"></i>&nbsp;Monev Renja</a>
				<a class="collapse-item <?php if ($title == 'MRA') {
											echo "bghover";
										} ?>" href="<?= base_url('mra'); ?>"><i class="fas fa-fw fa-book"></i>&nbsp;MRA</a>
			</div>
		</div>
	</li>

	<li class="nav-item <?php
						if ($title == 'File Dokumen') {
							echo "active";
						}
						?>">
		<a class="nav-link <?php if ($title == 'File Dokumen') {
								echo "bghover";
							} ?>" href="<?= base_url('buku'); ?>">
			<i class="fas fa-fw fa-file text-light"></i>
			<span>File Dokumen</span></a>
	</li>


	<!-- Divider -->
	<hr class="sidebar-divider">


	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->