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
        <div class="card">
            <div class="card-body direction-rtl">
                <h1>Cari Video</h1>
                <!-- Search Form Wrapper -->
                <div class="search-form-wrapper">
                    <p class="mb-2 fz-12"><?= $video->pageInfo->totalResults ?> Total Artikel "<?= strtoupper(str_replace("%20", " ", $query)) ?>" Ditemukan </p>
                    <!-- Search Form -->
                    <form action="<?= base_url("belajar/insightVideo/") ?>" method="get">
                        <div class="input-group mb-3">
                            <input name="query" class="form-control form-control-clicked" type="search" placeholder="Kata Kunci">
                            <button class="btn btn-dark" type="submit"><i class="bi bi-search fz-14"></i></button>
                        </div>
                    </form>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut amet ipsa nostrum, ducimus quo illo delectus sint, excepturi ratione impedit natus temporibus eum error, eveniet consequuntur? Pariatur aspernatur eveniet tenetur.</p>
                </div>
                <hr>
                <!-- Single Search Result -->
                <?php foreach ($video->items as $key => $data) {; ?>
                <div class="single-search-result mb-3 border-bottom pb-3">
                    <div class="row">
                        <div class="col col-lg-4 col-md-12 mb-3">
                            <img src="<?= $data->snippet->thumbnails->medium->url ?>" alt="" class="imgthumbnail">
                        </div>
                        <div class="col col-lg-8 col-md-12">
                            <h6 class="text-truncate mb-1"><?= $data->snippet->title ?></h6>
                            <a class="text-truncate mb-2 d-block fz-12 text-decoration-underline" href="https://www.youtube.com/watch?v=<?=$data->id->videoId?>" target="_blank">https://www.youtube.com/watch?v=<?=$data->id->videoId?></a>
                            <p class="mb-0"><?= substr($data->snippet->description,"0","300")?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <a href="https://youtube.com" class="btn btn-primary mt-3 w-100" target="_blank">Selengkapnya</a>
                
            </div>
        </div>
    </div>
</div>
<?php $this->view("message")?>