<?php var_dump($pelajaran_sma);?>
<!-- mega menu -->
<section id="main" role="main">
	<div class="container">
		<div class="row">

			<ol class="col-md-3">
				<li class="dropdown-header bold"><a href="#">SD</a></li>
				<?php foreach ($pelajaran_sd as $pelajaran_items): ?>
					<li><a href="../index.php/video/"  class="text-info"><?=$pelajaran_items->namaMataPelajaran ?></a></li>
				<?php endforeach ?>
			</ol>

			<ol class="col-md-3">
				<li class="dropdown-header bold"><a href="#">SMP</a></li>
				<?php foreach ($pelajaran_smp as $pelajaran_items): ?>
					<li><a href="#"  class="text-primary"><?=$pelajaran_items->namaMataPelajaran ?></a></li>
				<?php endforeach ?>
			</ol>

			<ol class="col-md-3">
				<li class="dropdown-header bold"><a href="#">SMK</a></li>
				<?php foreach ($pelajaran_smk as $pelajaran_items): ?>
					<li><a href="#"  class="text-warning"><?=$pelajaran_items->namaMataPelajaran ?></a></li>
				<?php endforeach ?>
			</ol>

			<ol class="col-md-3">
				<li class="dropdown-header bold"><a href="#"  >SMA</a></li>
				<?php foreach ($pelajaran_sma as $pelajaran_items): ?>
					<li><a href="../index.php/video/daftarvideo/<?=$pelajaran_items->aliasMataPelajaran ?>/<?=$pelajaran_items->aliasTingkat ?>"  class="text-success"><?=$pelajaran_items->namaMataPelajaran ?></a></li>
				<?php endforeach ?>
			</ol>
		</div>
	</div>
</section>

<!-- greeting -->
<section class="section mb10">
	<hr>
  <div class="container">
  	<div class="col-sm-2">
  		<img src="<?=base_url('assets/image/client/aztec.png');?>" class="img-circle" alt="">
  	</div>
    <div class="col-sm-10">
    	<br><br>
        <h3 class="font-alt text-black mt0">Selamat Datang Di Netjo!</h3>
        <h5 class="font-alt text-black mt0">Sudah siap memulai belajar dengan cara asyik dan santai? mulailah dengan memilih mata pelajaran yang sesuai dengan tingkatanmu</5>
    </div>
  </div>
</section>

<!-- slidder video -->
<section class="section">
	<div class="container" style="width:90%">
		<section class="jumbotron nm">
                <div class="section container">
                    <!-- pattern + overlay -->
                    <div class="overlay pattern pattern10"></div>
                    <!-- pattern + overlay -->
                    <div class="container">
                        <!--/ Header -->
                        <!-- START row -->
                        <div class="row">
                            <!-- example 1 -->
                            <div class="col-sm-8 col-sm-offset-2 owl-carousel" id="customer-reviews">
                                <!-- review #1 -->
                                <div class="item text-center pt5">
                                	<blockquote class="nm">
                                    	<img src="<?=base_url('assets/image/client/aztec.png');?>" class="img-circle" alt="">
                                    	<h3>Judul Dari Video lorem</h3>
                                        <p>Ringkasan dari videonya Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim ven</p>
                                        <footer><a href ="#" class="text-white">Pelajari Selengkapnya  </a> <i class="ico ico-arrow-right"></i></footer>
                                    </blockquote>
                                </div>
                                <!--/ review #1 -->
                            </div>
                            <!--/ example 1 -->
                        </div>
                        <!--/ END row -->
                    </div>
                </div>
            </section></div>
</section>

<!-- featured video -->
<section class="section">
   <div class="container">
      <!-- video baru saja dilihat  -->            
      <div class="section-header section-header-bordered mb15">
          <h4 class="section-title">
              <p class="font-alt nm">Baru Saja Dilihat</p>
          </h4>
      </div>
      <!-- carousel -->            
         <div class="col-md-3">
            <!-- portfolio #1 -->
            <div class="item text-center">
                <!-- thumbnail -->
                <div class="thumbnail nm">
                    <!-- media -->
                    <div class="media">
                        <a href=""><video data-toggle="unveil" src="<?=base_url('assets/image/portfolio/placeholder.jpg');?>" data-src="<?=base_url('assets/image/portfolio/placeholder2.jpg');?>" alt="Photo" width="100%"/></a>
                    </div>
                    <!--/ media -->
                </div>
                <!--/ thumbnail -->
                <!-- Meta -->
                <h5 class="font-alt text-center mb5">Judul Video</h5>
                <div class="text-center">
                    <i class="ico-tags text-muted"></i>
                    <a href="javascript:void(0);" class="text-muted">SMA - IPA</a>
                </div>
                <!--/ Meta -->
            </div>
            <!--/ portfolio #1 -->
         </div>
       <!--/ carousel -->
   </div>
</section>

<!-- featured video 1-->
<section class="section">
   <div class="container">
      <!-- video baru saja dilihat  -->            
      <div class="section-header section-header-bordered mb15">
          <h4 class="section-title">
              <p class="font-alt nm">Topik Favorite</p>
          </h4>
      </div>
      <!-- carousel -->            
         <div class="col-md-3">
            <!-- portfolio #1 -->
            <div class="item text-center">
                <!-- thumbnail -->
                <div class="thumbnail nm">
                    <!-- media -->
                    <div class="media">
                        <a href=""><video data-toggle="unveil" src="<?=base_url('assets/image/portfolio/placeholder.jpg');?>" data-src="<?=base_url('assets/image/portfolio/placeholder2.jpg');?>" alt="Photo" width="100%"/></a>
                    </div>
                    <!--/ media -->
                </div>
                <!--/ thumbnail -->
                <!-- Meta -->
                <h5 class="font-alt text-center mb5">Judul Bab</h5>
                <div class="text-center">
                    <i class="ico-tags text-muted"></i>
                    <a href="javascript:void(0);" class="text-muted">SMA - IPA</a>
                </div>
                <!--/ Meta -->
            </div>
            <!--/ portfolio #1 -->
         </div>
       <!--/ carousel -->
   </div>
</section>

<script type="text/javascript">
	$('.carousel').carousel()
</script>