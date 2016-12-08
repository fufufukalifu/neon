
<section class="id="main" role="main"">
	<!-- Start Container -->
	<div class="container-fluid">
		<!-- Start row -->
		<div class="row" id="id="shuffle-grid"">
		<?php foreach ($datImg as $key ): ?>
			<div class="col-md-3 shuffle" data-groups='["nature"]' data-date-created="2014-01-02" data-title="background1">
				<!-- thumbnail -->
				<div class="thumbnail">
					<!-- media -->
					<div class="media">
						<!-- indicator -->
						<div class="indicator"><span class="spinner"></span>
						</div>
						<!--/ indicator -->
						<!-- toolbar overlay -->
						<div class="overlay">
							<div class="toolbar">
								<input type="text" value="<?=$key['file_name']?>" id="name_img" hidden="true">
								<a href="<?=base_url('/assets/image/gallery/').$key['file_name'] ;?>" target="_blank" class="btn btn-teal magnific" title="view picture"><i class="ico-search"></i></a>
								<a href="javascript:void(0);" class="btn btn-danger" title="Hapus Gambar" onclick='hapusImg("<?=$key["UUID"]?>")'><i class="ico-trash"></i></a>
							</div>
						</div>
						<!--/ toolbar overlay -->
						<!-- meta -->
						<span class="meta bottom darken">
							<h5 class="nm semibold">
								<?=$key['file_name'] ?> <br/>
								<small><i class="ico-calendar2"></i> <?=$key['date_created']?></small>
							</h5>
						</span>
						<!--/ meta -->
						<img data-toggle="unveil" src="<?=base_url('/assets/image/gallery/').$key['file_name'] ;?>" data-src="<?=base_url('/assets/image/gallery/').$key['file_name'] ;?>" alt="Photo" width="300px" height="200px" />
					</div>
					<!--/ media -->
				</div>
				<!--/ thumbnail -->
			</div>
		<?php endforeach ?>
			
			
		</div>
		<!-- END row -->
	</div>
	<!-- END Container -->
</section>

<script type="text/javascript">
	function hapusImg(UUID) {
		var name = $('#name_img').val();
		if (confirm('Apakah Anda yakin akan menghapus data ini? ')) {
               // ajax delete data to database
               
               $.ajax({
                     url : base_url+"index.php/gallery/remove_img/",
                     type: "POST",
                     data: { file: name,
                     		  UUID : UUID},
                     dataType: "TEXT",
                     success: function(data,respone)
                     {  
                       
                           alert('Berhasil Dihapus');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                            alert('Error deleting data');
                            // console.log(jqXHR);
                            // console.log(textStatus);
                            // console.log(errorThrown);
                    }
                });
             }
	}
</script>