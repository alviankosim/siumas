<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header"><strong>List Pengeluaran</strong><span class="small ms-1"></span></div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Dokumentasi</th>
                            <th>Pengeluaran</th>
                            <th>Tanggal Pengeluaran</th>
                            <th>Biaya</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 40px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? $no = 1 ?>
                        <? foreach ($data_pengeluaran as $single_pengeluaran) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <?
                                    $images_url = '';
                                    $images = json_decode($single_pengeluaran->images);
                                    if (count($images) > 0) {
                                        $images_url = base_url('public/uploads/pengeluaran/' . $images[0]->image);
                                    }
                                ?>
                                <td class="text-center" style="vertical-align:middle;">
                                    <div style="width: 150px;height: 150px;display: block;margin-left: auto;margin-right: auto;background:url('<?= $images_url ?>');background-position:center;background-size:cover">
                                    </div>
                                </td>
                                <td> <?= $single_pengeluaran->pengeluaran_name ?></td>
                                <td> <?= date("d-m-Y", strtotime($single_pengeluaran->pengeluaran_date)) ?></td>
                                <td> <?= format_rupiah($single_pengeluaran->amount) ?></td>
                                <td>
                                    <?= Pengeluaran::get_status_name($single_pengeluaran->status, true) ?>
                                </td>
                                <td>
                                    <div style="display: flex;flex-direction:column;justify-content: center;">
                                        <? if($single_pengeluaran->status == Pengeluaran::PENGELUARAN_STATUS_NEW): ?>
                                            <button class="btn mb-1 btn-warning btn-sm text-white btn-action-iuran" data-action="process" data-id="<?= $single_pengeluaran->pengeluaran_id ?>" type="button">
                                                <svg class="icon me-2">
                                                    <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-sync"></use>
                                                </svg> Proses
                                            </button>
                                        <? endif ?>

                                        <? if(in_array($single_pengeluaran->status, [Pengeluaran::PENGELUARAN_STATUS_PROGRESS, Pengeluaran::PENGELUARAN_STATUS_NEW])): ?>
                                            <button class="btn mb-1 btn-success btn-sm text-white btn-action-iuran" data-action="done" data-id="<?= $single_pengeluaran->pengeluaran_id ?>" type="button">
                                                <svg class="icon me-2">
                                                    <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-sync"></use>
                                                </svg> Done
                                            </button>
                                        <? endif ?>

                                        <? if($single_pengeluaran->status != Pengeluaran::PENGELUARAN_STATUS_DONE): ?>
                                        <button class="btn mb-1 btn-secondary btn-sm text-white" onclick="location.href='<?= base_url('pengeluaran/edit?id=' . $single_pengeluaran->pengeluaran_id) ?>'" type="button">
                                            <svg class="icon me-2">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                            </svg> Edit
                                        </button>
                                        <? endif; ?>

                                        <? if(my_sess('role_id') == Users::ROLE_ID_ADMIN || $single_pengeluaran->status != Pengeluaran::PENGELUARAN_STATUS_DONE): ?>
                                        <button class="btn mb-1 btn-danger btn-sm text-white btn-action-iuran" data-action="delete" data-id="<?= $single_pengeluaran->pengeluaran_id ?>" type="button">
                                            <svg class="icon me-2">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                            </svg> Hapus
                                        </button>
                                        <? endif; ?>

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
            } else if(daAction == 'process') {
                actionText = 'memproses data';
            } else if(daAction == 'done') {
                actionText = 'menyelesaikan data';
            }
            vexConfirm(`Apakah kamu yakin ingin ${actionText} pengeluaran ini?`, function(value) {
                if (value) {
                    $.ajax({
                        url: `<?= base_url('') ?>pengeluaran/${daAction}_action`,
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