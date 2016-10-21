<!-- Start pengecekan jika pilihan 5 atau 4 pilihan -->
<?php 

if (!isset($piljawaban['4']['id_pilihan'])) {
    $piljawaban['4']['id_pilihan']="";
    $piljawaban['4']['jawaban']="";
    $piljawaban['4']['gambar']="";
} 

?>
<!-- ENND pengecekan jika pilihan 5 atau 4 pilihan -->
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>

    <div class="container-fluid">
      
        <!-- START row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Form horizontal layout bordered -->
                <form class="form-horizontal form-bordered panel panel-default" action="<?=base_url()?>index.php/banksoal/updateBanksoal" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Update Soal</h3>
                        <!-- untuk menampung bab id -->
                        <input type="text" name="subBabID" value="<?=$subBabID;?>"  hidden="true">
                        <input type="text" name="soalID" value="<?=$bankSoal['id_soal'];?>" hidden="true">
                        <input type="text" name="UUID" value="<?=$bankSoal['UUID'];?>"  hidden="true">
                    </div>               
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2">Judul Soal</label>
                            <div class="col-sm-8">
                                <input type="text" name="judul" value="<?=$bankSoal['judul_soal'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Kesulitan</label>
                            <div class="col-sm-8">
                                <select name="kesulitan" class="form-control">
                                    <option value="">--Silahkan Pilih Tingkat Kesulitan--</option>
                                    <option value="1">Mudah</option>
                                    <option value="2">Sedang</option>
                                    <option value="3">Sulit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Sumber</label>
                            <div class="col-sm-8">
                                <input type="text" name="sumber" value="<?=$bankSoal['sumber'];?>" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2">Gambar Soal</label>
                             <div class="col-sm-8 " >
                                <div class="col-sm-12">
                                     <img id="previewSoal" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/image/soal/<?=$bankSoal['gambar_soal'];?>" alt="" />
                                 </div>
                                         
                                <div class="col-sm-12">
                                    <div class="col-md-5 left"> 
                                            <h6>Name: <span id="filenameSoal"></span></h6> 
                                    </div> 
                                    <div class="col-md-4 left"> 
                                            <h6>Size: <span id="filesizeSoal"></span>Kb</h6> 
                                    </div> 
                                    <div class="col-md-3 bottom"> 
                                            <h6>Type: <span id="filetypeSoal"></span></h6> 
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="fileSoal" class="btn btn-success">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileSoal" name="gambarSoal"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Soal</label>
                            <div class="col-sm-8">
                                <textarea  name="editor1" class="form-control" id="">
                                    <?=$bankSoal['soal'];?>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Jumlah Pilihan</label>
                            <div class="col-sm-8">
                                <div class="btn-group" data-toggle="buttons" >
                                      <label class="btn  " id="empatpil">
                                        <input type="radio" name="opjumlah" value="4" autocomplete="off" > 4 Pilihan
                                      </label>
                                      <label class="btn active" id="limapil">
                                        <input type="radio" name="opjumlah"  value="5" autocomplete="off" checked="true"> 5 Pilihan
                                      </label>
                                 </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Jensi Pilihan</label>
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
                            <label class="control-label col-sm-2">Pilihan A</label>
                            <!-- Start input text A -->
                            <div class="col-sm-8 piltext">
                                <input type="text" name="idpilA" value="<?=$piljawaban['0']['id_pilihan'];?>" hidden="true">
                               <textarea name="a"  class="form-control"> <?=$piljawaban['0']['jawaban'];?> </textarea>
                            </div>
                            <!-- END input text A -->
                            <!-- Start input gambar A -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewA" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/image/jawaban/<?=$piljawaban['0']['gambar'];?>" alt="" />
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
                                    <input style="display:none;" type="file" id="fileA" value="<?=$piljawaban['0']['gambar'];?>" name="gambar1"/>
                                </div>
                            </div>
                            <!-- END input Gambar A -->
                        </div>
                        <!-- END input jawaban A -->

                        <!-- Start input jawaban B -->
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan B</label>
                            <!-- Start input text B -->
                            <div class="col-sm-8 piltext">
                                <input type="text" name="idpilB" value="<?=$piljawaban['1']['id_pilihan'];?>" hidden="true">
                               <textarea name="b" class="form-control"> <?=$piljawaban['1']['jawaban'];?></textarea>
                            </div>
                            <!-- END input text B -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewB" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/image/jawaban/<?=$piljawaban['1']['gambar'];?>" alt="" width="" />
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
                                    <input style="display:none;" type="file" id="fileB" value="<?=$piljawaban['1']['gambar'];?>" name="gambar2"/>
                                </div>
                            </div>
                        </div>
                        <!-- END input jawaban  -->

                        <!-- Start input jawaban C -->
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan C</label>
                            <!-- Start input text C -->
                            <div class="col-sm-8 piltext" >
                                <input type="text" value="<?=$piljawaban['2']['id_pilihan'];?>" name="idpilC" hidden="true">
                               <textarea name="c" class="form-control"> <?=$piljawaban['2']['jawaban'];?> </textarea>
                            </div>
                            <!-- END input text C -->
                            <!-- Start input gambar C -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewC" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/image/jawaban/<?=$piljawaban['2']['gambar'];?>" alt="" width="" />
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
                                    <input style="display:none;" type="file" id="fileC" value="<?=$piljawaban['2']['gambar'];?>" name="gambar3"/>
                                </div>
                            </div>
                            <!-- END input Gambar C -->                       
                        </div>
                        <!-- END input Jawaban C -->

                        <!-- Start input jawaban D -->
                        <div class="form-group">
                            <label class="control-label col-sm-2">Pilihan D</label>
                            <!-- Start input text D -->
                            <div class="col-sm-8 piltext" >
                                <input type="text" name="idpilD" value="<?=$piljawaban['3']['id_pilihan'];?>" hidden="true">
                               <textarea name="d" class="form-control"> <?=$piljawaban['3']['jawaban'];?></textarea>
                            </div>
                            <!-- END input text D -->
                            <!-- Start input gambar D -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewD" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/image/jawaban/<?=$piljawaban['3']['gambar'];?>" alt="" width="" />
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
                                    <input style="display:none;" type="file" id="fileD" value="<?=$piljawaban['3']['gambar'];?>" name="gambar4"/>
                                </div>
                            </div>
                            <!-- END input Gambar D -->                       
                        </div>
                        <!-- END input Jawaban D -->
                        
                        <!-- Start input jawaban E -->
                        <div class="form-group" id="pilihan">
                            <label class="control-label col-sm-2">Pilihan E</label>
                            <!-- Start input text E -->
                            <div class="col-sm-8 piltext" >

                                <input type="text" name="idpilE" value="<?=$piljawaban['4']['id_pilihan'];?>" hidden="true">
                               <textarea name="e" class="form-control"> <?=$piljawaban['4']['jawaban'];?></textarea>
                            </div>
                            <!-- END input text E -->
                            <!-- Start input gambar E -->
                            <div class="col-sm-8 pilgambar" hidden="true">
                                <div class="col-sm-12">
                                     <img id="previewE" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/image/jawaban/<?=$piljawaban['4']['gambar'];?>" alt="" width="" />
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
                                    <input style="display:none;" type="file" id="fileE"  value="<?=$piljawaban['4']['gambar'];?>" name="gambar5"/>
                                </div>
                            </div>
                            <!-- END input Gambar C -->                       
                        </div>
                        <!-- END input Jawaban E -->


                  
                       

                        <div class="form-group">
                            <label class="control-label col-sm-2">Jawaban Benar</label>
                            <div class="col-sm-8">
                                <select name="jawaban" class="form-control">
                                     <option value="">--Silahkan Pilih Jawaban Benar--</option>
                                    <option value="A" >A</option>
                                    <option value="B" >B</option>
                                    <option value="C" >C</option>
                                    <option value="D" >D</option>
                                    <option value="E" id="pilihanop">E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1 col-sm-offset-4">
                                <div class="checkbox custom-checkbox">  
                                    <input type="checkbox" name="publish" id="gift" value="1">  
                                    <label for="gift"> Publish?</label>   
                                </div>
                            </div>
                            <div class="col-sm-4 col-sm-offset-1">
                                <div class="checkbox custom-checkbox">  
                                    <input type="checkbox" name="random" id="idrand" value="1">  
                                    <label for="idrand">Random?</label>   
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
                  $("#pilihanop").hide();
            });
            $("#limapil").click(function(){
                $("#pilihan").show();
                 $("#pilihanop").show();
            });
            // END  event untuk jumlah pilihan

        });
    </script>

    <!-- Start script untuk priview gambar soal -->
    <script type="text/javascript">
        $(function () {
            // Start event priview gambar Soal
            $('#fileSoal').on('change',function () {
                console.log('test');
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = viewerSoal.load;
                reader.readAsDataURL(file);
                viewerSoal.setProperties(file);
            });
            var viewerSoal = {
                load : function(e){
                    $('#previewSoal').attr('src', e.target.result);
                },
                setProperties : function(file){
                    $('#filenameSoal').text(file.name);
                    $('#filetypeSoal').text(file.type);
                    $('#filesizeSoal').text(Math.round(file.size/1024));
                },
            }
            // End event priview gambar soal
            // Start event priview gambar pilihan A
            $('#fileA').on('change',function () {
                // var filenameA = document.getElementByID('fileA').value;
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