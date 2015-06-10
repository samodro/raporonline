<head>
	
	
	<link id="container" href="css/cobatab.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Content -->
			<div id="content" class="span10">
				<!--?php include ("navigation.php"); ?-->
				<ul class="breadcrumb">
					<li>
						<i class="icon-home"></i>
						<a href="#">Home</a>
						<i class="icon-angle-right"></i> 
					</li>
					<li>
						<i class="icon-edit"></i>
						<a href="walikelas.php">Wali kelas 7A</a>
					</li>
				</ul>
					
				<!-- try tab -->
				<ul class="tabs">
					<li class="tab-link current" data-tab="tab-1">Daftar Siswa</li>
					<li class="tab-link" data-tab="tab-2"><a href="index.php/penilaian/DKN_siswa">DKN Siswa</a></li>
					<li class="tab-link" data-tab="tab-3"><a href="index.php/penilaian/DataEkskul_siswa">Ekstrakulikuler</a></li>
					<li class="tab-link" data-tab="tab-4"><a href="index.php/absensi/kehadiran_siswa">Absensi</a></li>
					<li class="tab-link" data-tab="tab-4"><a href="index.php/penilaian/DataPrestasi_siswa">Prestasi</a></li>
					<li class="tab-link" data-tab="tab-5"><a href="index.php/penilaian/DataKenaikanKelas_siswa">Kenaikan Kelas</a></li>
				</ul>
						
				<div id="tab-1" class="tab-content current">
					<div class="row-fluid sortable">	
						<div class=" span12">
							<div class="box-content">
								<table class="table table-bordered table-striped table-condensed">
									  <thead>
										  <tr>
											  <th>No</th>
											  <th>NIS</th>
											  <th>Nama Siswa</th>
											  <th>Rapor Siswa</th>                                          
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php
										$no = 1;
										?>
										<?php foreach ($DaftarSiswa_WaliKelas as $a)	{?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td class="center"><?php echo $a->NIS_SISWA; ?></td>
											<td class="center"><?php echo $a->NAMA_SISWA; ?></td>
											<td class="center">
												<button class="btn btn-mini btn-primary">Rapor Akhir</button>
												<button class="btn btn-mini btn-info">Rapor Sisipan</button>
											</td>                                       
										</tr>      
										<?php } ?>                 
									  </tbody>
								 </table>  
							</div>
						</div><!--/span-->
					</div><!--/row-->
				</div>
			</div> <!-- tab content -->
		</div><!--/#content.span10-->	
	</div>	<!-- end: row fluid -->	
