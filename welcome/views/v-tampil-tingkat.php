    <div class="page-content grid-row">
        <main>
            <div class="grid-col-row clear-fix">
                <div class="row">
                    <div class="container"><h1 class="text-center">Pilih tingkatanmu untuk memulai latihan tes atau try out!</h1><br></div>
                </div>
                <?php foreach ($tingkat as $tingkats): ?>
                <div class="grid-col grid-col-3">
                    <div class="course-item">
                        <div class="course-hover">
                            <img src="http://placehold.it/370x280" data-at2x="http://placehold.it/370x280" alt>
                            <div class="hover-bg bg-color-3"></div>
                            <a href="">Mulai Tes</a>
                        </div>
                        <div class="course-name clear-fix">
                            <center><h3 style="text-align:center"><a href=""></a></h3></center>
                        </div>
                        <div class="course-date bg-color-3 clear-fix">
                            
                            <div class="description"><?=$tingkats['aliasTingkat'] ?><br></div>
                            <div class="divider"></div>
                        </div>
                    </div>
                    
                    <!-- / course item -->
                </div>
                <?php endforeach ?>


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


