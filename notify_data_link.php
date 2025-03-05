<?php require_once('session.php'); 
    if ($username) {
        $query_session = "SELECT * FROM user WHERE username = '$username'";
        $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
        $row_session = mysqli_fetch_assoc($result_session);
        $userlog = $row_session['id_user'];
    }
?>

<!-- <table class="datatable-init-export_noaction1desc wrap table" data-export-title="Export"> -->
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
        <?php if($row['hal_notif'] == 'proyek') {
                                                            $halid = $row['idhal_notif'];
                                                            $query_hal = "SELECT * FROM proyek WHERE id_proyek='$halid'";
                                                            $result_hal = mysqli_query($conn, $query_hal) or die(mysql_error());
                                                            $row_hal = mysqli_num_rows($result_hal);
                                                            // $rows_hal = mysqli_fetch_assoc($result_hal);
                                                            
                                                            if ($row_hal == 0) {
                                                                if ($row_baca == 0) { ?>
        <td>
            <span class="text-danger">
                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . $row['hal_notif'] . ' ' . $row['namahal_notif']; ?>
            </span>
        </td>
        <?php } else { ?>
        <td>
            <span onclick="baca(<?=$row['id_notif'];?>)" class="text-blue">
                <strong>
                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . $row['hal_notif'] . ' ' . $row['namahal_notif']; ?>
                </strong>
            </span>
        </td>
        <?php } 
                                                            } else {
                                                                if ($row_baca == 0) { ?>
        <td>
            <span onclick="proyek_info(<?=$row['idhal_notif'];?>)">
                <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . $row['hal_notif'] . ' ' . $row['namahal_notif']; ?>
            </span>
        </td>
        <?php } else { ?>
        <td>
            <span onclick="proyek_info_baca('<?=$row['idhal_notif'];?>', '<?=$row['id_notif'];?>')" class="text-blue">
                <strong>
                    <?= $row_user['nama_user'] . ' ' . $row['ket_notif'] . ' ' . $row['hal_notif'] . ' ' . $row['namahal_notif']; ?>
                </strong>
            </span>
        </td>
        <?php } 
                                                                }
                                                        } ?>
    </tr>
    <?php } ?>
</tbody>
<!-- </table> -->