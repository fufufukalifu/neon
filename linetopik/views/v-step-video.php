<link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
<div class="page-title" style="background:#2b3036">

    <div class="grid-row">

        <h1>{judul_header2}</h1>

    </div>

</div>

			   <!-- content -->
    <div class="page-content grid-row">
        <div class=" grid-col-row clear-fix">
        	<div class="grid-col grid-col-3 sidebar ">
               <h2 ><a href="<?=base_url('index.php/linetopik/learningline/').$UUID?>"><?= $datVideo['namaTopik']; ?></a></h2> 
                <hr class="divider-big">
                            <!-- Start Time Line -->
                            <ul class="media-list media-list-feed grid-col grid-col-3" >
                            <?php foreach ($datline as $key ): ?>
                                <li class="media">
                                     <div class="media-object pull-left">
                                        <a href="<?=$key['link'];?>"  class="<?=$key['icon']?> bg-color-3alt" ></a>
                                    </div>
                                    <div class="media-body">
                                        <a href="<?=$key['link'];?>" class="media-heading"><?=$key['namaStep']?></a>
                                      <!--   <p class="media-text"><span class="text-primary semibold">Service Page</span> has been edited by Tamara Moon.</p>
                                        <p class="media-meta">Just Now</p> -->
                                    </div>
                                    <!-- <a><?=$key['namaStep']?></a> -->
                                  <!--   <ul>        
                                    <li>Jenis <?=$key['jenisStep']?></li>
                                    <li><a href="<?=$key['link'];?>">Link <?=$key['link'];?></a> </li>
                                    <li>ICon <?=$key['icon']?></li>
                                    </ul> -->
                                </li>

                            <?php endforeach ?>
                            </ul>
                            <!-- END Tieme line -->
            </div>
            <div class="grid-col grid-col-9">
                <main>
		 <!-- post item -->
                    <div class="blog-post">
                        <article>
                        <div class="post-info">
							<div class="date-post"><div class="day"><?=$tgl?></div><div class="month"><?=$bulan?></div></div>
							<div class="post-info-main">
								<div class="post"><?=$datVideo['judulVideo']?></div>
							</div>
							<div class="comments-post">Logo</div>
						</div>
                        <?php if ($datVideo['link']=='' || $datVideo['link']==' '): ?>
                            <div class="container-video color-palette bg-color-6alt">
                                <video class="" width="100%" height="100%"  controls>
                              <source src="<?=base_url();?>assets/video/<?=$datVideo['namaFile'];?>" >
                                  Your browser does not support the video tag.
                              </video>
                            </div>
                        <?php endif ?>
                        <?php if ($datVideo['namaFile']=='' || $datVideo['namaFile']==' '): ?>
                            <div class="video-player" style="background:grey;">
                                 <iframe src="<?=$datVideo['link']?>"></iframe> 
                            </div>
                        <?php endif ?>
						



                                

                         

						<h3>Deskripsi</h3>
						<p><?=$datVideo['deskripsiVideo']?></p>
				<div class="tags-post">
                            <a href="#" rel="tag">Tingkat</a><!-- 
                         --><a href="#" rel="tag">Mapel</a>
                            <a href="#" rel="tag">Bab</a>
                            <a href="#" rel="tag">Topik : </a>
                        </div>
						
                           
                        </article>
                        
                    </div>
                    <!-- / post item -->
                    <hr class="divider-color" />
                  

                </main>
            </div>
            
        </div>
    </div>
    <!-- / content -->
