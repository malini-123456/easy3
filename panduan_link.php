<?php require_once('session.php');
if ($username) {
    $query_session = "SELECT * FROM user WHERE username = '$username'";
    $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
    $row_session = mysqli_fetch_assoc($result_session);
}
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php include "./head.html" ?>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php include "./aside.php" ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php include "./header.php" ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="content-page wide-md m-auto">
                                    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                        <div class="nk-block-head-content text-center">
                                            <h2 class="nk-block-title fw-normal">Panduan Penggunaan EASY3</h2>
                                            <div class="nk-block-des">
                                                <p class="text-soft ff-italic">Gak usah formal2 ya yg penting ngerti.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <!-- //////////////////////////////////////////////// Q & A -->

                                    <div class="nk-block">
                                        <div class="card">
                                            <div class="card-inner card-inner-xl">
                                                <div class="entry">
                                                    <h4>Fitur Baru!!!</h4>
                                                    <p>
                                                    <ul class="list list-checked">
                                                        <li>E-Certificate</li>
                                                        <li>E-Signature partnership with Digisign (<strong class="text-dark">JANGAN LUPA RAJIN2 CEK DASHBOARD DIGISIGN</strong> u/ cek saldo yaaaa)</li>
                                                        <li>monitor proyek insitu, eksitu dan subkon</li>
                                                        <li>monitor e-certificate semua pelanggan</li>
                                                        <li>monitor riwayat pekerjaan setiap pelanggan</li>
                                                        <li>SIRIS (informasi semua e-certifictae masing-masing pelanggan)</li>
                                                        <li>BAST sertifikat input pakai CSV</li>
                                                        <li>Peminjaman alat sesuai layanan (WAJIB! jika ada penambahan layanan dan alat kalibrator, hubungi Malini untuk sinkronisasi)</li>
                                                    </ul>
                                                    </p>
                                                    <h4>Fitur Lainnya</h4>
                                                    <p>
                                                    <ul class="list list-checked">
                                                        <li>Registrasi User (teknisi wajib terdaftar, agar masuk di penunjukan koordinator dan pelaksana)</li>
                                                        <li>QR code kontak pegawai</li>
                                                        <li>Kaji Ulang Permintaan Tender dan Kontrak sesuai Panduan Mutu (output : BA Permohonan dan Form Kaji Ulang)</li>
                                                        <li>Penjadwalan pekerjaan (output : SPK dan Surat Jadwal)</li>
                                                        <li>Penunjukan Koordinator dan Pelaksana (kalau ada update teknisi kabari ya, karena switch button tidak bisa otomatis)</li>
                                                        <li>Akomodasi Perjalanan Dinas (Laporan Pertanggungjawaban Akomodasi isi manual)</li>
                                                        <li>Peminjaman Mikropipet untuk proyek on going</li>
                                                        <li>History peminjaman alat kalibrator</li>
                                                        <li>Riwayat alat kalibrator</li>
                                                        <li>QR code alat kalibrator dan mikropipet</li>
                                                        <li>Database Pelanggan, Layanan, Alat Kalibrator, Mikropipet, dan User (harus update aktif dan tidak aktif pegawai)</li>
                                                    </ul>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-12">
                                                <div id="faqs" class="accordion">
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#faq-q1" aria-expanded="false">
                                                            <h6 class="title">WHAT ?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="faq-q1" data-parent="#faqs" style="">
                                                            <div class="accordion-inner">
                                                                <p><strong>EASY2</strong> adalah web sistem
                                                                    yang digunakan untuk <strong>memonitoring
                                                                        proyek/pekerjaan, mengisi kegiatan, memantau
                                                                        karakteristik pelanggan, identifikasi karyawan
                                                                        dan memantau aset (kalibrasi)</strong>
                                                                    kalibrasi oleh PT. Elektromedika Instrumen Tera
                                                                    Nusantara.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#faq-q2" aria-expanded="false">
                                                            <h6 class="title">WHY ?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="faq-q2" data-parent="#faqs" style="">
                                                            <div class="accordion-inner">
                                                                <p>Dilatarbelakangi oleh kesulitan personel lab untuk
                                                                    memonitor pekerjaan yang masih berjalan atau sudah
                                                                    selesai</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#faq-q3" aria-expanded="false">
                                                            <h6 class="title">WHEN ?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="faq-q3" data-parent="#faqs" style="">
                                                            <div class="accordion-inner">
                                                                <p>Dapat diakses kapanpun selama user memiliki akses
                                                                    internet.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#faq-q4" aria-expanded="false">
                                                            <h6 class="title">WHERE ?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="faq-q4" data-parent="#faqs" style="">
                                                            <div class="accordion-inner">
                                                                <p>EASY2 berbasis web yang dapat diakses di
                                                                    <a href="https://pt-einsten.com/easy2/index">pt-einsten.com/easy2/index</a>
                                                                    melalui smart
                                                                    phone, tablet, laptop atau PC.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#faq-q5" aria-expanded="false">
                                                            <h6 class="title">WHO ?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="faq-q5" data-parent="#faqs" style="">
                                                            <div class="accordion-inner">
                                                                <p>Web sistem ini diperuntukkan kepada semua personel di
                                                                    PT. Elektromedika Instrumen Tera Nusanatara dengan
                                                                    ketentuan hak akses sebagai berikut.</p>
                                                                <p></p>
                                                                <div class="row g-3">
                                                                    <div>
                                                                        <h4>Admin Umum</h4>
                                                                        <ul class="list list-sm list-checked">
                                                                            <li>Add, edit, delete Project</li>
                                                                            <li>Penawaran Harga</li>
                                                                            <li>Salinan Sertifikat</li>
                                                                            <li>Input DO</li>
                                                                            <Li>PO Subkontrak</Li>
                                                                            <li>Verifikasi Pembelian Subkontrak</li>
                                                                            <li>Add, edit, delete Pelanggan</li>
                                                                            <li>Add, edit, delete Mikropipet</li>
                                                                            <li>Peminjaman Mikropipet</li>
                                                                            <li>Add, edit, delete Event</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <h4>Admin Teknis</h4>
                                                                        <ul class="list list-sm list-checked">
                                                                            <li>Permintaan/Order</li>
                                                                            <li>Kaji Ulang Permintaan</li>
                                                                            <li>SPK dan Akomodasi</li>
                                                                            <li>Berkas Teknisi</li>
                                                                            <Li>Pengiriman Subkon</Li>
                                                                            <li>Add, edit, delete Alat Kalibrasi</li>
                                                                            <li>Add Riwayat Alat</li>
                                                                            <li>Peminjaman Mikropipet</li>
                                                                            <li>Add, edit, delete Event</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <h4>Finance</h4>
                                                                        <ul class="list list-sm list-checked">
                                                                            <li>Invoice Pajak Penjualan</li>
                                                                            <li>Bukti Transfer</li>
                                                                            <li>SPJ</li>
                                                                            <li>SSP dan Bukti Potong</li>
                                                                            <li>Pelunasan/Uang Muka Subkon</li>
                                                                            <Li>Invoice dan Pajak Subkon</Li>
                                                                            <li>Peminjaman Mikropipet</li>
                                                                            <li>Add, edit, delete Event</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <h4>Teknisi</h4>
                                                                        <ul class="list list-sm list-checked">
                                                                            <li>Laporan Pekerjaan</li>
                                                                            <Li>Add Riwayat Alat</Li>
                                                                            <li>Peminjaman Mikropipet</li>
                                                                            <li>Add, edit, delete Event</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <h4>PJ Teknis</h4>
                                                                        <ul class="list list-sm list-checked">
                                                                            <li>Penyusunan Jadwal</li>
                                                                            <li>Add Riwayat Alat</li>
                                                                            <li>Add, edit, delete Alat Kalibrasi</li>
                                                                            <li>Add, edit, delete Layanan</li>
                                                                            <li>Add, edit, delete Mikropipet</li>
                                                                            <li>Peminjaman Mikropipet</li>
                                                                            <li>Add, edit, delete Event</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <h4>Penyelia</h4>
                                                                        <ul class="list list-sm list-checked">
                                                                            <li>Penyeliaan Lembar Kerja</li>
                                                                            <li>Cetak Sertifikat</li>
                                                                            <li>BAST Sertifikat</li>
                                                                            <li>BAST Alat</li>
                                                                            <li>Peminjaman Mikropipet</li>
                                                                            <li>Add, edit, delete Event</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div>
                                                                        <h4>Marketing</h4>
                                                                        <ul class="list list-sm list-checked">
                                                                            <li>Add, edit, delete Project</li>
                                                                            <li>Negosiasi dan Kontrak</li>
                                                                            <li>Add, edit, delete Pelanggan</li>
                                                                            <li>Peminjaman Mikropipet</li>
                                                                            <li>Add, edit, delete Event</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#faq-q6" aria-expanded="false">
                                                            <h6 class="title">HOW ?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="faq-q6" data-parent="#faqs" style="">
                                                            <div class="accordion-inner">
                                                                <div class="nk-block">
                                                                    <h4>Flowchart Proyek</h4>
                                                                    <div>
                                                                        <img src="./images/panduan/flow_proyek.png" alt="" srcset="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="nk-block">
                                        <div class="card">
                                            <div class="card-inner">
                                                <div class="entry">
                                                    <h4>Cara TTD Digital</h4>
                                                    <p>1. Arahkan kursor ke bagian menu di sisi kiri, klik <strong>E-Certificate</strong> kemudian pilih <strong>E-Signature</strong> </p>
                                                    <img src="./images/panduan/ec1.png">
                                                    <p>2. Di halaman upload, pilih dokumen mana saja yg akan diTTD dengan cara klik <strong>Choose File</strong> </p>
                                                    <img src="./images/panduan/ec2.png">
                                                    <p>3. Kemudian akan ada pop up dialog untuk memilih dokumen yang akan diTTD <strong>(HARUS .pdf)</strong>, setelah itu klik <strong>Open</strong> </p>
                                                    <p>4. <strong>Tunggu beberapa saat untuk loading dokumen</strong> (lama jika dokumennya banyak dan berat, sabaaar) akan muncul <strong>jumlah file di kanan button Choose File</strong>. Jika sudah sesuai jumlah dokumen yang dipilih, klik <strong>Submit</strong>.</p>
                                                    <img src="./images/panduan/ec3.png">
                                                    <p>5. Setelah klik Submit, akan muncul page baru seperti gambar di bawah. <strong>Periksa kelengkapan dokumen sebelum klik Proses.</strong></p>
                                                    <img src="./images/panduan/ec4.png">
                                                    <p>6. Siapkan HP dengan no <strong>Top Up</strong> yg terdaftar <strong>(+62 851-7545-0310)</strong> atau email yg terdaftar <strong>(mt@pt-einsten.com)</strong>. Masukkan password <strong>(einsten#4297)</strong>, pilih metode pengiriman OTP, kemudian masukkan OTP. Lalu Klik <strong>Saya menyetujui menandatangani dokumen ini</strong>.</p>
                                                    <img src="./images/panduan/ec5.png">
                                                    <p>7. Kemudian dokumen yg sudah terTTD akan muncul di daftar E-SERTIFIKAT di halaman upload. </p>
                                                    <img src="./images/panduan/ec6.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <div class="card">
                                            <div class="card-inner">
                                                <div class="entry">
                                                    <h4>Tutorial ngisi SIRIS CSV (rekapan sertifikat digital)</h4>
                                                    <p>1. Pilih <strong>Proyek ON-GOING</strong> yang akan ditambahkan rekapan sertifikatnya, lalu klik/download <STRONG>format csvnya (PENTING: dilarang mengubah extention file ini)</STRONG></p>
                                                    <img src="./images/panduan/csv1.png">
                                                    <p>2. Buka file yg barusan didownload,</p>
                                                    <ul class="list list-download">
                                                        <li>Kode Stiker : sesuaikan dengan stiker yang ditempel pada alat terkalibrasi (M/Hxxxxxx), <span class="text-success">H (hijau/laik)</span>, <span class="text-danger">M (merah/tidak laik)</span> diikuti dengan 6 digit angka;</li>
                                                        <li>No. Sertifikat, Nama Alat, Merek, Tipe, No. Seri, Ruangan, Penguji semua copy aja ya dari buku induk</li>
                                                        <li>Hasil : TERISI OTOMATIS SESUAI KODE STIKER (kode stiker harus bangeeet ikut cara penulisan seperti di atas);</li>
                                                        <li>Status : TERISI OTOMATIS DARI nama file yang diupload di e-certicate <strong>(maka dari itu harus matching)</strong></li>
                                                    </ul>
                                                    <p>3. Jangan lupa <strong>Save</strong> lalu kembali ke browser</p>
                                                    <img src="./images/panduan/csv2.png">
                                                    <p>4. Klik <strong>Choose File</strong>,lalu pilih file csv yg tadi. Klik <strong>Open</strong>, tunggu sebentar untuk loading, lalu <strong></strong></p>
                                                    <img src="./images/panduan/csv3.png">
                                                    <p>5. Proses selesai, periksa kelengkapan data. pastikan tidak ada yg ketinggalan.</p>
                                                    <img src="./images/panduan/csv5.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .content-page -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?php include "./footer.html" ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <?php include "./scripts.html" ?>
    <!-- JavaScript -->
    <script>
        $(document).ready(function(e) {
            document.title = 'Panduan EASY';
            cekDark();
        });
    </script>

</body>

</html>