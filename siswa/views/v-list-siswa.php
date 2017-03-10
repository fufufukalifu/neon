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
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>

 <!-- <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/jquery.datatables.min.css'); ?>"> -->
<section id="main" role="main">
    <div class="col-md-12">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Daftar Siswa</h4>
                  <!--    Trigger the modal with a button -->
                  <div>
                      
                  </div>
                    
                   <!--  <a data-toggle="modal" class="btn btn-default pull-right"  "  data-target="#myModal">Tambah</a> -->
                </div>
                <!-- Funsi cari  -->
                <div class="col-md-4">

                    <form class="input-group ">
                    <input id="carisoal" type="text" name="keyword" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="ico-search"></i></button>
                    </span>
                </form>
                </div>
         <!-- Funsi cari -->
                <input type="text" name="page" value="<?=$this->uri->segment('3')?>" hidden="true">
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
                    <?php 
                     $no = $this->uri->segment('3') + 1;
                    foreach ($siswa as $key): ?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$key["idsiswa"];?></td>
                        <td><?=$key["nama"];?></td>
                        <td><?=$key["namaPengguna"];?></td>
                        <td><?=$key["namaSekolah"];?></td>
                        <td><?=$key["eMail"];?></td>
                        <td><?=$key["report"];?></td>
                        <td><?=$key["aksi"];?></td>
                        </tr>
                    <?php 
                    $no++;
                    endforeach ?>

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
<!-- on keypres cari soal -->


<script type="text/javascript">

  $(document).ready(function() { 
    var site = "<?php echo site_url();?>";
    $( "#carisoal" ).autocomplete({
        source:  site+"/siswa/autocompleteSiswa",
        select: function (event, ui) {
                        source:  base_url +"siswa/autocompleteSiswa",
                window.location = ui.item.url;
                }
    });

});
</script>
<script type="text/javascript">
    var page=base_url+"siswa/listSiswa/"+$("input[name=page]").val();

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
                     window.location.href =page;
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
