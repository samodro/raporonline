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
						<a href="walikelas.php">Wali Kelas <?php echo $rombel["NAMA_ROMBEL"]; ?></a>
					</li>
				</ul>
					
				<!-- try tab -->
				<ul class="tabs">
					<li class="tab-link " data-tab="tab-1"><a href="index.php/rombel/WaliKelas">Daftar Siswa</a></li>
					<li class="tab-link current" data-tab="tab-2">DKN Siswa</li>
					<li class="tab-link" data-tab="tab-3"><a href="index.php/penilaian/DataEkskul_siswa">Ekstrakulikuler</a></li>
					<li class="tab-link" data-tab="tab-4"><a href="index.php/absensi/kehadiran_siswa">Absensi</a></li>
					<li class="tab-link" data-tab="tab-4"><a href="index.php/penilaian/DataPrestasi_siswa">Prestasi</a></li>
					<li class="tab-link" data-tab="tab-5"><a href="index.php/penilaian/DataKenaikanKelas_siswa">Kenaikan Kelas</a></li>
                                        <?php if(strpos($rombel["NAMA_KURIKULUM"],'2006')!==false): ?>
                                                
                                        <li class="tab-link" data-tab="tab-6"><a href="index.php/penilaian/AkhlakdanKepribadian_siswa/61/01/2">Akhlak dan Kepribadian</a></li>
                                        <?php endif; ?>
					
				</ul>	
				<div id="tab-2" class="tab-content current ">
					<div class="row-fluid sortable">	
						<div class=" span12">
							<div class="box-content">
								<table class="table table-bordered table-striped table-condensed">
									  <thead>
										  <tr>
											  <th>No</th>
											  <th>NIS</th>
											  <th>Nama Siswa</th>
											  <th>DKN Siswa</th>                                          
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
												<button class="btn btn-mini btn-primary">Lihat DKN</button>
												<button class="btn btn-mini btn-info">Cetak DKN</button>
											</td>                                       
										</tr>      
										<?php } ?>  
								 </table>  
							</div>
						</div><!--/span-->
					</div><!--/row-->
				</div>
			</div> <!-- tab content -->
		</div><!--/#content.span10-->	
	</div>	<!-- end: row fluid -->	
