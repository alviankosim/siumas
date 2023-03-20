<?php

class My_controller extends Cdsm_controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        // include the check login
        if (!check_login()) redirect('/');
    }
    
}