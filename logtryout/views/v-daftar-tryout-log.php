  <div class="col-md-12 kirim_token">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Daftar Laporan Pengerjaan</h3> 
        <div class="panel-toolbar text-right">
          <div class="col-md-12">
           <div class="col-sm-4">
             <select class="form-control" id="select_cabang">
              <option value="all">Semua Cabang</option>
              <?php foreach ($cabang as $item): ?>
                <option value="<?=$item->id ?>"><?=$item->namaCabang ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="col-sm-4">
           <select class="form-control" id="select_to">
            <option value="all">Semua Tryout</option>          
            <?php foreach ($to as $item): ?>
              <option value="<?=$item['id_tryout']?>"><?=$item['nm_tryout'] ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="col-sm-4">
         <select class="form-control col-sm-6" id="select_paket">
          <option value="all">Semua paket</option>
        </select>
        <!-- <button class="btn btn-sm btn-inverse " onclick="pdf()">PDF</button> -->
      </div>
    </div>
  </div>
</div>
<div class="panel-body">
  <form  class="panel panel-default form-horizontal form-bordered form-step"  method="post" >

    <table class="daftarlog table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
      <thead>
        <tr>

          <th>No</th>
          <th>Nama Pengguna</th>
          <th>Nama Lengkap</th>
          <th>Waktu perngerjaan</th>

          <th>Nama Tryout</th>
          <th>Nama Paket</th>
          <th>Status Tryout</th>

        </tr>
      </thead>

      <tbody id="record_siswa">

      </tbody>
    </table>
    <hr>

  </div>
  <div class="panel-footer">
  </div>
</div>
</div>
</div>

<script>
var meridian=4;
var prev=1;
var next=2;
var records_per_page=10;
var status="1";
var masaAktif="all";
var page;
var pageVal;
var pageSelek=0;
var keySearch='';
var url;
var datas;
  $(document).ready(function(){

    // url = base_url+"logtryout/ajax_status_to";
    // dataTablePaket = $('.daftarlog').DataTable({
    //   "ajax": {
    //     "url": url,
    //     "type": "POST"
    //   },
    //   "emptyTable": "Tidak Ada Data Pesan",
    //   "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    //   "bDestroy": true,
    // });

      // set tb siswa
  function set_tb_trout_log() {
    datas ={records_per_page:records_per_page,pageVal:pageVal,keySearch:keySearch};
    $('#record_siswa').empty();
    url=base_url+"logtryout/ajax_status_to";
    $.ajax({
      url:url,
      data:datas,
      dataType:"text",
      type:"post",
      success:function(Data)
      {
        tb_siswa = JSON.parse(Data);
        $('#record_siswa').append(tb_siswa);
      },
      error:function(e,jqXHR, textStatus, errorThrown)
      {
         sweetAlert("Oops...", e, "error");
      }
    });
  }
  set_tb_trout_log();

  });



// TO KETIKA DI CHANGE
$('#select_cabang').change(function(){
  cabang = $('#select_cabang').val();
  tryout = $('#select_to').val();
  paket = $('#select_paket').val();

  url = base_url+"logtryout/ajax_status_to/"+cabang+"/"+tryout+"/"+paket;
  dataTablePaket = $('.daftarlog').DataTable({
    "ajax": {
      "url": url,
      "type": "POST"
    },
    "emptyTable": "Tidak Ada Data Pesan",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    "bDestroy": true,
  });

});

    // TO KETIKA DI CHANGE
    $('#select_to').change(function(){
      cabang = $('#select_cabang').val();
      tryout = $('#select_to').val();
      paket = $('#select_paket').val();

      url = base_url+"logtryout/ajax_status_to/"+cabang+"/"+tryout+"/"+paket;
      dataTablePaket = $('.daftarlog').DataTable({
        "ajax": {
          "url": url,
          "type": "POST"
        },
        "emptyTable": "Tidak Ada Data Pesan",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
        "bDestroy": true,
      });

      load_paket(tryout);
    });
//ketika paket di change
function load_paket(id_to){
 $.ajax({
  type: "POST",
  url: "<?php echo base_url() ?>admincabang/get_paket/"+id_to,
  success: function(data){
   $('#select_paket').html('<option value="all">-- Pilih Paket  --</option>');
   $.each(data, function(i, data){
    $('#select_paket').append("<option value='"+data.id_paket+"'>"+data.nm_paket+"</option>");
  });
 }
});
}
// TO KETIKA DI CHANGE
$('#select_paket').change(function(){
  cabang = $('#select_cabang').val();
  tryout = $('#select_to').val();
  paket = $('#select_paket').val();

  url = base_url+"admincabang/admincabang/laporanto/"+cabang+"/"+tryout+"/"+paket;
  dataTablePaket = $('.daftarpaket').DataTable({
    "ajax": {
      "url": url,
      "type": "POST"
    },
    "emptyTable": "Tidak Ada Data Pesan",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    "bDestroy": true,
  });
});

</script>