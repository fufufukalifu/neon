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
                        <input type="hiden" value="<?=$mapelitem['tingpelID'] ?>" class="hide" name="tingpel">
                        <button type="submit" class="kirim<?=$mapelitem['tingpelID']?>">kirim</button>
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
    alert(id);
    var kirim = ".kirim"+id;
    $(kirim).click();
}
</script>