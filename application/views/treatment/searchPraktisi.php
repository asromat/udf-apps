<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?=base_url("")?>">
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
        <div class="card">
            <div class="card-body direction-rtl">
                <h1><?= $menu ?></h1>
                <!-- Search Form Wrapper -->
                <div class="search-form-wrapper">
                    <p class="mb-2 fz-12"><?= $praktisis->num_rows() ?> Total Praktisi dengan Keahlian Terkait "<?= strtoupper(str_replace("%20", " ", $query)) ?>" Ditemukan </p>
                    <!-- Search Form -->
                    <form action="<?= base_url("treatment/pilihpraktisi") ?>" method="get">
                        <div class="input-group mb-3">
                            <input name="query" class="form-control form-control-clicked" type="search" placeholder="Kata Kunci">
                            <button class="btn btn-dark" type="submit"><i class="bi bi-search fz-14"></i></button>
                        </div>
                    </form>
                    <p>Masukkan kata kunci keahlian dari praktisi yang ingin kamu cari. Kamu bisa mereview profil dan portofolio yang disajikan untuk memastikan sesuai dengan kebutuhanmu atau tidak</p>
                </div>
                <hr>
                <!-- Single Search Result -->
                <?php foreach ($praktisis->result() as $key => $data) {; ?>
                <div class="single-search-result mb-3 border-bottom pb-3">
                    <div class="row">
                        <div class="col col-lg-4 col-md-12 mb-3">
                            <img src="<?= $this->fhe->getByID("tb_user", "id", $data->pembuat)->row("foto") == null ? base_url() . "/assets/img/icons/icon-512x512.png" : base_url() . "/files/foto_profil/" . $this->fhe->getByID("tb_user", "id", $data->pembuat)->row("foto") ?>" alt="" class="imgthumbnail">
                        </div>
                        <div class="col col-lg-8 col-md-12">
                            <?= $this->fhe->get2w("tb_praktisi","praktisi_id",$data->pembuat,"guru_id",$this->session->id)->num_rows() > 0 ? "<span class='m-1 badge bg-danger'>Praktisi ini telah dipilih sebelumnya</span>" : ""?>
                            <h6 class="text-truncate mb-1"><?= $this->fhe->getById("tb_user","id",$data->pembuat)->row("nama")?></h6>
                            <a class="text-truncate mb-2 d-block text-decoration-underline" href="https://wa.me/+62<?= $this->fhe->getById("tb_user","id",$data->pembuat)->row("hp")?>" target="_blank"><?= $this->fhe->getById("tb_user","id",$data->pembuat)->row("hp")?></a>
                            <p class="mb-0">Keahlian : <?= $data->deskripsi ?></p>
                            <br>
                            <a href="<?= base_url()?>/files/portofolio/<?=$this->fhe->getById("tb_portofolio","user_id",$data->pembuat)->row("file")?>" target="_blank" class="btn btn-success btn-xm btn-block">Lihat Portofolio</a> <a href="<?=base_url("treatment/prosesPraktisi/".$data->pembuat)?>" class="btn btn-primary btn-block">Pilih Praktisi</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php $this->view("message")?>