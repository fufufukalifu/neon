<!-- START Template Main -->
        <section id="main" role="main">
            <!-- START page header -->
            <section class="page-header page-header-block nm">
                <!-- pattern -->
                <div class="pattern pattern9"></div>
                <!--/ pattern -->
                <div class="container pt15 pb15">
                    <div class="page-header-section">
                        <h4 class="title font-alt">Konsultasi</h4>
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <ol class="breadcrumb breadcrumb-transparent nm">
                                <li class="active">Bertanya</li>
                                <li><a href="<?=base_url()?>index.php/konsultasi/daftarpertanyaan">Daftar Pertanyaan</a></li>
                            </ol>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
            </section>
            <!--/ END page header -->

            <!-- START Blog Content -->
            <section class="section bgcolor-white">
                <div class="row">

                    <div class="container">
                        <!-- Start Panel Form -->
                        <div class="col-md-7">
                             <form class="form-horizontal">

                                 <div class="form-group">
                                    <label>Judul :</label>
                                    <input type="text" class="form-control" id="title" placeholder="Apa pertanyaan mu?.....">
                                </div>

                                <div class="form-group">
                                    <label>Persoalan: </label>
                                    <textarea class="form-control" id="pertanyaan" rows="9" placeholder="Hal yang ingin ditanyakan....."></textarea>
                                </div>

                                <div class="form-group ">                                                
                                    <label>Pelajaran: </label>
                                         <select class="form-control">
                                            <option >---</option>
                                            <option value="mtk">Matematika</option>
                                            <option value="biologi">Two</option>
                                            <option value="fisika">Three</option>
                                            <option value="dll">....</option>
                                            </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Kirim <i class="ico-paper-plane"></i> </button>
                                 </div>
                                                    
                             </form>
                        </div>
                        <!-- End Panel Form -->

                        <!-- Start Panel Info -->
                        <div class="col-md-5">
                                <!-- START panel -->
                            <div class="panel panel-default">

                                <!-- panel body -->
                                <div class="panel-body">
                                    <h4>How to Ask</h4>
                                    Lorem ipsum dolor sit amet, mei essent everti theophrastus an, accusam lucilius vis eu. In mei accusamus efficiendi mediocritatem, eos ex paulo complectitur.
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                                <!--/ panel body -->
                            </div>
                            <!--/ END panel -->      
                        </div>
                        <!-- END Panel Info -->


                    </div>
                </div>
            </section>
            <!--/ END Blog Content -->


        </section>
        <!--/ END Template Main -->