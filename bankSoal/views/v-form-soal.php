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
            <div class="col-md-8">
                <!-- Form horizontal layout bordered -->
                <form class="form-horizontal form-bordered panel panel-default" action="<?=base_url()?>index.php/banksoal/uploadsoal/63" method="post">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Soal</h3>
                        <!-- untuk menampung bab id -->
                        <input type="text" name="babID" value="<?=$babID;?>"  hidden="true">
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
                            <label class="control-label col-sm-4">Soal2</label>
                            <div class="col-sm-8">
                                <textarea  name="editor1" class="form-control" id="">
                                    
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
                            <label class="control-label col-sm-4">Jensi Pilihan</label>
                            <div class="col-sm-8">
                                <div class="btn-group" data-toggle="buttons">
                                      <label class="btn ">
                                        <input type="radio" name="options" id="option2" autocomplete="off"> Text
                                      </label>
                                      <label class="btn">
                                        <input type="radio" name="options" id="option3" autocomplete="off"> Gambar
                                      </label>
                                 </div>
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
                                <select name="jawaban" class="form-control">
                                    <option value="A" >A</option>
                                    <option value="B" >B</option>
                                    <option value="C" >C</option>
                                    <option value="D" >D</option>
                                    <option value="E">E</option>
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
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>

</section>
        <!--/ END Template Main -->