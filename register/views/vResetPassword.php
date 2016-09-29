<!-- START Template Main -->
<section id="main" role="main">
    <!-- START page header -->
    <section class="page-header page-header-block nm">
        <!-- pattern -->
        <div class="pattern pattern9"></div>
        <!--/ pattern -->
        <div class="container pt15 pb15">
            <div class="page-header-section">
                <h4 class="title font-alt">Lupa Password</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <div class="toolbar">
                        <ol class="breadcrumb breadcrumb-transparent nm">
                            <li><a href="<?= base_url(); ?>">Beranda</a></li>
                            <li class="active">Lupa Password</li>
                        </ol>
                    </div>
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
                            <p class="font-alt nm">Reset Password</p>
                        </h2>
                    </div>
                    <!--/ Header -->
                </div>

                <div class="col-md-6 col-md-offset-3">


                    <form class="login-form" name="form-register" action="<?= base_url() ?>index.php/register/resetdatapassword" method="post">
                        <ul class="list-table pa15">
                            <li>
                                <!-- Alert message -->
                                <div class="alert alert-warning">
                                    <span class="semibold">Info :</span>&nbsp;&nbsp;Masukan password baru mu
                                </div>
                                <!--/ Alert message -->
                            </li>
                        </ul>


                        <hr class="nm">

                        <!-- Star form konfirmasi akun by email -->
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Kata Sandi Baru</label>
                                <div class="has-icon pull-left">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <i class="ico-lock2 form-control-icon"></i>

                                    <!-- untuk menampilkan pesan kesalahan penginputan email -->
                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ulangi Kata Sandi</label>
                                <div class="has-icon pull-left">
                                    <input type="password" class="form-control" id="password2" name="oldpassword" placeholder="Password" required onkeyup="checkPass(); return false;">
                                    <span id="confirmMessage" class="confirmMessage"></span>
                                    <i class="ico-lock2 form-control-icon"></i>

                                    <!-- untuk menampilkan pesan kesalahan penginputan email -->
                                </div>
                            </div>

                        </div>
                        <!-- end form konfirmasi akun by email -->
                        <div class="panel-footer">
                            <button disabled="true" type="submit" class="button-fullwidth cws-button bt-color-3 alt"><span class="semibold">Submit</span></button>
                        </div>
                    </form>

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
    function checkPass() {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('password');
        var pass2 = document.getElementById('password2');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        var blank = "#fff"
        //Compare the values in the password field
        //and the confirmation field

        if (pass2.value == "") {
            message.style.color = blank;
            message.innerHTML = ""
        } else if (pass1.value == pass2.value) {
            //The passwords match.
            //Set the color to the good color and inform
            //the user that they have entered the correct password
            message.style.color = goodColor;
            message.innerHTML = "Passwords Cocok!"
        } else {
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            message.style.color = badColor;
            message.innerHTML = "Passwords Tidak Cocok!"
        }
    }

</script>

