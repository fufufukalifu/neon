    			<!-- START Blog Content -->
    			<section class="section bgcolor-white">
    				<div class="container">
    					<!-- START Row -->
    					<div class="row">
    						<!-- START Left Section -->
    						<div class="col-md-3 mb15">

    							<!-- Category -->
    							<div class="mb15">
    								<!-- Header -->
    								<div class="section-header section-header-bordered mb10">
    									<h4 class="section-title">
    										<p class="font-alt nm">Mata Pelajaran</p>
    									</h4>
    								</div>
    								<!--/ Header -->
    								<ul class="list-unstyled">
                                    <?php foreach ($mapeltingkat as $mapelitem): ?>
    									<li class="mb5"><i class="ico-angle-right text-muted mr5"></i> <a href="javascript:void(0);"><?=$mapelitem['namaMataPelajaran'] ?></a></li>
    								 <?php endforeach ?>
                                    </ul>
    							</div>
    							<!--/ Category -->
    							<!-- Text Widget -->
    							<div class="mb15">
    								<!-- Header -->
    								<div class="section-header section-header-bordered mb10">
    									<h4 class="section-title">
    										<p class="font-alt nm">Deskripsi</p>
    									</h4>
    								</div>
    								<!--/ Header -->
    								<p class="nm text-default">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    									consequat.</p>
    								</div>
    								<!--/ Text Widget -->
    							</div>
    							<!--/ END Left Section -->


    							<!-- START Right Section -->
    							<div class="col-md-9">
									<?php foreach ($paket as $paketitem): ?>
										<div class="col-md-3">
    									<!-- START Panel pricing -->
    									<div class="panel bg-color-<?=rand(1, 5)?>">
    										<!-- panel heading -->
    										<div class="panel-heading text-center" style="min-height:50px;background-color:white">
                                                <span>
													Sub Bab :<br> <?=$paketitem->JudulSub ?> <br>
                                                     <?=$paketitem->nm_paket ?>
    											</span>
                                            </strong>
    										</div>
    										<!-- panel heading -->
    										<!-- panel body -->
    										<div class="panel-body text-center">
    											<img class="img-circle img-bordered" src="<?=base_url('assets/image/portfolio/portfolio1.jpg');?>" alt="" width="100%">
    										</div>
    										<!--/ panel body -->
    										<!-- table -->
    										<table class="table">
    											<tbody>
    												<tr>
    													<td colspan="2" align="center">
    														<a href="#" class="cws-button border-radius bt-color-6 alt">Coba Latihan</a>
    													</td>
    												</tr>
    											</tbody>
    										</table>
    										<!--/ table -->
    									</div>
    									<!--/ END Panel pricing -->
    								</div>
									<?php endforeach ?>
    								


    							</div>
    						</section>
    						<!--/ END Blog Content -->

    						<!-- START To Top Scroller -->
    						<a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
    						<!--/ END To Top Scroller -->
    					</section>
    			<!--/ END Template Main -->