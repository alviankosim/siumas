<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header"><strong>Tambah Iuran</strong><span class="small ms-1"></span></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Periode</label>
                        <div class="input-group date" id="target" style="position:relative" data-target-input="nearest">
                            <input class="form-control" name="periode" id="datepicker1" value="<?= date('m-Y') ?>" type="text" data-toggle="datetimepicker" data-target="#target">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Keluarga</label>
                        <select class="form-select select2remote" data-select2placeholder="Pilih keluarga" data-select2url="<?= base_url('keluarga/ajax_periode') ?>" style="width: 100%" >
                            <option></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Tipe</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="<?= Iuran::IURAN_KEBERSIHAN ?>">Kebersihan - <?= format_rupiah(Iuran::IURAN_KEBERSIHAN_AMOUNT) ?></option>
                            <option value="<?= Iuran::IURAN_KEAMANAN ?>">Keamanan <?= format_rupiah(Iuran::IURAN_KEAMANAN_AMOUNT) ?></option>
                        </select>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4 mb-3">
                        <label class="form-label"  for="exampleFormControlInput1">Besaran Iuran</label>
                        <input readonly class="form-control-plaintext text-right" type="text">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Besaran Denda</label>
                        <input readonly class="form-control-plaintext text-right" type="text">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="exampleFormControlInput1">Besaran Total</label>
                        <input readonly class="form-control-plaintext text-right" type="text">
                    </div>
                </div>
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
        // $('#datepicker1').datetimepicker({
        //     format: 'MM/YYYY',
        //     widgetPositioning: {
        //         vertical: 'bottom', // always opens to buttom direction
        //     },
        // });
        $('.select2remote').data('addparam', {
            periode: $('[name="periode"]').val()
        })
        $('#target').datetimepicker({
            format: 'MM-YYYY'
        });
        $('#target').on('change.datetimepicker', function(){
            $('.select2remote').data('addparam', {
                periode: $('[name="periode"]').val()
            })
        })
    })
</script>