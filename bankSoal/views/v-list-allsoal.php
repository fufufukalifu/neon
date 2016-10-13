
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
                    <table class="table table-striped" id="tb_allSoal" style="font-size: 13px">
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
                                <th>Random</th>
                                <th>Aksi</th>
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


<script type="text/javascript">
//     var table = $('#datatable').DataTable();
// //fungsi untuk hapus
//     $('#datatable tbody').on('click', 'button#hapusBtn', function () {
//         table
//                 .row($(this).parents('tr'))
//                 .remove()
//                 .draw();
//         console.log('masuk');

//         var id_soal = $(this).data("id");
//         var url = base_url + "index.php/banksoal/deleteBanksoal/" + id_soal;

//         $.ajax({
//             type: "POST",
//             url: url,
//             dataType: "json",
//             cache: false,
//             success:
//                     function (data) {
//                         // alert(data);
//                     }
//         });

//     });

    var tb_allSoal;
    $(document).ready(function() {
        tblist_TO = $('#tb_allSoal').DataTable({ 
           "ajax": {
                    "url": base_url+"index.php/bankSoal/ajax_listAllSoal/",
                    "type": "POST"
                    },
            "processing": true,
        });
    });

    function dropSoal() {
        alert('masuk drop soal');
    }
</script>