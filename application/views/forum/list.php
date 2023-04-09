<!-- Header Area -->
<!-- <div class="header-area" id="headerArea">
    <div class="container">
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <div class="back-button">
                <a href="<?=base_url("")?>">
                    <i class="bi bi-arrow-left-short"></i>
                </a>
            </div>

            <div class="page-heading">
                <h6 class="mb-0"><?= $menu ?></h6>
            </div>
        </div>
    </div>
</div> -->

<div class="page-content-wrapper py-3">
    <div class="container">
        <div class="row g-3 justify-content-center">
            <?php foreach ($row->result() as $key => $data) {; ?>
            <!-- Single Blog Card -->
            <div class="col-12 col-md-8 col-lg-7 col-xl-6">
                <div class="card shadow-sm blog-list-card">
                    <div class="d-flex align-items-center">
                        <div class="card-blog-img position-relative" style="background-image: url('<?=base_url("")?>/assets/upload/img/foto-forum/<?=$data->foto?>')">
                            <!-- <span class="badge bg-warning text-dark position-absolute card-badge">Agency</span> -->
                        </div>
                        <div class="card-blog-content">
                            <!-- <span class="badge bg-danger rounded-pill mb-2 d-inline-block">25 Nov</span> -->
                            <a class="blog-title d-block mb-3 text-dark" href="<?=base_url("forum/detail/".$data->id)?>"><?= $data->judul ?></a>
                            <a class="btn btn-primary btn-sm" href="<?=base_url("forum/detail/".$data->id)?>">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-xl-6">
                <div class="card mt-3">
                    <div class="card-body p-3">
                        <nav aria-label="Page navigation example">
                            <?= $this->pagination->create_links(); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>