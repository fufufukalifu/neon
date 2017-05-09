<!-- Start Modal salah upload gambar -->
<div class="modal fade" id="cekInput" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title text-center text-danger">Peringatan</h2>
      </div>
      <div class="modal-body">
        <h3 class="text-center">Silahkan pilih nama cabang, nama tryout dan nama paket ! </h3>
        <!-- <h5 class="text-center">Type yang bisa di upload hanya ".jpg", ".jpeg", ".bmp", ".gif", ".png"</h5> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
  <div class="col-md-12 kirim_token">
    <div class="panel panel-teal">
      <div class="panel-heading">
        <h3 class="panel-title">Daftar Laporan </h3> 
        <div class="panel-toolbar text-right">
        <div class="col-md-11">

          <div class="col-sm-4">
            <select class="form-control" name="tingkat_pel">
              <option value="all">Semua Tingkat</option>
              <option value="SD">SD</option>
              <option value="SMP">SMP</option>
              <option value="SMA">SMA</option>
            </select>
          </div>

        <div class="kelas col-sm-4">
          <select class="form-control col-sm-6" name="kelas">
            <option value="all">Semua Kelas</option>
          </select>
        </div>

         <div class="col-sm-4" id="cabang">
             <select class="form-control" name="cabang">
              <option value="all">Semua Cabang</option>
              <?php foreach ($cabang as $item): ?>
                <option value="<?=$item->id ?>"><?=$item->namaCabang ?></option>
              <?php endforeach ?>
            </select>
          </div>

        </div>
    </div>

</div>

<div class="panel-body">
  <table class="daftarpaket table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Orang Tua</th>
        <th>Nama Siswa</th>
        <th>Username</th>
        <th>Cabang</th>
        <th>Tingkat</th>
        <th>Message</th>
         <th>Aksi</th>
      </tr>
    </thead>

    <tbody>

    </tbody>
  </table>
  <div class="col-sm-12 btn">

  <div class="col-sm-2">

   <br>

   <input class="btn btn-primary tambahsoal" type="button" value="Send"/>

 </div>

</div>
</div>

</div>
</div>   
</div>
<script type="text/javascript">
$(document).ready(function(){
  var mySelect = $('select[name=cabang]').val();
  dataTablePaket = $('.daftarpaket').DataTable({
    "ajax": {
      "url": base_url+"laporanortu/laporanortu_ajax",
      "type": "POST"
    },
    "emptyTable": "Tidak Ada Data Pesan",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    "bDestroy": true,
  });


});


// CABANG KETIKA DI CHANGE
$('select[name=cabang]').change(function(){

  cabang = $('select[name=cabang]').val();
  tingkat = $('select[name=tingkat_pel]').val();
  kelas = $('select[name=kelas]').val();

  url = base_url+"laporanortu/laporanortu_ajax/"+cabang+"/"+tingkat+"/"+kelas;

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


// TINGKAT KETIKA DI CHANGE
$('select[name=tingkat_pel]').change(function(){
  cabang = $('select[name=cabang]').val();
  tingkat = $('select[name=tingkat_pel]').val();
  kelas = $('select[name=kelas]').val();

  url = base_url+"laporanortu/laporanortu_ajax/"+cabang+"/"+tingkat+"/"+kelas;

  dataTablePaket = $('.daftarpaket').DataTable({
    "ajax": {
      "url": url,
      "type": "POST"
    },
    "emptyTable": "Tidak Ada Data Pesan",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    "bDestroy": true,
  });

  load_kelas(tingkat);

});

// LOAD KELAS
function load_kelas(tingkat){
 $.ajax({
  type: "POST",
  url: "<?php echo base_url() ?>laporanortu/get_kelas/"+tingkat,
  success: function(data){
   $('select[name=kelas]').html('<option value="all">-- Pilih Kelas  --</option>');

   $.each(data, function(i, data){
    $('select[name=kelas]').append("<option value='"+data.aliasTingkat+"'>"+data.aliasTingkat+"</option>");
  });
 }

});
}

// KELAS KETIKA DI CHANGE
$('select[name=kelas]').change(function(){

  cabang = $('select[name=cabang]').val();
  tingkat = $('select[name=tingkat_pel]').val();
  kelas = $('select[name=kelas]').val();
  console.log(kelas);

  url = base_url+"laporanortu/laporanortu_ajax/"+cabang+"/"+tingkat+"/"+kelas;

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
  cabang = $('select[name=cabang]').val();
  tryout = $('select[name=to]').val();
  paket = $('select[name=paket]').val();
  if (cabang != "all" && tryout != "all" && paket != "all") {
      url = base_url+"admincabang/admincabang/laporanPDF/"+cabang+"/"+tryout+"/"+paket;
      window.open(url, '_blank');
  }else{
    $("#cekInput").modal("show");
  }
}

// ketika klik hapus report
function drop_report(datas){
  url = base_url+"admincabang/drop_report";

  swal({
    title: "Yakin akan hapus report?",
    text: "Anda tidak dapat membatalkan ini.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya,Tetap hapus!",
    closeOnConfirm: false
  },
  function(){
    $.ajax({
      dataType:"text",
      data:{id_report:datas},
      type:"POST",
      url:url,
      success:function(){
        swal("Terhapus!", "Data report berhasil dihapus.", "success");
        dataTablePaket.ajax.reload(null,false);
      },
      error:function(){
        sweetAlert("Oops...", "Data gagal terhapus!", "error");
      }
    });
  });
}
</script>
