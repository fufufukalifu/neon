<!-- konten  -->
<section id="main" role="main" class="mt10 ml10 mr10">
	<div class="row">
    <div class="control-group" id="fields">
        <div class="controls"> 
          <form class=" form-horizontal form-bordered upload-video" role="form" action="" autocomplete="off">
            <!-- entry-->
              <div class="entry input-group col-xs-3">
                <!-- Start panel  -->
                <div class="panel panel-teal">
                  <!-- Start heading panel -->
                  <div class="panel-heading headF">
                    <h5 class="panel-title">Form Upload Video</h5>
                  </div>
                  <!-- Start heading panel -->
                  <!-- Start panel-body  -->
                  <div class="panel-body">
                    <!-- pilih option tingkatan video -->
                      <div  class="form-group">
                        <label class="col-sm-1 control-label">Tingkat</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="tingkat" id="tingkat" onchange="ev_tingkat()">
                                <option>-Pilih Tingkat-</option>
                            </select>
                        </div>
                        <label class="col-sm-2 control-label">Mata Pelajaran</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="mataPelajaran" id="pelajaran" onchange="ev_pelajaran()">
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-1 control-label">Bab</label>
                        <div class="col-sm-4">
                          <select class="form-control" name="bab" id="bab" onchange="ev_bab()">

                          </select>
                        </div>
                        <label class="col-sm-2 control-label">Subab</label>
                        <div class="col-sm-4">
                          <select class="form-control" name="subBab" id="subbab">

                          </select>
                          <span class="text-danger"><?php echo form_error('subBab'); ?></span>
                        </div>
                      </div>
                    <!-- /pilih option tingkatan video  -->
                    <!-- pilih option upload video -->
                    <div class="form-group">
                        <label class="control-label col-sm-2">Pilihan Upload Video</label>
                        <div class="col-sm-8">
                            <div class="btn-group" data-toggle="buttons" >
                                <label class="btn btn-teal btn-outline active op_server" onclick="up_server()">
                                    <input type="radio" name="option_up" value="server" autocomplete="off" checked="true"> Upload Video Ke server
                                </label>
                                <label class="btn btn-teal btn-outline op_link" onclick="up_link()">
                                    <input type="radio" name="option_up"  value="link" autocomplete="off" > Link
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /pilih option upload video -->
                    <!-- untuk preview video -->
                    <div  class="form-group prv_video" hidden="true">
                        <div class="row" style="margin:1%;"> 
                            <div class="col-md-12">
                                <video id="preview" class="img-tumbnail image"  src="" width="100%" height="50%" controls >
                                </video>
                            </div>
                            <div class="col-md-5 left"> 
                                <h6>Name: <span id="filename"></span></h6> 
                            </div> 
                            <div class="col-md-4 left"> 
                                <h6>Size: <span id="filesize"></span>Kb</h6> 
                            </div> 
                            <div class="col-md-3 bottom"> 
                                <h6>Type: <span id="filetype"></span></h6> 
                            </div>
                        </div>
                    </div>
                    <!-- /untuk preview video -->
                    <!-- upload ke server -->
                    <div id="upload" class="form-group server">
                        <label class="col-sm-2 control-label">File Video</label>
                        <div class="col-sm-4">
                            <label for="file" class="btn btn-sm btn-default">
                                Pilih Video
                            </label>
                            <input style="display:none;" type="file" id="file" name="video" onchange="ValidateSingleInput(this);"/>
                        </div>
                    </div>
                    <!-- /upload ke server -->
                    <!-- prev thumbnail -->
                    <div  class="form-group prv_thumbnail" hidden="true">
                        <div class="row" style="margin:1%;"> 
                            <div class="col-md-12">
                                <img id="prevthumbnail" class="img-tumbnail image" src="" width="25%"  >
                            </div>
                            <div class="col-md-5 left"> 
                                <h6>Name: <span id="namethumbnail"></span></h6> 
                            </div> 
                            <div class="col-md-4 left"> 
                                <h6>Size: <span id="sizethumbnail"></span>Kb</h6> 
                            </div> 
                            <div class="col-md-3 bottom"> 
                                <h6>Type: <span id="typethumbnail"></span></h6> 
                            </div>
                        </div>
                    </div>
                    <!--/ prev thumbnail -->
                    <!-- Upload thumbnail -->
                    <div class="form-group server">
                       <label class="col-sm-2 control-label">Thumbnail</label>
                        <div class="col-sm-4">
                            <label for="thumbnail" class="btn btn-sm btn-default">
                                Pilih gambar
                            </label>
                            <input style="display:none;" type="file" id="thumbnail" name="thumbnail" onchange="Validatethumbnail(this);"/>
                        </div>
                    </div>
                    <!-- /Upload thumbnail -->
                    <!-- upload video by link -->
                    <div class="form-group link" hidden="true">
                        <label class="col-sm-2 control-label">Link Video</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="link_video">
                        </div>
                    </div>
                    <!-- /upload video by link -->
                    <!-- pilih Jenis Video -->
                    <div class="form-group">
                        <label class="control-label col-sm-2">Jenis Video</label>
                        <div class="col-sm-4">
                            <select name="jenis_video" class="form-control" required>
                                <option value="" selected>-Pilih Jenis Video-</option>
                                <option value="1">Room Recording</option>
                                <option value="2">Screen Recording</option>
                            </select>
                        </div>
                    </div>
                    <!-- / pilih Jenis Video -->
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Judul Video</label>
                      <div class="col-sm-9">
                          <input type="text" name="judulvideo" class="form-control">
                          <span class="text-danger"><?php echo form_error('judulvideo'); ?></span>
                      </div>
                    </div>
                    <!-- deskripsi video -->
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Deskripsi Video</label>
                      <div class="col-sm-9">
                            <textarea class="form-control" name="deskripsi"></textarea>
                      </div>
                    </div>
                    <!-- /deskripsi video -->
                    <!-- stat publish -->
                    <div class="form-group">
                      <label class="control-label col-sm-2">Publish</label>
                      <div class="col-sm-4">
                        <select name="publish" class="form-control">
                                <option value="0" selected>Select</option>
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                      </div>
                    </div>
                    <!-- /stat publish -->
                  </div>
                  <!-- END panel-body --> 
                  <!-- Start panel footer -->
                  <div class="panel-footer">
                    <div class="col-md-4 ">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a class="btn btn-primary ladda-button btnf" data-style="zoom-in" onclick="upvideo()">Submit</a>
                         <button class="btn btn-success btn-add" type="button" onclick="">
                                  <span class="glyphicon glyphicon-plus"></span>
                                  Add Form
                              </button>
                    </div>
                    <div class="col-md-4"><br><br>
                      <div class="indicator show">
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: 0%" id="ProgressBarDownload">
                                <span class="sr-only">100% Complete (success)</span>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /END Panel footer -->
                </div>
                <!-- END panel  -->
              </div>
            <!-- /entry-->
          </form>
          <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>
        </div>
    </div>
	</div>
</section>
<!-- /konten -->
<!-- script clone form -->
<script type="text/javascript">
  var x = 1;
      $(function()
  {
      $(document).on('click', '.btn-add', function(e)
      {
          e.preventDefault();
          
          var controlForm = $('.controls form:first'),
              currentEntry = $(this).parents('.entry:first'),
              newEntry = $(currentEntry.clone()).appendTo(controlForm);

          newEntry.find('input').val('');
          controlForm.find('.entry:not(:last) .btn-add')
              .removeClass('btn-add').addClass('btn-remove')
              .removeClass('btn-success').addClass('btn-danger ')
              .html('<span class="glyphicon glyphicon-minus"></span> Remove Form '+x);
          //ganti judul form clone ke n
          controlForm.find('.entry:not(:last) .headF')
          .removeClass('headF').addClass('headF'+x)
          .html('<h5>Form Upload Video '+x+'</h5>');
          // ganti name input tingkat => tingkat+x
          controlForm.find('.entry:not(:last) [name=tingkat]')
          .attr('name','tingkat'+x)
          .attr('id','tingkat'+x)
          .attr('onchange','ev_tingkat('+x+')');
          // ganti name input mapel => mapel+x
          controlForm.find('.entry:not(:last) [name=mataPelajaran]')
          .attr('name','mataPelajaran'+x)
          .attr('id','pelajaran'+x)
           .attr('onchange','ev_pelajaran('+x+')');
          // ganti name input bab => bab+x
          controlForm.find('.entry:not(:last) [name=bab]')
          .attr('name','bab'+x)
          .attr('id','bab'+x)
           .attr('onchange','ev_bab('+x+')');;
          // ganti name input subBab => subBab+x
          controlForm.find('.entry:not(:last) [name=subBab]')
          .attr('name','subBab'+x)
          .attr('id','subbab'+x);
          //server
          controlForm.find('.entry:not(:last) .server')
          .removeClass('server')
          .addClass('server'+x);
          //link
          controlForm.find('.entry:not(:last) .link')
          .removeClass('link')
          .addClass('link'+x);
          // prv_video
          controlForm.find('.entry:not(:last) .prv_video')
          .removeClass('prv_video')
          .addClass('prv_video'+x);
          // op_server
          controlForm.find('.entry:not(:last) .op_server')
          .removeClass('op_server')
          .attr('onclick','up_server('+x+')');
          // op_link
          controlForm.find('.entry:not(:last) .op_link')
          .removeClass('op_link')
          .attr('onclick','up_link('+x+')');
          // ganti name input jenis_video => jenis_video+x
          controlForm.find('.entry:not(:last) [name=jenis_video]')
          .attr('name','jenis_video'+x);
          // ganti name input judulvideo => judulvideo+x
          controlForm.find('.entry:not(:last) [name=judulvideo]')
          .attr('name','judulvideo'+x);
          // ganti name input deskripsi => deskripsi+x
          controlForm.find('.entry:not(:last) [name=deskripsi]')
          .attr('name','deskripsi'+x);
          // ganti name input publish => publish+x
          controlForm.find('.entry:not(:last) [name=publish]')
          .attr('name','publish'+x);
          // btnf
           controlForm.find('.entry:not(:last) .btnf')
           .removeClass('btnf')
          .attr('onclick','upvideo('+x+')');


              x++;
      }).on('click', '.btn-remove', function(e)
      {
          $(this).parents('.entry:first').remove();

          e.preventDefault();
          return false;
      });
  });

</script>
<!-- /script clone form -->

<!-- script event dropdown dp -->
<script type="text/javascript">
   $(document).ready(function () {
    function loadTingkat(z='') {
      var tingkat_id = {"tingkat_id": $('#tingkat').val()};
      var idTingkat;
      $.ajax({
          type: "POST",
          dataType: "json",
          data: tingkat_id,
          url: "<?= base_url() ?>index.php/videoback/getTingkat",
          success: function (data) {
              $('#tingkat'+z).html('<option value="">-- Pilih Tingkat  --</option>');
              $.each(data, function (i, data) {
                  $('#tingkat'+z).append("<option value='" + data.id + "'>" + data.aliasTingkat + "</option>");
                  return idTingkat = data.id;
              });
          }
      });
    }
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

         loadTingkat();
    });

    // event op tingkat
    function ev_tingkat(y='') {
      var datTingkat = [];
      datTingkat['tingkatID'] = $('#tingkat'+y).val();
      datTingkat['formke'] =y;
      loadPelajaran(datTingkat);
    }
    // event op pelajaran
    function ev_pelajaran(y='') {
      var datpelajaran = [];
      datpelajaran['mapelID'] = $('#pelajaran'+y).val();
      datpelajaran['formke'] =y;
      load_bab(datpelajaran);
    }
    // event op bab
    function ev_bab(y='') {
      var datbab = [];
      datbab['babID'] = $('#bab'+y).val();
      datbab['formke'] =y;
      load_sub_bab(datbab);
    }
    // set value dropdown pelajaran
    function loadPelajaran(datTingkat) {
      var formke = datTingkat.formke;
      $.ajax({
          type: "POST",
          dataType: "json",
          data: datTingkat.tingkatID,
          url: "<?php echo base_url() ?>index.php/videoback/getPelajaran/" + datTingkat.tingkatID,
          success: function (data) {
              $('#pelajaran'+formke).html('<option value="">-- Pilih Mata Pelajaran  --</option>');
              $.each(data, function (i, data) {
                  $('#pelajaran'+formke).append("<option value='" + data.id + "'>" + data.keterangan + "</option>");
              });
          }
      });
    }
    // set value dropdown bab
    function load_bab(datpelajaran) {
        var mapelID = datpelajaran.mapelID;
        var formke = datpelajaran.formke;
        $.ajax({
            type: "POST",
            dataType: "json",
            data: mapelID,
            url: "<?php echo base_url() ?>index.php/videoback/getBab/" + mapelID,
            success: function (data) {
                $('#bab'+formke).html('<option value="">-- Pilih Bab Pelajaran  --</option>');
                $.each(data, function (i, data) {
                    $('#bab'+formke).append("<option value='" + data.id + "'>" + data.judulBab + "</option>");
                });
            }
        });
    }

    function load_sub_bab(datbab) {
           var babID = datbab.babID;
        var formke = datbab.formke;
        $.ajax({
            type: "POST",
            dataType: "json",
            data: babID,
            url: "<?php echo base_url() ?>index.php/videoback/getSubbab/" + babID,
            success: function (data) {
                $('#subbab'+formke).html('<option value="">-- Pilih Sub Bab Pelajaran  --</option>');
                console.log(data);
                $.each(data, function (i, data) {
                    $('#subbab'+formke).append("<option value='" + data.id + "'>" + data.judulSubBab + "</option>");
                });
            }
        });
    }
</script>
<!-- script event dropdown dp -->

<!-- script event -->
<script type="text/javascript">
  // Strat  event untuk pilihan jenis input  
  function up_server (z='') {
      $(".server"+z).show();
      $(".link"+z).hide();
  }
  function up_link (z='') {
    $(".link"+z).show();
    $(".server"+z).hide();
    $(".prv_video"+z).hide();
  }
       $(document).ready(function () {

      $("#file").click(function () {
          $(".prv_video").show();
      });
      $("#thumbnail").click(function () {
          $(".prv_thumbnail").show();
      });
    });
</script>

<script type="text/javascript">
    function upvideo(y='') {
     var jenis_video =$('[name=jenis_video'+y+']').val();
     var judulvideo =$('[name=judulvideo'+y+']').val();
     var deskripsi =$('[name=deskripsi'+y+']').val();
     var publish =$('[name=publish'+y+']').val();
     console.log(jenis_video);
     console.log(judulvideo);
     console.log(deskripsi);
     console.log(publish);

    }


</script>


