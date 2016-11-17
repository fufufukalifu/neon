<div class="page-title" style="background:#2b3036">

    <div class="grid-row">

        <h1>{judul_header2}</h1>

    </div>

</div>

<style type="text/css">
    .col-md-2{
        margin: 20px;
        padding: 0;
    }
</style>

<div class="page-content grid-row">

    <main>



        <div class="grid-col-row clear-fix" >
            <div class="grid-col col-md-2">
                <div class="hover-effect"></div>
                <h5><strong>Sekolah Dasar<br></strong></h5>
                <ol>
                    <?php foreach ($pelajaran_sd as $pelajaran_items): ?>
                        <li><a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                    <?php endforeach ?>
                </ol>
            </div>


            <div class="grid-col col-md-2">
                <div class="hover-effect"></div>
                <h5><strong>SMP<br></strong></h5>
                <ol>
                    <?php foreach ($pelajaran_smp as $pelajaran_items): ?>
                        <li><a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                    <?php endforeach ?>
                </ol>
            </div>

            <div class="grid-col col-md-2">
                <div class="hover-effect"></div>
                <h5><strong>SMA<br></strong></h5>
                <ol>
                    <?php foreach ($pelajaran_sma as $pelajaran_items): ?>
                        <li><a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                    <?php endforeach ?>
                </ol>
            </div>

            <div class="grid-col col-md-2">
                <div class="hover-effect"></div>
                <h5><strong>SMA IPA<br></strong></h5>
                <ol>
                    <?php foreach ($pelajaran_sma_ipa as $pelajaran_items): ?>
                        <li><a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                    <?php endforeach ?>
                </ol>
            </div>


            <div class="grid-col col-md-2">
                <div class="hover-effect"></div>
                <h5><strong>SMA IPS<br></strong></h5>
                <ol>
                    <?php foreach ($pelajaran_sma_ips as $pelajaran_items): ?>
                        <li><a href="<?=base_url('video/daftarallvideo/') ?><?=$pelajaran_items->id ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                    <?php endforeach ?>
                </ol>
            </div>

        </div>
    </div>
</main>
</div>

<hr class="divider-color">



