<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/library/dropzone/dropzone.min.css">
<style type="text/css">
	body {
			background: #f7f7f7;
			font-family: 'Montserrat', sans-serif;
		}

		.dropzone {
			background: #fff;
			border: 2px dashed #ddd;
			border-radius: 5px;
		}

		.dz-message {
			color: #999;
		}

		.dz-message:hover {
			color: #464646;
		}

		.dz-message h3 {
			font-size: 200%;
			margin-bottom: 15px;
		}
</style>
<section class="id="main" role="main"">
	<div class="container-fluid">
		<!-- Start row -->
		<div class="row">
			
			<div class="col-md-12">
			<!-- Start Panel -->
			<form class="form-horizontal form-bordered panel panel-teal">
				<!-- Start Pnel Heading -->
				<input type="text" name="tampBabID" id="tampBabID"   >
				<button id="test" type="button">test</button>
				<div class="panel-heading">
					<h3 class="panel-title">Form Upload Imgae Gallery</h3>
				</div>
				<!-- End Panel Heading -->
				<!-- Start Panel Body -->
				<div class="panel-body">
					<!-- Start Dropd Down depeden -->
					<div  class="form-group">

						<label class="col-sm-1 control-label">Tingkat</label>

						<div class="col-sm-2">

							<select class="form-control" name="tingkat" id="tingkat">

								<option>-Pilih Tingkat-</option>



							</select>

						</div>



						<label class="col-sm-2 control-label">Mata Pelajaran</label>

						<div class="col-sm-3">

							<select class="form-control" name="mataPelajaran" id="pelajaran">



							</select>

						</div>


							<label class="col-sm-1 control-label">Bab</label>

						<div class="col-sm-3">

							<select class="form-control" name="bab" id="bab">



							</select>

						</div>


					</div>

					<div class="form-group" id="hidecontent">
						<div  class="dropzone">
							<div class="dz-message">
								<h3>Silahkan Isi dulu data di atas!</h3>  <strong>click</strong> to upload
							</div>
						</div>
					</div>


					<!-- Start Field Upload Image -->
					<div class="form-group" id="content">
						<div id="my-dropzone" class="dropzone">
							<div class="dz-message">
								<h3>Drop files disini</h3> atau <strong>click</strong> untuk upload
							</div>
						</div>
					</div>
					<!-- END Field Upload Image -->

				<!-- End Panel Body -->
			</form>
			<!-- End Panel -->
			</div>
		</div>
		<!-- End Row -->
		
	</div>
</section>
	<script src="<?php echo base_url(); ?>assets/library/dropzone/dropzone.min.js"></script>
<!--Start Scriot Dropdown depeden -->
<script type="text/javascript">
	 //buat load tingkat

    function loadTingkat() {

        jQuery(document).ready(function () {
        		$('#content').hide();
            var tingkat_id = {"tingkat_id": $('#tingkat').val()};

            var idTingkat;

            $.ajax({

                type: "POST",
 								dataType: "json",
                data: tingkat_id,

                url: "<?= base_url() ?>index.php/videoback/getTingkat",

                success: function (data) {

                    console.log("Data" + data);

                    $('#tingkat').html('<option value="">-- Pilih Tingkat  --</option>');

                    $.each(data, function (i, data) {

                        $('#tingkat').append("<option value='" + data.id + "'>" + data.aliasTingkat + "</option>");

                        return idTingkat = data.id;

                    });

                }

            });

            $('#tingkat').change(function () {

                tingkat_id = {"tingkat_id": $('#tingkat').val()};

                loadPelajaran($('#tingkat').val());

            })

            $('#pelajaran').change(function () {

                pelajaran_id = {"pelajaran_id": $('#pelajaran').val()};

                load_bab($('#pelajaran').val());

            })

            $('#bab').change(function () {
            	$('#content').show();
            	$('#hidecontent').hide();
            			var babaID = $('#bab').val();
									console.log(babaID);
									$('#tampBabID').val(babaID);
            })

           

        })

    };

    //buat load pelajaran

    function loadPelajaran(tingkatID) {

        $.ajax({

            type: "POST",
 						dataType: "json",
            data: tingkatID.tingkat_id,

            url: "<?php echo base_url() ?>index.php/videoback/getPelajaran/" + tingkatID,

            success: function (data) {

                $('#pelajaran').html('<option value="">-- Pilih Mata Pelajaran  --</option>');

                $.each(data, function (i, data) {

                    $('#pelajaran').append("<option value='" + data.id + "'>" + data.keterangan + "</option>");

                });

            }

        });

    }

    //buat load bab

    function load_bab(mapelID) {

        $.ajax({

            type: "POST",
 						dataType: "json",
            data: mapelID.mapel_id,

            url: "<?php echo base_url() ?>index.php/videoback/getBab/" + mapelID,

            success: function (data) {

                $('#bab').html('<option value="">-- Pilih Bab Pelajaran  --</option>');

                //console.log(data);

                $.each(data, function (i, data) {

                    $('#bab').append("<option value='" + data.id + "'>" + data.judulBab + "</option>");
                });
            }


        });

    }
    //load sub bab
    loadTingkat();
</script>
<!-- End Script dropdown depeden-->

	<script>


		Dropzone.autoDiscover = false;
		var myDropzone = new Dropzone("#my-dropzone", {
			url: "<?php echo site_url("gallery/upload/") ?>",
			acceptedFiles: "image/*",
			addRemoveLinks: true,

			removedfile: function(file) {
				var name = file.name;
				$.ajax({
					type: "post",
					url: "<?php echo site_url("gallery/remove") ?>",
					data: { file: name },
					dataType: 'html'
				});

				// remove the thumbnail
				var previewElement;
				return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
			},
			init: function() {
				var me = this;
				$.get("<?php echo site_url("gallery/list_files") ?>", function(data) {
					// if any files already in server show all here
					if (data.length > 0) {
						$.each(data, function(key, value) {
							var mockFile = value;
							me.emit("addedfile", mockFile);
							me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>uploads/" + value.name);
							me.emit("complete", mockFile);
						});
					}
				});
			}
		});


	</script>