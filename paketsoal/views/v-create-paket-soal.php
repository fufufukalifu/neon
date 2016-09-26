<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Paket Soal Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" value="" name="id_paket"/>
                                <div class="col-sm-12">
                                    
                                    <label class="control-label">Nama Paket <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <span class="text-danger"><?php echo form_error('nama_paket'); ?></span>
                                    <input type="text" name="nama_paket" class="form-control" placeholder="First" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label">Deskripsi </span></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="control-label">Jumlah Soal <span class="text-danger">*</span></label>
                                    <select name="jumlah_soal" class="form-control" required>
                                        <option value="">-Pilih Jumlah Soal-</option>
                                        <?php for ($i=10;$i<=40;$i++): 
                                        if ($i % 10 ==0) { ?>
                                        <option value=<?=$i ?>><?=$i ?></option>
                                        <?php } endfor ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label">Durasi <span class="text-danger">*</span></label>
                                    <input name="durasi" type="text" class="form-control" id="durasi">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" name="proses" id="btnSave" onclick="save()" >Proses</button>
                            <button type="reset" class="btn btn-inverse" id="btnReset">reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>

<div class="modal fade" id="modal_addsoal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Paket Soal Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="panel-body">

                        
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" name="proses" id="btnSave" onclick="save()" >Proses</button>
                            <button type="reset" class="btn btn-inverse" id="btnReset">reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Paket Soal        
                </div>

                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <form class="panel panel-default" action="" data-parsley-validate>
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="ico-books"></i>Daftar Paket Soal</h3>
                                    <a onclick="add_paket()" class="btn btn-primary"><i class="glyphicon glyphicon-plus" title="Add Paket Soal"></i></a>
                                    <a onclick="reload_table()" class="btn btn-success"><i class="glyphicon glyphicon-refresh" title="Refresh"></i></a>
                                    <hr>
                                </div>               
                                <div class="panel-body">
                                    <table class="table table-striped table-bordered" style="font-size: 13px" id="datatable" >
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Nama Paket Soal</th>
                                                <th>Jumlah soal</th>
                                                <th class="text-center">Durasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Nama Paket Soal</th>
                                                <th>Jumlah soal</th>
                                                <th class="text-center">Durasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>


                                    </table>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
