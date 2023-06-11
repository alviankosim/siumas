<?php

include_once APP_PATH . 'core/db.php';

class M_Keluarga 
{
    // class property
    protected int $keluarga_id;
    protected string $keluarga_name;
    protected string $no_kk;
    protected string $address;
    protected int $member_count;
    protected int $type;
    protected int $status;

    // utility
    protected $db;
    const TYPE_MAMPU = 1;
    const TYPE_MISKIN = 2;
    
    public function __construct($id)
    {
        $this->db = new DB();
        $fetch = null;
        if ($id) {
            $fetch = $this->db->get_where('m_keluarga', ['keluarga_id' => $id])->row();
        }

        $this->keluarga_id   = $fetch ? $fetch->keluarga_id : uniqid();
        $this->keluarga_name = $fetch ? $fetch->keluarga_name : '';
        $this->no_kk         = $fetch ? $fetch->no_kk : '';
        $this->address       = $fetch ? $fetch->address : '';
        $this->member_count  = $fetch ? $fetch->member_count : (new DateTime());
        $this->type          = $fetch ? $fetch->type : '';
        $this->status        = $fetch ? $fetch->status : '';
    }

    // method
    public function get_list()
    {
        $q = daGet('q');
        $data = $this->db->query('
            select mk.keluarga_id as id, mk.keluarga_name as text from m_keluarga mk where mk.status = ? and mk.`type` = ? and (mk.keluarga_name LIKE ? OR mk.no_kk LIKE ?)
        ', [STATUS_ACTIVE, self::TYPE_MAMPU, "%$q%", "%$q%"])->result();

        echo json_encode([
            'results' => $data
        ]);
    }

    public function create($data)
    {
        return $this->db->insert('m_keluarga', $data);
    }

    public function update($data)
    {
        return $this->db->update('m_keluarga', $data);
    }

    public function delete()
    {
        return $this->db->delete('m_keluarga', $this);
    }

    public function login()
    {
        return set_sess($this);
    }

    public function logout()
    {
        return session_destroy();
    }
}
