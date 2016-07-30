<section class="section bgcolor-white">
                <div class="container">
                    <div class="row">
                        <h1>Materi Bahasa Inggris</h1>
                        <h4>Silahkan pilih materi yang akan kamu pelajar...</h4>
                    </div>
                    <div class="row" id="masonry">
                        <!-- post ke-1 -->
                        <?php for($i=0;$i<10;$i++): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 post">
                            <article class="panel overflow-hidden">
                                <!-- Content -->
                                <section class="panel-body">
                                    <!-- heading -->
                                    <h4 class="font-alt mt0 ellipsis">Judul Materi</h4>
                                    <!--/ heading -->

                                    <!-- text -->
                                    <div class="text-default">
                                        <p>Beberapa video yang tersedia : </p>
                                        <ol>
                                            <a href="<?=base_url('index.php/video/videobelajarsingle') ?>"><li>A</li></a>
                                            <a href="<?=base_url('index.php/video/videobelajarsingle') ?>"><li>B</li></a>
                                            <a href="<?=base_url('index.php/video/videobelajarsingle') ?>"><li>C</li></a>
                                            <a href="<?=base_url('index.php/video/videobelajarsingle') ?>"><li>D</li></a>
                                            <a href="<?=base_url('index.php/video/videobelajarsingle') ?>"><li>F</li></a>
                                        </ol>
                                    </div>
                                    <!--/ text -->

                                    <!-- Meta & button -->
                                    <a href="<?=base_url('index.php/video/videobelajar') ?>" class="btn btn-success">Lihat Semua Video <i class="ico-eye-open"></i></a>
                                    <!-- Meta & button -->
                                </section>
                                <!--/ Content -->
                            </article>
                        </div>
                        <!-- post ke-1 -->
                        <?php endfor ?>
                    </div>
                    
                </div>
            </section>