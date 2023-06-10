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
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SIUMAS - Aplikasi Iuran Masyarakat">
    <meta name="author" content="SIUMAS DEV">
    <meta name=" keyword" content="iuran, masyarakat, siumas">
    <title>Home -
        <?= APP_NAME ?>
    </title>
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('', true) ?>assets/favicon/siumas.png">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="<?= base_url('', true) ?>vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="<?= base_url('', true) ?>css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="<?= base_url('', true) ?>css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="<?= base_url('', true) ?>css/examples.css" rel="stylesheet">
    <link href="<?= base_url('', true) ?>vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed hide" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="<?= base_url('', true) ?>assets/brand/coreui.svg#full"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="<?= base_url('', true) ?>assets/brand/coreui.svg#signet"></use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="index.html">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-speedometer">
                        </use>
                    </svg> Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
            <li class="nav-title">Theme</li>
            <li class="nav-item"><a class="nav-link" href="colors.html">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                    </svg> Colors</a></li>
            <li class="nav-item"><a class="nav-link" href="typography.html">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                    </svg> Typography</a></li>
            <li class="nav-title">Components</li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                    </svg> Base</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="base/accordion.html"><span class="nav-icon"></span>
                            Accordion</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/breadcrumb.html"><span class="nav-icon"></span>
                            Breadcrumb</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/cards.html"><span class="nav-icon"></span>
                            Cards</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/carousel.html"><span class="nav-icon"></span>
                            Carousel</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/collapse.html"><span class="nav-icon"></span>
                            Collapse</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/list-group.html"><span class="nav-icon"></span>
                            List group</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/navs-tabs.html"><span class="nav-icon"></span>
                            Navs &amp; Tabs</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/pagination.html"><span class="nav-icon"></span>
                            Pagination</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/placeholders.html"><span
                                class="nav-icon"></span> Placeholders</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/popovers.html"><span class="nav-icon"></span>
                            Popovers</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/progress.html"><span class="nav-icon"></span>
                            Progress</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/scrollspy.html"><span class="nav-icon"></span>
                            Scrollspy</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/spinners.html"><span class="nav-icon"></span>
                            Spinners</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/tables.html"><span class="nav-icon"></span>
                            Tables</a></li>
                    <li class="nav-item"><a class="nav-link" href="base/tooltips.html"><span class="nav-icon"></span>
                            Tooltips</a></li>
                </ul>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
                    </svg> Buttons</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="buttons/buttons.html"><span class="nav-icon"></span>
                            Buttons</a></li>
                    <li class="nav-item"><a class="nav-link" href="buttons/button-group.html"><span
                                class="nav-icon"></span> Buttons Group</a></li>
                    <li class="nav-item"><a class="nav-link" href="buttons/dropdowns.html"><span
                                class="nav-icon"></span> Dropdowns</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="charts.html">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-chart-pie">
                        </use>
                    </svg> Charts</a></li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-notes"></use>
                    </svg> Forms</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="forms/form-control.html"> Form Control</a></li>
                    <li class="nav-item"><a class="nav-link" href="forms/select.html"> Select</a></li>
                    <li class="nav-item"><a class="nav-link" href="forms/checks-radios.html"> Checks and radios</a></li>
                    <li class="nav-item"><a class="nav-link" href="forms/range.html"> Range</a></li>
                    <li class="nav-item"><a class="nav-link" href="forms/input-group.html"> Input group</a></li>
                    <li class="nav-item"><a class="nav-link" href="forms/floating-labels.html"> Floating labels</a></li>
                    <li class="nav-item"><a class="nav-link" href="forms/layout.html"> Layout</a></li>
                    <li class="nav-item"><a class="nav-link" href="forms/validation.html"> Validation</a></li>
                </ul>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-star"></use>
                    </svg> Icons</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-free.html"> CoreUI Icons<span
                                class="badge badge-sm bg-success ms-auto">Free</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-brand.html"> CoreUI Icons -
                            Brand</a></li>
                    <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-flag.html"> CoreUI Icons -
                            Flag</a></li>
                </ul>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                    </svg> Notifications</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="notifications/alerts.html"><span
                                class="nav-icon"></span> Alerts</a></li>
                    <li class="nav-item"><a class="nav-link" href="notifications/badge.html"><span
                                class="nav-icon"></span> Badge</a></li>
                    <li class="nav-item"><a class="nav-link" href="notifications/modals.html"><span
                                class="nav-icon"></span> Modals</a></li>
                    <li class="nav-item"><a class="nav-link" href="notifications/toasts.html"><span
                                class="nav-icon"></span> Toasts</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="widgets.html">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-calculator">
                        </use>
                    </svg> Widgets<span class="badge badge-sm bg-info ms-auto">NEW</span></a></li>
            <li class="nav-divider"></li>
            <li class="nav-title">Extras</li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-star"></use>
                    </svg> Pages</a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="login.html" target="_top">
                            <svg class="nav-icon">
                                <use
                                    xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                                </use>
                            </svg> Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.html" target="_top">
                            <svg class="nav-icon">
                                <use
                                    xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                                </use>
                            </svg> Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="404.html" target="_top">
                            <svg class="nav-icon">
                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-bug">
                                </use>
                            </svg> Error 404</a></li>
                    <li class="nav-item"><a class="nav-link" href="500.html" target="_top">
                            <svg class="nav-icon">
                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-bug">
                                </use>
                            </svg> Error 500</a></li>
                </ul>
            </li>
            <li class="nav-item mt-auto"><a class="nav-link" href="https://coreui.io/docs/templates/installation/"
                    target="_blank">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-description">
                        </use>
                    </svg> Docs</a></li>
            <li class="nav-item"><a class="nav-link nav-link-danger" href="https://coreui.io/pro/" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
                    </svg> Try CoreUI
                    <div class="fw-semibold">PRO</div>
                </a></li>
        </ul>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <a class="header-brand d-md-none" href="#"><img style="position: relative;bottom: 3px" width="20"
                        src="<?= base_url('', true) ?>assets/favicon/siumas.png" alt="" srcset=""> <span
                        style="font-size: 1em;">SIUMAS </span><small>
                        <?= APP_VERSION ?>
                    </small></a>
                <ul class="header-nav d-none d-md-flex">
                    <li class="nav-item"><a class="nav-link" href="#"><img style="position: relative;bottom: 5px"
                                width="25" src="<?= base_url('', true) ?>assets/favicon/siumas.png" alt="" srcset="">
                            <span style="font-size: 1.5em;">SIUMAS </span><small>
                                <?= APP_VERSION ?>
                            </small></a></li>
                    <li class="nav-item"><a class="nav-link" style="position: relative;bottom: -4px"
                            href="#laporan"><span style="font-size: 1.1em;">Lihat Laporan</span></a></li>
                    <li class="nav-item"><a class="nav-link" style="position: relative;bottom: -4px"
                            href="<?= base_url('tentang') ?>"><span style="font-size: 1.1em;">Tentang Kami</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" style="position: relative;bottom: -4px"
                            href="<?= base_url('syarat-ketentuan') ?>"><span style="font-size: 1.1em;">Syarat &
                                Ketentuan</span></a></li>
                    <li class="nav-item"><a class="nav-link" style="position: relative;bottom: -4px"
                            href="<?= base_url('faq') ?>"><span style="font-size: 1.1em;">FAQ</span></a></li>
                </ul>
                <ul class="header-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Login</a></li>
                </ul>
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <!-- Hero -->
                <div class="p-5 text-center content-center bg-image rounded-3"
                    style="background-image: url('<?php echo base_url() ?>/docs/bg/image.jpg');height: 700px;">
                    <div class="mask rounded-3"
                        style="position: relative;top: 180px;background-color: rgba(0, 0, 0, 0.6);height: 200px">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="text-white">
                                <h1 class="mb-3">Selamat Datang di Siumas</h1>
                                <h4 class="mb-3">Aplikasi Iuran Masyarakat</h4>
                                <a class="btn btn-outline-light btn-lg" href="#laporan" role="button">Lihat Laporan
                                    !</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hero -->

                <div class="row" id="laporan" style="padding-top: 80px">
                    <div>
                        <h3>Laporan SIUMAS</h3>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-primary">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">120 KK
                                        <!-- <span class="fs-6 fw-normal">(-12.4%
                            <svg class="icon">
                            <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                            </svg>)
                        </span> -->
                                    </div>
                                    <div>Jumlah Keluarga</div>
                                </div>
                            </div>
                            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-info">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">Rp 12.600.000
                                        <!-- <span class="fs-6 fw-normal">(40.9%
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                            </svg>)</span> -->
                                    </div>
                                    <div>Iuran Terkumpul</div>
                                </div>
                            </div>
                            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-warning">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">95%
                                        <!-- <span class="fs-6 fw-normal">(84.7%
                                            <svg class="icon">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                            </svg>)</span> -->
                                    </div>
                                    <div>Dana Iuran Terserap</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-transparent text-white p-0" type="button"
                                        data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="icon">
                                            <use
                                                xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-options">
                                            </use>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                            href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                            class="dropdown-item" href="#">Something else here</a></div>
                                </div>
                            </div>
                            <div class="c-chart-wrapper mt-3" style="height:70px;">
                                <canvas class="chart" id="card-chart3" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-sm-6 col-lg-3">
                        <div class="card mb-4 text-white bg-danger">
                            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                <div>
                                    <div class="fs-4 fw-semibold">20 <span class="fs-6 fw-normal">(-23.6%
                                            <svg class="icon">
                                                <use
                                                    xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom">
                                                </use>
                                            </svg>)</span></div>
                                    <div>Total Keluarga dengan Denda</div>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-transparent text-white p-0" type="button"
                                        data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg class="icon">
                                            <use
                                                xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-options">
                                            </use>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                            href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                            class="dropdown-item" href="#">Something else here</a></div>
                                </div>
                            </div>
                            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                <canvas class="chart" id="card-chart4" height="70"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>

                <!-- /.row-->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title mb-0">Grafik Penerimaan Iuran</h4>
                                <div class="small text-medium-emphasis">Januari - Maret 2023</div>
                            </div>
                            <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                                <div class="btn-group btn-group-toggle mx-3" data-coreui-toggle="buttons">
                                    <input class="btn-check" id="option1" type="radio" name="options"
                                        autocomplete="off">
                                    <label class="btn btn-outline-secondary"> Hari</label>
                                    <input class="btn-check" id="option2" type="radio" name="options" autocomplete="off"
                                        checked="">
                                    <label class="btn btn-outline-secondary active"> Bulan</label>
                                    <input class="btn-check" id="option3" type="radio" name="options"
                                        autocomplete="off">
                                    <label class="btn btn-outline-secondary"> Tahun</label>
                                </div>
                                <button class="btn btn-primary" type="button">
                                    <svg class="icon">
                                        <use
                                            xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-cloud-download">
                                        </use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
                            <canvas class="chart" id="main-chart" height="300"></canvas>
                        </div>
                    </div>
                    <!-- <div class="card-footer">
                        <div class="row row-cols-1 row-cols-md-5 text-center">
                            <div class="col mb-sm-2 mb-0">
                                <div class="text-medium-emphasis">Visits</div>
                                <div class="fw-semibold">29.703 Users (40%)</div>
                                <div class="progress progress-thin mt-2">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col mb-sm-2 mb-0">
                                <div class="text-medium-emphasis">Unique</div>
                                <div class="fw-semibold">24.093 Users (20%)</div>
                                <div class="progress progress-thin mt-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col mb-sm-2 mb-0">
                                <div class="text-medium-emphasis">Pageviews</div>
                                <div class="fw-semibold">78.706 Views (60%)</div>
                                <div class="progress progress-thin mt-2">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col mb-sm-2 mb-0">
                                <div class="text-medium-emphasis">New Users</div>
                                <div class="fw-semibold">22.123 Users (80%)</div>
                                <div class="progress progress-thin mt-2">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col mb-sm-2 mb-0">
                                <div class="text-medium-emphasis">Bounce Rate</div>
                                <div class="fw-semibold">40.15%</div>
                                <div class="progress progress-thin mt-2">
                                    <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- /.card.mb-4-->
                <!-- /.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <h4 class="card-header">Informasi Pengeluaran</h4>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="border-start border-start-4 border-start-info px-3 mb-3">
                                                    <small class="text-medium-emphasis">Pengeluaran Dana Kebersihan
                                                        Bulan Ini</small>
                                                    <div class="fs-5 fw-semibold">RP 500,000.-</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                            <div class="col-6">
                                                <div class="border-start border-start-4 border-start-danger px-3 mb-3">
                                                    <small class="text-medium-emphasis">Pengeluaran Dana Keamanan Bulan
                                                        Ini</small>
                                                    <div class="fs-5 fw-semibold">Rp 1,500,000.-</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                        </div>
                                        <!-- /.row-->
                                        <hr class="mt-0">
                                    </div>
                                    <!-- /.col-->
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <!-- /.col-->
                                            <div class="col-6">
                                                <div class="border-start border-start-4 border-start-success px-3 mb-3">
                                                    <small class="text-medium-emphasis">Sisa Kas Dana Kebersihan</small>
                                                    <div class="fs-5 fw-semibold">Rp 10,800,000.-</div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                            <div class="col-6">
                                                <div class="border-start border-start-4 border-start-warning px-3 mb-3">
                                                    <small class="text-medium-emphasis">Sisa kas Dana Keamanan</small>
                                                    <div class="fs-5 fw-semibold">Rp 12.500.000</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row-->
                                        <hr class="mt-0">
                                    </div>
                                    <!-- /.col-->
                                </div>
                                <!-- /.row--><br>
                                <div class="table-responsive">
                                    <table class="table border mb-0">
                                        <thead class="table-light fw-semibold">
                                            <tr class="align-middle">
                                                <th class="text-center">
                                                    <svg class="icon">
                                                        <use
                                                            xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-image">
                                                        </use>
                                                    </svg>
                                                </th>
                                                <th>Pengeluaran</th>
                                                <th class="text-right">Total</th>
                                                <th>Progress</th>
                                                <th class="text-center">Tanggal</th>
                                                <th>Jenis</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="align-middle">
                                                <td class="text-center" style="vertical-align:middle;">
                                                    <img src="<?php echo base_url() ?>/docs/img/scure.png"
                                                        class="rounded img-fluid"
                                                        style="width: 100px;height: 100px;display: block;margin-left: auto;margin-right: auto;background-position:center;background-size:cover">
                                                    </img>
                                                </td>
                                                <td>
                                                    <div>Keperluan Keamanan</div>
                                                    <div class="small text-medium-emphasis"><span>New</span> |
                                                        Registered: Jan 1, 2020</div>
                                                </td>
                                                <td class="text-center">
                                                    <svg class="icon icon-xl">
                                                        <use
                                                            xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/flag.svg#cif-us">
                                                        </use>
                                                    </svg>
                                                </td>
                                                <td>
                                                    <div class="clearfix">
                                                        <div class="float-start">
                                                            <div class="fw-semibold">50%</div>
                                                        </div>
                                                        <div class="float-end"><small class="text-medium-emphasis">Jun
                                                                11, 2020 - Jul 10, 2020</small></div>
                                                    </div>
                                                    <div class="progress progress-thin">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <svg class="icon icon-xl">
                                                        <use
                                                            xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/brand.svg#cib-cc-mastercard">
                                                        </use>
                                                    </svg>
                                                </td>
                                                <td>
                                                    <div class="small text-medium-emphasis">Last login</div>
                                                    <div class="fw-semibold">10 sec ago</div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-transparent p-0" type="button"
                                                            data-coreui-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <svg class="icon">
                                                                <use
                                                                    xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-options">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"><a
                                                                class="dropdown-item" href="#">Info</a><a
                                                                class="dropdown-item" href="#">Edit</a><a
                                                                class="dropdown-item text-danger" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="align-middle">
                                                <td class="text-center" style="vertical-align:middle;">
                                                    <img src="<?php echo base_url() ?>/docs/img/clean.png"
                                                        class="rounded img-fluid"
                                                        style="width: 100px;height: 100px;display: block;margin-left: auto;margin-right: auto;background-position:center;background-size:cover">
                                                    </img>
                                                </td>
                                                <td>
                                                    <div>Keperluan Kebersihan</div>
                                                    <div class="small text-medium-emphasis"><span>New</span> |
                                                        Registered: Jan 1, 2020</div>
                                                </td>
                                                <td class="text-center">
                                                    <svg class="icon icon-xl">
                                                        <use
                                                            xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/flag.svg#cif-us">
                                                        </use>
                                                    </svg>
                                                </td>
                                                <td>
                                                    <div class="clearfix">
                                                        <div class="float-start">
                                                            <div class="fw-semibold">50%</div>
                                                        </div>
                                                        <div class="float-end"><small class="text-medium-emphasis">Jun
                                                                11, 2020 - Jul 10, 2020</small></div>
                                                    </div>
                                                    <div class="progress progress-thin">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <svg class="icon icon-xl">
                                                        <use
                                                            xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/brand.svg#cib-cc-mastercard">
                                                        </use>
                                                    </svg>
                                                </td>
                                                <td>
                                                    <div class="small text-medium-emphasis">Last login</div>
                                                    <div class="fw-semibold">10 sec ago</div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-transparent p-0" type="button"
                                                            data-coreui-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <svg class="icon">
                                                                <use
                                                                    xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-options">
                                                                </use>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"><a
                                                                class="dropdown-item" href="#">Info</a><a
                                                                class="dropdown-item" href="#">Edit</a><a
                                                                class="dropdown-item text-danger" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- /.row-->
            </div>
        </div>
        <footer class="footer">
            <div>SIUMAS - Aplikasi Iuran Masyarakat <small>
                    <?= APP_VERSION ?>
                </small> © 2023</div>
            <div class="ms-auto">Powered by&nbsp;SIUMAS DEV</div>
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url('', true) ?>vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url('', true) ?>vendors/simplebar/js/simplebar.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="<?= base_url('', true) ?>vendors/chart.js/js/chart.min.js"></script>
    <script src="<?= base_url('', true) ?>vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="<?= base_url('', true) ?>vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="<?= base_url('', true) ?>js/main.js"></script>
    <script>
    </script>

</body>

</html>