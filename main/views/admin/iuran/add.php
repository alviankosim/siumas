<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header">
                <strong>Tambah Iuran</strong><span class="small ms-1"></span>
                <div class="float-right">
                    <button type="button" class="btn btn-secondary btn-sm rounded-pill" id="btn-save-paid">Simpan dan Bayar</button>
                    <button type="button" class="btn btn-primary btn-md rounded-pill" id="btn-save">Simpan</button>
                </div>
            </div>
            <div class="card-body">
                <form id="daform" action="<?= base_url('iuran/add_action') ?>" method="post">
                    <input type="hidden" name="is_paid" value="0">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Periode</label>
                            <div class="input-group date" id="target" style="position:relative" data-target-input="nearest">
                                <input class="form-control" name="periode" id="datepicker1" value="<?= date('m-Y') ?>" type="text" data-toggle="datetimepicker" data-target="#target">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Keluarga</label>
                            <select name="keluarga_id" class="form-select select2remote" data-select2placeholder="Pilih keluarga" data-select2url="<?= base_url('keluarga/ajax_periode') ?>" style="width: 100%">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Tipe</label>
                            <select name="type" class="form-select select2sheesh" data-placeholder="Pilih tipe iuran">
                                <!-- <option value="<?= Iuran::IURAN_KEBERSIHAN ?>">Kebersihan - <?= format_rupiah(Iuran::IURAN_KEBERSIHAN_AMOUNT) ?></option>
                            <option value="<?= Iuran::IURAN_KEAMANAN ?>">Keamanan <?= format_rupiah(Iuran::IURAN_KEAMANAN_AMOUNT) ?></option> -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Besaran Iuran</label>
                            <input id="besaran_iuran" readonly class="form-control-plaintext" type="text" value="Rp 0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Besaran Denda</label>
                            <input id="besaran_denda" readonly class="form-control-plaintext" type="text" value="Rp 0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Besaran Total</label>
                            <input id="besaran_total" readonly class="form-control-plaintext" type="text" value="Rp 0">
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
        $('.select2remote').data('addparam', {
            periode: $('[name="periode"]').val()
        })

        // periode
        $('#target').datetimepicker({
            format: 'MM-YYYY'
        });
        $('#target').on('change.datetimepicker', function() {
            $('.select2remote').data('addparam', {
                periode: $('[name="periode"]').val()
            })
            $('[name="keluarga_id"]').val(null).trigger('change');
        })

        // keluarga
        $('.select2remote').select2({
            theme: 'bootstrap4',
            delay: 250,
            placeholder: $('.select2remote').data('select2placeholder'),
            ajax: {
                url: $('.select2remote').data('select2url'),
                dataType: 'json',
                data: function(params) {
                    var query = {
                        ...params,
                        ...$('.select2remote').data('addparam')
                    }

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function(data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data.results
                    };
                }
            },
            minimumInputLength: 3
        })
        $('[name="keluarga_id"]').change(function() {
            const dataRender = [];
            console.log($(this).select2('data')?.[0]);
            if ($(this).select2('data')?.[0]?.exist_keamanan === 0) {
                dataRender.push({
                    id: <?= Iuran::IURAN_KEAMANAN ?>,
                    text: 'Keamanan <?= format_rupiah(Iuran::IURAN_KEAMANAN_AMOUNT) ?>',
                    amount: <?= Iuran::IURAN_KEAMANAN_AMOUNT ?>,
                    denda_amount: $(this).select2('data')?.[0]?.denda_keamanan
                });
            }
            if ($(this).select2('data')?.[0]?.exist_kebersihan === 0) {
                dataRender.push({
                    id: <?= Iuran::IURAN_KEBERSIHAN ?>,
                    text: 'Kebersihan <?= format_rupiah(Iuran::IURAN_KEBERSIHAN_AMOUNT) ?>',
                    amount: <?= Iuran::IURAN_KEBERSIHAN_AMOUNT ?>,
                    denda_amount: $(this).select2('data')?.[0]?.denda_kebersihan
                });
            }
            console.log('masuk sini ga', dataRender);
            $('[name="type"]').select2('destroy').empty().select2({
                theme: 'bootstrap4',
                data: dataRender
            }).trigger('change');
        });

        // tipe iuran
        $('[name="type"]').change(function() {
            $('#besaran_iuran').val(format_rupiah($(this).select2('data')?.[0]?.amount));
            $('#besaran_denda').val(format_rupiah($(this).select2('data')?.[0]?.denda_amount));
            $('#besaran_total').val(format_rupiah($(this).select2('data')?.[0]?.amount + $(this).select2('data')?.[0]?.denda_amount));
        })

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