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
                            <h3 class="text-white mb-1">Wujudkan Kolaborasi Komunitas dan Sekolah</h3>
                            <p class="text-white mb-4">Menghubungkan praktisi di komunitas pendidikan dan akademis di lingkungan sekolah. Kami menjadi media dan penghubung untuk saling berkolaborasi mewujudkan cita-cita pendidikan.</p>
                            <a class="btn btn-creative btn-warning" href="https://budayakonservasitambrauw.com/">Pelajari</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div>
                <div class="single-hero-slide bg-overlay" style="background-image: url('<?= base_url() ?>/assets/img/template/slide2.jpg')">
                    <div class="h-100 d-flex align-items-center text-center">
                        <div class="container">
                            <h3 class="text-white mb-1">Upaya dan Kontribusi</h3>
                            <p class="text-white mb-4">Aplikasi Budaya Konservasi Kab. Tambrauw berdedikasi memberikan upaya terbaik untuk mengoptimalkan sumber daya dan mewujudkan pendidikan yang lebih baik.</p>
                            <a class="btn btn-creative btn-warning" href="<?= base_url("p/petunjuk") ?>">Petunjuk Penggunaan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="pt-3"></div>

    <div class="container">
        <div class="card bg-primary mb-3 bg-img" style="background-image: url('<?= base_url() ?>/assets/img/core-img/1.png')">
            <div class="card-body direction-rtl p-4">
                <h2 class="text-white">Yuk Selesaikan Misi Belajarmu !</h2>
                <p class="mb-4 text-white">Materi telah disusun berdasarkan analisis keinginan dan kemampuanmu. Jadi, kamu bisa dengan mudah belajar.</p>
                <a class="btn btn-creative btn-warning" href="<?= base_url("p/knowledge-management") ?>">Tentang Knowledge Management</a>
                <a class="btn btn-creative btn-secondary" target="_blank" href="https://www.canva.com/design/DAFoR29g8Z8/ZxEbkh5U4pqpto4UfxGMOw/view?utm_content=DAFoR29g8Z8&utm_campaign=designshare&utm_medium=link&utm_source=publishsharelink">Petunjuk Penggunaan</a>
            </div>
        </div>
    </div> -->

    <div class="pb-3"></div>

    <div class="container">
        <div class="card mb-3" style="background-image: url('<?= base_url() ?>/assets/img/core-img/1.png')">
            <div class="card-body text-center">
                <h3>Menu Utama</h3>
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url("portofolio/detail/")?>">
                            <img class="img-fluid img-thumbnail" src="<?= base_url() ?>/assets/img/pic/portofolio.png" alt="">
                        </a>
                        <h6>Tambah Portofolio</h6>
                    </div>
                    <div class="col">
                        <a href="<?= base_url("treatment/praktisilist")?>">
                            <img class="img-fluid img-thumbnail" src="<?= base_url() ?>/assets/img/pic/penawaran.png" alt="">
                        </a>
                        <h6>Penawaran Mengajar</h6>
                    </div>
                </div>
                <br>
                <div class="row">
                    <!-- <div class="col">
                        <a href="">
                            <img class="img-fluid img-thumbnail" src="<?= base_url() ?>/assets/img/pic/datakelas.png" alt="">
                        </a>
                        <h6>Data Kelas</h6>
                    </div>
                    <div class="col">
                        <a href="">
                            <img class="img-fluid img-thumbnail" src="<?= base_url() ?>/assets/img/pic/kerjasama.png" alt="">
                        </a>
                        <h6>Kerjasama</h6>
                    </div> -->
                    <div class="col">
                        <a href="<?= base_url("jadwal/belajar")?>">
                            <img class="img-fluid img-thumbnail" src="<?= base_url() ?>/assets/img/pic/belajar.png" alt="">
                        </a>
                        <h6>Belajar</h6>
                    </div>
                    <div class="col">
                        <a href="<?= base_url("profil/edit/" . $this->session->id) ?>">
                            <img class="img-fluid img-thumbnail" src="<?= base_url() ?>/assets/img/pic/setting.png" alt="">
                        </a>
                        <h6>Setting Akun</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-3"></div>

</div>