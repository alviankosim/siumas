<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <strong>Edit Pengguna</strong><span class="small ms-1"></span>
                <div class="float-right">
                    <button type="button" class="btn btn-primary btn-md rounded-pill" id="btn-save">Simpan</button>
                </div>
            </div>
            <div class="card-body">
                <form id="daform" action="<?= base_url('users/edit_action') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $row->user_id ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Username</label>
                            <input disabled id="user_name" value="<?= $row->user_name ?>" name="user_name" class="form-control" type="text" placeholder="Masukkan username pengguna">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input id="user_fullname" value="<?= $row->user_fullname ?>" name="user_fullname" class="form-control" type="text" placeholder="Masukkan nama lengkap">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password</label>
                            <input id="password" name="password" class="form-control" type="password" placeholder="Masukkan password pengguna (*jika ingin diubah*)">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password Confirmation</label>
                            <input id="password_conf" name="password_conf" class="form-control" type="password" placeholder="Masukkan kembali password pengguna (*jika ingin diubah*)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIK</label>
                            <input id="nik" name="nik" value="<?= $row->nik ?>" class="form-control" type="text" placeholder="Masukkan NIK pengguna">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Tipe Pengguna</label>
                            <select name="role_id" class="form-select select2sheesh" data-placeholder="Pilih tipe pengguna">
                                <option <?= $row->role_id == Users::ROLE_ID_PENAGIH ? 'selected' : '' ?> value="<?= Users::ROLE_ID_PENAGIH ?>">Penagih</option>
                                <option <?= $row->role_id == Users::ROLE_ID_ADMIN ? 'selected' : '' ?> value="<?= Users::ROLE_ID_ADMIN ?>">Admin</option>
                            </select>
                        </div>
                    </div>
                </form>
                <!-- <div class="mb-3">
                    <label class="form-label" for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div> -->
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // save btn
        $('#btn-save').click(function() {
            $('#daform').submit();
        })
    })
</script>