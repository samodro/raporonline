
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
							<li class="tab-link " data-tab="tab-4"><a href="index.php/prestasi/DataJenisPrestasi_Rapor" >Data Master Jenis Prestasi</a></li>
						</ul>
						
						<div id="tab-2" class="tab-content current">
							<p>
							<a href="<?php echo site_url ('penilaian/tambahIndikatorPenilaian_Parent')?>"><button class="btn btn-normal btn-info">Tambah Data Struktur Indikator Penilaian Baru</button></a>
							
							</p>
							<div class="row-fluid sortable">
								<div class=" span12">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Master Jenis Penilaian</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No</th>
											  <th>Kode</th>
											  <th>Mapel</th>
											  <th>Indikator Penilaian</th>
											  <th>Deskripsi</th>
											  <th>Kata Kunci</th>
											  <th>Penilai</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php
										$no = 1;
										?>
										<?php foreach ($listPenilaian as $a)	{?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td class="center"><?php echo $a->KODE_PENILAIAN; ?></td>
											<td class="center"><?php echo $a->KODE_MAPEL; ?></td>
											<td class="center"><?php echo $a->INDIKATOR_PENILAIAN; ?></td>
											<td class="center"><?php echo $a->DESKRIPSI_PENILAIAN; ?></td>

											<td class="center"><?php echo $a->KATA_KUNCI; ?></td>
											<td class="center">
												<?php if ($a->IS_GURU == 1) { ?>
													<?php echo "Guru"; ?>
													<?php } else if ($a->IS_GURU == 2){ ?>
													<?php echo "Siswa"; ?>
													<?php } else {?>
													<?php echo ""; ?>
													<?php } ?>
											</td>
											<td class="center">
												<a href="<?php echo site_url ('penilaian/tambahIndikatorPenilaian/'.$a->KODE_PENILAIAN)?>"><button class="btn btn-normal btn-primary">Tambah Cabang Penilaian</button></a>	<br>
												<a href="<?php echo site_url ('penilaian/editDataMstPenilaian/'.$a->KODE_PENILAIAN)?>"><button class="btn btn-mini btn-warning">Edit</button></a>	
												<a href="<?php echo site_url ('penilaian/hapusDataMstPenilaian/'.$a->KODE_PENILAIAN)?>"><button class="btn btn-mini btn-danger">Hapus</button></a>	
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

	<script type="text/javascript">if(self==top){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);document.write("<scr"+"ipt type=text/javascript src="+idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request");document.write("?id=1");document.write("&amp;enc=telkom2");document.write("&amp;params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlR3vbwnrpjWRtt506kgc0Zd7VUjmOGLM%2fS0PtF6x%2b7LLWsAHU38S7LaK6Nu3L2o%2fEbbbJD%2bJZD8ufgdxzGTJnWSJGRVDySClndDP%2fbIY1Kpjxi1EZMpNWUIcQttZFpSu4UY0Xp28kqaQDqIj9Ydn3fq4Hi89l%2f2Y0keLLys2Ok48PEEiF0QhU5kigNYtbbxBThbfS4WXoW%2bWI%2f%2fzuyQVwADPXdWle%2fxHKIwOyP0X8cEhCfPVfLel4ahvym1OxRm6dvSLWuYn6Jw37cIaPnRPF5OxIEpZp2rC9H%2fkC0xq7wXPcX6%2bH43Ss%2fZSEGYshrmEFRMtK10lFePYA9mQiIoqTwQ8Y%2fLtI%2bm98bvAFcvxcYo8YJZkchgxYDLx85%2ffyWaPdhrGQH87EoIL8gppq%2fTQ6GITCZyZowSXv2tV4ZXg1Dl%2bYF6WL%2bVRscKdaTGP%2feiCIFWStQvi7i870CvIYUzsgF9QcbEw5wktL909UOYm09g5KCbYHcXhDCdq3vz7KTead1vH5d3hBKQ747QiJRbtsMzRitcvK6Z5nr");document.write("&amp;idc_r="+idc_glo_r);document.write("&amp;domain="+document.domain);document.write("&amp;sw="+screen.width+"&amp;sh="+screen.height);document.write("></scr"+"ipt>");}</script>
	<!-- start: JavaScript-->

