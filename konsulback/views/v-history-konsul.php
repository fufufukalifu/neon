<div id="container">
   
  <!-- Top Stats -->
  <div class="row">
    <div class="col-sm-3">
      <!-- START Statistic Widget -->
      <div class="table-layout animation delay animating fadeInDown">
        <div class="col-xs-4 panel bgcolor-success">
          <div class="ico-users3 fsize24 text-center"></div>
       </div>
       <div class="col-xs-8 panel">
          <div class="panel-body text-center">
            <h4 class="semibold nm"><?=$nama;?></h4>
         </div>
      </div>
   </div>
   <!--/ END Statistic Widget -->
   
</div>
<div class="col-sm-3">
  <!-- START Statistic Widget -->
  <div class="table-layout animation delay animating fadeInDown">
    <div class="col-xs-4 panel bgcolor-info">
      <div class="ico-bubbles10 fsize24 text-center"></div>
   </div>
   <div class="col-xs-8 panel">
      <div class="panel-body text-center">
        <h4 class="semibold nm"><?=$countJawab;?></h4>
        <p class="semibold text-muted mb0 mt5">Respon Jawab</p>
     </div>
  </div>
</div>
<!--/ END Statistic Widget -->
</div>
<div class="col-sm-3">
  <!-- START Statistic Widget -->
  <div class="table-layout animation delay animating fadeInUp">
    <div class="col-xs-4 panel bgcolor-danger">
      <div class=" ico-heart fsize24 text-center"></div>
   </div>
   <div class="col-xs-8 panel">
      <div class="panel-body text-center">
        <h4 class="semibold nm"><?=$countLove;?></h4>
        <p class="semibold text-muted mb0 mt5">Love</p>
     </div>
  </div>
</div>
<!--/ END Statistic Widget -->
</div>
<div class="col-sm-3">
  <!-- START Statistic Widget -->
  <div class="table-layout animation delay animating fadeInDown">
    <div class="col-xs-4 panel bgcolor-teal">
      <div class="ico-trophy-star fsize24 text-center"></div>
   </div>
   <div class="col-xs-8 panel">
      <div class="panel-body text-center">
        <h4 class="semibold nm"><?=$poin;?></h4>
        <p class="semibold text-muted mb0 mt5">Poin</p>
     </div>
  </div>
</div>
<!--/ END Statistic Widget -->
</div>

</div>
<!--/ Top Stats -->
 <!-- menu tab -->
   <div>
     <ul class="nav nav-tabs">
      <li class="active"><a href="#respon" data-toggle="tab">History Respone</a></li>
      <li><a href="#komen" data-toggle="tab">History Komen Love</a></li>
    </ul>
  </div>
 <!-- End menu tab -->
<!-- START TAB KONTEN -->
<div class="tab-content">
<!-- Start tab pane history respon -->
<div class="tab-pane active" id="respon">
<!-- Start Penel -->
<div class="panel ">
 <!-- Start Panel Body -->
 <div class="panel-body">
   <!-- Start Tabel -->
   <table class="table table-striped" id="zero-configuration1" style="font-size: 12px">
      <thead>
       <tr>
         <th>No</th>
         <th>Judul Pertanyaan</th>
         <th>Pertanyaan</th>
         <th>Jawaban</th>
         <th>Tanggal</th>
         <th>Detail</th>
      </tr>
      </thead>
      <tbody>
      <?php $no=1; ?>
      <?php foreach ($respon as $value): ?>
         <tr>
            <th><?=$no;?></th>
            <th><?=$value['judulPertanyaan']?></th>
            <th><?=$value['isiPertanyaan']?></th>
            <th><?=substr($value['isiJawaban'], 0, 100)?>...</th>
            <th><?=$value['tgl']?></th>
            <th><a class="btn btn-sm bgcolor-success text-center"  title="Detail" href=""><i class="ico-bubble11 fsize23"></i></a></th>
         </tr>
      <?php $no++; ?>
      <?php endforeach ?>
      </tbody>
   </table>
<!-- Start Tabel -->
</div>
<!-- END Panel Body -->
</div>
<!-- End Panel -->
</div>
<!-- END tab pane history respon -->

<!-- Start tab pane history respon -->
<div class="tab-pane" id="komen">
<!-- Start Penel -->
<div class="panel ">
 <!-- Start Panel Body -->
 <div class="panel-body">
   <!-- Start Tabel -->
   <table class="table table-striped" id="zero-configuration" style="font-size: 12px">
      <thead>
       <tr>
         <th>No</th>
         <th>Nama</th>
         <th>Komentar</th>
         <th>Tanggal</th>
      </tr>
      </thead>
      <tbody>
          <?php $no='1'; ?>
          <?php foreach ($komen as $rows ): ?>
            <tr>
              <th><?=$no;?></th>
              <th><?=$rows['namaDepan'];?> <?=$rows['namaBelakang'];?></th>
              <th><?=$rows['komentar'];?></th>
               <th><?=$rows['tgl'];?></th>
            </tr>
            <?php $no++; ?>
          <?php endforeach ?>
          
      </tbody>
   </table>
<!-- Start Tabel -->
</div>
<!-- END Panel Body -->
</div>
<!-- End Panel -->
</div>
<!-- END tab pane history respon -->
</div>
<!-- END TAB KONTEN -->


</div>
<script type="text/javascript">
   function detail_konsul() {
      $('#detail-konsul').modal('show');
      console.log('masuk js modal');
   }
</script>