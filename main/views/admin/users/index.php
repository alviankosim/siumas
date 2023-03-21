<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header"><strong>List Pengguna</strong><span class="small ms-1"></span></div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Terakhir Login</th>
                            <th class="text-center" style="width: 40px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? $no = 1 ?>
                        <? foreach ($data_users as $single_user) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $single_user->user_fullname ?></td>
                                <td><?= $single_user->user_name ?></td>
                                <td>
                                    <?= $single_user->role_id == Users::ROLE_ID_ADMIN ?
                                        '<span class="badge me-1 bg-info">ADMIN</span>'
                                        : '<span class="badge me-1 bg-info">PENAGIH</span>'
                                    ?>
                                </td>
                                <td>
                                    <?= date("d-M-Y H:i:s", strtotime($single_user->last_login)) ?>
                                </td>
                                <td>
                                    <div style="display: flex;flex-direction:column;justify-content: center;">
                                        <button class="btn mb-1 btn-secondary btn-sm text-white" onclick="location.href='<?= base_url('users/edit?id=' . $single_user->user_id) ?>'" type="button">
                                            <svg class="icon me-2">
                                                <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                            </svg> Edit
                                        </button>

                                        <button class="btn mb-1 btn-danger btn-sm text-white btn-action-iuran" data-action="delete" data-id="<?= $single_user->user_id ?>" type="button">
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
            vexConfirm(`Apakah kamu yakin ingin ${actionText} users ini?`, function(value) {
                if (value) {
                    $.ajax({
                        url: `<?= base_url('') ?>users/${daAction}_action`,
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