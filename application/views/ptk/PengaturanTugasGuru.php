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
							<li class="tab-link " data-tab="tab-1"><a href="index.php/rombel/kelolaRombel">Rombongan Belajar</a></li>
							<li class="tab-link current" data-tab="tab-3">Pemetaan Guru Mata Pelajaran</li>
						</ul>

						<div id="tab-3" class="tab-content current">
							<div class="row-fluid sortable">
								<div class="box span12">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white user"></i><span class="break"></span>Kelola Data Mengajar</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
											<?php if($selected['ID_ROMBEL']=="")
										{
											echo '<form method="post" action="index.php/rombel/tambahDataMengajar">';
										}
										else
											echo '<form method="post" action="index.php/rombel/editDataMengajar">';
										?>
										  <fieldset>
										  	 <div class="control-group hidden">
												<label class="control-label" >ID Mengajar</label>
												<div class="controls">
												 <span id="id_mengajar" class="input-xlarge uneditable-input"><?php echo $selected['ID_MENGAJAR']; ?></span>
												</div>
											  </div>
											   <div class="control-group hidden">
												<label class="control-label" >kkm nilai</label>
												<div class="controls">
												 <span id="kkm_nilai" class="input-xlarge uneditable-input"><?php echo $selected['KKM_NILAI']; ?></span>
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="id_rombel">Pilih Kelas</label>
												<div class="controls">
												  <select id="id_rombel" data-rel="chosen">
												  	<?php $c = $selected['ID_ROMBEL']; ?>
													<?php foreach ($listRombel as $a)	{?>
													<?php if ($c == $a->ID_ROMBEL) {?>
													<option value="<?php echo $a->ID_ROMBEL; ?>" selected='selected'><?php echo $a->NAMA_ROMBEL; ?></option>
													<?php } else {?>
													<option value="<?php echo $a->ID_ROMBEL; ?>"><?php echo $a->NAMA_ROMBEL; ?></option>
													<?php } ?>
													<?php } ?>
												  </select>
												</div>
											  </div>
											  <div class="control-group">
												<label class="control-label" for="kode_mapel">Mata Pelajaran</label>
												<div class="controls">
												  <select id="kode_mapel" data-rel="chosen">
												  	<?php $c = $selected['KODE_MAPEL']; ?>
													<?php foreach ($listMapel as $a){?>
													<?php if ($c == $a->KODE_MAPEL) {?>
													<option value="<?php echo $a->KODE_MAPEL; ?>" selected='selected'><?php echo $a->NAMA_MAPEL; ?></option>
													<?php } else {?>
													<option value="<?php echo $a->KODE_MAPEL; ?>"><?php echo $a->NAMA_MAPEL; ?></option>
													<?php }?>
													<?php }?> 
												  </select>
												</div>
											  </div>
											  <div class="control-group">
												<label class="control-label" for="id_ptk">Guru Pengasuh</label>
												<div class="controls">
												  <select id="id_ptk" data-rel="chosen">
													<?php $c = $selected['ID_PTK']; ?>
												  	<?php foreach ($listGuru as $a)	{?>
												  	<?php if ($c == $a->ID_PTK) {?>
													<option value="<?php echo $selected['ID_PTK']; ?>" selected='selected'><?php echo $a->NAMA_PTK; ?></option>
													<?php } else {?>
													<option value="<?php echo $a->ID_PTK; ?>" ><?php echo $a->NAMA_PTK; ?></option>
													<?php }?>
													<?php }?> 
												  </select>
												</div>
											  </div>
											 <div class="form-actions">
												  <?php if($selected['ID_ROMBEL']=="")
														{
															echo '<button href="'.site_url("/rombel/tambahDataMengajar").'" id="tambahDataMengajar" class="btn btn-primary">Tambah</button>';
														}
														else
														{
															echo '<button href="'.site_url("/rombel/editDataMengajar" ).'" id="editDataMengajar" class="btn btn-mini btn-warning">Simpan</button>';
														}
													?>
												</div>
										  </fieldset>
										
										</form>   

									</div>
								</div><!--/span-->
						
							</div><!--/row-->
						
							
							<div class="row-fluid sortable">
								<div class="box span12">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Mengajar</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>Kelas</th>
											  <th>Mata Pelajaran</th>
											  <th>Pengasuh</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php
										$no = 1;
										?>
										<?php foreach ($listMengajar as $a)	{?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td class="center"><?php echo $a->NAMA_ROMBEL; ?></td>
											<td class="center"><?php echo $a->NAMA_MAPEL; ?></td>
											<td class="center"><?php echo $a->NAMA_PTK; ?></td>
											
											<td class="center">
												<a href="<?php echo site_url ('rombel/kelolaRombel/'.$a->ID_MENGAJAR)?>"><button class="btn btn-mini btn-warning">Sunting</button></a>
												<a href="<?php echo site_url ('rombel/hapusDataRombel/'.$a->ID_MENGAJAR)?>"><button class="btn btn-mini btn-danger">Hapus</button></a>
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
	