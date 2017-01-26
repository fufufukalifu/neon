
<div class="row">
  <div class="col-md-12 kirim_token">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Buat Cabang</h3> 
      </div>
      <div class="panel-body">
        <form  class="panel panel-default form-horizontal form-bordered form-cabang"  method="post" >
         <div  class="form-group">
           <label class="col-sm-2 control-label">Nama Kota</label>
           <div class="col-sm-3">
             <!-- stkt = soal tingkat -->
             <input type="text" class="form-control" name="kota">
           </div>
           <label class="col-sm-2 control-label">Alamat</label>
           <div class="col-sm-4">
             <!-- stkt = soal tingkat -->
             <textarea class="form-control" name="alamat"></textarea>
           </div>

         </div>

         <div  class="form-group">
           <label class="col-sm-1 control-label"></label>
          <a class="btn btn-primary buat_cabang" onclick="add_cabang()">Buat Cabang</a>
        </div>



      </form>
      <div  class="form-group">
        <table class="daftar_cabang table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Kota</th>
              <th>Alamat</th>
              <th>Aksis</th>

            </tr>
          </thead>

          <tbody>

          </tbody>
        </table>
        <hr>

      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
 var dataTableCabang;
 var dataTableSiswa;
 var dataRekapToken


 $(document).ready(function(){

  // TABLE TOKEN
  dataTableCabang = $('.daftar_cabang').DataTable({
    "ajax": {
      "url": base_url+"cabang/ajax_data",
      "type": "POST"
    },
    "emptyTable": "Tidak Ada Data Pesan",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    "bDestroy": true,
  });
});

 function add_cabang () {
  datas = $('.form-cabang').serialize();
  console.log(datas);

  // $.ajax({
  //   type:"POST",
  //   data:datas,
  //   dataType:"TEXT",
  //   url:base_url+"cabang/insert_cabang_ajax",
  //   sucess:function(data){
  //     console.log(data);
  //   },error:function(){
  //     console.log("dat1a");
  //   }
  // });

    $.ajax({
    url:base_url+"cabang/insert_cabang_ajax",
    data:datas,
    type:"POST",
    dataType:"TEXT",
    success:function(data){
      console.log(data);
      swal('Cabang Berhasil Di Tambahkan');
    },error:function(){
      swal('Gagal membuat Cabang');
    }
  });


 }
</script>