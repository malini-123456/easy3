<?php require_once('session.php'); 
    if ($username) {
        $query_session = "SELECT * FROM user WHERE username = '$username'";
        $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
        $row_session = mysqli_fetch_assoc($result_session);
    }

if (isset($_REQUEST['uid'])) {
    $noso = $_REQUEST['uid'];
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
                                            <h3>Detail Peminjaman</h3>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <button onclick="peminjaman_page()"
                                                class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                                    class="icon ni ni-arrow-left"></em><span>Back</span></button>
                                            <button onclick="peminjaman_page()"
                                                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                                    class="icon ni ni-arrow-left"></em></button>
                                        </div>
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                <!-- <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Teknisi') ) { ?> -->
                                <div class="nk-block nk-block-lg">
                                    <div class="col-md-12 col-lg-12 col-xxl-12">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <!-- <h5>Proyek <?= $row0['no_proyek']; ?></h5><br> -->
                                                    <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                                        novalidate="novalidate">
                                                        <input type="hidden" id="form_name" name="form_name"
                                                            value="add_detailpeminjamanmikropipet" />
                                                        <input type="hidden" id="id_detailpeminjaman"
                                                            name="id_detailpeminjaman" value="0" />
                                                        <input type="hidden" class="form-control" id="kembali"
                                                            name="kembali" value="Dikembalikan" readonly />

                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="no_proyek">No.Proyek</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control"
                                                                            id="no_proyek" name="no_proyek"
                                                                            data-msg="Mohon isi No.Proyek"
                                                                            value="<?= $noso; ?>" required readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12" id="merek_tbn">
                                                                <div class="form-group">
                                                                    <label class="form-label">Merek</label>
                                                                    <div class="form-control-wrap">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control" id="merek"
                                                                                name="merek" required
                                                                                onchange="mikropipet()"
                                                                                data-msg="Mohon pilih mirkopipet">
                                                                                <?php
                                                                                    require_once('connect.php');
                                                                                    $sql = mysqli_query($conn, "SELECT * FROM mikropipet WHERE lokasi='TABANAN' AND id_mikropipet NOT IN (SELECT id_mikropipet FROM detailpeminjamanmikropipet WHERE no_proyek='$noso') ORDER BY merek ASC");
                                                                                    echo "<option value=''>-- Merek --</option>";
                                                                                    while ($row = $sql->fetch_assoc()) {
                                                                                        echo "<option value=" . $row['id_mikropipet'] . ">" . $row['merek'] . ' | ' . $row['no_seri'] . ' | ' . $row['volume'] . "</option>";
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12" id="merek_full">
                                                                <div class="form-group">
                                                                    <label class="form-label">Merek</label>
                                                                    <div class="form-control-wrap">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control" id="merekfull"
                                                                                name="merekfull" onchange="mikropipet()"
                                                                                disabled
                                                                                data-msg="Mohon pilih mirkopipet">
                                                                                <?php
                                                                                    require_once('connect.php');                                                                                    
                                                                                    $sql = mysqli_query($conn, "SELECT * FROM mikropipet ORDER BY merek ASC");
                                                                                    echo "<option value=''>-- Merek --</option>";
                                                                                    while ($row = $sql->fetch_assoc()) {
                                                                                        echo "<option value=" . $row['id_mikropipet'] . ">" . $row['merek'] . ' | ' . $row['no_seri'] . ' | ' . $row['volume'] . "</option>";
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="tipe">Tipe</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control"
                                                                            id="tipe" name="tipe" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="no_seri">No.
                                                                        Seri</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control"
                                                                            id="no_seri" name="no_seri" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="volume">Volume</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control"
                                                                            id="volume" name="volume" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <button
                                                                    class="btn btn-primary btn-form-action btn-submit"><span>Simpan</span></button>
                                                                <a href="#"
                                                                    class="btn btn-danger btn-form-action btn-reset">Clear</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- <?php } ?> -->
                            </div>
                        </div>

                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="col-md-12 col-lg-12 col-xxl-12">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Teknisi') ) { ?>
                                                    <table class="datatable-init-export_action1asc nowrap table"
                                                        data-export-title="Export">
                                                        <?php } else { ?>
                                                        <table class="datatable-init-export_noaction1asc nowrap table"
                                                            data-export-title="Export">
                                                            <?php } ?>
                                                            <thead>
                                                                <tr>
                                                                    <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Teknisi') ) { ?>
                                                                    <th>Action</th>
                                                                    <?php } ?>
                                                                    <th>No. Seri</th>
                                                                    <th>Merek</th>
                                                                    <th>Tipe</th>
                                                                    <th>Volume</th>
                                                                    <th>Kembali</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                        $sno = 0;
                                                        $query = "SELECT * FROM detailpeminjamanmikropipet WHERE no_proyek ='$noso'";
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($result)) {

                                                            $mikropipet_id = $row['id_mikropipet'];
                                                            $query1 = "SELECT * FROM mikropipet WHERE id_mikropipet='$mikropipet_id'";
                                                            $result1 = mysqli_query($conn, $query1) or die(mysql_error());
                                                            $row1 = mysqli_fetch_array($result1);
                                                            
                                                            $sno++;
                                                        ?>
                                                                <tr>
                                                                    <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Teknisi') ) { ?>
                                                                    <td>
                                                                        <a href="#"
                                                                            class="dropdown-toggle btn btn-icon btn-trigger btn-xs"
                                                                            data-toggle="dropdown"><em
                                                                                class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-left">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <?php if ($row['kembali'] != 'Dikembalikan') { ?>
                                                                                <li>
                                                                                    <a href="#"
                                                                                        id="<?= $row['id_detailpeminjaman']; ?>"
                                                                                        class="toggle btn-edit"><em
                                                                                            class="icon ni ni-swap"></em><span>Kembalikan</span></a>
                                                                                </li>
                                                                                <?php } ?>
                                                                                <li>
                                                                                    <a href="#"
                                                                                        id="<?= $row['id_detailpeminjaman']; ?>"
                                                                                        class="toggle btn-delete"><em
                                                                                            class="icon ni ni-trash-fill"></em><span>Delete</span></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                    <?php } ?>

                                                                    <td><?= $row1['no_seri']; ?></td>
                                                                    <td><?= $row1['merek']; ?></td>
                                                                    <td><?= $row1['tipe']; ?></td>
                                                                    <td><?= $row1['volume']; ?></td>

                                                                    <td class="icon-text text-center">
                                                                        <?php if ($row['kembali'] == 'Dikembalikan') { ?>
                                                                        <em
                                                                            class="icon ni ni-check-circle-cut text-success"></em>
                                                                        <?php } else { ?>
                                                                        <em class="icon ni ni-cross text-danger"></em>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
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
        reset();
        document.title = 'Detail Peminjaman Mikropipet';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();
            $("#form_name").val("add_detailpeminjamanmikropipet");
            $("#id_detailpeminjaman").val('');
            $("#no_proyek").val('<?=$noso;?>');
            $("#merek_tbn").show();
            $('#merek_full').hide();

            $("#merek").val('').focus();
            $("#tipe").val('');
            $("#no_seri").val('');
            $("#volume").val('');
        });

        $(document).on('click', '.btn-submit', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            if ($("#hl_form").valid() == true) {

                var form_data = new FormData($('#hl_form')[0]);
                // var form_data = new FormData($('#hl_form')[0]);
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
                            // $('.btn-reset').click();
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
            var tbl_id = $(this).attr("id");

            // $('.btn-reset').trigger('click');
            $("#merek_tbn").hide();
            $("#merek_full").show();

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_detailpeminjamanmikropipet_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_detailpeminjamanmikropipet");
                    $("#id_detailpeminjaman").val(result['id_detailpeminjaman']);
                    $("#no_proyek").val('<?=$noso;?>');
                    $('#merekfull').val(result['id_mikropipet']);
                    $("#kembali").val('Dikembalikan');
                    mikropipet();
                    $('.btn-submit').trigger('click');
                    // setTimeout(function() {
                    //     location.reload();
                    // }, 2000);
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
                        form_name: "del_detailpeminjamanmikropipet",
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

    function peminjaman_page(uid) {
        let link = 'peminjaman';
        window.open(link, '_self');
    }

    function reset() {
        $("#form_name").val("add_detailpeminjamanmikropipet");
        $("#id_detailpeminjaman").val('');
        $("#no_proyek").val('<?=$noso;?>');
        $("#merek_tbn").show();
        $('#merek_full').hide();

        $("#merek").val('').focus();
        $("#tipe").val('');
        $("#no_seri").val('');
        $("#volume").val('');
    }

    function mikropipet() {
        let id = '';
        if ($("#merek").is(':visible')) {
            id = $("#merek").val();
        } else {
            id = $("#merekfull").val();
        }
        // let id = id_customer;
        if (id !== '') {
            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_mikropipet_details",
                    tbl_id: id
                }, // post data || get data
                success: function(result) {
                    if ($("#merek").is(':visible')) {
                        $("#merek").val(result['id_mikropipet']).focus();
                    } else {
                        $("#merekfull").val(result['id_mikropipet']).focus();
                    }
                    $("#tipe").val(result['tipe']);
                    $("#no_seri").val(result['no_seri']);
                    $("#volume").val(result['volume']);
                    // $('.btn-add').click();
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        } else {
            reset();
        }
    }
    </script>

</body>

</html>