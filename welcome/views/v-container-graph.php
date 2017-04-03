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
<section class="padding-section" style="padding-bottom: : 0">
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
<hr class="divider-color">   
<!-- PERKEMBANGAN learning Line -->

<!-- PERKEMBANGAN TO -->
<section class="padding-section" style="padding-top: 0">
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
<!-- FILTER PENCARIAN TO -->
<!-- LOAD GRAFIK PERSENTASE TO -->