<div id="container">
   <!-- Start Modal Detail Video dari server -->
   <div class="modal fade" id="detail-konsul">

      <div class="modal-dialog" role="document">

         <div class="modal-content">

            <div class="modal-header">

               <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span>

               </button>

               <h3 class="modal-title text-center"> Detail Konsultasi</h3>

            </div>

            <div class="modal-body">
               <h5>Isi konsultasi</h5>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
               consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
               cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
               proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

            <div class="modal-footer">

               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>

         </div>

      </div>

   </div>
   <!-- End Modal Detail Video -->	
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
<!-- Start Penel -->
<div class="panel panel-inverse">
 <!-- Start Panel Body -->
 <div class="panel-body">
   <!-- Start Tabel -->
   <table class="table table-striped" id="zero-configuration" style="font-size: 12px">
      <thead>
       <tr>
         <th>No</th>
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
<script type="text/javascript">
   function detail_konsul() {
      $('#detail-konsul').modal('show');
      console.log('masuk js modal');
   }
</script>