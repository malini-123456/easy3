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
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Data Proyek</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing') || ($row_session['posisi_user'] == 'Admin Umum')) { ?>
                                            <a href="#" data-target="addProyek"
                                                class="toggle btn btn-primary btn-reset"><em
                                                    class="icon ni ni-plus"></em><span>Add Proyek</span></a>
                                            <?php } ?>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner border-bottom">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title text-muted">List Proyek Progress
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner">
                                            <table class="datatable-init-export_action1asc wrap table fs-12px"
                                                data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>No</th>
                                                        <th>No Proyek</th>
                                                        <th>Nama Pelanggan</th>
                                                        <th>Sumber Dana</th>
                                                        <th>Pagu (Rp)</th>
                                                        <th>Deadline</th>
                                                        <th>Marketing</th>
                                                        <th>Status Awal</th>
                                                        <th>Status Sertifikat</th>
                                                        <th>Status Penagihan</th>
                                                        <th>Status Subkontrak</th>
                                                        <!-- <th>Tgl Dibuat</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sno = 0;
                                                    $query = "SELECT * FROM proyek WHERE status_proyek != 9 AND status_proyek != 10 ORDER BY id_proyek DESC";
                                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                    while ($row = mysqli_fetch_array($result)) {

                                                        $id_status = $row['status_proyek'];
                                                        $query1 = "SELECT * FROM status_proyek WHERE id_status = '$id_status'";
                                                        $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                        $row1 = mysqli_fetch_assoc($result1);

                                                        $id_pelanggan = $row['id_pelanggan'];
                                                        $query2 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
                                                        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                                        $row2 = mysqli_fetch_assoc($result2);

                                                        $id_status1 = $row['status1_proyek'];
                                                        $query3 = "SELECT * FROM status1_proyek WHERE id_status1 = '$id_status1'";
                                                        $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
                                                        $row3 = mysqli_fetch_assoc($result3);

                                                        $id_status2 = $row['status2_proyek'];
                                                        $query4 = "SELECT * FROM status2_proyek WHERE id_status2 = '$id_status2'";
                                                        $result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
                                                        $row4 = mysqli_fetch_assoc($result4);

                                                        $id_status3 = $row['status3_proyek'];
                                                        $query5 = "SELECT * FROM status3_proyek WHERE id_status3 = '$id_status3'";
                                                        $result5 = mysqli_query($conn, $query5) or die(mysqli_error($conn));
                                                        $row5 = mysqli_fetch_assoc($result5);

                                                        $timezone = time() + (60 * 60 * 8);
                                                        $timezone7Min = time() + (60 * 60 * 8) - (7 * 24 * 3600);
                                                        $dateNow = gmdate('Y-m-d', $timezone);
                                                        $date7Min = gmdate('Y-m-d', $timezone7Min);

                                                        $sno++;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php if ($row['status_proyek'] == 9) { ?>
                                                            <a href="#"
                                                                onclick="proyek_finish(<?= $row['id_proyek']; ?>)"
                                                                class="btn btn-icon btn-round btn-xs btn-dim btn-outline-success">
                                                                <em class="icon ni ni-eye"></em>
                                                            </a>
                                                            <?php } else if ($row['status_proyek'] == 10) { ?>
                                                            <a href="#"
                                                                onclick="proyek_cancel(<?= $row['id_proyek']; ?>)"
                                                                class="btn btn-icon btn-round btn-xs btn-dim btn-outline-danger">
                                                                <em class="icon ni ni-eye"></em>
                                                            </a>
                                                            <?php } else if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing') || ($row_session['posisi_user'] == 'Admin Umum')) { ?>
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger btn-xs"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-left">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"
                                                                            onclick="proyek_info(<?= $row['id_proyek']; ?>)"
                                                                            class="toggle"><em
                                                                                class="icon ni ni-info-fill"></em><span>Detail
                                                                                Proyek</span></a></li>
                                                                    <li><a href="#" id="<?= $row['id_proyek']; ?>"
                                                                            data-target="addProyek" data-dismiss="modal"
                                                                            class="toggle btn-edit"><em
                                                                                class="icon ni ni-edit-fill"></em><span>Edit
                                                                                Proyek</span></a></li>
                                                                    <?php if ($row['status_proyek'] < 4) { ?>
                                                                    <li><a href="#" id="<?= $row['id_proyek']; ?>"
                                                                            class="toggle btn-delete"><em
                                                                                class="icon ni ni-trash-fill"></em><span>Delete
                                                                                Proyek</span></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                            <?php } else { ?>
                                                            <a href="#" onclick="proyek_info(<?= $row['id_proyek']; ?>)"
                                                                class="btn btn-icon btn-round btn-xs btn-dim btn-outline-warning">
                                                                <em class="icon ni ni-info"></em>
                                                            </a>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?= $sno . '.'; ?></td>
                                                        <td>
                                                            <div class="user-card">
                                                                <div class="user-avatar bg-white">
                                                                    <?php if ($row2['logo_pelanggan'] != '') {
                                                                            ?>
                                                                    <img width="40px" height="40px"
                                                                        src="<?=$row2['logo_pelanggan'];?>">
                                                                    <?php } else { ?>
                                                                    <div class="user-avatar bg-info-dim">
                                                                        <span>LOGO</span>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="user-info">
                                                                    <?php if ($row['status_proyek'] == 9) { ?>
                                                                    <a href="#"
                                                                        onclick="proyek_finish(<?= $row['id_proyek']; ?>)">
                                                                        <span
                                                                            class="text-primary text-capitalize"><?= $row['no_proyek']; ?></span>
                                                                    </a>
                                                                    <?php } else if ($row['status_proyek'] == 10) { ?>
                                                                    <a href="#"
                                                                        onclick="proyek_cancel(<?= $row['id_proyek']; ?>)">
                                                                        <span
                                                                            class="text-primary text-capitalize"><?= $row['no_proyek']; ?></span>
                                                                    </a>
                                                                    <?php } else { ?>
                                                                    <a href="#"
                                                                        onclick="proyek_info(<?= $row['id_proyek']; ?>)">
                                                                        <span
                                                                            class="text-primary text-capitalize"><?= $row['no_proyek']; ?></span>
                                                                    </a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- <td><?= $row['no_proyek']; ?></td> -->
                                                        <td><?= $row2['nama_pelanggan']; ?></td>
                                                        <td><?= $row['sumberdana_proyek']; ?></td>
                                                        <td><?= number_format($row['pagu_proyek'], 0); ?></td>
                                                        <td>
                                                            <?php
                                                                if (($row['status_proyek'] == 9) || ($row['status_proyek'] == 10)) {
                                                                    echo $row['deadline_proyek'];
                                                                } else {
                                                                    if ($date7Min > $row['deadline_proyek']) { ?>
                                                            <span class="text-danger">
                                                                <?= $row['deadline_proyek']; ?>
                                                            </span>
                                                            <?php
                                                                    } else if ($dateNow > $row['deadline_proyek']) { ?>
                                                            <span class="text-warning">
                                                                <?= $row['deadline_proyek']; ?>
                                                            </span>
                                                            <?php
                                                                    } else {
                                                                        echo $row['deadline_proyek'];
                                                                    }
                                                                } ?>
                                                        </td>
                                                        <td><?= $row['marketing_proyek']; ?></td>
                                                        <td>
                                                            <?php if ($row['status_proyek'] == 9) { ?>
                                                            <span class="text-success">
                                                                <?= $row1['nama_status']; ?>
                                                            </span>
                                                            <?php } else if ($row['status_proyek'] == 10) { ?>
                                                            <span class="text-danger">
                                                                <?= $row1['nama_status']; ?>
                                                            </span>
                                                            <?php } else { ?>
                                                            <span class="text-warning">
                                                                <?php if ( ($row['status_proyek'] == 8) && ( ($row['status1_proyek'] != 5) || ($row['status2_proyek'] != 6) || ($row['status3_proyek'] != 7) ) ) {
                                                                    echo 'SELESAI';
                                                                } else {
                                                                ?>
                                                                <?php
                                                                    echo $row1['nama_status']; 
                                                                }
                                                                ?>
                                                            </span>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <span class="text-primary">
                                                                <?= $row3['nama_status1']; ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-primary">
                                                                <?= $row4['nama_status2']; ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="text-primary">
                                                                <?= $row5['nama_status3']; ?>
                                                            </span>
                                                        </td>
                                                        <!-- <td><?= $row['lastupdate_proyek']; ?></td> -->
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div> <!-- nk-block -->


                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner border-bottom">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title text-muted">List Proyek Selesai
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner">
                                            <table class="datatable-init-export_action1asc nowrap table fs-12px"
                                                data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>No</th>
                                                        <th>No Proyek</th>
                                                        <th>Nama Pelanggan</th>
                                                        <th>Sumber Dana</th>
                                                        <th>Pagu (Rp)</th>
                                                        <th>Deadline</th>
                                                        <th>Marketing</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sno = 0;
                                                    $query = "SELECT * FROM proyek WHERE status_proyek = 9 || status_proyek = 10 ORDER BY id_proyek DESC";
                                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                    while ($row = mysqli_fetch_array($result)) {

                                                        $id_status = $row['status_proyek'];
                                                        $query1 = "SELECT * FROM status_proyek WHERE id_status = '$id_status'";
                                                        $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                        $row1 = mysqli_fetch_assoc($result1);

                                                        $id_pelanggan = $row['id_pelanggan'];
                                                        $query2 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
                                                        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                                        $row2 = mysqli_fetch_assoc($result2);

                                                        $id_status1 = $row['status1_proyek'];
                                                        $query3 = "SELECT * FROM status1_proyek WHERE id_status1 = '$id_status1'";
                                                        $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
                                                        $row3 = mysqli_fetch_assoc($result3);

                                                        $id_status2 = $row['status2_proyek'];
                                                        $query4 = "SELECT * FROM status2_proyek WHERE id_status2 = '$id_status2'";
                                                        $result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
                                                        $row4 = mysqli_fetch_assoc($result4);

                                                        $id_status3 = $row['status3_proyek'];
                                                        $query5 = "SELECT * FROM status3_proyek WHERE id_status3 = '$id_status3'";
                                                        $result5 = mysqli_query($conn, $query5) or die(mysqli_error($conn));
                                                        $row5 = mysqli_fetch_assoc($result5);

                                                        $timezone = time() + (60 * 60 * 8);
                                                        $timezone7Min = time() + (60 * 60 * 8) - (7 * 24 * 3600);
                                                        $dateNow = gmdate('Y-m-d', $timezone);
                                                        $date7Min = gmdate('Y-m-d', $timezone7Min);

                                                        $sno++;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php if ($row['status_proyek'] == 9) { ?>
                                                            <a href="#"
                                                                onclick="proyek_finish(<?= $row['id_proyek']; ?>)"
                                                                class="btn btn-icon btn-round btn-xs btn-dim btn-outline-success">
                                                                <em class="icon ni ni-eye"></em>
                                                            </a>
                                                            <?php } else if ($row['status_proyek'] == 10) { ?>
                                                            <a href="#"
                                                                onclick="proyek_cancel(<?= $row['id_proyek']; ?>)"
                                                                class="btn btn-icon btn-round btn-xs btn-dim btn-outline-danger">
                                                                <em class="icon ni ni-eye"></em>
                                                            </a>
                                                            <?php } else if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing') || ($row_session['posisi_user'] == 'Admin Umum')) { ?>
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger btn-xs"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-left">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"
                                                                            onclick="proyek_info(<?= $row['id_proyek']; ?>)"
                                                                            class="toggle"><em
                                                                                class="icon ni ni-info-fill"></em><span>Detail
                                                                                Proyek</span></a></li>
                                                                    <li><a href="#" id="<?= $row['id_proyek']; ?>"
                                                                            data-target="addProyek" data-dismiss="modal"
                                                                            class="toggle btn-edit"><em
                                                                                class="icon ni ni-edit-fill"></em><span>Edit
                                                                                Proyek</span></a></li>
                                                                    <?php if ($row['status_proyek'] < 4) { ?>
                                                                    <li><a href="#" id="<?= $row['id_proyek']; ?>"
                                                                            class="toggle btn-delete"><em
                                                                                class="icon ni ni-trash-fill"></em><span>Delete
                                                                                Proyek</span></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                            <?php } else { ?>
                                                            <a href="#" onclick="proyek_info(<?= $row['id_proyek']; ?>)"
                                                                class="btn btn-icon btn-round btn-xs btn-dim btn-outline-warning">
                                                                <em class="icon ni ni-info"></em>
                                                            </a>
                                                            <?php } ?>
                                                        </td>
                                                        <td><?= $sno . '.'; ?></td>
                                                        <td>
                                                            <div class="user-card">
                                                                <div class="user-avatar bg-white">
                                                                    <?php if ($row2['logo_pelanggan'] != '') {
                                                                            ?>
                                                                    <img width="40px" height="40px"
                                                                        src="<?=$row2['logo_pelanggan'];?>">
                                                                    <?php } else { ?>
                                                                    <div class="user-avatar bg-info-dim">
                                                                        <span>LOGO</span>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="user-info">
                                                                    <?php if ($row['status_proyek'] == 9) { ?>
                                                                    <a href="#"
                                                                        onclick="proyek_finish(<?= $row['id_proyek']; ?>)">
                                                                        <span
                                                                            class="text-primary text-capitalize"><?= $row['no_proyek']; ?></span>
                                                                    </a>
                                                                    <?php } else if ($row['status_proyek'] == 10) { ?>
                                                                    <a href="#"
                                                                        onclick="proyek_cancel(<?= $row['id_proyek']; ?>)">
                                                                        <span
                                                                            class="text-primary text-capitalize"><?= $row['no_proyek']; ?></span>
                                                                    </a>
                                                                    <?php } else { ?>
                                                                    <a href="#"
                                                                        onclick="proyek_info(<?= $row['id_proyek']; ?>)">
                                                                        <span
                                                                            class="text-primary text-capitalize"><?= $row['no_proyek']; ?></span>
                                                                    </a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!-- <td><?= $row['no_proyek']; ?></td> -->
                                                        <td><?= $row2['nama_pelanggan']; ?></td>
                                                        <!-- <td><?= $row['kategori_proyek']; ?></td> -->
                                                        <td><?= $row['sumberdana_proyek']; ?></td>
                                                        <td class="">
                                                            <?= number_format($row['pagu_proyek'], 0); ?></td>
                                                        <td>
                                                            <?php
                                                                if (($row['status_proyek'] == 9) || ($row['status_proyek'] == 10)) {
                                                                    echo $row['deadline_proyek'];
                                                                } else {
                                                                    if ($date7Min > $row['deadline_proyek']) { ?>
                                                            <span class="text-danger">
                                                                <?= $row['deadline_proyek']; ?>
                                                            </span>
                                                            <?php
                                                                    } else if ($dateNow > $row['deadline_proyek']) { ?>
                                                            <span class="text-warning">
                                                                <?= $row['deadline_proyek']; ?>
                                                            </span>
                                                            <?php
                                                                    } else {
                                                                        echo $row['deadline_proyek'];
                                                                    }
                                                                } ?>
                                                        </td>
                                                        <td><?= $row['marketing_proyek']; ?></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div> <!-- nk-block -->


                                <!-- add  -->
                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProyek"
                                    data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true"
                                    data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Proyek Baru</h5>
                                            <div class="nk-block-des productDes">
                                                <p>Tambahkan informasi proyek baru.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                            novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name" value="add_proyek" />
                                            <input type="hidden" id="id_proyek" name="id_proyek" value="0" />
                                            <input type="hidden" id="nama_pelanggan" name="nama_pelanggan" value="0" />

                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="no_proyek">Nomor proyek</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="no_proyek"
                                                                name="no_proyek" placeholder="No proyek" readonly />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="id_pelanggan">Pilih
                                                            Pelanggan</label>
                                                        <div class="form-control-wrap ">
                                                            <select class="form-control form-control-lg form-select"
                                                                data-search="on" id="id_pelanggan" name="id_pelanggan"
                                                                required data-msg="Mohon pilih pelanggan">
                                                                <?php                                                        
                                                                    require_once('connect.php');
                                                                    $sql = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama_pelanggan ASC");
                                                                    echo "<option value=''>-- Pelanggan --</option>";
                                                                    while ($row = $sql->fetch_assoc()) {
                                                                        echo "<option value=" . $row['id_pelanggan'] . ">" . $row['nama_pelanggan'] . "</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="id_pelanggan">Pilih
                                                            Pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="id_pelanggan"
                                                                    name="id_pelanggan" required
                                                                    data-msg="Mohon pilih instansi">
                                                                    <?php
                                                                    require_once('connect.php');
                                                                    $sql = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama_pelanggan ASC");
                                                                    echo "<option value=''>-- Pelanggan --</option>";
                                                                    while ($row = $sql->fetch_assoc()) {
                                                                        echo "<option value=" . $row['id_pelanggan'] . ">" . $row['nama_pelanggan'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <!-- 
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kategori_proyek">Pilih
                                                            Kategori:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="kategori_proyek"
                                                                    name="kategori_proyek">
                                                                    <option value="RS">RS</option>
                                                                    <option value="Pusk">Pusk</option>
                                                                    <option value="Dinas">Dinas</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="deadline_proyek">Deadline
                                                            Proyek</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-alt"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker invalid"
                                                                data-date-format="yyyy-mm-dd" id="deadline_proyek"
                                                                name="deadline_proyek" required
                                                                data-msg="Mohon isi deadline proyek">
                                                        </div>
                                                        <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="sumberdana_proyek">Sumber
                                                            Dana:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="sumberdana_proyek"
                                                                    name="sumberdana_proyek" required
                                                                    data-msg="Mohon isi sumber dana">
                                                                    <option value="JKN">JKN</option>
                                                                    <option value="BLUD">BLUD</option>
                                                                    <option value="DIPA">DIPA</option>
                                                                    <option value="DAK">DAK</option>
                                                                    <option value="SWASTA">SWASTA</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="pagu_proyek">Pagu</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-sign-idr"></em>
                                                            </div>
                                                            <input type="number" min="0" class="form-control invalid"
                                                                id="pagu_proyek" name="pagu_proyek" placeholder="Pagu"
                                                                required data-msg="Mohon isi pagu">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="marketing_proyek">Marketing
                                                            Proyek</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid"
                                                                id="marketing_proyek" name="marketing_proyek"
                                                                placeholder="Marketing proyek" required
                                                                data-msg="Mohon isi marketing proyek"
                                                                value="<?= $row_session['nama_user']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- 
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="status_proyek">Status
                                                            Proyek</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="status_proyek"
                                                                name="status_proyek" placeholder="Status proyek">
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div class="col-12">
                                                    <h5 class="ff-base fw-medium">
                                                        <small class="text-soft">PRASYARAT KHUSUS</small>
                                                    </h5>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="alatlaik_proyek">Alat
                                                            Tidak Laik Pakai</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="alatlaik_proyek"
                                                                    name="alatlaik_proyek">
                                                                    <option value="Diganti">Diganti</option>
                                                                    <option value="Dilanjutkan">Dilanjutkan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="jenisalat_proyek">Jenis
                                                            Alat</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="jenisalat_proyek"
                                                                    name="jenisalat_proyek">
                                                                    <option value="Fix">Fix</option>
                                                                    <option value="Disesuaikan">Disesuaikan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="jmlalat_proyek">Jumlah
                                                            Alat</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="jmlalat_proyek"
                                                                    name="jmlalat_proyek">
                                                                    <option value="Fix">Fix</option>
                                                                    <option value="Disesuaikan">Disesuaikan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="jmldana_proyek">Jumlah
                                                            Dana</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="jmldana_proyek"
                                                                    name="jmldana_proyek">
                                                                    <option value="Fix">Fix</option>
                                                                    <option value="Disesuaikan">Disesuaikan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="jadwalkerja_proyek">Jadwal
                                                            Pengerjaan</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="jadwalkerja_proyek"
                                                                    name="jadwalkerja_proyek">
                                                                    <option value="Disesuaikan">Disesuaikan</option>
                                                                    <option value="Request Khusus">Request Khusus
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="daftarinventaris_proyek">Daftar
                                                            Inventaris</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select">
                                                                <select class="form-control"
                                                                    id="daftarinventaris_proyek"
                                                                    name="daftarinventaris_proyek">
                                                                    <option value="Ada">Ada</option>
                                                                    <option value="Tidak Ada">Tidak Ada</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="deadlinesertifikat_proyek">Deadline
                                                            Pengiriman Sertifikat</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select">
                                                                <select class="form-control"
                                                                    id="deadlinesertifikat_proyek"
                                                                    name="deadlinesertifikat_proyek">
                                                                    <option value="Disesuaikan">Disesuaikan</option>
                                                                    <option value="Request Khusus">Request Khusus
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="catatan_proyek">Catatan
                                                            Proyek</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control" id="catatan_proyek"
                                                                name="catatan_proyek" required
                                                                data-msg="Mohon isi catatan proyek"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-form-action btn-submit"><em
                                                            class="icon ni ni-plus"></em><span>Simpan</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- .nk-block -->
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
        document.title = 'Data Proyek';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();

            $('.productTitle').text('Proyek Baru');
            $('.productDes').html('<p>Tambahkan informasi proyek baru.</p>');
            // console.log($("#namalengkap_user").val());

            $("#form_name").val("add_proyek");
            $("#id_proyek").val('');
            $("#no_proyek").val('');
            $("#id_pelanggan").val('');
            // $("#kategori_proyek").val('RS');
            $("#deadline_proyek").val('');
            $("#sumberdana_proyek").val('JKN');
            $("#pagu_proyek").val('');
            $("#marketing_proyek").val('<?= $row_session['nama_user']; ?>');
            $("#alatlaik_proyek").val('Diganti');
            $("#jenisalat_proyek").val('Fix');
            $("#jmlalat_proyek").val('Fix');
            $("#jmldana_proyek").val('Fix');
            $("#jadwalkerja_proyek").val('Disesuaikan');
            $("#daftarinventaris_proyek").val('Ada');
            $("#deadlinesertifikat_proyek").val('Disesuaikan');
            $("#catatan_proyek").val('');
        });

        $(document).on('click', '.btn-submit', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {
                // btn_button.html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                // btn_button.attr("disabled", true);

                var form_data = new FormData($('#hl_form')[0]);
                // var form_data = $("#hl_form").serialize();
                $.ajax({
                    type: 'POST',
                    url: 'save_details.php',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data, status) {
                        console.log(data);
                        if (data == '1') {
                            btn_button.html(
                                '<em class="icon ni ni-plus"></em><span>Simpan</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            }
        });

        $(document).on('click', '.btn-edit', function(ev) {
            ev.preventDefault();

            // $('.nk-body').addClass('toggle-shown');
            // $('.nk-add-proyek').addClass('content-active');
            // $('.nk-content-body').append('<div class="toggle-overlay" data-target="addProyek"></div>');
            $('.productTitle').text('Edit Proyek');
            $('.productDes').html('<p>Edit proyek.</p>');

            // var btn_button = $(this);
            // btn_button.html('<i class="fas fa-spinner fa-spin"></i>');
            var tbl_id = $(this).attr("id");

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_proyek_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // btn_button.html(
                    //     '<em class="icon ni ni-edit"></em><span>Edit Proyek</span>'
                    // );
                    console.log(result);
                    $("#form_name").val("edit_proyek");
                    $("#id_proyek").val(result['id_proyek']);
                    $("#no_proyek").val(result['no_proyek']);
                    $("#id_pelanggan").val(result['id_pelanggan']);
                    // $("#kategori_proyek").val(result['kategori_proyek']);
                    $("#deadline_proyek").val(result['deadline_proyek']);
                    $("#sumberdana_proyek").val(result['sumberdana_proyek']);
                    $("#pagu_proyek").val(result['pagu_proyek']);
                    $("#marketing_proyek").val(result['marketing_proyek']);
                    $("#alatlaik_proyek").val(result['alatlaik_proyek']);
                    $("#jenisalat_proyek").val(result['jenisalat_proyek']);
                    $("#jmlalat_proyek").val(result['jmlalat_proyek']);
                    $("#jmldana_proyek").val(result['jmldana_proyek']);
                    $("#jadwalkerja_proyek").val(result['jadwalkerja_proyek']);
                    $("#daftarinventaris_proyek").val(result['daftarinventaris_proyek']);
                    $("#deadlinesertifikat_proyek").val(result[
                        'deadlinesertifikat_proyek']);
                    $("#catatan_proyek").val(result['catatan_proyek']);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });


        $(document).on('click', '.btn-delete', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang terhapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus data!'
            }).then(function(result) {
                if (result.value) {
                    // hapus data
                    $.post('save_details.php', {
                        form_name: "del_proyek",
                        tbl_id: tbl_id
                    }, function(data, status) {
                        console.log(data);
                        if (data == "1") {
                            Swal.fire({
                                icon: "success",
                                title: "Data telah terhapus.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else if (data == "404-del") {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal terhapus.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Data gagal terhapus.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.btn-add', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);
            console.log($(".select2-search__field").val());

            $("#form_name").val("add_pelanggan2");
            $("#nama_pelanggan").val($(".select2-search__field").val());

            var form_data = new FormData($('#hl_form')[0]);
            $.ajax({
                type: 'POST',
                url: 'save_details.php',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, status) {
                    console.log(data);
                    if (data == '1') {
                        Swal.fire({
                            icon: "success",
                            title: "Data telah tersimpan.",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Data gagal tersimpan.",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        });

        $('#id_pelanggan').select2({
            closeOnSelect: false,
            allowClear: true,
            placeholder: "Pilih Pelanggan",
            escapeMarkup: function(markup) {
                return markup;
            },
            language: {
                noResults: function() {
                    return "Data tidak ditemukan. <a href='#' class='toggle btn btn-primary btn-add'><span>Add Pelanggan</span></a>";
                    // return $("<a href='http://google.com/'>Add</a>");
                }
            }
        });

        cekDark();
    });

    function proyek_info(uid) {
        let link = 'proyek_detail?uid=' + uid;
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
    </script>

</body>

</html>