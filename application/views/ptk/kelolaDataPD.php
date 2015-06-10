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
							<a href="index.html">Home</a>
							<i class="icon-angle-right"></i> 
						</li>
						<li>
							<i class="icon-edit"></i>
							<a href="#">Data Siswa</a>
						</li>
					</ul>

					<!-- try tab -->
						<ul class="tabs">
							<li class="tab-link current" data-tab="tab-1">Tambah Peserta Didik</li>
							<li class="tab-link" data-tab="tab-2" ><a href="index.php/ptk/LihatDataPesertaDidik">Data Peserta Didik</a></li>
						</ul>

						<div id="tab-1" class="tab-content current">
							<section id="wrapper" class="wrapper">
								<div id="v-nav">
									<ul>
									    <li tab="tab1" class="first current">Isi Data Peserta Didik</li>
									    <li tab="tab2" class="last">Isi Data Orang Tua/Wali</li>
									</ul>
									<div class="tab-content">
		   								<h4>Form Data Siswa</h4>
		   								<div class="row-fluid sortable">
											<div class="span6">
												<div class="box-header" data-original-title>
													<h2><i class="halflings-icon white edit"></i><span class="break"></span>Data Peserta Didik</h2>
												</div>
												<div class="box-content">
													<form method="POST"  class="form-horizontal">
													  <fieldset>
														<div class="control-group">
															<label class="control-label" for="focusedInput">NIS</label>
															<div class="controls">
															  <input class="input-xlarge focused" name="nis_siswa" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">NISN</label>
															<div class="controls">
															  <input class="input-xlarge focused" name="nisn_siswa" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Nama Siswa</label>
															<div class="controls">
															  <input class="input-xlarge focused" name="nama_siswa" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Tempat Lahir</label>
															<div class="controls">
															  <input class="input-xlarge focused" name="tmpt_lhr_siswa" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
														  <label class="control-label" for="date01">Tanggal Lahir</label>
														  <div class="controls">
															<input type="text" class="input-xlarge datepicker" name="tgl_lhr_siswa" id="date01" value="">
														  </div>
														</div>
														<div class="control-group">
															<label class="control-label">Jenis Kelamin</label>
															<div class="controls">
															  <label class="radio">
																<input type="radio" name="optionsRadios" name="jk_siswa" id="optionsRadios1" value="option1" checked="">
																Laki-laki
															  </label>
															  <div style="clear:both">
															  </div>
															  <label class="radio">
																<input type="radio" name="optionsRadios" name="jk_siswa" id="optionsRadios2" value="option2">
																Perempuan
															  </label>
															</div>
														</div>
														
														  <div class="control-group">
															<label class="control-label" for="selectError">Agama</label>
															<div class="controls">
															  <select id="selectError" name="agama_siswa" data-rel="chosen">
																<option>Islam</option>
																<option>Kristen</option>
																<option>Katolik</option>
																<option>Hindu</option>
																<option>Budha</option>
															  </select>
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Anak ke</label>
															<div class="controls">
															  <input class="input-xlarge focused"  name="anak_ke" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="selectError2">Status Dalam Keluarga</label>
															<div class="controls">
															  <select id="selectError2" name="status_dlm_keluarga" data-rel="chosen">
																<option>Kandung</option>
																<option>Tiri/Angkat</option>
															  </select>
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Alamat Siswa</label>
															<div class="controls">
															  <input class="input-xlarge focused" name="alamat_siswa" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">No Telp Siswa</label>
															<div class="controls">
															  <input class="input-xlarge focused" name="notelp_siswa" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Diterima di Kelas</label>
															<div class="controls">
															  <input class="input-xlarge focused" name="diterima_pd_kls" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Diterima pada Tanggal</label>
															<div class="controls">
															  <input class="input-xlarge focused" name="diterima_pd_tgl" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Sekolah Asal</label>
															<div class="controls">
															  <input class="input-xlarge focused" name="sekolah_asal" id="focusedInput" type="text" value="">
															</div>
														  </div>
														  <div class="control-group">
															  <label class="control-label" for="fileInput">Unggah Foto Siswa</label>
															  <div class="controls">
																<div class="uploader" id="uniform-fileInput"><input class="input-file uniform_on" id="fileInput" type="file"><span class="filename" style="-webkit-user-select: none;">Tidak ada file terpilih</span><span class="action" style="-webkit-user-select: none;">Pilih File</span>
																</div>
															  </div>
															</div>
														
														  <div class="span12">
															<div >
																<a href="<?php echo site_url ('ptk/tambahPesertaDidik')?>"><button class="btn btn-large btn-primary">Tambah</button></a>	
															</div>
														</div>

													  </fieldset>
													
													</form>   

												</div>
												
												
											</div><!--/span-->
											<div class = "span6">
												<div class="box-content">
													<div class="masonry-gallery">
															<div id="image-12" class="masonry-thumb">
																<a style="background:url(asset/ptk/img/gallery/image.png)" title="Sample Image 12" href="asset/siswaguru/img/images.png"><img class="grayscale" src="img/gallery/photo14.jpg" alt="Sample Image 12">
																</a>
															</div>
														</div>
													
												</div>
											</div>
											
										</div><!--/row-->
		 							</div>
		 							<div class="tab-content">
		   								<h4>Form Data Orang Tua/Wali Siswa</h4>
		   								<div class="row-fluid sortable">
											<div class="span6">
												<div class="box-header" data-original-title>
													<h2><i class="halflings-icon white edit"></i><span class="break"></span>Data Orang Tua</h2>
												</div>
												<div class="box-content">
													<form class="form-horizontal">
													  <fieldset>
														<div class="control-group">
															<label class="control-label" for="focusedInput">NIK</label>
															<div class="controls">
															  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Nama Ayah</label>
															<div class="controls">
															  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Nama Ibu</label>
															<div class="controls">
															  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
															</div>
														  </div>
														
														  <div class="control-group">
															<label class="control-label" for="selectError3">Pekerjaan Ayah</label>
															<div class="controls">
															  <select id="selectError3" data-rel="chosen">
																<option>Guru / PNS</option>
																<option>TNI / polri</option>
																<option>Wiraswasta</option>
																<option>Tidak Bekerja</option>
															  </select>
															</div>
														  </div>
														   <div class="control-group">
															<label class="control-label" for="selectError4">Pekerjaan Ibu</label>
															<div class="controls">
															  <select id="selectError4" data-rel="chosen">
																<option>Guru / PNS</option>
																<option>TNI / polri</option>
																<option>Wiraswasta</option>
																<option>Ibu Rumah Tangga</option>
															  </select>
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Alamat Orang Tua</label>
															<div class="controls">
															  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">No Telp Orang Tua</label>
															<div class="controls">
															  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Nama Wali</label>
															<div class="controls">
															  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
															</div>
														  </div>											
														  <div class="control-group">
															<label class="control-label" for="selectError5">Pekerjaan Wali</label>
															<div class="controls">
															  <select id="selectError5" data-rel="chosen">
																<option>Guru / PNS</option>
																<option>TNI / polri</option>
																<option>Wiraswasta</option>
																<option>Tidak Bekerja</option>
															  </select>
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">Alamat Wali</label>
															<div class="controls">
															  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
															</div>
														  </div>
														<div class="control-group">
															<label class="control-label" for="focusedInput">No Telp Wali</label>
															<div class="controls">
															  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
															</div>
														  </div>
													  </fieldset>
													
													</form>   

												</div>
											</div><!--/span-->
											
											
										</div><!--/row-->
		 							</div>
								</div>
							</section>
											
						</div>
						
				</div><!--/#content.span10-->	
		
				
			</div>	<!-- end: row fluid -->	
		
			
		</div> <!-- container full fluid-->
	
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
	
	<div class="clearfix"></div>