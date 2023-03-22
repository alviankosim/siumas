<?php
/**
 * cdsm.php
 * author: @alviankosim
 */

 include_once APP_PATH . 'core/db.php';
 include_once APP_PATH . 'core/validator.php';
 include_once APP_PATH . 'core/uploader.php';

class Cdsm_controller
{
    protected $db;
    protected $validator;
    protected $uploader;

    const CONTROLLERS_LOCATION = 'main/controllers/';
    const VIEW_LOCATION = 'main/views/';

    function __construct()
    {
        return $this->_init();
    }

    private function _init()
    {
        // binding db
        $mysqli = new DB();
        $this->db = $mysqli;

        // binding validator
        $validator = new Validator();
        $this->validator = $validator;

        // binding uploader
        $uploader = new Uploader();
        $this->uploader = $uploader;
    }

    protected function load_view($_file_path, $variables = array(), $print = true)
    {
        $file_path = APP_PATH .  self::VIEW_LOCATION . $_file_path . '.php';

        $output = NULL;
        if(file_exists($file_path)){
            // Extract the variables to a local namespace
            extract($variables);
    
            // Start output buffering
            ob_start();
    
            // Include the template file
            include $file_path;
    
            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            print $output;
        }
        return $output;
    
    }

    protected function send_json($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
