<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Amalia-HOM</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="/assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="/assets/img/logo/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4><?= lang('Auth.loginTitle') ?></h4>
                            </div>

                            <div class="card-body">
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= url_to('login') ?>" method="post" class="needs-validation">

                                    <?= csrf_field(); ?>

                                    <?php if ($config->validFields === ['email']) : ?>
                                        <div class="form-group">
                                            <div>
                                                <label for="login"><?= lang('Auth.email') ?></label>
                                            </div>
                                            <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" required autofocus>
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="form-group">
                                            <div>
                                                <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                            </div>
                                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" required autofocus>
                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password"><?= lang('Auth.password') ?></label>
                                            <div class="float-right">
                                                <?php if ($config->activeResetter) : ?>
                                                    <p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>

                                    <?php if ($config->allowRemembering) : ?>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                                <?= lang('Auth.rememberMe') ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>

                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            <?= lang('Auth.loginAction') ?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php if ($config->allowRegistration) : ?>
                            <p><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                        <?php endif; ?>
                        <div class="simple-footer">
                            Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://chalathadoa.github.io/">Udkhul Rogodan</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="/assets/modules/jquery.min.js"></script>
    <script src="/assets/modules/popper.js"></script>
    <script src="/assets/modules/tooltip.js"></script>
    <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="/assets/modules/moment.min.js"></script>
    <script src="/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="/assets/js/scripts.js"></script>
    <script src="/assets/js/custom.js"></script>
</body>

</html>