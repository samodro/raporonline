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
							<a href="#">Penilaian</a>
                                        </li>
				</ul>

				<div class="row-fluid">	
					<div class="box span12">
						<div class="box-header">
							<h2><i class="halflings-icon white white hand-top"></i><span class="break"></span>Pilih Kelas untuk Mata Pelajaran <?php echo $mapel["NAMA_MAPEL"];?></h2>
						</div>
						<div class="box-content">                                                
							<?php 
                                                        $ci = &get_instance(); 
                                                        $ci->load->model('m_penilaian');  
                                                        
                                                        $penilaian = $ci->m_penilaian->getListIndikator_penilaian($mapel["KODE_MAPEL"], "1");
                                                        
                                                        
                                                        for ($i = 0; $i < count($rombel); $i++): ?>
							<a class="quick-button-small span1" href="<?php echo base_url()."index.php/penilaian/PenilainGuruMataPelajaran/".$rombel[$i]->ID_ROMBEL."/". $penilaian[0]->KODE_JENIS_PENILAIAN."/2/".$mapel["KODE_MAPEL"]; ?>">
								<i class="icon-group"></i>
								<p><?php echo $rombel[$i]->NAMA_ROMBEL; ?></p>
							</a>
                                                        <?php endfor; ?>							
							<div class="clearfix"></div>
						</div>	
					</div><!--/span-->
					
				</div><!--/row-->
			
			</div> <!-- tab content -->
		</div><!--/#content.span10-->	
	</div>	<!-- end: row fluid -->	
