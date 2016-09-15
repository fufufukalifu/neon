<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
<!-- konten -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title">Daftar Mata Pelajaran</h5>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal" style="margin-top:-30px;" >Tambah Data</button>
                <br>
                <!--<a data-toggle="modal" class="btn btn-default pull-right"  "  data-target="#myModal">Tambah</a>-->
            </div>
            <table class="table table-striped" id="zero-configuration" style="font-size: 13px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Alias</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mapels as $mapel): ?>
                        <tr>
                            <td><?= $mapel->id ?></td>
                            <td><?= $mapel->namaMataPelajaran ?></td>
                            <td><?= $mapel->aliasMataPelajaran ?></td>
                            <td class="text-center"> Delete</td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Mata Pelajaran</h4>
            </div>
            <form action="<?= site_url('Matapelajaran/tambahpelajaran') ?>" method="post">

                <div class="modal-body">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="ico-notebook"></i></span>
                        <input name="nama" type="text" class="form-control" placeholder="Nama Mata Pelajaran" required> <br>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="ico-file-upload"></i></span>
                        <input name="nohp" type="text" class="form-control"  placeholder="Alias" required> <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--<div class="row">
    <div class="col-md-12">
         tab 
        <ul class="nav nav-tabs">
            <li class="active"><a href="#SD" data-toggle="tab">SD</a></li>
            <li><a href="#SMP" data-toggle="tab">SMP</a></li>
            <li><a href="#SMA" data-toggle="tab">SMA</a></li>
            <li><a href="#SMK" data-toggle="tab">SMK</a></li>
        </ul>
        / tab 
         tab content 
        <div class="tab-content panel">
            <div class="tab-pane active" id="SD">
                <table class="table table-striped" id="mapelsmp" style="font-size: 14px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Alias</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($mapels as $mapel): ?>
                                                                                            <tr>
                                                                                                <td><?= $mapel->id ?></td>
                                                                                                <td><?= $mapel->namaMataPelajaran ?></td>
                                                                                                <td><?= $mapel->aliasMataPelajaran ?></td>
                                                                                                <td class="text-center"> Delete</td>

                                                                                            </tr>
<?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="SMP">

            </div>
            <div class="tab-pane" id="SMA">

            </div>
            <div class="tab-pane" id="SMK">

            </div>
        </div>
        / tab content 
    </div>
</div>
-->

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