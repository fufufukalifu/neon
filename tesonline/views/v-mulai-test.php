    <div class="modal fade " tabindex="-1" role="dialog" id="myModal">
     <div class="modal-dialog" role="document">
      <div class="modal-content">
       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br>
       </div>
       <div class="modal-body">
        <div id="chartContainer" style="height: 400px; width: 100%;">
        </div>
        <div class="modal-footer bg-color-3">

        </div>
       </form>

      </div>
     </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </div>    		
   <!-- START Blog Content -->
   <section class="section bgcolor-white">
    <div class="container">
     <!-- START Row -->
     <div class="row">
      <!-- START Left Section -->
      <div class="col-md-3 mb15">
       <!-- Category -->
       <div class="mb15">
        <!-- Header -->
        <div class="section-header section-header-bordered mb10">
         <h4 class="section-title">
          <p class="font-alt nm">Filter By</p>
         </h4>
        </div>
        <!--/ Header -->
        <ul class="list-unstyled">
         <li class="mb5"><i class="ico-angle-right text-muted mr5"></i> 
          <form>
           <p class="has-succes">
            <select>
             <option>- Pilih Filter-</option>
             <option>Pelajaran</option>
             <option>Status</option>
            </select>
           </p>

          </form>
         </li>
        </ul>
       </div>
       <!--/ Category -->
       <!-- Text Widget -->
       <div class="mb15">
        <!-- Header -->
        <div class="section-header section-header-bordered mb10">
         <h4 class="section-title">
          <p class="font-alt nm">Deskripsi</p>
         </h4>
        </div>
        <!--/ Header -->
        <p class="nm text-default">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
         consequat.</p>
        </div>
        <!--/ Text Widget -->
       </div>
       <!--/ END Left Section -->


       <!-- START Right Section -->
       <div class="col-md-9">
        <?php foreach ($latihan as $latihanitem): ?>
         <?php// print_r($latihanitem) ?>
         <div class="col-md-3">
          <!-- START Panel pricing -->
          <div class="panel bg-color-1">
           <!-- panel heading -->
           <div class="panel-heading text-center" style="min-height:50px;background-color:white">
            <span>
             <?=$latihanitem['nm_latihan'] ?>
            </span>
           </strong>
          </div>
          <!-- panel heading -->
          <!-- panel body -->
          <div class="panel-body text-center">
           <img class="img-circle img-bordered" src="<?=base_url('assets/image/portfolio/portfolio1.jpg');?>" alt="" width="100%">
          </div>
          <!--/ panel body -->
          <!-- table -->
          <table class="table">
           <tbody>
            <tr>
             <?php if ($latihanitem['status_pengerjaan']=='1'): ?>
              <td colspan="2" align="center">
               <a href="#" class="cws-button border-radius bt-color-<?=$latihanitem['status_pengerjaan']?>">Coba Latihan</a>
              </td>
             <?php else: ?>
              <td colspan="2" align="center">
               <a onclick="lihat_grafik()" 
               class="cws-button border-radius bt-color-<?=$latihanitem['status_pengerjaan']?> modal-on"
               data-todo='{"id":"<?=$latihanitem['id_latihan'] ?>","nama_latihan":"<?=$latihanitem['nm_latihan'] ?>"}'>Lihat Score</a>
              </td>
             <?php endif ?>
            </tr>
           </tbody>
          </table>
          <!--/ table -->
         </div>
         <!--/ END Panel pricing -->
        </div>
       <?php endforeach ?>



      </div>
     </section>
     <!--/ END Blog Content -->

     <!-- START To Top Scroller -->
     <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
     <!--/ END To Top Scroller -->

    </section>
    <!--/ END Template Main -->
    <script type="text/javascript">
     load_repot(1);
     function load_repot(idlatihan){
      var report;

      $.ajax({
       type: "POST",
       dataType: JSON,
       url: "<?php echo base_url() ?>index.php/tesonline/ajax_get_list_report_latihan/"+idlatihan,

       success: function(data){
        $.each(data, function(i, data){
         report = [{"id_report-latihan":data.idreport_latihan,
         "id_pengguna":data.id_pengguna,
         "id_latihan":data.id_latihan,
         "jmlh_kosong":data.jmlh_kosong,
         "jmlh_benar":data.jmlh_benar,
         "jmlh_salah":data.jmlh_salah,
         "total_nilai":data.total_nilai,
         "tgl_pengerjaan":data.tgl_pengerjaan}];
         return report;
        });
       }
      });
      console.log(report);
     }





     function load_grafik(data) {
      var chart = new CanvasJS.Chart("chartContainer", {
       title: {
        text: data.judul
       },
       animationEnabled: true,
       theme: "theme2",
       data: [
       {
        type: "doughnut",
        indexLabelFontFamily: "Garamond",
        indexLabelFontSize: 20,
        startAngle: 0,
        indexLabelFontColor: "dimgrey",
        indexLabelLineColor: "darkgrey",
        toolTipContent: "{y} %",

        dataPoints: [
        { y: 51.04, indexLabel: "Android {y}%" },
        { y: 40.83, indexLabel: "iOS {y}%" },
        { y: 3.20, indexLabel: "Java ME {y}%" },
        { y: 1.11, indexLabel: "BlackBerry {y}%" },
        { y: 2.29, indexLabel: "Windows {y}%" },
        { y: 1.53, indexLabel: "Others {y}%" }
        ]
       }
       ]
      });
      chart.render();
     }

     function lihat_grafik(){
      var id_latihan = $('.modal-on').data('todo').id;
      var judul = $('.modal-on').data('todo').nama_latihan;
      $('.modal-title').text('Grafik Latihan ');
      $('#myModal').modal('show');
      var data = {"id_latihan":id_latihan,"judul":judul};
      load_grafik(data);
     }
    </script>
    <script src="<?= base_url('assets/back/plugins/canvasjs.min.js') ?>"></script>