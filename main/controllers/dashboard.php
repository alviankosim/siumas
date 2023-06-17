<?php

include_once APP_PATH . 'main/controllers/pengeluaran.php';

class Dashboard extends Cdsm_controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // get current progress for pengeluaran
        $current_done = $this->db->query('
            select count(1) total from t_pengeluaran tp where tp.status = '. Pengeluaran::PENGELUARAN_STATUS_DONE .'
        ')->row()->total;
        $current_total = $this->db->query('
            select count(1) total from t_pengeluaran tp
        ')->row()->total;

        // keluarga
        $total_family = $this->db->query('
            select count(1) total from m_keluarga tp
        ')->row()->total;

        // iuran
        $total_iuran_eom = $this->db->query('
            SELECT sum(total_amount) total FROM `t_iuran`;
        ')->row()->total;
        $total_iuran_paid = $this->db->query('
            SELECT sum(total_amount) total FROM `t_iuran` where paid_date is not null;
        ')->row()->total;
        $total_iuran_with_denda = $this->db->query('
            SELECT count(1) total FROM `t_iuran` where denda_amount > 0;
        ')->row()->total;

        $this->load_view('dashboard', [
            'current_done'     => $current_done,
            'current_total'    => $current_total,
            'total_family'     => $total_family,
            'total_iuran_eom'  => $total_iuran_eom,
            'total_iuran_paid' => $total_iuran_paid,
            'total_iuran_with_denda' => $total_iuran_with_denda,
        ]);
    }
    public function ajax_chart()
    {
        $chart_result = $this->db->query('
            select month(due_date) damonth, sum(total_amount) datotal from t_iuran where year(due_date) = 2023 group by MONTH(due_date) order by damonth;
        ')->result();

        echo json_encode($chart_result);
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