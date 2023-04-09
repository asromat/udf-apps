<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="card image-gallery-card direction-rtl">
            <div class="card-body">
                <!-- <img class="mb-3 rounded" src="<?= base_url() ?>/assets/img/bg-img/13.jpg" alt=""> -->
                <h5><?= $materi->topik ?></h5>
                <p><?= $materi->deskripsi ?></p>
                <h5>Konten Materi</h5>
                <div class="standard-tab">
                    <ul class="nav rounded-lg mb-2 p-2 shadow-sm" id="affanTabs1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="btn active" id="bootstrap-tab" data-bs-toggle="tab" data-bs-target="#bootstrap" type="button" role="tab" aria-controls="bootstrap" aria-selected="true">Video</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn" id="pwa-tab" data-bs-toggle="tab" data-bs-target="#pwa" type="button" role="tab" aria-controls="pwa" aria-selected="false" tabindex="-1">Teks Materi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="btn" id="dark-tab" data-bs-toggle="tab" data-bs-target="#dark" type="button" role="tab" aria-controls="dark" aria-selected="false" tabindex="-1">Simulasi</button>
                        </li>
                    </ul>

                    <div class="tab-content rounded-lg p-3 shadow-sm" id="affanTabs1Content">
                        <div class="tab-pane fade active show" id="bootstrap" role="tabpanel" aria-labelledby="bootstrap-tab">
                            <!-- Element Heading -->
                            <div class="container">
                                <!-- 4:3 Aspect Ratio -->
                                <div class="ratio ratio-4x3 mb-4">
                                    <?= $materi->video?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pwa" role="tabpanel" aria-labelledby="pwa-tab">
                            <?= $materi->text ?>
                        </div>

                        <div class="tab-pane fade" id="dark" role="tabpanel" aria-labelledby="dark-tab">
                            <?= $materi->simulasi ?>
                        </div>
                    </div>
                </div>
                <?php if ($this->fhe->get2w("tb_progress_tema","user_id",$this->session->id,"subtema_id",$materi->id)->num_rows() == null) { ?>
                    <a href="<?= base_url("belajar/pahamMateri/".$materi->id) ?>" class="btn btn-success mt-3 w-100">Tandai Sudah memahami</a>
                <?php }?>
            </div>
        </div>
    </div>
</div>

<?php $this->view("message")?>