<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="card image-gallery-card direction-rtl">
            <div class="card-body">
                <h1>Ceritakan pengalaman dan ilmu baru yang kamu dapatkan</h1>
                <!-- form start -->
                <h3>Materi : <?= $this->fhe->getById("tb_tema","id",$this->uri->segment("3"))->row("topik")?></h3>
                <?= form_open_multipart('') ?>
                <div class="form-group">
                    <label>Judul</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="judul" placeholder="Ex: Petunjuk penggunaan media pembelajaran" value="<?= set_value('judul'); ?>" required>
                    </div>
                    <?php echo form_error('judul') ?>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <div class="input-group mb-3">
                        <textarea class="form-control" rows="3" name="deskripsi" id="summernote" required style="width: 100%"><?php echo form_error('deskripsi') ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="foto">
                    <small>Maksimal ukuran file 514 Kb</small>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" required>
                    <label class="form-check-label" for="exampleCheck1">Pastikan data sudah benar</label>
                </div>
                <input type="hidden" name="tema_id" value="<?= $this->uri->segment("3")?>">
                <button id="btn-submit" type="submit" class="btn btn-success btn-sm" onclick="document.getElementById('btn-submit').innerHTML='Proses Upload'">Tambah</button>
                <button type="reset" class="btn btn-danger btn-sm">Ulangi</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>