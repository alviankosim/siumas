<?php

class Iuran extends My_controller
{
    const IURAN_KEBERSIHAN = 10;
    const IURAN_KEAMANAN = 20;

    const IURAN_KEBERSIHAN_AMOUNT = 10000;
    const IURAN_KEAMANAN_AMOUNT = 5000;
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        $data_iuran = $this->db->query('
            select ti.*,mk.keluarga_name
            from t_iuran ti left join m_keluarga mk on ti.keluarga_id = mk.keluarga_id         
        ')->result();

        $this->load_view('admin/layout/header');
        $this->load_view('admin/iuran/index', ['data_iuran' => $data_iuran]);
        $this->load_view('admin/layout/footer');
    }

    public function add()
    {
        $this->load_view('admin/layout/header');
        $this->load_view('admin/iuran/add');
        $this->load_view('admin/layout/footer');
    }
    
}