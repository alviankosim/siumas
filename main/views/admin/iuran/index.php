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
                            <th>Actions</th>
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
                                        '<span class="badge me-1 bg-info">KEBERSIHAN</span>'
                                        : '<span class="badge me-1 bg-warning">KEBERSIHAN</span>'
                                    ?>
                                </td>
                                <td>
                                    <?= format_rupiah($single_iuran->total_amount) ?>
                                </td>
                                <td>
                                    <?= date("M Y", strtotime($single_iuran->due_date)) ?>
                                </td>
                                <td>
                                    <button class="btn btn-secondary btn-sm text-white" type="button">
                                        <svg class="icon me-2">
                                            <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                        </svg> Edit
                                    </button>
                                    <button class="btn btn-danger btn-sm text-white" type="button">
                                        <svg class="icon me-2">
                                            <use xlink:href="<?= base_url('', true) ?>vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                        </svg> Hapus
                                    </button>
                                </td>
                            </tr>
                        <? endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>