<div class="grid-col-row row" >
    <div class="container">
        <div class="grid-col grid-col-3 container">
            <aside class="widget-categories">
                <h2>Semua Video</h2>
                <hr class="divider-big" />
                <ul>
                    <?php foreach ($videobysub as $videobysub_item): ?>
                        <li class="cat-item cat-item-1 current-cat"><a href="<?=base_url('index.php/video/seevideo/') ?><?=$videobysub_item->id?>"><?=$videobysub_item->judulVideo ?></a></li>
                    <?php endforeach ?>
                </ul>
            </aside>
        </div>
    
        <div class="grid-col grid-col-8 container" >
            <main>
                <section class="clear-fix">
                    <h2 class="center">{judul_video}</h2>
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