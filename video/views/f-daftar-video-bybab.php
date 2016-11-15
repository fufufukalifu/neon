<?php  ?>
<form>
  <input type="hidden" name="tingkat" value="{alias_tingkat}">
  <input type="hidden" name="pelajaran" value="{alias_pelajaran}">
</form>
<div class="page-content grid-row">

  <div class="row">
    <div class="col-md-6">
     <h5>Type : <div class="btn-group" data-toggle="buttons" > 

       <label class="btn active cws-button alt btn-primary bg-color-2" onclick="semua()"> 
        <input type="radio" name="options"  autocomplete="off" checked="true" title="Tampilkan Semua Jenis Video"> All
      </label>

      <label class="btn cws-button alt btn-primary bg-color-2" title="Tampilkan Jenis Video Room" onclick="justroom()"> 
        <input type="radio" name="options" autocomplete="off"> Room
      </label> 

      <label class="btn cws-button alt btn-primary bg-color-2" title="Tampilkan Jenis Video Screen" onclick="justscreen()"> 
        <input type="radio" name="options" autocomplete="off"> Screen
      </label> 

    </div></h5>

  </div>
  <div class="col-md-6">
   <h5>Video : <div class="btn-group" data-toggle="buttons" > 

     <label class="btn cws-button alt active btn-primary bg-color-2" id="in-soal"> 
      <input type="radio" name="options"  autocomplete="off" checked="true"> By Video
    </label> 

    <label class="btn cws-button alt btn-primary bg-color-2 " id="pr-rumus" onclick="direct()"> 
      <input type="radio" name="options"   autocomplete="off"> By Sub Bab
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
  ?>
  <!-- Awal 1 -->
  <div class="grid-col-row clear-fix" >
    <div class="grid-col grid-col-3">
      <div class="hover-effect"></div>        
      <!-- Awal 1 -->
      <?php foreach ($bab_video as $bab_video_items) {

        $judulbab=$bab_video_items->judulBab;
        // $subbab=$bab_video_items->judulSubBab;
        if ($cekjudulbab != $judulbab) { 
          if($i=='1'){?>
        </ul>	
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
        <ul>
        <?php if ($bab_video_items->jenis_video==2): ?>
          <li class="room"><a href="<?=base_url('video/seevideo/')?><?=$bab_video_items->videoID?>" title="Room" >
           <?=$bab_video_items->judulVideo." (r)" ;?>           
         </a>
       </li>
        <?php else: ?>
          <li class="screen"><a href="<?=base_url('video/seevideo/')?><?=$bab_video_items->videoID?>" title="Screen" >
           <?=$bab_video_items->judulVideo." (s)" ;?>           
         </a>
       </li>
        <?php endif ?>
          <?php }else{  ?>
        <?php if ($bab_video_items->jenis_video==2): ?>
          <li class="room"><a href="<?=base_url('video/seevideo/')?><?=$bab_video_items->videoID?>" title="Room" >
           <?=$bab_video_items->judulVideo." (r)" ;?>           
         </a>
       </li>
        <?php else: ?>
          <li class="screen"><a href="<?=base_url('video/seevideo/')?><?=$bab_video_items->videoID?>" title="Screen" >
           <?=$bab_video_items->judulVideo." (s)" ;?>           
         </a>
       </li>
        <?php endif ?>
          
       <?php
     }
     $cekjudulbab=$judulbab;
     $i='1';
     ?>
     <?php }  ?>
     <!-- Ahir 2 -->
   </ul>	
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

  <script type="text/javascript">
    function direct(){
      var tingkat = $("input[name='tingkat']").val();
      var aliasMapel = $("input[name='pelajaran']").val();
      window.location = base_url+"video/daftarvideo/"+aliasMapel+"/"+tingkat;
    }

    function justroom(){
      $('.screen').hide("slow");
      $('.room').show("slow");
    }

    function justscreen(){
      $('.screen').show("slow");
      $('.room').hide("slow");
    }

    function semua(){
      $('.screen').show("slow");
      $('.room').show("slow");
    }
  </script>




