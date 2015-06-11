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
						<a href="walikelas.php">Wali kelas 7A</a>
					</li>
				</ul>
					
				<!-- try tab -->
				<ul class="tabs">
					<li class="tab-link " data-tab="tab-1"><a href="index.php/rombel/WaliKelas">Daftar Siswa</a></li>
					<li class="tab-link" data-tab="tab-2"><a href="index.php/penilaian/DKN_siswa">DKN Siswa</a></li>
					<li class="tab-link" data-tab="tab-3"><a href="index.php/penilaian/DataEkskul_siswa">Ekstrakulikuler</a></li>
					<li class="tab-link" data-tab="tab-4"><a href="index.php/absensi/kehadiran_siswa">Absensi</a></li>
                                        <li class="tab-link" data-tab="tab-4"><a href="index.php/penilaian/DataPrestasi_siswa">Prestasi</a></li>
					<li class="tab-link" data-tab="tab-5"><a href="index.php/penilaian/DataKenaikanKelas_siswa">Kenaikan Kelas</a></li>
                                        <?php if(strpos($rombel["NAMA_KURIKULUM"],'2006')!==false): ?>
                                                
                                        <li class="tab-link current" data-tab="tab-6">Akhlak dan Kepribadian</li>
                                        <?php endif; ?>
				</ul>
						
				<?php $ci = &get_instance(); 
                                      $ci->load->model('m_penilaian');
                                ?>
                                <br/>
                                <ul class="breadcrumb" style="margin: 0px 0px 0px; line-height: 0px; background-color: white;" >
					
                                        <?php 
                                        $a = 2;
                                        $i = 2;
                                        while(1): 
                                         
                                         $s_penilaian = $ci->m_penilaian->getPenilaian($mapel["KODE_MAPEL"],substr($kode, 0, $a));
                                         ?>
                                         
                                        <li>						
						<a href="<?php echo base_url()."index.php/penilaian/AkhlakdanKepribadian_Siswa/".$mapel["KODE_MAPEL"]."/". substr($kode, 0, $a) ."/".($i++); ?>"><?php echo $s_penilaian["INDIKATOR_PENILAIAN"];?></a>
						
					
                                        
                                        <?php 
                                        
                                        $a += 2;
                                        if($a>strlen($kode)) {
                                            echo "</li>";
                                            break;
                                        }
                                        else {
                                            echo '<i class="icon-angle-right"></i></li>'; 
                                        }
                                        endwhile;?>
					
				</ul>
                                <br/>
                                
				<!-- try tab -->
                                <ul class="tabs" id="pilihKI">
                                    
                                        <?php for ($i=0; $i<count($penilaian); $i++): ?>
                                   <a style="color: inherit;" href="<?php echo base_url()."index.php/penilaian/AkhlakdanKepribadian_Siswa/".$mapel["KODE_MAPEL"]."/". $penilaian[$i]->KODE_JENIS_PENILAIAN."/".($level+1)?>"><li class="tab-link tab-root " data-tab="tab-<?php echo $i+1; ?>">  <?php echo $penilaian[$i]->INDIKATOR_PENILAIAN;?>  </li></a>
                                        <?php endfor; ?>					
					
				</ul>
                                
                                <?php if(count($penilaian)==0): 
                                    
                                    $l_penilaian = $ci->m_penilaian->getPenilaian($mapel["KODE_MAPEL"],$kode);
                                    
                                    //var_dump($l_penilaian);
                                    
                                    
                                    ?>
                                <form method="post" action="<?php echo base_url().'index.php/penilaian/saveNilaiAkhlak'; ?>" >
                                <?php $state = false; ?>
                                <?php if($l_penilaian["TIPE_PENILAIAN"]==1): ?>
                                <div class="row-fluid sortable ">

									<div class=" span12">
										
											<table class="table table-bordered">
												  <thead>
													  <tr>
														  <th>No</th>
														  <th>Nama Siswa</th>
														  <th>1</th>  
														  <th>2</th>  
														  <th>3</th> 
														  <th>4</th>                                     
													  </tr>
												  </thead>   
												  <tbody>
												  	<?php
														$no = 1;
                                                                                                                $ci->load->model('m_nilai');
														?>
                                                                                                      
                                                                                                                <input type="hidden" name="kode_penilaian" value="<?php echo $l_penilaian["KODE_PENILAIAN"];?>">
                                                                                                                <input type="hidden" name="id_rombel" value="<?php echo $rombel["ID_ROMBEL"];?>">
                                                                                                                <input type="hidden" name="level" value="<?php echo $level;?>">
                                                                                                                <input type="hidden" name="kode" value="<?php echo $kode;?>">
														<?php foreach ($listSiswa as $a)	{
                                                                                                                 $siswa = $ci->m_nilai->getNilaibyKodeandId($l_penilaian["KODE_PENILAIAN"], $a->ID_SISWA); 
                                                                                                                
                                                                                                                 if (strpos($mapel["NAMA_MAPEL"],'Agama') !== false) {
                                                                                                                        if(strpos($mapel["NAMA_MAPEL"],$a->AGAMA_SISWA) !== false)  
                                                                                                                        {
                                                                                                                            
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                           continue;     
                                                                                                                        }                                                                                                                                                                                                                                                                   
                                                                                                                    }
                                                                                                                    
                                                                                                                    
                                                                                                                    $c = 2;
                                                                                                                    
                                                                                                                    while(1): 

                                                                                                                    $s = $ci->m_penilaian->getPenilaian($mapel["KODE_MAPEL"],substr($kode, 0, $c));                                                                                                                     
                                                                                                                    if($c==10) break;
                                                                                                                    if(strpos($s["INDIKATOR_PENILAIAN"],'Sendiri') || strpos($s["INDIKATOR_PENILAIAN"],'Teman') )
                                                                                                                    {
                                                                                                                        $state = true;
                                                                                                                    }
                                                                                                                    $c += 2;
                                                                                                                    endwhile;
                                                                                                                    //if($state) echo "AAA";
                                                                                                                    
                                                                                                                 //echo $l_penilaian["KODE_PENILAIAN"];
                                                                                                                 //var_dump($siswa);                                                                                                                      
                                                                                                                 
                                                                                                                //echo $l_penilaian["KODE_PENILAIAN"];
                                                                                                                 //var_dump($siswa);   
                                                                                                                   
                                                                                                                 ?>
													<tr>
														
														<td><?php echo $no++ ?></td>
														<td class="center"><?php echo $a->NAMA_SISWA; ?></td>
														<td class="center">
																  <input type="radio" name="<?php echo $a->ID_SISWA?>" id="optionsRadios" value="1" <?php if($siswa!=null && $siswa["NILAI"]==1) echo "checked" ; ?> <?php if($state==true) echo "disabled"; ?> 	>															
														</td> 
														<td class="center">
																  <input type="radio" name="<?php echo $a->ID_SISWA?>" id="optionsRadios" value="2" <?php if($siswa!=null && $siswa["NILAI"]==2) echo "checked" ;?>  <?php if($state==true) echo "disabled"; ?> >																
														</td>
														<td class="center">
																  <input type="radio" name="<?php echo $a->ID_SISWA?>" id="optionsRadios" value="3" <?php if($siswa!=null && $siswa["NILAI"]==3) echo "checked" ;?> <?php if($state==true) echo "disabled"; ?> >																
														</td>
														<td class="center" >
																  <input type="radio" name="<?php echo $a->ID_SISWA?>" id="optionsRadios" value="4" <?php if($siswa!=null && $siswa["NILAI"]==4) echo "checked" ; if($siswa==null) echo "checked" ;?> <?php if($state==true) echo "disabled"; ?> >															
														</td>                               
													</tr>   
													<?php 
                                                                                                        
                                                                                                                } ?>               
												  </tbody>
											 </table>      
										
									</div><!--/span-->
								</div>
                                    <?php elseif($l_penilaian["TIPE_PENILAIAN"]==2):?>
                                    <div class="row-fluid sortable ">

									<div class=" span12">
										<div class="box-content">
											<table class="table table-bordered">
												  <thead>
													  <tr>
														  <th>No</th>
														  <th>Nama Siswa</th>
														  <th>Nilai</th>                                       
													  </tr>
												  </thead>   
												  <tbody>
												  	<?php
														$no = 1;
														?>
                                                                                                      <input type="hidden" name="kode_penilaian" value="<?php echo $l_penilaian["KODE_PENILAIAN"];?>">
                                                                                                                <input type="hidden" name="id_rombel" value="<?php echo $rombel["ID_ROMBEL"];?>">
                                                                                                                <input type="hidden" name="level" value="<?php echo $level;?>">
                                                                                                                <input type="hidden" name="kode" value="<?php echo $kode;?>">
                                                                                                                
														<?php foreach ($listSiswa as $a)	{
                                                                                                                    $siswa = $ci->m_nilai->getNilaibyKodeandId($l_penilaian["KODE_PENILAIAN"], $a->ID_SISWA);
                                                                                                                    if (strpos($mapel["NAMA_MAPEL"],'Agama') !== false) {
                                                                                                                        if(strpos($mapel["NAMA_MAPEL"],$a->AGAMA_SISWA) !== false)  
                                                                                                                        {
                                                                                                                            
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                           continue;     
                                                                                                                        }                                                                                                                                                                                                                                                                   
                                                                                                                    }
                                                                                                                 //echo $l_penilaian["KODE_PENILAIAN"];
                                                                                                                 //var_dump($siswa);                                                                                                                      
                                                                                                                 
                                                                                                                    ?>
													<tr>
														
														<td><?php echo $no++ ?></td>
														<td class="center"><?php echo $a->NAMA_SISWA; ?></td>
														<td class="center">
                                                                                                                    <input class="input-xlarge focused" id="focusedInput" name="<?php echo $a->ID_SISWA?>" type="number" min="0" max="100" value="<?php if($siswa!=null) echo $siswa["NILAI"];?>">
																
														</td>                                
													</tr>   
													<?php } ?>               
												  </tbody>
											 </table>      
										</div>
									</div><!--/span-->
								</div>
    
                                        
                                    <?php else: ?>
                                        <div class="row-fluid sortable ">

									<div class=" span12">
										
											<table class="table table-bordered">
												  <thead>
													  <tr>
														  <th>No</th>
														  <th>Nama Siswa</th>
														  <th>Nilai</th>  
														                                   
													  </tr>
												  </thead>   
												  <tbody>
												  	<?php
														$no = 1;
                                                                                                                $ci->load->model('m_nilai');
														?>
                                                                                                      
                                                                                                                <input type="hidden" name="kode_penilaian" value="<?php echo $l_penilaian["KODE_PENILAIAN"];?>">
                                                                                                                <input type="hidden" name="id_rombel" value="<?php echo $rombel["ID_ROMBEL"];?>">
                                                                                                                <input type="hidden" name="level" value="<?php echo $level;?>">
                                                                                                                <input type="hidden" name="kode" value="<?php echo $kode;?>">
														<?php foreach ($listSiswa as $a)	{
                                                                                                                 $siswa = $ci->m_nilai->getNilaibyKodeandId($l_penilaian["KODE_PENILAIAN"], $a->ID_SISWA); 
                                                                                                                 if (strpos($mapel["NAMA_MAPEL"],'Agama') !== false) {
                                                                                                                        if(strpos($mapel["NAMA_MAPEL"],$a->AGAMA_SISWA) !== false)  
                                                                                                                        {
                                                                                                                            
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                           continue;     
                                                                                                                        }                                                                                                                                                                                                                                                                   
                                                                                                                    }
                                                                                                                 //echo $l_penilaian["KODE_PENILAIAN"];
                                                                                                                 //var_dump($siswa);                                                                                                                      
                                                                                                                 
                                                                                                                 //echo $l_penilaian["KODE_PENILAIAN"];
                                                                                                                 //var_dump($siswa);   
                                                                                                                   
                                                                                                                 ?>
													<tr>
														
														<td><?php echo $no++ ?></td>
														<td class="center"><?php echo $a->NAMA_SISWA; ?></td>
														<td class="center">
                                                                                                                        <select id="select<?php echo $a->ID_SISWA?>" name="<?php echo $a->ID_SISWA?>" data-rel="chosen">
                                                                                                                            <option value="A" <?php if($siswa!=null && $siswa["NILAI"]=="A") echo "selected"; ?>><?php echo "A"; ?></option>
                                                                                                                            <option value="AB" <?php if($siswa!=null && $siswa["NILAI"]=="AB") echo "selected"; ?>><?php echo "AB"; ?></option>
                                                                                                                            <option value="B" <?php if($siswa!=null && $siswa["NILAI"]=="B") echo "selected"; ?>><?php echo "B"; ?></option>
                                                                                                                            <option value="BC" <?php if($siswa!=null && $siswa["NILAI"]=="BC") echo "selected"; ?>><?php echo "BC"; ?></option>
                                                                                                                            <option value="C" <?php if($siswa!=null && $siswa["NILAI"]=="C") echo "selected"; ?>><?php echo "C"; ?></option>
                                                                                                                            <option value="D" <?php if($siswa!=null && $siswa["NILAI"]=="D") echo "selected"; ?>><?php echo "D"; ?></option>
                                                                                                                            <option value="E" <?php if($siswa!=null && $siswa["NILAI"]=="E") echo "selected"; ?>><?php echo "E"; ?></option>
                                                                                                                        </select>
														</td> 														                               
													</tr>   
													<?php 
                                                                                                        
                                                                                                                } ?>               
												  </tbody>
											 </table>      
										
									</div><!--/span-->
								</div>
                                    <?php endif;?>
                                    <?php if(isset($state) && $state==null || $state==false){ ?>
                                     <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                   <?php } ?>
                                </form>
                                
                                <?php endif;?>
                                
                                <!--
                                <br/>
                                <?php if($level!=2): ?>
                                <a class="btn btn-primary btn-sm active" style="color: inherit; margin-left: 0px;" href="<?php echo base_url()."index.php/penilaian/PenilainGuruMataPelajaran/".$rombel["ID_ROMBEL"]."/". substr($kode, 0, -2) ."/".($level-1)?>">
                                    
                                    <i class="icon-arrow-left"></i>
                                    Back
                                </a>
                                <?php endif;?>
                                
                                -->
				
			</div> <!-- tab content -->
		</div><!--/#content.span10-->	
	</div>	<!-- end: row fluid -->	
