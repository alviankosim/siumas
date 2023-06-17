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
    <title>FAQ -
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
                <!-- <ul class="header-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Login</a></li>
                </ul> -->
            </div>
        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <!-- Hero -->
                <div class="p-5 rounded-3" style="height: auto;">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-black text-left" style="text-align: justify;">
                            <h2>FAQ (Frequently Asked Questions)</h2>
                            </br>
                            <h4>1. Apa itu SIUMAS?</h4>
                            <p>SIUMAS adalah Aplikasi Iuran Masyarakat yang dikembangkan untuk mempermudah pencatatan
                                iuran dalam lingkungan masyarakat tingkat dasar (RT/RW atau Desa).</p>

                            <h4>2. Siapa yang menjadi sasaran aplikasi SIUMAS?</h4>
                            <p>Sasaran aplikasi ini adalah warga dan pengurus desa yang bertugas untuk melakukan
                                pencatatan iuran keamanan dan kebersihan di lingkungan tersebut.</p>

                            <h4>3. Bagaimana SIUMAS membantu pengurus desa?</h4>
                            <p>SIUMAS mempermudah pengurus desa dalam mencatat iuran dengan cepat dan akurat, mengelola
                                data iuran, dan menghasilkan laporan yang akurat.</p>

                            <h4>4. Apakah SIUMAS menggantikan proses manual?</h4>
                            <p>Ya, SIUMAS menggantikan proses manual yang sering kali rumit dan memakan waktu dengan
                                sistem pencatatan iuran secara elektronik.</p>

                            <h4>5. Bagaimana SIUMAS mengelola data iuran?</h4>
                            <p>SIUMAS menyediakan fitur manajemen data yang lengkap. Pengurus desa dapat melihat dan
                                mengelola catatan iuran secara keseluruhan, memperbarui status pembayaran, dan melacak
                                riwayat iuran setiap anggota masyarakat.</p>

                            <h4>6. Apakah ada denda keterlambatan pembayaran iuran?</h4>
                            <p>Ya, masyarakat yang terlambat membayar iuran akan dikenakan denda sebesar Rp 5000 setiap
                                keterlambatan. Denda akan diakumulasi pada iuran selanjutnya.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Hero -->
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