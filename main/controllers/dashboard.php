<?php

class Dashboard extends Cdsm_controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load_view('dashboard');
    }
}