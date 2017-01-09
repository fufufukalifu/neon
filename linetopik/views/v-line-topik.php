<div class="page-title" style="background:#2b3036">

    <div class="grid-row">

        <h1>{judul_header2}</h1>

    </div>

</div>
<!-- CSS TIME LINE -->
 <link rel="stylesheet" href="<?= base_url('assets/css/custom-time-line.css') ?>">

<!--  -->

	   <!-- content -->
    <div class="page-content grid-row" >
        <div class="grid-col-row clear-fix" >
         <div class="grid-col grid-col-3 sidebar" style="border-right:10px black; ">

                <!-- widget Topik -->
                <aside class="widget-categories">
                    <h2>Topik</h2>
                    <hr class="divider-big" />
                    <ul>
                    <?php foreach ($topik as $rows): ?>
                        <li class="cat-item cat-item-1 current-cat"><a href=""><?=$rows['namaTopik']?><span></span></a>
                    <?php endforeach ?>
                    </ul>
                  
                </aside>
                <!--/ widget Topik -->
      </div>
            <div class="grid-col grid-col-9">
                <main>

                            <?php   $i=0; 
                                    $namaTopik=''; ?>
                            <?php foreach ($datline as $key ): ?>
                                <?php if ($namaTopik != $key['namaTopik'] && $i==0): ?>
                <!-- start header line-->
                    <!-- post item -->
                    <div class="blog-post">
                        <article>
                        <div class="post-info">
                            
                            <div class="post-info-main">
                                <div class="author-post" >nama Topik:' <?=$key['namaTopik']?> '</div>
                            </div>
                            <div class="comments-post"><i class="fa fa-comment"></i>Line</div>
                        </div>
                         <h3>Deskripsi:' <?=$key['deskripsi']?> '</h3>
                         <!-- Start Time Line -->
                         <h4>Time Line</h4>
                         <hr>
                            <ul class="media-list media-list-feed " >
                <!-- end header line-->
                               
                                <?php elseif($namaTopik != $key['namaTopik']) : ?>
                <!-- END body line -->
                            </ul>
                            <!-- END Tieme line -->
                        </article>
                        <div class="tags-post">
                            <a href="#" rel="tag"><?=$key['tingkat']?></a><!-- 
                         --><a href="#" rel="tag"><?=$key['mapel']?></a>
                            <a href="#" rel="tag"><?=$key['bab']?></a>
                        </div>
                    </div>
                    <!-- / post item -->
                    <hr class="divider-color" />
                <!-- END body line -->
                <!-- start header line-->
                    <!-- post item -->
                    <div class="blog-post">
                        <article>
                        <div class="post-info">
                            
                            <div class="post-info-main">
                                <div class="author-post">nama Topik:' <?=$key['namaTopik']?> '</div>
                            </div>
                            <div class="comments-post"><i class="fa fa-comment"></i>Line</div>
                        </div>
                         <h3>Deskripsi:' <?=$key['deskripsi']?> '</h3>
                         <!-- Start Time Line -->
                         <h4>Time Line</h4>
                         <hr>
                            <ul class="media-list media-list-feed " >
                <!-- end header line-->
                                <?php endif ?>
                                <li for class="media">
                                     <div class="media-object pull-left">
                                        <i  class="<?=$key['icon']?> bg-color-3alt" ></i>
                                    </div>
                                    <div class="media-body">
                                        <a  href="<?=$key['link'];?>" class="media-heading"><?=$key['namaStep']?></a>
                                      <!--   <p class="media-text"><span class="text-primary semibold">Service Page</span> has been edited by Tamara Moon.</p>
                                        <p class="media-meta">Just Now</p> -->
                                    </div>
                                    <!-- <a><?=$key['namaStep']?></a> -->
                                  <!--   <ul>        
                                    <li>Jenis <?=$key['jenisStep']?></li>
                                    <li><a href="<?=$key['link'];?>">Link <?=$key['link'];?></a> </li>
                                    <li>ICon <?=$key['icon']?></li>
                                    </ul> -->
                                    <hr>
                                </li> 
                                <!-- </a>       -->
                                 <?php $i++;  ?>
                                <?php  $namaTopik=$key['namaTopik'];  ?>
                            <?php endforeach ?>
                            </ul>
                            <!-- END Tieme line -->
                        </article>
                        <div class="tags-post">
                            <a href="#" rel="tag"><?=$key['tingkat']?></a> 
                            <a href="#" rel="tag"><?=$key['mapel']?></a>
                            <a href="#" rel="tag"><?=$key['bab']?></a>
                        </div>
                    </div>
                    <!-- / post item -->
                    <hr class="divider-color" />


                </main>
            </div>
           
        </div>
    </div>
    <!-- / content -->



