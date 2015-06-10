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
				<!-- try tab -->
				<ul class="tabs" id="pilihKI">
                                        <?php for ($i=0; $i<count($level2); $i++): ?>
                                            <li class="tab-link tab-root " data-tab="tab-<?php echo $i+1; ?>"> <?php echo $level2[$i]->INDIKATOR_PENILAIAN;?> </li>
                                        <?php endfor; ?>					
					<li class="tab-link tab-root " data-tab="tab-<?php echo $i+1; ?>">Hasil Akhir</li>
				</ul>
                                <?php for ($i=0; $i<count($level2); $i++): ?>
                                    <div id="tab-<?php echo $i+1;?>" class="tab-content">
					<ul class="tabs" id="pilihMetode">
                                                <?php                                                     
                                                    
                                                    $level3 = $ci->m_penilaian->getListIndikator_penilaianparent($mapel["KODE_MAPEL"], '3', $level2[$i]->KODE_JENIS_PENILAIAN);
                                                    for ($j=0; $j<count($level3); $j++): ?>
                                                    
                                                    <li  class="tab-link tab-child  " data-tab="tab<?php echo $i+1;?>-<?php echo $j+1;?>"><?php echo $level3[$j]->INDIKATOR_PENILAIAN; ?></li>
                                                <?php endfor; ?>
					</ul>
                                    </div>
                                <?php endfor; ?>
				
                                

				<div id="tab-5" class="tab-content">
				</div>
                                <?php for ($i=0; $i<count($level2); $i++): ?>
                                <?php
                                
                                $level3 = $ci->m_penilaian->getListIndikator_penilaianparent($mapel["KODE_MAPEL"], '3', $level2[$i]->KODE_JENIS_PENILAIAN);
                                for ($j=0; $j<count($level3); $j++): ?>                                
				<div id="tab<?php echo $i+1;?>-<?php echo $j+1;?>" class="tab-content tab-grandchild ">
					<section id="wrapper" class="wrapper">
						<div id="v-nav">
							<ul>
                                                            <?php 
                                                                $level4 = $ci->m_penilaian->getListIndikator_penilaianparent($mapel["KODE_MAPEL"], '4', $level3[$j]->KODE_JENIS_PENILAIAN);
                                                                for ($k=0; $k<count($level4); $k++): ?>   
							    <li tab="tab<?php echo $k+1;?>" class="<?php if($k==0) echo "first current";?>"><?php echo $level4[$k]->INDIKATOR_PENILAIAN; ?></li>
							    
                                                            <?php endfor; ?>
							</ul>
                                                        <?php 
                                                                $level4 = $ci->m_penilaian->getListIndikator_penilaianparent($mapel["KODE_MAPEL"], '4', $level3[$j]->KODE_JENIS_PENILAIAN);
                                                                for ($k=0; $k<count($level4); $k++): ?>
                                                                    
                                                                <?php if($level4[$k]->TIPE_PENILAIAN==1):    
                                                                    ?>
                                                    
							<div class="tab-content">
                                                            
   								<h4><?php echo $level4[$k]->INDIKATOR_PENILAIAN ;?></h4>
   								<form class="form-horizontal">
                                                                <div class="row-fluid sortable">
                                                                    
									<div class=" span12">
										<div class="box-header" data-original-title>
											<h2><i class="halflings-icon white edit"></i><span class="break"></span>Form Elements</h2>
											<div class="box-icon">
												<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
												<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
												<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
											</div>
										</div>
										<div class="box-content">
											
												<fieldset>
												  <div class="control-group">
													<label class="control-label" for="selectError<?php echo $i."-".$j."-".$k; ?>">Multiple Select / Tags</label>
													<div class="controls">
													  <select id="selectError<?php echo $i."-".$j."-".$k; ?>" multiple data-rel="chosen">
														<?php $level5 = $ci->m_penilaian->getListIndikator_penilaianparent($mapel["KODE_MAPEL"], '5', $level4[$k]->KODE_JENIS_PENILAIAN);
                                                                                                                    for ($l=0; $l<count($level5); $l++): ?>
                                                                                                                <option><?php echo $level5[$l]->INDIKATOR_PENILAIAN; ?> </option>
                                                                                                                <?php endfor; ?>														
													  </select>
													</div>
												  </div>
												  
												</fieldset>
											  </form>
										
										</div>
									</div><!--/span-->
								
								</div><!--/row-->
                                                                    
                                                                <?php for ($l=0; $l<count($level5); $l++): ?>
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
														<?php foreach ($listSiswa as $a)	{?>
													<tr>
														
														<td><?php echo $no++ ?></td>
														<td class="center"><?php echo $a->NAMA_SISWA; ?></td>
														<td class="center">
																  <input class="input-xlarge focused" id="focusedInput" type="text" value="This is focused…">
																
														</td>                                
													</tr>   
													<?php } ?>               
												  </tbody>
											 </table>      
										</div>
									</div><!--/span-->
								</div>
                                                                <?php endfor;?>
                                                                <div class="form-actions">
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                                <br/>
                                                            </form>
 							</div>
                                                        <?php else: ?>
                                                        <div class="tab-content">
   								<h4><?php echo $level4[$k]->INDIKATOR_PENILAIAN ;?></h4>
   								<form class="form-horizontal">
                                                                <div class="row-fluid sortable">
									<div class=" span12">
										<div class="box-header" data-original-title>
											<h2><i class="halflings-icon white edit"></i><span class="break"></span>Form Elements</h2>
											<div class="box-icon">
												<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
												<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
												<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
											</div>
										</div>
										<div class="box-content">
											
												<fieldset>
												  <div class="control-group">
													<label class="control-label" for="selectError<?php echo $i."-".$j."-".$k; ?>">Multiple Select / Tags</label>
													<div class="controls">
													  <select id="selectError<?php echo $i."-".$j."-".$k; ?>"  data-rel="chosen">
														<?php $level5 = $ci->m_penilaian->getListIndikator_penilaianparent($mapel["KODE_MAPEL"], '5', $level4[$k]->KODE_JENIS_PENILAIAN);
                                                                                                                    for ($l=0; $l<count($level5); $l++): ?>
                                                                                                                <option><?php echo $level5[$l]->INDIKATOR_PENILAIAN; ?> </option>
                                                                                                                <?php endfor; ?>
													  </select>
													</div>
												  </div>
                                                                                                    <br/>
                                                                                                    <br/>
												</fieldset>
											  
										
										</div>
									</div><!--/span-->
								
								</div><!--/row-->

                                                                <?php for ($l=0; $l<count($level5); $l++): ?>
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
														?>
														<?php foreach ($listSiswa as $a)	{?>
													<tr>
														
														<td><?php echo $no++ ?></td>
														<td class="center"><?php echo $a->NAMA_SISWA; ?></td>
														<td class="center">
																  <input type="radio" name="optionsRadio<?php echo $i."-".$j."-".$k."-".$no; ?>" id="optionsRadios<?php echo $i."-".$j."-".$k."-".$no."1"; ?>" value="1">																
														</td> 
														<td class="center">
																  <input type="radio" name="optionsRadio<?php echo $i."-".$j."-".$k."-".$no; ?>" id="optionsRadios<?php echo $i."-".$j."-".$k."-".$no."2"; ?>" value="2" >																
														</td>
														<td class="center">
																  <input type="radio" name="optionsRadio<?php echo $i."-".$j."-".$k."-".$no; ?>" id="optionsRadios<?php echo $i."-".$j."-".$k."-".$no."3"; ?>" value="3" >																
														</td>
														<td class="center" >
																  <input type="radio" name="optionsRadio<?php echo $i."-".$j."-".$k."-".$no; ?>" id="optionsRadios<?php echo $i."-".$j."-".$k."-".$no."4"; ?>" value="4" >																
														</td>                               
													</tr>   
													<?php } ?>               
												  </tbody>
											 </table>      
										
									</div><!--/span-->
								</div>
                                                                <?php endfor; ?>
                                                                <br/>
                                                                </form>
 							</div>
                                                        <?php endif; ?>
                                                        <?php endfor; ?> 							 							
						</div>
					</section>

					<!-- COBA TAB 1 
					<div id="content">
					   <div id="tab-container">
					      <ul>
					         <li><a>Introduction</a></li>
					         <li><a >Html</a></li>
					         <li><a >CSS</a></li>
					         <li><a >JavaScript</a></li>
					      </ul>
					   </div>
					   <div id="main-container">
					      <h1>Put your content here...</h1>
					   </div>
					</div>
					-->
				</div>
                                <?php endfor;?>
                                <?php endfor;?>
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
