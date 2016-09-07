
<!-- konten -->
<section id="main" role="main" class="mt10">
	<?php 
	var_dump($tingkat); ?>
	<!--js buat menampilakan priview video sebelum di upload  -->
	<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/preview.js') ?>"></script>
	<!-- js untuk progres bar file yg di upload -->
	<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/upbar.js') ?>"></script>

	<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jequery.form.js') ?>"></script>

	<div class="col-md-12">
		<!-- START Form panel -->
		<form  class="panel panel-default form-horizontal form-bordered" action="<?=base_url()?>index.php/videoback/upvideo" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<div class="panel-heading"><h5 class="panel-title">Upload Video</h5></div>
			<div class="panel-body pt0">
				<div class="form-group message-container"></div><!-- will be use as done/fail message container -->

				<div  class="form-group">
					<label class="col-sm-1 control-label">Tingkat</label>
					<div class="col-sm-4">
						<select class="form-control" name="tingkat" id="eTingkat">
							<?php 
							foreach ($tingkat as $row) { 
							  ?>
							<option value="<?=$row['id'];?>"><?=$row['aliasTingkat']?></option>
							<?php 
							} ?>
						</select>
					</div>

					<label class="col-sm-2 control-label">Mata Pelajaran</label>
					<div class="col-sm-4">
						<select class="form-control" name="mataPelajaran" id="ePelajaran">

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
				<div  class="form-group">
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
						<div class="col-md-11 bottom">		
							<progress id="prog" max="100" value="0" style="display:none;"></progress>
						</div>
					</div>

					<div id="upload" class="form-group">
						<label class="col-sm-2 control-label">File Video</label>
						<div class="col-sm-4">
							
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
						<label class="control-label col-sm-2">Size</label>
						<div class="col-sm-4">
							<select name="size" class="form-control">
								<option value="">Select</option>
								<option value="Private">Share</option>
								<option value="Public">Public</option>
							</select>
						</div>
					</div>

					<div class="panel-footer">
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="submit" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
					</div>

				</form>
				<!--/ END Form panel -->
			</div>
		</div>
		<!--/ END row -->

	</section>


	<script>
	//Script for getting the dynamic values from database using jQuery and AJAX
	$(document).ready(function() {
		$('#eTingkat').change(function() {

			var form_data = {
				name: $('#eTingkat').val()
			};

			$.ajax({
				url: "<?php echo site_url('videoback/getPelajaran'); ?>",
				type: 'POST',
				data: form_data,
				success: function(msg) {
					var sc='';
					$.each(msg, function(key, val) {
						sc+='<option value="'+val.id+'">'+val.keterangan+'</option>';
					});
					$("#ePelajaran option").remove();
					$("#ePelajaran").append(sc);
				}
			});
		});
	});
</script>

