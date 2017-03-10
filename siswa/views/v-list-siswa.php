<?php
//============================================================+
// File name   : v-list-siswa.php
// Begin       : 2017-03-08
// Last Update : -
//
// Description : List pagination siswa
//               Untuk menggantikan v-daftar-siswa yg berupa datatable
//
// Author: MrBebek
//
// (c) Copyright:
//               MrBebek
//               neonjogja.com

//============================================================+

/**
 * @author MrBebek
 * @since  2017-03-08
 */

 ?>
 <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>">
<section id="main" role="main">
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Daftar Siswa</h4>
                    <!-- Trigger the modal with a button -->
                    <a href="<?= base_url('index.php/siswa/daftarsiswa') ?>" title="Tambah Data" type="button" class="btn btn-default pull-right" style="margin-top:-30px;" ><i class="ico-plus"></i></a>
                    <br>
                    <!--<a data-toggle="modal" class="btn btn-default pull-right"  "  data-target="#myModal">Tambah</a>-->
                </div>

                <table class="daftarsiswa table table-striped display responsive nowrap" style="font-size: 13px" width=100%>
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Id siswa</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Pengguna</th>
                            <th>Sekolah</th>
                            <th>Email</th>
                            <th>Report Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($siswa as $key): ?>
                    <tr>
                        <td><?=$no;?></td>
                        <td>Id siswa</td>
                        <td>Nama Lengkap</td>
                        <td>Nama Pengguna</td>
                        <td>Sekolah</td>
                        <td>Email</td>
                        <td>Report Siswa</td>
                        <td>Aksi</td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>
                <nav aria-label="Page navigation mt10 pt10"><center>
        <ul class="pagination ">
        <?php 
       
        echo $this->pagination->create_links();
       
        ?>
        </ul>
        </center>
    </nav>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var tb_siswa;
    $(document).ready(function () {
        // tb_siswa = $('.daftarsiswa').DataTable({
        //     "ajax": {
        //         "url": base_url + "siswa/paginationSiswa",
        //         "type": "POST"
        //     },
        //     "emptyTable": "Tidak Ada Data Siswa",
        //     "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
        //     "paging":   false,
        //      "searching": false
        // });
    });

    function dropSiswa(idsiswa, idpengguna) {
        if (confirm('Apakah Anda yakin akan menghapus data ini? ')) {
            // ajax delete data to database

            $.ajax({
                url: base_url + "index.php/siswa/deleteSiswa/" + idsiswa + "/" + idpengguna,
                data: "idsiswa=" + idsiswa + "&idpengguna=" + idpengguna,
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
        tb_siswa.ajax.reload(null, false);
    }

</script>