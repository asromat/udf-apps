<!-- Hero Block Wrapper -->
<div class="hero-block-wrapper bg-primary">
    <!-- Styles -->
    <div class="hero-block-styles">
        <div class="hb-styles1" style="background-image: url('<?=base_url()?>assets/img/core-img/dot.png')"></div>
        <div class="hb-styles2"></div>
        <div class="hb-styles3"></div>
    </div>

    <div class="custom-container">
        <!-- Hero Block Content -->
        <div class="hero-block-content">
            <img class="mb-4" src="<?=base_url()?>assets/img/template/study.png" alt="">
            <h2 class="display-4 text-white mb-3">Waktunya Belajar dan Melestarikan Budaya</h2>
            <p class="text-white">Aplikasi Budaya Konservasi Kab. Tambrauw adalah platform yang mendukung kolaborasi antara praktisi di komunitas pendidikan dan akademis di lingkungan sekolah.</p>
            <a class="btn btn-warning btn-lg w-100" href="<?=base_url("auth/login")?>">Mulai Belajar</a>
        </div>
    </div>
</div>

<?php header( "refresh:5;URL=".base_url('auth/login').""); ?>