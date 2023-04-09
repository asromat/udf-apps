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
            <img class="mx-auto mb-4 d-block" src="<?=base_url()?>/assets/img/template/settings.png" alt="">
            <h3>Verify Phone Number</h3>
        </div>

        <!-- OTP Verify Form -->
        <div class="otp-verify-form mt-4">
            <form action="<?= site_url('auth/validationOTP') ?>" method="post" id="FormLogin">
                <div class="form-group boxed">
                    <div class="input-wrapper">
                        <input type="tel" class="form-control" name="otp" placeholder="Masukkan kode OTP" minlength="6" maxlength="6" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="login" class="btn btn-success btn-block"><ion-icon name="key-outline"></ion-icon>VALIDASI</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Term & Privacy Info -->
        <div class="login-meta-data text-center">
            <p class="mt-3 mb-0">Tidak menerima OTP? <a href="<?=base_url("")?>"><span class="otp-sec" id="resendOTP">Kembali</span></a></p>
        </div>
    </div>
</div>

<?php $this->view('message'); ?>