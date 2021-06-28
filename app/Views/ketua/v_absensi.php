<section class="content-header">

    <br>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('dsn/AbsenKelas') ?>"><i class="fa fa-dashboard"></i> Abasen Kelas</a></li>
        <li class="active">Absensi</li>
    </ol>
</section>
<div class="col-sm-12">
    <?php

    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    ?>
    <?php echo form_open('ketua/SimpanAbsen/' . $jadwal['id_jadwal'], 'enctype="multipart/form-data"') ?>
    <table class="table table-striped table-bordered table-responsive text-sm">
        <tr class="label-success">
            <th rowspan="2" class="text-center">#</th>
            <th rowspan="2" class="text-center">NIM</th>
            <th rowspan="2" class="text-center">Mahasiswa</th>
            <th colspan="18" class="text-center">Pertemuan</th>
        </tr>
        <tr class="label-success">
            <td class="text-center">1</td>
            <td class="text-center">2</td>
            <td class="text-center">3</td>
            <td class="text-center">4</td>
            <td class="text-center">5</td>
            <td class="text-center">6</td>
            <td class="text-center">7</td>
            <td class="text-center">8</td>
            <td class="text-center">9</td>
            <td class="text-center">10</td>
            <td class="text-center">11</td>
            <td class="text-center">12</td>
            <td class="text-center">13</td>
            <td class="text-center">14</td>
            <td class="text-center">15</td>
            <td class="text-center">16</td>
        </tr>
        <?php $no = 1;
        foreach ($mhs as $key => $value) {

            echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']);
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td class="text-center"><?= $value['nim'] ?></td>
                <td><?= $value['nama_mhs'] ?></td>
                <td>

                    <select disabled name="<?= $value['id_krs'] ?>p1">
                        <option value="0" <?php if ($value['p1'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p1'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p1'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p1'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p2">
                        <option value="0" <?php if ($value['p2'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p2'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p2'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p2'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>

                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p3">
                        <option value="0" <?php if ($value['p3'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p3'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p3'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p3'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p4">
                        <option value="0" <?php if ($value['p4'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p4'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p4'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p4'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p5">
                        <option value="0" <?php if ($value['p5'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p5'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p5'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p5'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p6">
                        <option value="0" <?php if ($value['p6'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p6'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p6'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p6'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p7">
                        <option value="0" <?php if ($value['p7'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p7'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p7'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p7'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p8">
                        <option value="0" <?php if ($value['p8'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p8'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p8'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p8'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p9">
                        <option value="0" <?php if ($value['p9'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p9'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p9'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p9'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p10">
                        <option value="0" <?php if ($value['p10'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p10'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p10'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p10'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p11">
                        <option value="0" <?php if ($value['p11'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p11'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p11'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p11'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p12">
                        <option value="0" <?php if ($value['p12'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p12'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p12'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p12'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p13">
                        <option value="0" <?php if ($value['p13'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p13'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p13'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p13'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p14">
                        <option value="0" <?php if ($value['p14'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p14'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p14'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p14'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p15">
                        <option value="0" <?php if ($value['p15'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p15'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p15'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p15'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
                <td>
                    <select disabled name="<?= $value['id_krs'] ?>p16">
                        <option value="0" <?php if ($value['p16'] == 0) {
                                                echo 'selected';
                                            } ?>>A</option>
                        <option value="1" <?php if ($value['p16'] == 1) {
                                                echo 'selected';
                                            } ?>>I</option>>I</option>
                        <option value="2" <?php if ($value['p16'] == 2) {
                                                echo 'selected';
                                            } ?>>H</option>>H</option>
                        <option value="2" <?php if ($value['p16'] == 3) {
                                                echo 'selected';
                                            } ?>>S</option>>S</option>
                    </select>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="3" class="label-success">Tanda Tangan Ketua</td>

            <input type="hidden" name="id_jadwal" value="<?= $jadwal['id_jadwal'] ?>">

            <td>

                <input type="file" name="ttd_p1" style="width:40px">

            </td>
            <td>
                <input type="file" name="ttd_p2" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p3" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p4" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p5" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p6" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p7" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p8" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p9" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p10" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p11" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p12" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p13" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p14" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p15" style="width:40px">
            </td>
            <td>
                <input type="file" name="ttd_p16" style="width:40px">
            </td>
        </tr>
    </table>
    <button class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan Absen</button>
    <?php echo form_close() ?>
</div>
</div>