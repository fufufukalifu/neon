<!-- START Template Main -->
<section id="main" role="main">
    <!-- START Register Content -->
    <section class="section bgcolor-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header -->
                    <div class="section-header section-header-bordered text-center">
                        <h2 class="section-title">
                            <p class="font-alt nm">Login To Joonet Account</p>
                        </h2>
                    </div>
                    <!--/ Header -->
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <!-- Social button -->
                    <ul class="list-table">
                        <li><button type="button" class="btn btn-block btn-facebook">Connect with <i class="ico-facebook2 ml5"></i></button></li>
                        <li><button type="button" class="btn btn-block btn-twitter">Connect with <i class="ico-twitter2 ml5"></i></button></li>
                    </ul>
                    <!-- Social button -->

                    <hr><!-- horizontal line -->

                    <!-- Login form -->
                    <form class="panel" name="form-login" action="<?= base_url('index.php/login/validasiLogin'); ?>" method="post">
                        <div class="panel-body">
                            <!-- Alert message -->
                            <div class="alert alert-warning">
                                <span class="semibold">Note :</span>&nbsp;&nbsp;Just put anything and hit 'sign-in' button.
                            </div>
                            <!--/ Alert message -->
                            <div class="form-group">
                                <div class="form-stack has-icon pull-left">
                                    <input name="username" type="text" class="form-control input-lg" placeholder="Username / email" data-parsley-errors-container="#error-container" data-parsley-error-message="Please fill in your username / email" required>
                                    <i class="ico-user2 form-control-icon"></i>
                                </div>
                                <div class="form-stack has-icon pull-left">
                                    <input name="password" type="password" class="form-control input-lg" placeholder="Password" data-parsley-errors-container="#error-container" data-parsley-error-message="Please fill in your password" required>
                                    <i class="ico-lock2 form-control-icon"></i>
                                </div>
                            </div>

                            <!-- Error container -->
                            <div id="error-container"class="mb15"></div>
                            <!--/ Error container -->

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="checkbox custom-checkbox">  
                                            <input type="checkbox" name="remember" id="remember" value="1">  
                                            <label for="remember">&nbsp;&nbsp;Remember me</label>   
                                        </div>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <a href="javascript:void(0);">Lost password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group nm">
                                <button type="submit" class="btn btn-block btn-primary"><span class="semibold">Login</span></button>
                            </div>
                        </div>
                    </form>
                    <!-- Login form -->
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
