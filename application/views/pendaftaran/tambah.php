<!-- Back Button -->
<div class="login-back-button">
    <a href="<?= base_url("auth/login") ?>">
        <i class="bi bi-arrow-left-short"></i>
    </a>
</div>

<!-- Login Wrapper Area -->
<div class="login-wrapper d-flex align-items-center justify-content-center">
    <div class="custom-container">
        <div class="text-center px-4">
            <img class="login-intro-img" src="<?= base_url() ?>/assets/img/template/register.png" alt="">
        </div>

        <!-- Register Form -->
        <div class="register-form mt-4">
            <h4 class="mb-3 text-center">Pendaftaran Peserta</h4>
            <!-- <a class="btn btn-primary btn-google mb-1 w-100 mb-3" href="<?= base_url("auth/google") ?>"><i class="bi bi-google me-1"></i> Buat Akun dengan Google</a> -->
            <?= form_open_multipart('') ?>
            <div class="form-group text-start mb-3">
                <small class="text-sm-start">Akun</small>
                <input name="username" class="form-control mt-2" type="text" value="<?= set_value('username'); ?>" placeholder="Username: fitrahizulfalaq" required>
                <?php echo form_error('username') ?>
            </div>

            <div class="form-group text-start mb-3 position-relative">
                <input name="password" class="form-control" id="psw-input" type="password" value="<?= set_value('password'); ?>" placeholder="New password" required>
                <div class="position-absolute" id="password-visibility">
                    <i class="bi bi-eye"></i>
                    <i class="bi bi-eye-slash"></i>
                </div>
            </div>

            <div class="mb-3" id="pswmeter"></div>

            <div class="form-group text-start mb-2">
                <small class="text-sm-start">Biodata Peserta</small>
                <input name="nama" class="form-control mt-2" type="text" value="<?= set_value('nama'); ?>" placeholder="Nama: ex. Fitrah Izul Falaq" required>
                <?php echo form_error('nama') ?>
            </div>

            <div class="form-group text-start mb-2">
                <input name="email" class="form-control mt-2" type="email" value="<?= set_value('email'); ?>" placeholder="Email: ex. fitrah.tep@gmail.com" required>
                <?php echo form_error('email') ?>
            </div>

            <div class="form-group text-start mb-2">
                <input name="hp" class="form-control mt-2" type="text" value="<?= set_value('hp'); ?>" placeholder="HP/WA: ex. 081231390340" required>
                <?php echo form_error('hp') ?>
            </div>

            <div class="form-group text-start mb-2">
                <input name="tempat_lahir" class="form-control mt-2" type="text" value="<?= set_value('tempat_lahir'); ?>" placeholder="Tempat Lahir: ex. Probolinggo" required>
                <?php echo form_error('tempat_lahir') ?>
            </div>

            <div class="form-group text-start mb-2">
                <input name="tgl_lahir" class="form-control" type="date" value="<?= set_value('tgl_lahir'); ?>" required>
                <?php echo form_error('tgl_lahir') ?>
            </div>

            <div class="form-group text-start mb-2">
                <input name="domisili" class="form-control mt-2" type="text" value="<?= set_value('domisili'); ?>" placeholder="Domisili: ex. Jl. Semarang No. 5, Subersari, Kota Malang" required>
                <?php echo form_error('domisili') ?>
            </div>

            <div class="form-group text-start mb-2">
                <input name="suku" class="form-control mt-2" type="text" value="<?= set_value('suku'); ?>" placeholder="Suku: ex. Asmat" required>
                <?php echo form_error('suku') ?>
            </div>

            <div class="form-group mb-3">
                <select class="form-select form-control mt-2" name="tipe">
                    <option value="1">Siswa</option>
                    <option value="2">Praktisi</option>
                    <option value="3">Guru</option>
                </select>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" id="checkedCheckbox" type="checkbox" value="" required>
                <label class="form-check-label text-muted fw-normal" for="checkedCheckbox">Seluruh data yang saya inputkan sudah benar</label>
            </div>

            <button class="btn btn-primary w-100" type="submit">Daftar</button>
            <?= form_close() ?>
        </div>

        <!-- Login Meta -->
        <div class="login-meta-data text-center">
            <p class="mt-3 mb-0">Sudah Memiliki Akun? <a class="stretched-link" href="<?= base_url("auth/login") ?> ">Login</a></p>
        </div>
    </div>
</div>