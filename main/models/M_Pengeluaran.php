<?php

include_once APP_PATH . 'core/db.php';

class M_Pengeluaran
{
    // class property
    protected int $pengeluaran_id;
    protected string $pengeluaran_name;
    protected string $pengeluaran_description;
    protected DateTime $pengeluaran_date;
    protected DateTime $created_date;
    protected int $amount;
    protected int $total_amount;
    protected int $status;

    // utility
    protected $db;
    const PENGELUARAN_STATUS_NEW = 11;
    const PENGELUARAN_STATUS_PROGRESS = 22;
    const PENGELUARAN_STATUS_DONE = 33;
    
    public function __construct($id)
    {
        $this->db = new DB();
        $fetch = null;
        if ($id) {
            $fetch = $this->db->get_where('t_pengeluaran', ['pengeluaran_id' => $id])->row();
        }

        $this->pengeluaran_id          = $fetch ? $fetch->pengeluaran_id : uniqid();
        $this->pengeluaran_name        = $fetch ? $fetch->pengeluaran_name : '';
        $this->pengeluaran_description = $fetch ? $fetch->pengeluaran_description : '';
        $this->pengeluaran_date        = $fetch ? $fetch->pengeluaran_date : (new DateTime());
        $this->created_date            = $fetch ? $fetch->created_date : (new DateTime());
        $this->amount                  = $fetch ? $fetch->amount : 0;
        $this->total_amount            = $fetch ? $fetch->total_amount : 0;
        $this->status                  = $fetch ? $fetch->status : STATUS_ACTIVE;
    }

    // method
    public function get_list()
    {
        $data_pengeluaran = $this->db->query("
            select tp.*,
            (
            SELECT coalesce(CONCAT(
                '[', 
                GROUP_CONCAT(JSON_OBJECT('id', pi2.pengeluaran_image_id, 'image', pi2.`path`)),
                ']'
            ), '[]') 
            FROM pengeluaran_images pi2 where pi2.pengeluaran_id = tp.pengeluaran_id
            )
            as images from t_pengeluaran tp
        ")->result();

        echo json_encode([
            'results' => $data_pengeluaran
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

    public function process()
    {
        $id = daPost('id');
        if (!$id) {
            echo 'error';exit;
        }

        $query = $this->db->query('
            update t_pengeluaran set status = ? where pengeluaran_id = ?
        ', [self::PENGELUARAN_STATUS_PROGRESS, $id], true);
        if (!$query) {
            echo 'error';exit;
        }

        echo 'success';
    }

    public function done()
    {
        $id = daPost('id');
        if (!$id) {
            echo 'error';exit;
        }

        $query = $this->db->query('
            update t_pengeluaran set status = ? where pengeluaran_id = ?
        ', [self::PENGELUARAN_STATUS_DONE, $id], true);
        if (!$query) {
            echo 'error';exit;
        }

        echo 'success';
    }
    
}
