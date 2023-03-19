<?php

/**
 * index.php file
 * author: @alviankosim
 */
//set default timezone
date_default_timezone_set('Asia/Jakarta');

include './utils/config.php';
include './utils/routes.php';
include './core/cdsm_controller.php';
include './core/session.php';

// include the helper
include_once $_SERVER['DOCUMENT_ROOT'] . '/' . APP_FOLDER . '/' . 'utils/genhelper.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/' . APP_FOLDER . '/' . 'utils/inputhelper.php';

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$arr_links = [...array_filter((explode('/',$_SERVER['REQUEST_URI'])), fn($value) => !is_null($value) && !in_array($value, ['','index.php',APP_FOLDER]))];

$_current_routes = null;
$_current_function = null;
if (count($arr_links) > 0) {
  // finding current routes
  foreach ($_routes as $key => $value) {
    $flag = true;
    $_current_routes = $value;

    $new_value = $value;
    
    if (strstr($value, '.')) {
      $exploded_value = explode('.', $new_value);
      $_current_routes = $exploded_value[0];
      $_current_function = $exploded_value[1];
    }

    $arr_routes = [...array_filter(explode('/',$key))];
    
    foreach ($arr_routes as $inner_key => $inner_value) {
      if (isset($arr_links[$inner_key])) {

        if ($arr_links[$inner_key] != $_current_routes) $flag = false;
      }
    }
    
    
    if ($flag) break;
  }
} else {
  $exploded_default_route = explode('.', $_default_route);
  $_current_routes = $exploded_default_route[0];
  $_current_function = count($exploded_default_route) > 1 ? $exploded_default_route[1] : null;
}

// include the controllers
include './' . Cdsm_controller::CONTROLLERS_LOCATION . $_current_routes . '.php';

$_current_controller = ucfirst($_current_routes);

$controller = new $_current_controller();

if ($_current_function) {
  $controller->$_current_function();
}