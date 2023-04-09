<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="card image-gallery-card direction-rtl">
            <div class="card-body">
                <img class="mb-3 rounded" src="<?= base_url() ?>/assets/img/template/rekomendasi.png" alt="">
                <h5><?= $this->session->nama ?></h5>
                <h6><?= $this->session->email ?> / <?= $this->session->hp ?></h6>
                <hr>
                <center>
                    <!-- <h4 class="text-success">Nilai Pretest : <?= $pretest->skor ?></h4> -->
                    <h4 class="text-success">Gaya Belajar : <?= strtoupper($gayabelajar) ?></h4>
                </center>
                <hr>
                <h5>Rekomendasi Menu Materi</h5>
                <table class="table mb-0 table-hover mb-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul Materi</th>
                            <th scope="col">Tingkat Kemampuan</th>
                            <th scope="col">Prioritas</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($menubelajar->result() as $key => $data) {; ?>
                        <tr>
                            <td scope="row"><?= $no++ ?></td>
                            <td><?= $this->fhe->getById("tb_tema","id",$data->tema_id)->row("topik") ?></td>
                            <td><?= $data->skor ?></td>
                            <td><?= $data->prioritas ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <h6>Kesimpulan Analisis Karakteristik Pebelajar</h6>
                <p>
                Analisis Karakteristik pebelajar dalam platform KM Learning System ini menggunkaan model SECI. Penentuan berdasarkan pada pilihan materi, uji kemampuan, dan gaya belajar setiap pebelajar.
                </p>
                <a href="<?= base_url("belajar") ?>" class="btn btn-primary mt-3 w-100">Menu Belajar</a>
            </div>
        </div>
    </div>
</div>

<?php $this->view("message") ?>