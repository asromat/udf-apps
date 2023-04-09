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
                <h1>Cari Materi Jurnal</h1>
                <!-- Search Form Wrapper -->
                <div class="search-form-wrapper">
                    <p class="mb-2 fz-12"><?= $jurnal->total ?> Total Artikel "<?= strtoupper(str_replace("%20", " ", $query)) ?>" Ditemukan </p>
                    <!-- Search Form -->
                    <form action="<?= base_url("belajar/insightJurnal/") ?>" method="get">
                        <div class="input-group mb-3">
                            <input name="query" class="form-control form-control-clicked" type="search" placholder="Ketikkan Kata Kunci">
                            <button class="btn btn-dark" type="submit"><i class="bi bi-search fz-14"></i></button>
                        </div>
                    </form>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut amet ipsa nostrum, ducimus quo illo delectus sint, excepturi ratione impedit natus temporibus eum error, eveniet consequuntur? Pariatur aspernatur eveniet tenetur.</p>
                </div>
                <hr>
                <!-- Single Search Result -->
                <?php foreach ($jurnal->data as $key => $data) {; ?>
                    <div class="single-search-result mb-3 border-bottom pb-3">
                        <h6 class="text-truncate mb-1"><?= $data->title ?></h6>
                        <a class="text-truncate mb-2 d-block fz-12 text-decoration-underline" href="<?= $data->url ?>" target="_blank"><?= $data->url ?></a>
                        <p class="mb-0"><?= substr($data->abstract, "0", "300") ?>....</p>
                        <p><?= $data->venue ?> <?= $data->year ?></p>
                    </div>
                <?php } ?>
                <a href="https://www.semanticscholar.org/" class="btn btn-primary mt-3 w-100" target="_blank">Selengkapnya</a>

                <!-- Pagination -->
                <!-- <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-two justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">...</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">9</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div>
</div>

<?php $this->view("message") ?>