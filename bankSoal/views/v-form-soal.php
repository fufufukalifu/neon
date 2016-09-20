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
                <form class="form-horizontal form-bordered panel panel-default" action="<?=base_url()?>index.php/banksoal/uploadsoal" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
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
                                <div class="btn-group" data-toggle="buttons" >
                                      <label class="btn active " id="empatpil">
                                        <input type="radio" name="opjumlah" value="" autocomplete="off" > 4 Pilihan
                                      </label>
                                      <label class="btn" id="limapil">
                                        <input type="radio" name="opjumlah"  value="" autocomplete="off" checked="true"> 5 Pilihan
                                      </label>
                                 </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Jensi Pilihan</label>
                            <div class="col-sm-8">
                                <div class="btn-group" data-toggle="buttons" >
                                      <label class="btn active " id="text">
                                        <input type="radio" name="options" value="text" autocomplete="off" checked="true"> Text
                                      </label>
                                      <label class="btn" id="gambar">
                                        <input type="radio" name="options"  value="gambar" autocomplete="off"> Gambar
                                      </label>
                                 </div>
                            </div>
                        </div>
                        <!-- Start input jawaban A -->
                        <div class="form-group">
                            <label class="control-label col-sm-4">Pilihan A</label>
                            <!-- Start input text A -->
                            <div class="col-sm-8 piltext">
                               <textarea name="a"  class="form-control"> </textarea>
                            </div>
                            <!-- END input text A -->
                            <!-- Start input gambar A -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewA" style="max-width: 497px; max-height: 381px;  " class="img" src="" alt="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameA"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeA"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeA"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileA" class="btn btn-success">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileA" name="gambar1"/>
                                </div>
                            </div>
                            <!-- END input Gambar A -->
                        </div>
                        <!-- END input jawaban A -->

                        <!-- Start input jawaban B -->
                        <div class="form-group">
                            <label class="control-label col-sm-4">Pilihan B</label>
                            <!-- Start input text B -->
                            <div class="col-sm-8 piltext">
                               <textarea name="b" class="form-control"> </textarea>
                            </div>
                            <!-- END input text B -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewB" style="max-width: 497px; max-height: 381px;  " class="img" src="" alt="" width="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameB"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeB"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeB"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileB" class="btn btn-success">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileB" name="gambar2"/>
                                </div>
                            </div>
                        </div>
                        <!-- END input jawaban  -->

                        <!-- Start input jawaban C -->
                        <div class="form-group">
                            <label class="control-label col-sm-4">Pilihan C</label>
                            <!-- Start input text C -->
                            <div class="col-sm-8 piltext" >
                               <textarea name="c" class="form-control"> </textarea>
                            </div>
                            <!-- END input text C -->
                            <!-- Start input gambar C -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewC" style="max-width: 497px; max-height: 381px;  " class="img" src="" alt="" width="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameC"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeC"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeC"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileC" class="btn btn-success">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileC" name="gambar3"/>
                                </div>
                            </div>
                            <!-- END input Gambar C -->                       
                        </div>
                        <!-- END input Jawaban C -->

                        <!-- Start input jawaban D -->
                        <div class="form-group">
                            <label class="control-label col-sm-4">Pilihan D</label>
                            <!-- Start input text D -->
                            <div class="col-sm-8 piltext" >
                               <textarea name="d" class="form-control"> </textarea>
                            </div>
                            <!-- END input text D -->
                            <!-- Start input gambar D -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewD" style="max-width: 497px; max-height: 381px;  " class="img" src="" alt="" width="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameD"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeD"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeD"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileD" class="btn btn-success">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileD" name="gambar4"/>
                                </div>
                            </div>
                            <!-- END input Gambar D -->                       
                        </div>
                        <!-- END input Jawaban D -->
                        
                        <!-- Start input jawaban E -->
                        <div class="form-group" id="pilihan">
                            <label class="control-label col-sm-4">Pilihan E</label>
                            <!-- Start input text E -->
                            <div class="col-sm-8 piltext" >
                               <textarea name="e" class="form-control"> </textarea>
                            </div>
                            <!-- END input text E -->
                            <!-- Start input gambar E -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewE" style="max-width: 497px; max-height: 381px;  " class="img" src="" alt="" width="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameE"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeE"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeE"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileE" class="btn btn-success">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileE" name="gambar5"/>
                                </div>
                            </div>
                            <!-- END input Gambar C -->                       
                        </div>
                        <!-- END input Jawaban E -->


                  
                       

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

    <!-- script untuk option hide and show -->
    <script type="text/javascript">
        $(document).ready(function(){
            // Strat  event untuk pilihan jenis input  
            $("#text").click(function(){
                $(".piltext").show();
                 $(".pilgambar").hide();
            });
            $("#gambar").click(function(){
                $(".pilgambar").show();
                $(".piltext").hide();     
            });
            //END  event untuk pilihan jenis input  
            // Strat  event untuk jumlah pilihan  
            $("#empatpil").click(function(){   
                 $("#pilihan").hide();
            });
            $("#limapil").click(function(){
                $("#pilihan").show();
            });
            // END  event untuk jumlah pilihan

        });
    </script>

    <!-- Start script untuk priview gambar soal -->
    <script type="text/javascript">
        $(function () {

            // Start event priview gambar pilihan A
            $('#fileA').on('change',function () {
                console.log('test');
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = viewerA.load;
                reader.readAsDataURL(file);
                viewerA.setProperties(file);
            });
            var viewerA = {
                load : function(e){
                    $('#previewA').attr('src', e.target.result);
                },
                setProperties : function(file){
                    $('#filenameA').text(file.name);
                    $('#filetypeA').text(file.type);
                    $('#filesizeA').text(Math.round(file.size/1024));
                },
            }
            // End event priview gambar pilihan A

            // Start event priview gambar pilihan B
            $('#fileB').on('change',function () {
                console.log('test');
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = viewerB.load;
                reader.readAsDataURL(file);
                viewerB.setProperties(file);
            });
            var viewerB = {
                load : function(e){
                    $('#previewB').attr('src', e.target.result);
                },
                setProperties : function(file){
                    $('#filenameB').text(file.name);
                    $('#filetypeB').text(file.type);
                    $('#filesizeB').text(Math.round(file.size/1024));
                },
            }

            // End event priview gambar pilihan B

            // Start event priview gambar pilihan C
            $('#fileC').on('change',function () {
                console.log('test');
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = viewerC.load;
                reader.readAsDataURL(file);
                viewerC.setProperties(file);
            });
            var viewerC = {
                load : function(e){
                    $('#previewC').attr('src', e.target.result);
                },
                setProperties : function(file){
                    $('#filenameC').text(file.name);
                    $('#filetypeC').text(file.type);
                    $('#filesizeC').text(Math.round(file.size/1024));
                },
            }

            // End event priview gambar pilihan C

            // Start event priview gambar pilihan D
            $('#fileD').on('change',function () {
                console.log('test');
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = viewerD.load;
                reader.readAsDataURL(file);
                viewerD.setProperties(file);
            });
            var viewerD = {
                load : function(e){
                    $('#previewD').attr('src', e.target.result);
                },
                setProperties : function(file){
                    $('#filenameD').text(file.name);
                    $('#filetypeD').text(file.type);
                    $('#filesizeD').text(Math.round(file.size/1024));
                },
            }

            // End event priview gambar pilihan D

            // Start event priview gambar pilihan E
            $('#fileE').on('change',function () {
                console.log('test');
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = viewerE.load;
                reader.readAsDataURL(file);
                viewerE.setProperties(file);
            });
            var viewerE = {
                load : function(e){
                    $('#previewE').attr('src', e.target.result);
                },
                setProperties : function(file){
                    $('#filenameE').text(file.name);
                    $('#filetypeE').text(file.type);
                    $('#filesizeE').text(Math.round(file.size/1024));
                },
            }

            // End event priview gambar pilihan E

        });
    </script>
     <!-- End script untuk priview gambar soal -->

   
    


</section>
        <!--/ END Template Main -->