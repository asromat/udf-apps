<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?=base_url("belajar/menu")?>">
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
        <div class="card image-gallery-card direction-rtl">
            <div class="card-body">
                <h1><?= $this->fhe->get("tb_tema",$tema_id)->row("topik")?></h1>
                <hr>
                <h5><?= $this->session->nama ?></h5>
                <h6><?= $this->session->email ?> / <?= $this->session->hp ?></h6>
                <hr>
                <center>
                    <h4 class="text-success">Nilai Pretest : <?= $pretest->skor ?></h4>
                    <h4 class="text-success">Nilai Posttest : <?= $posttest->row("skor") == null ? "<i class='text-danger'>Belum Post Test</i>" : $posttest->row("skor")?></h4>
                </center>
                <hr>
                <h5>Rekomendasi Menu Materi</h5>
                <table class="table mb-0 table-hover mb-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul Materi</th>
                            <th scope="col">Tingkat Kemampuan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($materibelajar->result() as $key => $data) {; ?>
                        <tr>
                            <td scope="row"><?= $no++ ?></td>
                            <td><?= $this->fhe->getById("tb_subtema","id",$data->subtema_id)->row("topik") ?></td>
                            <td><?= $data->skor ?></td>
                            <td><a class="btn m-1 btn-circle <?= $this->fhe->get2w("tb_progress_tema","user_id",$this->session->id,"subtema_id",$data->subtema_id)->num_rows() != null ? "btn-success" : "btn-warning"?>" href="<?= base_url("belajar/detail/".$data->subtema_id)?>"><i class="bi bi-easel"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <h6>Kesimpulan Analisis Karakteristik Pebelajar</h6>
                <p>
                    Analisis Karakteristik pebelajar dalam platform KM Learning System ini menggunkaan model SECI. Penentuan berdasarkan pada pilihan materi, uji kemampuan, dan gaya belajar setiap pebelajar.
                </p>
                <hr>
                <h6>Persyaratan untuk Melaksanakan Post Test</h6>
                <!-- Single Skill Progress Bar -->
                <div class="skill-progress-bar d-flex align-items-center mb-2">
                    <div class="skill-icon shadow-sm p-2">
                        <i class="bi bi-clipboard2-data text-dark fz-20"></i>
                    </div>

                    <div class="skill-data">
                        <div class="skill-name d-flex align-items-center justify-content-between">
                            <p class="mb-1">Progress Pemahaman Materi</p>
                            <small class="mb-1">
                                <span class="counter"><?= $this->fhe->getProgressUser($this->session->id,$tema_id)?></span>%
                            </small>
                        </div>

                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar" style="width: <?= $this->fhe->getProgressUser($this->session->id,$tema_id)?>%;" role="progressbar" aria-valuenow="<?= $this->fhe->getProgressUser($this->session->id,$tema_id)?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <?php if ($posttest->num_rows() == null and $this->fhe->getProgressUser($this->session->id,$tema_id) == "100") { ?>
                    <!-- <a href="<?= base_url("belajar/posttest/".$tema_id) ?>" class="btn btn-success mt-3 w-100">Lanjut Post Test</a> -->
                    <a href="<?= base_url("quiz/start/".$tema_id) ?>" class="btn btn-success mt-3 w-100">Selesaikan Post Test</a>
                <?php } elseif ($posttest->num_rows() != null and $this->fhe->get2w("tb_forum","user_id",$this->session->id,"tema_id",$tema_id)->num_rows() == null) { ?>
                        <a href="<?= base_url("forum/tambah/".$tema_id) ?>" class="btn btn-warning mt-3 w-100">Tambahkan Rekomendasi</a>
                <?php } elseif($posttest->num_rows() != null and $this->fhe->get2w("tb_forum","user_id",$this->session->id,"tema_id",$tema_id)->num_rows() != null) {?>
                        <a href="<?= base_url("forum") ?>" class="btn btn-info mt-3 w-100">Anda telah menyelesaikan materi. Lihat Forum</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php $this->view("message") ?>