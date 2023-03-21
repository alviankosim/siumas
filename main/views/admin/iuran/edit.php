<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <strong>Edit Iuran</strong><span class="small ms-1"></span>
                <div class="float-right">
                    <button type="button" class="btn btn-secondary btn-sm rounded-pill" id="btn-save-paid">Simpan dan Bayar</button>
                    <button type="button" class="btn btn-primary btn-md rounded-pill" id="btn-save">Simpan</button>
                </div>
            </div>
            <div class="card-body">
                <form id="daform" action="<?= base_url('iuran/edit_action') ?>" method="post">
                    <input type="hidden" name="is_paid" value="0">
                    <input type="hidden" name="id" value="<?= $row->iuran_id ?>">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Periode</label>
                            <div class="input-group date" id="target" style="position:relative" data-target-input="nearest">
                                <input disabled class="form-control" name="periode" id="datepicker1" value="<?= $row->periode ?>" type="text" data-toggle="datetimepicker" data-target="#target">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Keluarga</label>
                            <select disabled name="keluarga_id" class="form-select select2remote" data-select2placeholder="Pilih keluarga" data-select2url="<?= base_url('keluarga/ajax_periode') ?>" style="width: 100%">
                                <option value="<?= $row->keluarga_id ?>"><?= $row->keluarga_name ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Tipe</label>
                            <select disabled name="type" class="form-select select2sheesh" data-placeholder="Pilih tipe iuran">
                                <option <?= $row->type == Iuran::IURAN_KEBERSIHAN ? 'selected' : '' ?> value="<?= Iuran::IURAN_KEBERSIHAN ?>">Kebersihan <?= format_rupiah(Iuran::IURAN_KEBERSIHAN_AMOUNT) ?></option>
                                <option <?= $row->type == Iuran::IURAN_KEAMANAN ? 'selected' : '' ?> value="<?= Iuran::IURAN_KEAMANAN ?>">Keamanan <?= format_rupiah(Iuran::IURAN_KEAMANAN_AMOUNT) ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Besaran Iuran</label>
                            <input id="besaran_iuran" name="amount" class="form-control" type="number" value="<?= ($row->amount) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Besaran Denda</label>
                            <input id="besaran_denda" name="denda_amount" class="form-control" type="number" value="<?= ($row->denda_amount) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Besaran Total</label>
                            <input id="besaran_total" readonly class="form-control-plaintext" type="text" value="<?= format_rupiah($row->total_amount) ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#besaran_iuran').on('keyup', function(){
            const iuran = parseInt($(this).val());
            const denda = parseInt($('#besaran_denda').val());
            $('#besaran_total').val(format_rupiah(iuran + denda));
        });
        $('#besaran_denda').on('keyup', function(){
            const denda = parseInt($(this).val());
            const iuran = parseInt($('#besaran_iuran').val());
            $('#besaran_total').val(format_rupiah(iuran + denda));
        });

        // save btn
        $('#btn-save').click(function() {
            $('#daform').submit();
        })
        $('#btn-save-paid').click(function() {
            $('[name="is_paid"]').val('1');
            $('#daform').submit();
        })
    })
</script>