<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?=$panelheading ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="container">
                        <div class="col-sm-6">
                            <div class="panel panel-default"/>
                            <div class="panel-heading">
                                <h3 class="panel-title">Daftar Soal</h3>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <div class="form-group">

                                        <div class="col-sm-12">
                                            <div class="col-sm-2">
                                                Filter:
                                            </div>
                                            <div class="col-sm-3">
                                                <select name="" id="tingkat" class="form-control">
                                                    <option value="">Tingkat</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select name="" id="pelajaran" class="form-control">
                                                    <option value="">Pelajaran</option>
                                                </select>
                                                <br>
                                            </div>
                                            <div class="col-sm-3">
                                                <select name="" id="bab" class="form-control">
                                                    <option value="">Bab</option>
                                                </select>
                                                <br>
                                            </div>
                                            <div class="col-sm-1">
                                                <a onclick="addsoal()" class="btn btn-primary"><i class="ico ico-file-plus" title="Set soal"></i></a>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="col-sm-2">Soal:</div>
                                                <div class="col-sm-10 soal">

                                                   <span class="checkbox custom-checkbox custom-checkbox-inverse">
                                                    <input type="checkbox" name="customcheckbox1" id="customcheckbox1">
                                                    <label for="customcheckbox1">&nbsp;&nbsp;Checkbox 1</label>
                                                </span><br>
                                                <span class="checkbox custom-checkbox">
                                                    <input type="checkbox" name="customcheckbox2" id="customcheckbox2">
                                                    <label for="customcheckbox2">&nbsp;&nbsp;Checkbox 2</label>

                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default"/>
                    <div class="panel-heading">
                        <h3 class="panel-title">Soal Yang Ditambahkan</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<script>
    // Script for getting the dynamic values from database using jQuery and AJAX
    $(document).ready(function() {
        $('#eTingkat').change(function() {

            var form_data = {
                name: $('#eTingkat').val()
            };

            $.ajax({
                url: "<?php echo site_url('videoback/getPelajaran'); ?>",
                type: 'POST',
                data: form_data,
                success: function(msg) {
                    var sc='';
                    $.each(msg, function(key, val) {
                        sc+='<option value="'+val.id+'">'+val.keterangan+'</option>';
                    });
                    $("#ePelajaran option").remove();
                    $("#ePelajaran").append(sc);
                }
            });
        });
    });


// function loadmatapelajaran(){

// }

//buat load tingkat
function loadTingkat(){
    jQuery(document).ready(function(){
        var tingkat_id = {"tingkat_id" : $('#tingkat').val()};
        var idTingkat;

        $.ajax({
            type: "POST",
            data: tingkat_id,
            url: "<?= base_url() ?>index.php/videoback/getTingkat",

            success: function(data){
                //console.log("Data"+data); 
                $('#tingkat').html('<option value="">Tingkat</option>');
                $.each(data, function(i, data){
                    $('#tingkat').append("<option value='"+data.id+"'>"+data.aliasTingkat+"</option>");
                    return idTingkat=data.id;
                });
            }
        });
        
        $('#tingkat').change(function(){
            tingkat_id={"tingkat_id" : $('#tingkat').val()};
            loadPelajaran($('#tingkat').val());
        })

        $('#pelajaran').change(function(){
            pelajaran_id = {"pelajaran_id":$('#pelajaran').val()};
            load_bab($('#pelajaran').val());
        })

    })};

    //buat load pelajaran
    function loadPelajaran(tingkatID){
        $.ajax({
            type: "POST",
            data: tingkatID.tingkat_id,

            url: "<?php echo base_url() ?>index.php/videoback/getPelajaran/"+tingkatID,
            success: function(data){
                $('#pelajaran').html('<option value="">Mata Pelajaran</option>');
                $.each(data, function(i, data){
                    $('#pelajaran').append("<option value='"+data.id+"'>"+data.keterangan+"</option>");
                });
            }
        });
    }
    //buat load bab
    function load_bab(mapelID){
        $.ajax({
            type: "POST",
            data: mapelID.mapel_id,
            url: "<?php echo base_url() ?>index.php/videoback/getBab/"+mapelID,
            success: function(data){

                $('#bab').html('<option value="">Bab Pelajaran</option>');
                //console.log(data);
                $.each(data, function(i, data){
                    $('#bab').append("<option value='"+data.id+"'>"+data.judulBab+"</option>");
                });
            }

        });
    }

    function addsoal(){
        var id_bab = {"banksoal":$('#bab').val()};
       // console.log(id_bab.banksoal);

        $.ajax({
            type: "POST",
            dataType:"JSON",
            url: base_url+"index.php/paketsoal/ajax_get_soal_by_bab/"+id_bab.banksoal,
            success: function(data){
                $.each(data, function(key, value){
                    console.log(value);
                });

            }        
        });

    }



    loadTingkat();
    </script>