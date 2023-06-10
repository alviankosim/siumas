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
    public function tentang()
    {
        $this->load_view('tentang');
    }
    public function snk()
    {
        $this->load_view('syarat-ketentuan');
    }
    public function faq()
    {
        $this->load_view('faq');
    }
}