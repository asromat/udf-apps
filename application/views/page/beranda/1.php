<div class="page-content-wrapper">
    <?php $this->view("message") ?>

    <!-- Tiny Slider One Wrapper -->
    <div class="tiny-slider-one-wrapper">
        <div class="tiny-slider-one">
            <!-- Single Hero Slide -->
            <div>
                <div class="single-hero-slide bg-overlay" style="background-image: url('<?= base_url() ?>/assets/img/template/slide1.jpg')">
                    <div class="h-100 d-flex align-items-center text-center">
                        <div class="container">
                            <h3 class="text-white mb-1">Belajar Efektif dengan Manajemen Pengetahuan</h3>
                            <p class="text-white mb-4">KM Learning System membantumu belajar dengan memberikan rekomendasi berdasarkan keinginan dan kamampuanmu.</p>
                            <a class="btn btn-creative btn-warning" href="<?= base_url("belajar") ?>">Pelajari</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div>
                <div class="single-hero-slide bg-overlay" style="background-image: url('<?= base_url() ?>/assets/img/template/slide2.jpg')">
                    <div class="h-100 d-flex align-items-center text-center">
                        <div class="container">
                            <h3 class="text-white mb-1">Menggunakan Model SECI</h3>
                            <p class="text-white mb-4">Penggunaan model SECI memungkinkan kamu memiliki susunan materi sesuai hasil analisis karakteristikmu.</p>
                            <a class="btn btn-creative btn-warning" href="<?= base_url("belajar") ?>">Pelajari</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-3"></div>

    <div class="container">
        <div class="card bg-primary mb-3 bg-img" style="background-image: url('<?= base_url() ?>/assets/img/core-img/1.png')">
            <div class="card-body direction-rtl p-4">
                <h2 class="text-white">Yuk Selesaikan Misi Belajarmu !</h2>
                <p class="mb-4 text-white">Materi telah disusun berdasarkan analisis keinginan dan kemampuanmu. Jadi, kamu bisa dengan mudah belajar.</p>
                <a class="btn btn-creative btn-warning" href="<?= base_url("p/knowledge-management") ?>">Tentang Knowledge Management</a>
                <a class="btn btn-creative btn-secondary" target="_blank" href="https://www.canva.com/design/DAFoR29g8Z8/ZxEbkh5U4pqpto4UfxGMOw/view?utm_content=DAFoR29g8Z8&utm_campaign=designshare&utm_medium=link&utm_source=publishsharelink">Petunjuk Penggunaan</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card bg-warning mb-3 bg-img" style="background-image: url('<?= base_url() ?>/assets/img/core-img/1.png')">
            <div class="card-body direction-rtl p-2">
                <h4 class="text-white text-center">List Materi</h4>
            </div>
        </div>
        <?php
        $no = 1;
        foreach ($menubelajar->result() as $key => $datas) {;
            $data = $this->fhe->getById("tb_tema", "id", $datas->tema_id)->row();
        ?>
            <!-- Timeline Content -->
            <a href="<?= base_url("belajar/rekomendasimateri/" . $data->id) ?>">
                <div class="card timeline-card bg-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="timeline-text mb-2">
                                <span class="badge mb-2 rounded-pill"><?= strtoupper($data->kategori) ?></span>
                                <h6><?= $data->topik ?></h6>
                            </div>
                            <div class="timeline-icon mb-2">
                                <i class="bi bi-award h1 mb-0"></i>
                            </div>
                        </div>
                        <p class="mb-2"><?= $data->deskripsi ?></p>
                        <!-- Single Skill Progress Bar -->
                        <!-- <div class="skill-progress-bar d-flex align-items-center mb-2">
                    <div class="skill-icon shadow-sm p-2">
                        <i class="bi bi-code text-dark fz-20"></i>
                    </div>

                    <div class="skill-data">
                        <div class="skill-name d-flex align-items-center justify-content-between">
                            <p class="mb-1">Progress</p>
                            <small class="mb-1">
                                <span class="counter">78</span>%
                            </small>
                        </div>

                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar" style="width: 78%;" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> -->
                        <div class="timeline-tags mb-2">
                            <?php foreach ($this->fhe->showTag($data->tag) as $tag) {; ?>
                                <a href="<?= base_url("tag") ?>/<?= $tag ?>"><span class="badge fw-normal bg-primary">#<?= $tag ?></span></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>

    <div class="pb-3"></div>

    <div class="container">
        <div class="card mb-3" style="background-image: url('<?= base_url() ?>/assets/img/core-img/1.png')">
            <div class="card-body">
                <span class="d-inline-block badge bg-warning mb-2">
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill me-1"></i>
                    <i class="bi bi-star-fill"></i>
                </span>
                <h3>Informasi Terbaru</h3>

                <div class="testimonial-slide-three-wrapper">
                    <div class="testimonial-slide3 testimonial-style3">

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="text-content">
                                <h6 class="mb-2">Baca panduan penggunaan agar lebih mudah menggunakan platform KM Learning System</h6>
                                <span class="d-block">Fitrah Izul Falaq, Admin</span>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="text-content">
                                <h6 class="mb-2">Platfom ini dalam tahap uji coba. Kritik dan saran bisa menghubungi 081 231 390 340 (Fitrah)</h6>
                                <span class="d-block">Fitrah Izul Falaq, Admin</span>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide">
                            <div class="text-content">
                                <h6 class="mb-2">Saat ini tersedia 3 materi pokok, selamat belajar.</h6>
                                <span class="d-block">Fitrah Izul Falaq, Admin</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="text-center">
                <a href="https://wa.me/6281231390340" class="btn btn-success btn-block">Beri tanggapan Penelitian</a>
            </div>
        </div>
    </div>

    <div class="pb-3"></div>

</div>