<div class="row">
  <div class="col-md-12 kirim_token">
    <div class="panel panel-teal">
      <div class="panel-heading">
        <h3 class="panel-title">Daftar Paket TO  <span style="color:red;"><b>Maintenis</b></span> </h3> 
        <div class="panel-toolbar text-right">
          <div class="col-md-11">
           <div class="col-sm-4">
             <!-- kalo gada yang di filter -->
             <?php if (!empty($post)): ?>
               <input name="filter_cabang" type="hidden" value="<?=$post['select_cabang']  ?>">
               <input name="filter_to" type="hidden" value="<?=$post['to']  ?>">
               <input name="filter_paket" type="hidden" value="<?=$post['paket']  ?>">
             <?php endif ?>
             <!-- kalo gada yang di filter -->
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
      <button class="btn btn-sm btn-inverse col-sm-1" onclick="pdf()">PDF</button>
    </div>

  </div>

  <div class="panel-body">
    <table class="daftarpaket table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
      <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Nama Paket</th>
          <th>Cabang</th>
          <th>Nama SIswa</th>
          <th>Jumlah Soal</th>
          <th>Benar</th>
          <th>Salah</th>
          <th>Kosong</th>
          <th>Nilai</th>
          <th>Waktu Mengerjakan</th>
        </tr>
      </thead>

      <tbody id="record_daftar_paket">

      </tbody>

    </table>
    <!-- div pagination daftar token -->
    <div class="col-md-12">
      <ul class="pagination pagination-paket">

      </ul>
    </div>
    <!-- div pagination daftar token -->
  </div>

</div>
</div>   
</div>
<script type="text/javascript">
  var tb_paket;
  var mySelect
  var url;
  var dataPaket;
  var records_per_page=100;
  var page=0;
  var pagination_paket;
  var pageVal=0;
  var pageSelek=0;
  $(document).ready(function(){
     mySelect = $('select[name=cabang]').val();

  //   if ($('input[name=filter_paket]').val()) {
  //     filter_cabang = $('input[name=filter_cabang]').val();
  //     filter_to = $('input[name=filter_to]').val();
  //     filter_paket = $('input[name=filter_paket]').val();
  //     url = base_url+"admincabang/laporanto/"+filter_cabang+"/"+filter_to+"/"+filter_paket;

  //     // select buat milih cabang dan tonya.
  //     $('#select_cabang').val(filter_cabang); 
  //     $('#select_to').val(filter_to); 

  //     load_paket(filter_to);

  //   }else{
  //     url = base_url+"admincabang/laporanto"
  //   }

  //   dataTablePaket = $('.daftarpaket').DataTable({
  //     "ajax": {
  //       "url": url,
  //       "type": "POST"
  //     },
  //     "emptyTable": "Tidak Ada Data Pesan",
  //     "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
  //     "bDestroy": true,
  //   });
    function set_tb_paket() { 
      url=base_url+"admincabang/laporanto";
      dataPaket={records_per_page:records_per_page,page:pageSelek};
      $.ajax({
        url:url,
        data:dataPaket,
        dataType:"text",
        type:"post",
        success:function(Data)
        {
       // console.log(Data);
          tb_paket = JSON.parse(Data);
          $('#record_daftar_paket').append(tb_paket);
        },
        error:function(){

        },
      });

      
    }
    set_tb_paket();
    function set_pagination_tb_paket() {
      console.log("ini gemes");
      url=base_url+"admincabang/pagination_daftar_paket";
      dataPaket={records_per_page:records_per_page,page:pageSelek};
      $.ajax({
        url:url,
        data:dataPaket,
        dataType:"text",
        type:"post",
        success:function(Data)
        {
       // console.log(Data);
          pagination_paket = JSON.parse(Data);
          $('.pagination-paket').append(pagination_paket);
        },
        error:function(){

        },
      });
    }
    set_pagination_tb_paket();

  });
function selectPagePaket(pageVal='0') {
  $('#record_daftar_paket').empty();
    page=pageVal;
  pageSelek=page*records_per_page;
  url=base_url+"admincabang/laporanto";
      dataPaket={records_per_page:records_per_page,page:pageSelek};
      $.ajax({
        url:url,
        data:dataPaket,
        dataType:"text",
        type:"post",
        success:function(Data)
        {
       // console.log(Data);
          tb_paket = JSON.parse(Data);
          $('#record_daftar_paket').append(tb_paket);
        },
        error:function(){

        },
      });
}


// CABANG KETIKA DI CHANGE
$('#select_cabang').change(function(){
  cabang = $('#select_cabang').val();
  tryout = $('#select_to').val();
  paket = $('#select_paket').val();


  url = base_url+"admincabang/laporanto/"+cabang+"/"+tryout+"/"+paket;
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

// TO KETIKA DI CHANGE
$('#select_to').change(function(){
  cabang = $('#select_cabang').val();
  tryout = $('#select_to').val();
  paket = $('#select_paket').val();

  url = base_url+"admincabang/laporanto/"+cabang+"/"+tryout+"/"+paket;
  dataTablePaket = $('.daftarpaket').DataTable({
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


function pdf() {
  /// TOMBOL PDF KETIKA DI KLIK
  cabang = $('#select_cabang').val();
  tryout = $('#select_to').val();
  paket = $('#select_paket').val();

  if (cabang != "all" && tryout != "all" && paket != "all") {
    url = base_url+"admincabang/laporanPDF/"+cabang+"/"+tryout+"/"+paket;
    window.open(url, '_blank');
  }else{
    $("#cekInput").modal("show");
  }
}
</script>