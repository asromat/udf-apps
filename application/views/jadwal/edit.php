<div class="page-content-wrapper py-3">
    <div class="container">
        <!-- User Meta Data-->
        <div class="card user-data-card">
            <div class="card-body">
                <?= form_open_multipart(); ?>
                <div class="form-group boxed">
                    <div class="input-wrapper not-empty">
                        <h3><?= $menu ?></h3>
                        <input type="hidden" name="id" readonly value="<?=$row->row("id")?>">
                        <label class="mb-2">Tanggal Pelaksanaan</label>
                        <div class="form-group text-start mb-2">
                            <input name="tanggal" class="form-control" type="date" value="<?=date("Y-m-d",strtotime($row->row("tanggal")))?>" required>
                            <?php echo form_error('tgl_lahir') ?>
                        </div>

                        <label class="mb-2 mt-2">Topik Bahasan</label>
                        <div class="form-group text-start mb-2">
                            <input name="topik" class="form-control mt-2" type="text" value="<?= $row->row("topik") ?>" placeholder="Membuat teks Eksplanasi" required>
                            <?php echo form_error('link') ?>
                        </div>

                        <label class="mb-2 mt-2">Link Meeting</label>
                        <div class="form-group text-start mb-2">
                            <input name="link" class="form-control mt-2" type="url" value="<?= $row->row("link") ?>" placeholder="https://meet.google.com/jyw-wvtq-qmz" required>
                            <?php echo form_error('link') ?>
                        </div>

                        <label class="mb-2 mt-2">Praktisi yang Mengajar</label>
                        <div class="form-group mb-3">
                            <select class="form-select form-control mt-2" name="praktisi_id">
                                <option value="<?= $row->row("praktisi_id") ?>">Praktisi : <?= $this->fhe->getById("tb_user", "id", $row->row("praktisi_id"))->row("nama")?></option>
                                <?php $datas = $this->fhe->get2w("tb_praktisi", "guru_id", $this->session->id, "status", "diterima");
                                foreach ($datas->result() as $key => $data) {;
                                    $user = $this->fhe->getById("tb_user", "id", $data->praktisi_id)->row() ?>
                                    <option value="<?= $data->praktisi_id ?>"><?= $user->nama ?> - <?= $user->hp ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-button">
                    <button type="submit" class="btn btn-success btn-block">
                        <ion-icon name="save-outline"></ion-icon> Edit
                    </button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>