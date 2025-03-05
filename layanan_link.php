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
                                            <h3 class="nk-block-title page-title">Data Layanan</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'PJ Teknis')) { ?>
                                                <a href="#" data-target="addLayanan" class="toggle btn btn-primary btn-reset"><em class="icon ni ni-plus"></em><span>Add Layanan</span></a>
                                            <?php } ?>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'PJ Teknis')) { ?>
                                                <table class="datatable-init-export_action1asc wrap table" data-export-title="Export">
                                                <?php } else { ?>
                                                    <table class="datatable-init-export_action1asc wrap table" data-export-title="Export">
                                                    <?php } ?>
                                                    <thead>
                                                        <tr>
                                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'PJ Teknis')) { ?>
                                                                <th>Action</th>
                                                            <?php } else { ?>
                                                                <th>Link</th>
                                                            <?php } ?>
                                                            <th>Nama</th>
                                                            <th>Waktu</th>
                                                            <th>Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sno = 0;
                                                        $query = "SELECT * FROM layanan ORDER BY id_layanan DESC";
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $sno++;
                                                        ?>
                                                            <tr>
                                                                <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'PJ Teknis')) { ?>
                                                                    <td>
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger btn-xs" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-left">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <?php if ($row['link_layanan'] != '') { ?>
                                                                                        <a href="<?= $row['link_layanan']; ?>" target="_blank" class="toogle">
                                                                                            <em class="icon ni ni-download"></em>
                                                                                            <span>Link Dokumen</span>
                                                                                        </a>
                                                                                    <?php } else { ?>
                                                                                        <a href="#" class="toogle">
                                                                                            <em class="icon ni ni-na"></em>
                                                                                            <span>Link Dokumen</span>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" id="<?= $row['id_layanan']; ?>" data-target="addLayanan" data-dismiss="modal" class="toggle btn-edit"><em class="icon ni ni-edit-fill"></em><span>Edit
                                                                                            Layanan</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" id="<?= $row['id_layanan']; ?>" class="toggle btn-delete"><em class="icon ni ni-trash-fill"></em><span>Delete
                                                                                            Layanan</span></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                <?php } else { ?>
                                                                    <td>
                                                                        <?php if ($row['link_layanan'] != '') { ?>
                                                                            <a href="<?= $row['link_layanan']; ?>" target="_blank" class="toogle" data-toggle="tooltip" data-placement="top" title="Doc">
                                                                                <em class="icon ni ni-download"></em>
                                                                            </a>
                                                                        <?php } else { ?>
                                                                            <a href="#" class="toogle" data-toggle="tooltip" data-placement="top" title="NA">
                                                                                <em class="icon ni ni-na"></em>
                                                                            </a>
                                                                        <?php } ?>
                                                                    </td>
                                                                <?php } ?>
                                                                <td><?= $row['nama_layanan']; ?></td>
                                                                <td><?= $row['waktu_layanan']; ?></td>
                                                                <td><?= 'Rp. ' . number_format($row['harga_layanan'], 0); ?></td>
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
                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addLayanan" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Layanan Baru</h5>
                                            <div class="nk-block-des productDes">
                                                <p>Tambahkan informasi layanan baru.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <form id="hl_form" name="hl_form" class="form-validate is-alter" novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name" value="add_layanan" />
                                            <input type="hidden" id="id_layanan" name="id_layanan" value="0" />

                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nama_layanan">Nama
                                                            layanan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="nama_layanan" name="nama_layanan" placeholder="Nama layanan" required data-msg="Mohon isi nama layanan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="waktu_layanan">Waktu
                                                            Layanan</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-alarm-alt"></em>
                                                            </div>
                                                            <input type="number" min="0" class="form-control invalid" id="waktu_layanan" name="waktu_layanan" placeholder="Waktu layanan" required data-msg="Mohon isi waktu layanan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="harga_layanan">Harga
                                                            Layanan</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-sign-idr"></em>
                                                            </div>
                                                            <input type="number" min="0" class="form-control invalid" id="harga_layanan" name="harga_layanan" placeholder="Harga layanan" required data-msg="Mohon isi harga layanan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="link_layanan">Link
                                                            layanan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="link_layanan" name="link_layanan" placeholder="Link layanan" required data-msg="Mohon isi link layanan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-form-action btn-submit"><em class="icon ni ni-plus"></em><span>Simpan</span></button>
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
            document.title = 'Data layanan';

            $("#hl_form").validate({
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $(document).on('click', '.btn-reset', function(ev) {
                ev.preventDefault();

                $('.productTitle').text('Layanan Baru');
                $('.productDes').html('<p>Tambahkan informasi layanan baru.</p>');
                // console.log($("#namalengkap_user").val());
                $("#form_name").val("add_layanan");
                $("#id_layanan").val('');
                $("#nama_layanan").val('');
                $("#waktu_layanan").val('');
                $("#harga_layanan").val('');
                $("#link_layanan").val('');
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
                // $('.nk-add-layanan').addClass('content-active');
                // $('.nk-content-body').append('<div class="toggle-overlay" data-target="addLayanan"></div>');
                $('.productTitle').text('Edit layanan');
                $('.productDes').html('<p>Edit layanan.</p>');

                // var btn_button = $(this);
                // btn_button.html('<i class="fas fa-spinner fa-spin"></i>');
                var tbl_id = $(this).attr("id");

                $.ajax({
                    cache: false,
                    url: 'get_ajax_details.php', // url where to submit the request
                    type: "GET", // type of action POST || GET
                    dataType: 'json', // data type
                    data: {
                        cmd: "get_layanan_details",
                        tbl_id: tbl_id
                    }, // post data || get data
                    success: function(result) {
                        // btn_button.html(
                        //     '<em class="icon ni ni-edit"></em><span>Edit layanan</span>'
                        // );
                        console.log(result);
                        $("#form_name").val("edit_layanan");
                        $("#id_layanan").val(result['id_layanan']);
                        $("#nama_layanan").val(result['nama_layanan']);
                        $("#waktu_layanan").val(result['waktu_layanan']);
                        $("#harga_layanan").val(result['harga_layanan']);
                        $("#link_layanan").val(result['link_layanan']);
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
                            form_name: "del_layanan",
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
    </script>

</body>

</html>