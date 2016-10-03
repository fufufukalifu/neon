    <div class="modal fade " tabindex="-1" role="dialog" id="myModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
            <form class="form-group">
                <p class="has-success">
                    <select class="form-control" name="tingkat" id="gettkt"><option>-Pilih Tingkat-</option></select>
                </p>
                <p class="has-success">
                   <select class="form-control" name="tingkat" id="gettkt"><option>-Pilih Tingkat-</option></select>                       
               </p>
               <p class="has-success">
                   <select class="form-control" name="tingkat" id="gettkt"><option>-Pilih Tingkat-</option></select>                   
               </p>

           </form>

       </div>
       <div class="modal-footer bg-color-3">
        <button type="button" class="cws-button bt-color-1 border-radius alt small" data-dismiss="modal">Batal</button>
        <button type="button" class="cws-button bt-color-2 border-radius alt small">Mulai Latihan</button>
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
function submit(id){
   //passing data to modals.
   var idTingkatPel = $('.kirim'+id).data('todo').id;
   var namaPelajaran =  $('.kirim'+id).data('todo').namapelajaran;
   $('#myModal').modal('show');
   $('.modal-title').text('Mulai Latihan untuk pelajaran '+namaPelajaran);


    // alert(id);
    // var kirim = ".kirim"+id;
    // $(kirim).click();

}
</script>