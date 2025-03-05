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
                                            <h3>Data Alat SPK</h3>
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
                                                        value="add_detailspk" />
                                                    <input type="hidden" id="id_detailspk" name="id_detailspk"
                                                        value="0" />
                                                    <input type="hidden" id="id_proyek" name="id_proyek"
                                                        value="<?= $proyekid; ?>" value="<?= $row0['id_proyek']; ?>" />

                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="namabarang_detailspk">Nama
                                                                    Barang</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="namabarang_detailspk"
                                                                        name="namabarang_detailspk" required
                                                                        data-msg="Mohon isi nama barang"
                                                                        placeholder="Nama Barang sesuai Order">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Nama Layanan</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-control-select">
                                                                        <select class="form-control" id="id_layanan"
                                                                            name="id_layanan" required
                                                                            data-msg="Mohon pilih layanan">
                                                                            <?php
                                                            require_once('connect.php');
                                                            $sql = mysqli_query($conn, "SELECT * FROM layanan ORDER BY nama_layanan ASC");
                                                            while ($row = $sql->fetch_assoc()) {
                                                                echo "<option value=" . $row['id_layanan'] . ">" . $row['nama_layanan'] . "</option>";
                                                            }
                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="id_layanan">Pilih
                                                                    Layanan</label>
                                                                <div class="form-control-wrap ">
                                                                    <select
                                                                        class="form-control form-control-lg form-select"
                                                                        data-search="on" id="id_layanan"
                                                                        name="id_layanan" required
                                                                        data-msg="Mohon pilih layanan">
                                                                        <?php                                                        
                                                                    require_once('connect.php');
                                                                    $sql = mysqli_query($conn, "SELECT * FROM layanan ORDER BY nama_layanan ASC");
                                                                    echo "<option value=''>-- layanan --</option>";
                                                                    while ($row = $sql->fetch_assoc()) {
                                                                        echo "<option value=" . $row['id_layanan'] . ">" . $row['nama_layanan'] . "</option>";
                                                                    }
                                                                ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="jumlahbarang_detailspk">Jumlah barang</label>
                                                                <div class="form-control-wrap"><input type="number"
                                                                        class="form-control invalid"
                                                                        id="jumlahbarang_detailspk"
                                                                        name="jumlahbarang_detailspk" min="1" required
                                                                        data-msg="Mohon isi jumlah barang"
                                                                        placeholder="Jumlah barang">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <button
                                                                class="btn btn-primary btn-form-action btn-submit btn-submit-detailspk"><span>Simpan</span></button>
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
                                                                <th>Nama Barang</th>
                                                                <th>Nama Layanan</th>
                                                                <th>Jumlah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                        $sno = 0;
                                                        $query = "SELECT * FROM detailspk WHERE id_proyek = '$proyekid' ORDER BY id_detailspk DESC";
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($result)) {

                                                            $id_layanan = $row['id_layanan'];
                                                            $query1 = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
                                                            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                            $row1 = mysqli_fetch_assoc($result1);

                                                            $sno++;
                                                        ?>
                                                            <tr>
                                                                <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') ) { ?>
                                                                <td>
                                                                    <a href="#"
                                                                        class="dropdown-toggle btn btn-icon btn-trigger btn-xs"
                                                                        data-toggle="dropdown"><em
                                                                            class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-left">
                                                                        <ul class="link-list-opt no-bdr">

                                                                            <li>
                                                                                <a href="#"
                                                                                    id="<?= $row['id_detailspk']; ?>"
                                                                                    class="toggle btn-edit"><em
                                                                                        class="icon ni ni-edit-fill"></em><span>Edit
                                                                                        Alat</span></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    id="<?= $row['id_detailspk']; ?>"
                                                                                    class="toggle btn-delete"><em
                                                                                        class="icon ni ni-trash-fill"></em><span>Delete
                                                                                        Alat</span></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                                <?php } ?>

                                                                <td><?= $row['namabarang_detailspk']; ?></td>
                                                                <td><?= $row1['nama_layanan']; ?></td>
                                                                <td><?= $row['jumlahbarang_detailspk']; ?></td>
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
        document.title = 'Alat SPK ' + '<?= $row0['no_proyek']; ?>';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();
            $("#form_name").val("add_detailspk");
            $("#id_detailspk").val('');
            $("#namabarang_detailspk").val('').focus();
            $("#jumlahbarang_detailspk").val(0);
            $("#id_layanan").val('');
        });

        $(document).on('click', '.btn-submit-detailspk', function(ev) {
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


        $(document).on('click', '.btn-edit', function(ev) {
            ev.preventDefault();
            var tbl_id = $(this).attr("id");

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_detailspk_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    console.log(result);
                    $("#form_name").val("edit_detailspk");
                    $("#id_detailspk").val(result['id_detailspk']);
                    $("#namabarang_detailspk").val(result['namabarang_detailspk']).focus();
                    $("#jumlahbarang_detailspk").val(result['jumlahbarang_detailspk']);
                    $("#id_layanan").val(result['id_layanan']);
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
                        form_name: "del_detailspk",
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


        $('#id_layanan').select2({
            closeOnSelect: false,
            allowClear: true,
            placeholder: "Pilih Layanan",
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