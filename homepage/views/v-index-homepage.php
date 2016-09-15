<!DOCTYPE HTML>
<html>
<head>
	<title>{judul_halaman}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- style -->
	<link rel="shortcut icon" href="<?=base_url('assets/back/img/favicon.png') ?>">
	<link rel="stylesheet" href="<?=base_url('assets/back/css/font-awesome.css') ?>">
	<link rel="stylesheet" href="<?=base_url('assets/back/fi/flaticon.css') ?>">
	<link rel="stylesheet" href="<?=base_url('assets/back/css/main.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/back/tuner/css/colorpicker.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/back/tuner/css/styles.css') ?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/back/css/jquery.fancybox.css') ?>" />
	<link rel="stylesheet" href="<?=base_url('assets/back/css/owl.carousel.css') ?>"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/back/rs-plugin/css/settings.css') ?>" media="screen">
	<link rel="stylesheet" href="<?=base_url('assets/back/css/animate.css') ?>">
	<!--styles -->
</head>
<body>
	<?php include 'v-header.php' ?>
	<?php include 'v-revolution-slidder.php' ?>
	
	
	<hr class="divider-color">
	<!-- content -->
	<div id="home" class="page-content padding-none">
		<?php include 'v-last-courses.php'; ?>
		<hr class="divider-color" />
		<!-- section -->
		<section class="fullwidth-background padding-section">
			<div class="grid-row clear-fix">
				<div class="grid-col-row">
					<div class="grid-col grid-col-6">
						<a href="" class="service-icon"><i class="flaticon-pie"></i></a>
						<a href="" class="service-icon"><i class="flaticon-medical"></i></a>
						<a href="" class="service-icon"><i class="flaticon-restaurant"></i></a>
						<a href="" class="service-icon"><i class="flaticon-website"></i></a>
						<a href="" class="service-icon"><i class="flaticon-hotel"></i></a>
						<a href="" class="service-icon"><i class="flaticon-web-programming"></i></a>
						<a href="" class="service-icon"><i class="flaticon-camera"></i></a>
						<a href="" class="service-icon"><i class="flaticon-speech"></i></a>
					</div>
					<div class="grid-col grid-col-6 clear-fix">
						<h2>Our Services</h2>
						<p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at susp. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecea accumsan, massa nec vulputate congue. Maecenas nec odio et ante tincidunt creptus alarimus tempus.</p>
						<a href="" class="cws-button bt-color-3 border-radius alt icon-right float-right">Learn More<i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		</section>
		<!-- / section -->
		<!-- paralax section -->
		<div class="parallaxed">
			<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
				<img src="<?=base_url('assets/back/img/parallax.png') ?>" alt="">

			</div>
			<div class="them-mask bg-color-1"></div>
			<div class="grid-row">
				<div class="grid-col-row clear-fix">
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block">
							<i class="flaticon-book1"></i>
							<div class="counter" data-count="356">0</div>
							<div class="counter-name">Pelajaran</div>
						</div>
					</div>
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block">
							<i class="flaticon-multiple"></i>
							<div class="counter" data-count="4781">0</div>
							<div class="counter-name">Peserta</div>
						</div>							
					</div>
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block">
							<i class="flaticon-pencil"></i>
							<div class="counter" data-count="41">0</div>
							<div class="counter-name">Pengajar</div>
						</div>
					</div>
					<div class="grid-col grid-col-3 alt">
						<div class="counter-block last">
							<i class="flaticon-speech"></i>
							<div class="counter" data-count="120">0</div>
							<div class="counter-name">Konsultasi</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- / paralax section -->
		<hr class="divider-color" />
		<!-- paralax section -->
		<section class="padding-section">
			<div class="grid-row clear-fix">
				<div class="grid-col-row">
					<div class="grid-col grid-col-6">
						<div class="boxs-tab">
							<div class="animated fadeIn active" data-box="1">
								<img src="http://placehold.it/510x340" data-at2x="http://placehold.it/510x340" alt>
							</div>
							<div class="animated fadeIn" data-box="2">
								<img src="http://placehold.it/510x340" data-at2x="http://placehold.it/510x340" alt>
							</div>
							<div class="animated fadeIn" data-box="3">
								<img src="http://placehold.it/510x340" data-at2x="http://placehold.it/510x340" alt>
							</div>
						</div>
					</div>
					<div class="grid-col grid-col-6">
						<h2>Netjoo Menawarkan</h2>
						<p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at suscipit. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecenas accumsan, massa nec vulputate congue.<br/><br/>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p>
						<div class="tabs-box">
							<a href="#vd" data-boxs-tab="1" class="active">Try Out Online</a>
							<a href="#dvd" data-boxs-tab="2">Video Pembelajaran</a>
							<a href="#cddv" data-boxs-tab="3">Konsultasi</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- / paralax section -->
		<hr class="divider-color"/>
		<?php include 'v-about-us.php' ?>
		<!-- parallax section -->
		<div class="parallaxed">
			<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
				<img src="<?=base_url('assets/back/img/parallax.png') ?>" alt="">
			</div>
			<div class="them-mask bg-color-2"></div>
			<div class="grid-row center-text">
				<div class="font-style-1 margin-none">Get In Touch With Us</div>
				<div class="divider-mini"></div>
				<p class="parallax-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
				<form class="subscribe">
					<input type="text" name="email" value="" size="40" placeholder="Enter your email" aria-required="true"><input type="submit" value="Subscribe">
				</form>
			</div>
		</div>
		<!-- parallax section -->
		<?php include 'v-favorite-guru.php' ?>
		<hr class="divider-color" />
		<!-- section -->
		<section class="padding-section">
			<div class="grid-row clear-fix">
				<div class="grid-col-row">
					<div class="grid-col grid-col-6">
						<div class="video-player">
							<iframe src="https://www.youtube.com/embed/rZsH88zNxRw"></iframe>
						</div>
					</div>
					<div class="grid-col grid-col-6 clear-fix">
						<h2>Learn More About Us From Video</h2>
						<p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at susp. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecea accumsan, massa nec vulputate congue.</p>
						<p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p>
						<br/>
						<br/>
						<br/>
						<br/>
						<a href="page-about-us.html" class="cws-button bt-color-3 border-radius alt icon-right float-right">Watch More<i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</div>
		</section>
		<!-- / section -->
		<!-- parallax section -->
		<div class="parallaxed">
			<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
				<img src="<?=base_url('assets/back/img/parallax.png') ?>" alt="">
			</div>
			<div class="them-mask bg-color-3"></div>
			<div class="grid-row center-text">
				<!-- twitter -->
				<div class="twitter-1"></div>
				<!-- / twitter -->
			</div>
		</div>
		<!-- parallax section -->
		<hr class="divider-color" />
		<!-- section -->
		<section class="fullwidth-background testimonial padding-section">
			<div class="grid-row">
				<h2 class="center-text">Testimonials</h2>
				<div class="owl-carousel testimonials-carousel">
					<div class="gallery-item">
						<div class="quote-avatar-author clear-fix"><img src="http://placehold.it/94x94" data-at2x="http://placehold.it/94x94" alt=""><div class="author-info">Karl Doe<br><span>Writer</span></div></div>
						<p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </p>
					</div>
					<div class="gallery-item">
						<div class="quote-avatar-author clear-fix"><img src="http://placehold.it/94x94" data-at2x="http://placehold.it/94x94" alt=""><div class="author-info">Karl Doe<br><span>Writer</span></div></div>
						<p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </p>
					</div>
					<div class="gallery-item">
						<div class="quote-avatar-author clear-fix"><img src="http://placehold.it/94x94" data-at2x="http://placehold.it/94x94" alt=""><div class="author-info">Karl Doe<br><span>Writer</span></div></div>
						<p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </p>
					</div>
				</div>
			</div>
		</section>
		<!-- / section -->
	</div>
	<!-- / content -->
	<!-- footer -->
	<?php include 'v-footer.php' ?>
<script src="<?=base_url('assets/back/js/jquery.min.js') ?>"></script>
<script type='text/javascript' src="<?=base_url('assets/back/js/jquery.validate.min.js') ?>"></script>
<script src="<?=base_url('assets/back/js/jquery.form.min.js') ?>"></script>
<script src="<?=base_url('assets/back/js/TweenMax.min.js') ?>"></script>
<script src="<?=base_url('assets/back/js/main.js') ?>"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="<?=base_url('assets/back/rs-plugin/js/jquery.themepunch.tools.min.js') ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/back/rs-plugin/js/jquery.themepunch.revolution.min.js') ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/back/rs-plugin/js/extensions/revolution.extension.slideanims.min.js') ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/back/rs-plugin/js/extensions/revolution.extension.actions.min.js') ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/back/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/back/rs-plugin/js/ex tensions/revolution.extension.kenburn.min.js') ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/back/rs-plugin/js/extensions/revolution.extension.navigation.min.js') ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/back/rs-plugin/js/extensions/revolution.extension.migration.min.js') ?>"></script>
<script type="text/javascript" src="<?=base_url('assets/back/rs-plugin/js/extensions/revolution.extension.parallax.min.js') ?>"></script>		
<script src="<?=base_url('assets/back/js/jquery.isotope.min.js') ?>"></script>

<script src="<?=base_url('assets/back/js/owl.carousel.min.js') ?>"></script>
<script src="<?=base_url('assets/back/js/jquery-ui.min.js') ?>"></script>
<script src="<?=base_url('assets/back/js/jflickrfeed.min.js') ?>"></script>
<script src="<?=base_url('assets/back/js/jquery.tweet.js') ?>"></script>
<script type='text/javascript' src="<?=base_url('assets/back/tuner/js/colorpicker.js') ?>"></script>
<script type='text/javascript' src="<?=base_url('assets/back/tuner/js/scripts.js') ?>"></script>
<script src="<?=base_url('assets/back/js/jquery.fancybox.pack.js') ?>"></script>
<script src="<?=base_url('assets/back/js/jquery.fancybox-media.js') ?>"></script>
<script src="<?=base_url('assets/back/js/retina.min.js') ?>"></script>
</body>
</html>