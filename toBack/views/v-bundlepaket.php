<?php 

echo "masuk v bundle <br>";
var_dump($paket);
echo "<h1>TEST</h1>";
var_dump($siswa);

 ?>
<div>
    <div class="row">
        <div class="container">
            <!--START LIST PAKET dan SISWA -->
            <div class="col-md-6">
            <h4>Heading</h4>
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

                	 <table class="table table-striped" id="zero-configuration" style="font-size: 13px">
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
                        <tbody>
                      
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
                            <?php  $n++;
                            endforeach; ?>

                        </tbody>
                         <button>Send</button>
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
                        <tbody>
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
            </div>
            <!--END LIST PAKET dan SISWA -->
            <!-- START LIST paket n siswa yang sudah dia ADD -->
            <div class="col-md-6">
                <h4>List Paket dan Siswa yang sudah di ADD</h4>
                <div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#paketadd" data-toggle="tab">Paket</a></li>
                        <li><a href="#siswaadd" data-toggle="tab">Siswa</a></li>
                    </ul>
                </div>
                <!-- START LIST Paket yang sudah di ADD -->
                <div class="col-md-6">
                    
                </div>
                <!-- END LIST Paket yang sudah di ADD  -->
                <!-- START LIST SISWA yang sudah di ADD -->
                <div class="col-md-6">
                    
                </div>
                <!-- LIST Siswa yang sudah di ADD -->
                
            </div>
            <!-- END LIST paket n siswa yang sudah dia ADD -->
        </div>
        <!-- END CONTAINER -->
    </div>
    <!-- END ROW -->
</div>


<script type="text/javascript">
    
</script>