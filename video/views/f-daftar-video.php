<?php  ?>
<div class="page-content grid-row">
    <div class="row">
        <h1>Materi {mapel}</h1>
        <h4>Silahkan pilih materi yang akan kamu pelajar...</h4>
    </div>
    <br>
    <hr class="divider-color">
    <main>

     <?php
       //print_r($bab_video);
     $cekjudulbab=null;
     $i="0"; 
     ?>
     <?php foreach ($bab_video as $bab_video_items) {
        $judulbab=$bab_video_items->judulBab;
        $subbab=$bab_video_items->judulSubBab;
        if ($cekjudulbab != $judulbab) { 
            if($i==1){

            }
        }
        ?>
        <a href="<?=base_url('index.php/video/lihatvideo') ?>/<?=$bab_video_items->babid ?>" 
            title="Lihat Semua Video">
            <?=$bab_video_items->judulBab  ?> <i class="ico ico-eye-open"></i></a> 
        <?php }   ?>

        <div class="grid-col-row clear-fix" >
            <div class="grid-col grid-col-3">
                <div class="hover-effect"></div>
                <h5><strong>Sekolah Dasar<br></strong></h5>
                <ol>
                </ol>
            </div>


        </div>
    </main>
</div>



<!-- ucapan selamat datang -->
<main>
    <div class="page-content grid-row">
        <div class="porfolio-item">
            <div class="col-md-2"><img src="<?=base_url('assets/back/img/logo.png')?>"  data-at2x="<?=base_url('assets/back/img/logo@2x.png')?>" alt></div>
            <div class="col-md-10">
                <h4>Selamat Datang Di netJo!</h4>
                <p>Sudah siap memulai belajar dengan cara asyik dan santai? mulailah dengan memilih mata pelajaran yang sesuai dengan tingkatanmu.</p>
            </div>
            <br><br>
            <br><br>

        </div>
    </div>
</main>
<!-- ucapan selamat datang -->


<!-- testimonials -->
<div class="row">
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="http://placehold.it/1200x380" alt="Chania">
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>

<br><br>
<hr class="divider-big">


