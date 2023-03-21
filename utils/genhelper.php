<?php
/**
 * genhelper.php
 * author: @alviankosim
 */

if (!function_exists('my_sess')) {
    function my_sess($index)
    {
        if (isset($_SESSION['user_data'])) {
            return $_SESSION['user_data'][$index];
        } else {
            return null;
        }
    }
}

if (!function_exists('set_sess')) {
    function set_sess($data)
    {
        $_SESSION['user_data'] = $data;
    }
}

if (!function_exists('base_url')) {
    /**
     * Function untuk mendapatkan base url dari website
     * @param string path
     * @return string url
     * @author alviankosim
     */
    function base_url($extra = "", $is_assets = false)
    {
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://';
        $host  = $_SERVER['HTTP_HOST'] . '/' . APP_FOLDER . ($is_assets ? ('/' . 'assets/core/dist') : '');
        return "$protocol$host/$extra";
    }
}

if (!function_exists('print_stars')) {
    /**
     * Function untuk dapatkan output bintang sesuai jumlah yang dimasukkan
     * @param int stars
     * @author alviankosim
     */
    function print_stars($stars_count)
    {
        $stars = "⭐";
        return str_repeat($stars, $stars_count);
    }
}

if (!function_exists('censor_name')) {
    /**
     * Function untuk dapatkan output username yang disensor
     * @param string username
     * @author alviankosim
     */
    function censor_name($username)
    {
        return substr($username, 0,3) . "*****";
    }
}

if (!function_exists('check_login')) {
    /**
     * Function untuk cek login
     * @author alviankosim
     */
    function check_login()
    {
        if (my_sess('user_name')) {
            //kali aja dibutuhin nanti
            return true;
        }
        return false;
        // else {
        //     // header("HTTP/1.1 401 Unauthorized");
        //     // echo '<head><title>401 Unauthorized</title><link rel="icon" type="image/png" sizes="192x192" href="/asd.png"></head><div style="width: 100%;height: 100%;display: flex; justify-content: center;align-items: center;color: #333;font-family:\'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif">401 | Unauthorized</div>';
        //     // exit();
        // }
    }
}

if (!function_exists('checkIsAdmin')) {
    /**
     * Function untuk cek login apakah dia admin
     * @author alviankosim
     */
    function checkIsAdmin()
    {
        if (my_sess('is_admin')) {
            //kali aja dibutuhin nanti
        } else {
            show_error('401 Unauthorized');
        }
    }
}

if (!function_exists('format_rupiah')) {
    /**
     * Function untuk cek login apakah dia admin
     * @author alviankosim
     */
    function format_rupiah($number)
    {
        return 'Rp ' . number_format(($number), 0, ',', '.');
    }
}

if (!function_exists('show_error')) {
    /**
     * Function untuk cek login apakah dia admin
     * @author alviankosim
     */
    function show_error($error_text)
    {
        $error_textt = '';
        $pos = strpos($error_text, ' ');
        if ($pos !== false) {
            $error_textt = substr_replace($error_text, ' | ', $pos, strlen(' '));
        }
        header("HTTP/1.1 ". $error_text ."");
        echo '<head><title>'. $error_text .'</title><link rel="icon" type="image/png" sizes="192x192" href="/asd.png"></head><div style="width: 100%;height: 100%;display: flex; justify-content: center;align-items: center;color: #333;font-family:\'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif">'. $error_textt .'</div>';
        exit;
    }
}