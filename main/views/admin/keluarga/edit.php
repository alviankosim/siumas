<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <strong>Edit Keluarga</strong><span class="small ms-1"></span>
                <div class="float-right">
                    <button type="button" class="btn btn-primary btn-md rounded-pill" id="btn-save">Simpan</button>
                </div>
            </div>
            <div class="card-body">
                <form id="daform" action="<?= base_url('keluarga/edit_action') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $row->keluarga_id ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Keluarga</label>
                            <input value="<?= $row->keluarga_name ?>" id="keluarga_name" name="keluarga_name" class="form-control" type="text" placeholder="Masukkan nama keluarga">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No KK</label>
                            <input value="<?= $row->no_kk ?>" id="no_kk" name="no_kk" class="form-control" type="text" placeholder="Masukkan nomor KK">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Jumlah Anggota</label>
                            <input value="<?= $row->member_count ?>" id="member_count" name="member_count" class="form-control" type="number" placeholder="Jumlah anggota">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Tipe Keluarga</label>
                            <select name="type" class="form-select select2sheesh" data-placeholder="Pilih tipe keluarga">
                                <option <?= $row->type == Keluarga::TYPE_MAMPU? 'selected' : '' ?> value="<?= Keluarga::TYPE_MAMPU ?>">Mampu</option>
                                <option <?= $row->type == Keluarga::TYPE_MISKIN? 'selected' : '' ?> value="<?= Keluarga::TYPE_MISKIN ?>">Miskin</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Status</label>
                            <select name="status" class="form-select select2sheesh" data-placeholder="Pilih tipe keluarga">
                                <option <?= $row->status == STATUS_ACTIVE ? 'selected' : '' ?> value="<?= STATUS_ACTIVE ?>">Aktif</option>
                                <option <?= $row->status == STATUS_INACTIVE ? 'selected' : '' ?> value="<?= STATUS_INACTIVE ?>">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $row->address ?></textarea>
                        </div>
                    </div>
                </form>
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