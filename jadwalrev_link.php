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
    $proyekStatus = $row0['status_proyek'];

    $idpelanggan = $row0['id_pelanggan'];
    $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$idpelanggan'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    $row1 = mysqli_fetch_assoc($result1);

    $query_spk = "SELECT * FROM spk WHERE id_proyek = '$proyekid'";
    $result_spk = mysqli_query($conn, $query_spk) or die(mysqli_error($conn));
    $row_spk = mysqli_fetch_assoc($result_spk);
    $row_jml_spk = mysqli_num_rows($result_spk);

    // if (($row0['status_proyek'] == 9) || ($row0['status_proyek'] == 10)) {          // status batal atau selesai ini balik ke home
    //     header("location:home");
    // } else {

    //     $idpelanggan = $row0['id_pelanggan'];
    //     $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$idpelanggan'";
    //     $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    //     $row1 = mysqli_fetch_assoc($result1);

    //     //////////////////////////////////////////////////////////////////////////////////
    // }
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

                <?php include "./header.php" ?>

                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div>
                                    <ul class="nav nav-tabs nav-tabs-s2">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="proyekdetail_rev(<?= $proyekid; ?>)">PROJECT DETAIL</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="kajiulang_rev(<?= $proyekid; ?>)">KAJI ULANG PERMINTAAN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#" onclick="jadwal_rev(<?= $proyekid; ?>)">JADWAL PEKERJAAN DAN
                                                AKOMODASI</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="berkasteknisi_rev(<?= $proyekid; ?>)">PEMINJAMAN
                                                KALIBRATOR</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="sertifikat_rev(<?= $proyekid; ?>)">SERTIFIKAT</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="nk-block-head nk-block-head-sm">
                                            <div class="d-flex border border-primary bg-white">
                                                <div class="p-2 flex-grow-1">
                                                    <h5><?= $row1['nama_pelanggan'] . ' | ' . $row0['namapemilik_proyek']; ?></h5>
                                                </div>
                                                <div class="p-2">
                                                    <h5><?= '#' . $row0['no_proyek']; ?></h5>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane active" id="tabItem11">
                                            <form id="hl_form" name="hl_form" class="form-validate is-alter" novalidate="novalidate">
                                                <input type="hidden" id="form_name" name="form_name" value="add_spk" />
                                                <input type="hidden" id="id_spk" name="id_spk" value="0" />
                                                <input type="hidden" id="id_proyek" name="id_proyek" value="<?= $proyekid; ?>" value="<?= $row0['id_proyek']; ?>" />
                                                <div class="nk-block">
                                                    <div class="d-flex left-content-around">
                                                        <a href="#" onclick="jadwalrev_pdf(<?= $proyekid; ?>)" class="btn btn-round btn-dim btn-outline-info"><em class="icon ni ni-printer-fill"></em><span>Surat
                                                                Jadwal</span>
                                                        </a>&emsp;
                                                        <a href="#" onclick="spkrev_pdf(<?= $proyekid; ?>)" class="btn btn-round btn-dim btn-outline-info"><em class="icon ni ni-printer-fill"></em><span>Surat
                                                                Perintah
                                                                Kerja</span>
                                                        </a>&emsp;
                                                        <a href="#" onclick="akomodasirev_pdf(<?= $proyekid; ?>)" class="btn btn-round btn-dim btn-outline-info"><em class="icon ni ni-printer-fill"></em><span>Akomodasi</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="row gy-4">
                                                        <div class="col-6">
                                                            <div class="card">

                                                                <div class="card-header bg-success">
                                                                    <h6>JADWAL PEKERJAAN</h6>
                                                                </div>
                                                                <div class="card-inner">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Tanggal Awal</label>
                                                                        <div class="row g-3">
                                                                            <div class="w-55">
                                                                                <div class="form-control-wrap">
                                                                                    <div class="form-icon form-icon-right">
                                                                                        <em class="icon ni ni-calendar-alt"></em>
                                                                                    </div>
                                                                                    <?php
                                                                                    if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                                    ?>
                                                                                        <input type="text" class="form-control date-picker invalid" data-date-format="yyyy-mm-dd" id="stgl_spk" name="stgl_spk" required data-msg="Mohon isi stgl_spk">
                                                                                    <?php } else { ?>
                                                                                        <input disabled type="text" class="form-control date-picker invalid" data-date-format="yyyy-mm-dd" id="stgl_spk" name="stgl_spk" required data-msg="Mohon isi stgl_spk">
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="w-45">
                                                                                <div class="form-control-wrap has-timepicker">
                                                                                    <div class="form-icon form-icon-left">
                                                                                        <em class="icon ni ni-clock"></em>
                                                                                    </div>
                                                                                    <?php
                                                                                    if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                                    ?>
                                                                                        <input type="text" class="form-control time-picker" data-time-format="HH:mm:ss" id="sjam_spk" name="sjam_spk" required data-msg="Mohon isi sjam_spk">
                                                                                    <?php } else { ?>
                                                                                        <input disabled type="text" class="form-control time-picker" data-time-format="HH:mm:ss" id="sjam_spk" name="sjam_spk" required data-msg="Mohon isi sjam_spk">
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-note">Date format
                                                                            <code>yyy-mm-dd</code>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label">Tanggal Akhir</label>
                                                                        <div class="row g-3">
                                                                            <div class="w-55">
                                                                                <div class="form-control-wrap">
                                                                                    <div class="form-icon form-icon-right">
                                                                                        <em class="icon ni ni-calendar-alt"></em>
                                                                                    </div>
                                                                                    <?php
                                                                                    if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                                    ?>
                                                                                        <input type="text" class="form-control date-picker invalid" data-date-format="yyyy-mm-dd" id="etgl_spk" name="etgl_spk" required data-msg="Mohon isi etgl_spk">
                                                                                    <?php } else { ?>
                                                                                        <input disabled type="text" class="form-control date-picker invalid" data-date-format="yyyy-mm-dd" id="etgl_spk" name="etgl_spk" required data-msg="Mohon isi etgl_spk">
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="w-45">
                                                                                <div class="form-control-wrap has-timepicker">
                                                                                    <div class="form-icon form-icon-left">
                                                                                        <em class="icon ni ni-clock"></em>
                                                                                    </div>
                                                                                    <?php
                                                                                    if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                                    ?>
                                                                                        <input type="text" class="form-control time-picker" data-time-format="HH:mm:ss" id="ejam_spk" name="ejam_spk" required data-msg="Mohon isi ejam_spk">
                                                                                    <?php } else { ?>
                                                                                        <input disabled type="text" class="form-control time-picker" data-time-format="HH:mm:ss" id="ejam_spk" name="ejam_spk" required data-msg="Mohon isi ejam_spk">
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-note">Date format
                                                                            <code>yyyy-mm-dd</code>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="card">
                                                                <div class="card-header bg-success">
                                                                    <h6>TEKNISI</h6>
                                                                </div>
                                                                <div class="card-inner">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="koordinator_spk">Koordinator</label>
                                                                        <div class="form-control-wrap">
                                                                            <div class="form-control-select">
                                                                                <?php
                                                                                if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                                ?>
                                                                                    <select id="koordinator_spk" name="koordinator_spk" class="form-control" required data-msg="Mohon pilih Koordinator">
                                                                                    <?php } else { ?>
                                                                                        <select disabled id="koordinator_spk" name="koordinator_spk" class="form-control" required data-msg="Mohon pilih Koordinator">
                                                                                        <?php } ?>
                                                                                        <?php
                                                                                        $sql = mysqli_query($conn, "SELECT * FROM user WHERE posisi_user = 'Teknisi' ORDER BY nama_user ASC");
                                                                                        while ($row = $sql->fetch_assoc()) {
                                                                                            echo "<option value=" . $row['id_user'] . ">" . $row['nama_user'] . "</option>";
                                                                                        }
                                                                                        ?>
                                                                                        </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="form-label">Pelaksana</label>
                                                                        <ul class="custom-control-group align-left row gy-2">
                                                                            <?php
                                                                            $sql = mysqli_query($conn, "SELECT * FROM user WHERE posisi_user = 'Teknisi' ORDER BY nama_user ASC");
                                                                            // $sql = mysqli_query($conn, "SELECT * FROM teknisi ORDER BY id_teknisi ASC");
                                                                            while ($row_teknisi = $sql->fetch_assoc()) {
                                                                            ?>
                                                                                <li class="col-12">
                                                                                    <div class="custom-control custom-switch">
                                                                                        <?php
                                                                                        if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                                        ?>
                                                                                            <input type="checkbox" class="custom-control-input" id="teknisi<?= $row_teknisi['id_user']; ?>_spk" name="teknisi<?= $row_teknisi['id_user']; ?>_spk" value="<?= $row_teknisi['id_user']; ?>">
                                                                                        <?php } else { ?>
                                                                                            <input disabled type="checkbox" class="custom-control-input" id="teknisi<?= $row_teknisi['id_user']; ?>_spk" name="teknisi<?= $row_teknisi['id_user']; ?>_spk" value="<?= $row_teknisi['id_user']; ?>">
                                                                                        <?php } ?>
                                                                                        <label class="custom-control-label" for="teknisi<?= $row_teknisi['id_user']; ?>_spk"><?= $row_teknisi['nama_user']; ?></label>
                                                                                        <!-- <input type="checkbox" class="custom-control-input" id="teknisi<?= $row_teknisi['id_teknisi']; ?>_spk" name="teknisi<?= $row_teknisi['id_teknisi']; ?>_spk" value="<?= $row_teknisi['id_teknisi']; ?>">
                                                                                        <label class="custom-control-label" for="teknisi<?= $row_teknisi['id_teknisi']; ?>_spk"><?= $row_teknisi['nama_teknisi']; ?></label> -->
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="card">
                                                        <div class="card-header text-white bg-indigo">
                                                            <h6>AKOMODASI PERJALANAN DINAS</h6>
                                                        </div>
                                                        <div class="card-inner">
                                                            <div class="row g-3">
                                                                <div class="col-4">
                                                                    <h6>Komponen Biaya</h6>
                                                                </div>
                                                                <div class="col-4">
                                                                    <h6>Nominal</h6>
                                                                </div>
                                                                <div class="col-4">
                                                                    <h6>Keterangan</h6>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3">
                                                                <div class="col-4">
                                                                    <p class="lead">Akomodasi Teknisi</p>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <div class="form-text-hint">
                                                                                <span class="overline-title">Rp.</span>
                                                                            </div>
                                                                            <?php
                                                                            if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                            ?>
                                                                                <input type="number" min="0" class="form-control invalid" id="jml_akomodasi_spk" name="jml_akomodasi_spk" min="0" required data-msg="Mohon isi data">
                                                                            <?php } else { ?>
                                                                                <input disabled type="number" min="0" class="form-control invalid" id="jml_akomodasi_spk" name="jml_akomodasi_spk" min="0" required data-msg="Mohon isi data">
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <?php
                                                                            if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                            ?>
                                                                                <input type="text" class="form-control invalid" id="ket_akomodasi_spk" name="ket_akomodasi_spk" required data-msg="Mohon isi data">
                                                                            <?php } else { ?>
                                                                                <input disabled type="text" class="form-control invalid" id="ket_akomodasi_spk" name="ket_akomodasi_spk" required data-msg="Mohon isi data">
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3">
                                                                <div class="col-4">
                                                                    <p class="lead">Uang Transportasi</p>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <div class="form-text-hint">
                                                                                <span class="overline-title">Rp.</span>
                                                                            </div>
                                                                            <?php
                                                                            if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                            ?>
                                                                                <input type="number" min="0" class="form-control invalid" id="jml_transportasi_spk" name="jml_transportasi_spk" min="0" required data-msg="Mohon isi data">
                                                                            <?php } else { ?>
                                                                                <input disabled type="number" min="0" class="form-control invalid" id="jml_transportasi_spk" name="jml_transportasi_spk" min="0" required data-msg="Mohon isi data">
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <?php
                                                                            if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                            ?>
                                                                                <input type="text" class="form-control invalid" id="ket_transportasi_spk" name="ket_transportasi_spk" required data-msg="Mohon isi data">
                                                                            <?php } else { ?>
                                                                                <input disabled type="text" class="form-control invalid" id="ket_transportasi_spk" name="ket_transportasi_spk" required data-msg="Mohon isi data">
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=" row g-3">
                                                                <div class="col-4">
                                                                    <p class="lead">Penginapan / Hotel</p>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <div class="form-text-hint">
                                                                                <span class="overline-title">Rp.</span>
                                                                            </div>
                                                                            <?php
                                                                            if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                            ?>
                                                                                <input type="number" min="0" class="form-control invalid" id="jml_penginapan_spk" name="jml_penginapan_spk" min="0" required data-msg="Mohon isi data">
                                                                            <?php } else { ?>
                                                                                <input disabled type="number" min="0" class="form-control invalid" id="jml_penginapan_spk" name="jml_penginapan_spk" min="0" required data-msg="Mohon isi data">
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <?php
                                                                            if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                            ?>
                                                                                <input type="text" class="form-control invalid" id="ket_penginapan_spk" name="ket_penginapan_spk" required data-msg="Mohon isi data">
                                                                            <?php } else { ?>
                                                                                <input disabled type="text" class="form-control invalid" id="ket_penginapan_spk" name="ket_penginapan_spk" required data-msg="Mohon isi data">
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3">
                                                                <div class="col-4">
                                                                    <p class="lead">Cadangan Cash</p>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <div class="form-text-hint">
                                                                                <span class="overline-title">Rp.</span>
                                                                            </div>
                                                                            <?php
                                                                            if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                            ?>
                                                                                <input type="number" min="0" class="form-control invalid" id="jml_cadangan_spk" name="jml_cadangan_spk" min="0" required data-msg="Mohon isi data">
                                                                            <?php } else { ?>
                                                                                <input disabled type="number" min="0" class="form-control invalid" id="jml_cadangan_spk" name="jml_cadangan_spk" min="0" required data-msg="Mohon isi data">
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <?php
                                                                            if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                            ?>
                                                                                <input type="text" class="form-control invalid" id="ket_cadangan_spk" name="ket_cadangan_spk" required data-msg="Mohon isi data">
                                                                            <?php } else { ?>
                                                                                <input disabled type="text" class="form-control invalid" id="ket_cadangan_spk" name="ket_cadangan_spk" required data-msg="Mohon isi data">
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <strong class='lead text-muted'>Total Pengajuan :</strong> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-block d-flex flex-row-reverse">
                                                    <div class="row g-3">
                                                        <div class="col-6">
                                                            <?php
                                                            if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                            ?>
                                                                <button class="btn btn-success btn-form-action btn-submit-spk"><span>Simpan</span></button>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="#" id="<?= $row_spk['id_spk']; ?>" class="btn btn-primary btn-form-action btn-edit-spk">Edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- footer @s -->
                <?php include "./footer.html" ?>
                <!-- footer @e -->
            </div>
            <!-- content @e -->

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
            document.title = 'DP Revisi ' + '<?= $row0['no_proyek']; ?>';

            $("#hl_form").validate({
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $(document).on('click', '.btn-reset', function(ev) {
                ev.preventDefault();
                $("#form_name").val("add_spk");
                $("#id_spk").val('');
                $("#id_proyek").val('');
                $("#koordinator_spk").val('');
                // $("#up_spk").val(result['up_spk']);
                // $("#hp_spk").val(result['hp_spk']);

                $("#stgl_spk").val('');
                $("#etgl_spk").val('');
                $("#sjam_spk").val('');
                $("#ejam_spk").val('');

                $("#jml_akomodasi_spk").val('');
                $("#jml_transportasi_spk").val('');
                $("#jml_penginapan_spk").val('');
                $("#jml_cadangan_spk").val('');

                $("#ket_akomodasi_spk").val('');
                $("#ket_transportasi_spk").val('');
                $("#ket_penginapan_spk").val('');
                $("#ket_cadangan_spk").val('');
            });

            $(document).on('click', '.btn-submit-spk', function(ev) {
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

            $(document).on('click', '.btn-edit-spk', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                $.ajax({
                    cache: false,
                    url: 'get_ajax_details.php', // url where to submit the request
                    type: "GET", // type of action POST || GET
                    dataType: 'json', // data type
                    data: {
                        cmd: "get_spk_details",
                        tbl_id: tbl_id
                    }, // post data || get data
                    success: function(result) {
                        console.log(result);
                        $("#form_name").val("edit_spk");
                        $("#id_spk").val(result['id_spk']);
                        $("#id_proyek").val(result['id_proyek']);
                        $("#koordinator_spk").val(result['koordinator_spk']);
                        // $("#up_spk").val(result['up_spk']);
                        // $("#hp_spk").val(result['hp_spk']);

                        $("#stgl_spk").val(result['stgl_spk']);
                        $("#etgl_spk").val(result['etgl_spk']);
                        $("#sjam_spk").val(result['sjam_spk']);
                        $("#ejam_spk").val(result['ejam_spk']);

                        $("#jml_akomodasi_spk").val(result['jml_akomodasi_spk']);
                        $("#jml_transportasi_spk").val(result['jml_transportasi_spk']);
                        $("#jml_penginapan_spk").val(result['jml_penginapan_spk']);
                        $("#jml_cadangan_spk").val(result['jml_cadangan_spk']);

                        $("#ket_akomodasi_spk").val(result['ket_akomodasi_spk']);
                        $("#ket_transportasi_spk").val(result['ket_transportasi_spk']);
                        $("#ket_penginapan_spk").val(result['ket_penginapan_spk']);
                        $("#ket_cadangan_spk").val(result['ket_cadangan_spk']);


                        let dataTek = result['pelaksana_spk'];
                        let dataTekArr = dataTek.split(';');
                        if (dataTekArr.length > 0) {
                            for (let i = 0; i < dataTekArr.length - 1; i++) {
                                let idPelaksana = '#teknisi' + dataTekArr[i] + '_spk';
                                $(idPelaksana).prop('checked', true);
                            }
                        }
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


            if (<?= $row_jml_spk; ?> != 0) {
                $('.btn-edit-spk').click();
                $('.btn-edit-spk').hide();
            } else {
                $('.btn-edit-spk').hide();
            }

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

        function proyekdetail_rev(uid) {
            let link = 'proyekrev_detail?uid=' + uid;
            window.open(link, '_self');
        }

        function kajiulang_rev(uid) {
            let link = 'kajiulangrev?uid=' + uid;
            window.open(link, '_self');
        }

        function jadwal_rev(uid) {
            let link = 'jadwalrev?uid=' + uid;
            window.open(link, '_self');
        }

        function berkasteknisi_rev(uid) {
            let link = 'berkasteknisirev?uid=' + uid;
            window.open(link, '_self');
        }

        /////////////////////////////////////////////

        function permohonanrev_pdf(uid) {
            let link = 'permohonanrev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function kajiulangrev_pdf(uid) {
            let link = 'kajiulangrev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function jadwalrev_pdf(uid) {
            let link = 'jadwalrev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function spkrev_pdf(uid) {
            let link = 'spkrev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function akomodasirev_pdf(uid) {
            let link = 'akomodasirev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function berkasteknisirev_pdf(uid) {
            let link = 'berkasteknisirev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function sertifikat_rev(uid) {
            let link = 'esertifikat?uid=' + uid;
            window.open(link, '_self');
        }
    </script>

</body>

</html>