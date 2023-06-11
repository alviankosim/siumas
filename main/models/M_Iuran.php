<?php

include_once APP_PATH . 'core/db.php';

class M_Iuran
{
    // class property
    protected int $iuran_id;
    protected int $amount;
    protected int $type;
    protected DateTime $paid_date;
    protected DateTime $due_date;
    protected Keluarga $keluarga_id;
    protected int $total_amount;
    protected int $denda_amount;

    // utility
    protected $db;
    const IURAN_KEBERSIHAN = 10;
    const IURAN_KEAMANAN = 20;

    const IURAN_KEBERSIHAN_AMOUNT = 10000;
    const IURAN_KEAMANAN_AMOUNT = 5000;
    
    public function __construct($id)
    {
        $this->db = new DB();
        $fetch = null;
        if ($id) {
            $fetch = $this->db->get_where('t_iuran', ['iuran_id' => $id])->row();
        }

        $this->iuran_id     = $fetch ? $fetch->iuran_id : uniqid();
        $this->amount       = $fetch ? $fetch->amount : 0;
        $this->type         = $fetch ? $fetch->type : '';
        $this->paid_date    = $fetch ? $fetch->paid_date : (new DateTime());
        $this->due_date     = $fetch ? $fetch->due_date : (new DateTime());
        $this->keluarga_id  = $fetch ? $fetch->keluarga_id : (new Keluarga($id));
        $this->total_amount = $fetch ? $fetch->total_amount : 0;
        $this->denda_amount = $fetch ? $fetch->denda_amount : 0;
    }

    // method
    public function get_list()
    {
        $data_iuran = $this->db->query('
            select ti.*,mk.keluarga_name
            from t_iuran ti left join m_keluarga mk on ti.keluarga_id = mk.keluarga_id         
            order by mk.keluarga_name asc, ti.paid_date asc, ti.due_date desc
        ')->result();

        echo json_encode([
            'results' => $data_iuran
        ]);
    }

    public function create($data)
    {
        return $this->db->insert('t_iuran', $data);
    }

    public function update($data)
    {
        return $this->db->update('t_iuran', $data);
    }

    public function delete()
    {
        return $this->db->delete('t_iuran', $this);
    }

    public function pay()
    {
        $id = daPost('id');
        if (!$id) {
            echo 'error';exit;
        }

        $query = $this->db->query('
            update t_iuran set paid_date = NOW() where iuran_id = ?
        ', [$id], true);
        if (!$query) {
            echo 'error';exit;
        }

        echo 'success';
    }

    public function unpay()
    {
        $id = daPost('id');
        if (!$id) {
            echo 'error';exit;
        }

        $query = $this->db->query('
            update t_iuran set paid_date = NULL where iuran_id = ?
        ', [$id], true);
        if (!$query) {
            echo 'error';exit;
        }

        echo 'success';
    }
    
}
