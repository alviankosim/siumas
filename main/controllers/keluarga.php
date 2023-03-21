<?php

// using iuran and denda
include_once APP_PATH . 'main/controllers/iuran.php';
include_once APP_PATH . 'main/controllers/denda.php';
class Keluarga extends My_controller
{   
    const TYPE_MAMPU = 1;
    const TYPE_MISKIN = 2;

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
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
            select 
                ss.*,
                ss.*, cast(IF(ss.exist_kebersihan = 1, 0, IF(MONTH(NOW()) > ?, ?, 0)) as int) as denda_kebersihan,
                ss.*, cast(IF(ss.exist_keamanan = 1, 0, IF(MONTH(NOW()) > ?, ?, 0)) as int) as denda_keamanan
            from (
                select mk.keluarga_id as id, mk.keluarga_name as text,
                    (select EXISTS(select * from t_iuran ti where keluarga_id = mk.keluarga_id and MONTH(due_date) = ? and YEAR(due_date) = ? and ti.type = ?)) as exist_kebersihan,
                    (select EXISTS(select * from t_iuran ti where keluarga_id = mk.keluarga_id and MONTH(due_date) = ? and YEAR(due_date) = ? and ti.type = ?)) as exist_keamanan
                from m_keluarga mk where mk.status = ? and mk.`type` = ? and (mk.keluarga_name LIKE ? OR mk.no_kk LIKE ?)
            ) ss
        ', [
                $month, Denda::DENDA_KEBERSIHAN_AMOUNT,
                $month, Denda::DENDA_KEAMANAN_AMOUNT,
                $month, $year, Iuran::IURAN_KEBERSIHAN, 
                $month, $year, Iuran::IURAN_KEAMANAN, 
                STATUS_ACTIVE, self::TYPE_MAMPU, "%$q%", "%$q%"
            ])->result();

        $this->send_json([
            'results' => $data
        ]);
    }
    
}