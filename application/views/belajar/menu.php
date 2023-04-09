<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?=base_url("belajar")?>">
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
                        <h3><?= $data->topik?></h3>
                        <p><?= $data->deskripsi?></p>
                    </div>
                    <div class="timeline-icon mb-2">
                        <i class="bi bi-award h1 mb-0"></i>
                    </div>
                </div>
                <div>
                    <div class="accordion accordion-flush accordion-style-one" id="accordionStyle1">
                        <!-- Single Accordion -->
                        <div class="accordion-item">
                            <div class="accordion-header" id="accordionOne">
                                <h6 data-bs-toggle="collapse" data-bs-target="#accordionStyleOne<?=$data->id?>" aria-expanded="true" aria-controls="accordionStyleOne<?=$data->id?>" class="">Tujuan Pembelajaran<i class="bi bi-chevron-down"></i></h6>
                            </div>
                            <div class="accordion-collapse collapse show" id="accordionStyleOne<?=$data->id?>" aria-labelledby="accordionOne" data-bs-parent="#accordionStyle1" style="">
                                <div class="accordion-body">
                                    <p class="mb-0"><?= $data->tujuan_pembelajaran?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Single Accordion -->
                        <!-- <div class="accordion-item">
                            <div class="accordion-header" id="accordionTwo">
                                <h6 class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyleTwo<?=$data->id?>" aria-expanded="false" aria-controls="accordionStyleTwo<?=$data->id?>">Prasyarat<i class="bi bi-chevron-down"></i></h6>
                            </div>
                            <div class="accordion-collapse collapse" id="accordionStyleTwo<?=$data->id?>" aria-labelledby="accordionTwo" data-bs-parent="#accordionStyle1" style="">
                                <div class="accordion-body">
                                    <p class="mb-0"><?= $data->prasyarat?></p>
                                </div>
                            </div>
                        </div> -->

                        <!-- Single Accordion -->
                        <div class="accordion-item">
                            <div class="accordion-header" id="accordionThree">
                                <h6 class="collapsed" data-bs-toggle="collapse" data-bs-target="#accordionStyleThree<?=$data->id?>" aria-expanded="false" aria-controls="accordionStyleThree<?=$data->id?>">Susunan Materi<i class="bi bi-chevron-down"></i></h6>
                            </div>
                            <div class="accordion-collapse collapse" id="accordionStyleThree<?=$data->id?>" aria-labelledby="accordionThree" data-bs-parent="#accordionStyle1" style="">
                                <div class="accordion-body">
                                    <!-- Single Skill Progress Bar -->
                                    <?php 
                                        $no = 1;
                                        $menuMateri = $this->fhe->getById("tb_subtema","tema_id",$data->id); 
                                        foreach ($menuMateri->result() as $key => $materi) {; 
                                    ?>
                                    <div class="skill-progress-bar d-flex align-items-center mb-2">
                                        <!-- Skill Icon -->
                                        <div class="skill-icon shadow-sm p-2">
                                            <i class="bi bi-clipboard2-data text-dark fz-20"></i>
                                        </div>

                                        <div class="skill-data">
                                            <!-- Skill Name -->
                                            <div class="skill-name d-flex align-items-center justify-content-between">
                                                <p class="mb-1"><?= $materi->topik?></p>
                                                <small class="mb-1">
                                                    <span class="counter"><?= $this->fhe->get3w("tb_skor_tema","user_id",$this->session->id,"subtema_id",$materi->id,"status","pretest")->num_rows() != null ? "<i class='bi bi-card-checklist text-success'></i>" : "<i class='bi bi-exclamation-diamond-fill text-danger'></i>"?></span>
                                                </small>
                                            </div>
                                            <!-- Progress -->
                                            <!-- <div class="progress" style="height: 4px;">
                                                <div class="progress-bar" style="width: 78%;" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <br>
                            <div class="text-center">
                                <a href="<?= base_url("belajar/rekomendasimateri/".$data->id) ?>" class="btn btn-creative btn-success btn-block"><i class="bi bi-book"></i> Pelajari</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>

    <div class="pb-3"></div>
</div>