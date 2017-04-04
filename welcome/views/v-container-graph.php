<style>
  .canvasjs-chart-credit {
   display: none;
 }
 .table th:hover{
  cursor: hand;
}

.pagination li:before{
  color:white;
}
</style>
<div class="page-title" style="background:#2b3036">
  <div class="grid-row">
    <h1>Halo, <?=$this->session->userdata['USERNAME']?> !  </h1>
  </div>
</div>

<!-- PERKEMBANGAN learning Line -->
<section class="padding-section" style="padding: : 0;">
  <div class="grid-row clear-fix" style="padding-bottom: 0">
    <h3>Topik yang baru saja dipelajari..</h3>
    Hi, patub ! Dibawah ini adalah progress learning line kamu, silahkan lanjutkan untuk bisa menyelesaikan topik-topik yang disediakan. Tetap semangat!<br><br>
    <div class="grid-col-row clear-fix">
      <?php foreach ($topik  as $item): ?>
        <?php $persentasi = (int)$item['stepDone'] / (int)$item['jumlah_step'] * 100; ?>
        <div class="grid-col grid-col-4" title="<?=(int)$persentasi ?>%">
          <div class="portfolio-item">
            <div class="picture">
              <div class="course-item">
                <div class="course-date bg-color-3 clear-fix skill-bar">
                  <h3 style="margin:0;"><a href="<?=base_url("linetopik/learningline/".$item['babID']) ?>"><?=$item['namaTopik'] ?></a></h3>
                  <hr style="margin-bottom: 5px">  
                  <div class="day"><?=(int)$persentasi ?>% Progress</div><br>
                  <div class="day"><?=$item['stepDone'] ?> / <?=$item['jumlah_step'] ?> Step Line Dikerjakan</div>
                  <div class="bar">
                    <span class="bg-color-4 skill-bar-progress" processed="true" style="width: <?=$persentasi ?>%;"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>
<!-- PERKEMBANGAN learning Line -->


<!-- PERKEMBANGAN learning Line -->
<!--<section class="padding-section" style="padding-bottom: : 0">
  <div class="grid-row clear-fix">
    <h3>Progress Learning Line</h3>
    Hi, patub ! Dibawah ini adalah progress learning line kamu, silahkan lanjutkan untuk bisa menyelesaikan topik-topik yang disediakan. Tetap semangat!<br><br>
    <div class="grid-col-row clear-fix">

      <div class="grid-col grid-col-4">
        <div class="portfolio-item" style="height: 400px" id="graph_learning_line_0">
          <div class="picture">

          </div>
        </div>
      </div>

      <div class="grid-col grid-col-4">
        <div class="portfolio-item" style="height: 400px" id="graph_learning_line_1">
          <div class="picture">

          </div>
        </div>
      </div>

      <div class="grid-col grid-col-4">
        <div class="portfolio-item" style="height: 400px" id="graph_learning_line_2">
          <div class="picture">

          </div>
        </div>
      </div>


    </div>
  </div>
</section> -->
<!-- PERKEMBANGAN learning Line -->

<!-- video random -->
<section class="padding-section" style="padding-bottom: : 0;padding-top: 0">
  <div class="grid-row clear-fix">
    <h3 style="margin:0">Recent Video</h3>
    Nah, dibawah ini terdapat video terbaru loh, yuk coba tonton..
    <hr>  <br>
    <div class="grid-col-row clear-fix">
      <?php foreach ($video as $item): ?>
        <div class="grid-col grid-col-3">
          <div class=" portfolio-item">
            <div class="picture">
              <div class="hover-effect"></div>
              <div class="link-cont">
                <span></span>
                <?php $url =  base_url()."video/seevideo/".$item['videoid']?>
                <a href="<?=$url ?>" class="cws-right fa fa-play"></a>
              </div>
              <center>
                <?php if (!empty($item['link'])): ?>
                  <iframe  width="250" src="<?=$item['link'] ?>"></iframe>
                  
                <?php endif ?>

              </center>

            </div>
            <h3><?=$item['judulVideo'] ?></h3>
            <p><?=$item['deskripsi'] ?></p>
          </div>
        </div>
      <?php endforeach ?>
      

    </div>
    <hr class="divider-color">  

  </div>
</section>
<!-- video random -->


<!-- PERKEMBANGAN learning Line -->
<!-- <section class="padding-section" style="padding-bottom: : 0">
  <div class="grid-row clear-fix">
    <h3>Progress Learning Line</h3>
    <p>Hi, <?=$this->session->userdata('USERNAME') ?> ! Dibawah ini adalah progress learning line kamu, silahkan lanjutkan untuk bisa menyelesaikan topik-topik yang disediakan. Tetap semangat! </p>
    <table class="table rpersentase" style="font-size: 13px" width=100%>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama topik</th>
          <th>Dikerjakan</th>
          <th>Jumlah Step</th>
          <th>Belum Dikerjakan</th>
          <th>Progress</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>  
</section>
<hr class="divider-color">   -->
<!-- PERKEMBANGAN learning Line -->

<!-- PERKEMBANGAN TO -->
<section class="padding-section" style="padding-top: 0;margin-top: 0">
  <div class="grid-row clear-fix">
    <h3>Grafik Tryout</h3>
    <p>Dibawah ini adalah grafik perkembangan TO kamu, jika nilaninya masih tidak memuaskan jangan khawatir pasti kamu bisa memperbaikinya dengan cara banyak mengikuti latihan. Tetap semangat! </p>
    <label for="" class="">
      Filter Tryout : <select class="form-control tryout_select" name="tryout_select">
      <option value="">-- Cari Berdasarkan Tryout --</option>
    </select>
  </label>
  <div class="panel-body" >
    <div class="panel-body pt0" id="resizeble" style="height:430px">
      <div class="container" id="chartContainer" style="width:100%">

      </div>
    </div>      
  </div>
</div>  
</section>
<hr class="divider-big">
<!-- PERKEMBANGAN TO -->




<script src="<?= base_url('assets/back/plugins/canvasjs.min.js') ?>"></script>
<script>
  $(document).ready(function(){
        // ## datatable line log
        url4 = base_url+"siswa/async_persentase_learning";

        dataTableReportPaket = $('.rpersentase').DataTable({
          "ajax": {
            "url": url4,
            "type": "POST",
          },
          "emptyTable": "Tidak Ada Data Pesan",
          "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
          "bDestroy": true,
        });

// ## datatable line log
})
</script>
<!-- LOAD GRAFIK PERSENTASE TO -->
<script type="text/javascript">

  $.getJSON(base_url+"siswa/persentase_json", function(data) {
    load_grafik(data);
  });

  function load_grafik(data){
    var chart = new CanvasJS.Chart("chartContainer", {
    //   title:{
    //     text:"Grafik Perkembangan Paket Tryout"        
    // },
    animationEnabled: true,
    axisX:{
      interval: 1,
      gridThickness: 0,
      labelFontSize: 10,
      labelFontStyle: "normal",
      labelFontWeight: "normal",
      labelFontFamily: "Lucida Sans Unicode"

    },
    axisY2:{
      interlacedColor: "rgba(1,77,101,.2)",
      gridColor: "rgba(1,77,101,.1)"

    },

    data: [
    {     
      type: "bar",
      name: "companies",
      axisYType: "secondary",
      color: "#4bbcd7",       
      dataPoints: data
    }

    ]
  });
    chart.render();
  }
</script>
<!-- FILTER PENCARIAN TO -->
<script type="text/javascript">
 $.getJSON(base_url+"siswa/get_tryout_for_select", function(data) {
  $('.tryout_select').html('<option value="">-- Cari Berdasarkan Tryout --</option>');
  $.each(data, function (i, data) {
    $('.tryout_select').append("<option value='" + data.id_tryout + "'>" + data.nm_tryout + "</option>");
  });
});

// KETIKA BAB CHANGE, LOOAD GRAFIK
$('.tryout_select').change(function () {
  id_to = $(this).val();
  if (id_to!="") {
    $.getJSON(base_url+"siswa/persentase_json/"+id_to, function(data) {
      load_grafik(data);
    });
  }else{
    $.getJSON(base_url+"siswa/persentase_json/", function(data) {
      load_grafik(data);
    });
  }
});
// KETIKA BAB CHANGE, LOOAD GRAFIK
</script>
<script type="text/javascript">

  $.getJSON(base_url+"siswa/get_high_three_learning", function(data) {
    console.log(data);
    load_grafik_progress_line(data);
  });

  function load_grafik_progress_line(data){
    var chart1 = new CanvasJS.Chart("graph_learning_line_0", {
      title:{
        text: data[0].namaTopik           
      },
      animationEnabled: true,
      
      data: [              
      {
      // Change type to "doughnut", "line", "splineArea", etc.
      type: "doughnut",
      dataPoints: [
      { label: "Dikerjakan "+parseInt(data[0].stepDone/data[0].jumlah_step * 100)+"%",  
      y: data[0].stepDone  },

      { label: "Belum Dikerjakan "+parseInt(((data[0].jumlah_step-data[0].stepDone)/data[0].jumlah_step)*100)+"%", 
      y: data[0].jumlah_step-data[0].stepDone }
      ]
    }
    ]
  });
    chart1.render();

    jumlah = data[1].jumlah_step-data[1].stepDone;
    var chart2 = new CanvasJS.Chart("graph_learning_line_1", {
      title:{
        text: data[1].namaTopik            
      },
      animationEnabled: true,

      data: [              
      {
      // Change type to "doughnut", "line", "splineArea", etc.
      type: "doughnut",
      dataPoints: [
      { label: "Dikerjakan "+parseInt(data[1].stepDone/data[1].jumlah_step * 100)+"%",  
      y: data[1].stepDone  },

      { label: "Belum Dikerjakan "+parseInt(((data[1].jumlah_step-data[1].stepDone)/data[1].jumlah_step)*100)+"%", 
      y: data[1].jumlah_step-data[1].stepDone }
      ]
    }
    ]
  });
    chart2.render();

    var chart3 = new CanvasJS.Chart("graph_learning_line_2", {
      title:{
        text: data[2].namaTopik        
      },
      animationEnabled: true,
      data: [              
      {
      // Change type to "doughnut", "line", "splineArea", etc.
      type: "doughnut",
      dataPoints: [
      { label: "Dikerjakan "+parseInt(data[2].stepDone/data[2].jumlah_step * 100)+"%",  
      y: data[2].stepDone  },

      { label: "Belum Dikerjakan "+parseInt(((data[2].jumlah_step-data[2].stepDone)/data[2].jumlah_step)*100)+"%", 
      y: data[2].jumlah_step-data[2].stepDone }
      ]
    }
    ]
  });
    chart3.render();
  }
</script>
<!-- FILTER PENCARIAN TO -->
<!-- LOAD GRAFIK PERSENTASE TO -->