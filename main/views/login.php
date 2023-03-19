<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SIUMAS - Aplikasi Iuran Masyarakat">
    <meta name="author" content="SIUMAS DEV">
    <meta name=" keyword" content="iuran, masyarakat, siumas">
    <title>Login - <?= APP_NAME ?></title>
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('', true) ?>assets/favicon/siumas.png">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('', true) ?>vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?= base_url('', true) ?>css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="<?= base_url('', true) ?>css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="<?= base_url('', true) ?>css/examples.css" rel="stylesheet">
</head>

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?= show_message() ?>
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <h1>Login</h1>
                                <form action="<?= base_url('login_action') ?>" method="post">
                                    <p class="text-medium-emphasis">Masuk ke akunmu!</p>
                                    <div class="input-group mb-3"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                            </svg></span>
                                        <input class="form-control" name="username" type="text" placeholder="Username">
                                    </div>
                                    <div class="input-group mb-4"><span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                            </svg></span>
                                        <input class="form-control" name="password" type="password" placeholder="Password">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="btn btn-primary px-4">Masuk</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button class="btn btn-link px-0" type="button">Lupa password?</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url('', true) ?>vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url('', true) ?>vendors/simplebar/js/simplebar.min.js"></script>
    <script>
    </script>

</body>

</html>