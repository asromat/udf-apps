  <!-- Back Button -->
  <div class="login-back-button">
    <a href="<?=base_url("auth/login")?>">
      <i class="bi bi-arrow-left-short"></i>
    </a>
  </div>

<!-- Login Wrapper Area -->
<div class="login-wrapper d-flex align-items-center justify-content-center">
    <div class="custom-container">
        <div class="text-center">
            <img class="mx-auto mb-4 d-block" src="<?=base_url()?>/assets/img/template/otp.png" alt="">
            <h3>Verifikasi Nomor HP</h3>
            <p>Sistem akan mengirimkan kode OTP melalui nomor HP Berikut</p>
        </div>

        <!-- OTP Send Form -->
        <div class="otp-form mt-4">
            <form action="<?= base_url('auth/checkOtp') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="tel" class="form-control" name="hp" placeholder="Ex: 081231390340"  minlength="11" maxlength="15" required>
                </div>
                <button name="login" class="btn btn-primary w-100" type="submit">Kirim OTP</button>
            </form>
        </div>
    </div>
</div>

<?php $this->view('message'); ?>