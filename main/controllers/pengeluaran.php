<?php

include_once APP_PATH . 'main/controllers/users.php';

class Pengeluaran extends My_controller
{
    const PENGELUARAN_STATUS_NEW = 11;
    const PENGELUARAN_STATUS_PROGRESS = 22;
    const PENGELUARAN_STATUS_DONE = 33;

    const PENGELUARAN_IMAGE_DIR = APP_PATH . 'public/uploads/pengeluaran/';
    
    public static function get_status_name($status_id, $is_badge = false)
    {
        $return = '';

        switch ($status_id) {
            case self::PENGELUARAN_STATUS_NEW:
                $return = 'Baru';
                if ($is_badge) $return = '<span class="badge me-1 bg-info">Baru</span>';
                break;
            case self::PENGELUARAN_STATUS_PROGRESS:
                $return = 'Proses';
                if ($is_badge) $return = '<span class="badge me-1 bg-warning">Proses</span>';
                break;
            case self::PENGELUARAN_STATUS_DONE:
                $return = 'Selesai';
                if ($is_badge) $return = '<span class="badge me-1 bg-success">Selesai</span>';
                break;
            default:
                break;
        }

        return $return;
    }

    public static function get_status_list()
    {
        return [
            self::PENGELUARAN_STATUS_NEW,
            self::PENGELUARAN_STATUS_PROGRESS,
            self::PENGELUARAN_STATUS_DONE
        ];
    }

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function index()
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

        $this->load_view('admin/layout/header');
        $this->load_view('admin/pengeluaran/index', ['data_pengeluaran' => $data_pengeluaran]);
        $this->load_view('admin/layout/footer');
    }

    public function add()
    {
        $this->load_view('admin/layout/header');
        $this->load_view('admin/pengeluaran/add');
        $this->load_view('admin/layout/footer');
    }

    public function add_action()
    {
        $datas = [
            'pengeluaran_name'        => daPost('pengeluaran_name'),
            'pengeluaran_description' => daPost('pengeluaran_description'),
            'pengeluaran_date'        => daPost('pengeluaran_date'),
            'amount'                  => daPost('amount'),
        ];

        // validating
        $validate = $this->_validate($datas);
        if (!$validate) {
            set_message('error', $this->validator->get_error());
            redirect('pengeluaran/add');
        }

        // validate images
        $images_validate = $this->uploader->validate('images');
        if (is_string($images_validate)) {
            set_message('error', $images_validate);
            redirect('pengeluaran/add');
        }

        $datas['pengeluaran_date'] = (DateTime::createFromFormat('d-m-Y', $datas['pengeluaran_date']))->format('Y-m-d') . ' 00:00:00';

        if (daPost('is_process')) {
            $datas['status'] = self::PENGELUARAN_STATUS_PROGRESS;
        } elseif (daPost('is_done')) {
            $datas['status'] = self::PENGELUARAN_STATUS_DONE;
        } else {
            $datas['status'] = self::PENGELUARAN_STATUS_NEW;
        }

        // inserting new data
        $query = $this->db->query('
            INSERT INTO t_pengeluaran
                ('. implode(',', array_map(function($n){return '`'. $n .'`';}, array_keys($datas))) .') 
                VALUES ('. implode(',', array_map(function(){return '?';}, array_keys($datas))) .');
        ', [...array_values($datas)], true);
        if (!$query) {
            set_message('error', 'Gagal menambahkan data pengeluaran');
            redirect('pengeluaran/add');
        }

        // start handle images
        $images = $this->uploader->upload('images', self::PENGELUARAN_IMAGE_DIR);
        if (count($images) < 1) {
            set_message('error', 'Gagal mengupload gambar');
            redirect('pengeluaran/add');
        }

        $insert_id = $this->db->insert_id();
        $datas_images = array_map(function($single_image) use ($insert_id){
            return [
                'pengeluaran_id' => $insert_id,
                'path'           => $single_image
            ];
        }, $images);

        $arr_binded_value = [];
        foreach ($datas_images as $single_image) {
            foreach ($single_image as $inner_single_image) {
                $arr_binded_value[] = $inner_single_image;
            }
        }

        $query = $this->db->query('
            INSERT INTO pengeluaran_images
                ('. implode(',', array_map(function($n){return '`'. $n .'`';}, array_keys($datas_images[0]))) .') 
                VALUES 
                    ('. 
                        implode('
                        ', array_map(function($n){return implode(',', array_map(function(){return '?';}, array_keys($n)));}, array_values($datas_images)))
                    .');
        ', [...$arr_binded_value]);

        set_message('success', 'Berhasil menambahkan data pengeluaran');
        redirect('pengeluaran');
    }

    public function edit()
    {
        $id = daGet('id');
        if (!$id) {
            show_error('400 Bad Request ID is not valid');
        }

        // get data row
        $query = $this->db->query("
            select tp.*,
            (
            SELECT coalesce(CONCAT(
                '[', 
                GROUP_CONCAT(JSON_OBJECT('id', pi2.pengeluaran_image_id, 'image', pi2.`path`)),
                ']'
            ), '[]') 
            FROM pengeluaran_images pi2 where pi2.pengeluaran_id = tp.pengeluaran_id
            )
            as images from t_pengeluaran tp where tp.pengeluaran_id = ?
        ", [$id])->row();
        if (!$query) {
            show_error('404 No Data is found');
        }

        // harus yang belum done
        if ($query->status == Pengeluaran::PENGELUARAN_STATUS_DONE) {
            // show_error('403 Paid data cant be modified');
            set_message('error', 'The status is done, cant be modified');
            redirect('pengeluaran');
        }

        $this->load_view('admin/layout/header');
        $this->load_view('admin/pengeluaran/edit', ['row' => $query]);
        $this->load_view('admin/layout/footer');
    }

    public function edit_action()
    {
        $datas = [
            'id'                      => daPost('id'),
            'pengeluaran_name'        => daPost('pengeluaran_name'),
            'pengeluaran_description' => daPost('pengeluaran_description'),
            'pengeluaran_date'        => daPost('pengeluaran_date'),
            'amount'                  => daPost('amount'),
        ];
        $id = $datas['id'];

        // validating
        $validate = $this->_validate($datas, true);
        if (!$validate) {
            set_message('error', $this->validator->get_error());
            redirect('pengeluaran/edit?id=' . $datas['id']);
        }

        unset($datas['id']);

        // validate images
        $is_using_image = (isset($_FILES['images']) && is_array($_FILES['images']['tmp_name']) && count($_FILES['images']['tmp_name']) > 0 && $_FILES['images']['tmp_name'][0]);
        if ($is_using_image) {
            $images_validate = $this->uploader->validate('images');
            if (is_string($images_validate)) {
                set_message('error', $images_validate);
                redirect('pengeluaran/edit?id=' . $id);
            }
        }

        $datas['pengeluaran_date'] = (DateTime::createFromFormat('d-m-Y', $datas['pengeluaran_date']))->format('Y-m-d') . ' 00:00:00';

        if (daPost('is_process')) {
            $datas['status'] = self::PENGELUARAN_STATUS_PROGRESS;
        } elseif (daPost('is_done')) {
            $datas['status'] = self::PENGELUARAN_STATUS_DONE;
        }

        // updating new data
        $query = $this->db->query('
            UPDATE t_pengeluaran
                SET '. implode(',', array_map(function($tb_name){return '`'. $tb_name .'`=?';}, array_keys($datas))) .'
            WHERE pengeluaran_id = ?;
        ', [...array_values($datas), $id], true);
        if (!$query) {
            set_message('error', 'Gagal mengubah data pengeluaran');
            redirect('pengeluaran/edit?id=' . $id);
        }

        if ($is_using_image) {
            // start handle images
            $images = $this->uploader->upload('images', APP_PATH . 'public/uploads/pengeluaran/');
            if (count($images) < 1) {
                set_message('error', 'Gagal mengupload gambar');
                redirect('pengeluaran/edit?id=' . $id);
            }

            $insert_id = $id;
            $datas_images = array_map(function($single_image) use ($insert_id){
                return [
                    'pengeluaran_id' => $insert_id,
                    'path'           => $single_image
                ];
            }, $images);

            $arr_binded_value = [];
            foreach ($datas_images as $single_image) {
                foreach ($single_image as $inner_single_image) {
                    $arr_binded_value[] = $inner_single_image;
                }
            }

            $query = $this->db->query('
                INSERT INTO pengeluaran_images
                    ('. implode(',', array_map(function($n){return '`'. $n .'`';}, array_keys($datas_images[0]))) .') 
                    VALUES 
                        ('. 
                            implode('
                            ', array_map(function($n){return implode(',', array_map(function(){return '?';}, array_keys($n)));}, array_values($datas_images)))
                        .');
            ', [...$arr_binded_value]);
        }

        set_message('success', 'Berhasil mengubah data pengeluaran');
        redirect('pengeluaran');
    }

    private function _validate($datas, $is_edit = false)
    {
        if ($is_edit) {
            $rules = [
                'pengeluaran_name'        => ['required','min_length[5]', 'trim'],
                'pengeluaran_description' => ['required','min_length[5]', 'trim'],
                'pengeluaran_date'        => ['required', 'trim'],
                'amount'                  => ['required'],
            ];
        } else {
            $rules = [
                'pengeluaran_name'        => ['required','min_length[5]', 'trim'],
                'pengeluaran_description' => ['required','min_length[5]', 'trim'],
                'pengeluaran_date'        => ['required', 'trim'],
                'amount'                  => ['required'],
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
            delete from t_pengeluaran where pengeluaran_id = ?
        ', [$id], true);
        if (!$query) {
            echo 'error';exit;
        }

        echo 'success';
        set_message('success', 'Sukses menghapus data pengeluaran');
    }

    public function ajax_delete_image_action()
    {
        $id = daPost('id');
        if (!$id) {
            echo 'error';exit;
        }

        $query_image = $this->db->query("
            select * from pengeluaran_images where pengeluaran_image_id = ?
        ", [$id])->row();
        if (!$query_image) {
            echo 'error';exit;
        }

        $query = $this->db->query('
            delete from pengeluaran_images where pengeluaran_image_id = ?
        ', [$id], true);
        if (!$query) {
            echo 'error';exit;
        }

        // unlink the file
        @unlink(self::PENGELUARAN_IMAGE_DIR . $query_image->path);

        echo 'success';
        exit;
    }

    public function process_action()
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
        set_message('success', 'Sukses memproses data pengeluaran');
    }

    public function done_action()
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
        set_message('success', 'Sukses menyelesaikan data pengeluaran');
    }
    
}