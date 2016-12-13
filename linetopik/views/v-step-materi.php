<main class="container">
    <div class="grid-row">
        <div class="page-content grid-col-row clear-fix">
            <div class="grid-col grid-col-8">
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
                           
                        </article>
                        <div class="tags-post">
                            <a href="#" rel="tag">Tingkat</a><!-- 
                         --><a href="#" rel="tag">Mapel</a>
                            <a href="#" rel="tag">Bab</a>
                            <a href="#" rel="tag">Topik : <?= $datMateri['namaTopik']; ?> </a>
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

	<!-- END Page Content -->
</main>