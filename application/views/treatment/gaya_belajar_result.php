<div class="page-content-wrapper py-3">
    <div class="container">
        <?php $this->view("message") ?>
        <div class="card image-gallery-card direction-rtl">
            <div class="card-body">
                <img class="mb-3 rounded" src="<?= base_url() ?>/assets/img/template/rekomendasi.png" alt="">
                <h5>Kamu Tergolong Kategori <i class="text-success"><?= strtoupper($gaya_belajar) ?></i></h5>
                <!-- <p>Putra pedagang loak elektronik. Sejak kecil, mahir mengotak-atik loakan milik bapaknya menjadi mainan untuk jual ke temannya. Semasa SMK, pernah mendapat 12 prestasi sehingga mendapat hadiah sebagai Siswa Berprestasi Jurusan TKJ. -->
                </p>
                <h5>Keterangan</h5>
                <p>
                    <?php if ($gaya_belajar == "visual") { ?> Anda memiliki kecenderungan gaya belajar visual. <br>
                            Anda kecenderungan gaya belajar visual akan mencapai prestasi belajar yang optimal apabila memanfaatkan visual Anda. Anda dapat membuat sendiri peta konsep atau ringkasan materi perkuliahan.
                    <?php } elseif ($gaya_belajar == "auditori") { ?>
                            Anda memiliki kecenderungan gaya belajar auditori. <br>
                            Anda yang memiliki kecenderungan gaya belajar auditori akan mencapai prestasi belajar yang optimal apabila Anda mempelajari materi perkuliahan dari mendengarkan baik melalui penjelasan langsung dari dosen, diskusi dengan dosen dan teman mahasiswa, maupun melalui rekaman materi yang sedang dipelajari.
                    <?php } elseif ($gaya_belajar == "kinestetik") { ?>
                            Anda memiliki kecenderungan gaya belajar kinestetik. <br>
                            Anda dengan gaya belajar kinestetik akan mencapai prestasi belajar secara optimal apabila Anda terlibat langsung secara fisik dalam kegiatan belajar. Anda dapat mengutak-atik atau memanipulasi materi perkuliahan atau media yang digunakan dalam menjelaskan materi perkuliahan.
                    <?php } elseif ($gaya_belajar == "visual-auditori") { ?>
                            Anda memiliki gabungan gaya belajar visual dan auditori. <br>
                            Ada hal tertentu yang Anda akan belajar efektif jika menggunakan gaya belajar visual, dan ada hal lain yang Anda akan belajar efektif jika menggunakan gaya belajar auditori. Bahkan, kadang jika kedua gaya belajar digunakan, akan lebih optimal.
                    <?php } elseif ($gaya_belajar == "visual-kinestetik") { ?>
                            Anda memiliki gabungan gaya belajar visual dan kinestetik. <br>
                            Ada hal tertentu yang Anda akan belajar efektif jika menggunakan gaya belajar visual, dan ada hal lain yang Anda akan belajar efektif jika menggunakan gaya belajar kinestetik. Bahkan, kadang jika kedua gaya belajar digunakan, akan lebih optimal.
                    <?php } elseif ($gaya_belajar == "auditori-kinestetik") { ?>
                            Anda memiliki gabungan gaya belajar auditori dan kinestetik. <br>
                            Ada hal tertentu yang Anda akan belajar efektif jika menggunakan gaya belajar auditori, dan ada hal lain yang Anda akan belajar efektif jika menggunakan gaya belajar kinestetik. Bahkan, kadang jika kedua gaya belajar digunakan, akan lebih optimal.
                    <?php } ?>

                </p>
                <a href="<?= base_url("") ?>" class="btn btn-primary mt-3 w-100">Selanjutnya</a>
            </div>
        </div>
    </div>
</div>