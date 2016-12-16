<main class="container">
<!-- Start page content -->
<div class="page-content">
<section>
	   <!-- content -->
    <div class="grid-row">
        <div class="page-content grid-col-row clear-fix">
            <div class="grid-col grid-col-8">
                <main>
                    <!-- post item -->
                    <div class="blog-post">
                        <article>
                        <div class="post-info">
                            <!-- <div class="date-post"><div class="day">15</div><div class="month">Feb</div></div> -->
                            <div class="post-info-main">
                                <div class="author-post">nama Topik:' <?=$namaTopik;?> '</div>
                            </div>
                            <div class="comments-post"><i class="fa fa-comment"></i>Line</div>
                        </div>
                         <h3>nama Topik:' <?=$deskripsi;?> '</h3>
                            <ul>
                            <?php foreach ($datline as $key ): ?>
                                <li>
                                    <a><?=$key['namaStep']?></a>
                                    <ul>        
                                    <li>Jenis <?=$key['jenisStep']?></li>
                                    <li><a href="<?=$key['link'];?>">Link <?=$key['link'];?></a> </li>
                                    <li>ICon <?=$key['icon']?></li>
                                    </ul>
                                </li>       
                            <?php endforeach ?>
                            </ul>
                        </article>
                        <div class="tags-post">
                            <a href="#" rel="tag">Tingkat</a><!-- 
                         --><a href="#" rel="tag">Mapel</a>
                            <a href="#" rel="tag">Bab</a>
                        </div>
                    </div>
                    <!-- / post item -->
                    <hr class="divider-color" />
                  

                </main>
            </div>
            <div class="grid-col grid-col-3 sidebar">
                <!-- widget search -->
                <aside class="widget-search">
                    <form method="get" class="search-form" action="#">
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" class="search-field" placeholder="Search" value="" name="s" title="Search for:">
                        </label>
                        <input type="submit" class="search-submit" value="GO">
                    </form>
                </aside>
                <!--/ widget search -->
                <!-- widget categories -->
                <aside class="widget-categories">
                    <h2>Topik</h2>
                    <hr class="divider-big" />
                    <ul>
                        <li class="cat-item cat-item-1 current-cat"><a href="#">Test Line 1<span> (2) </span></a></li>
                        <li class="cat-item cat-item-1 current-cat"><a href="#">Test Line 1<span> (6) </span></a></li>
                        <li class="cat-item cat-item-1 current-cat"><a href="#">Arvchitecture and Built <span> (12) </span></a></li>
                    </ul>
                </aside>
                <!-- widget categories -->
      </div>
        </div>
    </div>
    <!-- / content -->

</section>
</div>
<!-- ENd Page Content -->
</main>