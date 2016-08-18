<!-- header -->
<header id="header" class="navbar navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="javascript:void(0);">
            <span class="logo-figure"></span>
            <span class="logo-text"></span>
        </a>
    </div>
</header>

<!-- menu kiri -->
<aside class="sidebar sidebar-left sidebar-menu">     
 <section class="content slimscroll">
 <h5 class="heading">Main Menu</h5>

 <ul class="topmenu topmenu-responsive" data-toggle="menu">
  <li >
   <a href="javascript:void(0);" data-toggle="submenu" data-target="#chart" data-parent=".topmenu">
       <span class="figure"><i class="ico-home"></i></span>
       <span class="text">Dashboard</span>
   </a>
   <a href="javascript:void(0);" data-toggle="submenu" data-target="#chart" data-parent=".topmenu">
       <span class="figure"><i class="ico-folder"></i></span>
       <span class="text">Pengelolaan Video</span>
   </a>
   <a href="javascript:void(0);" data-toggle="submenu" data-target="#chart" data-parent=".topmenu">
       <span class="figure"><i class="ico-file-upload"></i></span>
       <span class="text">Upload Video</span>
   </a>


  </li>
 </ul>
 </section>
</aside>

<!-- konten -->
<section id="main" role="main">
 <div class="container-fluid">

  <div class="page-header page-header-block">
   <div class="page-header-section">
    <h4 class="title semibold">Dashboard</h4>
   </div>
  </div>

  <!-- profile -->
<div class="col-xs-12">
<div class="widget panel">
    <div class="thumbnail">
      <div class="media">
            <div class="indicator"><span class="spinner"></span></div>
         <div class="meta bottom text-center">
             <img class="img-circle img-bordered-teal mb10" src="<?=base_url('assets/image/avatar/avatar8.jpg')?>" alt="" width="120px" height="120px">
             <h4 class="semibold nm" style="color:black"><span class="iconmoon-location-6"><?= $data_guru['namaDepan']." ".$data_guru['namaBelakang'] ?></span></h4>
             <h6 class="nm" style="color:black"><span class="iconmoon-location-6"><?=$data_guru['namaMataPelajaran'] ?></span></h6>

         </div>
            <img data-toggle="unveil" src="<?=base_url('assets/image/background/400x250/placeholder.jpg')?>" alt="Cover" height="30%"/>
      </div>
     </div>
     
     <!-- meta user -->
     <div class="panel-body">
         <ul class="nav nav-section nav-justified">
             <li>
                 <div class="section">
                     <p class="nm text-muted">Jumlah Video</p>
                     <h4 class="nm"><?=$jumlah_video ?></h4>
                 </div>
             </li>
             <li>
                 <div class="section">
                     <p class="nm text-muted">Jumlah Komentar</p>
                     <h4 class="nm">10</h4>
                 </div>
             </li>
         </ul>
              <!--/ Nav section -->
          </div>
          <!--/ panel body -->
      </div>
      <!--/ END Widget Panel -->
  </div>
  <div class="row">
   <div class="col-sm-12">
   <div class="page-header-section">
    <h5 class="title semibold">Video Baru Saja Di Upload</h5>
   </div>

    <div class="owl-carousel" id="stats">
     <?php foreach ($videos_uploaded as $video): ?>
     <div class="item panel no-border">
      <div class="panel-body">
          <a href=""><h6 class="semibold nm"><i class="ico ico-bubble-video-chat"></i><?=$video->judulVideo ?></h6></a>
           <div class="media">
               <a href=""><img class="unveiled" data-toggle="unveil" src="<?=base_url('assets/image/video/video.PNG');?>" data-src="<?=base_url('assets/image/video/video.PNG');?>" alt="Photo" height="140px"></a>
           </div>
       </div>
     </div>
     <?php endforeach ?>
    </div>
   </div>
  </div>
 </div>
</section>
<script type="text/javascript" src="<?=base_url('assets/library/jquery/js/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/library/jquery/js/jquery-migrate.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/library/bootstrap/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/library/core/js/core.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/sparkline/js/jquery.sparkline.min.js')?>"></script>

<script type="text/javascript" src="<?=base_url('assets/javascript/app.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/javascript/pages/dashboard-v2.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/flot/jquery.flot.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/flot/jquery.flot.categories.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/flot/jquery.flot.tooltip.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/flot/jquery.flot.resize.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/flot/jquery.flot.spline.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/owl/js/owl.carousel.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/datatables/js/jquery.datatables.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/datatables/js/jquery.datatables-custom.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/plugins/jvectormap/js/jvectormap.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/javascript/maps/vector-world-mill.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/javascript/pages/dashboard-v2.js')?>"></script>  