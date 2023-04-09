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
                        <h5 class="mb-1"><?= $this->session->nama ?></h5>
                        <span class="badge bg-warning ms-2 rounded-pill"><?= $this->fhe->userType($this->session->tipe_user)->deskripsi ?></span>
                    </div>
                    <p class="mb-0"><i class="bi bi-house"></i> <?= $this->session->domisili ?> <i class="bi bi-phone"></i> <?= $this->session->hp ?></p>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body p-2">
                <div class="chat-search-box">
                    <!-- Search Form -->
                    <div class="input-group">
                        <span class="input-group-text" id="searchbox">
                            <i class="bi bi-box-arrow-in-right"></i>
                        </span>
                        <input class="form-control" type="text" placeholder="Last Login : <?= $login->row("created")?>" readonly>
                        <!-- <a class="btn btn-info btn-creative input-group-text">
                            Semua
                        </a> -->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Element Heading -->
    <!-- <div class="container">
        <div class="card card-gradient-bg">
            <div class="card-body p-5 direction-rtl">
                <h2 class="display-3 mb-4">Analisis Menu Belajar untuk Kamu</h2>
                <a class="btn btn-light rounded-pill" href="<?= base_url("treatment/rekomendasi") ?>">Lihat Rekomendasi</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="element-heading mt-3">
            <h6>Progress Bar</h6>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="skill-progress-bar d-flex align-items-center">
                    <div class="skill-icon shadow-sm">
                        <i class="bi bi-code fz-20 text-dark"></i>
                    </div>

                    <div class="skill-data">
                        <div class="skill-name d-flex align-items-center justify-content-between">
                            <p class="mb-1">HTML5</p>
                            <small class="mb-1"><span>78</span>%</small>
                        </div>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar" style="width: 78%;" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="skill-progress-bar d-flex align-items-center">
                    <div class="skill-icon shadow-sm">
                        <i class="bi bi-heart fz-20 text-danger"></i>
                    </div>

                    <div class="skill-data">
                        <div class="skill-name d-flex align-items-center justify-content-between">
                            <p class="mb-1">PHP 8</p>
                            <small class="mb-1"><span>96</span>%</small>
                        </div>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-success" style="width: 96%;" role="progressbar" aria-valuenow="96" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="skill-progress-bar d-flex align-items-center">
                    <div class="skill-icon shadow-sm">
                        <i class="bi bi-bootstrap fz-20 text-primary"></i>
                    </div>

                    <div class="skill-data">
                        <div class="skill-name d-flex align-items-center justify-content-between">
                            <p class="mb-1">Bootstrap 5</p><small class="mb-1"><span>88</span>%</small>
                        </div>
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-info" style="width: 88%;" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="pb-3"></div> -->

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5>Riwayat Login</h5>
                <table class="table mb-0 table-hover mb-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Time</th>
                            <th scope="col">IP Addess</th>
                            <th scope="col">Via</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($login->result() as $key => $data) {; ?>
                            <tr>
                                <td scope="row"><?= $no++ ?></td>
                                <td scope="row">
                                    <p><?= $data->created ?></p>
                                </td>
                                <td>
                                    <p><?= $data->ip_address ?></p>
                                </td>
                                <td><?= $data->platform ?> | <?= $data->browser ?></td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="pb-3"></div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5>Rekomendasi Topik Materi</h5>
                <a href="<?=base_url()?>/belajar/insightVideo/?query=pembelajaran"><span class="badge fw-normal bg-primary">#Pembelajaran</span></a>
                <a href="<?=base_url()?>/belajar/insightVideo/?query=manajemen+pengetahuan"><span class="badge fw-normal bg-primary">#Manajemen Pengetahuan</span></a>
                <a href="<?=base_url()?>/belajar/insightVideo/?query=teknologi+pendidikan"><span class="badge fw-normal bg-primary">#Teknologi Pendidikan</span></a>
                <a href="<?=base_url()?>/belajar/insightVideo/?query=lms"><span class="badge fw-normal bg-primary">#lms</span></a>
                <a href="<?=base_url()?>/belajar/insightVideo/?query=elearning"><span class="badge fw-normal bg-primary">#elearning</span></a>
            </div>
        </div>
    </div>
</div>