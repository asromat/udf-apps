<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="card image-gallery-card direction-rtl">
            <div class="card-body">
                <input type="hidden" name="id[]" value="1">
                <h3>PILIHAN MATERI</h3>
                <form action="<?= base_url("treatment/resultMateriPilihan")?>" method="post">
                <h6>Kamu dapat memilih materi yang menjadi prioritasmu. Silahkan pilih sesuai keinginamu yaa...</h6>
                <img class="mb-3 img-thumbnail figure-img" src="<?= base_url() ?>/assets/img/template/desaingrafis.jpg" alt="">
                <h4 align="left"><input type="checkbox" name="pil[]" value="1"> Desain Grafis untuk UMKM<br></h4>
                <hr>
                <img class="mb-3 img-thumbnail figure-img" src="<?= base_url() ?>/assets/img/template/fotografi.png" alt="">
                <h4 align="left"><input type="checkbox" name="pil[]" value="2"> Teknik Fotografi untuk UMKM<br></h4>
                <hr>
                <img class="mb-3 img-thumbnail figure-img" src="<?= base_url() ?>/assets/img/template/copywriting.png" alt="">
                <h4 align="left"><input type="checkbox" name="pil[]" value="3"> Copywriting untuk UMKM<br></h4>
                <div class="pb-3"></div>
                <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">
                    Simpan <i class="bi bi-cloud-download fz-16 ms-1"></i>
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->view("message") ?>