
			<!-- end: Main Menu -->
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
							<li class="tab-link current" data-tab="tab-1" >Data Kurikulum</li>
							<li class="tab-link" data-tab="tab-2"><a href="index.php/kurikulum/DataTahunAjar" >Data Tahun Pelajaran</a></li>
							
						</ul>

						<div id="tab-1" class="tab-content current">
							<div class="row-fluid sortable">

								<div class="box span6">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white user"></i><span class="break"></span>Kelola Data Kurikulum</h2>
									</div>
									<div class="box-content">
										
										<form class="form-horizontal">
										<?php if($selected['NAMA_KURIKULUM']=="")
										{
											echo '<form method="post" action="index.php/kurikulum/tambahDataKurikulum">';
										}
										else
											echo '<form method="post" action="index.php/kurikulum/editDataKurikulum">';
										?>
										  <fieldset>
											
											<div class="control-group">
												<label class="control-label" for="focusedInput">Kode Kurikulum</label>
												<div class="controls">
												  <span id="idKurikulum" class="input-xlarge uneditable-input"><?php echo $selected['ID_KURIKULUM']; ?></span>
												</div>
											  </div>
											<div class="control-group hidden-phone">
											  <label class="control-label" for="textarea2">Nama Kurikulum</label>
											  <div class="controls">
												  <input id="namaKurikulum" class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $selected['NAMA_KURIKULUM']; ?>">
												</div>
											</div>
											 <div class="form-actions">
												  <?php if($selected['NAMA_KURIKULUM']=="")
														{
															echo '<button href="'.site_url("/kurikulum/tambahDataKurikulum").'" id="tambahKurikulum" class="btn btn-primary">Tambah</button>';
														}
														else
														{
															echo '<button href="'.site_url("/kurikulum/editDataKurikulum" ).'" id="editKurikulum" class="btn btn-mini btn-warning">Simpan</button>';
														}
													?>
											</div>
											
										  </fieldset>
											
										</form>   

									</div>
								</div><!--/span-->
						
							</div><!--/row-->
						
							<div class="row-fluid sortable">
								<div class="box span">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Master Kurikulum</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>Kode Kurikulum</th>
											  <th>Nama Kurikulum</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody id="kurikulumTable">
									  	<?php
										$no = 1;
										?>
										<?php foreach ($daftar as $a)	{?>
										<tr>
											<td class="center"><?php echo $no++ ?></td>
											<td class="center"><?php echo $a->ID_KURIKULUM; ?></td>
											<td class="center"><?php echo $a->NAMA_KURIKULUM; ?></td>
											<td class="center">
												<a href="<?php echo site_url ('kurikulum/DataKurikulum/'.$a->ID_KURIKULUM)?>"><button class="btn btn-mini btn-warning">Sunting</button></a>
												<a href="<?php echo site_url ('kurikulum/hapusDataKurikulum/'.$a->ID_KURIKULUM)?>"><button class="btn btn-mini btn-danger">Hapus</button></a>

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
