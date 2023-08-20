<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url() ?>">
                    <i class="bi bi-arrow-left-short"></i>
                </a>
            </div>

            <!-- Page Title -->
            <div class="page-heading">
                <h6 class="mb-0"><?= $menu ?></h6>
            </div>
        </div>
    </div>
</div>

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
                    <h4 class="mb-1"><?= $this->session->nama ?></h4>
                    <p class="mb-0"><i class="bi bi-house"></i> <?= $this->fhe->getByID("tb_user", "id", $this->session->id)->row("domisili") ?> <i class="bi bi-phone"></i> <?= $this->fhe->getByID("tb_user", "id", $this->session->id)->row("hp") ?></p>
                    <span class="badge bg-warning ms-2 rounded-pill"><?= $this->fhe->userType($this->session->tipe_user)->deskripsi ?></span>
                </div>
            </div>
            <!-- Contact Info-->
            <div class="contact-info bg-primary">
                <p class="mb-0 text-truncate">
                    Pilihan Sub Topik : <br>
                    <?= $topik->row("deskripsi") ?>
                </p>
            </div>
        </div>

        <!-- Setting Card-->
        <div class="card mb-3 shadow-sm">
            <div class="card-body direction-rtl">
                <p class="mb-2">Kelengkapan Data</p>

                <div class="single-setting-panel">
                    <a href="<?= base_url("portofolio/status/") ?>">
                        <div class="icon-wrapper">
                            <i class="bi bi-person"></i>
                        </div>
                        Portofolio (<?php if ($portofolio->row("file") != null) { ?><i class="bi bi-check text-success text-right">Sudah Terupload</i> <?php } else { ?> <i class="bi bi-close text-danger text-right">Belum Upload</i> <?php } ?>)
                    </a>
                </div>
                <?php if ($topik->num_rows() != null) { ?>
                    <div class="single-setting-panel">
                        <a href="<?= base_url("topik/edit/") ?>">
                            <div class="icon-wrapper bg-warning">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            Edit Topik Pilihan
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="single-setting-panel">
                        <a href="<?= base_url("topik/tambah/") ?>">
                            <div class="icon-wrapper bg-warning">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            Tambah Topik Pilihan
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php $this->view("message") ?>