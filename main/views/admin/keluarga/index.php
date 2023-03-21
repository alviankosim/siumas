<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header"><strong>List Keluarga</strong><span class="small ms-1"></span></div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Keluarga</th>
                            <th>Alamat</th>
                            <th>Tipe</th>
                            <th class="text-center" style="width: 40px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? $no = 1 ?>
                        <? foreach ($data_keluarga as $single_keluarga) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td> (<?= $single_keluarga->member_count ?>) <?= $single_keluarga->keluarga_name ?></td>
                                <td><?= $single_keluarga->address ?></td>
                                <td>
                                    <?= $single_keluarga->type == Keluarga::TYPE_MAMPU ?
                                        '<span class="badge me-1 bg-info">MAMPU</span>'
                                        : '<span class="badge me-1 bg-warning">MISKIN</span>'
                                    ?>
                                </td>
                                <td>
                                    <div style="display: flex;flex-direction:column;justify-content: center;">
                                        <button class="btn mb-1 btn-secondary btn-sm text-white" onclick="location.href='<?= base_url('keluarga/edit?id=' . $single_keluarga->keluarga_id) ?>'" type="button">
                                            <svg class="icon me-2">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                            </svg> Edit
                                        </button>
                                        <button class="btn mb-1 btn-danger btn-sm text-white btn-action-iuran" data-action="delete" data-id="<?= $single_keluarga->keluarga_id ?>" type="button">
                                            <svg class="icon me-2">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                            </svg> Hapus
                                        </button>

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
    $(document).ready(function() {
        // action iuran
        $('.btn-action-iuran').click(function() {
            const daId = $(this).data('id');
            const daAction = $(this).data('action');
            let actionText = '';
            if (daAction === 'delete') {
                actionText = 'menghapus data';
            }
            vexConfirm(`Apakah kamu yakin ingin ${actionText} keluarga ini?`, function(value) {
                if (value) {
                    $.ajax({
                        url: `<?= base_url('') ?>keluarga/${daAction}_action`,
                        method: "POST",
                        data: {
                            id: daId
                        }
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