<?php

include_once APP_PATH . 'main/controllers/users.php';
include_once APP_PATH . 'main/controllers/denda.php';
class Iuran extends My_controller
{
    const IURAN_KEBERSIHAN = 10;
    const IURAN_KEAMANAN = 20;

    const IURAN_KEBERSIHAN_AMOUNT = 10000;
    const IURAN_KEAMANAN_AMOUNT = 5000;
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
    {
        $data_iuran = $this->db->query('
            select ti.*,mk.keluarga_name
            from t_iuran ti left join m_keluarga mk on ti.keluarga_id = mk.keluarga_id         
            order by mk.keluarga_name asc, ti.paid_date asc, ti.due_date desc
        ')->result();

        $this->load_view('admin/layout/header');
        $this->load_view('admin/iuran/index', ['data_iuran' => $data_iuran]);
        $this->load_view('admin/layout/footer');
    }

    public function add()
    {
        $this->load_view('admin/layout/header');
        $this->load_view('admin/iuran/add');
        $this->load_view('admin/layout/footer');
    }

    public function add_action()
    {
        $datas = [
            'periode'     => daPost('periode'),
            'keluarga_id' => daPost('keluarga_id'),
            'type'        => daPost('type')
        ];

        // validating
        $validate = $this->_validate($datas);
        if (!$validate) {
            set_message('error', $this->validator->get_error());
            redirect('iuran/add');
        }

        $exploded_due_date = explode('-', $datas['periode']);
        unset($datas['periode']);
        $datas['due_date'] = (DateTime::createFromFormat('m-Y', $exploded_due_date[0] . '-' . $exploded_due_date[1]))->format('Y-m-d') . ' 23:59:59';
        $datas['amount'] = $datas['type'] == self::IURAN_KEBERSIHAN ? self::IURAN_KEBERSIHAN_AMOUNT : self::IURAN_KEAMANAN_AMOUNT;

        if (daPost('is_paid')) {
            $datas['paid_date'] = date('Y-m-d H:i:s');
        }

        //get denda
        $get_denda = $this->db->query('
            select IF((select EXISTS(select * from t_iuran ti where keluarga_id = ? and MONTH(due_date) = ? and YEAR(due_date) = ? and `type` = ?)) = 1, 0, IF(MONTH(NOW()) > ?, ?, 0)) as exist', 
        [
            $datas['keluarga_id'], $exploded_due_date[0], $exploded_due_date[1], $datas['type'], $exploded_due_date[0],
            $datas['type'] == Iuran::IURAN_KEBERSIHAN ? Denda::DENDA_KEBERSIHAN_AMOUNT : Denda::DENDA_KEAMANAN_AMOUNT
        ])->row();
        $datas['denda_amount'] = $get_denda && $get_denda->exist ? $get_denda->exist : 0;
        $datas['total_amount'] = $datas['amount'] + $datas['denda_amount'];

        // inserting new data
        $query = $this->db->query('
            INSERT INTO t_iuran
                ('. implode(',', array_map(function($n){return '`'. $n .'`';}, array_keys($datas))) .') 
                VALUES ('. implode(',', array_map(function(){return '?';}, array_keys($datas))) .');
        ', [...array_values($datas)], true);
        if (!$query) {
            set_message('error', 'Gagal menambahkan data iuran');
            redirect('iuran/add');
        }

        set_message('success', 'Berhasil menambahkan data iuran');
        redirect('iuran');
    }

    public function edit()
    {
        $id = daGet('id');
        if (!$id) {
            show_error('400 Bad Request ID is not valid');
        }

        // get data row
        $query = $this->db->query('
            select ti.*, mk.keluarga_name from t_iuran ti left join m_keluarga mk on ti.keluarga_id = mk.keluarga_id where ti.iuran_id = ?
        ', [$id])->row();
        if (!$query) {
            show_error('404 No Data is found');
        }

        // harus yang unpaid
        if ($query->paid_date) {
            // show_error('403 Paid data cant be modified');
            set_message('error', 'Paid data cant be modified');
            redirect('iuran');
        }

        $query->periode = date("m-Y", strtotime($query->due_date));

        $this->load_view('admin/layout/header');
        $this->load_view('admin/iuran/edit', ['row' => $query]);
        $this->load_view('admin/layout/footer');
    }

    public function edit_action()
    {
        $datas = [
            'id'           => daPost('id'),
            'amount'       => daPost('amount'),
            'denda_amount' => daPost('denda_amount')
        ];
        $id = $datas['id'];

        // validating
        $validate = $this->_validate($datas, true);
        if (!$validate) {
            set_message('error', $this->validator->get_error());
            redirect('iuran/edit?id=' . $datas['id']);
        }

        unset($datas['id']);

        if (daPost('is_paid')) {
            $datas['paid_date'] = date('Y-m-d H:i:s');
        }

        $datas['total_amount'] = $datas['amount'] + $datas['denda_amount'];

        // updating new data
        $query = $this->db->query('
            UPDATE t_iuran
                SET '. implode(',', array_map(function($tb_name){return '`'. $tb_name .'`=?';}, array_keys($datas))) .'
            WHERE iuran_id = ?;
        ', [...array_values($datas), $id], true);
        if (!$query) {
            set_message('error', 'Gagal mengubah data iuran');
            redirect('iuran/edit?id=' . $id);
        }

        set_message('success', 'Berhasil mengubah data iuran');
        redirect('iuran');
    }

    private function _validate($datas, $is_edit = false)
    {
        if ($is_edit) {
            $rules = [
                'id'           => ['required'],
                'amount'       => ['required'],
                'denda_amount' => ['required'],
            ];
        } else {
            $rules = [
                'periode'     => ['required'],
                'keluarga_id' => ['required'],
                'type'        => ['required'],
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
            delete from t_iuran where iuran_id = ?
        ', [$id], true);
        if (!$query) {
            echo 'error';exit;
        }

        echo 'success';
        set_message('success', 'Sukses menghapus data iuran');
    }

    public function pay_action()
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
        set_message('success', 'Sukses membayar data iuran');
    }

    public function unpay_action()
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
        set_message('success', 'Sukses menghapus pembayaran data iuran');
    }
    
}