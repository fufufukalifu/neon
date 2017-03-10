  
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Grafik Perkembangan {namaDepan} {namaBelakang}</h3> 
      </div>
      <div class="panel-body">
        <div class="panel-body pt0">

        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Selamat datang, {namaDepan} {namaBelakang} !</h3> 
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-4">
            <!-- START Statistic Widget -->
            <div class="table-layout animation delay animating fadeInDown">
              <div class="col-xs-4 panel bgcolor-info">
                <div class="ico-book3 fsize24 text-center"></div>
              </div>
              <div class="col-xs-8 panel">
                <div class="panel-body text-center">
                  <h4 class="semibold nm">{jumlah_paket}</h4>
                  <p class="semibold text-muted mb0 mt5">Paket Soal Dikerjakan</p>
                </div>
              </div>
            </div>
            <!--/ END Statistic Widget -->
          </div>
          <div class="col-sm-4">
            <!-- START Statistic Widget -->
            <div class="table-layout animation delay animating fadeInUp">
              <div class="col-xs-4 panel bgcolor-teal">
                <div class="ico-notebook fsize24 text-center"></div>
              </div>
              <div class="col-xs-8 panel">
                <div class="panel-body text-center">
                  <h4 class="semibold nm">{jumlah_latihan}</h4>
                  <p class="semibold text-muted mb0 mt5">Latihan</p>
                </div>
              </div>
            </div>
            <!--/ END Statistic Widget -->
          </div>
          <div class="col-sm-4">
            <!-- START Statistic Widget -->
            <div class="table-layout animation delay animating fadeInDown">
              <div class="col-xs-4 panel bgcolor-primary">
                <div class="ico-qrcode2 fsize24 text-center"></div>
              </div>
              <div class="col-xs-8 panel">
                <div class="panel-body text-center">
                  <h4 class="semibold nm">{sisa} Hari</h4>
                  <p class="semibold text-muted mb0 mt5">Masa Aktif Token</p>
                </div>
              </div>
            </div>
            <!--/ END Statistic Widget -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Laporan Semua Paket Tryout</h3> 
      </div>
      <div class="panel-body">
        <table class="table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
          <thead>
            <tr>
            
                <th>no</th>
                <th>Nama Paket</th>
                <th>Jumlah Soal</th>
                <th>Benar</th>
                <th>Salah</th>
                <th>Kosong</th>
                <th>Nilai</th>
                <th>Waktu Mengerjakan</th>
                <th>Aksi</th>

              </tr>
            </thead>

            <tbody>

            </tbody>
          </table>


        </div>
      </div>
    </div>

      <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Laporan Semua Latihan</h3> 
      </div>
      <div class="panel-body">
        <table class="table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
          <thead>
            <tr>
            
                <th>no</th>
                <th>Nama Latihan</th>
                <th>Jumlah Soal</th>
                <th>Benar</th>
                <th>Salah</th>
                <th>Kosong</th>
                <th>Nilai</th>
                <th>Waktu Mengerjakan</th>
                <th>Aksi</th>

              </tr>
            </thead>

            <tbody>

            </tbody>
          </table>


        </div>
      </div>
    </div>




    <!-- get data siswa unutk di tampilkan di form -->          
    <div class="container-fluid">
     <div class="col-xs-3">

      <div class="widget panel">
        <div class="thumbnail">
          <div class="media">
            <div class="indicator"><span class="spinner"></span></div>
            <div class="meta bottom text-center">
              <center>
               <img class="img-circle img-bordered-teal mb10 text-center" src="<?=$photo ?>" alt="" width="120px" height="120px">
             </center>
             <h4 class="semibold nm" style="color:black"><span class="iconmoon-location-6">{namaDepan} {namaBelakang}</span></h4>
             <h6 class="nm" style="color:black"><i><span class="iconmoon-location-6">
               <b>About me :</b><br>{namaDepan} {namaBelakang} {biografi}</span>
             </i></h6>
           </div>
         </div>
       </div>




     </div>
   </div>
 </div>
</div>

