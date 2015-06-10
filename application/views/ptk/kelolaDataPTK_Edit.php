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
							<li class="tab-link current" data-tab="tab-1">Tambah PTK</li>
							<li class="tab-link" data-tab="tab-2"><a href="index.php/ptk/LihatDataPTK">Data PTK</a></li>
						</ul>

						<div id="tab-1" class="tab-content current">
							<div class="row-fluid sortable">
								<div class="span6">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white edit"></i><span class="break"></span>Data PTK</h2>
									</div>
									
									<div class="box-content">
										<form method="POST" action="<?php echo site_url('ptk/doEdit_DataPTK'); ?>" class="form-horizontal">
										  <?php foreach($daftar->result() as $a) :?>
										  <fieldset>
										  	
										  	<div class="control-group hidden">
												<label class="control-label" for="selectError">Id PTK</label>
													<div class="controls">
														<input class="input-xlarge focused" name="id_ptk" id="focusedInput"  type="text" value="<?php echo $a->ID_PTK; ?>">
													</div>
												
											</div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NIP</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="nip_ptk" id="focusedInput" type="text" value="<?php echo $a->NIP_PTK; ?>">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NUPTK</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="nuptk_ptk" id="focusedInput" type="text" value="<?php echo $a->NUPTK_PTK; ?>">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NIK PTK</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="nik_ptk" id="focusedInput" type="text" value="<?php echo $a->NIK_PTK; ?>">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama PTK</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="nama_ptk" id="focusedInput" type="text" value="<?php echo $a->NAMA_PTK; ?>">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Tempat Lahir</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="tmpt_lhr_ptk" id="focusedInput" type="text" value="<?php echo $a->TMPT_LHR_PTK; ?>">
												</div>
											  </div>
											<div class="control-group">
											  <label class="control-label" for="date01">Tanggal Lahir</label>
											  <div class="controls">
												<input type="text" name="tgl_lhr_ptk" class="input-xlarge datepicker" id="date01" value="TGL_LHR_PTK">
											  </div>
											</div>
											
											
											  <div class="control-group">
												<label class="control-label" for="selectError">Agama</label>
												<div class="controls">
												  <select id="selectError" name="agama_ptk" data-rel="chosen">
												  	<option value='<?php echo $a->JK_PTK; ?>' selected='selected'><?php echo $a->JK_PTK; ?></option>
													<option value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Katolik">Katolik</option>
													<option value="Hindu">Hindu</option>
													<option value="Budha">Budha</option>
												  </select>
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Alamat PTK</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="alamat_ptk"  id="focusedInput" type="text" value="<?php echo $a->ALAMAT_PTK; ?>">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">No Telp PTK</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="notelp_ptk"  id="focusedInput" type="text" value="<?php echo $a->NOTELP_PTK; ?>">
												</div>
											 </div>
											  
											  
												<div class="form-actions">
												<input type="submit" value="Simpan" class="btn btn-primary"></input>
											  </div>
											  <div class="control-group">
												<label class="control-label" for="selectError1">Peran</label>
												<div class="controls">
												  <select id="selectError1" name="is_fungsional" data-rel="chosen">
												  	<option value='<?php echo $a->IS_FUNGSIONAL; ?>' selected='selected'><?php echo $a->IS_FUNGSIONAL; ?></option>
													<option value="kepala sekolah">Kepala Sekolah</option>
													<option value="wali kelas">Wali Kelas</option>
													<option value="guru mata pelajaran">Guru Mata Pelajaran</option>
													<option value="administrasi sekolah">Tata Usaha Sekolah</option>
												  </select>
												</div>
											  </div>
											
										<?php endforeach; ?>
										</fieldset>
										
										</form>   

									</div>
									
																	
								</div><!--/span-->
								<div class = "span6">
									<div class="masonry-gallery">
										<div id="image-12" class="masonry-thumb">
											<a style="background:url(img/gallery/photo12.jpg)" title="Sample Image 12" href="img/gallery/photo12.jpg"><img class="grayscale" src="img/gallery/photo15.jpg" alt="Sample Image 12">
											</a>
										</div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="fileInput">Unggah Foto PTK</label>
									  <div class="controls">
										<div class="uploader" id="uniform-fileInput"><input class="input-file uniform_on" id="fileInput" type="file"><span class="filename" style="-webkit-user-select: none;">Tidak ada file terpilih</span><span class="action" style="-webkit-user-select: none;">Pilih File</span></div>
									  </div>
									</div>
								</div>
								
							</div><!--/row-->
							
						</div>
						
					  
				 </div>
			
			</div><!--/.fluid-container-->
		
				<!-- end: Content -->
		</div><!--/#content.span10-->			
	
