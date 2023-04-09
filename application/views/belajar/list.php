<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?=base_url("")?>">
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
        <div class="card">
            <div class="card-body">
            <img class="mb-3 rounded" src="<?=base_url()?>/assets/img/template/belajar.png" alt="">
            <h2>Dapatkan Insight</h2>
            <p>Sebelum mempelajari materi, silahkan simak pengetahuan terlebih dahulu</p>
                <!-- Single Plan Check -->
                <div class="single-plan-check shadow-sm active-effect bg-primary" onclick="location.href= '<?= base_url('forum') ?>'">
                    <div class="form-check mb-0">
                        <label class="form-check-label text-white" for="Individual">Insight Forum</label>
                    </div>
                    <i class="bi bi-people-fill text-white fz-20 ms-auto"></i>
                </div>
                
                <!-- Single Plan Check -->
                <div class="single-plan-check shadow-sm active-effect bg-primary" onclick="location.href= '<?= base_url('belajar/insightVideo') ?>'">
                    <div class="form-check mb-0">
                        <label class="form-check-label text-white" for="Individual">Insight Video</label>
                    </div>
                    <i class="bi bi-camera-video-fill text-white fz-20 ms-auto"></i>
                </div>

                <!-- Single Plan Check -->
                <div class="single-plan-check shadow-sm active-effect bg-primary" onclick="location.href= '<?= base_url('belajar/insightJurnal') ?>'">
                    <div class="form-check mb-0">
                        <label class="form-check-label text-white" for="Individual">Insight Artikel / Jurnal</label>
                    </div>
                    <i class="bi bi-chat-left-text-fill text-white fz-20 ms-auto"></i>
                </div>

                <div class="text-center">
                    <a href="<?= base_url("belajar/menu") ?>" class="btn btn-creative btn-success btn-block">Mulai Belajar</a>
                </div>
            </div>
        </div>
    </div>
</div>