<?php require_once('session.php');
if ($username) {
    $query_session = "SELECT * FROM user WHERE username = '$username'";
    $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
    $row_session = mysqli_fetch_assoc($result_session);
}

if (isset($_REQUEST['uid'])) {
    $mikropipetid = $_REQUEST['uid'];

    $query0 = "SELECT * FROM mikropipet WHERE id_mikropipet = '$mikropipetid'";
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
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="row pb-5">
                                                <div class="col-lg-8"></div>

                                                <div class="col-md-8 col-lg-8 col-xxl-8">

                                                    <!-- SLIDER INIT -->

                                                    <div class="slider-init" data-slick='{"arrows": true, "dots": true, "slidesToShow": 2, "slidesToScroll": 1, "infinite":false, "responsive":[ {"breakpoint": 992,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}} ]}'>

                                                        <?php
                                                        if ($row0['link_mikropipet'] != '') {
                                                            $str_alat = explode(';;', $row0['link_mikropipet']);
                                                            if (sizeof($str_alat) == 1) {
                                                        ?>
                                                                <div class="col">
                                                                    <div class="card card-bordered">
                                                                        <img src="<?= $str_alat[0]; ?>" class="card-img" height="400px">
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="card card-bordered">
                                                                        <img src="<?= $str_alat[0]; ?>" class="card-img" height="400px">
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            } else {
                                                                for ($i = 0; $i < sizeof($str_alat); $i++) {
                                                                ?>
                                                                    <div class="col">
                                                                        <div class="card card-bordered">
                                                                            <img src="<?= $str_alat[$i]; ?>" class="card-img" height="400px">
                                                                        </div>
                                                                    </div>
                                                            <?php
                                                                }
                                                            }
                                                        } else {
                                                            ?>
                                                            <div class="col">
                                                                <div class="card card-bordered">
                                                                    <img src="./images/img/0.png" class="card-img" height="400px">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="card card-bordered">
                                                                    <img src="./images/img/0.png" class="card-img" height="400px">
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>

                                                <!-- SLIDER INIT -->

                                                <div class="col-md-4 col-lg-4 col-xxl-4">
                                                    <h3 class="product-title"><?= $row0['no_seri']; ?></h3>
                                                    <div class="product-meta">
                                                        <ul class="pricing-features">
                                                            <li><span class="w-50">Merek</span><span class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['merek']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Tipe</span><span class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['tipe']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">No Seri</span><span class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['no_seri']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Volume</span><span class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['volume']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Lokasi</span><span class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['lokasi']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Penyedia</span><span class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['penyedia']; ?></span>
                                                            </li>
                                                            <?php if ($row0['tgl_kalibrasi'] == '0000-00-00') { ?>
                                                                <li><span class="w-50">Tgl Dikalibrasi</span><span class="ml-auto fs-16px fw-bold text-secondary">-</span>
                                                                </li>
                                                            <?php } else { ?>
                                                                <li><span class="w-50">Tgl Dikalibrasi</span><span class="ml-auto fs-16px fw-bold text-secondary"><?= date_format(date_create($row0['tgl_kalibrasi']), 'd F Y'); ?></span>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <h4>History Peminjaman Mikropipet</h4>
                                            <table class="datatable-init-export_noaction1desc nowrap table" data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Tgl. Dipinjam</th>
                                                        <th>No Proyek</th>
                                                        <th>Nama Peminjam</th>
                                                        <th>Nama Pelanggan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sno = 0;

                                                    $query1 = "SELECT * FROM detailpeminjamanmikropipet WHERE id_mikropipet = '$mikropipetid' ORDER BY id_detailpeminjaman DESC";
                                                    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                    while ($row1 = mysqli_fetch_array($result1)) {

                                                        $proyekno = $row1['no_proyek'];

                                                        $query2 = "SELECT * FROM peminjamanmikropipet WHERE no_proyek = '$proyekno'";
                                                        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                                        $row2 = mysqli_fetch_assoc($result2);

                                                        $sno++;
                                                    ?>
                                                        <tr>
                                                            <!-- <td><?= date_format(date_create($row2['tgl_peminjaman']), 'd F Y'); ?></td> -->
                                                            <td><?= $row2['tgl_peminjaman']; ?></td>
                                                            <td><?= $row2['no_proyek']; ?></td>
                                                            <td><?= $row2['nama_peminjam']; ?></td>
                                                            <td><?= $row2['nama_pelanggan']; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-content -->
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
            document.title = 'Detail Alat | ' + '<?= $row0['no_seri']; ?>';
            cekDark();
        });

        function proyek_info(uid) {
            let link = 'proyek_detail?uid=' + uid;
            window.open(link, '_self');
        }
    </script>

</body>

</html>