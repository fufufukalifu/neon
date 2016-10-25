<div class="page-content grid-row">
    <main>

        <div class="grid-col-row clear-fix" >
            <div class="grid-col grid-col-3">
                <div class="hover-effect"></div>
                <h5><strong>Sekolah Dasar<br></strong></h5>
                <ol>
                    <?php foreach ($pelajaran_sd as $pelajaran_items): ?>
                    <li><a href="../index.php/video/daftarvideo/<?= $pelajaran_items->aliasMataPelajaran ?>/<?= $pelajaran_items->aliasTingkat ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
                <?php endforeach ?>
            </ol>
        </div>

        <div class="grid-col grid-col-3">
            <div class="hover-effect"></div>
            <h5><strong>Sekolah Menengah Pertama<br></strong></h5>
            <ol>
                <?php foreach ($pelajaran_smp as $pelajaran_items): ?>
                <li><a href="../index.php/video/daftarvideo/<?= $pelajaran_items->aliasMataPelajaran ?>/<?= $pelajaran_items->aliasTingkat ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
            <?php endforeach ?>
        </ol>
    </div>

    <div class="grid-col grid-col-3">
        <div class="hover-effect"></div>
        <h5><strong>Sekolah Menengah Atas IPA<br></strong></h5>
        <ol>
            <?php foreach ($pelajaran_smk as $pelajaran_items): ?>
            <li><a href="../index.php/video/daftarvideo/<?= $pelajaran_items->aliasMataPelajaran ?>/<?= $pelajaran_items->aliasTingkat ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
        <?php endforeach ?>
    </ol>
</div>

<div class="grid-col grid-col-3">
    <div class="hover-effect"></div>
    <h5><strong>Sekolah Menengah Atas IPS<br></strong></h5>
    <ol>
        <?php foreach ($pelajaran_sma as $pelajaran_items): ?>
        <li><a href="../index.php/video/daftarvideo/<?= $pelajaran_items->aliasMataPelajaran ?>/<?= $pelajaran_items->aliasTingkat ?>"  class="text-info"><?= $pelajaran_items->namaMataPelajaran ?></a></li>
        
    <?php endforeach ?>
</ol>
</div>

</div>
</main>
</div>
<hr class="divider-color">

