
				<div id="content" class="span12">
					<!--?php include ("navigation.php"); ?-->
					
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.php/dinaspendidikan/index">Beranda</a>
							<i class="icon-angle-right"></i> 
						</li>
						<li>
							<i class="icon-edit"></i>
							<a href="index.php/dinaspendidikan/DataKurikulum">Data Kurikulum</a>
						</li>
					</ul>
					
					
					<ul class="tabs">
							<li class="tab-link " data-tab="tab-1" ><a href="index.php/kurikulum/DataKurikulum" >Data Kurikulum</a></li>
							<li class="tab-link current" data-tab="tab-2">Data Tahun Pelajaran</li>
							
						</ul>
						
						
						<div id="tab-2" class="tab-content current">

							<div class="row-fluid sortable">
								<div class="box span8">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white user"></i><span class="break"></span>Kelola Data Tahun Pelajaran</h2>
									</div>
									<div class="box-content">
										
										<form class="form-horizontal">
											<?php if($selected['NAMA_TAHUN_AJAR']=="")
										{
											echo '<form method="post" action="index.php/kurikulum/tambahDataTahunAjar">';
										}
										else
											echo '<form method="post" action="index.php/kurikulum/editDataTahunAjar">';
										?>
										  <fieldset>
										  	<div class="control-group">
												<label class="control-label" for="focusedInput">Kode Tahun Pelajaran</label>
												<div class="controls">
												  <span id="idTahunAjar" class="input-xlarge uneditable-input"><?php echo $selected['ID_TAHUN_AJAR']; ?></span>
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="selectError">Kurikulum</label>
												<div class="controls">
												  <select  id="idKurikulum" data-rel="chosen" >
												  	<?php $c = $selected['ID_KURIKULUM']; ?>
												  	<?php foreach ($listKurikulum as $a)	{?>
												  	<?php if ($c == $a->ID_KURIKULUM) {?>
													<option value="<?php echo $a->ID_KURIKULUM; ?>" selected='selected'><?php echo $a->NAMA_KURIKULUM; ?></option>
													<?php } else {?>
													<option value="<?php echo $a->ID_KURIKULUM; ?>" ><?php echo $a->NAMA_KURIKULUM; ?></option>
													<?php }?>
													<?php }?>
												  </select>
												</div>
											  </div>

											

											<div class="control-group">
												<label class="control-label" for="focusedInput">Semester</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="semester" type="text" value="<?php echo $selected['SEMESTER']; ?>" placeholder="contoh: GENAP">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama Tahun Pelajaran</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="namaTahunAjar"type="text" value="<?php echo $selected['NAMA_TAHUN_AJAR']; ?>" placeholder="contoh : 2014/2015">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Tahun mulai</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="tahunAwal" type="text" value="<?php echo $selected['TAHUN_AWAL']; ?>">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Tahun akhir</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="tahunAkhir"type="text" value="<?php echo $selected['TAHUN_AKHIR']; ?>">
												</div>
											  </div>
											 <div class="form-actions">
												  <?php if($selected['NAMA_TAHUN_AJAR']=="")
														{
															echo '<button href="'.site_url("/kurikulum/tambahDataTahunAjar").'" id="tambahTahunAjar" class="btn btn-primary">Tambah</button>';
														}
														else
														{
															echo '<button href="'.site_url("/kurikulum/editDataTahunAjar" ).'" id="editTahunAjar" class="btn btn-mini btn-warning">Simpan</button>';
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
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Master Tahun Pelajaran</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>Kurikulum</th>
											  <th>Semester</th>
											  <th>Tahun Ajar</th>
																				  
											  <th>Tahun mulai</th>
											  <th>Tahun akhir</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php
										$no = 1;
										?>
										<?php foreach ($listTahunAjar as $a)	{?>
										<tr>
										
											<td><?php echo $no++ ?></td>
											<td class="center"><?php echo $a->NAMA_KURIKULUM; ?></td>
											<td class="center"><?php echo $a->SEMESTER; ?></td>
											<td class="center"><?php echo $a->NAMA_TAHUN_AJAR; ?></td>
											<td class="center"><?php echo $a->TAHUN_AWAL; ?></td>
											<td class="center"><?php echo $a->TAHUN_AKHIR; ?></td>
											<td class="center">	
												<a href="<?php echo site_url ('kurikulum/DataTahunAjar/'.$a->ID_TAHUN_AJAR)?>"><button class="btn btn-mini btn-warning">Sunting</button></a>
												<a href="<?php echo site_url ('kurikulum/hapusDataTahunAjar/'.$a->ID_TAHUN_AJAR)?>"><button class="btn btn-mini btn-danger">Hapus</button></a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								  </table>            
								</div>
								</div><!--/span-->
						
							</div><!--/row-->
						
						</div>
						
					
				</div><!--/.fluid-container-->
		
				<!-- end: Content -->
			</div><!--/#content.span10-->
			
		</div><!--/fluid-row-->
		
			
	<div class="clearfix"></div>
	
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-40721121-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
