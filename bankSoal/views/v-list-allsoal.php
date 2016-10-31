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
                    <table class="table table-striped table-bordered" id="tb_allSoal" style="font-size: 13px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul Soal</th>
                                <th>Sumber</th>
                                <th>Mata Pelajaran</th>
                                <th>Tingkat Kesulitan</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Publish</th>
                                <!-- <th>Random</th> -->
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                           
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

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">

    var tb_allSoal;
    $(document).ready(function() {
        tb_allSoal = $('#tb_allSoal').DataTable({ 
           "ajax": {
                    "url": base_url+"index.php/banksoal/ajax_listAllSoal/",
                    "type": "POST"
                    },
            "processing": true,
        });
    });

    function dropSoal(id_soal) {
        if (confirm('Apakah Anda yakin akan menghapus data ini? ')) {
               // ajax delete data to database
               
               $.ajax({
                     url : base_url+"index.php/banksoal/deletebanksoal/"+id_soal,
                     type: "POST",
                     dataType: "TEXT",
                     success: function(data,respone)
                     {  
                       
                            reload_tblist();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                            alert('Error deleting data');
                            // console.log(jqXHR);
                            // console.log(textStatus);
                            console.log(errorThrown);
                    }
                });
             }
    }

    function reload_tblist(){
      tb_allSoal.ajax.reload(null,false); 
    }

</script>