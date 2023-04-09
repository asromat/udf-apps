<div class="page-content-wrapper py-3">
    <div class="container">
        <?php $this->view("message")?>
        <div class="card image-gallery-card direction-rtl">
            <div class="card-body">
                <img class="mb-3 rounded" src="<?= base_url() ?>/assets/img/template/gayabelajar.png" alt="">
                <h3>Test Gaya Belajar!</h3>
                <p>Agar prose belajarmu lebih menyenangkan, yuk cek gaya belajar yang cocok buat kamu. Hasil tes akan mempengaruhi jenis objek belajar yang disarakankan untuk kamu, lho.
                </p>
                <form action="<?= base_url("treatment/resultGayaBelajar")?>" method="post">
                <h6>Ketika berbicara, kecenderungan gaya bicara saya...</h6>
                <p align="left">
                    <input type="radio" name="soal[1]" value="A" required> A. Cepat<br>
                    <input type="radio" name="soal[1]" value="B"> B. Berirama<br>
                    <input type="radio" name="soal[1]" value="C"> C. Lambat<br>
                </p>
                <hr>
                <h6>Saya...</h6>
                <p align="left">
                    <input type="radio" name="soal[2]" value="A" required> A. Mampu merencanakan dan mengatur kegiatan jangka panjang dengan baik<br>
                    <input type="radio" name="soal[2]" value="B"> B. Mampu mengulang dan menirukan nada, perubahan, dan warna suara<br>
                    <input type="radio" name="soal[2]" value="C"> C. Mahir dalam mengerjakan puzzle, teka-teki, menyusun potongan-potongan gambar<br>
                </p>
                <hr>
                <h6>Saya dapat mengingat dengan baik informasi yang...</h6>
                <p align="left">
                    <input type="radio" name="soal[3]" value="A" required> A. Tertulis di papan tulis atau yang diberikan melalui tugas membaca<br>
                    <input type="radio" name="soal[3]" value="B"> B. Disampaikan melalui penjelasan guru, diskusi, atau rekaman<br>
                    <input type="radio" name="soal[3]" value="C"> C. Diberikan dengan cara menuliskannya berkali-kali<br>
                </p>
                <hr>
                <h6>Saya menghafal sesuatu...</h6>
                <p align="left">
                    <input type="radio" name="soal[4]" value="A" required> A. Dengan membayangkannya<br>
                    <input type="radio" name="soal[4]" value="B"> B. Dengan mengucapkannya dengan suara yang keras<br>
                    <input type="radio" name="soal[4]" value="C"> C. Sambil berjalan dan melihat-lihat keadaan sekeliling<br>
                </p>
                <hr>
                <h6>Saya merasa sulit...</h6>
                <p align="left">
                    <input type="radio" name="soal[5]" value="A" required> A. Mengingat perintah lisan kecuali jika dituliskan<br>
                    <input type="radio" name="soal[5]" value="B"> B. Menulis tetapi pandai bercerita<br>
                    <input type="radio" name="soal[5]" value="C"> C. Duduk tenang untuk waktu yang lama<br>
                </p>
                <hr>
                <h6>Saya lebih suka...</h6>
                <p align="left">
                    <input type="radio" name="soal[6]" value="A" required> A. Membaca daripada dibacakan<br>
                    <input type="radio" name="soal[6]" value="B"> B. Mendengar daripada membaca<br>
                    <input type="radio" name="soal[6]" value="C"> C. Menggunakan model dan praktek atau praktikum<br>
                </p>
                <hr>
                <h6>Saya suka...</h6>
                <p align="left">
                    <input type="radio" name="soal[7]" value="A" required> A. Mencoret-coret selama menelepon, mendengarkan musik, atau menghadiri rapat<br>
                    <input type="radio" name="soal[7]" value="B"> B. Membaca keras-keras dan mendengarkan musik/pembicaraan<br>
                    <input type="radio" name="soal[7]" value="C"> C. Mengetuk-ngetuk pena, jari, atau kaki saat mendengarkan musik/pembicaraan<br>
                </p>
                <hr>
                <h6>Saya lebih suka melakukan...</h6>
                <p align="left">
                    <input type="radio" name="soal[8]" value="A" required> A. Demonstrasi daripada berpidato<br>
                    <input type="radio" name="soal[8]" value="B"> B. Diskusi dan berbicara panjang lebar<br>
                    <input type="radio" name="soal[8]" value="C"> C. Berolahraga dan kegiatan fisik lainnya<br>
                </p>
                <hr>
                <h6>Saya lebih menyukai...</h6>
                <p align="left">
                    <input type="radio" name="soal[9]" value="A" required> A. Seni rupa daripada musik<br>
                    <input type="radio" name="soal[9]" value="B"> B. Musik daripada seni rupa<br>
                    <input type="radio" name="soal[9]" value="C"> C. Olahraga dan kegiatan fisik lainnya<br>
                </p>
                <hr>
                <h6>Ketika mengerjakan sesuatu, saya selalu...</h6>
                <p align="left">
                    <input type="radio" name="soal[10]" value="A" required> A. Mengikuti petunjuk dan gambar yang disediakan<br>
                    <input type="radio" name="soal[10]" value="B"> B. Membicarakan dengan orang lain atau berbicara sendiri keras-keras<br>
                    <input type="radio" name="soal[10]" value="C"> C. Mencari tahu cara kerjanya sambil mengerjakannya<br>
                </p>
                <hr>
                <h6>Konsentrasi saya terganggu oleh...</h6>
                <p align="left">
                    <input type="radio" name="soal[11]" value="A" required> A. Ketidakteraturan atau gerakan<br>
                    <input type="radio" name="soal[11]" value="B"> B. Suara atau keributan<br>
                    <input type="radio" name="soal[11]" value="C"> C. Kegiatan di sekeliling<br>
                </p>
                <hr>
                <h6>Saya lebih mudah belajar melalui kegiatan...</h6>
                <p align="left">
                    <input type="radio" name="soal[12]" value="A" required> A. Membaca<br>
                    <input type="radio" name="soal[12]" value="B"> B. Mendengarkan dan berdiskusi<br>
                    <input type="radio" name="soal[12]" value="C"> C. Praktek atau praktikum<br>
                </p>
                <hr>
                <h6>Saya berbicara dengan...</h6>
                <p align="left">
                    <input type="radio" name="soal[13]" value="A" required> A. Singkat dan tidak senang mendengarkan pembicaraan panjang<br>
                    <input type="radio" name="soal[13]" value="B"> B. Cepat dan senang mendengarkan<br>
                    <input type="radio" name="soal[13]" value="C"> C. Menggunakan isyarat tubuh dan gerakan-gerakan ekspresif<br>
                </p>
                <hr>
                <h6>Untuk mengetahui suasana hati seseorang, saya ...</h6>
                <p align="left">
                    <input type="radio" name="soal[14]" value="A" required> A. Melihat ekspresi wajahnya<br>
                    <input type="radio" name="soal[14]" value="B"> B. Mendengarkan nada suara<br>
                    <input type="radio" name="soal[14]" value="C"> C. Memperhatikan gerakan badannya<br>
                </p>
                <hr>
                <h6>Untuk mengisi waktu luang, saya lebih suka...</h6>
                <p align="left">
                    <input type="radio" name="soal[15]" value="A" required> A. Menonton televisi atau menyaksikan pertunjukan<br>
                    <input type="radio" name="soal[15]" value="B"> B. Mendengarkan radio, musik, atau membaca<br>
                    <input type="radio" name="soal[15]" value="C"> C. Melakukan permainan atau bekerja dengan menggunakan tangan<br>
                </p>
                <hr>
                <h6>Ketika mengajarkan sesuatu kepada orang lain, saya lebih suka …</h6>
                <p align="left">
                    <input type="radio" name="soal[16]" value="A" required> A. Menunjukkannya<br>
                    <input type="radio" name="soal[16]" value="B"> B. Menceritakannya<br>
                    <input type="radio" name="soal[16]" value="C"> C. Mendemonstrasikannya dan meminta mereka untuk mencobanya<br>
                </p>
                <hr>
                <button class="btn btn-primary w-100 d-flex align-items-center justify-content-center" type="submit">
                    Cek Gaya Belajar <i class="bi bi-arrow-right fz-16 ms-1"></i>
                </button>
                </form> 
            </div>
        </div>
    </div>
</div>