    <div class="modal fade " tabindex="-1" role="dialog" id="myModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
            <form class="form-group" id="form" method="post" action="<?=base_url() ?>/index.php/latihan/tambah_latihan_ajax">
              <p class="has-success">
                <label>Bab</label>
                <select class="form-control" name="tingkat" id="babSelect"><option>-Pilih Bab-</option></select>
              </p>
              <p class="has-success">
                <label >Sub Bab</label>
                <select class="form-control" name="subab" id="subSelect"><option>-Pilih Sub-</option></select>                       
              </p>
              <p class="has-success">
                <label>Tingkat Kesulitan</label>
                <select class="form-control" name="tingkat_kesulitan">
                  <option>-Pilih Tingkat Kesulitan-</option>
                  <option value="mudah">Mudah</option>
                  <option value="sedang">Sedang</option>
                  <option value="sulit">Sulit</option>
                </select>                       
              </p>
              <p class="has-success">
                <label>Jumlah Soal</label>
                <select class="form-control" name="jumlah_soal">
                  <option value="">-Pilih Jumlah Soal-</option>
                  <option value="10">10</option>
                  <option value="20">20</option>
                  <option value="30">30</option>
                </select>                       
              </p>
          <div class="modal-footer bg-color-3">
            <button type="button" class="cws-button bt-color-1 border-radius alt small" data-dismiss="modal">Batal</button>
            <button type="submit" class="cws-button bt-color-2 border-radius alt small mulai-btn" onclick="mulai()">Mulai Latihan</button>
          </div>
            </form>

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>

    <div class="page-content grid-row">
      <main>
        <div class="grid-col-row clear-fix">
          <div class="row">
            <div class="container"><h1 class="text-center">Sekarang pilih Matapelajaran untuk memulai!</h1><br></div>

          </div>
          <?php $no=1 ?>
          <?php foreach ($mapel as $mapelitem): ?>
          <div class="grid-col grid-col-4">
            <form action="<?=base_url() ?>index.php/tesonline/mulai" method="post" class="hide">
              <input type="hiden" value="<?=$mapelitem['tingpelID'] ?>" class="hide" name="id">
              <button type="submit" class="kirim<?=$mapelitem['tingpelID']?>" 
               data-todo='{"id":"<?=$mapelitem['tingpelID'] ?>","namapelajaran":"<?=$mapelitem['namaMataPelajaran'] ?>"}'
               >kirim</button>
             </form>
             <div class="course-item">
              <div class="course-hover">
                <img src="http://placehold.it/370x280" data-at2x="http://placehold.it/370x280" alt>
                <div class="hover-bg bg-color<?=$no?>"></div>
                <a href="javascript:submit(<?=$mapelitem['tingpelID'] ?>);">mulai tesonline!</a>
              </div>


              <div class="course-name clear-fix">
                <center><h3 style="text-align:center"><a href=""></a></h3></center>
              </div>
              <div class="course-date bg-color-<?=$no?> clear-fix">
                <div class="description"><?=$mapelitem['namaMataPelajaran'] ?><br></div>

                <div class="divider"></div>
                <p><?=$mapelitem['keterangan'] ?></p>
              </div>
            </div>
          </div>
          <?php $no++; ?>
        <?php endforeach ?>
      </div>
    </main>
    <br>
    <hr class="divider-color">
  </div>
  <script type="text/javascript">
  $('#babSelect').change(function () {
    load_sub($('#babSelect').val());
  // loadPel(idTingkat);
});

  function submit(id){
   //passing data to modals.
   var tingPelID = $('.kirim'+id).data('todo').id;
   //untuk ditampilkan di modal
   var namaPelajaran =  $('.kirim'+id).data('todo').namapelajaran;
   $('#myModal').modal('show');
   $('.modal-title').text('Mulai Latihan untuk pelajaran '+namaPelajaran);
   load_bab(tingPelID);
 }

    //fungsi untuk ngeload bab berdasarkan tingkat-pelajaran id
    function load_bab(tingPel){
      // console.log('masduk')
      var babID;
      $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>index.php/matapelajaran/get_bab_by_tingpel_id/"+tingPel,
        success: function(data){
          $('#babID').html('<option value="">Bab Pelajaran</option>');
          $.each(data, function(i, data){
            $('#babSelect').append("<option value='"+data.id+"'>"+data.judulBab+"</option>");
            babid=data.id;
          });
        }

      });
      return 
    }

    function load_sub(babID){
      $.ajax({
        type: "POST",
        data: babID.bab_id,
        url: "<?php echo base_url() ?>index.php/videoback/getSubbab/"+babID,
        success: function(data){
          $('#subSelect').html('<option value="">-- Pilih Sub Bab Pelajaran  --</option>');
          // console.log(data);
          $.each(data, function(i, data){
            $('#subSelect').append("<option value='"+data.id+"'>"+data.judulSubBab+"</option>");
          });
        }

      });
    }

    function mulai(){
    var sub_bab_id = $('#subSelect').val();
    $('.mulai-btn').text('saving...'); //change button text
    $('.mulai-btn').attr('disabled',true); //set button disable 
    url = "<?php echo base_url() ?>index.php/latihan/tambah_latihan_ajax";
    
    // ajax adding data to database
// console.log($('#form').serialize());
    $.ajax({
      url : url,
      type: "POST",
      data: $('#form').serialize(),
      dataType: "JSON",
      success: function(data)
      {
           // alert('masuk');
           $('#myModal').modal('hide');
            $('.mulai-btn').text('save'); //change button text
            $('.mulai-btn').attr('disabled',false); //set button enable 
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
        console.log($('#form').serialize());
            
            alert('Error adding / update data');
            $('.mulai-btn').text('save'); //change button text
            $('.mulai-btn').attr('disabled',false); //set button enable 

          }
        });
  }

  </script>