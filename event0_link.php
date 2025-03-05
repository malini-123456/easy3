<?php require_once('session.php'); 
    if ($username) {
        $query_session = "SELECT * FROM user WHERE username = '$username'";
        $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
        $row_session = mysqli_fetch_assoc($result_session);
    }

$editMode = 1;
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
                                            <h3 class="nk-block-title page-title">Event Calendar
                                                <!-- <h4>Kalender <small><?=$row0['no_proyek'];?></small></h4> -->
                                            </h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <?php if($editMode != 0) { ?>
                                            <button class="btn btn-primary btn-reset" data-toggle="modal"
                                                data-target="#addEventPopup"><em
                                                    class="icon ni ni-plus"></em><span>Tambah Event</span></button>
                                            <?php } ?>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div id="calendar" class="nk-calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->


                <!-- ============================ MODAL ADD EVENT ============================ -->
                <div class="modal fade" tabindex="-1" id="addEventPopup">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Event</h5>
                                <button class="close btn-reset" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="addEventForm" name="addEventForm" class="form-validate is-alter">
                                    <input type="hidden" id="form_name" name="form_name" value="add_kegiatan" />
                                    <input type="hidden" id="id_kegiatan" name="id_kegiatan" value="0" />
                                    <!-- <input type="hidden" id="id_proyek" name="id_proyek" value="" /> -->

                                    <div class="row gx-4 gy-3">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Kategori Event</label>
                                                <div class="form-control-wrap">
                                                    <select id="event-theme" name="jenis_kegiatan"
                                                        class="select-calendar-theme form-control form-control-lg"
                                                        onchange="cek_event()">
                                                        <option value="event-primary">Pemeliharaan</option>
                                                        <option value="event-info">Uji Banding</option>
                                                        <option value="event-azure">Pelatihan</option>
                                                        <option value="event-dark">Corrective Action</option>
                                                        <option value="event-grey">Preventif Action</option>
                                                        <option value="event-success-dim">Rekalibrasi</option>
                                                        <option value="event-pink-dim">Cek Antara</option>
                                                        <option value="event-pink">Uji Profesiensi</option>
                                                        <option value="event-danger">Lainnya</option>
                                                        <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Admin Teknis') ) { ?>
                                                        <option value="event-teal">Kalibrasi Fix</option>
                                                        <option value="event-warning">Kalibrasi Sementara</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12" id="form_proyek">
                                            <div class="form-group">
                                                <label class="form-label">No.Proyek</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-control-select">
                                                        <select class="form-control" id="id_proyek" name="id_proyek"
                                                            required data-msg="Mohon pilih proyek">
                                                            <?php
                                                            require_once('connect.php');
                                                            $sql = mysqli_query($conn, "SELECT * FROM proyek WHERE status_proyek != 9 AND status_proyek != 10 ORDER BY no_proyek DESC");
                                                            echo "<option value='0'>-- proyek --</option>";
                                                            while ($row = $sql->fetch_assoc()) {
                                                                $idpelanggan = $row['id_pelanggan'];
                                                                $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$idpelanggan'";
                                                                $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                                $row1 = mysqli_fetch_assoc($result1);

                                                                echo "<option value=" . $row['id_proyek'] . ">" . $row['no_proyek'] . ' | ' . $row1['nama_pelanggan'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="event-title">Nama Event</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="event-title"
                                                        name="nama_kegiatan" placeholder="Nama event" required
                                                        data-msg="Mohon isi nama event">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label" for="event-start-date">Tgl Awal</label>
                                                <div class="row gx-2">
                                                    <div class="w-55">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-alt"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker "
                                                                data-date-format="yyyy-mm-dd" id="event-start-date"
                                                                name="stgl_kegiatan" required
                                                                data-msg="Mohon isi tgl awal">
                                                        </div>
                                                        <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                                    </div>
                                                    <div class="w-45">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-clock"></em>
                                                            </div>
                                                            <input type="text" id="event-start-time"
                                                                name="sjam_kegiatan" data-time-format="HH:mm:ss"
                                                                class="form-control time-picker" required
                                                                data-msg="Mohon isi jam awal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label" for="event-end-date">Tgl Akhir</label>
                                                <div class="row gx-2">
                                                    <div class="w-55">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-alt"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker "
                                                                data-date-format="yyyy-mm-dd" id="event-end-date"
                                                                name="etgl_kegiatan" required
                                                                data-msg="Mohon isi tgl akhir">
                                                        </div>
                                                        <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                                    </div>
                                                    <div class="w-45">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-clock"></em>
                                                            </div>
                                                            <input type="text" id="event-end-time" name="ejam_kegiatan"
                                                                data-time-format="HH:mm:ss"
                                                                class="form-control time-picker" required
                                                                data-msg="Mohon isi jam akhir">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="event-description">Deskripsi
                                                    Event</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control" id="event-description"
                                                        name="isi_kegiatan" placeholder="Deskripsi event" required
                                                        data-msg="Mohon isi deskripsi event"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <ul class="d-flex justify-content-between gx-4 mt-1">
                                                <li>
                                                    <button id="addEvent" type="submit"
                                                        class="btn btn-primary btn-form-action btn-submit">Simpan</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <option value="event-danger">Teknisi</option>
                <option value="event-success">Bos </option>
                <option value="event-info">Admin</option>
                <option value="event-warning">Marketing</option>
                <option value="event-primary">Cat01</option>
                <option value="event-pink">Cat02</option>
                <option value="event-primary-dim">Cat03</option>
                <option value="event-success-dim">Cat04</option>
                <option value="event-info-dim">Cat05</option>
                <option value="event-warning-dim">Cat06</option>
                <option value="event-danger-dim">Cat07</option>
                <option value="event-pink-dim">Cat08</option> -->

                <!-- ============================ MODAL EDIT EVENT ============================ -->
                <div class="modal fade" tabindex="-1" id="editEventPopup">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit-event-no_proyek">Edit Event </h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <form id="editEventForm" name="editEventForm" class="form-validate is-alter">
                                    <input type="hidden" id="form_name" name="form_name" value="edit_kegiatan" />
                                    <input type="hidden" id="id_edit_kegiatan" name="id_edit_kegiatan" value="0" />
                                    <!-- <input type="hidden" id="id_proyek" name="id_proyek" value="" /> -->

                                    <div class="row gx-4 gy-3">

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Kategori Event</label>
                                                <div class="form-control-wrap">
                                                    <select id="edit-event-theme" name="jenis_kegiatan"
                                                        class="select-calendar-theme form-control form-control-lg"
                                                        onchange="cek_edit_event()">
                                                        <option value="event-primary">Pemeliharaan</option>
                                                        <option value="event-info">Uji Banding</option>
                                                        <option value="event-azure">Pelatihan</option>
                                                        <option value="event-dark">Corrective Action</option>
                                                        <option value="event-grey">Preventif Action</option>
                                                        <option value="event-success-dim">Rekalibrasi</option>
                                                        <option value="event-pink-dim">Cek Antara</option>
                                                        <option value="event-pink">Uji Profesiensi</option>
                                                        <option value="event-danger">Lainnya</option>
                                                        <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Admin Teknis') ) { ?>
                                                        <option value="event-teal">Kalibrasi Fix</option>
                                                        <option value="event-warning">Kalibrasi Sementara</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12" id="edit-form_proyek">
                                            <div class="form-group">
                                                <label class="form-label">No.Proyek</label>
                                                <div class="form-control-wrap">
                                                    <div class="form-control-select">
                                                        <select class="form-control" id="edit-event-id_proyek"
                                                            name="id_proyek" required data-msg="Mohon pilih proyek">
                                                            <?php
                                                            require_once('connect.php');
                                                            $sql = mysqli_query($conn, "SELECT * FROM proyek WHERE status_proyek != 9 AND status_proyek != 10 ORDER BY no_proyek DESC");
                                                            echo "<option value='0'>-- proyek --</option>";
                                                            while ($row = $sql->fetch_assoc()) {
                                                                $idpelanggan = $row['id_pelanggan'];
                                                                $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$idpelanggan'";
                                                                $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                                $row1 = mysqli_fetch_assoc($result1);

                                                                echo "<option value=" . $row['id_proyek'] . ">" . $row['no_proyek'] . ' | ' . $row1['nama_pelanggan'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="edit-event-title">Nama Event</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control " id="edit-event-title"
                                                        name="nama_kegiatan" placeholder="Nama event" required
                                                        data-msg="Mohon isi nama event">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label" for="edit-event-start-date">Tgl Awal</label>
                                                <div class="row gx-2">
                                                    <div class="w-55">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-alt"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker "
                                                                data-date-format="yyyy-mm-dd" id="edit-event-start-date"
                                                                name="stgl_kegiatan" required
                                                                data-msg="Mohon isi tgl awal">
                                                        </div>
                                                        <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                                    </div>
                                                    <div class="w-45">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-clock"></em>
                                                            </div>
                                                            <input type="text" id="edit-event-start-time"
                                                                name="sjam_kegiatan" data-time-format="HH:mm:ss"
                                                                class="form-control time-picker" required
                                                                data-msg="Mohon isi jam awal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label" for="edit-event-end-date">Tgl Akhir</label>
                                                <div class="row gx-2">
                                                    <div class="w-55">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-alt"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker "
                                                                data-date-format="yyyy-mm-dd" id="edit-event-end-date"
                                                                name="etgl_kegiatan" required
                                                                data-msg="Mohon isi tgl akhir">
                                                        </div>
                                                        <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                                    </div>
                                                    <div class="w-45">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-clock"></em>
                                                            </div>
                                                            <input type="text" id="edit-event-end-time"
                                                                name="ejam_kegiatan" data-time-format="HH:mm:ss"
                                                                class="form-control time-picker" required
                                                                data-msg="Mohon isi jam akhir">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label" for="edit-event-description">Deskripsi
                                                    Event</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control" id="edit-event-description"
                                                        name="isi_kegiatan" placeholder="Deskripsi event" required
                                                        data-msg="Mohon isi deskripsi event"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <ul class="d-flex justify-content-between gx-4 mt-1">
                                                <li>
                                                    <button id="editEvent" type="submit"
                                                        class="btn btn-primary btn-form-action btn-submit-edit">Simpan</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================ MODAL VIEW EVENT ============================ -->
                <div class="modal fade" tabindex="-1" id="previewEventPopup">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div id="preview-event-header" class="modal-header">
                                <h5 id="preview-event-title" class="modal-title"></h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <div class="row gy-3 py-1">
                                    <div class="col-sm-6">
                                        <h6 class="overline-title">Tgl Awal</h6>
                                        <p id="preview-event-start"></p>
                                    </div>
                                    <div class="col-sm-6" id="preview-event-end-check">
                                        <h6 class="overline-title">Tgl Akhir</h6>
                                        <p id="preview-event-end"></p>
                                    </div>
                                    <div class="col-sm-10" id="preview-event-description-check">
                                        <h6 class="overline-title">Deskripsi</h6>
                                        <p id="preview-event-description"></p>
                                    </div>
                                </div>
                                <?php if($editMode != 0) { ?>
                                <ul class="d-flex justify-content-between gx-4 mt-3">
                                    <li>
                                        <button id="btn-ubah" data-dismiss="modal" data-toggle="modal"
                                            data-target="#editEventPopup" class="btn btn-primary">Edit Event</button>
                                    </li>
                                    <li>
                                        <button data-dismiss="modal" id="btn-hapus" value="0"
                                            class="btn btn-danger btn-dim btn-delete">Delete</button>
                                    </li>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================ MODAL DELETE EVENT ============================ -->
                <div class="modal fade" tabindex="-1" id="deleteEventPopup">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body modal-body-lg text-center">
                                <div class="nk-modal py-4">
                                    <em
                                        class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                                    <h4 class="nk-modal-title">Are You Sure ?</h4>
                                    <div class="nk-modal-text mt-n2">
                                        <p class="text-soft">This event data will be removed permanently.</p>
                                    </div>
                                    <ul class="d-flex justify-content-center gx-4 mt-4">
                                        <li>
                                            <button data-dismiss="modal" id="deleteEvent" class="btn btn-success">Yes,
                                                Delete
                                                it</button>
                                        </li>
                                        <li>
                                            <button data-dismiss="modal" data-toggle="modal"
                                                data-target="#editEventPopup"
                                                class="btn btn-danger btn-dim">Cancel</button>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .modal-body -->
                        </div>
                    </div>
                </div>
                <!-- ============================ MODAL EVENT ============================ -->



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
        reset();
        document.title = 'Event Calendar';

        $("#addEventForm").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $("#editEventForm").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();
            $("#form_name").val("add_kegiatan");
            $("#id_proyek").val('0');
            $("#id_kegiatan").val('');
            $("#event-title").val('');
            $("#event-theme").val('event-primary');
            $("#isi_kegiatan").val('');
            $("#event-start-date").val('');
            $("#event-end-date").val('');
            $("#event-start-time").val('');
            $("#event-end-time").val('');
            $("#form_proyek").hide();
        });

        $(document).on('click', '.btn-submit', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#addEventForm").valid() == true) {

                var form_data = new FormData($('#addEventForm')[0]);
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
                            console.log(data);
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


        $(document).on('click', '.btn-submit-edit', function(ev) {
            ev.preventDefault();

            if ($("#editEventForm").valid() == true) {
                var form_data = new FormData($('#editEventForm')[0]);
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
                            console.log(data);
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


        $(document).on('click', '.btn-delete', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).val();

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
                        form_name: "del_kegiatan",
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

        cekDark();
    });



    // =============================== EVENT CALENDER ===============================

    ! function(NioApp, $) {
        "use strict"; // Variable

        var $win = $(window),
            $body = $('body'),
            breaks = NioApp.Break;

        NioApp.Calendar = function() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            var TODAY = yyyy + '-' + mm + '-' + dd;
            var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];
            var calendarEl = document.getElementById('calendar');
            var eventsEl = document.getElementById('externalEvents');
            var removeEvent = document.getElementById('removeEvent');
            var addEventBtn = $('#addEvent');
            var addEventForm = $('#addEventForm');
            var addEventPopup = $('#addEventPopup');
            var updateEventBtn = $('#updateEvent');
            var editEventForm = $('#editEventForm');
            var editEventPopup = $('#editEventPopup');
            var previewEventPopup = $('#previewEventPopup');
            var deleteEventBtn = $('#deleteEvent');
            var mobileView = NioApp.Win.width < NioApp.Break.md ? true : false;
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                timeZone: 'Asia/Singapore',
                initialView: mobileView ? 'listWeek' : 'dayGridMonth',
                themeSystem: 'bootstrap',
                headerToolbar: {
                    left: 'title prev,next',
                    center: null,
                    right: 'today dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                height: 800,
                contentHeight: 780,
                aspectRatio: 3,
                editable: false,
                droppable: false,
                views: {
                    dayGridMonth: {
                        dayMaxEventRows: 4
                    }
                },
                direction: NioApp.State.isRTL ? "rtl" : "ltr",
                nowIndicator: true,
                now: TODAY,
                // now: TODAY + 'T09:25:00',
                eventDragStart: function eventDragStart(info) {
                    $('.popover').popover('hide');
                },
                eventMouseEnter: function eventMouseEnter(info) {
                    $(info.el).popover({
                        template: '<div class="popover"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
                        title: info.event._def.title + info.event._def.extendedProps
                            .no_proyek,
                        content: info.event._def.extendedProps.description,
                        placement: 'top'
                    });
                    info.event._def.extendedProps.description ? $(info.el).popover('show') : $(info.el)
                        .popover('hide');
                },
                eventMouseLeave: function eventMouseLeave(info) {
                    $(info.el).popover('hide');
                },
                eventClick: function eventClick(info) {
                    // Get data
                    var title = info.event._def.title + info.event._def.extendedProps.no_proyek;
                    var description = info.event._def.extendedProps.description;
                    var start = info.event._instance.range.start;
                    var sDate = start.toUTCString().split(' ');
                    var startDate = start.getFullYear() + '-' + String(start.getMonth() + 1).padStart(2,
                        '0') + '-' + String(sDate[1]);
                    var startTime = start.toUTCString().split(' ');
                    startTime = startTime[startTime.length - 2];
                    startTime = startTime == '00:00:00' ? '' : startTime;
                    var end = info.event._instance.range.end;
                    var eDate = end.toUTCString().split(' ');
                    var endDate = end.getFullYear() + '-' + String(end.getMonth() + 1).padStart(2,
                        '0') + '-' + String(eDate[1]);
                    var endTime = end.toUTCString().split(' ');
                    endTime = endTime[endTime.length - 2];
                    endTime = endTime == '00:00:00' ? '' : endTime;

                    var className = info.event._def.ui.classNames[0].slice(3);

                    if ((className === 'event-teal') || (className === 'event-warning')) {
                        <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Admin Teknis') ) { ?>
                        $('#btn-ubah').show();
                        $('#btn-hapus').show();
                        <?php } else { ?>
                        $('#btn-ubah').hide();
                        $('#btn-hapus').hide();
                        <?php } ?>
                    } else {
                        $('#btn-ubah').show();
                        $('#btn-hapus').show();
                    }

                    var eventId = info.event._def.publicId; //Set data in eidt form

                    $('#id_edit_kegiatan').val(eventId);
                    $('#edit-event-title').val(info.event._def.title);
                    $('#edit-event-no_proyek').text('Edit Event' + info.event._def.extendedProps
                        .no_proyek);
                    $('#edit-event-id_proyek').val(info.event._def.extendedProps.id_proyek);
                    $('#edit-event-start-date').val(startDate).datepicker('update');
                    $('#edit-event-end-date').val(endDate).datepicker('update');
                    $('#edit-event-start-time').val(startTime);
                    $('#edit-event-end-time').val(endTime);
                    $('#edit-event-description').val(description);
                    $('#edit-event-theme').val(className);
                    $('#edit-event-theme').trigger('change.select2');
                    editEventForm.attr('data-id', eventId); // Set data in preview

                    var previewStart = String(sDate[1]) + ' ' + month[start
                        .getMonth()] + ' ' + start.getFullYear() + (startTime ? ' - ' + to12(
                        startTime) : '');
                    var previewEnd = String(eDate[1]) + ' ' + month[end
                        .getMonth()] + ' ' + end.getFullYear() + (endTime ? ' - ' + to12(endTime) :
                        '');
                    $('#preview-event-title').text(title);
                    $('#preview-event-header').addClass('fc-' + className);
                    $('#preview-event-start').text(previewStart);
                    $('#preview-event-end').text(previewEnd);
                    $('#preview-event-description').text(description);
                    $('#btn-hapus').val(eventId);
                    !description ? $('#preview-event-description-check').css('display', 'none') : null;
                    previewEventPopup.modal('show');
                    $('.popover').popover('hide');
                },
                // events: 'kegiatan.php',
                events: 'kegiatanfull',
            });
            calendar.render(); //Add event


            function to12(time) {
                time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

                if (time.length > 1) {
                    time = time.slice(1);
                    time.pop();
                    time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM

                    time[0] = +time[0] % 12 || 12;
                }

                time = time.join('');
                return time;
            }

            function customCalSelect(cat) {
                if (!cat.id) {
                    return cat.text;
                }

                var $cat = $('<span class="fc-' + cat.element.value + '"> <span class="dot"></span>' + cat.text +
                    '</span>');
                return $cat;
            }

            ;
            NioApp.Select2('.select-calendar-theme', {
                templateResult: customCalSelect
            });
            addEventPopup.on('hidden.bs.modal', function(e) {
                setTimeout(function() {
                    $('#addEventForm input,#addEventForm textarea').val('');
                    $('#event-theme').val('event-primary');
                    $('#event-theme').trigger('change.select2');
                }, 1000);
            });
            previewEventPopup.on('hidden.bs.modal', function(e) {
                $('#preview-event-header').removeClass().addClass('modal-header');
            });
        };

        NioApp.coms.docReady.push(NioApp.Calendar);
    }(NioApp, jQuery);

    function reset() {
        $("#form_name").val("add_kegiatan");
        $("#id_proyek").val('0');
        $("#id_kegiatan").val('');
        $("#event-title").val('');
        $("#event-theme").val('event-primary');
        $("#isi_kegiatan").val('');
        $("#event-start-date").val('');
        $("#event-end-date").val('');
        $("#event-start-time").val('');
        $("#event-end-time").val('');
        $("#form_proyek").hide();
    }

    function cek_event() {
        // console.log('tes=' + $("#event-theme").val());
        if (($("#event-theme").val() === 'event-teal') || ($("#event-theme").val() === 'event-warning')) {
            $("#form_proyek").show();
        } else {
            $("#id_proyek").val('0');
            $("#form_proyek").hide();
        }
    }

    function cek_edit_event() {
        // console.log('tes=' + $("#edit-event-theme").val());
        if (($("#edit-event-theme").val() === 'event-teal') || ($("#edit-event-theme").val() === 'event-warning')) {
            $("#edit-form_proyek").show();
        } else {
            $("#id_proyek").val('0');
            $("#edit-form_proyek").hide();
        }
    }
    </script>

</body>

</html>