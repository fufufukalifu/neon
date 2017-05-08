
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
    
    <div  class="form-group">
      <div class="col-md-2 mb10">
      <select  class="form-control" name="records_per_page">
        <!-- <option value="10" selected="true">records per page</option> -->
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
      </select>
    </div>
    </div>
    <div>
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
    </div>
     <ul class="pagination pagination-token">

    </ul>
  </div>
</div>
</div>

</div>
<!-- TABEL TOKEN -->
<script type="text/javascript">
var dataTableToken;
var meridian=4;
var prev=1;
var next=2;
var records_per_page=10;
var status="null";
var masaAktif="all";
var page;
var pageVal;
// next page
function nextPage() {
  selectPage(next);
}
// prev page
function prevPage() {
  selectPage(prev);
}
function selectPage(pageVal='0') {
  page=pageVal;
  var pageSelek=page*records_per_page;
    dataTableToken = $('.daftartoken').DataTable({
      "ajax": {
      "url": base_url+"token/ajaxLisToken/"+masaAktif+"/"+status+"/"+records_per_page+"/"+pageSelek,
      "type": "POST"
    },
      "emptyTable": "Tidak Ada Data Pesan",
      "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
      "bDestroy": true,
      "bPaginate": false,
      "bInfo" : false,
      "bFilter": false,
  });
  //meridian adalah nilai tengah padination
 $('#page-'+meridian).removeClass('active');
  var newMeridian=page+1;
  var loop;
  var hidePage;
  var showPage;
  if (newMeridian<=4) {
        $("#page-prev").addClass('hide');
    //banyak pagination yg akan di tampilkan dan sisembunyikan
    loop=meridian-newMeridian;
    // start id pagination yg akan ditampilkan
    var idPaginationshow =1;
    // start id pagination yg akan sembunyikan
    var idPaginationhide =9;
    prev=1;
    next=7;
    //lakukan pengulangan sebanyak loop
    for (var i = 0; i < loop; i++) {
      hidePagination='#page-'+idPaginationhide;
      showPagination='#page-'+idPaginationshow;
      //pagination yg di hide
      $(showPagination).removeClass('hide');
      //pagination baru yg ditampilkan
      $(hidePagination).addClass('hide');
      idPaginationshow++;
      idPaginationhide--;
    }
  }else if( newMeridian>meridian){
    $("#page-prev").removeClass('hide');
        //banyak pagination yg akan di tampilkan dan sisembunyikan
        loop=newMeridian-meridian;
        // start id pagination yg akan ditampilkan
        var idPaginationshow =newMeridian+3;
        // start id pagination yg akan sembunyikan
        var idPaginationhide =meridian-3;
        console.log("ini"+next);
        //lakukan pengulangan sebanyak loop
        for (var i = 0; i < loop; i++) {
          hidePagination='#page-'+idPaginationhide;
          showPagination='#page-'+idPaginationshow;
          //pagination yg di hide
          $(showPagination).removeClass('hide');
          //pagination baru yg ditampilkan
          $(hidePagination).addClass('hide');
                idPaginationshow--;
          idPaginationhide++;
        }
  }else{

    //banyak pagination yg akan di tampilkan dan sisembunyikan
    loop=meridian-newMeridian;
    // start id pagination yg akan ditampilkan
    var idPaginationshow =newMeridian-3;
    // start id pagination yg akan sembunyikan
    var idPaginationhide =meridian+3;
    //lakukan pengulangan sebanyak loop
    for (var i = 0; i < loop; i++) {
      hidePagination='#page-'+idPaginationhide;
      showPagination='#page-'+idPaginationshow;
      //pagination yg di hide
      $(showPagination).removeClass('hide');
      //pagination baru yg ditampilkan
      $(hidePagination).addClass('hide');
            idPaginationshow++;
      idPaginationhide--;
    }
  } 
   prev=newMeridian-2;
   next=newMeridian;
   meridian=newMeridian;
   $('#page-'+meridian).addClass('active');
}
$(document).ready(function(){
  // even untuk jumlah record per halaman
  $("[name=records_per_page]").change(function(){
    records_per_page =$('[name=records_per_page]').val();
    selectPage(0);
    paginationToken(masaAktif,status,records_per_page);
  });
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
    "bInfo" : false,
    "bFilter": false,

  });
  // even untuk menampilkan jenis token yg sudah digunakan atau belum digunakan 
  $('input[name=status_token]').click(function(){
  status = this.value;
  console.log(page+"ini");
  selectPage(page);
  paginationToken(masaAktif,status,records_per_page);
  });

  // ketika masa aktif radio button di klik
  $('#masa_aktif_select').on('change', function() {
    masaAktif = this.value ;
    selectPage(page);
    paginationToken(masaAktif,status,records_per_page);
  });

    //set pagination
  function paginationToken(masaAktif,status,records_per_page) {
      $.ajax({
      url:base_url+"token/paginationToken/"+masaAktif+"/"+status+"/"+records_per_page,
   
      type:"POST",
      dataType:"TEXT",
      success:function(data){
        $('.pagination-token').empty();
        $('.pagination-token').append(JSON.parse(data));
      },error:function(){
        swal('Gagal membuat Token');
      }
    });
  }

  paginationToken(masaAktif,status,records_per_page);

  });
// onclick action
$('.add-token').click(function(){
  $('.form-token').toggle('show');
});

$('.simpan_token').click(function(){
  addtoken();
  dataTableToken.ajax.reload(null,false); 
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