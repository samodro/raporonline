<body>
		<div class="container-fluid-full">
			
			<div class="row-fluid">
				
				<!-- start: Content -->
				<div id="content" class="span10">
					<!--?php include ("navigation.php"); ?-->
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.html">Home</a>
							<i class="icon-angle-right"></i> 
						</li>
						<li>
							<i class="icon-edit"></i>
							<a href="#">Data Siswa</a>
						</li>
					</ul>

					<!-- try tab -->
						<ul class="tabs">
							<li class="tab-link " data-tab="tab-1"><a href="index.php/ptk/KelolaDataPesertaDidik">Tambah Peserta Didik</a></li>
							<li class="tab-link current" data-tab="tab-2">Data Peserta Didik</li>
						</ul>

						<div id="tab-2" class="tab-content current">
							
							<div class="row-fluid sortable">
								<div class="container">
								<div class="box span12">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Peserta Didik</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>NIS</th>
											  <th>NISN</th>
											  <th>Nama</th>
											  <th>Status</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php
										$no = 1;
										?>
									  	<?php foreach ($DaftarSiswa as $a)	{?>
										<tr>
										<tr>
											<td><?php echo $no++ ?></td>
											<td class="center"><?php echo $a->NIS_SISWA; ?></td>
											<td class="center"><?php echo $a->NISN_SISWA; ?></td>
											<td class="center"><?php echo $a->NAMA_SISWA; ?></td>
											<td class="center">
												<span class="label label-success">Aktif</span>
											</td>
											<td class="center">	
												<a href="#" class="btn-setting"><button class="btn btn-mini btn-warning">Edit</button></a>	
												<a href="<?php echo site_url ('ptk/hapusPesertaDidik/'.$a->ID_SISWA)?>"><button class="btn btn-mini btn-danger">Hapus</button></a>	
											</td>
										</tr>
										<?php } ?> 
									</tbody>
									</table>            
								</div>
								</div><!--/span-->
								</div>
							</div> <!-- -row fluid-->
					
					  
						</div> <!-- tab content -->
			
				</div><!--/#content.span10-->	
		
				
			</div>	<!-- end: row fluid -->	
		
			
		</div> <!-- container full fluid-->
	
	
	<div class="clearfix"></div>