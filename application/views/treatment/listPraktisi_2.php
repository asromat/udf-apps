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
            <h6>Data Penawaran Mengajar</h6>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-responsive mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Guru</th>
                            <th scope="col">Topik</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = "1";
                        foreach ($row->result() as $key => $data) {;
                            $user = $this->fhe->getById("tb_user", "id", $data->praktisi_id)->row(); ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td>
                                    <?= $user->nama ?> <br>
                                    <small><?= $user->hp ?> | <?= $user->domisili ?> </small>
                                </td>
                                <td><?= $data->topik ?></td>
                                <td>
                                    <?php if ($data->status == "diterima") { ?>
                                        <p class="text-success">Diterima</p>
                                    <?php } else { ?>
                                        <p class="text-warning">Pending</p>
                                    <?php } ?>
                                    <small>Diajukan pada <?= $data->created ?></small>
                                </td>
                                <td>
                                    <?php if ($data->status != "diterima") {?>
                                    <a href="<?= base_url("treatment/terimaPraktisi/" . $data->id) ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin diterima? Anda tidak dapat membatalkan')">Terima</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>