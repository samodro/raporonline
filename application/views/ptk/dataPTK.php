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
							<a href="#">Data PTK</a>
						</li>
					</ul>

					<!-- try tab -->
						<ul class="tabs">
							<li class="tab-link " data-tab="tab-1"><a href="index.php/ptk/KelolaDataPTK">Tambah PTK</a></li>
							<li class="tab-link current" data-tab="tab-2">Data PTK</li>
						</ul>

						<div id="tab-2" class="tab-content current">
							
							<div class="row-fluid sortable">
								<div class="box span12">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data PTK</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>NIP</th>
											  <th>NUPTK</th>
											  <th>Nama</th>
											  <th>Status</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
									  		<?php
										$no = 1;
										?>
									  	<?php foreach ($DaftarPTK as $a)	{?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td class="center"><?php echo $a->NIP_PTK; ?></td>
											<td class="center"><?php echo $a->NUPTK_PTK; ?></td>
											<td class="center"><?php echo $a->NAMA_PTK; ?></td>
											<td class="center">
												<span class="label label-success"></span>
											</td>
											<td class="center">
												<a href="<?php echo site_url ('ptk/editDataPTK_byAdmin/'.$a->ID_PTK)?>"><button class="btn btn-mini btn-warning">Edit</button></a>	
												<a href="<?php echo site_url ('ptk/hapusDataPTK_byAdmin/'.$a->ID_PTK)?>"><button class="btn btn-mini btn-danger">Hapus</button></a>	
											</td>
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
	
