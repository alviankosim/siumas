<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <strong>Edit Pengeluaran</strong><span class="small ms-1"></span>
                <div class="float-right">
                    <button type="button" class="btn btn-secondary btn-sm rounded-pill" id="btn-save-done">Simpan dan Selesai</button>
                    <? if ($row->status != Pengeluaran::PENGELUARAN_STATUS_PROGRESS) : ?>
                        <button type="button" class="btn btn-secondary btn-sm rounded-pill" id="btn-save-process">Simpan dan Proses</button>
                    <? endif ?>
                    <button type="button" class="btn btn-primary btn-md rounded-pill" id="btn-save">Simpan</button>
                </div>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" id="daform" action="<?= base_url('pengeluaran/edit_action') ?>" method="post">
                    <input type="hidden" name="is_process" value="0">
                    <input type="hidden" name="is_done" value="0">
                    <input type="hidden" name="id" value="<?= $row->pengeluaran_id ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Pengeluaran</label>
                            <input value="<?= $row->pengeluaran_name ?>" id="pengeluaran_name" name="pengeluaran_name" class="form-control" type="text" placeholder="Masukkan nama pengeluaran">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Tanggal Pengeluaran</label>
                            <div class="input-group date" id="target" style="position:relative" data-target-input="nearest">
                                <input class="form-control" name="pengeluaran_date" id="datepicker1" value="<?= date('d-m-Y', strtotime($row->pengeluaran_date)) ?>" type="text" data-toggle="datetimepicker" data-target="#target">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Besaran Pengeluaran</label>
                            <input value="<?= $row->amount ?>" id="amount" name="amount" class="form-control" type="number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="exampleFormControlTextarea1">Deskripsi Pengeluaran</label>
                            <textarea placeholder="Masukkan deskripsi pengeluaran" name="pengeluaran_description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $row->pengeluaran_description ?></textarea>
                        </div>
                    </div>
                    <?
                        $images = json_decode($row->images);
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-12">
                        <label class="form-label" for="exampleFormControlTextarea1">Existing Dokumentasi</label>
                        <div class=""  style="overflow-x: scroll;width: 100%;display:-webkit-box">
                            <? foreach($images as $single_image): ?>
                                <div style="margin-left: 5px; width: 150px;height: 150px;background:url('<?= base_url('public/uploads/pengeluaran/' . $single_image->image) ?>');background-position:center;background-size:cover">
                                    <button type="button" style="margin:5px;border-radius: 10px;border: 0px solid black" class="btn-delete-image" data-imageid="<?= $single_image->id ?>"><i class="fas fa-trash text-danger"></i></button>
                                </div>
                            <? endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-label" for="exampleFormControlTextarea1">Tambah Dokumentasi</label>
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
        $(document.body).on('click', '.btn-delete-image', function(){
            const daId = $(this).data('imageid');
            const daParent = $(this).parent();

            vexConfirm(`Apakah kamu yakin ingin menghapus gambar dokumentasi ini?`, function(value) {
                if (value) {
                    $.ajax({
                        url: `<?= base_url('') ?>pengeluaran/ajax_delete_image_action`,
                        method: "POST",
                        data: { id: daId }
                    }).then((data) => {
                        if (data === 'success') {
                            daParent.remove();
                        } else {
                            vexAlert(`Something is error when delete image data`);
                        }
                    }).fail((err) => {
                        vexAlert(`Something is error when delete image data`);
                    });
                }
            })
        })

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