<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
<section id="main" role="main">
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Daftar Testimoni</h4>
                    <!-- Trigger the modal with a button -->
                    <br>
                    <!--<a data-toggle="modal" class="btn btn-default pull-right"  "  data-target="#myModal">Tambah</a>-->
                </div>

                <table class="daftartestimoni table table-striped display responsive nowrap" style="font-size: 13px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pengirim</th>
                            <th>Testimoni</th>
                            <th>Tgl Testimoni</th>
                            <th class="text-center">Publish</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var tb_testimoni;
    $(document).ready(function () {
        tb_testimoni = $('.daftartestimoni').DataTable({
            "ajax": {
                    "url": base_url + "Testimoni/ajax_daftar_testimoni",
                "type": "POST"
            },
            "emptyTable": "Tidak Ada Data Pesan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
        });
    });

    function dropPesan(id_pesan) {
        if (confirm('Apakah Anda yakin akan menghapus data ini?')) {
            // ajax delete data to database
            console.log(base_url + "index.php/Pesan/deletePesan/" + id_pesan);
            $.ajax({
                url: base_url + "index.php/Pesan/deletePesan/" + id_pesan,
                data: "id_pesan=" + id_pesan,
                type: "POST",
                dataType: "TEXT",
                success: function (data, respone)
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
    function reload_tblist() {
        tb_testimoni.ajax.reload(null, false);
    }

</script>