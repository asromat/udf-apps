<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="card image-gallery-card direction-rtl">
            <div class="card-body">
                <img class="mb-3 rounded" src="<?= base_url() ?>/assets/img/template/test.png" alt="">
                <h3>Analisis Hasil Belajar</h3>
                <p>Selamat! Kamu telah menyelesaikan seluruh rangkaian materi. Selanjutnya, uji kemampuanmu dengan menyelesaikan post test berikut :</p>
                <form action="<?= base_url("treatment/resultPosttest")?>" method="post">
                <?php $no = null; foreach ($row->result() as $key => $data) {; ?>
                <h6><?= ++$no ?>. <?= $data->soal ?></h6>
                <p align="left">
                <input type="hidden" name="id[]" value="<?= $data->id ?>">
					<input type="radio" name="pilihan[<?= $data->id ?>]" value="A<?= $data->pil_a ?>" required> A. <?= $data->pil_a ?> <br>
					<input type="radio" name="pilihan[<?= $data->id ?>]" value="B<?= $data->pil_b ?>"> B. <?= $data->pil_b ?> <br>
					<input type="radio" name="pilihan[<?= $data->id ?>]" value="C<?= $data->pil_c ?>"> C. <?= $data->pil_c ?> <br>
					<input type="radio" name="pilihan[<?= $data->id ?>]" value="D<?= $data->pil_d ?>"> D. <?= $data->pil_d ?> <br>
					<input type="radio" name="pilihan[<?= $data->id ?>]" value="E<?= $data->pil_e ?>"> E. <?= $data->pil_e ?> <br>
                </p>
                <hr>
                <?php }?>
                <div class="form-check mb-3">
                    <input class="form-check-input" id="checkedCheckbox" type="checkbox" value="" required>
                    <label class="form-check-label text-muted fw-normal" for="checkedCheckbox">Saya yakin sudah menyelesaikan tes</label>
                </div>
                <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">
                    Selanjutnya <i class="bi bi-arrow-right fz-16 ms-1"></i>
                </button>
                <input type="hidden" name="jumlah" value="<?= $row->num_rows() ?>">
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->view("message")?>