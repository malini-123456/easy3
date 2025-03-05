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

<body class="nk-body bg-lighter npc-default has-sidebar">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main">
            <!-- sidebar @s -->
            <?php include "./aside.php" ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap">
                <!-- main header @s -->
                <?php include "./header.php" ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Survey Kepuasan Pelanggan</h3>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                            </div>
                        </div>
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block nk-block-lg">
                                    <div class="col-md-12 col-lg-12 col-xxl-12">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div id="DataTables_Table_0_wrapper"
                                                    class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                    <div>
                                                        <table class="datatable-init-export_action1desc wrap table"
                                                            data-export-title="Export">
                                                            <thead>
                                                                <tr role="row">
                                                                    <!-- <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Action</th> -->
                                                                    <th>Nama Pelanggan</th>
                                                                    <th>Kritik dan Saran</th>
                                                                    <th>Skor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sno = 0;
                                                                $query = "SELECT * FROM kepuasan INNER JOIN pelanggan ON kepuasan.id_pelanggan = pelanggan.id_pelanggan
                                            ORDER BY kepuasan.id_kepuasan ASC";
                                                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $sno++;
                                                                    $score = ($row['soal1_kepuasan'] + $row['soal3_kepuasan'] + $row['soal4_kepuasan'] + $row['soal5_kepuasan'] + $row['soal6_kepuasan'] + $row['soal7_kepuasan'] + $row['soal8_kepuasan'] + $row['soal9_kepuasan']) / 8;
                                                                ?>
                                                                <tr class="odd">

                                                                    <td><?= $row['nama_pelanggan']; ?></td>
                                                                    <td><?= $row['soal10_kepuasan']; ?></td>
                                                                    <td width='75px' class="review-stars">
                                                                        <ul class="review-stars d-flex">
                                                                            <li><em
                                                                                    class="icon ni ni-star-fill text-warning"></em>
                                                                            </li>
                                                                            <li><em
                                                                                    class="icon ni ni-star-fill text-warning"></em>
                                                                            </li>
                                                                            <li><em
                                                                                    class="icon ni ni-star-fill text-warning"></em>
                                                                            </li>
                                                                            <li><em
                                                                                    class="icon ni ni-star-fill text-warning"></em>
                                                                            </li>
                                                                            <li><em
                                                                                    class="icon ni ni-star-half-fill text-warning"></em>
                                                                            </li>
                                                                        </ul>
                                                                        <?= number_format($score, 1) . ' / 4'; ?>
                                                                    </td>
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

    <?php include "./scripts.html" ?>
    <!-- JavaScript -->
    <script>
    $(document).ready(function(e) {
        document.title = 'Survey Kepuasan';
        cekDark();
    });
    </script>
</body>

</html>