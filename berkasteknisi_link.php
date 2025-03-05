<?php require_once('session.php'); 
    if ($username) {
        $query_session = "SELECT * FROM user WHERE username = '$username'";
        $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
        $row_session = mysqli_fetch_assoc($result_session);
    }

if (isset($_REQUEST['uid'])) {
$proyekid = $_REQUEST['uid'];
$edit = 1;

$query0 = "SELECT * FROM proyek WHERE id_proyek = '$proyekid'";
$result0 = mysqli_query($conn, $query0) or die(mysqli_error($conn));
$row0 = mysqli_fetch_assoc($result0);

$status_proyek = $row0['status_proyek'];
$query2 = "SELECT * FROM status_proyek WHERE id_status = '$status_proyek'";
$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
$row2 = mysqli_fetch_assoc($result2);
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
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3>Peminjaman Alat Kalibrator</h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <button onclick="proyek_info(<?= $proyekid; ?>)"
                                                class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                                    class="icon ni ni-arrow-left"></em><span>Back</span></button>
                                            <button onclick="proyek_info(<?= $proyekid; ?>)"
                                                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                                    class="icon ni ni-arrow-left"></em></button>
                                        </div>
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') ) { ?>
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <div class="preview-block">
                                                <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                                    novalidate="novalidate">
                                                    <input type="hidden" id="form_name" name="form_name"
                                                        value="add_berkasteknisi" />
                                                    <input type="hidden" id="id_berkasteknisi" name="id_berkasteknisi"
                                                        value="0" />
                                                    <input type="hidden" id="id_proyek" name="id_proyek"
                                                        value="<?= $proyekid; ?>" value="<?= $row0['id_proyek']; ?>" />

                                                    <div class="row g-3">

                                                        <!-- <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Nama Alat</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-control-select">
                                                                        <select class="form-control" id="id_alat"
                                                                            name="id_alat" required
                                                                            data-msg="Mohon pilih alat">
                                                                            <?php
                                                                            require_once('connect.php');
                                                                            $sql = mysqli_query($conn, "SELECT * FROM alatkalibrasi ORDER BY nama_alat ASC");
                                                                            // echo "<option value=''>-- alat --</option>";
                                                                            while ($row = $sql->fetch_assoc()) {
                                                                                echo "<option value=" . $row['id_alat'] . ">" . $row['nama_alat'] . ' | ' . $row['kode_inventaris'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="id_alat">Pilih
                                                                    Alat</label>
                                                                <div class="form-control-wrap ">
                                                                    <select
                                                                        class="form-control form-control-lg form-select"
                                                                        data-search="on" id="id_alat" name="id_alat"
                                                                        required data-msg="Mohon pilih Alat">
                                                                        <?php
                                                                            require_once('connect.php');
                                                                            $sql = mysqli_query($conn, "SELECT * FROM alatkalibrasi ORDER BY nama_alat ASC");
                                                                            // echo "<option value=''>-- alat --</option>";
                                                                            while ($row = $sql->fetch_assoc()) {
                                                                                echo "<option value=" . $row['id_alat'] . ">" . $row['nama_alat'] . ' | ' . $row['kode_inventaris'] . "</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="kondisi">Kondisi</label>
                                                                <div class="form-control-wrap ">
                                                                    <div class="form-control-select">
                                                                        <select class="form-control" id="kondisi"
                                                                            name="kondisi">
                                                                            <option value="Lengkap">Lengkap</option>
                                                                            <option value="Tidak Lengkap">Tidak Lengkap
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <button
                                                                class="btn btn-primary btn-form-action btn-submit btn-berkasteknisi"><span>Simpan
                                                                </span></button>
                                                            <a href="#"
                                                                class="btn btn-danger btn-form-action btn-reset">Clear</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <div class="preview-block">
                                                <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') ) { ?>
                                                <table class="datatable-init-export_action1asc nowrap table"
                                                    data-export-title="Export">
                                                    <?php } else { ?>
                                                    <table class="datatable-init-export_noaction1asc nowrap table"
                                                        data-export-title="Export">
                                                        <?php } ?>
                                                        <thead>
                                                            <tr>
                                                                <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') ) { ?>
                                                                <th>Action</th>
                                                                <?php } ?>
                                                                <th>Nama Alat</th>
                                                                <th>Merek</th>
                                                                <th>Tipe</th>
                                                                <th>No Seri</th>
                                                                <th>Kode Inventaris</th>
                                                                <th>Kondisi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                        $sno = 0;
                                                        $query = "SELECT * FROM berkasteknisi WHERE id_proyek = '$proyekid' ORDER BY id_berkasteknisi DESC";
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($result)) {

                                                            $id_alat = $row['id_alat'];
                                                            $query1 = "SELECT * FROM alatkalibrasi WHERE id_alat = '$id_alat'";
                                                            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                            $row1 = mysqli_fetch_assoc($result1);

                                                            $sno++;
                                                        ?>
                                                            <tr>
                                                                <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') ) { ?>
                                                                <td>
                                                                    <a href="#" id="<?= $row['id_berkasteknisi']; ?>"
                                                                        class="btn btn-icon btn-trigger btn-sm btn-delete"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Delete"><em
                                                                            class="icon ni ni-trash-fill"></em></a>
                                                                </td>
                                                                <?php } ?>

                                                                <td><?= $row1['nama_alat']; ?></td>
                                                                <td><?= $row1['merek']; ?></td>
                                                                <td><?= $row1['tipe']; ?></td>
                                                                <td><?= $row1['no_seri']; ?></td>
                                                                <td><?= $row1['kode_inventaris']; ?></td>
                                                                <td><?= $row['kondisi']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                            </div><!-- .card-inner -->
                                        </div><!-- .card -->
                                    </div><!-- .col -->
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
        document.title = 'Peminjaman ' + '<?= $row0['no_proyek']; ?>';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();
            $("#form_name").val("add_berkasteknisi");
            $("#id_berkasteknisi").val('');
            $("#id_alat").val('').focus();
            $("#kondisi").val('');
        });

        $(document).on('click', '.btn-berkasteknisi', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {

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
                                '<span>Simpan</span>'
                            );
                            Swal.fire({
                                icon: "success",
                                title: "Data telah tersimpan.",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            $('.btn-reset').click();
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
                        form_name: "del_berkasteknisi",
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

        $('#id_alat').select2({
            closeOnSelect: false,
            allowClear: true,
            placeholder: "Pilih Alat",
            // escapeMarkup: function(markup) {
            //     return markup;
            // },
            // language: {
            //     noResults: function() {
            //         return "Data tidak ditemukan. <a href='#' class='toggle btn btn-primary btn-add'><span>Add Layanan</span></a>";
            //     }
            // }
        });

        cekDark();
    });

    function proyek_info(uid) {
        let link = 'proyek_detail?uid=' + uid;
        window.open(link, '_self');
    }
    </script>

</body>

</html>