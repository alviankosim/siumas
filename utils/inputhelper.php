<?php
/**
 * inputhelper.php
 * author: @alviankosim
 */

function _daInput($type, $index){

    if ($type == 'post') {
        $method = $_POST;
    } else {
        $method = $_GET;
    }

    if (isset($method) && isset($method[$index])) {
        return $method[$index];
    } else {
        return null;
    }
}

/**
 * Function untuk mendapatkan $_POST dengan aman (null and undefined safe)
 * @param string
 * @author alviankosim
 */
function daPost($index){
    return _daInput('post',$index);
}
/**
 * Function untuk mendapatkan $_GET dengan aman (null and undefined safe)
 * @param string
 * @author alviankosim
 */
function daGet($index){
    return _daInput('get',$index);
}

/**
 * Function untuk redirect url ketika ada error atau lainnya
 * @param string
 * @author alviankosim
 */
function redirect($path)
{
    $base_url = base_url($path);
    header("Location: $base_url");
    exit();
}

/**
 * Function untuk mengisi message
 * @param string $type
 * @param string $message
 * @author alviankosim
 */
function set_message($_type, $message)
{

    $dataSession = array(
        'type' => $_type == 'error' ? 'danger' : 'success',
        'message' => $message
    );
    $_SESSION['message'] = $dataSession;
}

/**
 * Function untuk menampilkan message
 * @return void
 */
function show_message()
{
    $return = "";
    if (isset($_SESSION) && isset($_SESSION['message'])) {
        $return = '
            <div class="alert alert-'. $_SESSION['message']['type'] .' alert-dismissible fade show" role="alert">
                <strong>'. ucfirst($_SESSION['message']['type'] == 'danger' ? 'error' : 'success') .'</strong> '. $_SESSION['message']['message'] .'
                <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
        unset($_SESSION['message']);
    }

    return $return;
}