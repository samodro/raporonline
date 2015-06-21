<head>
	<style>
body
{
    background-color: #f7f7f7;
}

.wrapper
{
    margin: 0px auto;
}

.wrapper h1, .wrapper h4, .wrapper p, .wrapper pre, .wrapper ul, .wrapper li
{
    margin: 0;
    padding: 0;
    border: 0;
    vertical-align: baseline;
    background: transparent;
}
.wrapper h1 {
    vertical-align:middle;
    padding-bottom:20px;
}


.wrapper li
{
    outline: 0;
    text-decoration: none;
    -webkit-transition-property: background color;
    -moz-transition-property: background color;
    -o-transition-property: background color;
    -ms-transition-property: background color;
    transition-property: background color;
    -webkit-transition-duration: 0.12s;
    -moz-transition-duration: 0.12s;
    -o-transition-duration: 0.12s;
    -ms-transition-duration: 0.12s;
    transition-duration: 0.12s;
    -webkit-transition-timing-function: ease-out;
    -moz-transition-timing-function: ease-out;
    -o-transition-timing-function: ease-out;
    -ms-transition-timing-function: ease-out;
    transition-timing-function: ease-out;
}

#v-nav
{
    height: 100%;
    margin: auto;
    color: #333;
    font: 12px/18px "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, Verdana, sans-serif;
}

#v-nav >ul
{
    float: left;
    width: 210px;
    display: block;
    position: relative;
    top: 0;
    border: 1px solid #DDD;
    border-right-width: 0;
    margin: auto 0 !important;
    padding:0;
}

#v-nav >ul >li
{
    width: 180px;
    list-style-type: none;
    display: block;
    text-shadow: 0px 1px 1px #F2F1F0;
    font-size: 1.11em;
    position: relative;
    border-right-width: 0;
    border-bottom: 1px solid #DDD;
    margin: auto;
    padding: 10px 15px !important;  
    background: whiteSmoke; /* Old browsers */
    background: -moz-linear-gradient(top, #ffffff 0%, #f2f2f2 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ffffff), color-stop(100%, #f2f2f2)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top, #ffffff 0%, #f2f2f2 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top, #ffffff 0%, #f2f2f2 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top, #ffffff 0%, #f2f2f2 100%); /* IE10+ */
    background: linear-gradient(top, #ffffff 0%, #f2f2f2 100%); /* W3C */       
}

#v-nav >ul >li.current
{
    color: black;
    border-right: none;
    z-index: 10;
    background: white !important;
    position: relative;
    moz-box-shadow: inset 0 0 35px 5px #fafbfd;
    -webkit-box-shadow: inset 0 0 35px 5px #fafbfd;
    box-shadow: inset 0 0 35px 5px #fafbfd;
}

#v-nav >ul >li.first.current
{
    border-bottom: 1px solid #DDD;
}

#v-nav >ul >li.last
{
    border-bottom: none;
}

#v-nav >div.tab-content
{
    margin-left: 210px;
    border: 1px solid #ddd;
    background-color: #FFF;
    min-height: 400px;
    position: relative;
    z-index: 9;
    padding: 12px;
    moz-box-shadow: inset 0 0 35px 5px #fafbfd;
    -webkit-box-shadow: inset 0 0 35px 5px #fafbfd;
    box-shadow: inset 0 0 35px 5px #fafbfd;
    display: none;
    padding: 25px;
}

#v-nav >div.tab-content >h4
{
    font-size: 1.2em;
    color: Black;
    text-shadow: 0px 1px 1px #F2F1F0;
    border-bottom: 1px dotted #EEEDED;
    padding-top: 5px;
    padding-bottom: 5px;
}
	</style>
	<!-- tab vertical-->
	<script src="<?php echo base_url('asset/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('asset/js/custom-fields.js'); ?>"></script>

	<link id="container" href="<?php echo base_url('asset/css/cobatab.css'); ?>" rel="stylesheet">

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('asset/jquery.css'); ?>" rel="stylesheet" type="text/css">
    <style>
    	body { font-size: 12px; }
    	.table thead { 
    		background-color: rgb(253, 199, 69);
    		background: -webkit-linear-gradient(top, rgb(253, 199, 69) 0%, rgb(228, 180, 63) 100%);
			background: -o-linear-gradient(top, rgb(253, 199, 69) 0%, rgb(228, 180, 63) 100%);
			background: -ms-linear-gradient(top, rgb(253, 199, 69) 0%, rgb(228, 180, 63) 100%);
			background: -moz-linear-gradient(top, rgb(253, 199, 69) 0%, rgb(228, 180, 63) 100%);
			background: linear-gradient(to bottom, rgb(253, 199, 69) 0%, rgb(228, 180, 63) 100%);
    	}
    	.table tbody td>span { display:block; padding-top: 1px; padding-bottom: 1px; padding-left: 1px;}
    	.table tbody td>span { margin: 3px 5px;}
    	.table-condensed>thead>tr>th { padding-left: 10px;} 

    	.input-sm, select.input-sm { height: 25px; padding: 3px 5px;}
    	select.input-sm { padding: 3px 1px;}
    	.blue-gradient {
    		background: -webkit-linear-gradient(top, rgb(102, 143, 213) 0%, rgb(63, 112, 194) 91%, rgb(45, 88, 162) 99%, rgb(35, 71, 129) 100%);
			background: -o-linear-gradient(top, rgb(102, 143, 213) 0%, rgb(63, 112, 194) 91%, rgb(45, 88, 162) 99%, rgb(35, 71, 129) 100%);
			background: -ms-linear-gradient(top, rgb(102, 143, 213) 0%, rgb(63, 112, 194) 91%, rgb(45, 88, 162) 99%, rgb(35, 71, 129) 100%);
			background: -moz-linear-gradient(top, rgb(102, 143, 213) 0%, rgb(63, 112, 194) 91%, rgb(45, 88, 162) 99%, rgb(35, 71, 129) 100%);
			background: linear-gradient(to bottom, rgb(102, 143, 213) 0%, rgb(63, 112, 194) 91%, rgb(45, 88, 162) 99%, rgb(35, 71, 129) 100%);
    	}
		.btn-info {
			background-color: #538ad1;
			border-color: rgb(35, 71, 129);
		}
		.btn-info:hover { background-color: rgb(35, 71, 129);}
    </style>
    
    <style>
        th {
            background-color: #3C8DBC;
        } 
    </style>

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
							<a href="#">Penilaian</a>
                                        </li>
				</ul>
				<div class="row-fluid sortable ui-sortable">
						<div class=" span12">
							<div class="box-header" data-original-title="">
								<h2><i class="halflings-icon white list"></i><span class="break"></span>Data Penilaian</h2>
							</div>
							<div class="span2">
								<dl>
								  <dd>Mata Pelajaran</dd>
								  <dd>Pengasuh</dd>
								  <dd>Kelas</dd>
								  <dd>Kurikulum </dd>
								  <dd>Semester</dd>
								</dl>            
							</div>
							<div class="span1">
								<dl>
								  <dd>:</dd>
								  <dd>:</dd>
								  <dd>:</dd>
								  <dd>:</dd>
								  <dd>:</dd>
								</dl>            
							</div>
							<div class="span4">
								<dl>
								  <dd><?php echo $mapel["NAMA_MAPEL"]; ?></dd>
								  <dd><?php echo $guru["NAMA_PTK"]; ?></dd>
								  <dd><?php echo $rombel["NAMA_ROMBEL"]; ?></dd>
								  <dd><?php echo $rombel["NAMA_KURIKULUM"]; ?></dd>
								  <dd><?php echo $rombel["NAMA_TAHUN_AJAR"]; ?></dd>
								</dl>            
							</div>
						</div><!--/span-->						
				</div>
                                <?php $ci = &get_instance(); 
                                      $ci->load->model('m_penilaian');
                                ?>
                                <ul class="breadcrumb" style="margin: 0px 0px 0px; line-height: 0px; background-color: white;" >
					
                                        <?php 
                                        $a = 2;
                                        $i = 2;
                                        while(1): 
                                         
                                         $s_penilaian = $ci->m_penilaian->getPenilaian($mapel["KODE_MAPEL"],substr($kode, 0, $a));
                                         ?>
                                         
                                        <li>						
						<a href="<?php echo base_url()."index.php/penilaian/PenilainGuruMataPelajaran/".$rombel["ID_ROMBEL"]."/". substr($kode, 0, $a) ."/".($i++)."/".$mapel["KODE_MAPEL"]; ?>"><?php echo $s_penilaian["INDIKATOR_PENILAIAN"];?></a>
						
					
                                        
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
                                <strong>
                                <?php if ($level==2){
                                    echo "Pilih Aspek Penilaian";
                                }
                                else if($level ==3)
                                {
                                    echo "Pilih Metode Penilaian";
                                }
                                else if($level ==4)
                                {
                                    echo "Pilih Indikator Penilaian";
                                }
                                ?>
                                </strong>
                                <br/>
                                <br/>
				<!-- try tab -->
                                <ul class="tabs" id="pilihKI">
                                    
                                        <?php for ($i=0; $i<count($penilaian); $i++): ?>
                                    <a style="color: inherit;" href="<?php echo base_url()."index.php/penilaian/PenilainGuruMataPelajaran/".$rombel["ID_ROMBEL"]."/". $penilaian[$i]->KODE_JENIS_PENILAIAN."/".($level+1)."/".$mapel["KODE_MAPEL"]?>"><li class="tab-link tab-root " data-tab="tab-<?php echo $i+1; ?>"> <strong> <font  size="4"><?php echo $penilaian[$i]->INDIKATOR_PENILAIAN;?> </font> </strong> </li></a>
                                        <?php endfor; ?>					
					<?php if($level==2): ?>
                                    <li class="tab-link tab-root " data-tab="tab-<?php echo $i+1; ?>"><strong> <font  size="4">Hasil Akhir</font></strong></li>
                                        <?php endif; ?>
				</ul>
                                
                                <?php if(count($penilaian)==0): 
                                    
                                    $l_penilaian = $ci->m_penilaian->getPenilaian($mapel["KODE_MAPEL"],$kode);
                                    
                                    //var_dump($l_penilaian);
                                    
                                    
                                    ?>
                                <form method="post" action="<?php echo base_url().'index.php/penilaian/saveNilai'; ?>" >
                                <?php $state = false; ?>
                                <?php if($l_penilaian["TIPE_PENILAIAN"]==1): ?>
                                <div class="row-fluid sortable ">

									<div class=" span12">
                                                                        <?php $c = 2;
                                                                                $state2 = false;
                                                                                while(1): 

                                                                                $s = $ci->m_penilaian->getPenilaian($mapel["KODE_MAPEL"],substr($kode, 0, $c));                                                                                                                     
                                                                                if($c==10) break;
                                                                                if(strpos($s["INDIKATOR_PENILAIAN"],'Sendiri') || strpos($s["INDIKATOR_PENILAIAN"],'Teman') )
                                                                                {
                                                                                    $state = true;
                                                                                }
                                                                                if(strpos($s["INDIKATOR_PENILAIAN"],'Teman') )
                                                                                {
                                                                                    $state2 = true;
                                                                                }
                                                                                $c += 2;
                                                                                endwhile;
                                                                                ?>
											<table class="table table-bordered" >
                                                                                            <?php if($state && $state2): ?>
                                                                                            <thead >
													  <tr>
														  <th style="">No</th>
														  <th style="">Nama Siswa</th>
														  <th style="">Nilai Rata-Rata</th>  
														                                     
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
                                                                                                                <input type="hidden" name="kode_mapel" value="<?php echo $mapel["KODE_MAPEL"];?>">
														<?php foreach ($listSiswa as $a)	{
                                                                                                                 $siswa = $ci->m_nilai->getNilaibyKodeandIdTeman($l_penilaian["KODE_PENILAIAN"], $a->ID_SISWA); 
                                                                                                                //var_dump($siswa);
                                                                                                                $total = 0;
                                                                                                                for($z = 0; $z<count($siswa); $z++)
                                                                                                                {
                                                                                                                    $total += $siswa[$z]->NILAI;
                                                                                                                }
                                                                                                                //echo $total."<br/>";
                                                                                                                $selisih = count($listSiswa) - count($siswa) - 1;
                                                                                                                //echo $selisih."<br/>";
                                                                                                                $total += $selisih * 4;
                                                                                                                //echo $total."<br/>";
                                                                                                                $total /= count($listSiswa)-1;
                                                                                                                
                                                                                                                 if (strpos($mapel["NAMA_MAPEL"],'Agama') !== false) {
                                                                                                                        if(strpos($mapel["NAMA_MAPEL"],$a->AGAMA_SISWA) !== false)  
                                                                                                                        {
                                                                                                                            
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                           continue;     
                                                                                                                        }                                                                                                                                                                                                                                                                   
                                                                                                                    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                                                                                                                   
                                                                                                                 ?>
													<tr>
														
														<td><?php echo $no++ ?></td>
														<td class="center"><?php echo $a->NAMA_SISWA; ?></td>
														<td class="center">
																 <input class="input-xlarge focused" id="focusedInput" name="<?php echo $a->ID_SISWA?>" type="number" min="0" max="100" value="<?php echo $total;?>">
														</td> 														
                                                                                                                
													</tr>   
													<?php 
                                                                                                        
                                                                                                                } ?>               
												  </tbody>
                                                                                            <?php else: ?>
												  <thead>
													  <tr>
														  <th style="">No</th>
														  <th style="">Nama Siswa</th>
														  <th style="width:15%; ">1 (Sangat Kurang)</th>  
														  <th style="width:15%; ">2 (Kurang)</th>  
														  <th style="width:15%;">3 (Baik)</th> 
														  <th style="width:15%;">4 (Sangat Baik)</th>                                                      
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
                                                                                                                <input type="hidden" name="kode_mapel" value="<?php echo $mapel["KODE_MAPEL"];?>">
														<?php foreach ($listSiswa as $a)	{
                                                                                                                 $siswa = $ci->m_nilai->getNilaibyKodeandId($l_penilaian["KODE_PENILAIAN"], $a->ID_SISWA); 
                                                                                                                //var_dump($siswa);
                                                                                                                 if (strpos($mapel["NAMA_MAPEL"],'Agama') !== false) {
                                                                                                                        if(strpos($mapel["NAMA_MAPEL"],$a->AGAMA_SISWA) !== false)  
                                                                                                                        {
                                                                                                                            
                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                           continue;     
                                                                                                                        }                                                                                                                                                                                                                                                                   
                                                                                                                    }
                                                                                                                    
                                                                                                                    
                                                                                                                    
                                                                                                                    
                                                                                                                    
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
																  <input style="margin-left:0px;" type="radio" name="<?php echo $a->ID_SISWA?>" id="optionsRadios" value="1" <?php if($siswa!=null && $siswa["NILAI"]==1) echo "checked" ; ?> <?php if($state==true) echo "disabled"; ?> 	>															
														</td> 
														<td class="center">
																  <input type="radio" style="margin-left:0px;" name="<?php echo $a->ID_SISWA?>" id="optionsRadios" value="2" <?php if($siswa!=null && $siswa["NILAI"]==2) echo "checked" ;?>  <?php if($state==true) echo "disabled"; ?> >																
														</td>
														<td class="center">
																  <input type="radio" style="margin-left:0px;" name="<?php echo $a->ID_SISWA?>" id="optionsRadios" value="3" <?php if($siswa!=null && $siswa["NILAI"]==3) echo "checked" ;?> <?php if($state==true) echo "disabled"; ?> >																
														</td>
														<td class="center" >
																  <input type="radio" style="margin-left:0px;" name="<?php echo $a->ID_SISWA?>" id="optionsRadios" value="4" <?php if($siswa!=null && $siswa["NILAI"]==4) echo "checked" ; if($siswa==null) echo "checked" ;?> <?php if($state==true) echo "disabled"; ?> >															
														</td>    
                                                                                                                
													</tr>   
													<?php 
                                                                                                        
                                                                                                                } ?>               
												  </tbody>
                                                                                                  <?php endif;?>
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
                                                                                                                <input type="hidden" name="kode_mapel" value="<?php echo $mapel["KODE_MAPEL"];?>">
                                                                                                                
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
                                                                                                                <input type="hidden" name="kode_mapel" value="<?php echo $mapel["KODE_MAPEL"];?>">
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

			<!--Javascript Vertical Tab-->
			<script>
			$(function() {
		    var items = $('#v-nav>ul>li').each(function() {
		        $(this).click(function() {
		            //remove previous class and add it to clicked tab
		            items.removeClass('current');
		            $(this).addClass('current');

		            //hide all content divs and show current one
		            $('#v-nav>div.tab-content').hide().eq(items.index($(this))).show('fast');

		            window.location.hash = $(this).attr('tab');
		        });
		    });

		    if (location.hash) {
		        showTab(location.hash);
		    }
		    else {
		        showTab("tab1");
		    }

		    function showTab(tab) {
		        $("#v-nav ul li:[tab*=" + tab + "]").click();
		    }

		    // Bind the event hashchange, using jquery-hashchange-plugin
		    $(window).hashchange(function() {
		        showTab(location.hash.replace("#", ""));
		    })

		    // Trigger the event hashchange on page load, using jquery-hashchange-plugin
		    $(window).hashchange();
                    
                    

                    


                    
                    
		});
			</script>
		</div><!--/#content.span10-->	
	</div>	<!-- end: row fluid -->	
