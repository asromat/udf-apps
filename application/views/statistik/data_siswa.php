<?php $this->view("message") ?>
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

    <!-- Element Heading -->
    <div class="container">
        <div class="element-heading">
            <h6><?= $menu?></h6>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-responsive mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Domisili</th>
                            <th scope="col">Suku</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = "1"; foreach ($row->result() as $key => $data) {;?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->hp ?></td>
                                <td><?= $data->domisili ?></td>
                                <td><?= $data->suku ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>