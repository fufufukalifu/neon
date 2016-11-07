<style type="text/css">
	.komen {
		width:80%;
		margin-left: 120px;
	}
	.komen li{
		margin: 0;
		padding: 0;
		line-height:1.8;
	}
	.komen{
		/*border: 1px solid black;*/
	}
</style>
<script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/adapters/jquery.js') ?>"></script>


<main>	
	<div class="modal fade " tabindex="-1" role="dialog" id="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button><br>
						<div class="modal-title">Balas</div>
					</div>


					<div class="modal-body">

					<div class="quotes kuote">
							<p><i>

							</p><i>
						</div>
						<textarea  name="editor1" class="form-control" id="isi">
						</textarea>
						<div class="modal-footer bg-color-3">
							<button type="button" class="cws-button bt-color-1 border-radius alt small" data-dismiss="modal">Batal</button>
							<button type="button" class="cws-button bt-color-2 border-radius alt small mulai-btn post" onclick="save()">Post</button>
						</div>
					</div>

				</div><!-- /.modal-content -->

			</div><!-- /.modal-dialog -->

		</div>
		<div class="container">	

			<div class="blog-post"><article>
				<div class="post-info">
					<div class="date-post"><div class="day">{tanggal}</div><div class="month">{bulan}</div></div>
					<div class="post-info-main">
						<input type="hidden" value="{id_pertanyaan}" name="idpertanyaan">
						<input type="hidden" value="{id_pengguna}" name="idpengguna">

						<div class="author-post">by {author}</div>
					</div>
					<div class="comments-post"><i class="fa fa-comment"></i> {jumlah}</div>
				</div>

				<div class="quotes clear-fix" >
					<div class="quote-avatar-author clear-fix">
						<img src="http://placehold.it/60x60" data-at2x="http://placehold.it/60x60" alt="">
						<div class="author-info">{author}<br><span>{akses}</span></div>
					</div>

					<div>
						<p><q><b>{judul_header}</b></q></p>
						<div class="komen"><?=$isi ?>
							<input type="hidden" name="" value="<?=$isi ?>">
						</div>
						<input type="hidden" name="" value="{isi}">

					</div>

				</div><br>

				<div class="tags-post">
					<a href="#" rel="tag">{sub}</a>
					<?php// echo "$isi"; ?>
					<a onclick="quote(<?php echo htmlspecialchars($isi) ?>)" rel="tag">quote</a>
					<a onclick="quote()" rel="tag">Balas</a>

				</div>
			</article>
		</div>

		<hr class="divider-big">
		<?php if ($data_postingan!=array()): ?>
			<?php foreach ($data_postingan as $item_postingan): ?>
				<div class="blog-post">
					<article>
						<div class="row bg-color-2">
							<div class="container"><?=$item_postingan['date_created'] ?></div>
						</div><br>

						<div class="quotes clear-fix" >
							<div class="quote-avatar-author clear-fix">
								<?php $gbr = base_url().'assets/image/photo'."/".$item_postingan['hakAkses']."/".$item_postingan['avatar'] ?>
								<img 
								src="<?=$gbr ?>" width="60px">
								<div class="author-info"><?=$item_postingan['namaPengguna'] ?><br><span><?=$item_postingan['hakAkses'] ?></span></div>
							</div>

							<div>
								<div class="komen"><?=$item_postingan['isiJawaban'] ?>

									<input type="hidden" name="<?=$item_postingan['jawabID'] ?>" value="<?=$item_postingan['isiJawaban'] ?>">

								</div>
								<input type="hidden" name="" value="{isi}">

							</div>

						</div><br>

						<div class="text-right">
							<a href="" class="cws-button alt bt-color-1 icon-left smaller">
								<i class="fa fa-heart">
								</i>Point
							</a>
							<a onclick="quote(<?=$item_postingan['jawabID'] ?>)" class="cws-button alt bt-color-2 icon-left smaller">
								<i class="fa fa-quote-right ">
								</i>Quote	
							</a>
						</div>

					</article>
				</div>
			<?php endforeach ?>
		<?php endif ?>

	</div>

	<script type="text/javascript">
		var ckeditor = CKEDITOR.replace( 'editor1' );

		function quote(data=""){
			// $('.modal-body .quotes q').append("");

		// console.log(data);
		if (data=="") {
			$('#myModal').modal('show');
			// ckeditor.setData(data);
		}else{
			string = $('input[name='+data+']').val();
			console.log(string);
			$('.modal-body .quotes p i').html(string);

			ckeditor.setData(string);
			$('#myModal').modal('show');
		// }

	}
}
	function save(){

		var desc = ckeditor.getData();
		var data = {
			isiJawaban : desc+"<br>",
			penggunaID : $('input[name=idpengguna]').val(),
			pertanyaanID : $('input[name=idpertanyaan]').val(),
		}
		console.log(data);
		idpertanyaan= data.pertanyaanID;
		// console.log(data);

		if (data.isiJawaban == "") {
			$('#info').show();
		}else{
			url = base_url+"konsultasi/ajax_add_jawaban/";
			$.ajax({
				url : url,
				type: "POST",
				data: data,
				dataType: "TEXT",
				success: function(data)
				{
				// alert('masd');
                $('.post').text('Posting..'); //change button text
                $('.post').attr('disabled',false); //set button enable
                // alert('berhasil');
                window.location = base_url+"konsultasi/singlekonsultasi/"+idpertanyaan;
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            	alert('Error adding / update data');
            }
        });
		}
	}
</script>