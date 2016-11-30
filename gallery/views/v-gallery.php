
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
								<a href="<?=base_url('/assets/image/gallery/').$key['file_name'] ;?>" class="btn btn-default magnific" title="view picture"><i class="ico-search"></i></a>
								<!-- <a href="#" class="btn btn-default" title="love this picture"><i class="ico-heart6"></i></a> -->
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