<div class="page-content-wrapper py-3">
    <div class="container">
        <!-- User Meta Data-->
        <div class="card user-data-card">
            <div class="card-body">
                <h1>Unggah Portofolio</h1>
                <p>
                    Ketentuan portofolio :
                <ol>
                    <li>
                        <p><strong>Deskripsi Pribadi:</strong></p>
                    </li>
                    <li>
                        <p><strong>Informasi Kontak:</strong></p>
                    </li>
                    <li>
                        <p><strong>Riwayat Pendidikan:</strong></p>
                    </li>
                    <li>
                        <p><strong>Riwayat Pengalaman Mengajar:</strong></p>
                    </li>
                    <li>
                        <p><strong>Materi Pengajaran:</strong></p>
                    </li>
                    <li>
                        <p><strong>Pengembangan Profesional:</strong></p>
                    </li>
                    <li>
                        <p><strong>Sertifikasi:</strong></p>
                    </li>
                    <li>
                        <p><strong>Referensi atau Rekomendasi:</strong></p>
                    </li>
                    <li>
                        <p><strong>Dokumentasi Karya Siswa:</strong></p>
                    </li>
                    <li>
                        <p><strong>Portofolio Visual:</strong></p>
                    </li>
                    <li>
                        <p><strong>Pembaruan Berkala:</strong></p>
                    </li>
                </ol>
                
                <?php if ($portofolio->row("file") == null) { ?>
                    <?php echo form_open_multipart('portofolio/tambah/'); ?>
                    <input type="hidden" name="tipe" value="portofolio">
                    <div class="input-group input-group-sm mb-3">
                        <input type="file" class="form-control form-control-sm" name="file" accept=".doc,.docx,.pdf">
                    </div>
                    <div class="input-group-append">
                        <button id="btn-submit" type="submit" class="btn btn-sm btn-success" onclick="document.getElementById('btn-submit').innerHTML='Proses Upload'">Unggah</button>
                    </div>
                    <?= form_close() ?>
                <?php } else { ?>
                    <a href="<?= base_url()?>/files/portofolio/<?=$portofolio->row("file")?>" target="_blank" class="btn btn-success btn-xm btn-block">Portofolio Sudah Terupload</a>
                    <hr>
                    <a href="<?= base_url("portofolio/hapus/" . $this->session->id) ?>" class="btn btn-danger btn-xm btn-block">Hapus portofolio</a>
                    <!-- /.card-body -->
                <?php } ?>
            </div>
        </div>
    </div>
</div>