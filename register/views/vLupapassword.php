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


                    <form class="panel nm" name="form-register" action="<?= base_url() ?>index.php/register/ch_sent_reset" method="post">
                        <ul class="list-table pa15">
                            <li>
                                <!-- Alert message -->
                                <!--                                <div class="alert alert-warning">
                                                                    <span class="semibold">Info :</span>&nbsp;&nbsp;Kami akan kirimkan kode reset password ke email akun mu.
                                                                </div>-->
                                <!--/ Alert message -->
                                <?php if ($this->session->flashdata('notif') != '') {
                                    ?>
                                    <div class="alert alert-warning">
                                        <span class="semibold">Note :</span><?php echo $this->session->flashdata('notif'); ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="alert alert-warning">
                                        <span class="semibold">Note :</span>&nbsp;&nbsp;Kami akan kirimkan kode reset password ke email akun mu.
                                    </div>
                                <?php }; ?>
                            </li>
                        </ul>


                        <hr class="nm">

                        <!-- Star form konfirmasi akun by email -->
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <div class="has-icon pull-left">
                                    <input type="email" class="form-control" name="email" placeholder="xxx@mail.com" required>
                                    <i class="ico-envelop form-control-icon"></i>
                                    <!-- untuk menampilkan pesan kesalahan penginputan email -->
                                </div>
                            </div>

                        </div>
                        <!-- end form konfirmasi akun by email -->
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-block btn-success"><span class="semibold">Submit</span></button>
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
