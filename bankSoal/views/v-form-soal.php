 <!-- START Template Main -->

<section id="main" role="main">

    <!-- START Template Container -->

    <script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>

<!-- Strat Script Matjax -->
     <script type="text/x-mathjax-config">
       MathJax.Hub.Config({
         showProcessingMessages: false,
         tex2jax: { inlineMath: [['$','$'],['\\(','\\)']] }
       });
     </script>
<script type="text/javascript" src="<?= base_url('assets/plugins/MathJax-master/MathJax.js?config=TeX-MML-AM_HTMLorMML') ?>"></script>

<script>
var Preview = {
  delay: 150,        // delay after keystroke before updating

  preview: null,     // filled in by Init below
  buffer: null,      // filled in by Init below

  timeout: null,     // store setTimout id
  mjRunning: false,  // true when MathJax is processing
  mjPending: false,  // true when a typeset has been queued
  oldText: null,     // used to check if an update is needed

  //
  //  Get the preview and buffer DIV's
  //
  Init: function () {
    this.preview = document.getElementById("MathPreview");
    this.buffer = document.getElementById("MathBuffer");
  },

  //
  //  Switch the buffer and preview, and display the right one.
  //  (We use visibility:hidden rather than display:none since
  //  the results of running MathJax are more accurate that way.)
  //
  SwapBuffers: function () {
    var buffer = this.preview, preview = this.buffer;
    this.buffer = buffer; this.preview = preview;
    buffer.style.visibility = "hidden"; buffer.style.position = "absolute";
    preview.style.position = ""; preview.style.visibility = "";
  },

  //
  //  This gets called when a key is pressed in the textarea.
  //  We check if there is already a pending update and clear it if so.
  //  Then set up an update to occur after a small delay (so if more keys
  //    are pressed, the update won't occur until after there has been 
  //    a pause in the typing).
  //  The callback function is set up below, after the Preview object is set up.
  //
  Update: function () {
    if (this.timeout) {clearTimeout(this.timeout)}
    this.timeout = setTimeout(this.callback,this.delay);
  },

  //
  //  Creates the preview and runs MathJax on it.
  //  If MathJax is already trying to render the code, return
  //  If the text hasn't changed, return
  //  Otherwise, indicate that MathJax is running, and start the
  //    typesetting.  After it is done, call PreviewDone.
  //  
  CreatePreview: function () {
    Preview.timeout = null;
    if (this.mjPending) return;
    var text = document.getElementById("MathInput").value;
    if (text === this.oldtext) return;
    if (this.mjRunning) {
      this.mjPending = true;
      MathJax.Hub.Queue(["CreatePreview",this]);
    } else {
      this.buffer.innerHTML = this.oldtext = text;
      this.mjRunning = true;
      MathJax.Hub.Queue(
 ["Typeset",MathJax.Hub,this.buffer],
 ["PreviewDone",this]
      );
    }
  },

  //
  //  Indicate that MathJax is no longer running,
  //  and swap the buffers to show the results.
  //
  PreviewDone: function () {
    this.mjRunning = this.mjPending = false;
    this.SwapBuffers();
  }

};

//
//  Cache a callback to the CreatePreview action
//
Preview.callback = MathJax.Callback(["CreatePreview",Preview]);
Preview.callback.autoReset = true;  // make sure it can run more than once

</script>
     <!-- END Script Matjax -->

    <div class="container-fluid">
<!-- Start Modal salah upload video -->
<div class="modal fade" id="warningupload" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Peringatan!!</h4>
      </div>
      <div class="modal-body">
        <p>Silahkan cek type extension gambar! Type yang bisa di upload hanya ".jpg", ".jpeg", ".bmp", ".gif", ".png"</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <!-- START row -->

        <div class="row">

            <div class="col-md-12">

                <!-- Form horizontal layout bordered -->

                <form class="form-horizontal form-bordered panel panel-default" action="<?=base_url()?>index.php/banksoal/uploadsoal" method="post" accept-charset="utf-8" enctype="multipart/form-data" >

                    <div class="panel-heading">

                        <h3 class="panel-title">Form Soal</h3>

                        <!-- untuk menampung bab id -->

                        <input type="text" name="subBabID" value="<?=$subBab;?>"  hidden="true">

                    </div>               

                    <div class="panel-body">

                        <div class="form-group">

                            <label class="control-label col-sm-2">Judul Soal</label>

                            <div class="col-sm-8">

                                <input type="text" name="judul" class="form-control" value="<?php echo set_value('judul'); ?>" required="true">

                            </div>

                            

                        </div>

                        <div class="form-group">

                            <label class="control-label col-sm-2 ">Kesulitan</label>

                            <div class="col-sm-8">

                                <select name="kesulitan" class="form-control">

                                    <option value="">--Silahkan Pilih Tingkat Kesulitan--</option>

                                    <option value="0">Mudah</option>

                                    <option value="1">Sedang</option>

                                    <option value="2">Sulit</option>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="control-label col-sm-2">Sumber</label>

                            <div class="col-sm-8">

                                <input type="text" name="sumber" class="form-control">

                            </div>

                        </div>

                         <div class="form-group">

                            <label class="control-label col-sm-2">Gambar Soal</label>

                             <div class="col-sm-8 " >

                                <div class="col-sm-12">

                                     <img id="previewSoal" style="max-width: 497px; max-height: 381px;  " class="img" src="" alt="" />

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

                                    <input style="display:none;" type="file" id="fileSoal" name="gambarSoal" onchange="ValidateSingleInput(this);"/>

                                </div>

                            </div>

                        </div>

                       <div class="form-group">

                            <label class="control-label col-sm-2">Jensi Editor</label>

                            <div class="col-sm-8">

                                <div class="btn-group" data-toggle="buttons" >

                                      <label class="btn active " id="in-soal">

                                        <input type="radio" name="options"  autocomplete="off" checked="true"> Input Soal

                                      </label>

                                      <label class="btn" id="pr-rumus">

                                        <input type="radio" name="options"   autocomplete="off"> Rumus Matematika

                                      </label>

                                 </div>

                            </div>

                        </div>

                        <div class="form-group">
                           <!-- Start Editor Soal -->
                           <div id="editor-soal">
                            <label class="control-label col-sm-2">Soal</label>
                             <div class="col-sm-10">

                                 <textarea  name="editor1" class="form-control" id="">

                                     

                                 </textarea>

                             </div>
                            </div>
                            <!-- End Editor Soal -->
                            <!-- Start Math jax -->
                            <div id="editor-rumus" hidden="true">
                              <label class="control-label col-sm-2">Buat rumus</label>
                              <div class="col-sm-10">

                               <textarea class="form-control" id="MathInput" cols="60" rows="10" onkeyup="Preview.Update()" >
                               </textarea>

                              </div>
                              <label class="control-label col-sm-2"></label>
                               <div class="col-sm-10">
                               <p>
                               Configured delimiters:
                                <ul>
                               <li>TeX, inline mode: <code>\(...\)</code> or <code>$...$</code></li>
                               <li>TeX, display mode: <code>\[...\]</code> or <code> $$...$$</code></li>
                               <li>Asciimath: <code>`...`</code>.</li>
                               </ul>
                               </p>
                               </div>
                               
                              <label class="control-label col-sm-2"></label>
                              <div class="col-sm-10">
                              <label class="control-label" >Preview is shown here:</label>
                               <div class="form-control" id="MathPreview" ></div>
                               <div class="form-control" id="MathBuffer" style=" 
                               visibility:hidden; position:absolute; top:0; left: 0"></div>
                              </div>
                            </div>
                            <script>
                            Preview.Init();
                            </script>
                            <!-- End MathJax -->
                        </div>

                       

                        <div class="form-group">

                            <label class="control-label col-sm-2">Jumlah Pilihan</label>

                            <div class="col-sm-8">

                                <div class="btn-group" data-toggle="buttons" >

                                      <label class="btn " id="empatpil">

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

                                    <input style="display:none;" type="file" id="fileA" name="gambar1" onchange="ValidateSingleInput(this);"/>

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

                                    <input style="display:none;" type="file" id="fileB" name="gambar2" onchange="ValidateSingleInput(this);"/>

                                </div>

                            </div>

                        </div>

                        <!-- END input jawaban  -->



                        <!-- Start input jawaban C -->

                        <div class="form-group">

                            <label class="control-label col-sm-2">Pilihan C</label>

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

                                    <input style="display:none;" type="file" id="fileC" name="gambar3" onchange="ValidateSingleInput(this);"/>

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

                                    <input style="display:none;" type="file" id="fileD" name="gambar4" onchange="ValidateSingleInput(this);"/>

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

                                    <input style="display:none;" type="file" id="fileE" name="gambar5" onchange="ValidateSingleInput(this);"/>

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

                                    <label for="gift">&nbsp;&nbsp;Publish?</label>   

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

                        <div class="col-sm-7">

                            <button type="submit" class="btn btn-primary">Simpan</button>

                        </div>

                        

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
           // Start event untuk jenis editor
            $("#in-soal").click(function(){

                $("#editor-soal").show();

                 $("#editor-rumus").hide();

            });

            $("#pr-rumus").click(function(){

                $("#editor-rumus").show();

                 $("#editor-soal").hide();

            });
           // End event untuk jenis editor

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

            // End event priview gambar pilihan A





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
<!-- start script js validation extension -->
<script type="text/javascript">
 var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
             $('#warningupload').modal('show');
                // alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                // oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>
<!-- END -->
 

</section>


        <!--/ END Template Main -->