<section class="content-header">
    <h1>

    </h1>
    <br>
</section>

<div class="row">
    <?php

    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    ?>
    <table class="table table-striped table-bordered table-responsive">
        <tr class="label-success">
            <th>#</th>

            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Absensi</th>
        </tr>
        <?php $no = 1;
        foreach ($pertemuan as $key => $value) { ?>
            <tr>
                <td><?= $no++ ?></td>

                <td><?= $value['kode_matkul'] ?></td>
                <td><?= $value['matkul'] ?></td>
                <td><?= $value['sks'] ?></td>
                <td class="text-center">
                    <a href="<?= base_url('ketua/absensi/' . $value['id_jadwal']) ?>" class="btn btn-success btn-sm btn-flat">
                        <i class="fa fa-calendar"></i> Absensi
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>