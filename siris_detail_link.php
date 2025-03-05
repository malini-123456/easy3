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
                                            <h2>Panduan Penggunaan EASY2</h2>
                                            <!-- <div class="nk-block-des">
                                                <p class="lead text-primary">Tata cara penggunaan Einsten Administration
                                                    System
                                                    (EASY)</p>
                                            </div> -->
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <!-- //////////////////////////////////////////////// Q & A -->

                                    <div class="nk-block">
                                        <div class="row">
                                            <div class="col-12">
                                                <div id="faqs" class="accordion">


                                                    <table class="datatable-init-export_action1asc wrap table" data-export-title="Export">
                                                        <thead>
                                                            <tr>
                                                                <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing') || ($row_session['posisi_user'] == 'Admin Umum')) { ?>
                                                                    <th>Action</th>
                                                                <?php } ?>
                                                                <th>Nama Pelanggan</th>
                                                                <th>Alamat</th>
                                                                <th>Kontak</th>
                                                                <th>Kategori</th>
                                                                <th>NPWP</th>
                                                                <th>Nama NPWP</th>
                                                                <th>Karakteristik</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sno = 0;
                                                            $query = "SELECT * FROM pelanggan ORDER BY id_pelanggan DESC";
                                                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $sno++;
                                                            ?>
                                                                <tr>
                                                                    <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing') || ($row_session['posisi_user'] == 'Admin Umum')) { ?>
                                                                        <td>
                                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger btn-xs" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-left">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li>
                                                                                        <a href="#" onclick="pelanggan_qr('<?= $row['nama_pelanggan']; ?>')" class="toggle"><em class="icon ni ni-qr"></em><span>QR Code</span></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#" id="<?= $row['id_pelanggan']; ?>" data-target="addPelanggan" data-dismiss="modal" class="toggle btn-edit"><em class="icon ni ni-edit-fill"></em><span>Edit
                                                                                                Pelanggan</span></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#" id="<?= $row['id_pelanggan']; ?>" class="toggle btn-delete"><em class="icon ni ni-trash-fill"></em><span>Delete
                                                                                                Pelanggan</span></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    <?php } ?>

                                                                    <td><?= $row['nama_pelanggan']; ?></td>
                                                                    <td><?= $row['alamat_pelanggan']; ?></td>
                                                                    <td><?= $row['kontak_pelanggan']; ?></td>
                                                                    <td><?= $row['kategori_pelanggan']; ?></td>
                                                                    <td><?= $row['npwp_pelanggan']; ?></td>
                                                                    <td><?= $row['namanpwp_pelanggan']; ?></td>
                                                                    <td><?= $row['catatan_pelanggan']; ?></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>







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
                                                    </div><!-- .accordion-item -->
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
                                                    </div><!-- .accordion-item -->
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
                                                    </div><!-- .accordion-item -->
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
                                                    </div><!-- .accordion-item -->
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
                                                    </div><!-- .accordion-item -->
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
                                                    </div><!-- .accordion-item -->
                                                </div><!-- .accordion -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-block">
                                        <div class="card-inner">
                                            <ul class="preview-icon-list">
                                                <li class="preview-icon-item">
                                                    <div class="preview-icon-box card">
                                                        <a href="#">
                                                            <div class="preview-icon-wrap">
                                                                <em class="ni ni-home"></em>
                                                            </div>
                                                            <span class="text-primary text-xl-center" data-toggle="modal" data-target="#Pakta"><strong>Dashboard</strong></span>
                                                        </a>
                                                    </div>
                                                </li><!-- .icon-item -->
                                                <li class="preview-icon-item">
                                                    <div class="preview-icon-box card">
                                                        <a href="#">
                                                            <div class="preview-icon-wrap">
                                                                <em class="ni ni-calendar-alt"></em>
                                                            </div>
                                                            <span class="text-primary text-xl-center"><strong>Event</strong></span>
                                                        </a>
                                                    </div>
                                                </li><!-- .icon-item -->
                                                <li class="preview-icon-item">
                                                    <div class="preview-icon-box card">
                                                        <a href="#">
                                                            <div class="preview-icon-wrap">
                                                                <em class="ni ni-list-index-fill"></em>
                                                            </div>
                                                            <span class="text-primary text-xl-center"><strong>Projects</strong></span>
                                                        </a>
                                                    </div>
                                                </li><!-- .icon-item -->
                                                <li class="preview-icon-item">
                                                    <div class="preview-icon-box card">
                                                        <a href="#">
                                                            <div class="preview-icon-wrap">
                                                                <em class="ni ni-package-fill"></em>
                                                            </div>
                                                            <span class="text-primary text-xl-center"><strong>Documentations</strong></span>
                                                        </a>
                                                    </div>
                                                </li><!-- .icon-item -->
                                                <li class="preview-icon-item">
                                                    <div class="preview-icon-box card">
                                                        <a href="#">
                                                            <div class="preview-icon-wrap">
                                                                <em class="ni ni-property-add"></em>
                                                            </div>
                                                            <span class="text-primary text-xl-center"><strong>Peminjaman
                                                                    Mikropipet</strong></span>
                                                        </a>
                                                    </div>
                                                </li><!-- .icon-item -->
                                                <li class="preview-icon-item">
                                                    <div class="preview-icon-box card">
                                                        <a href="#">
                                                            <div class="preview-icon-wrap">
                                                                <em class="ni ni-comments"></em>
                                                            </div>
                                                            <span class="text-primary text-xl-center"><strong>Kritik
                                                                    dan
                                                                    Saran</strong></span>
                                                        </a>
                                                    </div>
                                                </li><!-- .icon-item -->
                                            </ul>
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
        <div class="modal fade" tabindex="-1" id="Pakta">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Pakta Integritas</h5>
                    </div>
                    <div class="modal-body">
                        <article class="center">
                            <p class="lead"><strong>Personel Laboratorium Kalibrasi PT.
                                    Elektromedika Instrumen Tera
                                    Nusantara</strong>
                            </p>

                        </article>
                        <p>Saya yang bertanda tangan di bawah ini dengan penuh kesadaran dan
                            tanggung jawab melaksanakan
                            pakta integritas personel laboratorium dengan kesepakatan sebagai
                            berikut:</p>
                        <p>1. Bekerja secara teamwork berlandaskan profesionalisme,
                            independensi, kejujuran, semangat,
                            dan
                            menjunjung tinggi integritas sehingga validitas data kalibrasi serta
                            ketertelusuran
                            metrologi
                            dapat dibuktikan secara ilmiah;</p>
                        <p>2. Memberikan standar pelayanan secara konsisten dan menjaga
                            komunikasi yang baik serta
                            melindungi kerahasiaan informasi dan hak kepemilikan pelanggan dari
                            pihak-pihak yang tidak
                            berkepentingan;</p>
                        <p>3. Mempertimbangankan pengelolaan lingkungan hidup serta keselamatan
                            dan kesehatan kerja
                            sehingga
                            tercapai nol kecelakaan dalam setiap kegiatan kalibrasi;</p>
                        <p>4. Memelihara semua aset, dokumen, rekaman, dan hak kekayaan
                            intelektual yang dimiliki
                            laboratorium serta tidak mengubah/memperbanyak/mengutip/menyalin
                            sebagian atau keseluruhan
                            dokumen dan rekaman untuk kepentingan pribadi maupun pihak-pihak
                            lain;</p>
                        <p>5. Berkomitmen meningkatkan lingkungan yang sehat, aman, dan
                            kondusif, serta bebas dari
                            penyalahgunaan narkotika dan obat terlarang, alkohol, senjata api
                            atau senjata tajam, serta
                            tidak merokok di ruang kerja.</p>
                    </div>
                    <div class="modal-footer bg-light">
                        <span class="sub-text"></span>
                    </div>
                </div>
            </div>
        </div><!-- modal -->
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