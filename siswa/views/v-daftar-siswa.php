<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
<section id="main" role="main">
    <div class="row">
        <div class="col-md-12"><br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Daftar Siswa</h4>
                    <!-- Trigger the modal with a button -->
                    <button title="Tambah Data" type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#myModal" style="margin-top:-30px;" ><i class="ico-plus"></i></button>
                    <br>
                    <!--<a data-toggle="modal" class="btn btn-default pull-right"  "  data-target="#myModal">Tambah</a>-->
                </div>
                <table class="daftarguru table table-striped mt15" style="font-size: 13px">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Id siswa</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Pengguna</th>
                            <th>Tanggal Daftar</th>
                            <th>Email</th>
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
    $(document).ready(function () {
        url = base_url + "siswa/ajax_daftar_siswa";
        $('.daftarguru').DataTable({
            "ajax": {
                "url": url,
                "type": "POST"
            },
            "emptyTable": "Tidak Ada Data Siswa",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
        });

    });
</script>