<div id="container">
	
  <!-- Start body panel -->
  <div class="panel panel-teal">
    <!-- Start panel Heading -->
    <div class="panel-heading">
      <h5 class="panel-title">Daftar Poin Guru</h5>
    </div>
    <!-- END panel Heading -->
    <!-- Start panel Body -->
    <div class="panel-body">
    <table class="table table-striped" id="zero-configuration" style="font-size: 12px">
      <thead>
        <tr>
          <th>Rank</th>
          <th>Nama Guru</th>
          <th>Jumlah Respone</th>
          <th><i class=" ico-heart fsize20 text-center"></i></th>
          <th>Poin</th>
          <th>Detail</th>
        </tr>
      </thead>
      <tbody>
      <?php $rank=1; ?>
      <?php foreach ($dat_aq as $value): ?>
        <tr>
          <th><?=$rank?></th>
          <th><?=$value['nama'];?></th>
          <th><?=$value['countJawab']?></th>
          <th><?=$value['love'];?></th>
          <th><?=$value['poin'];?></th>
          <th><a class="btn btn-sm bgcolor-success text-center"  title="Detail" href="<?=base_url('index.php/konsulback/history/').$value['guruID']?>"><i class="ico-user fsize23"></i></a></th>
        </tr>
        <?php $rank++; ?>
      <?php endforeach ?>
      </tbody>
    </table>
   </div>
 </div>
 <!-- Start body panel -->
</div>