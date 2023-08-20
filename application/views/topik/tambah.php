<div class="page-content-wrapper py-3">
    <div class="container">
        <!-- User Meta Data-->
        <div class="card user-data-card">
            <div class="card-body">
                <?= form_open_multipart(); ?>
                <div class="form-group boxed">
                    <div class="input-wrapper not-empty">
                        <h3><?= $menu?></h3>
                        <input type="text" name="deskripsi" class="form-control" minlength="8" minlength="20" required placeholder="Wajib dipisahkan dengan koma (,). Contoh: bahasa indonesia, teks ekplanasi, bahasa inggris dasar. " value="<?= $topik->num_rows() != null ? $topik->row("deskripsi") : ""?>">
                        <i class="clear-input">
                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                        </i>
                    </div>
                </div>
                <hr>
                <div class="form-button">
                    <button type="submit" class="btn btn-success btn-block">
                        <ion-icon name="save-outline"></ion-icon> <?= $menu ?>
                    </button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>