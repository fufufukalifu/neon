<section class="section bgcolor-white">
                <div class="container">
                    <div class="row">
                        <h1>Materi <?=$aliaspelajaran ?></h1>
                        <h4>Silahkan pilih materi yang akan kamu pelajar...</h4>
                    </div>
                    <div class="row" id="masonry">
                        <!-- post ke-1 -->
                        <!-- untuk menampung value sementara digunakan untuk pengecekan -->
                        <?php 
                        $cekjudulbab=null;
                        $i="0";
                        foreach($bab_video as $bab_video_items): ?>
                            <?php
                            $judulbab=$bab_video_items->judulBab;
                            $subbab=$bab_video_items->judulSubBab;
                        if ($cekjudulbab != $judulbab) {?>
                                <!--  start pengecekan unutk mmmm -->
                                <?php if ($i=="1") {?>
                                </section>
                                <!--/ Content -->
                            </article>
                        </div>
                        <?php } ?>
                        <!--  start pengecekan unutk mmmm -->
                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 post">
                            <article class="panel overflow-hidden">
                                <!-- Content -->
                                <section class="panel-body">
                                    <!-- heading -->
                                    <h4 class="font-alt mt0 ellipsis"><?=$bab_video_items->judulBab  ?></h4>
                                    <!--/ heading -->

                                    <!-- text -->
                                    <div class="text-default">
                                        <p>Beberapa video yang tersedia : </p>
                                        <ul>
                                            <a href="<?=base_url('index.php/video/videobelajarsingle/'.$bab_video_items->subid) ?>"><li><?=$bab_video_items->judulSubBab  ?></li></a>
                                        </ul>
                                    </div>
                                    <!--/ text -->
                            <?php
                                $cekjudulbab=$judulbab;
                                $i='1';
                            } else {?>
                                    <div class="text-default">
                                        <ul>
                                            <a href="<?=base_url('index.php/video/videobelajarsingle/'.$bab_video_items->subid) ?>"><li><?=$bab_video_items->judulSubBab  ?></li></a>
                                        </ul>
                                    </div>
                            <?php } ?>
                        <!-- post ke-1 -->
                        <?php endforeach ?>
                                </section>
                                <!--/ Content -->
                            </article>
                        </div>
                    </div>
                </div>
            </section>