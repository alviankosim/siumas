<?php

class Login extends Cdsm_controller
{
    const ROLE_ID_ADMIN = 11;
    const ROLE_ID_PENAGIH = 22;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (check_login()) {
            redirect('iuran');
        }
        $this->load_view('login');
    }

    public function login_action()
    {
        if (check_login()) {
            redirect('iuran');
        }
        $datas = [
            'username' => daPost('username'),
            'password' => daPost('password'),
        ];

        // validating
        $validate = $this->_validate($datas);
        if (!$validate) {
            set_message('error', $this->validator->get_error());
            redirect('login');
        }

        $query = $this->db->query('select * from m_users where user_name = ? limit 1', [$datas['username']]);
        $row = $query->row();
        if (!$row) {
            set_message('error', 'Mohon cek username atau password');
            redirect('login');
        }

        if (!password_verify($datas['password'], $row->password)) {
            set_message('error', 'Mohon cek username atau password');
            redirect('login');
        }

        // setting up session
        $session = [
            'user_name'     => $row->user_name,
            'user_id'       => $row->user_id,
            'user_fullname' => $row->user_fullname,
            'role_id' => $row->role_id,
        ];
        set_sess($session);

        redirect('iuran');
    }

    private function _validate($datas)
    {
        // validator
        $this->validator->set_source($datas);
        $this->validator->set_rules([
            'username' => ['required','trim','min_length[5]'],
            'password' => ['required','trim','min_length[8]'],
        ]);

        return $this->validator->validate();
    }

    public function logout_action()
    {
        session_destroy();
        redirect('');
    }
    
}