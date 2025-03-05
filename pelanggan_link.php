<?php 

header("Access-Control-Allow-Origin: *");
require_once('connect.php');

if (isset($_REQUEST['uid'])) {
    $namapel = $_REQUEST['uid'];

    $query_pel = "SELECT * FROM pelanggan WHERE nama_pelanggan = '$namapel'";
    $result_pel = mysqli_query($conn, $query_pel) or die(mysqli_error($conn));
    $row_pel = mysqli_fetch_assoc($result_pel);
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
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3>Data Sertifikat</h3>
                                        </div>
                                        <!-- <div class="nk-block-head-content">
                                        </div> -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                            </div>
                        </div>


                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <!-- <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                    </div>
                                </div> -->
                                <div class="nk-block nk-block-lg">
                                    <div class="col-md-12 col-lg-12 col-xxl-12">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <table class="datatable-init-export_action1desc wrap table"
                                                        data-export-title="Export">
                                                        <thead>
                                                            <tr>
                                                                <th>PDF</th>
                                                                <!-- <th>No.Proyek</th> -->
                                                                <!-- <th>No.Pesanan</th> -->
                                                                <th>Tahun</th>
                                                                <th>Ruangan</th>
                                                                <th>Progress</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sno = 0;
                                                            $query = "SELECT * FROM sertifikat ORDER BY id_sertifikat DESC";
                                                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                            while ($row = mysqli_fetch_array($result)) {

                                                                $id_proyek = $row['id_proyek'];
                                                                $query2 = "SELECT * FROM proyek WHERE id_proyek = '$id_proyek'";
                                                                $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                                                $row2 = mysqli_fetch_assoc($result2);

                                                                $id_pelanggan = $row2['id_pelanggan'];
                                                                $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
                                                                $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                                $row1 = mysqli_fetch_assoc($result1);

                                                                $sno++;
                                                                if ($row1['id_pelanggan'] == $row_pel['id_pelanggan']) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php if ($row['progress_sertifikat'] != 'Belum Diarsip') { ?>
                                                                    <a href="<?= $row['link_sertifikat']; ?>"
                                                                        target="_blank" class="toogle"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="PDF">
                                                                        <em class="icon ni ni-download"></em>
                                                                    </a>
                                                                    <?php } else { ?>
                                                                    <a href="#" class="toogle" data-toggle="tooltip"
                                                                        data-placement="top" title="NA"><em
                                                                            class="icon ni ni-na"></em></a>
                                                                    <?php } ?>
                                                                </td>

                                                                <!-- <td><?= $row2['no_proyek']; ?></td> -->
                                                                <!-- <td><?= $row['nopesanan_sertifikat']; ?></td> -->
                                                                <td><?= substr($row2['no_proyek'], 7, 4); ?></td>
                                                                <td><?= $row['ruangan_sertifikat']; ?></td>
                                                                <td><?= $row['progress_sertifikat']; ?></td>
                                                            </tr>
                                                            <?php
                                                            } }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div><!-- .card-inner -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div>
                                </div> <!-- nk-block -->
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
        document.title = 'Sertifikat';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });


    });
    </script>

</body>

</html>