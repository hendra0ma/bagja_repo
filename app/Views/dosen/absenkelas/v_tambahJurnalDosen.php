<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title ?></h3>

                <div class="box-tools pull-right">

                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <?php
                echo form_open_multipart('Dsn/actTambahJurnalDosen');
                ?>

                <input type="hidden" value="<?= $id_jadwal ?>" name="id_jadwal">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Pertemuan Ke </label>
                        <input type="text" name="pertemuan" class="form-control" placeholder="Pertemuan">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input type="text" name="nama_dosen" class="form-control" placeholder="Nama Dosen" value="<?= $getDosen[0]->nama_dosen ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>Mata Kuliah</label>
                    <select name="matkul" class="form-control">
                        <option value="">--Pilih Program Studi--</option>
                        <?php foreach ($matkul as $mat) : ?>
                            <option value="<?= $mat->matkul ?>"><?= $mat->matkul ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group">
                    <label>kelas</label>
                    <input type="text" name="kelas" class="form-control" placeholder="kelas">
                </div>
                <div class="form-group">
                    <label>semester</label>
                    <input type="number" name="semester" class="form-control" placeholder="semester">
                </div>
                <div class="form-group">
                    <label>hari</label>
                    <input type="text" name="hari" class="form-control" placeholder="hari">
                </div>
                <div class="form-group">
                    <label>tanggal</label>
                    <input type="date" name="tanggal" class="form-control" placeholder="tanggal">
                </div>
                <div class="form-group">
                    <label>Waktu Awal</label>
                    <input type="text" name="awal_waktu" class="form-control" placeholder="Waktu Awal">
                </div>
                <div class="form-group">
                    <label>Akhir Waktu</label>
                    <input type="text" name="akhir_waktu" class="form-control" placeholder="Akhir Waktu">
                </div>
                <div class="form-group">
                    <label>Uraian Materi</label>
                    <textarea name="uraian_materi" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jumlah Mahasiswa</label>
                        <input type="number" name="jmlh_mhs" class="form-control" placeholder="Jumlah Mahasiswa">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jumlah Mahasiswa Hadir</label>
                        <input type="number" name="jmlh_mhs_hadir" class="form-control" placeholder="Jumlah Mahasiswa Hadir">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Jumlah Mahasiswa Tidak Hadir</label>
                        <input type="number" name="jmlh_mhs_tidak_hadir" class="form-control" placeholder="Jumlah Mahasiswa Tidak Hadir">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label> Mahasiswa Tidak Hadir : </label> <br>
                        <?php foreach ($mhs as $mh) : ?>
                            <input type="checkbox" id="mhs_tidak_hadirs[]" name="mhs_tidak_hadirs[]" value="<?= $mh['nim'] ?>">
                            <label for="mhs_tidak_hadirs[]"> <?= $mh['nama_mhs'] ?> </label><br>
                        <?php endforeach ?>

                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>catatan Dosen</label>
                        <textarea name="ctt_dosen" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Tanggal Catatan Dosen</label>
                        <input type="date" name="tgl_ctt_dosen" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label>Tanda Tangan Dosen</label>
                        <input type="file" name="ttd_dosen" class="form-control" id="">
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-danger pull-left btn-flat">Close</a>
                    <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-sm-3">
        </div>
    </div>