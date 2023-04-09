<div class="page-content-wrapper py-3">
    <div class="container">
        <!-- User Information -->
        <div class="card user-info-card mb-3">
            <div class="card-body d-flex align-items-center">
                <div class="user-profile me-3">
                    <img src="<?= base_url() ?>/assets/img/icons/icon-512x512.png" alt="">
                </div>
                <div class="user-info">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-1"><?= $this->fhe->getByID("tb_user","id",$this->session->id)->row("nama")?></h5>
                        <span class="badge bg-warning ms-2 rounded-pill"><?= $this->fhe->userType($this->session->tipe_user)->deskripsi?></span>
                    </div>
                    <p class="mb-0"><i class="bi bi-house"></i> <?= $this->fhe->getByID("tb_user","id",$this->session->id)->row("domisili")?> <i class="bi bi-phone"></i> <?= $this->fhe->getByID("tb_user","id",$this->session->id)->row("hp")?></p> 
                </div>
            </div>
        </div>
        <!-- Setting Card-->
        <div class="card mb-3 shadow-sm">
            <div class="card-body direction-rtl">
                <p class="mb-2">Pengaturan Akun</p>

                <div class="single-setting-panel">
                    <a href="<?= base_url("profil/edit/".$this->session->id)?>">
                        <div class="icon-wrapper">
                            <i class="bi bi-person"></i>
                        </div>
                        Update Profil
                    </a>
                </div>

                <div class="single-setting-panel">
                    <a href="<?= base_url("profil/setPassword")?>">
                        <div class="icon-wrapper bg-warning">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        Ganti Password
                    </a>
                </div>
            </div>
        </div>

        <!-- Setting Card-->
        <div class="card mb-3 shadow-sm">
            <div class="card-body direction-rtl">
                <p class="mb-2">Aksesbilitas</p>

                <div class="single-setting-panel">
                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="darkSwitch">
                        <label class="form-check-label" for="darkSwitch">Dark Mode</label>
                    </div>
                </div>

                <div class="single-setting-panel">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rtlSwitch">
                        <label class="form-check-label" for="rtlSwitch">RTL Mode</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Setting Card-->
        <div class="card shadow-sm">
            <div class="card-body direction-rtl">
                <div class="single-setting-panel">
                    <a href="<?= base_url("p/petunjuk") ?>">
                        <div class="icon-wrapper bg-info">
                            <i class="bi bi-info-circle"></i>
                        </div>
                        Petunjuk Penggunaan
                    </a>
                </div>

                <div class="single-setting-panel">
                    <a href="<?= base_url("p/pengembang") ?>">
                        <div class="icon-wrapper bg-info">
                            <i class="bi bi-info-circle"></i>
                        </div>
                        Tentang Pengembang
                    </a>
                </div>

                <div class="single-setting-panel">
                    <a href="<?= base_url("p/rekomendasi") ?>">
                        <div class="icon-wrapper bg-info">
                            <i class="bi bi-info-circle"></i>
                        </div>
                        Kritik dan Saran
                    </a>
                </div>

                <div class="single-setting-panel">
                    <a href="<?=base_url("auth/logout")?>">
                        <div class="icon-wrapper bg-danger">
                            <i class="bi bi-box-arrow-right"></i>
                        </div>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->view("message")?>