<?php

//============================================================+
// File name   : v-tamp-video.php
// Begin       : 2017-03-15
// Last Update : 2017-03-15
//
// Description : template untuk tampilan list video pagination
//               
//
// Author: MrBebek
//
// (c) Copyright:
//               MrBebek
//               neonjogja.com

//============================================================+

/**
 * @author MrBebek
 * @since  2017-03-15
 */
// var_dump($list);
?>
<!-- Start Modal Detail Video dari server -->
    <div class="modal fade" id="mdetailvideo">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <h3 class="modal-title text-center"></h3>

                </div>

                <video class=" modal-body img-tumbnail image" src="" width="100%" height="50%" controls id="video-ply" style="background:grey;">
                </video>

                <div class="modal-body ">
                    <p class="semibold text-justify mt0 mb5 mr10 ml10">Deskripsi</p>
                    <p class="text-justify deskripsi mt0 mb5 mr10 ml10 "></p>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="closePlayer" >Close</button>

                </div>

            </div>

        </div>

    </div>
    <!-- End Modal Detail Video -->
    <!-- Start Modal Detail Video dari link -->
    <div class="modal fade" id="mvideolink">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                    <h3 class="modal-title text-center"></h3>

                </div>

                <iframe class=" modal-body img-tumbnail image" src=""  controls id="video-ply-link" width="100%" height="315" style="background:grey;" >
                </iframe>

                <div class="modal-body ">
                    <p class="semibold text-justify mt0 mb5 mr10 ml10">Deskripsi</p>
                    <p class="text-justify deskripsi mt0 mb5 mr10 ml10 "></p>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeYoutube">Close</button>

                </div>

            </div>

        </div>

    </div>
    <!-- End Modal Detail Video -->
        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="page-header page-header-block" style="background:#f27c66;">
                    <div class="page-header-section">
                        <!-- <h4 class="title semibold">Media album</h4> -->
                        <input class="form-group" type="text" name="keyword" placeholder="Cari video">
                    </div>
                    <div class="page-header-section">
                        <!-- Toolbar -->
                        <div class="toolbar">
                            <a href="<?=base_url()?>/videoback/formupvideo" type="button" class="btn btn-primary"><i class="ico-upload22"></i> Upload Video</a>
                           
                            </div>
                        </div>
                        <!--/ Toolbar -->
                    </div>
                </div>
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                <!-- STRAT PENGULANGAN LIST VIDEO -->
                <?php foreach ($list as $key): ?>
                    <div class="col-md-3">
                        <!-- thumbnail -->
                        <div class="thumbnail thumbnail-album animation animating delay fadeInLeft">
                            <!-- media -->
                            <div class="media">
                                <!-- indicator -->
                                <!-- <div class="indicator"><span class="spinner"></span></div> -->
                                <!--/ indicator -->
                                <!-- toolbar overlay -->
                                <div class="overlay">
                                    <div class="toolbar">
                                        <?=$key['lihat']; ?>
                                        <?=$key['ubah']; ?>
                                        <?=$key['hapus']; ?>
                                    </div>
                                </div>
                                <!--/ toolbar overlay -->
                               
                                <?=$key['video'];?>
                            </div>
                            <!--/ media -->
                            <!-- caption -->
                            <div class="caption">
                                <h5 class="semibold mt0 mb5"><?=$key['judulVideo']?></h5>
                                <p class="text-muted mb5 ellipsis"><?=$key['deskripsi']?></p>
                                <p class="tag ellipsis">
                                    <a href="javascript:void(0);">#<?=$key['mapel']?></a>&nbsp;
                                    <a href="javascript:void(0);">#<?=$key['bab']?></a>
                                </p>
                            </div>
                            <!--/ caption -->
                            <hr class="mt5 mb5">
                            <ul class="meta">
                                <li>
                                    <div class="img-group img-group-stack">
                                    <p class="nm">sub:<?=$key['subbab']?></p>
                                        <!-- <img src="../image/avatar/avatar1.jpg" class="img-circle" alt="" /> -->
                                      <!--   <img src="../image/avatar/avatar2.jpg" class="img-circle" alt="" />
                                        <img src="../image/avatar/avatar3.jpg" class="img-circle" alt="" /> -->
                                    </div>
                                </li>
                                <li>
                                    <p class="nm"><a href="javascript:void(0);" class="semibold">,</a><?=$key['date_created']?></p>
                                </li>
                            </ul>
                        </div>
                        <!--/ thumbnail -->
                    </div>

                <?php endforeach ?>
                <!--/ END Pengulangan List Video  -->
                </div>
                <!--/ END row -->
            </div>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->

        </section>
        <!--/ END Template Main -->


    <nav aria-label="Page navigation mt10 pt10"><center>
        <ul class="pagination ">
        <?php 
        echo $this->pagination->create_links();
        ?>
        </ul>
        </center>
    </nav>
<script type="text/javascript" src="http://www.youtube.com/player_api">
</script>
<script type="text/javascript">
	//# fungsi menghapus video
function drop_video(videoID){
  url = base_url+"index.php/videoback/del_file_video/";
  swal({
    title: "Yakin akan menghapus video ini?",
    text: "Anda tidak dapat membatalkan ini.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya,Tetap hapus!",
    closeOnConfirm: false
  },
  function(){
    var datas = {videoID:videoID};
    $.ajax({
      dataType:"text",
      data:datas,
      type:"POST",
      url:url,
      success:function(){
        swal("Terhapus!", "Soal berhasil dihapus.", "success");
       window.location.href =base_url+"videoback/daftarvideo";
      },
      error:function(){
        sweetAlert("Oops...", "Data gagal terhapus!", "error");
      }

    });
  });
}

function detail(id){
    var kelas ='.detail-'+id;
    var data = $(kelas).data('id');
    var links;

    $('h3.modal-title').html(data.judulVideo);
    $('.deskripsi').html(data.deskripsi);
    if (data.namaFile != null) {
        links = '<?=base_url();?>assets/video/' + data.namaFile;
        $('#video-ply').attr('src',links); 
        $('#mdetailvideo').modal('show');
    }else if(data.link != null){
        links = data.link;
        $('#video-ply-link').attr('src',links); 
        $('#mvideolink').modal('show');
    }else{

    }
    
}
   $(document).ready(function() {
$('#closeYoutube').on('click', function() {
      var vidf = document.getElementById("video-ply-link"); 
    vidf.stopVideo();
    // // closeYoutube video-ply-link
    // $('iframe').get(0).stopVideo();
 });
$('#closePlayer').on('click', function() {
    var vid = document.getElementById("video-ply"); 
    vid.pause();
 });
 });
</script>
