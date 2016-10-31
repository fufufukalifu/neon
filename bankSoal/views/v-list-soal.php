<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Template Container -->
    <div class="container-fluid">


        <!-- START row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3 class="panel-title">Daftar Soal Berdasarkan Subbab</h3>
                        <form action="<?= base_url(); ?>index.php/banksoal/formsoal" method="get">
                            <input type="text" name="subBab" id="subBabID" value="<?= $subBab; ?>" hidden="true" >
                            <button title="Tambah Data" type="submit" class="btn btn-default pull-right"  style="margin-top:-30px;"><i class="ico-plus"></i></button>    
                        </form>
                        <hr>

                    </div>
                    <table class="table table-striped" id="tb_soalsub" style="font-size: 13px">
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
<!-- Start Math jax -->
  <script type="text/x-mathjax-config">
MathJax.Hub.Config({
  tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
});
</script>
  <script type="text/javascript" async
  src="<?= base_url('assets/plugins/MathJax-master/MathJax.js?config=TeX-MML-AM_HTMLorMML') ?>">
</script>
<!-- end Math jax -->

<script type="text/javascript">

    var tblist_TO;
    var subBab =$('#subBabID').val();
    // var idTo =$('#id_to').val();
  
    $(document).ready(function() {
        tblist_TO = $('#tb_soalsub').DataTable({ 
           "ajax": {
                    "url": base_url+"index.php/banksoal/ajax_soalPerSub/"+subBab,
                    "type": "POST"
                    },
            "processing": true,
        });
    });


    function dropSoal(id_soal) {

        if (confirm('Apakah Anda yakin akan menghapus data inis? ')) {
               // ajax delete data to database
               console.log(id_soal);
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
      tblist_TO.ajax.reload(null,false); 
    }

</script>