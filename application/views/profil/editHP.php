<div class="page-content-wrapper py-3">
    <div class="container">
        <!-- User Meta Data-->
        <div class="card user-data-card">
            <div class="card-body">
                <?= form_open_multipart(); ?>
                <div class="form-group boxed">
                    <div class="input-wrapper not-empty">
                        <h4>Masukkan Nomor HP</h4>
                        <input type="text" name="hp" class="form-control" minlength="9" maxlength="15" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                        </i>
                    </div>
                    <hr>
                    <div class="input-wrapper not-empty">
                        <h4>Masukkan Password</h4>
                        <input type="password" name="password" class="form-control" minlength="8" minlength="20" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                        </i>
                    </div>
                </div>
                <?php echo form_error('hp') ?>
                <hr>
                <div class="form-button">
                    <button type="submit" class="btn btn-success btn-block">
                        <ion-icon name="save-outline"></ion-icon> UPDATE DATA
                    </button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>