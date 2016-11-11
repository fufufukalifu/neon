<style type="text/css">
	.komen {
		width:80%;
		margin-left: 120px;
	}
	.komen li{
		margin: 0;
		padding: 0;
		line-height:1.5;
	}
</style>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>


<main class="container">
	<div class="page-content">
		<section>
			<h2><a onclick="showmodal()" class="cws-button bt-color-3 border-radius icon-left"><i class="fa fa-plus"></i>Buat Pertanyaan</a></h2>
			<!-- tabs -->
			<div class="tabs">
				<div class="block-tabs-btn clear-fix">
					<div class="tabs-btn active	" data-tabs-id="tabs1">Semua Pertanyaan</div>
					<div class="tabs-btn" data-tabs-id="tabs2">Pertanyaan Setingkat</div>
					<div class="tabs-btn" data-tabs-id="tabs3">Pertanyaan saya</div>
				</div>
				<!-- tabs keeper -->
				<div class="tabs-keeper">
					<!-- tabs container -->
					<div class="container-tabs active" data-tabs-id="cont-tabs1" style="display: block;">
						<form class="form-group">
							<p class="input-icon">
								<i class="fa fa-search"></i>
								<input type="text" placeholder="Cari Pertanyaan..." name="search_data_1" id="search1">
							</p>
						</form>
						semua
						<?php foreach ($questions as $question): ?>
							<div class="blog-post">
								<article>
									<hr class="divider-color">
									<br><br>
									<div class="quotes clear-fix">
										<div class="quote-avatar-author clear-fix">
											<img src="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
											data-at2x="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
											width=60
											alt=""><div class="author-info"><?=$question['namaDepan']." ".$question['namaBelakang'] ?>
											<br></div></div>

											<q>
												<b><?=$question['judulPertanyaan'] ?></b>
												<span title="waktu dibuat"> (<?=$question['date_created'] ?>)</span>
											</q>	
											<div class="komen">
												<?=$question['isiPertanyaan'] ?><br>
											</div>
											
										</div>
										
										<div class="tags-post">
											<a href="#" rel="tag"><?=$question['judulSubBab'] ?></a><a href="#" rel="tag"><?=$question['jumlah'] ?></a>
										</div>
										<a href="<?=base_url('konsultasi/singlekonsultasi/') ?><?=$question['pertanyaanID'] ?>" class="cws-button border-radius alt icon-right">
											Read More 
											<i class="fa fa-angle-right"></i></a>
										</article>
									</div>

									<!-- / blog item -->
								<?php endforeach ?>
								<!-- pagination -->
								<div class="page-pagination clear-fix">
					<a href="#"><i class="fa fa-angle-double-left"></i></a><!--
					--><a href="#">1</a><!-- 
					--><a href="#">2</a><!-- 
					--><a href="#" class="active">3</a><!-- 
				--><a href="#"><i class="fa fa-angle-double-right"></i></a>
			</div>
			<!-- / pagination -->
		</div>


		<!--/tabs container -->
		<div class="container-tabs" data-tabs-id="cont-tabs2" style="display: none;">
			<form class="form-group">
				<p class="input-icon">
					<i class="fa fa-search"></i>
					<input type="text" placeholder="Cari Pertanyaan" name="search_data" id="search2">
				</p>
			</form>
			PERTANYAAN LEVEL
			<?php foreach ($questions_bylevel as $question): ?>
				<div class="blog-post">
					<article>
						<hr class="divider-color">
						<br><br>
						<div class="quotes clear-fix">
							<div class="quote-avatar-author clear-fix">
								<img src="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
								data-at2x="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
								width=60
								alt=""><div class="author-info"><?=$question['namaDepan']." ".$question['namaBelakang'] ?><br></div></div>

								<q>
									<b><?=$question['judulPertanyaan'] ?></b>
									<span title="waktu dibuat"> (<?=$question['date_created'] ?>)</span>
								</q>	
								<div class="komen">
									<?=$question['isiPertanyaan'] ?><br>
								</div>
								
							</div>
							<br>
							<div class="tags-post">
								<a href="#" rel="tag"><?=$question['judulSubBab'] ?></a><a href="#" rel="tag"><?=$question['jumlah'] ?></a>
							</div>
							<a href="<?=base_url('konsultasi/singlekonsultasi/') ?><?=$question['pertanyaanID'] ?>" class="cws-button border-radius alt icon-right">
								Read More 
								<i class="fa fa-angle-right"></i></a>
							</article>
						</div>

						<!-- / blog item -->
					<?php endforeach ?></div>
					<!-- tabs container -->
					<div class="container-tabs" data-tabs-id="cont-tabs3" style="display: none;">
						<form class="form-group">
							<p class="input-icon">
								<i class="fa fa-search"></i>
								<input type="text" placeholder="Cari Pertanyaan" name="search_data" id="search3">
							</p>
						</form>
							PERTANYAANKU
						<?php foreach ($my_questions as $question): ?>

							<div class="blog-post">
								<article>
									<hr class="divider-color">
									<br><br>
									<div class="quotes clear-fix">
										<div class="quote-avatar-author clear-fix">
											<img src="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
											data-at2x="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
											width=60
											alt=""><div class="author-info"><?=$question['namaDepan']." ".$question['namaBelakang'] ?><br></div></div>

											<q>
												<b><?=$question['judulPertanyaan'] ?></b>
												<span title="waktu dibuat"> (<?=$question['date_created'] ?>)</span>
											</q>	
											<div class="komen">
												<?=$question['isiPertanyaan'] ?><br>
											</div>
											
										</div>
										<br>
										<div class="tags-post">
											<a href="#" rel="tag"><?=$question['judulSubBab'] ?></a><a href="#" rel="tag"><?=$question['jumlah'] ?></a>
										</div>
										<a href="<?=base_url('konsultasi/singlekonsultasi/') ?><?=$question['pertanyaanID'] ?>" class="cws-button border-radius alt icon-right">
											Read More 
											<i class="fa fa-angle-right"></i></a>
										</article>
									</div>

									<!-- / blog item -->
								<?php endforeach ?>
								<!-- pagination -->
								<div class="page-pagination clear-fix">
					<a href="#"><i class="fa fa-angle-double-left"></i></a><!--
					--><a href="#">1</a><!-- 
					--><a href="#">2</a><!-- 
					--><a href="#" class="active">3</a><!-- 
				--><a href="#"><i class="fa fa-angle-double-right"></i></a>
			</div>
			<!-- / pagination -->
		</div>

		<!--/tabs container -->
		<!-- tabs container -->

		<!--/tabs container -->
	</div>
	<!--/tabs keeper -->
</div>
<!-- /tabs -->
</section>
</div>
</div>
</main>
<script type="text/javascript">
	$(document).ready(function() {  

		$('#search1').autocomplete({
			source:  base_url +"konsultasi/search_all",
			select: function (event, ui) {
				window.location = ui.item.url;
			}
		});

		$('#search2').autocomplete({
			source: base_url +"konsultasi/search_tingkat",
			select: function (event, ui) {
				window.location = ui.item.url;
			}
		});

		$('#search3').autocomplete({
			source: base_url +"konsultasi/search_mine",
			select: function (event, ui) {
				window.location = ui.item.url;
			}
		});
	});
	function showmodal(){
		$('#myModal').modal('show');
	}
</script>