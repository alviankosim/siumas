<?php

class Users extends My_controller
{
    const ROLE_ID_ADMIN = 11;
    const ROLE_ID_PENAGIH = 22;

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        $data_users = $this->db->query('
            select * from m_users order by user_fullname asc
        ')->result();

        $this->load_view('admin/layout/header');
        $this->load_view('admin/users/index', ['data_users' => $data_users]);
        $this->load_view('admin/layout/footer');
    }

    public function add()
    {
        $this->load_view('admin/layout/header');
        $this->load_view('admin/users/add');
        $this->load_view('admin/layout/footer');
    }

    public function add_action()
    {
        $datas = [
            'user_name'     => daPost('user_name'),
            'user_fullname' => daPost('user_fullname'),
            'password'      => daPost('password'),
            'password_conf' => daPost('password_conf'),
            'nik'           => daPost('nik'),
            'role_id'       => daPost('role_id'),
        ];

        // validating
        $validate = $this->_validate($datas);
        if (!$validate) {
            set_message('error', $this->validator->get_error());
            redirect('users/add');
        }

        if ($datas['password'] != $datas['password_conf']) {
            set_message('error', 'Password Confirmation harus sama dengan password');
            redirect('users/add');
        }
        unset($datas['password_conf']);
        $datas['password'] = password_hash($datas['password'], PASSWORD_BCRYPT);

        // inserting new data
        $query = $this->db->query('
            INSERT INTO m_users
                ('. implode(',', array_map(function($n){return '`'. $n .'`';}, array_keys($datas))) .') 
                VALUES ('. implode(',', array_map(function(){return '?';}, array_keys($datas))) .');
        ', [...array_values($datas)], true);
        if (!$query) {
            set_message('error', 'Gagal menambahkan data pengguna');
            redirect('users/add');
        }

        set_message('success', 'Berhasil menambahkan data pengguna');
        redirect('users');
    }

    public function edit()
    {
        $id = daGet('id');
        if (!$id) {
            show_error('400 Bad Request ID is not valid');
        }

        // get data row
        $query = $this->db->query('
            select * from m_users where user_id = ?
        ', [$id])->row();
        if (!$query) {
            show_error('404 No Data is found');
        }

        $this->load_view('admin/layout/header');
        $this->load_view('admin/users/edit', ['row' => $query]);
        $this->load_view('admin/layout/footer');
    }

    public function edit_action()
    {
        $datas = [
            'id'            => daPost('id'),
            'user_fullname' => daPost('user_fullname'),
            'nik'           => daPost('nik'),
            'role_id'       => daPost('role_id'),
        ];
        if (daPost('password')) {
            $datas['password'] = daPost('password');
            $datas['password_conf'] = daPost('password_conf');
        }
        $id = $datas['id'];
        // echo $id;exit;

        // validating
        $validate = $this->_validate($datas, true);
        if (!$validate) {
            set_message('error', $this->validator->get_error());
            redirect('users/edit?id=' . $datas['id']);
        }
        unset($datas['id']);

        if (daPost('password')) {
            if ($datas['password'] != $datas['password_conf']) {
                set_message('error', 'Password Confirmation harus sama dengan password');
                redirect('users/edit?id=' . $id);
            }
            unset($datas['password_conf']);
            $datas['password'] = password_hash($datas['password'], PASSWORD_BCRYPT);
        }

        // updating new data
        $query = $this->db->query('
            UPDATE m_users
                SET '. implode(',', array_map(function($tb_name){return '`'. $tb_name .'`=?';}, array_keys($datas))) .'
            WHERE user_id = ?;
        ', [...array_values($datas), $id], true);
        if (!$query) {
            set_message('error', 'Gagal mengubah data pengguna');
            redirect('users/edit?id=' . $id);
        }

        set_message('success', 'Berhasil mengubah data pengguna');
        redirect('users');
    }

    private function _validate($datas, $is_edit = false)
    {
        if ($is_edit) {
            $rules = [
                'user_fullname' => ['required', 'min_length[5]', 'trim'],
                'nik'           => ['required', 'min_length[16]', 'trim'],
                'role_id'       => ['required'],
            ];
            if ($datas['password'] ?? null) {
                $rules['password'] = ['required', 'min_length[8]', 'trim'];
            }
        } else {
            $rules = [
                'user_fullname' => ['required', 'min_length[5]', 'trim'],
                'user_name'     => ['required', 'min_length[5]', 'trim'],
                'password'      => ['required', 'min_length[8]', 'trim'],
                'nik'           => ['required', 'min_length[16]', 'trim'],
                'role_id'       => ['required'],
            ];
        }

        // validator
        $this->validator->set_source($datas);
        $this->validator->set_rules($rules);

        return $this->validator->validate();
    }

    public function delete_action()
    {
        $id = daPost('id');
        if (!$id) {
            echo 'error';exit;
        }

        $query = $this->db->query('
            delete from m_users where user_id = ?
        ', [$id], true);
        if (!$query) {
            echo 'error';exit;
        }

        echo 'success';
        set_message('success', 'Sukses menghapus data pengguna');
    }
    
}