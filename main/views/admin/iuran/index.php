<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header"><strong>List Iuran</strong><span class="small ms-1"></span></div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keluarga</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Periode</th>
                            <th class="text-center" style="width: 40px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? $no = 1 ?>
                        <? foreach($data_iuran as $single_iuran): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $single_iuran->keluarga_name ?></td>
                                <td>
                                    <?= $single_iuran->type == Iuran::IURAN_KEBERSIHAN ?
                                        '<span class="badge me-1 bg-success">KEBERSIHAN</span>'
                                        : '<span class="badge me-1 bg-danger">KEAMANAN</span>'
                                    ?>
                                </td>
                                <td>
                                    <?= format_rupiah($single_iuran->total_amount) ?> <?= $single_iuran->denda_amount > 0 ? '<b class="text-danger">*</b>' : '' ?> <?= ($single_iuran->paid_date ? '' : '(UNPAID)') ?>
                                </td>
                                <td>
                                    <?= date("M Y", strtotime($single_iuran->due_date)) ?>
                                </td>
                                <td>
                                    <? $no_btn = true ?>
                                    <div style="display: flex;flex-direction:column;justify-content: center;">
                                    <? if($single_iuran->paid_date == NULL): ?>
                                        <? $no_btn = false ?>
                                        <button class="btn mb-1 btn-success btn-sm text-white btn-action-iuran" data-id="<?= $single_iuran->iuran_id ?>" data-action="pay" type="button">
                                            <svg class="icon me-2">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-check"></use>
                                            </svg> Pay
                                        </button>
                                    <? else: ?>
                                        <? $no_btn = false ?>
                                        <button class="btn mb-1 btn-warning btn-sm btn-action-iuran" data-id="<?= $single_iuran->iuran_id ?>" data-action="unpay" type="button">
                                            <svg class="icon me-2">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-x"></use>
                                            </svg> Unpay
                                        </button>
                                    <? endif ?>
                                    <? if(my_sess('role_id') == Users::ROLE_ID_ADMIN || !$single_iuran->paid_date): ?>
                                        <? $no_btn = false ?>
                                    <button class="btn mb-1 btn-secondary btn-sm text-white" onclick="location.href='<?= base_url('iuran/edit?id=' . $single_iuran->iuran_id) ?>'" type="button">
                                        <svg class="icon me-2">
                                            <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                        </svg> Edit
                                    </button>
                                    <? endif; ?>
                                    <? if(my_sess('role_id') == Users::ROLE_ID_ADMIN): ?>
                                        <? $no_btn = false ?>
                                        <button class="btn mb-1 btn-danger btn-sm text-white btn-action-iuran" data-action="delete" data-id="<?= $single_iuran->iuran_id ?>" type="button">
                                            <svg class="icon me-2">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                            </svg> Hapus
                                        </button>
                                    <? endif; ?>
                                    <?if($no_btn):?>
                                        <span>No action</span>
                                    <?endif;?>
                                    </div>
                                </td>
                            </tr>
                        <? endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // action iuran
        $('.btn-action-iuran').click(function(){
            const daId = $(this).data('id');
            const daAction = $(this).data('action');
            let actionText = '';
            if (daAction === 'delete') {
                actionText = 'menghapus data';
            } else if (daAction === 'pay') {
                actionText = 'membayar data';
            } else if (daAction === 'unpay') {
                actionText = 'mengembalikan pembayaran data';
            }
            vexConfirm(`Apakah kamu yakin ingin ${actionText} iuran ini?`, function(value) {
                if (value) {
                    $.ajax({
                        url: `<?= base_url('') ?>iuran/${daAction}_action`,
                        method: "POST",
                        data: { id: daId }
                    }).then((data) => {
                        if (data === 'success') {
                            window.location.reload();
                        } else {
                            vexAlert(`Something is error when ${daAction} data`);
                        }
                    }).fail((err) => {
                        vexAlert(`Something is error when ${daAction} data`);
                    });
                }
            })
        })
    })
</script>