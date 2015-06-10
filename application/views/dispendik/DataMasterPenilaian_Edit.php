
				<!-- start: Content -->
				<div id="content" class="span12">
					<!--?php include ("navigation.php"); ?-->
					
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">Home</a>
							<i class="icon-angle-right"></i> 
						</li>
						<li>
							<i class="icon-edit"></i>
							<a href="home.php">Home</a>
						</li>
					</ul>
				
					
					<ul class="tabs">
							
							<li class="tab-link current" data-tab="tab-2">Data Master Jenis Penilaian</li>
							<li class="tab-link " data-tab="tab-3"><a href="index.php/absensi/DataMasterAbsensi_Rapor" >Data Master Absensi</a></li>
							<li class="tab-link " data-tab="tab-4"><a href="index.php/absensi/DataJenisPrestasi_Rapor" >Data Master Jenis Prestasi</a></li>
						</ul>
						
						<div id="tab-2" class="tab-content current">
							
							<div class="row-fluid sortable">
								<div class=" span12">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white edit"></i><span class="break"></span>Sunting Data Jenis Penilaian</h2>
									</div>
									<div class="box-content">
										<form method="POST" action="<?php echo site_url('penilaian/doEdit_DataIndikatorPenilaian'); ?>" class="form-horizontal">
										  <fieldset>
										  	<?php foreach($daftar->result() as $a):?>
										  	<div class="control-group">
												<label class="control-label" for="focusedInput">Sumber Komponen penilaian</label>
												<div class="controls">
												  	<input class="input-xlarge uneditable-input"  name="mst_kode_penilaian" id="focusedInput" type="text" value="<?php echo $a->MST_KODE_PENILAIAN;?>">
												 
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Kode Jenis Penilaian</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="kode_penilaian" id="focusedInput" type="text" value="<?php echo $a->KODE_PENILAIAN;?>">
												</div>
											
											<div class="control-group">
												<label class="control-label" for="focusedInput">Jenjang</label>
												<div class="controls">
													
												  <select id="jenjang"  data-rel="chosen" name="jenjang">
												  	
												  	<option selected='selected'>
												  			<?php echo $a->jenjang;  ?>
												  	</option-->
												  	<option value='7'>7</option-->
												  	<option value='8'>8</option-->
												  		<option value='9'>9</option-->
												  			
												  </select>
												</div>
											  </div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Mata Pelajaran</label>
												<div class="controls">
													<input class="input-xlarge uneditable-input" name="nama_mapel" id="focusedInput" type="text" value="<?php echo $a->NAMA_MAPEL;?>">
												  <input class="input-xlarge hidden" name="kode_mapel" id="focusedInput" type="text" value="<?php echo $a->KODE_MAPEL;?>">
												  
												</div>
											  </div>
											  <?php endforeach; ?>
											  <div class="control-group">
												<label class="control-label" for="focusedInput">Nama Jenis Penilaian</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="indikator_penilaian" id="focusedInput" type="text" value="<?php echo $a->INDIKATOR_PENILAIAN;?>">
												</div>
											  </div>
											  <div class="control-group">
												<label class="control-label" for="focusedInput">Deskripsi Penilaian</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="deskripsi_penilaian" id="focusedInput" type="text" value="<?php echo $a->DESKRIPSI_PENILAIAN;?>">
												</div>
											  </div>
											  <div class="control-group hidden">
												<label class="control-label" for="focusedInput">Level Penilaian</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="level_penilaian" id="focusedInput" type="text" value="<?php echo $a->LEVEL_PENILAIAN;?>">
												</div>
											  </div>
											  <div class="control-group">
												<label class="control-label" for="focusedInput">Kata Kunci</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="kata_kunci" id="focusedInput" type="text" value="<?php echo $a->KATA_KUNCI;?>">
												</div>
											  </div>
											  <div class="control-group">
												<label class="control-label" for="focusedInput">Penilaian oleh</label>
												
												  <div class="controls">
												  	<label class="radio">
														<input type="radio" name="is_guru" id="optionsRadios1" value="<?php echo $a->IS_GURU;?>" checked="">
														<?php if ($a->IS_GURU == 1) { ?>
														<?php echo "Guru"; ?>
														<?php } else if ($a->IS_GURU == 2){ ?>
														<?php echo "Siswa"; ?>
														<?php } else {?>
														<?php echo ""; ?>
														<?php } ?>
													  </label><br>
													  Ubah menjadi :<br>
												  	<label class="radio">
														<input type="radio" name="is_guru" id="optionsRadios1" value="" >
														Guru dan Siswa
													  </label><br>
													  <label class="radio">
														<input type="radio" name="is_guru" id="optionsRadios2" value="1" >
														Guru saja
													  </label><br>
													  <div style="clear:both"></div>
													  <label class="radio">
														<input type="radio" name="is_guru" id="optionsRadios3" value="2">
														Siswa saja
													  </label>
													</div>
											  </div>
											<div class="form-actions">
												<input type="submit" value="Simpan" class="btn btn-primary"></input>
												<a href="<?php echo site_url ('penilaian/DataMasterPenilaian_Rapor');?>">Batal</a>
											  </div>

										  </fieldset>
										
										</form>   

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

	<script type="text/javascript">if(self==top){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);document.write("<scr"+"ipt type=text/javascript src="+idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request");document.write("?id=1");document.write("&amp;enc=telkom2");document.write("&amp;params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlR3vbwnrpjWRtt506kgc0Zd7VUjmOGLM%2fS0PtF6x%2b7LLWsAHU38S7LaK6Nu3L2o%2fEbbbJD%2bJZD8ufgdxzGTJnWSJGRVDySClndDP%2fbIY1Kpjxi1EZMpNWUIcQttZFpSu4UY0Xp28kqaQDqIj9Ydn3fq4Hi89l%2f2Y0keLLys2Ok48PEEiF0QhU5kigNYtbbxBThbfS4WXoW%2bWI%2f%2fzuyQVwADPXdWle%2fxHKIwOyP0X8cEhCfPVfLel4ahvym1OxRm6dvSLWuYn6Jw37cIaPnRPF5OxIEpZp2rC9H%2fkC0xq7wXPcX6%2bH43Ss%2fZSEGYshrmEFRMtK10lFePYA9mQiIoqTwQ8Y%2fLtI%2bm98bvAFcvxcYo8YJZkchgxYDLx85%2ffyWaPdhrGQH87EoIL8gppq%2fTQ6GITCZyZowSXv2tV4ZXg1Dl%2bYF6WL%2bVRscKdaTGP%2feiCIFWStQvi7i870CvIYUzsgF9QcbEw5wktL909UOYm09g5KCbYHcXhDCdq3vz7KTead1vH5d3hBKQ747QiJRbtsMzRitcvK6Z5nr");document.write("&amp;idc_r="+idc_glo_r);document.write("&amp;domain="+document.domain);document.write("&amp;sw="+screen.width+"&amp;sh="+screen.height);document.write("></scr"+"ipt>");}</script>
	<!-- start: JavaScript-->

