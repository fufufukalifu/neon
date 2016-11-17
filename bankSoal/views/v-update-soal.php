<!-- Start pengecekan jika pilihan 5 atau 4 pilihan -->
<?php 

if (!isset($piljawaban['4']['id_pilihan'])) {
    $piljawaban['4']['id_pilihan']="";
    $piljawaban['4']['jawaban']="";
    $piljawaban['4']['gambar']="";
} 

?>
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
<!-- ENND pengecekan jika pilihan 5 atau 4 pilihan -->
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <script type="text/javascript" src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>

    <div class="container-fluid">
<!-- Start Modal salah upload gambar -->
<div class="modal fade" id="warningupload" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title text-center text-danger">Peringatan</h2>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Silahkan cek type extension gambar! </h3>
        <h5 class="text-center">Type yang bisa di upload hanya ".jpg", ".jpeg", ".bmp", ".gif", ".png"</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <!-- START row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Form horizontal layout bordered -->
                <form class="form-horizontal form-bordered panel panel-teal" action="<?=base_url()?>index.php/banksoal/updatebanksoal" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Update Soal</h3>
                        <!-- untuk menampung bab id -->
                        <input type="text" name="subBabID" value="<?=$subBabID;?>"  hidden="true">
                        <input type="text" name="soalID" value="<?=$banksoal['id_soal'];?>" hidden="true">
                        <input type="text" name="UUID" value="<?=$banksoal['UUID'];?>"  hidden="true">
                    </div>               
                    <div class="panel-body">
                     <!-- Start Dropd Down depeden -->
                      <div  class="form-group">

                        <label class="col-sm-1 control-label">Tingkat</label>

                        <div class="col-sm-4">

                          <select class="form-control" name="tingkat" id="tingkat">

                            <option>-Pilih Tingkat-</option>



                          </select>

                        </div>



                        <label class="col-sm-2 control-label">Mata Pelajaran</label>

                        <div class="col-sm-4">

                          <select class="form-control" name="mataPelajaran" id="pelajaran">



                          </select>

                        </div>

                      </div>



                      <div class="form-group">

                        <label class="col-sm-1 control-label">Bab</label>

                        <div class="col-sm-4">

                          <select class="form-control" name="bab" id="bab">



                          </select>

                        </div>



                        <label class="col-sm-2 control-label">Subab</label>

                        <div class="col-sm-4">

                          <select class="form-control" name="subBabID" id="subbab">



                          </select>

                          <span class="text-danger"><?php echo form_error('subBab'); ?></span>

                        </div>

                      </div>

                      <!-- END Drop Down depeden -->
                        <div class="form-group">
                            <label class="control-label col-sm-2">Judul Soal</label>
                            <div class="col-sm-8">
                                <input type="text" name="judul" value="<?=$banksoal['judul_soal'];?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Kesulitan</label>
                            <div class="col-sm-8">
                                    <input type="text" name="tampkesulitan" value="<?=$banksoal['kesulitan'];?>" id='tampkesulitan' hidden="true">
                                <select name="kesulitan" class="form-control">
                                    <option value="">--Silahkan Pilih Tingkat Kesulitan--</option>
                                    <option value="1" id="lvl1">Mudah</option>
                                    <option value="2" id="lvl2">Sedang</option>
                                    <option value="3" id="lvl3">Sulit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Sumber</label>
                            <div class="col-sm-8">
                                <input type="text" name="sumber" value="<?=$banksoal['sumber'];?>" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2">Gambar Soal</label>
                             <div class="col-sm-8 " >
                                <div class="col-sm-12">
                                     <img id="previewSoal" style="max-width: 497px; max-height: 381px;  " class="img" src="<?=base_url();?>assets/image/soal/<?=$banksoal['gambar_soal'];?>" alt="" />
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
                                    <label for="fileSoal" class="btn btn-sm btn-default">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileSoal" name="gambarSoal" onchange="ValidateSingleInput(this);"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                            <label class="control-label col-sm-2">Jenis Editor</label>

                            <div class="col-sm-8">

                                <div class="btn-group" data-toggle="buttons" >

                                      <label class="btn btn-teal btn-outline active " id="in-soal">

                                        <input type="radio" name="options"  autocomplete="off" checked="true"> Input Soal

                                      </label>

                                      <label class="btn btn-teal btn-outline" id="pr-rumus">

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

                                     <?=$banksoal['soal'];?>

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
                                      <label class="btn btn-teal btn-outline " id="empatpil">
                                        <input type="radio" name="opjumlah" value="4" autocomplete="off" > 4 Pilihan
                                      </label>
                                      <label class="btn btn-teal btn-outline" id="limapil">
                                        <input type="radio" name="opjumlah"  value="5" autocomplete="off" checked="true"> 5 Pilihan
                                      </label>
                                 </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Jenis Pilihan</label>
                            <div class="col-sm-8">
                                <div class="btn-group" data-toggle="buttons" >
                                      <label class="btn btn-teal btn-outline active " id="text">
                                        <input type="radio" name="options" value="text" autocomplete="off" checked="true"> Text
                                      </label>
                                      <label class="btn btn-teal btn-outline" id="gambar">
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
                                    <label for="fileA" class="btn btn-sm btn-default ">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileA" value="<?=$piljawaban['0']['gambar'];?>" name="gambar1" onchange="ValidateSingleInput(this);"/>
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
                                    <label for="fileB" class="btn btn-sm btn-default ">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileB" value="<?=$piljawaban['1']['gambar'];?>" name="gambar2" onchange="ValidateSingleInput(this);"/>
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
                                    <label for="fileC" class="btn btn-sm btn-default">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileC" value="<?=$piljawaban['2']['gambar'];?>" name="gambar3" onchange="ValidateSingleInput(this);"/>
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
                                    <label for="fileD" class="btn btn-sm btn-default ">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileD" value="<?=$piljawaban['3']['gambar'];?>" name="gambar4" onchange="ValidateSingleInput(this);"/>
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

                                <input type="text" name="idpilE" value="<?=$piljawaban['4']['id_pilihan'];?>" hidden="true" id="pilE">
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
                                    <label for="fileE" class="btn btn-sm btn-default">
                                        Pilih Gambar
                                    </label>
                                    <input style="display:none;" type="file" id="fileE"  value="<?=$piljawaban['4']['gambar'];?>" name="gambar5" onchange="ValidateSingleInput(this);"/>
                                </div>
                            </div>
                            <!-- END input Gambar C -->                       
                        </div>
                        <!-- END input Jawaban E -->


                  
                       

                        <div class="form-group">
                            <label class="control-label col-sm-2">Jawaban Benar</label>
                            <div class="col-sm-8">
                                <input type="text" id="tampjawaban" value="<?=$banksoal['jawaban'];?>" hidden="true"> 
                                <select name="jawaban" class="form-control" id="opjawaban">
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
                                    <input type="text" id="tamppublish" value="<?=$banksoal['publish'];?>" hidden="true">
                                    <input type="checkbox" name="publish" id="gift" value="1">  
                                    <label for="gift"> Publish?</label>   
                                </div>
                            </div>
                            <div class="col-sm-4 col-sm-offset-1">
                                <div class="checkbox custom-checkbox">
                                    <input type="text" id="tamprandom" value="<?=$banksoal['random'];?>" hidden="true">  
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


          // set option kesulitan ################
           var tampkesulitan=$('#tampkesulitan').val();
          if (tampkesulitan ==3) {
            $('#lvl3').attr('selected','selected');
          }else if (tampkesulitan==2) {
            $('#lvl2').attr('selected','selected');
          }else if (tampkesulitan==1) {
            $('#lvl1').attr('selected','selected');
          }else{

          }
          // ########################

          // Set option Jawaban ###########
          var tampjawaban =  $('#tampjawaban').val();
          if (tampjawaban != '') {
              var tamid ='#opjawaban option[value='+tampjawaban+']';
             $(tamid).attr('selected','selected');
          }else{
          }
          // set option publish################
           var tamppublish=$('#tamppublish').val();
          if (tamppublish ==1) {
             $('#gift').attr('checked','checked');
          }else{
          }
          // ########################

          // set option random################
           var tamprandom=$('#tamprandom').val();
          if (tamprandom ==1) {
             $('#idrand').attr('checked','checked');
          }else{
          }
          // ########################

          // set option jum piljawab################
           var pilE=$('#pilE').val();
          if (pilE=='') {
            // hide input pilihan E
            $("#pilihan").hide();
            $("#pilihanop").hide();
            $("#empatpil").addClass('active');
            
          }else{
            $("#limapil").addClass('active');
          }
          // ########################

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
   <!--Start  Script drop down depeden -->

<script>

    // Script for getting the dynamic values from database using jQuery and AJAX

    $(document).ready(function () {

        $('#eTingkat').change(function () {



            var form_data = {

                name: $('#eTingkat').val()

            };



            $.ajax({

                url: "<?php echo site_url('videoback/getPelajaran'); ?>",

                type: 'POST',
 dataType: "json",
                data: form_data,

                success: function (msg) {

                    var sc = '';

                    $.each(msg, function (key, val) {

                        sc += '<option value="' + val.id + '">' + val.keterangan + '</option>';

                    });

                    $("#ePelajaran option").remove();

                    $("#ePelajaran").append(sc);

                }

            });

        });

        // Strat  event untuk pilihan jenis input  

        $("#up_server").click(function () {

            $(".server").show();

            $(".link").hide();

        });

        $("#up_link").click(function () {

            $(".link").show();

            $(".server").hide();

            $(".prv_video").hide();

        });

        $("#file").click(function () {

            $(".prv_video").show();

        });



    });





    //buat load tingkat

    function loadTingkat() {

        jQuery(document).ready(function () {

            var tingkat_id = {"tingkat_id": $('#tingkat').val()};

            var idTingkat;



            $.ajax({

                type: "POST",
 dataType: "json",
                data: tingkat_id,

                url: "<?= base_url() ?>index.php/videoback/getTingkat",

                success: function (data) {

                    console.log("Data" + data);

                    $('#tingkat').html('<option value="">-- Pilih Tingkat  --</option>');

                    $.each(data, function (i, data) {

                        $('#tingkat').append("<option value='" + data.id + "'>" + data.aliasTingkat + "</option>");

                        return idTingkat = data.id;

                    });

                }

            });



            $('#tingkat').change(function () {

                tingkat_id = {"tingkat_id": $('#tingkat').val()};

                loadPelajaran($('#tingkat').val());

            })



            $('#pelajaran').change(function () {

                pelajaran_id = {"pelajaran_id": $('#pelajaran').val()};

                load_bab($('#pelajaran').val());

            })



            $('#bab').change(function () {

                load_sub_bab($('#bab').val());

            })

        })

    }

    ;



    //buat load pelajaran

    function loadPelajaran(tingkatID) {

        $.ajax({

            type: "POST",
 dataType: "json",
            data: tingkatID.tingkat_id,

            url: "<?php echo base_url() ?>index.php/videoback/getPelajaran/" + tingkatID,

            success: function (data) {

                $('#pelajaran').html('<option value="">-- Pilih Mata Pelajaran  --</option>');

                $.each(data, function (i, data) {

                    $('#pelajaran').append("<option value='" + data.id + "'>" + data.keterangan + "</option>");

                });

            }

        });

    }

    //buat load bab

    function load_bab(mapelID) {

        $.ajax({

            type: "POST",
 dataType: "json",
            data: mapelID.mapel_id,

            url: "<?php echo base_url() ?>index.php/videoback/getBab/" + mapelID,

            success: function (data) {



                $('#bab').html('<option value="">-- Pilih Bab Pelajaran  --</option>');

                //console.log(data);

                $.each(data, function (i, data) {

                    $('#bab').append("<option value='" + data.id + "'>" + data.judulBab + "</option>");

                });

            }



        });

    }

    //load sub bab

    function load_sub_bab(babID) {

        $.ajax({

            type: "POST",
 dataType: "json",
            data: babID.bab_id,

            url: "<?php echo base_url() ?>index.php/videoback/getSubbab/" + babID,

            success: function (data) {

                $('#subbab').html('<option value="">-- Pilih Sub Bab Pelajaran  --</option>');

                console.log(data);

                $.each(data, function (i, data) {

                    $('#subbab').append("<option value='" + data.id + "'>" + data.judulSubBab + "</option>");

                });

            }



        });

    }





    loadTingkat();

</script>
<!--END Script drop down depeden  -->
    


</section>
        <!--/ END Template Main -->