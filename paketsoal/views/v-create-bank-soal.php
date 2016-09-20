<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Buat Paket Soal Baru</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">

                    <div class="alert alert-dismissable alert-success hide" id="message">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span>Data Berhasil <strong>Disimpan</strong></span>
                    </div>

                    <div class="alert alert-dismissable alert-danger hide" id="messageerror">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <span>Data ada yang <strong>Kosong</strong></span>
                    </div>



                    <form class="panel panel-default" method="post">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="ico-package"></i>Form Paket Soal</h3>
                        </div>               
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label">Nama Paket <span class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <input type="text" name="nama_paket" class="form-control" placeholder="First" id="namaPaket">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label">Deskripsi <span class="text-danger">*</span></label>
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
                                        <select name="jumlah_soal" class="form-control"  id="jumlahSoal">
                                            <option value=NULL>-Pilih Jumlah Soal-</option>
                                            <?php for ($i=10;$i<=60;$i++): 
                                            if ($i % 5 ==0) { ?>
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
                                <button type="submit" class="btn btn-primary" name="proses" id="add" >Proceed</button>
                                <button type="reset" class="btn btn-inverse" id="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <form class="panel panel-default" action="" data-parsley-validate>
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="ico-books"></i>Daftar Paket Soal</h3>
                        </div>               
                        <div class="panel-body">
                            <table class="table table-striped" style="font-size: 13px" id="zero-configuration">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Nama Paket Soal</th>
                                        <th>Jumlah soal</th>
                                        <th class="text-center">Durasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($paket_soal as $paket_soals): ?>
                                    <tr>
                                        
                                            <td><?=$paket_soals['id_paket'] ?></td>
                                            <td><?=$paket_soals['nm_paket'] ?></td>
                                            <td><?=$paket_soals['jumlah_soal'] ?></td>
                                            <td><?=$paket_soals['durasi'] ?></td>
                                        <?php endforeach ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>