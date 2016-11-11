<!-- START Template Main -->
<section id="main" role="main">
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

<!-- Start Modal konfirmasi hapus -->
<div class="modal fade" id="konfirmasiDlt" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">

    <div class="alert alert-danger ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="semibold">Anda Yakin Menghapus DATA INI?</h4>
        <p class="mb10">Silahkan cek kembali, jika anda yakin silahkan klik tombol di bawah ini untuk melanjutkan proses hapus data.</p>
        <button type="button" class="btn btn-danger btn-right" onclick="konfirmasiHapus()">hapus Data</button>
    </div>

</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <!-- START Template Container -->
    <div class="container-fluid">


        <!-- START row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-teal">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Semua Soal</h3>
                         <!-- Start menu tambah soal -->
                        <div class="panel-toolbar text-right">
                            <a class="btn btn-inverse btn-outline" href="<?= base_url(); ?>index.php/banksoal/formsoal" title="Tambah Data" ><i class="ico-plus"></i></a>
                        </div>
                         <!-- END menu tambah soal -->
                    </div>
                    <table class="table table-striped table-bordered" id="tb_allSoal" style="font-size: 13px" width="100%">
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
                                <th ></th>

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

    // tampil modal kofirmasi hapus
    function konfirmasiHapus (id_soal) {
        $('#konfirmasiDlt').modal('show');
    }
</script>