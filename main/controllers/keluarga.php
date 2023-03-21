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

    public function index()
    {
        $data_keluarga = $this->db->query('
            select * from m_keluarga order by keluarga_name asc
        ')->result();

        $this->load_view('admin/layout/header');
        $this->load_view('admin/keluarga/index', ['data_keluarga' => $data_keluarga]);
        $this->load_view('admin/layout/footer');
    }

    public function add()
    {
        $this->load_view('admin/layout/header');
        $this->load_view('admin/keluarga/add');
        $this->load_view('admin/layout/footer');
    }

    public function add_action()
    {
        $datas = [
            'keluarga_name' => daPost('keluarga_name'),
            'no_kk'         => daPost('no_kk'),
            'member_count'  => daPost('member_count'),
            'type'          => daPost('type'),
            'status'        => daPost('status'),
            'address'       => daPost('address'),
        ];

        // validating
        $validate = $this->_validate($datas);
        if (!$validate) {
            set_message('error', $this->validator->get_error());
            redirect('keluarga/add');
        }

        // inserting new data
        $query = $this->db->query('
            INSERT INTO m_keluarga
                ('. implode(',', array_map(function($n){return '`'. $n .'`';}, array_keys($datas))) .') 
                VALUES ('. implode(',', array_map(function(){return '?';}, array_keys($datas))) .');
        ', [...array_values($datas)], true);
        if (!$query) {
            set_message('error', 'Gagal menambahkan data keluarga');
            redirect('keluarga/add');
        }

        set_message('success', 'Berhasil menambahkan data keluarga');
        redirect('keluarga');
    }

    public function edit()
    {
        $id = daGet('id');
        if (!$id) {
            show_error('400 Bad Request ID is not valid');
        }

        // get data row
        $query = $this->db->query('
            select * from m_keluarga where keluarga_id = ?
        ', [$id])->row();
        if (!$query) {
            show_error('404 No Data is found');
        }

        $this->load_view('admin/layout/header');
        $this->load_view('admin/keluarga/edit', ['row' => $query]);
        $this->load_view('admin/layout/footer');
    }

    public function edit_action()
    {
        $datas = [
            'id'            => daPost('id'),
            'keluarga_name' => daPost('keluarga_name'),
            'no_kk'         => daPost('no_kk'),
            'member_count'  => daPost('member_count'),
            'type'          => daPost('type'),
            'status'        => daPost('status'),
            'address'       => daPost('address'),
        ];
        $id = $datas['id'];

        // var_dump($datas);exit;
        // validating
        $validate = $this->_validate($datas, true);
        if (!$validate) {
            set_message('error', $this->validator->get_error());
            redirect('keluarga/edit?id=' . $datas['id']);
        }
        unset($datas['id']);

        // updating new data
        $query = $this->db->query('
            UPDATE m_keluarga
                SET '. implode(',', array_map(function($tb_name){return '`'. $tb_name .'`=?';}, array_keys($datas))) .'
            WHERE keluarga_id = ?;
        ', [...array_values($datas), $id], true);
        if (!$query) {
            set_message('error', 'Gagal mengubah data keluarga');
            redirect('keluarga/edit?id=' . $id);
        }

        set_message('success', 'Berhasil mengubah data keluarga');
        redirect('keluarga');
    }

    private function _validate($datas, $is_edit = false)
    {
        if ($is_edit) {
            $rules = [
                'keluarga_name' => ['required', 'min_length[3]', 'trim'],
                'no_kk'         => ['required', 'min_length[16]', 'trim'],
                'member_count'  => ['required', 'trim'],
                'type'          => ['required', 'trim'],
                'status'        => ['required', 'trim'],
                'address'       => ['required', 'min_length[5]', 'trim'],
            ];
        } else {
            $rules = [
                'keluarga_name' => ['required', 'min_length[3]', 'trim'],
                'no_kk'         => ['required', 'min_length[16]', 'trim'],
                'member_count'  => ['required', 'trim'],
                'type'          => ['required', 'trim'],
                'status'        => ['required', 'trim'],
                'address'       => ['required', 'min_length[5]', 'trim'],
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
            delete from m_keluarga where keluarga_id = ?
        ', [$id], true);
        if (!$query) {
            echo 'error';exit;
        }

        echo 'success';
        set_message('success', 'Sukses menghapus data pengguna');
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