<main class="container">
	<script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/adapters/jquery.js') ?>"></script>




	<div class="modal fade" id="preview" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
										<div class="alert alert-dismissable alert-danger" id="info" hidden="true" >
							<button type="button" class="close" onclick="hideme()" >×</button>
							<strong>Terjadi Kesalahan</strong> <br>isi tanggapan anda.
						</div>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h2 class="modal-title text-center text-danger">Preview Postingan</h2>
				</div>
				<div class="modal-body">
					<div class="container judul"></div>
					<hr>
					<div class="container isi"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" onclick="save()">Post</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="page-content">
		<section>
		<input type="hidden" name="idsub" value="{idsub}">

			<div class="form-group">
				<div class="container">
					<div class="col-sm-12">		
						<div class="alert alert-dismissable alert-danger" id="info" hidden="true" >
							<button type="button" class="close" onclick="hideme()" >×</button>
							<strong>Terjadi Kesalahan</strong> <br>Isi nama pertanyaan dan pertanyaan di editor yang sudah disediakan.
						</div>
					</div>
					<!-- Start Editor Soal -->
					<div id="editor-soal">
						<div class="col-sm-12">
							<input type="hidden" name="idsub" value="{idsub}">
							<input name="namaPertanyaan" type="text" value="" size="30" aria-required="true" placeholder="Nama Pertanyaan">
							<br>
							<textarea  name="editor1" class="form-control" id="isi">
							</textarea>

							<br>
							<a class="cws-button bt-color-3 alt smalls" onclick="preview()">Preview</a> 
							<a onclick="save()" class="cws-button bt-color-3 alt smalls post">Post</a>
							<br>
							<br>
							<hr>
						</div>

					</div>
				</div>
			</div>
		</section>
	</div>
</main>
<script>
	var ckeditor = CKEDITOR.replace( 'editor1' );
	
	function preview(){
		var desc = ckeditor.getData();
		var data = {
			namapertanyaan : $('input[name=namaPertanyaan]').val(),
			isi : desc,
		}
					
		$('.modal-body .judul').append("<h5>Judul</h5>");		
		$('.modal-body .judul').append(data.namapertanyaan);
		$('.modal-body .isi').append("<h5>Isi Pertanyaan</h5>	");
		$('.modal-body .isi').append(data.isi);


		if (data.namapertanyaan == "" || data.namapertanyaan == "") {
			$('#info').show();
		}else{
			$('#preview').modal('show');
		}
	}

	function save(){
		var desc = ckeditor.getData();
		var data = {
			namapertanyaan : $('input[name=namaPertanyaan]').val(),
			isi : desc+"<br>",
			idsub : $('input[name=idsub]').val()
		}

		// console.log(data);

		if (data.namapertanyaan == "" || data.namapertanyaan == "") {
			$('#info').show();
		}else{
			url = base_url+"konsultasi/ajax_add_konsultasi/";
			$.ajax({
				url : url,
				type: "POST",
				data: data,
				dataType: "TEXT",
				success: function(data)
				{
                $('.post').text('Posting..'); //change button text
                $('.post').attr('disabled',false); //set button enable
                // alert('berhasil');
                window.location = base_url+"konsultasi";
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            	swal('Error adding / update data');
            }
        });
		}
	}

	function hideme(){
		$('#info').hide();
	}
</script>