<?php  ?>
<form>
  <input type="hidden" name="tingkat" value="{alias_tingkat}">
<input type="hidden" name="pelajaran" value="{alias_pelajaran}">
</form>
<div class="page-content grid-row">

  <div class="row">
    <h1>Materi {mapel}</h1>
    <h4>Silahkan pilih materi yang akan kamu pelajar...</h4>
  </div>

  <div class="row">
    <div class="col-md-6">
     <h5>View : <div class="btn-group" data-toggle="buttons" > 

       <label class="btn active cws-button alt btn-primary bg-color-2" id="in-soal"> 
          <input type="radio" name="options"  autocomplete="off" checked="true" title="Tampilkan Semua Jenis Video"> All
        </label>

        <label class="btn cws-button alt btn-primary bg-color-2" id="pr-rumus" title="Tampilkan Jenis Video Room"> 
          <input type="radio" name="options"   autocomplete="off"> Room
        </label> 

        <label class="btn cws-button alt btn-primary bg-color-2" id="pr-rumus" title="Tampilkan Jenis Video Screen"> 
          <input type="radio" name="options"   autocomplete="off"> Screen
        </label> 

        </div></h5>
       
      </div>
      <div class="col-md-6">
       <h5>Video : <div class="btn-group" data-toggle="buttons" > 

       <label class="btn cws-button alt btn-primary bg-color-2" onclick="direct()"> 
          <input type="radio" name="options"  autocomplete="off" checked="true" > By Bab
        </label> 

        <label class="btn cws-button alt btn-primary bg-color-2 active" id="pr-rumus" active> 
          <input type="radio" name="bysub" autocomplete="off"> By Sub Bab
        </label> 

        </div></h5>
       
       </div>

     </div>

     <br>

     <hr class="divider-color">

     <main>

      <!-- START TAMPIL DAFTAR -->

      <?php

      $cekjudulbab=null;

      $i='0'; 

     // echo "==================="."<br>";

      ?>

      <!-- Awal 1 -->
      <div class="grid-col-row clear-fix" >
        <div class="grid-col grid-col-3">
          <div class="hover-effect"></div>        
          <!-- Awal 1 -->
          <?php foreach ($bab_video as $bab_video_items) {
            $judulbab=$bab_video_items->judulBab;
            $subbab=$bab_video_items->judulSubBab;
            if ($cekjudulbab != $judulbab) { 
              if($i=='1'){?>
              </ol>
            </div>
            <!--Akhir 1-->



            <!-- Awal 2 -->
            <div class="grid-col-row clear-fix" >
              <div class="grid-col grid-col-3">
                <div class="hover-effect"></div>
                <!-- Awal 2 -->
                <?php
              }
              ?>

              <h4><strong><?php echo $judulbab ;?><br></strong></h4>
              <ol>
                <li><a href="<?=base_url('video/videosub/')?><?=$bab_video_items->subbabID?>"><?php echo $subbab ;?></a></li>
                <?php        
              }else{
               ?>
               <li><a href="<?=base_url('video/videosub/')?><?=$bab_video_items->subbabID?>"><?php echo $subbab ;?></a></li>
               <?php
             }
             $cekjudulbab=$judulbab;
             $i='1';
             ?>
             <?php } 
             ?>
             <!-- Ahir 2 -->
           </ol>
         </div>
         <!-- Akhir 2 -->
         <!-- END TAMPIL DAFTAR -->





       </main>
     </div>

     <!-- ucapan selamat datang -->
     <main>
      <div class="page-content grid-row">
        <div class="porfolio-item">
          <div class="col-md-2"><img src="<?=base_url('assets/back/img/logo.png')?>"  width="200px" data-at2x="<?=base_url('assets/back/img/logo@2x.png')?>" alt></div>
          <div class="col-md-10">
            <h4>Selamat Datang Di Neon!</h4>
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





<script type="text/javascript">
  function direct(){
    var tingkat = $("input[name='tingkat']").val();
    var aliasMapel = $("input[name='pelajaran']").val();
    window.location = base_url+"video/daftarallvideo/"+aliasMapel+"/"+tingkat;
  }

</script>