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
</style>
	<script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/adapters/jquery.js') ?>"></script>
<div class="modal fade " tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button><br>
                <div class="modal-title">Balas</div>
            </div>


            <div class="modal-body">
            <textarea  name="editor1" class="form-control" id="isi">
							</textarea>
                <div class="modal-footer bg-color-3">
                </div>
            </div>

        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->

</div>

<main>	
	<div class="container">	

		<div class="blog-post"><article>
			<div class="post-info">
				<div class="date-post"><div class="day">26</div><div class="month">Feb</div></div>
				<div class="post-info-main">
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
					<div class="komen">{isi}</div>
					<input type="hidden" name="" value="{isi}">
					
				</div>

			</div><br>

			<div class="tags-post">
							<a href="#" rel="tag">{sub}</a><!-- 
						--><a onclick="quote({isi})" rel="tag">quote</a>
					</div>
				</article>
			</div>

			<hr class="divider-big">
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
							<div class="komen"><?=$item_postingan['isiJawaban'] ?></div>
							<input type="hidden" name="" value="{isi}">

						</div>

					</div><br>

					<div class="text-right">
						<a href="" class="cws-button alt bt-color-1 icon-left smaller">
							<i class="fa fa-heart">
							</i>Point
						</a>
						<a onclick="quote(<?=$item_postingan['isiJawaban'] ?>)" class="cws-button alt bt-color-2 icon-left smaller">
							<i class="fa fa-quote-right ">
							</i>Quote	
						</a>
					</div>

				</article>
			</div>
		<?php endforeach ?>
	</div>

	<script type="text/javascript">
		var ckeditor = CKEDITOR.replace( 'editor1' );

		function quote(data){
			$('#myModal').modal('show');
		}
	</script>