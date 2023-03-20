<?php

class Keluarga extends My_controller
{   
    const TYPE_MAMPU = 1;
    const TYPE_MISKIN = 2;

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        // $data_iuran = $this->db->query('
        //     select ti.*,mk.keluarga_name
        //     from t_iuran ti left join m_keluarga mk on ti.keluarga_id = mk.keluarga_id         
        // ')->result();

        // $this->load_view('admin/layout/header');
        // $this->load_view('admin/iuran/index', ['data_iuran' => $data_iuran]);
        // $this->load_view('admin/layout/footer');
    }

    public function add()
    {
        // $this->load_view('admin/layout/header');
        // $this->load_view('admin/iuran/add');
        // $this->load_view('admin/layout/footer');
    }

    public function ajax()
    {
        $q = daGet('q');
        $data = $this->db->query('
            select mk.keluarga_id as id, mk.keluarga_name as text from m_keluarga mk where mk.status = ? and mk.`type` = ? and (mk.keluarga_name LIKE ? OR mk.no_kk LIKE ?)
        ', [STATUS_ACTIVE, self::TYPE_MAMPU, "%$q%", "%$q%"])->result();

        echo json_encode([
            'results' => $data
        ]);
    }

    public function ajax_periode()
    {
        $q = daGet('q');
        $periode = daGet('periode');
        
        $exploded_periode = explode('-', $periode);
        $month = $exploded_periode[0];
        $year = $exploded_periode[1];
        
        $data = $this->db->query('
            select mk.keluarga_id as id, mk.keluarga_name as text,
                (select EXISTS(select * from t_iuran ti where keluarga_id = mk.keluarga_id and MONTH(due_date) = ? and YEAR(due_date) = ?)) as exist
            from m_keluarga mk where mk.status = ? and mk.`type` = ? and (mk.keluarga_name LIKE ? OR mk.no_kk LIKE ?)
        ', [$month, $year, STATUS_ACTIVE, self::TYPE_MAMPU, "%$q%", "%$q%"])->result();

        echo json_encode([
            'results' => $data
        ]);
    }
    
}