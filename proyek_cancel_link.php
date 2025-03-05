<?php require_once('session.php'); 
    if ($username) {
        $query_session = "SELECT * FROM user WHERE username = '$username'";
        $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
        $row_session = mysqli_fetch_assoc($result_session);
    }

if (isset($_REQUEST['uid'])) {
    $proyekid = $_REQUEST['uid'];

    $query0 = "SELECT * FROM proyek WHERE id_proyek = '$proyekid'";
    $result0 = mysqli_query($conn, $query0) or die(mysqli_error($conn));
    $row0 = mysqli_fetch_assoc($result0);

    if ($row0['status_proyek'] == 10) {
        
        // cek isi data permintaan/order
        $query_jml_po = "SELECT id_proyek FROM permintaan_order WHERE id_proyek='$proyekid'";
        $result_jml_po = mysqli_query($conn, $query_jml_po) or die(mysqli_error($conn));
        $row_jml_po = mysqli_num_rows($result_jml_po);

        // cek isi data kajiulang permintaan
        $query_jml_kj = "SELECT id_proyek FROM kajiulang WHERE id_proyek='$proyekid'";
        $result_jml_kj = mysqli_query($conn, $query_jml_kj) or die(mysqli_error($conn));
        $row_jml_kj = mysqli_num_rows($result_jml_kj);

        // cek isi data penawaran harga
        $query_jml_ph = "SELECT id_proyek FROM penawaranharga WHERE id_proyek='$proyekid'";
        $result_jml_ph = mysqli_query($conn, $query_jml_ph) or die(mysqli_error($conn));
        $row_jml_ph = mysqli_num_rows($result_jml_ph);

        if ($row_jml_po != 0) {
            $query_order = "SELECT * FROM permintaan_order WHERE id_proyek = '$proyekid'";
            $result_order = mysqli_query($conn, $query_order) or die(mysqli_error($conn));
            $row_order = mysqli_fetch_assoc($result_order);
        }
        if ($row_jml_kj != 0) {
            $query_kajiulang = "SELECT MAX(lastupdate_kajiulang) AS lastupdate_kajiulang FROM kajiulang WHERE id_proyek =  '$proyekid'";
            $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
            $row_kajiulang = mysqli_fetch_assoc($result_kajiulang);
        }
        if ($row_jml_ph != 0) {
            $query_penawaranharga = "SELECT * FROM penawaranharga WHERE id_proyek='$proyekid'";
            $result_penawaranharga = mysqli_query($conn, $query_penawaranharga) or die(mysqli_error($conn));
            $row_penawaranharga = mysqli_fetch_assoc($result_penawaranharga);
            }
        
    } else header("location:home");
} else header("location:home");
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
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3>Rekaman Teknis Proyek</h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="proyek"
                                                class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                                    class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="proyek"
                                                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                                    class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <table class="table table-hover nowrap">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Rekaman</th>
                                                    <th>Tgl Update</th>
                                                    <th>Link Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>Spesimen Pelanggan</td>
                                                    <td><strong>-</strong></td>
                                                    <td>
                                                        <a href="#" onclick="proyek_pdf(<?= $proyekid; ?>)"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php if ($row_jml_po != 0) { ?>
                                                <tr>
                                                    <td>2.</td>
                                                    <td>Permintaan/Order</td>
                                                    <td><?= date_format(date_create($row_order['lastupdate_permintaan_order']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_order['link_permintaan_order']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } if ($row_jml_kj != 0) { ?>
                                                <tr>
                                                    <td>3.</td>
                                                    <td>Kaji Ulang Permintaan</td>
                                                    <td><?= date_format(date_create($row_kajiulang['lastupdate_kajiulang']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" onclick="kajiulang_pdf(<?= $proyekid; ?>)"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } if ($row_jml_ph != 0) { ?>
                                                <tr>
                                                    <td>4.</td>
                                                    <td>Penawaran Harga</td>
                                                    <td><?= date_format(date_create($row_penawaranharga['lastupdate_penawaranharga']), 'd F Y'); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= $row_penawaranharga['link_penawaranharga']; ?>"
                                                            target="_blank"
                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                            <span>Lihat PDF</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div><!-- .card -->
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
    <!-- app-root @e -->
    <?php include "./scripts.html" ?>
    <!-- JavaScript -->
    <script>
    $(document).ready(function(e) {
        cekDark();
    });

    function proyek_pdf(uid) {
        let link = 'proyek_pdf?uid=' + uid;
        window.open(link, '_blank');
    }

    function kajiulang_pdf(uid) {
        let link = 'kajiulang_pdf?uid=' + uid;
        window.open(link, '_blank');
    }
    </script>

</body>

</html>