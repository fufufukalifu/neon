<main>
    <section class="fullwidth-background bg-2">
        <div class="grid-row">
            <div class="login-block" style="min-width: 45%">
                <div class="logo">
                    <img src="<?= base_url('assets/back/img/logo.png') ?>" data-at2x='img/logo@2x.png' alt>
                    <!--<h4>Login</h4>-->
                </div>
                <?php
//                if (!empty($authUrl)) {
//                    echo '<a href="' . $authUrl . '" class="btn btn-block btn-facebook">Connect with <i class="ico-facebook2 ml5"></i></a>';                  
//                }
                ?>
                <div class="clear-both"></div>

                <!-- Alert message -->
                <div class="alert alert-warning">
                    <span class="semibold">Catatan :</span>&nbsp;&nbsp;Silahkan diisi Semua.
                </div>
                <!--/ Alert message -->

                <form class="login-form" name="form-register" action="<?= base_url() ?>index.php/register/savesiswa" method="post">
                    <div class="form-group">
                        <input type="text" class="login-input" name="namadepan" value="<?php echo set_value('namadepan'); ?>" placeholder="Nama Depan" required data-parsley-required>
<!--                        <span class="input-icon">
                            <i class="fa fa-user"></i>
                        </span>-->
                        <!-- untuk menampilkan pesan kesalahan penginputan alamat -->
                        <span class="text-danger"> <?php echo form_error('namadepan'); ?></span>
                    </div>

                    <div class="form-group">
                        <input type="text" class="login-input" name="namabelakang" value="<?php echo set_value('namabelakang'); ?>" placeholder="Nama Belakang" required>
                        <!-- untuk menampilkan pesan kesalahan penginputan alamat -->
                        <span class="text-danger"> <?php echo form_error('namabelakang'); ?></span>
                    </div>

                    <div class="form-group">
                        <input type="text" class="login-input" placeholder="Alamat" name="alamat" value="<?php echo set_value('alamat'); ?>" data-parsley-required required>
                        <i class="ico-home10 form-control-icon"></i>
                        <!-- untuk menampilkan pesan kesalahan penginputan alamat -->
                        <span class="text-danger"> <?php echo form_error('alamat'); ?></span> 
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="No Kontak" name="nokontak" value="<?php echo set_value('nokontak'); ?>" data-parsley-required required>
                        <i class="ico-phone3 form-control-icon"></i>
                        <!-- untuk menampilkan pesan kesalahan penginputan no kontak -->
                        <span class="text-danger"> <?php echo form_error('nokontak'); ?></span>
                    </div>

                    <!-- end form data siswa -->

                    <hr>
                    <br>
                    <!-- start form data sekolah -->
                    <div class="form-group">
                        <input type="text" placeholder="Nama Sekolah" class="login-input" name="namasekolah" value="<?php echo set_value('namasekolah'); ?>"data-parsley-required required>
                        <i class="ico-home form-control-icon"></i>
                    </div>

                    <div class="form-group">
                        <input placeholder="Alamat Sekolah" type="text" class="login-input" name="alamatsekolah" value="<?php echo set_value('alamatsekolah'); ?>"data-parsley-required required>
                        <i class="ico-home form-control-icon"></i>
                    </div>
                    <!-- end form data siswa -->


                    <hr class="nm">
                    <!-- star form akun -->
                    <br>
                    <div class="form-group">
                        <input placeholder="Username" type="text" class="login-input" name="namapengguna" value="<?php echo set_value('namapengguna'); ?>"  data-parsley-required required>
                        <i class="ico-tag9 form-control-icon"></i>
                        <!-- untuk menampilkan pesan kesalaha penginputan nama pengguna -->
                        <span class="text-danger"><?php echo form_error('namapengguna'); ?></span>

                    </div>
                    <div class="form-group">
                        <input placeholder="Password" type="password" class="login-input" name="katasandi" maxlength="20" required>
                        <i class="ico-key2 form-control-icon"></i>
                        <!-- untuk menampilkan pesan kesalahan penginputan kata sandi -->
                        <span class="text-danger"><?php echo form_error('katasandi'); ?></span>
                    </div>
                    <div class="form-group">
                        <input placeholder="Confirm Password" type="password" class="login-input" name="passconf" data-parsley-equalto="input[name=password]" maxlength="20" required>
                        <i class="ico-asterisk form-control-icon"></i>
                        <span class="text-danger"><?php echo form_error('katasandi'); ?></span>
                    </div>
                    <!-- end form akun -->

                    <hr class="nm">
                    <!-- Star form konfirmasi akun by email -->
                    <p class="small">Untuk konfirmasi dan pengaktifan akun baru anda, kita akan mengirim aktivasi code ke email anda.</p>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="xxx@mail.com" required>
                        <i class="ico-envelop form-control-icon"></i>
                        <!-- untuk menampilkan pesan kesalahan penginputan email -->
                        <span class="text-danger"><?php echo form_error('email'); ?></span> 
                    </div>
                    <!--                    <div class="form-group">
                                            <div class="" style="float: left;background: black;">
                                                <div class="checkbox custom-checkbox">  
                                                    <input type="checkbox" name="agree" id="agree" value="1" required>  
                                                    <label for="agree"> </label>
                                                </div>
                                                <p class="small">
                                                    &nbsp;&nbsp;Saya setuju dengan <a class="semibold" href="javascript:void(0);">Ketentuan Pelayanan</a>
                                                </p>
                                            </div>
                                            <div class="text-right">
                                                <p class="small">
                                                    <a href="<?= base_url('index.php/login'); ?>">Ada akun?</a>
                                                </p>
                                                </div>
                                            <div class="clear-both"></div>
                                        </div>-->
                    <!-- end form konfirmasi akun by email -->
                    <div class="form-group nm">
                        <button type="submit" class="button-fullwidth cws-button bt-color-3 alt"><span class="semibold">Daftar</span></button>
                    </div>
<!--                    <div class="panel-footer">
                        <button type="submit" class="btn btn-block btn-success" id="kirimdata" disabled><span class="semibold">Sign up</span></button>
                    </div>-->
                </form>
                <!-- Register form -->
            </div>
        </div>
        <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
    </section>
</main>

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