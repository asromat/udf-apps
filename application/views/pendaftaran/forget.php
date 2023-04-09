<!-- Back Button -->
<div class="login-back-button">
    <a href="<?= base_url("auth/login") ?>">
        <i class="bi bi-arrow-left-short"></i>
    </a>
</div>

<!-- Login Wrapper Area -->
<div class="login-wrapper d-flex align-items-center justify-content-center">
    <div class="custom-container">
        <div class="text-center px-4">
            <img class="login-intro-img" src="<?= base_url() ?>assets/img/bg-img/37.png" alt="">
        </div>

        <!-- Register Form -->
        <div class="register-form mt-4">
            <?= form_open_multipart('') ?>
            <div class="form-group text-start mb-3">
                <input name="hp" class="form-control" type="text" placeholder="Ex: 081231390340">
            </div>
            <button class="btn btn-primary w-100" type="submit">Kirim Informasi Akun</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?php $this->view("message") ?>