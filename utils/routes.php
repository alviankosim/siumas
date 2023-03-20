<?php

//default route // dashboard for masyarakat
$_default_route = 'dashboard.index';

$_routes = [
    // authentication related things
    '/login' => 'login.index',
    '/login_action' => 'login.login_action',
    '/logout_action' => 'login.logout_action',

    // authenticated user menu
    '/iuran' => 'iuran.index',
    '/iuran/add' => 'iuran.add',
    '/keluarga/ajax' => 'keluarga.ajax',
    '/keluarga/ajax_periode' => 'keluarga.ajax_periode',
];