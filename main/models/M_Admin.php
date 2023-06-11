<?php

include_once APP_PATH . 'main/models/M_User.php';

class M_Admin extends M_User
{    
    
    public function __construct($id)
    {
        parent::__construct($id);
        $this->role_id       = self::ROLE_ID_ADMIN;

        return $this;
    }
}
