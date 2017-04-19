 <style type="text/css">
 	.komen {
 		width:80%;
 		margin-left: 120px;
 	}
 	.komen img{
 		width: 10%;
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
 		<h2><a onclick="showmodal()" class="cws-button bt-color-3 icon-left small"><i class="fa fa-plus"></i>Buat Pertanyaan</a></h2>
 		<!-- tabs -->
 		<div class="tabs">

 			<!-- tabs keeper -->
 			<div class="tabs-keeper">
 				<!-- tabs container -->
 				<div class="container-tabs active" data-tabs-id="cont-tabs1" style="display: block;">
 					<form class="form-group">
 						<div class="grid-col-row clear-fix">
 							<div class="grid-col grid-col-4">
 								<select name="" id="" onchange="location = this.value";>
 									<option value="<?=base_url('konsultasi/pertanyaan_ku') ?>"  class="center-text">Pertanyaan Saya</option>
 									<option selected value="<?=base_url('konsultasi/pertanyaan_all')?>">Semua Pertanyaan</option>
 									<option value="<?=base_url('konsultasi/pertanyaan_grade')?>">Pertanyaan Setingkat</option>
 									<option value="<?=base_url('konsultasi/pertanyaan_mento')?>r">Pertanyaan Sementor</option>
 								</select>
 							</div>
 							<div class="grid-col grid-col-4">
 								<p class="input-icon">
 									<i class="fa fa-search"></i>
 									<form method ="POST">
 										<input type="text" placeholder="Cari pertanyaan lalu enter" name="cari" id="search1">
 									</form>
 								</p>
 							</div>

 							<div class="grid-col grid-col-1">
 								<a class="cws-button bt-color-3 icon-left smaller" href="<?=base_url('konsultasi/pertanyaan_all') ?>"><i class="fa fa-times"></i> Reset</a>
 							</div>
 						</div>
 						
 					</form>
 					<!-- semua -->
 					<?php if ($my_questions): ?>
 						<?php foreach ($my_questions as $question): ?>
 							<div class="blog-post">
 								<article>
 									<hr class="divider-color">
 									<br><br>
 									<div class="quotes clear-fix">
 										<div class="quote-avatar-author clear-fix" style="border-radius: 0">
 											<img src="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
 											data-at2x="<?=base_url("assets/image/photo/siswa/".$question['photo'])?>" 
 											width=60
 											alt="">
 											<div class="author-info">
 												<center><?=$question['namaDepan']." ".$question['namaBelakang'] ?></center>
 											</div>
 										</div>
 										<a href="<?=base_url('konsultasi/singlekonsultasi/') ?><?=$question['pertanyaanID'] ?>">
 											<q>
 												<h3><?=$question['judulPertanyaan'] ?></h3>
 												<span title="waktu dibuat"> (<?=$question['date_created'] ?>)</span>
 											</q>
 										</a>

 										<div class="komen">
 											<?=$question['isiPertanyaan'] ?><br>
 										</div>

 									</div>

 									<div style="text-align: right">
 										<a href="<?=base_url('konsultasi/pertanyaan_all?cari='.$question['judulBab']) ?>">
 											<i class="fa fa-puzzle-piece"></i> <?=$question['judulBab'] ?></a> |
 											<span><i class="fa fa-pencil"></i> <?=$question['jumlah'] ?></span> |
 											<?php if (!empty($question['namaGuru'])): ?>
 												<span><i class="fa fa-search"></i> <?=$question['namaGuru'] ?></a>
 												<?php else: ?>
 													<span>Tanpa Mentor</span>
 												<?php endif ?>
 											</div>
 										</article>
 									</div>

 									<!-- / blog item -->
 								<?php endforeach ?>
 							<?php else: ?>
 								<h3>Tidak Ada Pertanyaan</h3>

 							<?php endif ?>

 						</div>
 						<!-- pagination -->
 						<hr>
 						<br>
 						<div>

 							<div class="page-pagination clear-fix" style="width:100%;">
 								<center><?php echo $links; ?></center>	
 							</div>

 						</div>

 						<!-- / pagination -->

 						<!--/tabs container -->
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
	function showmodal(){
		$('#myModal').modal('show');
	}

</script>