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
							<a href="#">Rombel</a>
						</li>
					</ul>

					<!-- try tab -->
						<ul class="tabs">
							<li class="tab-link current" data-tab="tab-1">Data Rombongan Belajar</li>
							<li class="tab-link" data-tab="tab-3"><a href="index.php/rombel/kelolaDataRombel">Kelola Data Rombel</a></li>
						</ul>

						<div id="tab-1" class="tab-content current">
							
							<div class="row-fluid sortable">
								<div class="box span12">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Daftar Kelas</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>Tingkat</th>
											  <th>Kelas</th>
											  <th>Kurikulum/Thn Ajar</th>
											  <th>Wali Kelas</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php
										$no = 1;
										?>
										<?php foreach ($listRombel as $a)	{?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $a->TINGKAT_PENDIDIKAN; ?></td>
											<td class="center"><?php echo $a->NAMA_ROMBEL; ?></td>
											<td class="center"><?php echo $a->NAMA_KURIKULUM; ?> - <?php echo $a->NAMA_TAHUN_AJAR; ?></td>
											<td class="center"><?php echo $a->NAMA_PTK; ?></td>
											
											<td class="center">
												<button class="btn btn-mini btn-primary">Lihat Anggota Rombel</button>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								  </table>            
								</div>
								</div><!--/span-->
						
							</div><!--/row-->

						

						</div>
					
				 </div>
			
			</div><!--/.fluid-container-->
		
				<!-- end: Content -->
		</div><!--/#content.span10-->			
	
	
	<div class="clearfix"></div>
	