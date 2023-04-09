<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="card bg-primary mb-3 bg-img" style="background-image: url('<?= base_url() ?>/assets/img/core-img/1.png')">
            <div class="card-body direction-rtl p-2">
                <h4 class="text-white text-center">List Materi</h4>
            </div>
        </div>
        <!-- Timeline Content -->
        <?php 
            $no = 1; foreach ($menubelajar->result() as $key => $datas) {;
            $data = $this->fhe->getById("tb_tema","id",$datas->tema_id)->row(); 
        ?>
        <div class="card timeline-card bg-warning">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="timeline-text mb-2">
                        <!-- <span class="badge mb-2 rounded-pill">Materi Keterampilan</span> -->
                        <h3><?= $data->topik ?></h3>
                    </div>
                    <div class="timeline-icon mb-2">
                        <i class="bi bi-award h1 mb-0"></i>
                    </div>
                </div>
                <!-- Single Skill Progress Bar -->
                <!-- <div class="skill-progress-bar d-flex align-items-center mb-2">
                    <div class="skill-icon shadow-sm p-2">
                        <i class="bi bi-clipboard2-data text-dark fz-20"></i>
                    </div>

                    <div class="skill-data">
                        <div class="skill-name d-flex align-items-center justify-content-between">
                            <p class="mb-1">Tacit Knowledge Exploration</p>
                            <small class="mb-1">
                                <span class="counter">78</span>%
                            </small>
                        </div>

                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar" style="width: 78%;" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
 -->
                <!-- Single Skill Progress Bar -->
                <!-- <div class="skill-progress-bar d-flex align-items-center mb-2">
                    <div class="skill-icon shadow-sm p-2">
                        <i class="bi bi-clipboard2-data text-dark fz-20"></i>
                    </div>

                    <div class="skill-data">
                        <div class="skill-name d-flex align-items-center justify-content-between">
                            <p class="mb-1">Tacit to Eksplisit Knowledge Test</p>
                            <small class="mb-1">
                                <span class="counter">78</span>%
                            </small>
                        </div>

                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar" style="width: 78%;" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div> -->
                <!-- Single Skill Progress Bar -->
                <div class="skill-progress-bar d-flex align-items-center mb-2">
                    <div class="skill-icon shadow-sm p-2">
                        <i class="bi bi-clipboard2-data text-dark fz-20"></i>
                    </div>

                    <div class="skill-data">
                        <div class="skill-name d-flex align-items-center justify-content-between">
                            <p class="mb-1">Persyaratan Progress</p>
                            <small class="mb-1">
                                <span class="counter"><?= $this->fhe->getProgressUser($this->session->id,$data->id)?></span>%
                            </small>
                        </div>

                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar" style="width: <?= $this->fhe->getProgressUser($this->session->id,$data->id)?>%;" role="progressbar" aria-valuenow="<?= $this->fhe->getProgressUser($this->session->id,$data->id)?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <?php if ($this->fhe->getProgressUser($this->session->id,$data->id) == "100") { ?>
                        <a href="<?=base_url("quiz/start/".$data->id)?>" class="btn btn-creative btn-success btn-block btn-sm">Mulai Ujian</a>
                    <?php } else { ?>
                        <a href="<?=base_url("belajar/rekomendasimateri/".$data->id)?>" class="btn btn-creative btn-warning btn-block btn-sm">Lanjut Belajar</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="card bg-warning">
                <a href="<?=base_url("treatment/posttest/")?>" class="btn btn-creative btn-success btn-block">Post Test</a>
            </div>  
    </div>

    <div class="pb-3"></div>
</div>