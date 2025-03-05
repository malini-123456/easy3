<?php require_once('connect.php');

if (isset($_REQUEST['uid'])) {
    $alatid = $_REQUEST['uid'];

    $query0 = "SELECT * FROM alatkalibrasi WHERE id_alat = '$alatid'";
    $result0 = mysqli_query($conn, $query0) or die(mysqli_error($conn));
    $row0 = mysqli_fetch_assoc($result0);
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
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="row pb-5">
                                                <div class="col-md-8 col-lg-8 col-xxl-8">

                                                    <!-- SLIDER INIT -->

                                                    <div class="slider-init"
                                                        data-slick='{"arrows": true, "dots": true, "slidesToShow": 2, "slidesToScroll": 1, "infinite":false, "responsive":[ {"breakpoint": 992,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}} ]}'>

                                                        <?php
                                                                    if ($row0['link_alat']!='') {
                                                                        $str_alat = explode(';;', $row0['link_alat']);
                                                                        if (sizeof($str_alat) == 1) {
                                                        ?>
                                                        <div class="col">
                                                            <div class="card card-bordered">
                                                                <img src="<?=$str_alat[0];?>" class="card-img"
                                                                    height="400px">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="card card-bordered">
                                                                <img src="<?=$str_alat[0];?>" class="card-img"
                                                                    height="400px">
                                                            </div>
                                                        </div>
                                                        <?php
                                                                    } else {
                                                                        for ($i=0; $i<sizeof($str_alat); $i++) {
                                                            ?>
                                                        <div class="col">
                                                            <div class="card card-bordered">
                                                                <img src="<?=$str_alat[$i];?>" class="card-img"
                                                                    height="400px">
                                                            </div>
                                                        </div>
                                                        <?php
                                                                        }
                                                                    }
                                                                } else {
                                                        ?>
                                                        <div class="col">
                                                            <div class="card card-bordered">
                                                                <img src="./images/img/0.png" class="card-img"
                                                                    height="400px">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="card card-bordered">
                                                                <img src="./images/img/0.png" class="card-img"
                                                                    height="400px">
                                                            </div>
                                                        </div>
                                                        <?php
                                                                }
                                                        ?>

                                                    </div>
                                                </div>

                                                <!-- SLIDER INIT -->


                                                <div class="col-md-4 col-lg-4 col-xxl-4">
                                                    <h3 class="product-title"><?= $row0['nama_alat']; ?></h3>
                                                    <div class="product-meta">
                                                        <ul class="pricing-features">
                                                            <li><span class="w-50">Merek</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['merek']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Tipe</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['tipe']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">No Seri</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['no_seri']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Kode Inventaris</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['kode_inventaris']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Harga</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary">Rp.<?= number_format($row0['harga'], 0); ?></span>
                                                            </li>
                                                            <li><span class="w-50">Penyedia</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['penyedia']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Rentang Ukur</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['rentang_ukur']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Resolusi</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['resolusi']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Tgl Diterima</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['tgl_diterima']; ?></span>
                                                            </li>
                                                            <?php if ($row0['tgl_kalibrasi'] == '0000-00-00') { ?>
                                                            <li><span class="w-50">Tgl Dikalibrasi</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary">-</span>
                                                            </li>
                                                            <?php } else { ?>
                                                            <li><span class="w-50">Tgl Dikalibrasi</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['tgl_kalibrasi']; ?></span>
                                                            </li>
                                                            <?php } ?>
                                                            <li>
                                                                <span class="w-50">Dokumen Alat</span>
                                                                <?php if ($row0['doc_alat'] != '') { ?>
                                                                <span class="ml-auto fs-16px fw-bold text-secondary"><a
                                                                        href="<?= $row0['doc_alat']; ?>" target="_blank"
                                                                        class="toogle"><em
                                                                            class="icon ni ni-download"></em><span>Download</span></span></a>
                                                                <?php } else { ?>
                                                                <span class="ml-auto fs-16px fw-bold text-secondary"><a
                                                                        href="#" class="toogle"><em
                                                                            class="icon ni ni-na"></em><span>Download</span></span></a>
                                                                <?php } ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <h4>History Peminjaman</h4>
                                            <table class="datatable-init-export_noaction1desc nowrap table"
                                                data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Tgl. Dipinjam</th>
                                                        <th>No Proyek</th>
                                                        <th>Nama Pelanggan</th>
                                                        <th>Penanggung Jawab Alat</th>
                                                        <th>Kondisi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                            $sno = 0;

                                                            $query1 = "SELECT * FROM berkasteknisi WHERE id_alat = '$alatid' ORDER BY id_berkasteknisi DESC";
                                                            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                            while ($row1 = mysqli_fetch_array($result1)) {

                                                                $proyekid = $row1['id_proyek'];

                                                                $query2 = "SELECT * FROM proyek WHERE id_proyek = '$proyekid'";
                                                                $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                                                $row2 = mysqli_fetch_assoc($result2);
                                                                $pelangganid = $row2['id_pelanggan'];

                                                                $query3 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$pelangganid'";
                                                                $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
                                                                $row3 = mysqli_fetch_assoc($result3);

                                                                $query4 = "SELECT * FROM spk WHERE id_proyek = '$proyekid'";
                                                                $result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
                                                                $row4 = mysqli_fetch_assoc($result4);
                                                                $teknisiid = $row4['koordinator_spk'];

                                                                $query5 = "SELECT * FROM teknisi WHERE id_teknisi = '$teknisiid'";
                                                                $result5 = mysqli_query($conn, $query5) or die(mysqli_error($conn));
                                                                $row5 = mysqli_fetch_assoc($result5);


                                                                $sno++;
                                                            ?>
                                                    <tr>
                                                        <!-- <td><?= $sno; ?></td> -->
                                                        <td><?= $row1['lastupdate_berkasteknisi']; ?></td>
                                                        <td><?= $row2['no_proyek']; ?></td>
                                                        <td><?= $row3['nama_pelanggan']; ?></td>
                                                        <td><?= $row5['nama_teknisi']; ?></td>
                                                        <td><?= $row1['kondisi']; ?></td>
                                                        <!-- <td>Tgl dikembalikan?</td> -->

                                                    </tr>
                                                    <?php
                                                            }
                                                            ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <?php
                                            $query = "SELECT * FROM riwayat WHERE id_alat = '$alatid' ORDER BY id_riwayat DESC";
                                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                            $row_jml_riwayat = mysqli_num_rows($result);

                                            if ($row_jml_riwayat != 0) {
                                            ?>
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="nk-block-between">
                                                <div class="nk-block-head-content">
                                                    <h4>Riwayat Alat</h4>
                                                </div>
                                            </div>
                                            <p></p>
                                            <table class="datatable-init-export_noaction1desc nowrap table"
                                                data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal</th>
                                                        <th>Tindakan</th>
                                                        <th>Deskripsi</th>
                                                        <th>Kategori</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                            $sno = 0;
                                                            while ($row = mysqli_fetch_array($result)) {

                                                                $sno++;
                                                            ?>
                                                    <tr>
                                                        <td><?= $row['tgl_riwayat']; ?></td>
                                                        <td><?= $row['tindakan_riwayat']; ?></td>
                                                        <td><?= $row['deskripsi_riwayat']; ?></td>
                                                        <td><?= $row['kategori_riwayat']; ?></td>
                                                    </tr>
                                                    <?php
                                                            }
                                                            ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- .nk-content -->
            </div>
        </div>
    </div>
    </div>
    <!-- content @e -->
    <!-- footer @s -->
    <?php include "./footer.html" ?>
    <!-- footer @e -->
    </div> <!-- main @e -->

    <?php include "./scripts.html" ?>
    <!-- JavaScript -->
    <script>
    $(document).ready(function(e) {
        document.title = 'Alat | ' + '<?= $row0['nama_alat']; ?>';
    });
    </script>

</body>

</html>