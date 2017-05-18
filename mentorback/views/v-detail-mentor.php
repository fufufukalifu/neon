<section id="main" role="main">
	<div class="row">
		<div class="col-md-12">
			<!-- panel -->
			<div style="background:green; height:200px;">
				<h3>disini div untuk Identitas guru</h3>
			</div>
			<div class="panel panel-primary">
				<!-- panel heading/header -->
				<div class="panel-heading">
					<h3 class="panel-title">List Siswa</h3>
				</div>
				<!--/ panel heading/header -->
				<!-- panel body -->
				<div class="panel-body">
					<!-- setting tb siswa -->
					<div class="col-md-12 pl0 pr0" >
						<!-- recor per page tabel pengguna token -->
						<div class="col-md-2 mb2 mt10 pl0">
							<select  class="form-control" name="records_per_page_siswa" >
								<option value="10" selected="true">records per page</option>
								<option value="10">10</option>
								<option value="25">25</option>
								<option value="50">50</option>
								<option value="100">100</option>
								<option value="200">200</option>
							</select>
						</div>
						<!-- /recor per page tabel pengguna token -->
						<!-- div pencarian  -->
						<div class="col-md-10 mb10 mt10 pr0">
							<div class="input-group">
								<span class="input-group-addon btn" id="cariDat"><i class="ico-search"></i></span>
								<input class="form-control" type="text" name="cariDat" placeholder="Cari Data">
							</div>
						</div>
						<!-- div pencarian -->
					</div>
					<!--/ setting tb siswa   -->
					<!-- tb_siswa -->
					<table class="table table-bordered col-md-12 tb_siswa">
						<thead>
							<tr>
								<th><span class="checkbox custom-checkbox check-all-siswa">
									<input type="checkbox" name="checkall-siswa" id="check-all-siswa">
									<label for="check-all-siswa">&nbsp;&nbsp;</label></span> </th>
									<th>No</th>
									<th>Nama Pengguna</th>
									<th>Nama</th>
									<th>Cabang</th>
									<th>Mentor</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody id="record-siswa">
								<?=$tb_siswa; ?> 
							</tbody>	
					 
					</table>
					<!-- /tb_siswa -->
				</div>
				<!-- /panel body -->
						<div class="panel-footer">
				<a class="btn btn-danger remove-mentor">Remove</a>
			</div>
			<!--/ panel footer -->

			</div>
			<!-- panel -->
		</div>
	</div>
</section>