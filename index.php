<?php

/**
 * index.php file
 * author: @alviankosim
 */
//set default timezone
date_default_timezone_set('Asia/Jakarta');

// UTILS
include './utils/config.php';
include './utils/constants.php';
include './utils/routes.php';

//define app path
define('APP_PATH', $_SERVER['DOCUMENT_ROOT'] . '/' . APP_FOLDER . '/');

// CORE
include './core/cdsm_controller.php';
include './core/my_controller.php';
include './core/session.php';

// include the helper
include_once APP_PATH . 'utils/genhelper.php';
include_once APP_PATH . 'utils/inputhelper.php';

$actual_link = strtok((empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '?');
$arr_links = [...array_filter((explode('/',strtok($_SERVER['REQUEST_URI'], '?'))), fn($value) => !is_null($value) && !in_array($value, ['','index.php',APP_FOLDER]))];

$_current_routes = null;
$_current_function = null;
if (count($arr_links) > 0) {
  // finding current routes
  foreach ($_routes as $key => $value) {
    $flag = true;

    $new_value = $value;
    if (strstr($new_value, '.')) {
      $new_value = explode('.', $new_value);
    }

    $arr_routes = [...array_filter(explode('/',$key))];
    // var_dump($arr_routes);
    
    $inner_flag = true;
    foreach ($arr_links as $inner_key => $inner_value) {
      // var_dump($arr_links, $inner_key, $_current_routes, $inner_value);
      if (isset($arr_routes[$inner_key])) {
        if ($arr_routes[$inner_key] != $inner_value) $inner_flag = false;
      } else {
        $inner_flag = false;
      }

      if (!$inner_flag) {
        $flag = false;
        break;
      }
    }

    // var_dump($flag);
    // echo '<br>';
    
    if ($flag) {
      if (is_array($new_value)) {
        $_current_routes = $new_value[0];
        $_current_function = $new_value[1];
      } else {
        $_current_routes = $new_value;
      }
      break;
    }
  }

  // exit;

  if (!$_current_routes && !$_current_routes) {
    header("HTTP/1.1 404 Not Found");
    echo '<head><title>404 Page Not Found</title><link rel="icon" type="image/png" sizes="192x192" href="/asd.png"></head><div style="width: 100%;height: 100%;display: flex; justify-content: center;align-items: center;color: #333;font-family:\'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif">404 | Not Found</div>';
    exit;
  }
} else {
  $exploded_default_route = explode('.', $_default_route);
  $_current_routes = $exploded_default_route[0];
  $_current_function = count($exploded_default_route) > 1 ? $exploded_default_route[1] : null;
}

$_current_controller = ucfirst($_current_routes);

// include the controllers
include './' . Cdsm_controller::CONTROLLERS_LOCATION . $_current_routes . '.php';

$controller = new $_current_controller();

if ($_current_function) {
  $controller->$_current_function();
}