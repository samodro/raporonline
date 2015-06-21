<head>
	
	
	<link id="container" href="css/cobatab.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Content -->
			<div id="content" class="span10">
				<!--?php include ("navigation.php"); ?-->
				<ul class="breadcrumb">
					<li>
						<i class="icon-home"></i>
						<a href="#">Home</a>
						<i class="icon-angle-right"></i> 
					</li>
					<li>
						<i class="icon-edit"></i>
						<a href="walikelas.php">Wali Kelas <?php echo $rombel["NAMA_ROMBEL"]; ?></a>
					</li>
				</ul>
					
				<!-- try tab -->
				<ul class="tabs">
					<li class="tab-link " data-tab="tab-1"><a href="index.php/rombel/WaliKelas">Daftar Siswa</a></li>
					<li class="tab-link " data-tab="tab-2"><a href="index.php/penilaian/DKN_siswa">DKN Siswa</a></li>
					<li class="tab-link current" data-tab="tab-3">Ekstrakulikuler</li>
                                        
					<li class="tab-link" data-tab="tab-4"><a href="index.php/absensi/kehadiran_siswa">Absensi</a></li>
					<li class="tab-link" data-tab="tab-4"><a href="index.php/penilaian/DataPrestasi_siswa">Prestasi</a></li>
					<li class="tab-link" data-tab="tab-5"><a href="index.php/penilaian/DataKenaikanKelas_siswa">Kenaikan Kelas</a></li>
                                        <?php if(strpos($rombel["NAMA_KURIKULUM"],'2006')!==false): ?>
                                                
                                        <li class="tab-link" data-tab="tab-6"><a href="index.php/penilaian/AkhlakdanKepribadian_siswa/61/01/2">Akhlak dan Kepribadian</a></li>
                                        <?php endif; ?>
				</ul>
						
				<div id="tab-3" class="tab-content current">
					<div class="row-fluid sortable">	
						<div class=" span12">
							<div class="box-content">
								<table class="table table-bordered table-striped table-condensed">
									  <thead>
										  <tr>
											  <th>No</th>
											  <th>Nama Siswa</th>
											  <th>Ekstrakulikuler 1</th>
											  <th>Ekstrakulikuler 2</th> 
											  <th>Ekstrakulikuler 3</th>
											  <th>Aksi</th>                                         
										  </tr>
									  </thead>   
									  <tbody>
									  	<?php
										$no = 1;
										?>
										<?php foreach ($DaftarSiswa_WaliKelas as $a)	{?>
										<?php 
                                                                                    $ci = &get_instance(); 
                                                                                    $ci->load->model('m_nilai'); 
                                                                                    $siswa = $ci->m_nilai->getNilaiEkskul($a->ID_SISWA);                                                                                    
                                                                                ?>
                                                                          <form method="post" action="<?php echo base_url().'index.php/penilaian/save1Nilai'; ?>" >
                                                                                <input type="hidden" name="id_siswa" value="<?php echo $a->ID_SISWA;?>">
                                                                                <input type="hidden" name="id_rombel" value="<?php echo $id_rombel['ID_ROMBEL'];?>">
                                                                                <tr>
                                                                                        
											<td><?php echo $no++ ?></td>
                                                                                        
											<td class="center"><?php echo $a->NAMA_SISWA; ?></td>
											<td class="center">
                                                                                        <div class="form-group">                                                                                                    
                                                                                            <select id="pilihEkskul1" name='pilihEkskul1' class="form-control" >
                                                                                                    <option value='null'>-- Pilih Ekstrakulikuler --</option>
                                                                                                    <?php for($i = 0; $i<count($listEkskul) ; $i++): ?>
                                                                                                    <option value='<?php echo $listEkskul[$i]->KODE_PENILAIAN;?>' <?php if($siswa!=null && count($siswa)>0 && $siswa[0]["KODE_PENILAIAN"]== $listEkskul[$i]->KODE_PENILAIAN) { echo "selected";}?>><?php echo $listEkskul[$i]->NAMA_MAPEL;?> </option>
                                                                                                    <?php endfor; ?>
                                                                                            </select>
                                                                                        </div>
                                                                                        <input class="input-mini focused" name="nilaiEkskul1" id="focusedInput" type="text" value="<?php if($siswa!=null && count($siswa)>0){echo $siswa[0]["NILAI"];} ?>">
											</td>  
                                                                                        <td class="center">
												<div class="form-group">                                                                                                    
                                                                                        <select id="pilihEkskul2" name='pilihEkskul2' class="form-control" >
                                                                                                <option value='null'>-- Pilih Ekstrakulikuler --</option>
                                                                                                <?php for($i = 0; $i<count($listEkskul) ; $i++): ?>
                                                                                                <option value='<?php echo $listEkskul[$i]->KODE_PENILAIAN;?>'<?php if($siswa!=null && count($siswa)>1 && $siswa[1]["KODE_PENILAIAN"]== $listEkskul[$i]->KODE_PENILAIAN) { echo "selected";}?> ><?php echo $listEkskul[$i]->NAMA_MAPEL;?> </option>
                                                                                                <?php endfor; ?>
                                                                                        </select>
                                                                                        </div>
		                                        <input class="input-mini focused" name="nilaiEkskul2" id="focusedInput" type="text" value="<?php if($siswa!=null && count($siswa)>1){echo $siswa[1]["NILAI"];} ?>">
											</td>
                                                                                        <td class="center">
												<div class="form-group">
                                                                                                    
		                                            <select id="pilihEkskul3" name='pilihEkskul3' class="form-control" >
                                                                    <option value='null'>-- Pilih Ekstrakulikuler --</option>
                                                                    <?php for($i = 0; $i<count($listEkskul) ; $i++): ?>
                                                                    <option value='<?php echo $listEkskul[$i]->KODE_PENILAIAN;?>' <?php if($siswa!=null && count($siswa)>2 && $siswa[2]["KODE_PENILAIAN"]== $listEkskul[$i]->KODE_PENILAIAN) { echo "selected";}?>><?php echo $listEkskul[$i]->NAMA_MAPEL;?> </option>
                                                                    <?php endfor; ?>
		                                            </select>
		                                        </div>
		                                        <input class="input-mini focused" name="nilaiEkskul3" id="focusedInput" type="text" value="<?php if($siswa!=null && count($siswa)>2){echo $siswa[2]["NILAI"];} ?>">
											</td>
											      <td class="center">
												<a href="<?php echo site_url ('penilaian/tambahEkstra_siswa')?>"><button class="btn btn-normal btn-primary">Simpan</button></a>
												<!--<a href="<?php echo site_url ('penilaian/suntingEkstr_siswa')?>"><button class="btn btn-normal btn-danger">Edit</button></a>-->
											</td>                                
										</tr>
                                                                </form>
										<?php } ?>                    
									  </tbody>
								 </table>  
							</div>
						</div><!--/span-->
					</div><!--/row-->
				</div>
			</div> <!-- tab content -->
		</div><!--/#content.span10-->	
	</div>	<!-- end: row fluid -->	
