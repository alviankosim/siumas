<?php

class Login extends Cdsm_controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load_view('login');
    }

    public function login_action()
    {
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

        $query = $this->db->query('select * from users where user_name = ? limit 1', [$datas['username']]);
        $row = $query->row();
        if (!$row) {
            set_message('error', 'Mohon cek username atau password');
            redirect('login');
        }

        if (!password_verify($datas['password'], $row->password)) {
            set_message('error', 'Mohon cek username atau password');
            redirect('login');
        }

        echo 'bengnar';
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
    
}