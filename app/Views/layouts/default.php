<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= config("app.APP_NAME") ?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= request()->baseUrl(); ?>/assets/images/favicon.svg" />
    <link rel="icon" type="image/png" href="<?= request()->baseUrl(); ?>/assets/images/favicon.svg" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= request()->baseUrl(); ?>/assets/images/favicon.svg" sizes="32x32">
    <link rel="icon" type="image/png" href="<?= request()->baseUrl(); ?>/assets/images/favicon.svg" sizes="96x96">
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/main.css" />
    <link rel="stylesheet" href="<?= request()->baseUrl(); ?>/assets/css/styles.css" />

    <!-- insert specific page's css -->
    <?= $this->section('css') ?>

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!-- Header section -->

    <?= $this->insert('layouts/header') ?>

    <!-- Content section -->
    <?= $this->section('page') ?>

    <!-- Footer section -->
    <?= $this->insert('layouts/footer') ?>

    <?= $this->insert('layouts/logout_modal') ?>

    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/tiny-slider.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/glightbox.min.js"></script>
    <script src="<?= request()->baseUrl(); ?>/assets/js/sweetalert2.all.min.js"></script>

    <script src="<?= request()->baseUrl(); ?>/assets/js/main.js"></script>

    <!-- Thêm thông báo Flash messages -->
    <?= $this->insert('layouts/notifications'); ?>

    <!-- insert specific page's scripts -->
    <?= $this->section('js') ?>
</body>

</html>