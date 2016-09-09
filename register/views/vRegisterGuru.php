  <!-- START Template Main -->
  <section id="main" role="main">
    <!-- START page header -->
    <section class="page-header page-header-block nm">
        <!-- pattern -->
        <div class="pattern pattern9"></div>
        <!--/ pattern -->
        <div class="container pt15 pb15">
            <div class="page-header-section">
                <h4 class="title font-alt"> Register Akun Guru</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="javascript:void(0);">Pages</a></li>
                        <li class="active"> Register Akun Guru</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
    </section>
    <!--/ END page header -->

    <!-- START Register Content -->
    <section class="section bgcolor-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header -->
                    <div class="section-header section-header-bordered text-center">
                        <h2 class="section-title">
                            <p class="font-alt nm">Create your NetJoo Account</p>
                        </h2>
                    </div>
                    <!--/ Header -->
                </div>

                <div class="col-md-6">
                    <!-- features #1 -->
                    <div class="table-layout">
                        <div class="col-xs-2 valign-top"><img src="<?=base_url('assets/image/icons/brandprotection.png')?>" width="100%"></div>
                        <div class="col-xs-10 valign-top pl15">
                            <h4 class="font-alt mt0">Serious security</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Excepteur sint occaecat cupidatat non
                                proident.</p>
                            </div>
                        </div>
                        <!-- features #1 -->
                        <div class="visible-md visible-lg" style="margin-bottom:50px;"></div><!-- spacer -->
                        <!-- features #2 -->
                        <div class="table-layout">
                            <div class="col-xs-2 valign-top"><img src="<?=base_url('assets/image/icons/seoperfomance.png')?>" width="100%"></div>
                            <div class="col-xs-10 valign-top pl15">
                                <h4 class="font-alt mt0">Powerful integrations</h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                                </div>
                            </div>
                            <!-- features #2 -->
                            <div class="visible-md visible-lg" style="margin-bottom:50px;"></div><!-- spacer -->
                            <!-- features #3 -->
                            <div class="table-layout">
                                <div class="col-xs-2 valign-top"><img src="<?=base_url('assets/image/icons/responsivewebdesign.png')?>" width="100%"></div>
                                <div class="col-xs-10 valign-top pl15">
                                    <h4 class="font-alt mt0">Browse With Any Device</h4>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia.</p>
                                    </div>
                                </div>
                                <!-- features #3 -->
                                <div class="visible-md visible-lg" style="margin-bottom:50px;"></div><!-- spacer -->
                                <!-- features #4 -->
                                <div class="table-layout">
                                    <div class="col-xs-2 valign-top"><img src="<?=base_url('assets/image/icons/supportservices.png')?>" width="100%"></div>
                                    <div class="col-xs-10 valign-top pl15">
                                        <h4 class="font-alt mt0">xx Hour Support</h4>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                                        </div>
                                    </div>
                                    <!-- features #4 -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Register form -->
                                    <form class="panel nm" name="form-register" action="<?=base_url()?>index.php/register/saveguru" method="post">
                                        <ul class="list-table pa15">
                                            <li>
                                                <!-- Alert message -->
                                                <div class="alert alert-warning nm">
                                                    <span class="semibold">Catatan :</span>&nbsp;&nbsp;Silahkan diisi Semua.
                                                </div>
                                                <!--/ Alert message -->
                                            </li>
                                            <li class="text-right" style="width:20px;"><a href="javascript:void(0);"><i class="ico-question-sign fsize16"></i></a></li>
                                        </ul>


                                        <hr class="nm">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-12 control-label">Nama</label>
                                                <div class="col-md-6">
                                                    <div class="has-icon pull-left">
                                                        <input type="text" class="form-control" name="namadepan" value="<?php echo set_value('namadepan'); ?>" placeholder="Nama Depan" data-parsley-required>
                                                        <i class="ico-user2 form-control-icon"></i>
                                                        <!-- untuk menampilkan pesan kesalahan penginputan alamat -->
                                                        <span class="text-danger"> <?php echo form_error('namadepan'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                 <input type="text" class="form-control" name="namabelakang" value="<?php echo set_value('namabelakang'); ?>" placeholder="Nama Belakang" data-parsley-required>
                                             </div>

                                         </div>

                                         <div class="col-md-12 form-group">
                                             <label class="control-label">Mata Pelajaran</label>
                                             <div class="has-icon pull-left">
                                                <select class="form-control" name="mataPelajaran" >
                                                <option >-Pilih Matapelajaragn-</option>
                                                    <?php 
                                                    foreach ($mataPelajaran as $row) {
                                                        $id = $row['id'];
                                                        $aliasMataPelajaran = $row['aliasMataPelajaran'];
                                                        echo "<option value='".$id."''>".$aliasMataPelajaran." </option>";

                                                    } ;
                                                    var_dump($mataPelajaragn);
                                                    echo "string";
                                                    ?> 

                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-md-12 form-group">
                                            <label class="control-label">Alamat</label>
                                            <div class="has-icon pull-left">
                                                <input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat'); ?>" data-parsley-required>
                                                <i class="ico-home10 form-control-icon"></i>
                                                <!-- untuk menampilkan pesan kesalahan penginputan alamat -->
                                                <span class="text-danger"> <?php echo form_error('alamat'); ?></span>
                                            </div>
                                        </div>

                                        <div class="col-md-12 form-group">
                                            <label class="control-label">No Kontak</label>
                                            <div class="has-icon pull-left">
                                                <input type="text" class="form-control" name="nokontak" value="<?php echo set_value('nokontak'); ?>" data-parsley-required>
                                                <i class="ico-phone3 form-control-icon"></i>
                                                <!-- untuk menampilkan pesan kesalahan penginputan alamat -->
                                                <span class="text-danger"> <?php echo form_error('nokontak'); ?></span>
                                            </div>
                                        </div>

                                    </div>

                                    <hr class="nm">
                                    <div class="panel-body">
                                        <div class="col-md-12 form-group">
                                            <label class="control-label">Nama Pengguna</label>
                                            <div class="has-icon pull-left">
                                                <input type="text" class="form-control" name="namapengguna" value="<?php echo set_value('namapengguna'); ?>" data-parsley-required>
                                                <i class="ico-tag9 form-control-icon"></i>
                                                <!-- untuk menampilkan pesan kesalaha penginputan nama pengguna -->
                                                <span class="text-danger"><?php echo form_error('namapengguna'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="control-label">Kata Sandi</label>
                                            <div class="has-icon pull-left">
                                                <input type="password" class="form-control" name="katasandi" data-parsley-required>
                                                <i class="ico-key2 form-control-icon"></i>
                                                <!-- untuk menampilkan pesan kesalahan penginputan kata sandi -->
                                                <span class="text-danger"><?php echo form_error('katasandi'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="control-label">Ulangi Kata Sandi</label>
                                            <div class="has-icon pull-left">
                                                <input type="password" class="form-control" name="passconf" data-parsley-equalto="input[name=password]">
                                                <i class="ico-asterisk form-control-icon"></i>
                                                <span class="text-danger"><?php echo form_error('katasandi'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="nm">
                                    <div class="panel-body">
                                        <p class="semibold text-muted">Untuk konfirmasi dan pengaktifan akun baru anda, kita akan mengirim aktivasi code ke email anda.</p>
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <div class="has-icon pull-left">
                                                <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="you@mail.com">
                                                <i class="ico-envelop form-control-icon"></i>
                                                <!-- untuk menampilkan pesan kesalahan penginputan email -->
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox custom-checkbox">  
                                                <input type="checkbox" name="agree" id="agree" value="1" required>  
                                                <label for="agree">&nbsp;&nbsp;Saya setuju dengan <a class="semibold" href="javascript:void(0);">Ketentuan Pelayanan</a></label>   
                                            </div>
                                        </div> 

                                    </div>
                                    <!-- end form konfirmasi akun by email -->
                                    <div class="panel-footer">
                                        <button type="submit" class="btn btn-block btn-success" id="kirimdata" disabled><span class="semibold">Sign up</span></button>
                                    </div>
                                </form>
                                <!-- Register form -->
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ END Register Content -->

                <!-- START To Top Scroller -->
                <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
                <!--/ END To Top Scroller -->
            </section>
            <!--/ END Template Main -->

            <script type="text/javascript">
                function enable() {
                    if (this.checked) {
                     document.getElementById("kirimdata").disabled = false;
                 } else {
                     document.getElementById("kirimdata").disabled = true;
                 }
             }
             document.getElementById("agree").addEventListener("change", enable);

         </script>