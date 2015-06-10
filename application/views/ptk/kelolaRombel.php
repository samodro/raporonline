
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
							<li class="tab-link current" data-tab="tab-1">Rombongan Belajar</li>
							<li class="tab-link" data-tab="tab-3"><a href="index.php/rombel/PengaturanTugasGuru">Pemetaan Guru Mata Pelajaran</a></li>
						</ul>

						<div id="tab-1" class="tab-content current">
							<div class="row-fluid sortable">
								<div class="box span12">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Kelas</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
											<?php if($selected['NAMA_ROMBEL']=="")
										{
											echo '<form method="post" action="index.php/rombel/tambahDataRombel">';
										}
										else
											echo '<form method="post" action="index.php/rombel/editDataRombel">';
										?>
										  <fieldset>
										  	<div class="control-group hidden">
												<label class="control-label" for="focusedInput">Kode Rombongan Belajar</label>
												<div class="controls">
												  <span id="id_rombel" class="input-xlarge uneditable-input"><?php echo $selected['ID_ROMBEL']; ?></span>
												</div>
											  </div>
											  <div class="control-group hidden">
												<label class="control-label" for="focusedInput">id sekolah</label>
												<div class="controls">
												  <span id="id_sekolah" class="input-xlarge uneditable-input"><?php echo $selected['ID_SEKOLAH']; ?></span>
												</div>
											  </div>
											   
											<div class="control-group">
												<label class="control-label" for="tingkat_pendidikan">Tingkat Kelas</label>
												<div class="controls">
												  <select id="tingkat_pendidikan" data-rel="chosen" >

													<option selected='selected' value="<?php echo $selected['TINGKAT_PENDIDIKAN'] ?>"> - pilih jenjang - <?php echo $selected['TINGKAT_PENDIDIKAN']; ?></option>
													<option value="7">Kelas 7</option>
													<option value="8">Kelas 8</option>
													<option value="9">Kelas 9</option>
												  </select>
												</div>
											  </div>
											 
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama Kelas</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="nama_rombel" type="text" value="<?php echo $selected['NAMA_ROMBEL']; ?>">
												</div>
											  </div>
											  <div class="control-group">
												<label class="control-label" for="pilihKur">Kurikulum-Tahun AJar</label>
												<div class="controls">
												  <select id="id_tahun_ajar"data-rel="chosen" >
												  		<?php $c = $selected['ID_TAHUN_AJAR']; ?>
												  	<?php foreach ($listTahunAjar as $a)	{?>
												  	<?php if ($c == $a->ID_TAHUN_AJAR) {?>
													<option value="<?php echo $a->ID_TAHUN_AJAR; ?>" selected='selected'><?php echo $a->NAMA_KURIKULUM; ?>-<?php echo $a->SEMESTER; ?> <?php echo $a->NAMA_TAHUN_AJAR; ?></option>
													<?php } else {?>
													<option value="<?php echo $a->ID_TAHUN_AJAR; ?>" ><?php echo $a->NAMA_KURIKULUM; ?>-<?php echo $a->SEMESTER; ?> <?php echo $a->NAMA_TAHUN_AJAR; ?></option>
													<?php }?>
													<?php }?> 
												  </select>
												</div>
											  </div>

											  <div class="control-group">
												<label class="control-label" for="selectWaliKelas">Wali Kelas</label>
												<div class="controls">
												  <select id="id_ptk" data-rel="chosen" >
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
												  <?php if($selected['NAMA_ROMBEL']=="")
														{
															echo '<button href="'.site_url("/rombel/tambahDataRombel").'" id="tambahRombel" class="btn btn-primary">Tambah</button>';
														}
														else
														{
															echo '<button href="'.site_url("/rombel/editDataRombel" ).'" id="editRombel" class="btn btn-mini btn-warning">Simpan</button>';
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
											<td class="center"><?php echo $a->NAMA_KURIKULUM; ?> - <?php echo $a->SEMESTER; ?> <?php echo $a->NAMA_TAHUN_AJAR; ?></td>
											<td class="center"><?php echo $a->NAMA_PTK; ?></td>
											
											<td class="center">
												<a href="<?php echo site_url ('rombel/kelolaRombel/'.$a->ID_ROMBEL)?>"><button class="btn btn-mini btn-warning">Sunting</button></a>
												<a href="<?php echo site_url ('rombel/hapusDataRombel/'.$a->ID_ROMBEL)?>"><button class="btn btn-mini btn-danger">Hapus</button></a>
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
	