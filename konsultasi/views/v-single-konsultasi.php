<style type="text/css">
	.komen {
		width:80%;
		margin-left: 120px;
		/*border: 1px solid pink;*/

	}
	.komen li{
		margin: 0;
		padding: 0;
		line-height:1.8;
	}
	.komen quote{
		/*border: 1px solid black;*/
		padding: 3px 20px;
		width: inherit;
		background: rgba(0,0,0,.1);
		font-style: italic;
	}
	blockquote {
		background: #f9f9f9;
		border-left: 10px solid #ccc;
		margin: 1.5em 10px;
		padding: 0.5em 10px;
		quotes: "\201C""\201D""\2018""\2019";
	}
	blockquote:before {
		color: #ccc;
		content: open-quote;
		font-size: 4em;
		line-height: 0.1em;
		margin-right: 0.25em;
		vertical-align: -0.4em;
	}
	blockquote p {
		display: inline;
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


						
					</div>
					<div class="modal-footer bg-color-3">
						
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
							<input type="hidden" name="single" value="<?=$isi ?>">
						</div>
						<input type="hidden" name="" value="{isi}">

					</div>

				</div><br>

				<div class="tags-post">
					<a href="#" rel="tag">{sub}</a>
					<?php// echo "$isi"; ?>
					<a onclick="quote('single')" rel="tag">quote</a>
					<a onclick="quote()" rel="tag">Balas</a>

				</div>
			</article>
		</div>

		<hr class="divider-big"><?php echo "hakakses ".$this->session->userdata('HAKAKSES')?>
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

									<input type="hidden" name="<?=$item_postingan['jawabID'] ?>" value="<?=$item_postingan['isiJawaban']."<span style='font-style:italic'><br>Post By:".$item_postingan['namaPengguna']?>">

								</div>

							</div>

						</div><br>

						<?php if ($this->session->userdata('HAKAKSES')=="guru"): ?>
							<div class="text-right">
								<a onclick="quote(<?=$item_postingan['jawabID'] ?>)" class="cws-button alt bt-color-2 icon-left smaller">
									<i class="fa fa-quote-right ">
									</i>Quote	
								</a>
							</div>
						<?php else :?>
							<?php if ($item_postingan['namaPengguna']==$this->session->userdata('USERNAME')): ?>
								<div class="text-right">
									<a onclick="quote(<?=$item_postingan['jawabID'] ?>)" class="cws-button alt bt-color-2 icon-left smaller">
										<i class="fa fa-quote-right ">
										</i>Quote	
									</a>
								</div>

							<?php else :?>
								<div class="text-right">
									<a onclick="point(<?=$item_postingan['jawabID'] ?>)" class="cws-button alt bt-color-1 icon-left smaller">
										<i class="fa fa-heart">
										</i>Point
									</a>

									<a onclick="quote(<?=$item_postingan['jawabID'] ?>)" class="cws-button alt bt-color-2 icon-left smaller">
										<i class="fa fa-quote-right ">
										</i>Quote	
									</a>
								</div>
							<?php endif ?>

						<?php endif ?>



						
					</article>
				</div>
			<?php endforeach ?>
		<?php endif ?>

	</div>

	<script type="text/javascript">
		var ckeditor;
		var string;
		function quote(data=""){
			elemen = "<div class='quotes kuote'><p><i></p><i></div><textarea  name='editor1' class='form-control' id='isi'></textarea>";
			button = "<button type='button' class='cws-button bt-color-1 alt small' data-dismiss='modal'>Batal</button><button type='button' class='cws-button bt-color-2 alt small mulai-btn post' onclick='save()'>Post</button>";

			$('.modal-body').html(elemen);
			$('.modal-footer').html(button);


			ckeditor = CKEDITOR.replace( 'editor1' );


			if (data=="") {
				$('.modal-header .modal-title').html("Balas Pertanyaan");
				string = 0;
				$('#myModal').modal('show');
			// ckeditor.setData(data);
		}else{
			$('.modal-header .modal-title').html("Quote Jawaban");

			string = $('input[name='+data+']').val();
			$('.modal-body .quotes p i').html("<blockquote>"+string+"</blockquote>");
			console.log(string);
			// ckeditor.setData(string);
			$('#myModal').modal('show');
		}
	}
	function save(){
		//kalo kosong
		if (string==0) {
			var desc = ckeditor.getData();

			var data = {
				isiJawaban : desc+"",
				penggunaID : $('input[name=idpengguna]').val(),
				pertanyaanID : $('input[name=idpertanyaan]').val(),
			}
			idpertanyaan= data.pertanyaanID;
		}else{
			console.log(string);
			quote = "<blockquote>"+string+"</blockquote>";
			var desc = quote+ckeditor.getData();
			console.log(desc);

			var data = {
				isiJawaban : desc+"",
				penggunaID : $('input[name=idpengguna]').val(),
				pertanyaanID : $('input[name=idpertanyaan]').val(),
			}
			console.log(data);
			idpertanyaan= data.pertanyaanID;
		// console.log(data);

	}





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

function point(data){
	elemen = "<textarea class='form-control' name='komentar'></textarea>";
	$('.modal-body').html(elemen);
	$('.modal-header .modal-title').html("Berikan Komentar");
	$('#myModal').modal('show');
	button = "<button type='button' class='cws-button bt-color-1 alt small' data-dismiss='modal'>Batal</button><button type='button' class='cws-button bt-color-2 alt small mulai-btn post'onclick='komen("+data+")'>Berikan</button>";

	$('.modal-footer').html(button);
	

}

function komen(data){
	var isikomentar = $('textarea[name=komentar]').val();

	// url = base_url+"konsultasi/ajax_add_point/"+data;
	url = base_url+"konsultasi/check_point/"+data;

	datas = {
		isiKomentar : isikomentar,
		idJawaban : data
	}
	var stat;
	$.ajax({
		url : url,
		type: "POST",
		data: datas,
		dataType: "json",
		success: function(data, status, jqXHR)
		{
			stat = get_data(data, datas);
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error adding / update data');
		}
	});

}

function get_data(data, datas){
	status = data;
	postingan = datas;
	if (status==1) {
		alert("Tidak Dapat Memberikan Point")
	}else{
		console.log(postingan.idJawaban);
		url = base_url+"konsultasi/ajax_add_point/"+postingan.idJawaban;
		$.ajax({
			url : url,
			type: "POST",
			data: datas,
			dataType: "text",
			success: function()
			{
				alert("sudah ditambahkan");
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error adding / update data');
			}
		});
	}
}


</script>