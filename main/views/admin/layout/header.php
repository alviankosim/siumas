<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">

<head>
    <base href="./../">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SIUMAS - Aplikasi Iuran Masyarakat">
    <meta name="author" content="SIUMAS DEV">
    <meta name=" keyword" content="iuran, masyarakat, siumas">
    <title>Iuran - <?= APP_NAME ?></title>
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('', true) ?>assets/favicon/siumas.png">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('', true) ?>vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?= base_url('', true) ?>css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="<?= base_url('', true) ?>css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="<?= base_url('', true) ?>css/examples.css" rel="stylesheet">
    <!-- jquery, bs4, and core ui bundle -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="<?= base_url('', true) ?>vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url('', true) ?>vendors/simplebar/js/simplebar.min.js"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/cf90720bb5.js" crossorigin="anonymous"></script>
    <!-- tempusdominus 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url('', true) ?>vendors/tempusdominus/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('', true) ?>vendors/tempusdominus/css/bootstrap-datetimepicker.min.css" />
    <!-- select2 -->
    <script src="<?= base_url('', true) ?>vendors/select2/select2.full.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('', true) ?>vendors/select2/select2.min.css" />
    <link rel="stylesheet" href="<?= base_url('', true) ?>css/vendors/select2-bootstrap.min.css" />
    <!-- vex notification alert -->
    <script src="<?= base_url('', true) ?>vendors/vex/js/vex.combined.min.js"></script>
    <script>vex.defaultOptions.className = 'vex-theme-os'</script>
    <link rel="stylesheet" href="<?= base_url('', true) ?>vendors/vex/css/vex.css" />
    <link rel="stylesheet" href="<?= base_url('', true) ?>vendors/vex/css/vex-theme-os.css" />
    <!-- imageuploader -->
    <script src="<?= base_url('', true) ?>vendors/imageuploader/imageuploader.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('', true) ?>vendors/imageuploader/imageuploader.min.css" />
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed sidebar-narrow-unfoldable" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <div class="sidebar-brand-full">
                <img style="position: relative;bottom: 5px" width="35" src="<?= base_url('', true) ?>assets/favicon/siumas.png" alt="" srcset="">
                <span style="font-size: 1.3em;">SIUMAS</span>
                <small><?= APP_VERSION ?></small>
            </div>
            <div class="sidebar-brand-narrow">
                <img width="35" src="<?= base_url('', true) ?>assets/favicon/siumas.png" alt="" srcset="">
            </div>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <!-- <li class="nav-item"><a class="nav-link" href="index.html">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                    </svg> Dashboard</a>
                <span class="badge badge-sm bg-info ms-auto">NEW</span>
            </li> -->
            <li class="nav-title">Keuangan</li>
            <? 
                $need_to_pay = 0;
                $query_to_pay = $this->db->query('
                    select count(ti.iuran_id) as dacount from t_iuran ti where ti.paid_date is null
                ')->row();
                if ($query_to_pay) {
                    $need_to_pay = $query_to_pay->dacount;
                }
            ?>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-money"></use>
                    </svg> Iuran 
                    <? if($need_to_pay > 0): ?>
                        <span class="badge badge-sm bg-success ms-auto">Pay</span>
                    <?endif?>
                    </a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('iuran') ?>"><span class="nav-icon"></span> List Iuran 
                    <? if($need_to_pay > 0): ?>
                        <span class="badge badge-sm bg-success ms-auto"><?= $need_to_pay ?></span>
                    <?endif?>
                    </a>
                </li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('iuran/add') ?>"><span class="nav-icon"></span> Tambah Iuran</a></li>
                </ul>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-list"></use>
                    </svg> Pengeluaran</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('pengeluaran') ?>"><span class="nav-icon"></span> List Pengeluaran</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('pengeluaran/add') ?>"><span class="nav-icon"></span> Tambah Pengeluaran</a></li>
                </ul>
            </li>
            <li class="nav-title">Master</li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                    </svg> Keluarga</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('keluarga') ?>"><span class="nav-icon"></span> List Keluarga</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('keluarga/add') ?>"><span class="nav-icon"></span> Tambah Keluarga</a></li>
                </ul>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg> Pengguna</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('users') ?>"><span class="nav-icon"></span> List Pengguna</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('users/add') ?>"><span class="nav-icon"></span> Tambah Pengguna</a></li>
                </ul>
            </li>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button>
                <a class="header-brand d-md-none" href="#">
                    <img style="position: relative;bottom: 5px" width="35" src="<?= base_url('', true) ?>assets/favicon/siumas.png" alt="" srcset="">
                    <span style="font-size: 1.3em;">SIUMAS</span>
                </a>
                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><img class="avatar-img" src="<?= base_url('', true) ?>assets/img/avatars/1.jpg" alt="user@email.com"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Account</div>
                            </div>
                            <a class="dropdown-item" href="<?= base_url('logout_action') ?>">
                                <svg class="icon me-2">
                                    <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header-divider"></div>
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0 ms-2">
                        <li class="breadcrumb-item">
                            <!-- if breadcrumb is single-->App
                        </li>
                        <li class="breadcrumb-item active"><span><?= $header_title ?? 'List' ?></span></li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-12">
                        <?= show_message() ?>
                    </div>
                </div>