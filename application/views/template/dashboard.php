<html lang="id">

<head>
    <!-- Default Head -->
    <?php $this->load->view("components/script/meta") ?>
    <!-- ! Default Head -->
</head>

<body>
      <!-- Preloader -->
  <div id="preloader">
    <div class="spinner-grow text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  
    <!-- Checking -->

    <?php $this->load->view("components/script/checking") ?>

    <!-- ! Checking -->

    <!-- Header Area -->
    <div class="header-area" id="headerArea">
        <div class="container">
            <!-- Header Content -->
            <div class="header-content header-style-one position-relative d-flex align-items-center justify-content-between">
                <!-- Navbar Toggler -->
                <div class="navbar--toggler" id="affanNavbarToggler" data-bs-toggle="offcanvas" data-bs-target="#affanOffcanvas" aria-controls="affanOffcanvas">
                    <span class="d-block"></span>
                    <span class="d-block"></span>
                    <span class="d-block"></span>
                </div>

                <!-- Logo Wrapper -->
                <div class="logo-wrapper">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>/assets/img/core-img/logo.png" alt="">
                    </a>
                </div>

                <!-- Settings -->
                <div class="setting-wrapper">
                    <div class="setting-trigger-btn">
                        <a href="<?= base_url("auth/logout") ?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- # Sidenav Left -->
    <div class="offcanvas offcanvas-start" id="affanOffcanvas" data-bs-scroll="true" tabindex="-1" aria-labelledby="affanOffcanvsLabel">

        <button class="btn-close btn-close-white text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>

        <div class="offcanvas-body p-0">
            <div class="sidenav-wrapper">
                <!-- Sidenav Profile -->
                <div class="sidenav-profile bg-gradient">
                    <div class="sidenav-style1"></div>

                    <!-- User Thumbnail -->
                    <div class="user-profile">
                        <img src="<?= base_url() ?>/assets/img/icons/icon-512x512.png" alt="">
                    </div>

                    <!-- User Info -->
                    <div class=" user-info">
                        <h6 class="user-name mb-0"><?= $this->session->nama?></h6>
                        <span><?= $this->fhe->userType($this->session->tipe_user)->deskripsi?></span>
                    </div>
                </div>

                <!-- Sidenav Nav -->
                <ul class="sidenav-nav ps-0">
                    <li>
                        <a href="<?= base_url("p/settings")?>"><i class="bi bi-person-circle"></i> Profil</a>
                    </li>
                    <li>
                        <a href="<?= base_url("p/petunjuk/")?>"><i class="bi bi-info-circle"></i> Petunjuk Penggunaan</a>
                    </li>
                    <li>
                        <a href="<?= base_url("p/pengembang/")?>"><i class="bi bi-info-circle"></i> Tentang Pengembang</a>
                    </li>
                    <li>
                        <a href="<?= base_url("p/faq/")?>"><i class="bi bi-info-circle"></i> FAQ</a>
                    </li>
                    <li>
                        <div class="night-mode-nav">
                            <i class="bi bi-moon"></i> Dark Mode
                            <div class="form-check form-switch">
                                <input class="form-check-input form-check-success" id="darkSwitch" type="checkbox">
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="<?= base_url("auth/logout")?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>

                <!-- Social Info -->
                <div class="social-info-wrap">
                    <a href="https://facebook.com/fitrah.jurnalistik">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://twitter.com/fitrahizulfalaq">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="https://instagram.com/fitrahizulfalaq">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://id.linkedin.com/in/fitrahizulfalaq">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>

                <!-- Copyright Info -->
                <div class="copyright-info">
                    <p>
                        <span id="copyrightYear"></span>
                        &copy; Made by <a href="https://ceo.bikinkarya.com">Fitrah Izul Falaq</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->

    <?= $contents ?>

    <!-- ! Content -->

    <!-- Footer Nav -->
    <div class="footer-nav-area" id="footerNav">
        <div class="container px-0">
            <!-- Footer Content -->
            <div class="footer-nav position-relative shadow-sm footer-style-two">
                <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                    <li>
                        <a href="<?= base_url("statistik")?>">
                            <i class="bi bi-clipboard-data"></i>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url("quiz")?>">
                            <i class="bi bi-question-circle"></i>
                        </a>
                    </li>

                    <li class="active">
                        <a href="<?= base_url("belajar")?>">
                            <i class="bi bi-book"></i>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url("forum")?>">
                            <i class="bi bi-collection"></i>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url("p/settings/")?>">
                            <i class="bi bi-person-circle"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- All JavaScript Files -->

    <?php $this->load->view("components/script/footer-assets") ?>

    <!-- ! All JavaScript Files -->
</body>

</html>