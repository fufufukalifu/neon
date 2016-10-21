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
         <p class="font-alt nm">Menu</p>
       </h4>
     </div>
     <!--/ Header -->
     <a href="<?=base_url('index.php/tesonline') ?>" class="cws-button small bt-color-3"><i class="glyphicon glyphicon-plus"></i> Latihan</a>
     <a onclick="show_report();" class="cws-button small bt-color-3"><i class="glyphicon glyphicon-list-alt"></i> Daftar Latihan</a>
   </ul>
 </div>
 <!--/ Category -->

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
<div class="mb15" >
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
 consequat.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
<!--/ Text Widget -->
</div>
<!--/ END Left Section -->


<!-- top -->
<div class="col-md-9">
  <h3>Daftar Paket TO yang Belum Dikerjakan</h3>
  <div class="col-md-12">
    <?php if ($paket==array()): ?>
      <h4>Belum ada paket Try Out.</h4>
    <?php else: ?>
      <table class="table" style="font-size: 13px">
        <thead>
         <tr>
          <th>ID Paket</th>
          <th>Nama Paket Soal</th>
          <th>Status</th>
          <th width="10%">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($paket as $paketitem):?>
          <tr>
            <td><?=$paketitem['id_paket'] ?></td>
            <td><?=$paketitem['nm_paket'] ?></td>
            <td>Belum Dikerjakan</td>
            <td>
                <a onclick="detail_paket(<?=$paketitem['id_paket']?>)" 
                 class="btn btn-success border-radius modal-on<?=$paketitem['id_paket']?>"
                 data-todo='<?=json_encode($paketitem)?>'><i class="glyphicon glyphicon-pencil"></i></a>

             </td>
           </tr>
         <?php endforeach ?>
       </tbody>
     </table>
   <?php endif ?>
 </div>

</div>

<div class="col-md-9">
  <h3>Daftar History TO</h3>
  <div class="col-md-12">
    <?php if ($paket_dikerjakan==array()): ?>
      <h4>Tidak ada paket soal.</h4>
    <?php else: ?>
      <?php foreach ($paket_dikerjakan as $paketitem): ?>
       <div class="col-md-6">
        <div class="panel bg-color-1">
         <div class="panel-heading text-left">
          <p style="width:130px">
           <strong> <?=$paketitem['nm_paket'] ?> </strong>
           <?php if ($paketitem['status_pengerjaan']==2): ?>
            <span><strong>status</strong>:Belum/Tidak selesai</span>
          <?php elseif($paketitem['status_pengerjaan']==3): ?>
            <span><strong>status</strong>:Selesai<br><br></span>
          <?php endif ?>
        </p>
      </strong>
    </div>

    <div class="panel-body text-center">
     <img src="http://placehold.it/130x130" data-at2x="http://placehold.it/130x130" alt="">    
   </div>
   <table class="table">
     <tbody>
      <tr>
        <td colspan="2" align="center">
          <?php if ($paketitem['status_pengerjaan']==2): ?>
           <a onclick="detail_paket(<?=$paketitem['id_paket']?>)" 
             class="cws-button border-radius bt-color-3 modal-on<?=$paketitem['id_paket']?>"
             data-todo='<?=json_encode($paketitem)?>'>Lanjut</a>
           <?php elseif($paketitem['status_pengerjaan']==3): ?>
            <a onclick="detail_paket(<?=$paketitem['id_paket']?>)" 
             class="cws-button border-radius bt-color-2 modal-on<?=$paketitem['id_paket']?>"
             data-todo='<?=json_encode($paketitem)?>'>Lihat Score</a>
           <?php endif ?>
         </td>
       </tr>
     </tbody>
   </table>
 </div>
</div>
<?php endforeach ?>
<?php endif ?>
</div>
</div>




</section>
<!--/ END Blog Content -->

<!-- START To Top Scroller -->
<a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
<!--/ END To Top Scroller -->

</section>
<!--/ END Template Main -->
<script type="text/javascript"> 

  function detail_paket(id_to){
    var kelas = ".modal-on"+id_to;
    var data_to = $(kelas).data('todo');
    url = base_url+"index.php/tryout/buatto";

    var datas = {
      id_paket:data_to.id_paket,
      id_tryout:data_to.id_tryout,
      id_mm_tryoutpaket:data_to.id
    }
    $.ajax({
      url : url,
      type: "POST",
      data: datas,
      dataType: "TEXT",
      success: function(data)
      {
       window.location.href = base_url + "index.php/tryout/mulaitest";
     },
     error: function (jqXHR, textStatus, errorThrown)
     {
      console.log("gagal");
    }
  });



  }
  $(document).ready(function() {
    $(".table").dataTable();
    $("#owl2").owlCarousel();
  });

</script>
<script src="<?= base_url('assets/back/plugins/canvasjs.min.js') ?>"></script>