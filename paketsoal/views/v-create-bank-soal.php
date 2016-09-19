<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Buat Paket Soal Baru</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
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
                                        <input type="text" name="nama_paket" class="form-control" placeholder="First" required id="namaPaket">
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
                                        <textarea class="form-control" required name="deskripsi" id="deskripsi"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="control-label">Jumlah Soal <span class="text-danger">*</span></label>
                                        <select name="jumlah_soal" class="form-control" parsley-required="true" id="jumlahSoal">
                                            <option value="">-Pilih Jumlah Soal-</option>
                                            <?php for ($i=10;$i<=60;$i++): 
                                            if ($i % 5 ==0) { ?>
                                            <option value=""><?=$i ?></option>

                                            <?php } endfor ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label">Durasi <span class="text-danger">*</span></label>
                                        <input name="durasi" type="text" class="form-control" data-parsley-type="email" required id="durasi">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary" name="proses" id="add" >Proceed</button>
                                <button type="reset" class="btn btn-inverse">Reset</button>
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
                           <table>

                           </table>
                       </div>
                   </form>
               </div>

           </div>
       </div>
   </div>
</div>



<script type="text/javascript">

// Ajax post

$(document).ready(function() {
    $("#add").click(function(event) {
        var nm_paket =$('#namaPaket').val();
        var deskripsi =$('#deskripsi').val();
        var jumlah_soal =$('#jumlahSoal').val();
        var durasi =$('#durasi').val();
        var url = "<?php echo base_url(); ?>" + "index.php/paketsoal/addpaketsoal";
        console.log(url);
        jQuery.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: {nama_paket: nm_paket, jumlah_soal:jumlah_soal,durasi: durasi},
            success: function(res) {
                if (res)
                {
                    console.log(data);
                }
            }
        });
    });
});
</script>