<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <strong>Tambah Pengeluaran</strong><span class="small ms-1"></span>
                <div class="float-right">
                    <button type="button" class="btn btn-secondary btn-sm rounded-pill" id="btn-save-done">Simpan dan Selesai</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded-pill" id="btn-save-process">Simpan dan Proses</button>
                    <button type="button" class="btn btn-primary btn-md rounded-pill" id="btn-save">Simpan</button>
                </div>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" id="daform" action="<?= base_url('pengeluaran/add_action') ?>" method="post">
                    <input type="hidden" name="is_process" value="0">
                    <input type="hidden" name="is_done" value="0">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Pengeluaran</label>
                            <input id="pengeluaran_name" name="pengeluaran_name" class="form-control" type="text" placeholder="Masukkan nama pengeluaran">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Tanggal Pengeluaran</label>
                            <div class="input-group date" id="target" style="position:relative" data-target-input="nearest">
                                <input class="form-control" name="pengeluaran_date" id="datepicker1" value="<?= date('d-m-Y') ?>" type="text" data-toggle="datetimepicker" data-target="#target">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Besaran Pengeluaran</label>
                            <input id="amount" name="amount" class="form-control" type="number">
                        </div>
                        <!-- <div class="col-md-6 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Status</label>
                            <select name="status" class="form-select select2sheesh" data-placeholder="Pilih status">
                                <? foreach(Pengeluaran::get_status_list() as $single_status): ?>
                                    <option value="<?= $single_status ?>"><?= Pengeluaran::get_status_name($single_status) ?></option>
                                <? endforeach ?>
                            </select>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="exampleFormControlTextarea1">Deskripsi Pengeluaran</label>
                            <textarea placeholder="Masukkan deskripsi pengeluaran" name="pengeluaran_description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label" for="exampleFormControlTextarea1">Dokumentasi</label>
                            <div class="input-images"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // multi image uploader
        var inputImages = $('.input-images').imageUploader({
            maxFiles: 4
        });

        $('#target').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        $('#btn-save-done').click(function() {
            vexConfirm(`Apakah kamu yakin ingin menyimpan dan menyelesaikan pengeluaran ini?`, function(value) {
                if (value) {
                    $('[name="is_done"]').val('1');
                    $('#daform').submit();
                }
            })
        })
        
        $('#btn-save-process').click(function() {
            vexConfirm(`Apakah kamu yakin ingin menyimpan dan memulai proses pengeluaran ini?`, function(value) {
                if (value) {
                    $('[name="is_process"]').val('1');
                    $('#daform').submit();
                }
            })
        })

        // save btn
        $('#btn-save').click(function() {
            $('#daform').submit();
        })
    })
</script>