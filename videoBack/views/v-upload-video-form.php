<!-- konten -->
<section id="main" role="main" class="mt10">
	<div class="col-md-12">
		<!-- START Form panel -->
		<form class="panel panel-default form-horizontal form-bordered" action="<?=base_url()?>index.php/videoback/upvideo" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="panel-heading"><h5 class="panel-title">Upload Video</h5></div>
			<div class="panel-body pt0">
				<div class="form-group message-container"></div><!-- will be use as done/fail message container -->

				<div class="form-group">
					<label class="col-sm-1 control-label">Tingkat</label>
					<div class="col-sm-4">
						<select class="form-control" name="tingkat">
							<option value="">A</option>
							<option value="">A</option>
						</select>
					</div>

					<label class="col-sm-2 control-label">Mata Pelajaran</label>
					<div class="col-sm-4">
						<select class="form-control" name="mataPelajaran">
							<option value="">A</option>
							<option value="">A</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-1 control-label">Bab</label>
					<div class="col-sm-4">
						<select class="form-control" name="bab">
							<option value="">A</option>
							<option value="">A</option>
						</select>
					</div>

					<label class="col-sm-2 control-label">Subab</label>
					<div class="col-sm-4">
						<select class="form-control" name="subBab">
							<option value="">A</option>
							<option value="">A</option>
						</select>
					</div>
				</div>

				<!-- untuk preview video -->
				<div class="form-group">
					<video id="preview" class="img-tumbnail image" src="" width="100%" height="50%" controls></video>
					<div class="row" style="margin:1%;"> 
						<div class="col-md-5 left"> 
							<h6>Name: <span id="filename"></span></h6> 
						</div> 
						<div class="col-md-4 left"> 
							<h6>Size: <span id="filesize"></span>Kb</h6> 
						</div> 
						<div class="col-md-3 bottom"> 
							<h6>Type: <span id="filetype"></span></h6> 
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">File Video</label>
						<div class="col-sm-9">
							
							<label for="file" class="btn btn-success">
								Pilih Video
							</label>
							<input style="display:none;" type="file" id="file" name="video"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Judul Video</label>
						<div class="col-sm-9">
							<input type="text" name="judulvideo" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Deskripsi Video</label>
						<div class="col-sm-9">
							<textarea class="form-control" name="deskripsi"></textarea>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<button type="reset" class="btn btn-default">Reset</button>
							<button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
						</div>
					</div>

				</form>
				<!--/ END Form panel -->
			</div>
		</div>
		<!--/ END row -->


	</section>
	
