 <!-- START Template Main -->
 <section id="main" role="main">
    <!-- START Template Container -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Form Layout</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="javascript:void(0);">Form</a></li>
                        <li class="active">Layout</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->


        <!-- START row -->
        <div class="row">
            <div class="col-md-6">
                <!-- Form horizontal layout bordered -->
                <form class="form-horizontal form-bordered panel panel-default" action="">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Soal</h3>
                    </div>               
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Kesulitan</label>
                            <div class="col-sm-8">
                                <select name="kesulitan" class="form-control">
                                    <option value="">Mudah</option>
                                    <option value="1">Sedang</option>
                                    <option value="2">Sulit</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-4">Sumber</label>
                            <div class="col-sm-8">
                                <input type="text" name="sumber" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Soal</label>
                            <div class="col-sm-8">
                                <textarea name="soal" class="form-control">
                                    
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Jumlah Pilihan</label>
                            <div class="col-sm-8">
                                <select name="color" class="form-control">
                                    <option value="">Empat Pilihan</option>
                                    <option value="1">Lima Pilihan</option>
                                </select>
                                <span>*Pilihan a/b/c/d/..</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Pilihan A</label>
                            <div class="col-sm-5">
                               <textarea name="a" class="form-control"> </textarea>
                            </div>
                            <div class="col-sm-3">
                                <label for="file" class="btn btn-success">
                                Pilih Gambar
                                 </label>
                                 <input style="display:none;" type="file" id="file" name="gambar"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Pilihan B</label>
                            <div class="col-sm-5">
                               <textarea name="b" class="form-control"> </textarea>
                            </div>
                            <div class="col-sm-3">
                                <label for="file" class="btn btn-success">
                                Pilih Gambar
                                 </label>
                                 <input style="display:none;" type="file" id="file" name="gambar"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Pilihan C</label>
                            <div class="col-sm-5">
                               <textarea name="c" class="form-control"> </textarea>
                            </div>
                            <div class="col-sm-3">
                                <label for="file" class="btn btn-success">
                                Pilih Gambar
                                 </label>
                                 <input style="display:none;" type="file" id="file" name="gambar"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Pilihan D</label>
                            <div class="col-sm-5">
                               <textarea name="d" class="form-control"> </textarea>
                            </div>
                            <div class="col-sm-3">
                                <label for="file" class="btn btn-success">
                                Pilih Gambar
                                 </label>
                                 <input style="display:none;" type="file" id="file" name="gambar"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Pilihan E</label>
                            <div class="col-sm-5">
                               <textarea name="e" class="form-control"> </textarea>
                            </div>
                            <div class="col-sm-3">
                                <label for="file" class="btn btn-success">
                                Pilih Gambar
                                 </label>
                                 <input style="display:none;" type="file" id="file" name="gambar"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-4">Jawaban Benar</label>
                            <div class="col-sm-8">
                                <select class="form-control">
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <div class="checkbox custom-checkbox">  
                                    <input type="checkbox" name="gift" id="giftcheckbox" value="1">  
                                    <label for="giftcheckbox">&nbsp;&nbsp;Publish?</label>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                       
                    </div>
                </form>
                <!--/ Form horizontal layout bordered -->
            </div>

        </div>
        <!--/ END row -->
    </div>
</section>
        <!--/ END Template Main -->