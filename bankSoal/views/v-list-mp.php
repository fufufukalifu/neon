        <!-- START Template Main -->
        <section id="main" role="main">
            <!-- START Template Container -->
            <div class="container-fluid">

                <!-- START row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        <!--Start untuk menampilkan nama tabel -->
                            <div class="panel-heading">
                                <?php foreach ($tingkat as $row): 
                                    $id=$row['id'];
                                    if($tingkatID==$id){
                                ?>

                                <h3 class="panel-title">Silahkan pilih mata pelajaran pada List Mata Pelajaran <?=$row['aliasTingkat'];?> di bawah ini! </h3>
                                <?php
                                    } 
                                endforeach ?>
                            </div>
                        <!--END untuk menampilkan nama tabel -->

                            <table class="table table-striped" id="zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Lihat Bab</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($pelajaran as $row): ?>
                                    <tr>
                                        <td><?= $row['id'];?></td>
                                        <td><?= $row['keterangan']; ?></td>
                                        <td><a href="<?=base_url();?>index.php/banksoal/listbab/<?=$row['id'];?>" class="label label-primary">Lihat Bab</a></td>
                                       



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