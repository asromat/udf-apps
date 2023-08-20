<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="card mb-3 shadow-sm team-member-card shadow">
            <div class="card-body">
                <!-- Member Image-->
                <div class="team-member-img shadow-sm">
                    <img src="<?= base_url() ?>/assets/img/icons/icon-512x512.png" alt="">
                </div>
                <!-- Team Info-->
                <div class="team-info">
                    <h4 class="mb-1"><?= $praktisi->row("nama") ?></h4>
                    <p class="mb-0"><i class="bi bi-house"></i> <?= $praktisi->row("domisili") ?> <i class="bi bi-phone"></i> <?= $praktisi->row("hp") ?></p>
                </div>
                <hr>
                <?= form_open_multipart(); ?>
                <div class="form-group boxed">
                    <div class="input-wrapper not-empty">
                        <h3>Masukkan Topik yang Ditawarkan pada Praktisi</h3>
                        <input type="hidden" name="praktisi" value="<?= $praktisi->row("id") ?>" readonly>
                        <input type="text" name="topik" class="form-control" minlength="8" minlength="20" required placeholder="Topik yang ingin diajarkan, misal: Bahasa Indonesia Kelas X ">
                        <i class="clear-input">
                            <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                        </i>
                    </div>
                </div>
                <hr>
                <div class="form-button">
                    <button type="submit" class="btn btn-success btn-block">
                        <ion-icon name="save-outline"></ion-icon> Proses Praktisi
                    </button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>

    </div>
</div>

<?php $this->view("message") ?>