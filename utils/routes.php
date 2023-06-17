<?php

//default route // dashboard for masyarakat
$_default_route = 'dashboard.index';

$_routes = [
    // authentication related things
    '/login'         => 'login.index',
    '/login_action'  => 'login.login_action',
    '/logout_action' => 'login.logout_action',

    // navigation
    '/tentang'          => 'dashboard.tentang',
    '/syarat-ketentuan' => 'dashboard.snk',
    '/faq'              => 'dashboard.faq',
    '/ajax_chart'       => 'dashboard.ajax_chart',

    // authenticated user menu
    '/iuran'               => 'iuran.index',
    '/iuran/add'           => 'iuran.add',
    '/iuran/add_action'    => 'iuran.add_action',
    '/iuran/edit'          => 'iuran.edit',
    '/iuran/edit_action'   => 'iuran.edit_action',
    '/iuran/delete_action' => 'iuran.delete_action',
    '/iuran/pay_action'    => 'iuran.pay_action',
    '/iuran/unpay_action'  => 'iuran.unpay_action',

    '/keluarga'               => 'keluarga.index',
    '/keluarga/add'           => 'keluarga.add',
    '/keluarga/add_action'    => 'keluarga.add_action',
    '/keluarga/edit'          => 'keluarga.edit',
    '/keluarga/edit_action'   => 'keluarga.edit_action',
    '/keluarga/delete_action' => 'keluarga.delete_action',
    '/keluarga/ajax'          => 'keluarga.ajax',
    '/keluarga/ajax_periode'  => 'keluarga.ajax_periode',

    '/users'               => 'users.index',
    '/users/add'           => 'users.add',
    '/users/add_action'    => 'users.add_action',
    '/users/edit'          => 'users.edit',
    '/users/edit_action'   => 'users.edit_action',
    '/users/delete_action' => 'users.delete_action',

    '/pengeluaran'                          => 'pengeluaran.index',
    '/pengeluaran/add'                      => 'pengeluaran.add',
    '/pengeluaran/add_action'               => 'pengeluaran.add_action',
    '/pengeluaran/edit'                     => 'pengeluaran.edit',
    '/pengeluaran/edit_action'              => 'pengeluaran.edit_action',
    '/pengeluaran/delete_action'            => 'pengeluaran.delete_action',
    '/pengeluaran/process_action'           => 'pengeluaran.process_action',
    '/pengeluaran/done_action'              => 'pengeluaran.done_action',
    '/pengeluaran/ajax_delete_image_action' => 'pengeluaran.ajax_delete_image_action',
];