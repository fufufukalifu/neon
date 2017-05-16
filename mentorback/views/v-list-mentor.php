<section id="main" role="main">
<div class="row">
	<div class="col-md-12">

<!-- Start Panel tab -->
	<div class="panel panel-primary">
		<!-- panel heading/header -->
		<div class="panel-heading">
			<h3 class="panel-title">Set Mentor Siswa</h3>
			<!-- panel toolbar -->
			<div class="panel-toolbar text-right">
				<!-- option -->
				<div class="option">
					<!-- <button class="btn demo" data-toggle="panelrefresh"><i class="reload"></i></button> -->
<!-- 					<button class="btn up" data-toggle="panelcollapse"><i class="arrow"></i></button>
					<button class="btn" data-toggle="panelremove" data-parent=".col-md-4"><i class="remove"></i></button> -->
				</div>
				<!--/ option -->
			</div>
			<!--/ panel toolbar -->
		</div>
		<!--/ panel heading/header -->
		<!-- panel body with collapse capable -->
		<div class="panel-collapse pull out">
			<!-- panel toolbar -->
			<div class="panel-toolbar-wrapper">
				<div class="panel-toolbar">
					<ul class="nav nav-tabs nav-justified">
						<li class="active"><a href="#tb_siswa" data-toggle="tab">Tabel Siswa</a></li>
						<li class=""><a href="#tb_mentor" data-toggle="tab">Tabel Mentor</a></li>
					</ul>
				</div>
			</div>
			<!--/ panel toolbar -->
			<!-- panel body -->
			<div class="panel-body">
			<!-- DIV tab content -->
				<div class="tab-content">
					
					<!-- div tabel siswa -->
					<div class="tab-pane col-md-12 active" id="tb_siswa">
						<!-- setting tb siswa -->
						<div class="col-md-12 pl0 pr0" >
							<!-- recor per page tabel pengguna token -->
							<div class="col-md-2 mb2 mt10 pl0">
								<select  class="form-control" name="records_per_page" >
									<option value="10" selected="true">records per page</option>
									<option value="10">10</option>
									<option value="25">25</option>
									<option value="50">50</option>
									<option value="100">100</option>
									<option value="200">200</option>
								</select>
							</div>
							<!-- /recor per page tabel pengguna token -->
							<!-- seting cabang -->
							<div class="col-md-2 mb2 mt10 pl0">
								<select  class="form-control" name="cabang" >
									<!-- <option value="10" selected="true">records per page</option> -->
									<option value="10">Bogor</option>
									<option value="25">Dummy cabang</option>
								</select>
							</div>
							<!-- /seting cabang -->
							<!-- seting cabang -->
							<div class="col-md-2 mb2 mt10 pl0">
								<select  class="form-control" name="cabang" >
									<!-- <option value="10" selected="true">records per page</option> -->
									<option value="10">Semua Siswa</option>
									<option value="25">belum ada mentor</option>
									<option value="25">memiliki mentor</option>
								</select>
							</div>
							<!-- /seting cabang -->
							<!-- div pencarian  -->
							<div class="col-md-6 mb10 mt10 pr0">
								<div class="input-group">
									<span class="input-group-addon btn" id="cariDat"><i class="ico-search"></i></span>
									<input class="form-control" type="text" name="cariDat" placeholder="Cari Data">
								</div>
							</div>
							<!-- div pencarian -->
						</div>
						<!--/ setting tb siswa   -->
						<table class="table table-striped col-md-12">
							<thead>
								<tr>
									<th><span class="checkbox custom-checkbox check-all">
										<input type="checkbox" name="checkall" id="check-all-siswa">
										<label for="check-all">&nbsp;&nbsp;</label></span> </th>
										<th>No</th>
										<th>Nama Pengguna</th>
										<th>Nama</th>
										<th>Cabang</th>
										<th>Mentor</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="record-siswa">

								</tbody>	
							</table>
						</div>
						<!-- /div tabel siswa -->
						<!-- DIV tabel mentor -->
						<div class="tab-pane col-md-12" id="tb_mentor">
							<table class="table table-striped ">
								<thead>
									<tr>
										<th><span class="checkbox custom-checkbox check-all">
											<input type="checkbox" name="checkall-Mentor" id="check-all-Mentor">
											<label for="check-all">&nbsp;&nbsp;</label></span> </th>
											<th>No</th>
											<th>Nama Pengguna</th>
											<th>Nama</th>
											<th>Pelajaran</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody id="record-Mentor">

									</tbody>

								</table>	
							</div>
							<!-- DIV tabel mentor -->
					</div>
					<!-- /DIV tab content	 -->
			</div>
			<!--/ panel body -->
			<!-- panel footer -->
			<div class="panel-footer">
				<a class="btn btn-primary">Set Mentor</a>
			</div>
			<!--/ panel footer -->
		</div>
		<!--/ panel body with collapse capabale -->
		<!-- Loading indicator -->
		<div class="indicator"><span class="spinner"></span></div>
		<!--/ Loading indicator -->
</div>
<!-- END Panel tab -->

	</div>
</div>
</section>
<script type="text/javascript">
	// property Siswa
	var urlSiswa;
	var datasSiswa;
	var meridaianSiswa;
	var prevSiswa;
	var nextSiswa;
	var cabang;
	var pageSiswa;
	var pageValSiswa;
	var pageSelekSiswa;
	var keySearchSiswa;
	var tb_siswa;
	// property Mentor
	var urlMentor;
	var datasMentor;
	var meridaianMentor;
	var prevMentor;
	var nextMentor;
	var pageMentor;
	var pageValMentor;
	var pageSelekMentor;
	var keySearchMentor;
	var tb_Mentor;
	
	$(document).ready(function(){
		function set_tb_siswa() {
			console.log("masuk1");
			urlSiswa=base_url+"mentorback/ajax_list_siswa";
			console.log(urlSiswa);
			$.ajax({
				url:urlSiswa,
				// data:datasSiswa,
				dataType:"text",
				type:"post",
				success:function(data)
				{
					console.log("INI GEMES 1");
					tb_siswa= JSON.parse(data);
					$('#record-siswa').append(tb_siswa);
				},
				error:function(e){
					// sweetAlert("Opsss",e,"error");
					console.log("error");
					console.log(e);
				}
			});
			
		}
		set_tb_siswa();
		function set_tb_mentor() {
			console.log("masuk2");
			urlMentor=base_url+"mentorback/ajax_list_mentor";
			console.log(urlMentor);
			$.ajax({
				url:urlMentor,
				// data:datasMentor,
				dataType:"text",  
				type:"post",
				success:function(data)
				{
					console.log("INI GEMES 2");
					tb_Mentor=JSON.parse(data);
					$('#record-Mentor').append(tb_Mentor);
				},
				error:function(e){
					// sweetAlert("Opsss",e,"error");
					console.log("error");
					console.log(e);
				}
			});
			
		}
		set_tb_mentor();
	});
</script>