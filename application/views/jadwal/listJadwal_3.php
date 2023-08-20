<?php $this->view("message") ?>
<!-- Header Area -->
<div class="header-area" id="headerArea">
    <div class="container">
        <!-- Header Content -->
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <!-- Back Button -->
            <div class="back-button">
                <a href="<?= base_url("") ?>">
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
            <h6>List Jadwal Belajar</h6>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-responsive mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Topik</th>
                            <th scope="col">Praktisi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = "1";
                        foreach ($row->result() as $key => $data) {;
                            $user = $this->fhe->getById("tb_user", "id", $data->praktisi_id)->row(); ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->topik ?></td>
                                <td>
                                    <?= $user->nama ?> <br>
                                    <small><?= $user->hp ?> | <?= $user->domisili ?> </small>
                                </td>
                                <td><?= date("d-m-Y", strtotime($data->tanggal)) ?></td>
                                <td>
                                    <?php if (date("Y-m-d") < $data->tanggal) { ?>
                                        <a href="<?= $data->link ?>" class="btn btn-success btn-sm" target="_blank">Belajar</a>
                                        <a href="<?= base_url("jadwal/edit/" . $data->id) ?>" class="btn btn-info btn-sm">Edit</a>
                                        <a href="<?= base_url("jadwal/hapus/" . $data->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dibatalkan?')">Batalkan</a>
                                    <?php } else { ?>
                                        <a href="#" class="btn btn-secondary btn-sm" target="_blank">Terlaksana</a>
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