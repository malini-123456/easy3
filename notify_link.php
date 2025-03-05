<?php require_once('session.php');
if ($username) {
    $query_session = "SELECT * FROM user WHERE username = '$username'";
    $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
    $row_session = mysqli_fetch_assoc($result_session);
    $userlog = $row_session['id_user'];
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
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Daftar Notifikasi</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <button onclick="baca_all()"
                                                class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                                    class="icon ni ni-book-read"></em><span>Tandai Dibaca
                                                    Semua</span></button>
                                            <button onclick="baca_all()"
                                                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                                    class="icon ni ni-book-read"></em></button>
                                        </div>
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init-export_noaction1desc wrap table"
                                                data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Tgl Update</th>
                                                        <th>Notifikasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = "SELECT * FROM notif ORDER BY id_notif DESC";
                                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                    while ($row = mysqli_fetch_array($result)) {

                                                        $userid = $row['iduser_notif'];
                                                        $query_user = "SELECT * FROM user WHERE id_user = '$userid'";
                                                        $result_user = mysqli_query($conn, $query_user) or die(mysqli_error($conn));
                                                        $row_user = mysqli_fetch_assoc($result_user);

                                                        $notifid = $row['id_notif'];
                                                        $query_baca = "SELECT * FROM baca WHERE id_notif='$notifid' AND id_user='$userlog'";
                                                        $result_baca = mysqli_query($conn, $query_baca) or die(mysqli_error($conn));
                                                        $row_baca = mysqli_num_rows($result_baca);

                                                    ?>
                                                    <tr>
                                                        <td><?= $row['lastupdate_notif']; ?></td>

                                                        <?php if (substr($row['hal_notif'], 0, 6) == 'jadwal') {

                                                                $halid = $row['idhal_notif'];
                                                                $query_hal = "SELECT * FROM kegiatan WHERE id_kegiatan='$halid'";
                                                                $result_hal = mysqli_query($conn, $query_hal) or die(mysql_error());
                                                                $row_hal = mysqli_num_rows($result_hal);

                                                                if ($row_hal == 0) {
                                                                    if ($row_baca == 0) { ?>
                                                        <td>
                                                            <span class="text-muted">
                                                                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                            </span>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <span onclick="baca(<?= $row['id_notif']; ?>)"
                                                                class="fw-bold ff-italic text-dark">
                                                                <strong>
                                                                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                        <?php }
                                                                } else {
                                                                    if ($row_baca == 0) { ?>
                                                        <td>
                                                            <span onclick="kegiatan()">
                                                                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                            </span>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <span onclick="kegiatan_baca(<?= $row['id_notif']; ?>)"
                                                                class="fw-bold ff-italic text-dark">
                                                                <strong>
                                                                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                        <?php }
                                                                }
                                                            } else if ($row['hal_notif'] == 'riwayat') {

                                                                $halid = $row['idhal_notif'];
                                                                $query_hal = "SELECT * FROM alatkalibrasi WHERE id_alat='$halid'";
                                                                $result_hal = mysqli_query($conn, $query_hal) or die(mysql_error());
                                                                $row_hal = mysqli_num_rows($result_hal);
                                                                $rows_hal = mysqli_fetch_assoc($result_hal);

                                                                if ($row_hal == 0) {
                                                                    if ($row_baca == 0) { ?>
                                                        <td>
                                                            <span class="text-muted">
                                                                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                            </span>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <span onclick="baca(<?= $row['id_notif']; ?>)"
                                                                class="fw-bold ff-italic text-dark">
                                                                <strong>
                                                                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                        <?php }
                                                                } else {
                                                                    if ($row_baca == 0) { ?>
                                                        <td>
                                                            <span onclick="alat(<?= $rows_hal['id_alat']; ?>)">
                                                                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                            </span>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <span
                                                                onclick="alat_baca('<?= $rows_hal['id_alat']; ?>', '<?= $row['id_notif']; ?>')"
                                                                class="fw-bold ff-italic text-dark">
                                                                <strong>
                                                                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                        <?php }
                                                                }
                                                            } else if ($row['hal_notif'] == 'peminjaman') {

                                                                $halid = $row['idhal_notif'];
                                                                $query_hal = "SELECT * FROM peminjamanmikropipet WHERE id_peminjaman='$halid'";
                                                                $result_hal = mysqli_query($conn, $query_hal) or die(mysql_error());
                                                                $row_hal = mysqli_num_rows($result_hal);
                                                                $rows_hal = mysqli_fetch_assoc($result_hal);

                                                                if ($row_hal == 0) {
                                                                    if ($row_baca == 0) { ?>
                                                        <td>
                                                            <span class="text-muted">
                                                                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                            </span>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <span onclick="baca(<?= $row['id_notif']; ?>)"
                                                                class="fw-bold ff-italic text-dark">
                                                                <strong>
                                                                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                        <?php }
                                                                } else {
                                                                    if ($row_baca == 0) { ?>
                                                        <td>
                                                            <span
                                                                onclick="detailpeminjaman(<?= $rows_hal['no_so']; ?>)">
                                                                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                            </span>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <span
                                                                onclick="detailpeminjaman_baca('<?= $rows_hal['no_so']; ?>', '<?= $row['id_notif']; ?>')"
                                                                class="fw-bold ff-italic text-dark">
                                                                <strong>
                                                                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                        <?php }
                                                                }
                                                            } else { ?>
                                                        <?php
                                                                // if($row['hal_notif'] == 'proyek') {
                                                                $halid = $row['idhal_notif'];
                                                                $query_hal = "SELECT * FROM proyek WHERE id_proyek='$halid'";
                                                                $result_hal = mysqli_query($conn, $query_hal) or die(mysql_error());
                                                                $row_hal = mysqli_num_rows($result_hal);
                                                                $rows_hal = mysqli_fetch_assoc($result_hal);

                                                                if ($row_hal == 0) {
                                                                    if ($row_baca == 0) { ?>
                                                        <td>
                                                            <span class="text-muted">
                                                                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                            </span>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <span onclick="baca(<?= $row['id_notif']; ?>)"
                                                                class="fw-bold ff-italic text-dark">
                                                                <strong>
                                                                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                        <?php }
                                                                } else {
                                                                    if ($row_baca == 0) { ?>

                                                        <?php if ($rows_hal['status_proyek'] == 9) { ?>
                                                        <td>
                                                            <span onclick="proyek_finish(<?= $row['idhal_notif']; ?>)">
                                                                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                            </span>
                                                        </td>
                                                        <?php } else if ($rows_hal['status_proyek'] == 10) { ?>
                                                        <td>
                                                            <span onclick="proyek_cancel(<?= $row['idhal_notif']; ?>)">
                                                                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                            </span>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <span onclick="proyek_info(<?= $row['idhal_notif']; ?>)">
                                                                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                            </span>
                                                        </td>
                                                        <?php } ?>

                                                        <?php } else { ?>

                                                        <?php if ($rows_hal['status_proyek'] == 9) { ?>
                                                        <td>
                                                            <span
                                                                onclick="proyek_finish_baca('<?= $row['idhal_notif']; ?>', '<?= $row['id_notif']; ?>')"
                                                                class="fw-bold ff-italic text-dark">
                                                                <strong>
                                                                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                        <?php } else if ($rows_hal['status_proyek'] == 10) { ?>
                                                        <td>
                                                            <span
                                                                onclick="proyek_cancel_baca('<?= $row['idhal_notif']; ?>', '<?= $row['id_notif']; ?>')"
                                                                class="fw-bold ff-italic text-dark">
                                                                <strong>
                                                                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                        <?php } else { ?>
                                                        <td>
                                                            <span
                                                                onclick="proyek_info_baca('<?= $row['idhal_notif']; ?>', '<?= $row['id_notif']; ?>')"
                                                                class="fw-bold ff-italic text-dark">
                                                                <strong>
                                                                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . ucwords($row['hal_notif']) . ' ' . $row['namahal_notif']; ?>
                                                                </strong>
                                                            </span>
                                                        </td>
                                                        <?php } ?>

                                                        <?php }
                                                                }
                                                                // } 
                                                                ?>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
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
    // $('#tes').load();

    $(document).ready(function(e) {
        document.title = 'Daftar Notifikasi';
        cekDark();

        setTimeout(function() {
            setInterval(function() {
                location.reload();
            }, 60000);
        }, 60000);
        // setInterval($('#tes').ajax.reload(null, false), 2000);
        // var tabel = $('#tes').DataTable();
        // setInterval(function() {
        //     tabel.fnReloadAjax();
        //     tabel.ajax.reload();
        // }, 1000);
    });


    function alat_info(uid) {
        let link = 'alat_detail?uid=' + uid;
        window.open(link, '_self');
    }

    function proyek_finish(uid) {
        let link = 'proyek_finish?uid=' + uid;
        window.open(link, '_self');
    }

    function proyek_cancel(uid) {
        let link = 'proyek_cancel?uid=' + uid;
        window.open(link, '_self');
    }

    function proyek_info(uid) {
        let link = 'proyek_detail?uid=' + uid;
        window.open(link, '_self');
    }

    function proyek_finish_baca(uid, notifid) {
        let link = 'proyek_finish?uid=' + uid;
        $.post('save_details.php', {
            form_name: "del_baca",
            tbl_id: notifid
        }, function(data, status) {
            setTimeout(function() {
                window.open(link, '_self');
            }, 1000);
        });
    }

    function proyek_cancel_baca(uid, notifid) {
        let link = 'proyek_cancel?uid=' + uid;
        $.post('save_details.php', {
            form_name: "del_baca",
            tbl_id: notifid
        }, function(data, status) {
            setTimeout(function() {
                window.open(link, '_self');
            }, 1000);
        });
    }

    function proyek_info_baca(uid, notifid) {
        let link = 'proyek_detail?uid=' + uid;
        $.post('save_details.php', {
            form_name: "del_baca",
            tbl_id: notifid
        }, function(data, status) {
            setTimeout(function() {
                window.open(link, '_self');
            }, 1000);
        });
    }

    function kegiatan() {
        window.open('event', '_self');
    }

    function kegiatan_baca(notifid) {
        $.post('save_details.php', {
            form_name: "del_baca",
            tbl_id: notifid
        }, function(data, status) {
            setTimeout(function() {
                window.open('event', '_self');
            }, 1000);
        });
    }

    function alat(uid) {
        let link = 'alat_detail?uid=' + uid;
        window.open(link, '_self');
    }

    function alat_baca(uid, notifid) {
        let link = 'alat_detail?uid=' + uid;
        $.post('save_details.php', {
            form_name: "del_baca",
            tbl_id: notifid
        }, function(data, status) {
            setTimeout(function() {
                window.open(link, '_self');
            }, 1000);
        });
    }

    function detailpeminjaman(uid) {
        let link = 'peminjaman_detail?uid=' + uid;
        window.open(link, '_self');
    }

    function detailpeminjaman_baca(uid, notifid) {
        let link = 'peminjaman_detail?uid=' + uid;
        $.post('save_details.php', {
            form_name: "del_baca",
            tbl_id: notifid
        }, function(data, status) {
            setTimeout(function() {
                window.open(link, '_self');
            }, 1000);
        });
    }

    function baca(notifid) {
        $.post('save_details.php', {
            form_name: "del_baca",
            tbl_id: notifid
        }, function(data, status) {
            setTimeout(function() {
                location.reload();
            }, 1000);
        });
    }

    function baca_all() {
        $.post('save_details.php', {
            form_name: "del_allbaca",
        }, function(data, status) {
            setTimeout(function() {
                location.reload();
            }, 1000);
        });
    }
    </script>

</body>

</html>