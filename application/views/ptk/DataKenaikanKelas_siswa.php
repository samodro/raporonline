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
					<li class="tab-link " data-tab="tab-2"><a href="index.php/penilaian/DKN_siswa">DKN Siswa</a></li>
					<li class="tab-link " data-tab="tab-3"><a href="index.php/penilaian/DataEkskul_siswa">Ekstrakulikuler</a></li>
					<li class="tab-link" data-tab="tab-4"><a href="index.php/absensi/kehadiran_siswa">Absensi</a></li>
					<li class="tab-link" data-tab="tab-4"><a href="index.php/penilaian/DataPrestasi_siswa">Prestasi</a></li>
					<li class="tab-link current" data-tab="tab-5">Kenaikan Kelas</li>
                                        <?php if(strpos($rombel["NAMA_KURIKULUM"],'2006')!==false): ?>
                                                
                                        <li class="tab-link" data-tab="tab-6"><a href="index.php/penilaian/AkhlakdanKepribadian_siswa/61/01/2">Akhlak dan Kepribadian</a></li>
                                        <?php endif; ?>
				</ul>
						
				<div id="tab-5" class="tab-content current">
					<h3>Kriteria kenaikan kelas sebagai berikut: </h3>
						<ol>
						  <li>Menyelesaikan seluruh program pembelajaran dalam dua semester pada tahun pelajaran yang diikuti</li>
						  <li>Mencapai tingkat kompetensi yang dipersyaratkan, minimal sama dengan KKM. Ketuntasan minimal untuk seluruh kompetensi dasar pada kompetensi pengetahuan dan keterampilan pada Kurikulum 2013 yaitu 2.66 (B-)</li>
						  <li>Tidak terdapat nilai sikap (KI-1 dan KI-2) pada Kurikulum 2013 kurang dari kategori baik lebih dari 3 mata pelajaran</li>
						  <li>Tidak terdapat nilai kurang dari KKM maksimal pada tiga mata pelajaran</li>
						  <li>Mendapatkan nilai memuaskan pada kegiatan ekstrakulikuler wajib (Pramuka) pada setiap semester</li>
						</ol>
					<div class="row-fluid sortable">	
						<div class=" span12">
							<div class="box-content">
								<table class="table table-bordered table-striped table-condensed">
									  <thead>
										  <tr>
											  	<th>No.</th>
												<th>Nama Siswa</th>
												<th>Status</th>                                        
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php
										$no = 1;
										?>
										<?php foreach ($DaftarSiswa_WaliKelas as $a)	{?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td class="center"><?php echo $a->NAMA_SISWA; ?></td>
											<td class="center"></td>                                   
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
