<!-- START Head -->
<head>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
    <!--/ Plugins stylesheet -->
</head>
<!--/ END Head -->
<!-- konten -->
<section id="main" role="main">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10" style="padding-left: 30px;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Video Yang Telah Anda Upload</h3>
                    </div>
                    <table class="table table-striped" id="zero-configuration" style="font-size: 14px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul Video</th>
                                <th>Nama File</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($videos_uploaded as $videos): ?>
                                <tr>
                                    <?php
                                    $i = 1;
                                    $i++;
                                    ?>
                                    <?php // print_r($videos) ?>
                                    <td><?= $i ?></td>
                                    <td>Judul Video</td>
                                    <td>Nama File</td>
                                    <td><p>Deskripsi</p></td>
                                    <td class="text-center">
                                        <span><a href="javascript:void(0);" title="Edit"><i class="icon ico-pencil"></i></a></span>&nbsp  &nbsp
                                        <span><a href="javascript:void(0);" title="Delete"class="text-danger"><i class="icon ico-remove3"></i></a></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
    <!--START To Top Scroller--> 
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
    <!--/ END To Top Scroller--> 

</section>


<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- Library script : mandatory -->
<script type="text/javascript" src="../library/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="../library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="../library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../library/core/js/core.min.js"></script>
<script type="text/javascript" src="../plugins/sparkline/js/jquery.sparkline.min.js"></script><!-- will be use globaly as a summary on sidebar menu -->

<!--/ Library script -->

<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/library/jquery/js/jquery-migrate.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/library/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/library/core/js/core.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/sparkline/js/jquery.sparkline.min.js') ?>"></script>



<script type="text/javascript" src="<?= base_url('assets/javascript/app.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/js/jquery.datatables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/tabletools/js/tabletools.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/tabletools/js/zeroclipboard.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugins/datatables/js/jquery.datatables-custom.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/javascript/tables/datatable.js') ?>"></script>


<!--/ App and page level script -->
<!--/ END JAVASCRIPT SECTION -->
</body>
<!--/ END Body -->


