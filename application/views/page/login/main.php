<!-- Login Wrapper Area -->
<div class="login-wrapper d-flex align-items-center justify-content-center">
    <div class="custom-container">
        <div class="text-center px-4">
            <img class="login-intro-img" src="<?= base_url() ?>/assets/img/template/login.png" alt="Login KM Learning System">
        </div>

        <!-- Register Form -->
        <div class="register-form mt-4">
            <h4 class="mb-3 text-center">Login Pengguna</h4>

            <form action="<?= site_url('auth/process') ?>" method="post">
                <div class="form-group">
                    <input name="username" class="form-control" type="text" id="username" placeholder="Email" required>
                </div>

                <div class="form-group position-relative">
                    <input name="password" class="form-control" id="psw-input" type="password" placeholder="Password" required>
                    <div class="position-absolute" id="password-visibility">
                        <i class="bi bi-eye"></i>
                        <i class="bi bi-eye-slash"></i>
                    </div>
                </div>

                <button name="login" class="btn btn-primary w-100" type="submit">Login</button>

                <!-- <hr>
                <a class="btn btn-primary btn-google mb-1 w-100" href="<?= base_url("auth/google") ?>">
                    <i class="bi bi-google me-1"></i> Login dengan Google
                </a>
                <a class="btn btn-success mb-1 w-100" href="<?= base_url("auth/loginOTP") ?>">
                    <i class="bi bi-whatsapp me-1"></i> Login dengan No WA
                </a> -->
                <hr>
<!--                 
                <a class="btn btn-outline-info mb-1 w-100" target="_blank" href="https://www.canva.com/design/DAFoR29g8Z8/ZxEbkh5U4pqpto4UfxGMOw/view?utm_content=DAFoR29g8Z8&utm_campaign=designshare&utm_medium=link&utm_source=publishsharelink">
                    <i class="bi bi-whatsapp me-1"></i> Petunjuk Penggunaan
                </a> -->
            </form>
        </div>

        <!-- Login Meta -->
        <div class="login-meta-data text-center">
            <a class="stretched-link forgot-password d-block mt-3 mb-1" href="<?= base_url("pendaftaran/forget") ?>">Lupa Password?</a>
            <p class="mb-0">Belum memiliki akun? <a class="stretched-link" href="<?= base_url("pendaftaran/tambah") ?>">Daftar Sekarang</a></p>
        </div>
    </div>
</div>

<?php $this->view("message") ?>