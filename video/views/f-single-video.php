<hr class="divider-color" />
<main>
<div class="container"> 
  <!-- START TAMPIL DAFTAR -->
  <?php
    $cekjudulSubBab=null;
    $i='0'; 
  ?>
  <!-- Awal 1 -->
  <div class="grid-col-row clear-fix" >
    <div class="grid-col grid-col-3">
      <div class="hover-effect"></div>        
      <!-- Awal 1 -->
      <?php foreach ($video_by_bab as $bab_video_items) {
        
        $judulSubBab=$bab_video_items['judulSubBab'];
        // $subbab=$bab_video_items->judulSubBab;
        if ($cekjudulSubBab != $judulSubBab) { 
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
        <h4><strong><?php echo $judulSubBab ;?><br></strong></h4>
        <ol><?php  // print_r($bab_video_items) ?>
          <li><a href="<?=base_url('video/seevideo/')?><?=$bab_video_items['videoID']?>"><?php echo $bab_video_items['judulVideo'] ;?></a></li>
          <?php        
        }else{
         ?>
         <li><a href="<?=base_url('video/seevideo/')?><?=$bab_video_items['videoID']?>"><?php echo $bab_video_items['judulVideo'] ;?></a></li>
         <?php
       }
       $cekjudulSubBab=$judulSubBab;
       $i='1';
       ?>
       <?php }  ?>
       <!-- Ahir 2 -->
     </ol>
   </div>
   <!-- Akhir 2 -->
   <!-- END TAMPIL DAFTAR -->
   </div>
 </main>


<hr class="divider-color" />
<div class="grid-col-row row" >
    <div class="container">
        <div class="grid-col grid-col-3 container">
            <aside class="project-details">
            <br><br>
                <h5>{nama_sub}</h5>
                <hr class="divider-big" />
                <ul>
                    <?php foreach ($videobysub as $videobysub_item): ?>
                        <li><a href="<?=base_url('index.php/video/seevideo/') ?><?=$videobysub_item->id?>"><?=$videobysub_item->judulVideo ?></a></li>
                    <?php endforeach ?>
                </ul>
            </aside>
        </div>

        <div class="grid-col grid-col-8 container" >
           <main>
                <section class="clear-fix">
                    <h5 class="center">{judul_video}</h5>
                    <hr class="divide-color">
                    <video preload controls src="<?=base_url('assets/video/{file}');?>" width="750px" ></video>
                    <p>{deskripsi}</p>
                    <hr class="divider-color" />
                    <div class="quote-avatar-author clear-fix"><img src="<?=base_url('assets/image/photo/guru/{photo}');?>" data-at2x="<?=base_url('assets/image/photo/guru/{photo}');?>" alt width="100px"><div class="author-info">{nama_penulis}<br/><span>Pembuat Video</span></div></div>
                    <p>{biografi}</p>
                </section>
                <hr class="divider-color" />
            </main>
        </div>
    </div>
</div>