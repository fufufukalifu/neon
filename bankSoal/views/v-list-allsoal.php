
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">


        <!-- START row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Soal</h3>

                    </div>
                    <table class="table table-striped" id="zero-configuration" style="font-size: 13px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul Soal</th>
                                <th>Sumber</th>
                                <th>Mata Pelajaran</th>
                                <th>Tingkat Kesulitan</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Pilihan A</th>
                                <th>Pilihan B</th>
                                <th>Pilihan C</th>
                                <th>Pilihan D</th>
                                <th>Pilihan E</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($soal as $row): 
                                $UUID=$row['UUID'];
                                $id_subbab=$row['id_subbab'];
                            ?>
                                <tr>
                                    <td ><?= $row['id_soal']; ?></td>
                                    <td><?=$row['judul_soal'];?></td>
                                    <td><?= $row['sumber']; ?></td>
                                    <td><?= $row['keterangan']; ?></td>
                                    <td><?php
                                        $kesulitan = $row['kesulitan'];
                                        if ($kesulitan == '1') {
                                            echo "Mudah";
                                        } else if ($kesulitan == '2') {
                                            echo "Sedang";
                                        } else {
                                            echo "Sulit";
                                        }
                                        ?></td>
                                    <td><?= $row['soal']; ?></td>
                                    <td><?=
                                        $row['jawaban'];

                                        $i = $row['id_soal'];
                                        ?></td>
                                    <?php foreach ($pilihan as $row): ?>
                                        <?php
                                        if ($row['pilid'] == $i) {
                                            ?>
                                            <td><?= $row['piljawaban']; ?></td>
                                            <?php
                                        } else {
                                            
                                        }
                                        ?>
                                    <?php endforeach ?>
                                    <td>

                                            <form action="<?= base_url(); ?>index.php/banksoal/formUpdate" method="get">

                                                <input type="text" name="UUID" value="<?= $UUID ?>"  hidden="true">
                                                <input type="text" name="subBab" value="<?= $id_subbab  ?>" hidden="true">
                                                <button type="submit" class="btn btn-default"><i class="ico-file5"></i></button>

                                            </form>
                                        </div>

                                        
                                    </td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ END row -->

    </div>
    <!--/ END Template Container -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
    <!--/ END To Top Scroller -->

</section>
<!--/ END Template Main -->
<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery-migrate.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/library/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/library/core/js/core.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/sparkline/js/jquery.sparkline.min.js') ?>"></script>



<script type="text/javascript" src="<?= base_url('assets/javascript/app.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/js/jquery.datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/tabletools/js/tabletools.min.js') ?>"></script>
<!--<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/tabletools/js/zeroclipboard.js') ?>"></script>-->
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/js/jquery.datatables-custom.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/javascript/tables/datatable.js') ?>"></script>

<script type="text/javascript">
    var table = $('#datatable').DataTable();
//fungsi untuk hapus
    $('#datatable tbody').on('click', 'button#hapusBtn', function () {
        table
                .row($(this).parents('tr'))
                .remove()
                .draw();
        console.log('masuk');

        var id_soal = $(this).data("id");
        var url = base_url + "index.php/banksoal/deleteBanksoal/" + id_soal;

        $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            cache: false,
            success:
                    function (data) {
                        // alert(data);
                    }
        });

    });
</script>