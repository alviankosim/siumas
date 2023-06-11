<?php

include_once APP_PATH . 'core/db.php';

class M_User 
{
    // class property
    protected int $user_id;
    protected string $user_name;
    protected string $user_fullname;
    protected string $password;
    protected int $role_id;
    protected DateTime $last_login;
    protected string $nik;

    // utility
    protected $db;
    const ROLE_ID_ADMIN = 11;
    const ROLE_ID_PENAGIH = 22;
    
    public function __construct($id)
    {
        $this->db = new DB();
        $fetch = null;
        if ($id) {
            $fetch = $this->db->get_where('users', ['user_id' => $id])->row();
        }

        $this->user_id       = $fetch ? $fetch->user_id : uniqid();
        $this->user_name     = $fetch ? $fetch->user_name : '';
        $this->user_fullname = $fetch ? $fetch->user_fullname : '';
        $this->password      = $fetch ? $fetch->password : '';
        $this->last_login    = $fetch ? $fetch->last_login : (new DateTime());
        $this->nik           = $fetch ? $fetch->nik : '';
    }

    // method
    public function create($data)
    {
        return $this->db->insert('m_users', $data);
    }

    public function update($data)
    {
        return $this->db->update('m_users', $data);
    }

    public function delete()
    {
        return $this->db->delete('m_users', $this);
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
