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
							<a href="#">Rombel</a>
						</li>
					</ul>

					<!-- try tab -->
						<ul class="tabs">
							<li class="tab-link " data-tab="tab-1"><a href="index.php/rombel/DataRombel">Data Rombongan Belajar</a></li>
							<li class="tab-link current" data-tab="tab-3">Kelola Data Rombel</li>
						</ul>
						
						<div id="tab-3" class="tab-content current">
							<div class="row-fluid sortable">
								<div class="box span12">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Ekstakulikuler</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
										  <fieldset>
											<div class="control-group">
												<label class="control-label" for="selectKelas">Pilih Kelas</label>
												<div class="controls">
												  <select id="selectKelas" data-rel="chosen">
													<option>2013</option>
												  </select>
												</div>
											  </div>
											  <div class="control-group">
												<label class="control-label" for="focusedInput">Wali Kelas</label>
												<div class="controls">
												  <span class="input-xlarge uneditable-input">Some value here</span>
												</div>
											  </div>
											 <div class="form-actions">
												  <button type="submit" class="btn btn-primary">Kelola Anggota Rombel</button>
												</div>
										  </fieldset>
										
										</form>   

									</div>
								</div><!--/span-->
						
							</div><!--/row-->
						
							
							<div class="row-fluid sortable">
								<div class="box span12">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Ekstrakulikuler</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>Tingkat</th>
											  <th>NIS</th>
											  <th>Nama Siswa</th>
											  
										  </tr>
									  </thead>   
									  <tbody>
										<tr>
											<td>1</td>
											<td class="center"></td>
											<td class="center"></td>
											<td class="center"></td>
										</tr>
									</tbody>
								  </table>            
								</div>
								</div><!--/span-->
						
							</div><!--/row-->
						
						</div>
					
					
					
				 </div>
			
			</div><!--/.fluid-container-->
		
				<!-- end: Content -->
		</div><!--/#content.span10-->			
	
	
	<div class="clearfix"></div>/
	