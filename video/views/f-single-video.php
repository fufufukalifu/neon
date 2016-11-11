<style type="text/css">
    blockquote {
        background: #f9f9f9;
        /*margin: 1.5em 10px;*/
        padding: 0.5em 10px;
        quotes: "\201C""\201D""\2018""\2019";
        /*border: 1px solid black;*/
        border-right: 10px solid #ccc;
        margin-left: 80px;

    }
    blockquote:before {
        color: #ccc;
        content: open-quote;
        font-size: 4em;
        line-height: 0.1em;
        margin-right: 10px;
        vertical-align: -0.4em;
    }
    blockquote p {
        display: inline;
    }
</style>
<hr class="divider-color" />
<main>
    <div class="container"> 
        <!-- START TAMPIL DAFTAR -->
        <?php
        $cekjudulSubBab = null;
        $i = '0';
        ?>
        <!-- Awal 1 -->
        <div class="grid-col-row clear-fix" >
            <div class="grid-col grid-col-3">
                <div class="hover-effect"></div>        
                <!-- Awal 1 -->
                <?php
                foreach ($video_by_bab as $bab_video_items) {

                    $judulSubBab = $bab_video_items['judulSubBab'];
                    // $subbab=$bab_video_items->judulSubBab;
                    if ($cekjudulSubBab != $judulSubBab) {
                        if ($i == '1') {
                            ?>
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
                        <h4><strong><?php echo $judulSubBab; ?><br></strong></h4>
                        <ol><?php // print_r($bab_video_items)            ?>
                            <li><a href="<?= base_url('video/seevideo/') ?><?= $bab_video_items['videoID'] ?>"><?php echo $bab_video_items['judulVideo']; ?></a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="<?= base_url('video/seevideo/') ?><?= $bab_video_items['videoID'] ?>"><?php echo $bab_video_items['judulVideo']; ?></a></li>
                            <?php
                        }
                        $cekjudulSubBab = $judulSubBab;
                        $i = '1';
                        ?>
                        <?php } ?>
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
                                <li><a href="<?= base_url('index.php/video/seevideo/') ?><?= $videobysub_item->id ?>"><?= $videobysub_item->judulVideo ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </aside>
                </div>

                <div class="grid-col grid-col-8 container" >
                    <main>
                        <section class="clear-fix">
                            <h5 class="center">{judul_video}</h5>
                            <hr class="divide-color">
                            <video preload controls src="<?= base_url('assets/video/{file}'); ?>" width="750px" ></video>
                            <p>{deskripsi}</p>
                            <hr class="divider-color" />
                            <div class="quote-avatar-author clear-fix"><img src="<?= base_url('assets/image/photo/guru/{photo}'); ?>" data-at2x="<?= base_url('assets/image/photo/guru/{photo}'); ?>" alt width="100px"><div class="author-info">{nama_penulis}<br/><span>Pembuat Video</span></div></div>
                            <p>{biografi}</p>
                        </section>
                        <hr class="divider-color" />
                        <section class="clear-fix">
                            <form class="login-form" action ="" id="formkomen" method = "post">
                                    <div id="info">
                                        <div class="sukses text-info text-center hide">
                                            <span>Komen anda telah terkirim, tunggu moderisasi dari guru yang bersangkutan</span>
                                        </div>
                                        <div class="gagal text-danger text-center hide">
                                            <span>Gagal memberikan komen !</span>
                                        </div> 
                                        <div class="lengkapi text-danger text-center hide">
                                            <span>Tolong isi komentar</span>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <textarea placeholder="Tambahkan komentar" id="isiKomen" name="isiKomen" style="border: 1px solid graytext; width: 100%;padding: 10px;"></textarea>
                                </div>

                                <div class="form-group nm pull-right">
                                    <button type="submit" class="button-fullwidth cws-button bt-color-3 alt"><span class="semibold">Kirim</span></button>
                                </div>
                            </form>
                        </section>
                        <section class="clear-fix">  
                            <!-- comments for post -->
                            <div class="comments">
                                <div id="comments">

                                    <div class="comment-title">Komentar <span>(<?=count($comments) ?>)</span></div>
                                    <ol class="commentlist">
                                        <?php foreach ($comments as $comment): ?>   
                                            <li class="comment">
                                                <div class="comment_container clear" style="margin-right: 100px">
                                                    <img src="http://placehold.it/70x70" data-at2x="http://placehold.it/70x70" alt="" class="avatar">
                                                    <div class="comment-text">
                                                        <p class="meta">
                                                            <strong><?=$comment->namaPengguna ?></strong>
                                                            <time datetime="<?=$comment->date_created ?>"> : <?=$comment->date_created ?></time>
                                                        </p>
                                                        <div class="description">
                                                            <p><?=$comment->isiKomen ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach ?>

                                    </ol>
                                </div>
                            </div>
                            <!-- / comments for post -->

                        </section>
                    </main>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $("#formkomen").submit(function (e) {
                    e.preventDefault();
                    var isiKomen = $("#isiKomen").val();
                    var videoID = <?= $this->uri->segment(3) ?>;
                    if (isiKomen=="") {
                        $('#info .lengkapi').removeClass('hide');
                        $('#info .sukses').addClass('hide');
                        $('#info .gagal').addClass('hide');
                    }else{
                     $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() ?>index.php/Video/addkomen',
                        data: {isiKomen: isiKomen, videoID: videoID},
                        success: function (data)
                        {
                                // alert('SUCCESS!!');
                        $('#info .lengkapi').addClass('hide');
                        $('#info .sukses').removeClass('hide');
                        $('#info .gagal').addClass('hide');
                                document.getElementById("isiKomen").value = "";
                                // window.location = base_url+"/video/seevideo/"+videoID;
                            },
                            error: function ()
                            {
                            $('#info .lengkapi').removeClass('hide');
                            $('#info .sukses').addClass('hide');
                            $('#info .gagal').removeClass('hide');
                            }
                        }); 
                 }

             });
            });
        </script>