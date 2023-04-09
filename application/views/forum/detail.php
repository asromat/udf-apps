<!-- Header Area -->
<!-- <div class="header-area" id="headerArea">
    <div class="container">
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <div class="back-button">
                <a href="<?=base_url("forum")?>">
                    <i class="bi bi-arrow-left-short"></i>
                </a>
            </div>

            <div class="page-heading">
                <h6 class="mb-0"><?= $menu ?></h6>
            </div>
        </div>
    </div>
</div> -->

<div class="page-content-wrapper">
    <div class="container">
        <div class="pt-3 d-block"></div>

        <div class="blog-details-post-thumbnail position-relative">
            <!-- Post Image -->
            <img class="w-100 rounded-lg" src="<?=base_url()?>/assets/upload/img/foto-forum/<?= $data->foto?>" class="rounded-top img-fluid" alt="<?= $data->judul ?>" onerror="this.onerror=null;this.src='https://cdnstatic.jatimtimes.com/noimg.webp';">
            <!-- Post Bookmark -->
            <a class="post-bookmark position-absolute card-badge" href="#">
                <i class="bi bi-bookmark"></i>
            </a>
        </div>
    </div>

    <div class="blog-description py-3">
        <div class="container">
            <div class="card-body bg-white shadow-lg">
                <a class="badge bg-primary mb-2 d-inline-block" href="#"><?= date("d-m-Y H:i:s")?></a>
                <h3 class="mb-3"><?= $data->judul ?></h3>

                <div class="d-flex align-items-center mb-4">
                    <a class="badge-avater" href="#">
                        <img class="img-circle" src="<?= base_url() ?>/assets/img/bg-img/user1.png" alt="">
                    </a>
                    <span class="ms-2"><?= $this->fhe->getById("tb_user","id",$data->user_id)->row("nama") ?></span>
                </div>

                <div>
                    <?= $data->deskripsi ?>
                </div>
                <hr>
                <a class="btn w-100 btn-info" href="<?= base_url("forum/edit/".$data->id)?>">Edit</a>
                <hr>
                <!-- All Comments -->
                <div class="rating-and-review-wrapper pb-3 mt-3 bg-white">
                    <div class="container">
                        <h6 class="mb-3">All comments</h6>
                        <div class="rating-review-content">
                            <ul class="ps-2">
                                <?php foreach ($komentar->result() as $key => $komentar) {;?>
                                <li class="single-user-review d-flex">
                                    <div class="user-thumbnail mt-0">
                                        <img src="<?= base_url() ?>/assets/img/bg-img/2.jpg" alt="">
                                    </div>
                                    <div class="rating-comment">
                                        <p class="comment mb-1"><?= $komentar->komentar?>
                                        </p>
                                        <span class="name-date"><?= $this->fhe->getById("tb_user","id",$komentar->user_id)->row("nama") ?> | <?= $komentar->created?></span>
                                    </div>
                                </li>
                                <?php } ?>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comment Form -->
    <div class="ratings-submit-form pb-3">
        <div class="container">
            <h6 class="mb-3">Submit a comment</h6>
            <form action="<?= base_url("forum/tambahKomentar")?>" method="post">
                <div class="form-group">
                    <textarea class="form-control mb-3 border-3" name="komentar" cols="30" rows="10" placeholder="Tulis Komentar"></textarea>
                </div>
                <input type="hidden" name="forum_id" value="<?= $data->id?>">
                <button class="btn w-100 btn-primary" type="submit">Posting Komentar</button>
            </form>
        </div>
    </div>
</div>

<?php $this->view("message")?>