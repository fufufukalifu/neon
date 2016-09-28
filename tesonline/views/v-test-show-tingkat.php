    <div class="page-content grid-row">
        <main>
            <div class="grid-col-row clear-fix">
                <div class="row">
                    <div class="container"><h1 class="text-center">Silahkan pilih tingkat untuk melakukan tes online!</h1><br></div>
                </div>
                <?php $no=1 ?>
                <?php foreach ($tingkat as $tingkatitem): ?>
                <div class="grid-col grid-col-4">
                    <div class="course-item">
                        <div class="course-hover">
                            <img src="http://placehold.it/370x280" data-at2x="http://placehold.it/370x280" alt>
                            <div class="hover-bg bg-color<?=$no?>"></div>
                            <?php $id = $tingkatitem['id'] ?>
                            <a href="<?=base_url()?>index.php/tesonline/pilihmapel/<?=$id ?>">Lihat Mata Pelajaran</a>
                        </div>
                        <div class="course-name clear-fix">
                            <center><h3 style="text-align:center"><a href=""></a></h3></center>
                        </div>
                        <div class="course-date bg-color-<?=$no?> clear-fix">
                            <div class="description"><?=$tingkatitem['namaTingkat'] ?><br></div>
                            <div class="divider"></div>
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