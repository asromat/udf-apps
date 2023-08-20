<?php $this->view("message") ?>
<div class="page-content-wrapper py-3">
    <div class="container">
        <!-- User Meta Data-->
        <div class="card user-data-card">
            <div class="card-body">
                <?= form_open_multipart('') ?>
                <input type="hidden" name="tipe" id="tampiltipe">

                <div class="form-group boxed">
                    <h3>Isikan Informasi Terbaru Akun</h3>
                    <div class="input-wrapper">
                        <label class="label">Nama<span id="alert-resume" class="error">*</span></label>
                        <input type="text" id="word" name="nama" class="form-control" placeholder="Nama Pelaku Usaha/Koperasi yang dikunjungi" value="<?= $row->nama ?>" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Tempat Lahir <span id="alert-resume" class="error">*</span></label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Ex: Kota Malang" value="<?= $row->tempat_lahir ?>" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Tanggal Lahir <span id="alert-resume" class="error">*</span></label>
                        <input type="date" name="tgl_lahir" class="form-control" value="<?= $row->tgl_lahir ?>" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper">
                        <label class="label">Domisili <span id="alert-resume" class="error">*</span></label>
                        <input type="text" name="domisili" class="form-control" placeholder="Ex: Jl. Surabaya No. 5, Sumbersari, Kota Malang" value="<?= $row->domisili ?>" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <?php if ($row->foto != null) { ?>
                        <div>
                            <img src="<?= base_url('files/foto_profil/' . $row->foto) ?>" style="width: 10%"><br>
                            <input type="hidden" name="foto" value="<?= $this->input->post('foto') ?? $row->foto; ?>">
                            <a href="<?= site_url('profil/hapusfoto/' . $row->id); ?>"><small>Hapus foto?</small></a>
                        </div>
                    <?php } else {  ?>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="foto">
                            <small>Maksimal ukuran file 514 Kb</small>
                            <br>
                        </div>
                    <?php } ?>
                    <hr>
                    <div class="form-button">
                        <button type="submit" class="btn btn-success btn-block">EDIT</button>
                        <button type="reset" class="btn btn-outline-danger btn-block">ULANGI</button>
                        <button type="button" class="btn btn-primary btn-block" onclick="history.back()">KEMBALI</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>