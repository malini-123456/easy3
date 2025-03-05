<?php

header("Access-Control-Allow-Origin: *");
require_once('connect.php');

if (isset($_REQUEST['pel'])) {
    $namapel = $_REQUEST['pel'];

    $query_pel = "SELECT * FROM pelanggan WHERE nama_pelanggan = '$namapel'";
    $result_pel = mysqli_query($conn, $query_pel) or die(mysqli_error($conn));
    $row_pel = mysqli_fetch_assoc($result_pel);
    $row_jml_pel = mysqli_num_rows($result_pel);

    if ($row_jml_pel < 1) header("location:https://pt-einsten.com");
} else header("location:https://pt-einsten.com");

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
                                            <h4>Data Sertifikat | <?= $namapel ?></h4>
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
                                                    <table class="datatable-init-export_action1desc wrap table" data-export-title="Export">
                                                        <thead>
                                                            <tr>
                                                                <th>PDF</th>
                                                                <!-- <th>No.</th> -->
                                                                <th>Kode Proyek</th>
                                                                <th>Kode Stiker</th>
                                                                <th>No. Sertifikat</th>
                                                                <th>Nama Alat</th>
                                                                <th>Merek</th>
                                                                <th>Tipe</th>
                                                                <th>No.Seri</th>
                                                                <th>Ruangan</th>
                                                                <th>Penguji</th>
                                                                <th>Hasil</th>
                                                                <th>Status</th>
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

                                                                // $id_pelanggan = $row2['id_pelanggan'];
                                                                // $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
                                                                // $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                                // $row1 = mysqli_fetch_assoc($result1);

                                                                $pdfName = 'data/pdf/' . $row['kode_stiker_sertifikat'] . '.pdf';
                                                                $sno++;
                                                                if ($row2['id_pelanggan'] == $row_pel['id_pelanggan']) {
                                                            ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php if (file_exists($pdfName)) { ?>
                                                                                <a href="<?= $pdfName; ?>" target="_blank" class="toogle" data-placement="top" title="PDF">
                                                                                    <em class="icon ni ni-download"></em>
                                                                                </a>
                                                                            <?php } else { ?>
                                                                                <a href="#" class="toogle" data-placement="top" title="NA"><em class="icon ni ni-na"></em></a>
                                                                            <?php } ?>
                                                                        </td>

                                                                        <!-- <td><?= $sno; ?></td> -->
                                                                        <td><?= $row2['no_proyek']; ?></td>
                                                                        <td><?= $row['kode_stiker_sertifikat']; ?></td>
                                                                        <td><?= $row['no_sertifikat']; ?></td>
                                                                        <td><?= $row['nama_alat_sertifikat']; ?></td>
                                                                        <td><?= $row['merek_sertifikat']; ?></td>
                                                                        <td><?= $row['tipe_sertifikat']; ?></td>
                                                                        <td><?= $row['no_seri_sertifikat']; ?></td>
                                                                        <td><?= $row['ruangan_sertifikat']; ?></td>
                                                                        <td><?= $row['penguji_sertifikat']; ?></td>

                                                                        <?php if ($row['kode_stiker_sertifikat'][0] == 'H') { ?>
                                                                            <td><?= 'LAIK'; ?></td>
                                                                        <?php } else { ?>
                                                                            <td><?= 'TIDAK LAIK'; ?></td>
                                                                        <?php } ?>

                                                                        <?php if (file_exists($pdfName)) { ?>
                                                                            <td><?= 'TERBIT'; ?></td>
                                                                        <?php } else { ?>
                                                                            <td><?= 'BELUM TERBIT'; ?></td>
                                                                        <?php } ?>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
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