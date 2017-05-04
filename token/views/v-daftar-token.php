
<div class="row">
  <div class="col-md-12 form-token" style="display: none">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Tambah Token</h3> 
      </div>
      <div class="panel-body">
        <form  class="panel panel-default form-horizontal form-bordered form-step"  method="post" >
         <div  class="form-group">
           <label class="col-sm-2 control-label">Jumlah Token</label>
           <div class="col-sm-3">
             <!-- stkt = soal tingkat -->
             <input type="text" class="form-control" name="jumlah_token">
           </div>

           <label class="col-sm-2 control-label">Masa aktif</label>
           <div class="col-sm-3">
             <!-- stkt = soal tingkat -->
             <select class="form-control" name="masa_aktif">
              <option value="0">-- Pilih Masa Aktif --</option>
              <option value="30">30 Hari</option>
              <option value="100">100 Hari</option>
              <option value="365">365 Hari</option>
            </select>
          </div>
        </div>

        <div class="form-group no-border">
          <div class="col-sm-6 ml10">
           <a class="btn btn-primary simpan_token">Generate Token</a>
         </div>
       </div>

     </form>
   </div>
 </div>
</div>
<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Daftar Token 

     </h3>


     <div class="panel-toolbar text-right">
       <div class="col-sm-4">
         <span><b>Filter: </b></span>
         <input name="status_token" value="1" type="radio" class="mt10" title="Aktif"> 
         <i class="ico-file-check mr10"></i>  
         <input name="status_token" value="0" type="radio" title="Tidak Aktif"> <i class="ico-file-remove "></i>
       </div>
       <div class="col-sm-4">

         <!-- stkt = soal tingkat -->
         <select class="form-control" name="masa_aktif" id="masa_aktif_select">
          <option value="all">Semua</option>
          <option value="30">30 Hari</option>
          <option value="100">100 Hari</option>
          <option value="365">365 Hari</option>
        </select>


      </div>
      <a class="btn btn-inverse btn-outline add-token" title="Tambah Token" ><i class="ico-plus"></i></a>
    </div>
  </div>
  <div class="panel-body">
    <table class="daftartoken table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
      <thead>
        <tr>
          <th>id</th>
          <th>Nomor Token</th>
          <th>Masa Aktif</th>
          <th>Digunakan Oleh</th>
          <th width="15%">Aksi</th>
        </tr>
      </thead>

      <tbody>

      </tbody>
    </table>
     <ul class="pagination pagination-token">

    </ul>
  </div>
</div>
</div>

</div>
<!-- TABEL TOKEN -->
<script type="text/javascript">
var dataTableToken;
function nextPage(page='') {
  dataTableToken = $('.daftartoken').DataTable({
      "ajax": {
      "url": base_url+"token/ajaxLisToken/all/null/"+page,
      "type": "POST"
    },
      "emptyTable": "Tidak Ada Data Pesan",
      "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
      "bDestroy": true,
      "bPaginate": false,
  });
}
$(document).ready(function(){
  // TABLE TOKEN
  dataTableToken = $('.daftartoken').DataTable({
    "ajax": {
      "url": base_url+"token/ajaxLisToken",
      "type": "POST"
    },
    "emptyTable": "Tidak Ada Data Pesan",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    "bDestroy": true,
    "bPaginate": false,
  });

    //set pagination
  function paginationToken() {

        $.ajax({
      url:base_url+"token/paginationToken",
   
      type:"POST",
      dataType:"TEXT",
      success:function(data){
        $('.pagination-token').append(JSON.parse(data));
      },error:function(){
        swal('Gagal membuat Token');
      }
    });
  }
  paginationToken();

  });
// onclick action
$('.add-token').click(function(){
  $('.form-token').toggle('show');
});

$('.simpan_token').click(function(){
  addtoken();
  dataTableToken.ajax.reload(null,false); 
});

$('input[name=status_token]').click(function(){
  status_token = this.value;
  data = $('#masa_aktif_select').val();
  url = base_url+"token/ajax_data_token/"+data+"/"+status_token;

  dataTableToken = $('.daftartoken').DataTable({
    "ajax": {
      "url": url,
      "type": "POST",
    },
    "emptyTable": "Tidak Ada Data Pesan",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    "bDestroy": true,
  });

  console.log(url);
});


// ketika masa aktif radio button di klik
$('#masa_aktif_select').on('change', function() {
  masa_aktif = this.value ;
  get_filtered_token(masa_aktif);
});

// UDF //
function addtoken(){
  var data = $('.form-step').serialize();
  $.ajax({
    url:base_url+"token/add_token",
    data:data,
    type:"POST",
    dataType:"TEXT",
    success:function(){
      swal('Token Berhasil Di Tambahkan');
      reload();
    },error:function(){
      swal('Gagal membuat Token');
    }
  })
}

//fungsi untuk filter token
function get_filtered_token(data){
  status_token = $('input[name=status_token]:checked').val();
  console.log(status_token);
  if (status_token) {
  //kalo tidak undfined
  url = base_url+"token/ajax_data_token/"+data+"/"+status_token;
}else{
    //kalo undefined
    url = base_url+"token/ajax_data_token/"+data;
  }

  console.log(url);

  dataTableToken = $('.daftartoken').DataTable({
    "ajax": {
      "url": url,
      "type": "POST",
    },
    "emptyTable": "Tidak Ada Data Pesan",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    "bDestroy": true,
  });
}


function reload(){
  dataTableToken.ajax.reload(null,false); 
}


function drop_token(data){
  url = base_url+"token/drop_token";
  swal({
    title: "Yakin akan hapus Token?",
    text: "Anda tidak dapat membatalkan ini.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya,Tetap hapus!",
    closeOnConfirm: false
  },
  function(){
    var datas = {id:data};
    $.ajax({
      dataType:"text",
      data:datas,
      type:"POST",
      url:url,
      success:function(){
        swal("Terhapus!", "Token berhasil dihapusss.", "success");
        reload();
      },
      error:function(){
        sweetAlert("Oops...", "Data gagal terhapus!", "error");
      }

    });
  });
}


function update_token(data){

  url = base_url+"token/aktifkan_token";
  swal({
    title: "Yakin akan aktifkan Token?",
    text: "Anda tidak dapat membatalkan ini.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya,Aktifkan token",
    closeOnConfirm: false
  },
  function(){
    var datas = {id:data};
    $.ajax({
      dataType:"text",
      data:datas,
      type:"POST",
      url:url,
      success:function(){
        swal("Diaktifkan!", "Token berhasil diaktikan.", "success");
        dataRekapToken.ajax.reload(null,false)
      },
      error:function(){
        sweetAlert("Oops...", "Token gagal diaktikan!", "error");
      }

    });
  });
}

</script>