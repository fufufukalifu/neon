<div class="row">
  <div class="col-md-12 kirim_token">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Daftar Paket TO    </h3> 

        <div class="panel-toolbar text-right">
         <div class="col-sm-4">

         </div>
         <div class="col-sm-8">

           <!-- stkt = soal tingkat -->
           <select class="form-control" name="cabang">
            <option value="all">Semua Cabang</option>
            <?php foreach ($cabang as $item): ?>
            <option value="<?=$item->id ?>"><?=$item->namaCabang ?></option>
              
            <?php endforeach ?>

          </select>
        </div>
      </div>
    </div>

    <div class="panel-body">
      <table class="daftarpaket table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
        <thead>
          <tr>
            <th>id</th>
            <th>Username</th>
            <th>Nama Paket</th>
            <th>Cabang</th>
            <th>Nama SIswa</th>
            <th>Benar</th>
            <th>Salah</th>
            <th>Kosong</th>
            <th>Poin</th>
            <th>Total</th>
            <th>Waktu Mengerjakan</th>
            
          </tr>
        </thead>

        <tbody>

        </tbody>
      </table>
    </div>

  </div>
</div>   
</div>
<script type="text/javascript">
$(document).ready(function(){

  // TABLE TOKEN
  dataTableToken = $('.daftarpaket').DataTable({
    "ajax": {
      "url": base_url+"admincabang/admincabang/laporanto",
      "type": "POST"
    },
    "emptyTable": "Tidak Ada Data Pesan",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    "bDestroy": true,
  });


});
$('select[name=cabang]').change(function(){
  data = $(this).val();
  dataTableToken = $('.daftarpaket').DataTable({
    "ajax": {
      "url": base_url+"admincabang/admincabang/laporanto/"+data,
      "type": "POST"
    },
    "emptyTable": "Tidak Ada Data Pesan",
    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
    "bDestroy": true,
  });
  })
</script>