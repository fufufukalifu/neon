<?php 

echo "masuk v bundle <br>";
var_dump($paket);
echo "<h1>TEST</h1>";
var_dump($siswa);

 ?>
<div>
    <!-- Strt ROW -->
    <div class="row">
        <div class="container">
            <!--START LIST PAKET dan SISWA -->
            <div class="panel panel-default">
                    <div class="panel-heading">
                            <h3 class="panel-title">Daftar Soal</h3>
                    </div>
                    <!-- Start Panel Body ALL -->
                    <div class="panel-body">
                        <!-- END LIST paket n siswa yang sudah dia ADD -->
                        <div class="col-md-6">
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                        <h3 class="panel-title">Daftar Soal</h3>
                                </div>
                                    <!-- Start Panel Body -->
                                <div class="panel-body">
                                    <div>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#paket" data-toggle="tab">Paket</a></li>
                                            <li><a href="#siswa" data-toggle="tab">Siswa</a></li>
                                        </ul>
                                    </div>
                                    <!-- Star Tab Content -->
                                    <div class="tab-content">
                                        <!-- Start Tab pane Paket -->
                                        
                                        <div class="tab-pane active"  id="paket">

                                                    <table class="table table-bordered" id="zero-configuration" style="font-size: 13px">
                                                        <thead>
                                                            <tr>
                                                                <th >Aksi</th>
                                                                <th >ID</th>
                                                                <th>Nama paket</th>
                                                                <th>Deskripsi</th>
                                                                <th>Lihat</th>
                                                            </tr>
                                                        </thead>
                                                        <form>
                                                            <tbody id="tbpaket">
                                                                <?php
                                                                $n='1'; 
                                                                foreach ($paket as $row):
                                                                   ?>
                                                               <tr>
                                                                <td>
                                                                    <span class='checkbox custom-checkbox custom-checkbox-inverse'>
                                                                        <input type='checkbox' name="<?=$row['nm_paket'].$n;?>" id="<?=$row['nm_paket'].$row['id_paket'];?>" value="<?= $row['id_paket'];?>">
                                                                        <label for="<?=$row['nm_paket'].$row['id_paket'];?>">&nbsp;&nbsp;</label>
                                                                    </span>
                                                                </td>
                                                                <td><?=$row['id_paket'];?></td>
                                                                <td><?=$row['nm_paket'];?></td>
                                                                <td><?=$row['deskripsi'];?></td>
                                                                <td><button class="btn-primary">Lihat</button></td>
                                                            </tr>
                                                            <?php  $n++; endforeach; ?>
                                                            </tbody>                                   
                                                        </form>
                                                </table>
                                        </div>
                                       <!-- End Tab pane Paket -->
                                       <!-- Start Tab pane Siswa -->
                                       <div class="tab-pane" id="siswa">
                                            <table class="table table-striped" id="column-filtering" style="font-size: 13px">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Aksi</th>
                                                        <th>ID</th>
                                                        <th>Nama</th>
                                                        <th>Tingkat</th>
                                                        <th>Kelas</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="tbsiswa">
                                                    <?php foreach ($siswa as $key) : ?>
                                                    <tr>
                                                        <td>
                                                            <span class='checkbox custom-checkbox custom-checkbox-inverse'>
                                                            <input type='checkbox'  name="<?=$key['namaDepan'].$n;?>" id="<?=$key['namaDepan'].$key['id'];?>">
                                                            <label for="<?=$key['namaDepan'].$key['id'];?>">&nbsp;&nbsp;</label>
                                                            </span>
                                                        </td>
                                                        <td><?=$key['id'];?></td>
                                                        <td><?=$key['namaDepan']." ".$key['namaBelakang'];?></td>
                                                        <td><?=$key['aliasTingkat'];?></td>
                                                        <td><?=$key['kelas'];?></td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>

                                        </div>
                                       <!-- Start Tab pane Paket -->
                                    </div>
                                    <!-- END Tab Content -->
                                    <!-- Start Footer -->
                                     <div class="panel-footer">
                                        <button class="btn btn-primary add">ADD</button>
                                     </div>
                                     <!-- END FOOTER -->
                                </div>
                                <!-- END Panel Body -->


                            </div>
                        </div>
                        <!--END LIST PAKET dan SISWA -->
                        <!-- ########################################### -->
                        <!-- START LIST paket n siswa yang sudah dia ADD -->
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Daftar Soal</h3>
                                </div>
                                <!-- Start Panel Body -->
                                <div class="panel-body">
                                    <div>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#paketadd" data-toggle="tab">Paket</a></li>
                                            <li><a href="#siswaadd" data-toggle="tab">Siswa</a></li>
                                        </ul>
                                    </div>

                                    <div class="tab-content">
                                        <!-- START LIST Paket yang sudah di ADD -->
                                        <div class="tab-pane active" id="paketadd">
                                           <h1>paket</h1>
                                        </div>
                                        <!-- END LIST Paket yang sudah di ADD  -->

                                        <!-- START LIST SISWA yang sudah di ADD -->
                                        <div class="tab-pane" id="siswaadd">
                                             <h1>Siswa</h1>
                                        </div>
                                        <!-- LIST Siswa yang sudah di ADD -->
                                    </div>

                                </div>
                                <!-- END Panel Body -->
                            </div>         
                        </div>
                        <!-- END LIST paket n siswa yang sudah dia ADD -->       
                    </div>
                    <!-- END PANEL Body ALL -->
            </div>     
        </div>
        <!-- END CONTAINER -->
    </div>
    <!-- END ROW -->
</div>


<script type="text/javascript">
    function adda() {
         
        $('.add').click(function(){    
            addPaket();
            addSiswa();
        });
       
    }

    function addPaket(){
        var idpaket = [];
        var test ='test';
        $('#tbpaket input:checked').each(function(i){
            idpaket[i] = $(this).val();
        });
        $('#tbpaket input').attr('checked',false);

        var url = base_url+"index.php/toBack/addPaketToTO";

         $.ajax({
            url : url,
            type: "POST",
            data: {data:test, 
                    },
            // cache: false,
          // dataType: "JSON",
            success: function(data,respone)
            {   
                console.log(respone); 
                // console.log(data);
                // reload_tblist();
                 // $(':checkbox').attr('checked',false);

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
             

                alert('Error adding / update data');
            }
        });


        // console.log(idpaket);
        // id_paket=null;
    }
    function addSiswa(){
        var idsiswa = [];
        $('#tbsiswa input:checked').each(function(i){
            idsiswa[i] = $(this).val();
        });
           $('#tbsiswa input').attr('checked',false);
         console.log(idsiswa);
         idsiswa=null;

    }
    adda();

</script>