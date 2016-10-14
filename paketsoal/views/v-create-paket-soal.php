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
                         <!-- START PESAN ERROR EMPTY INPUT -->
                          <div class="form-group alert alert-dismissable alert-danger" id="e_paket" hidden="true" >
                            <button type="button" class="close" onclick="hide_e_paket()" >×</button>
                            <strong>O.M.G.!</strong> Silahkan Diisi Semua.
                          </div>
                          <!-- END PESAN ERROR EMPTY INPUT -->
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
                                    <input type="text" name="durasi"  class="form-control" id="durasi" required>
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
        <script type="">
    var save_method; //for save method string
    var table;
    $(document).ready(function() {
        table = $('#datatable').DataTable({ 
           "ajax": {
            "url": base_url+"index.php/paketsoal/ajax_list",
            "type": "POST"
        },
        "processing": true,
    });
    });
//panggil modal
function hide_e_paket() {
    $("#e_paket").hide();
}
function add_paket(){
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Paket Baru'); // Set Title to Bootstrap modal title
}
//fungsi simpan
function save(){
   
    
    var nama_paket= $('[name="nama_paket"]').val();
    var jumlah_soal  = $('[name="jumlah_soal"]').val();
    var durasi = $('[name="durasi"]').val();
    
    var url;

    if(save_method == 'add') {
        url = base_url+"index.php/paketsoal/addpaketsoal";
    } else {
        url = base_url+"index.php/paketsoal/updatepaketsoal";
    }
   
    if (nama_paket != "" && jumlah_soal != ""  && durasi != ""  ) {
         $('#btnSave').text('saving...'); //change button text
         $('#btnSave').attr('disabled',true); //set button disable 
             // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
             $('#modal_form').modal('hide');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable
                reload_table(); 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 

            }
        });
      
    } else {
         $("#e_paket").show();
    }
    

   

}
function reload_table(){
    table.ajax.reload(null,false); //reload datatable ajax 
}

function delete_paket(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : base_url+"index.php/paketsoal/droppaketsoal/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

function edit_paket(id)
{

    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : base_url+"index.php/paketsoal/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_paket"]').val(data.id_paket);
            $('[name="nama_paket"]').val(data.nm_paket);
            $('[name="deskripsi"]').val(data.deskripsi);
            $('[name="durasi"]').val(data.durasi);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Paket Soal'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function add_soal(id){
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_addsoal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Bank Soal'); // Set Title to Bootstrap modal title
}


</script>