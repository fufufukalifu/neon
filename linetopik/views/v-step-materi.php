<div class="page-title" style="background:#2b3036">

    <div class="grid-row">

        <h1>{judul_header2}</h1>

    </div>

</div>
 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">
    <div class="page-content grid-row">
        <div class=" grid-col-row clear-fix" >
            <div class="grid-col grid-col-3 sidebar" >
                          <h2><a href="<?=base_url('index.php/linetopik/learningline/').$UUID?>"><?= $datMateri['namaTopik']; ?></a></h2>
                          <hr class="divider-big">
                                                   <!-- Start Time Line -->
                            <ul class="media-list media-list-feed grid-col grid-col-3" >
                            <?php 
                            $idTarget=0;
                            foreach ($datline as $key ):           
                            ?>
                                <li for="n<?=$idTarget;?>" class="media">
                                     <div class="media-object pull-left">
                                        <i href="<?=$key['link'];?>"  class="<?=$key['icon']?> bg-color-3alt" ></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="<?=$key['link'];?>" class="media-heading" id="n<?=$idTarget;?>" ><?=$key['namaStep']?></a>
                                      <!--   <p class="media-text"><span class="text-primary semibold">Service Page</span> has been edited by Tamara Moon.</p>
                                        <p class="media-meta">Just Now</p> -->
                                    </div>
                                </li>       
                            <?php 
                            $idTarget ++;
                            endforeach ?>
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
                                <div class="author-post">nama Materi:' <?= $datMateri['judulMateri']; ?> '</div>
                            </div>
                            <div class="comments-post">Materi</div>
                        </div>
                         <p><?= $datMateri['isiMateri']; ?></p>
                            <div class="tags-post">
                            <a href="#" rel="tag">Tingkat</a><!-- 
                         --><a href="#" rel="tag">Mapel</a>
                            <a href="#" rel="tag">Bab</a>
                            <a href="#" rel="tag">Topik : <?= $datMateri['namaTopik']; ?> </a>
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

	<!-- END Page Content -->
