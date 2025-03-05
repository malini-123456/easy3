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

    if ($row0['status1_proyek'] == 3) $edit = 1;
    else $edit = 0;
} else {
    header("location:home");
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
                                            <h3>Data Salinan Sertifikat</h3>
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
                                                    <table class="datatable-init-export_action1desc nowrap table"
                                                        data-export-title="Export">
                                                        <thead>
                                                            <tr>
                                                                <th>Action</th>
                                                                <th>No.Proyek</th>
                                                                <th>No.Pesanan</th>
                                                                <th>Tahun</th>
                                                                <th>Ruangan</th>
                                                                <th>Progress</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sno = 0;
                                                            $query = "SELECT * FROM sertifikat WHERE id_proyek = '$proyekid' ORDER BY id_sertifikat DESC";
                                                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                            while ($row = mysqli_fetch_array($result)) {

                                                                $id_proyek = $row['id_proyek'];
                                                                $query2 = "SELECT * FROM proyek WHERE id_proyek = '$id_proyek'";
                                                                $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                                                $row2 = mysqli_fetch_assoc($result2);

                                                                $id_pelanggan = $row2['id_pelanggan'];
                                                                $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
                                                                $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                                $row1 = mysqli_fetch_assoc($result1);

                                                                $sno++;
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <a href="#"
                                                                        class="dropdown-toggle btn btn-icon btn-trigger btn-xs"
                                                                        data-toggle="dropdown"><em
                                                                            class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-left">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li>
                                                                                <a href="#"
                                                                                    onclick="sertifikat_qr('<?= $row1['nama_pelanggan']; ?>')"
                                                                                    class="toggle"><em
                                                                                        class="icon ni ni-qr"></em><span>QR
                                                                                        Code</span></a>
                                                                            </li>
                                                                            <?php if ($row['progress_sertifikat'] != 'Belum Diarsip') { ?>
                                                                            <li>
                                                                                <a href="<?= $row['link_sertifikat']; ?>"
                                                                                    target="_blank" class="toogle"><em
                                                                                        class="icon ni ni-file-pdf"></em><span>PDF</span></a>
                                                                            </li>
                                                                            <?php }
                                                                                if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum')) { ?>
                                                                            <?php if ($edit == 1) { ?>
                                                                            <li>
                                                                                <a href="#"
                                                                                    id="<?= $row['id_sertifikat']; ?>"
                                                                                    data-target="addSertifikat"
                                                                                    data-dismiss="modal"
                                                                                    class="toggle btn-edit"><em
                                                                                        class="icon ni ni-edit-fill"></em><span>Edit
                                                                                        Sertifikat</span></a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    id="<?= $row['id_sertifikat']; ?>"
                                                                                    class="toggle btn-delete"><em
                                                                                        class="icon ni ni-trash-fill"></em><span>Delete
                                                                                        Sertifikat</span></a>
                                                                            </li>
                                                                            <?php }
                                                                                } ?>
                                                                        </ul>
                                                                    </div>
                                                                </td>

                                                                <td><?= $row2['no_proyek']; ?></td>
                                                                <td><?= $row['nopesanan_sertifikat']; ?></td>
                                                                <td><?= substr($row2['no_proyek'], 7, 4); ?>
                                                                </td>
                                                                <td><?= $row['ruangan_sertifikat']; ?></td>
                                                                <td><?= $row['progress_sertifikat']; ?></td>
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

                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addSertifikat"
                                    data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true"
                                    data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Edit Sertifikat</h5>
                                            <div class="nk-block-des productDes">
                                                <p>Tambahkan informasi sertifikat.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                            novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name"
                                                value="adit_sertifikat" />
                                            <input type="hidden" id="id_sertifikat" name="id_sertifikat" value="0" />

                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="nopesanan_sertifikat">No.Pesanan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control ff-italic"
                                                                id="nopesanan_sertifikat" name="nopesanan_sertifikat"
                                                                readonly placeholder="*Auto Generate by Code">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">No.Proyek</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="id_proyek"
                                                                    name="id_proyek" required
                                                                    data-msg="Mohon pilih proyek">
                                                                    <?= "<option value=" . $row0['id_proyek'] . ">" . $row0['no_proyek'] . "</option>"; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="progress_sertifikat">Progress</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"
                                                                id="progress_sertifikat" name="progress_sertifikat"
                                                                Value="Sudah Diarsip" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="ruangan_sertifikat">Nama
                                                            Ruangan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid"
                                                                id="ruangan_sertifikat" name="ruangan_sertifikat"
                                                                required placeholder="Nama Ruangan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="link_sertifikat">Link
                                                            Sertifikat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="link_sertifikat"
                                                                name="link_sertifikat" required
                                                                data-msg="Mohon isi link" placeholder="Link sertifikat">
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
        reset();
        document.title = 'Sertifikat ' + '<?= $row0['no_proyek']; ?>';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();
            $("#form_name").val("edit_sertifikat");
            $("#id_sertifikat").val('');
            $("#id_proyek").val('<?= $proyekid; ?>');
            $("#ruangan_sertifikat").val('');
            $("#nopesanan_sertifikat").val('').focus();
            $("#progress_sertifikat").val('Sudah Diarsip');
            $("#link_sertifikat").val('');
            $(".btn-submit").hide();
            $('#id_proyek').prop('disabled', true);
            $('#ruangan_sertifikat').prop('disabled', true);
        });

        $(document).on('click', '.btn-submit', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

            $('#id_proyek').prop('disabled', false);
            $('#ruangan_sertifikat').prop('disabled', false);

            if ($("#hl_form").valid() == true) {
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

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_sertifikat_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // console.log(result);
                    $("#form_name").val("edit_sertifikat");
                    $("#id_sertifikat").val(result['id_sertifikat']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#ruangan_sertifikat").val(result['ruangan_sertifikat']);
                    $("#nopesanan_sertifikat").val(result['nopesanan_sertifikat']);
                    $("#progress_sertifikat").val('Sudah Diarsip');
                    $("#link_sertifikat").val(result['link_sertifikat']);
                    $(".btn-submit").show();
                    $('#id_proyek').prop('disabled', true);
                    $('#ruangan_sertifikat').prop('disabled', true);
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
                        form_name: "del_sertifikat",
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

    function proyek_info(uid) {
        let link = 'proyek_detail?uid=' + uid;
        window.open(link, '_self');
    }

    function reset() {
        $("#form_name").val("edit_sertifikat");
        $("#id_sertifikat").val('');
        $("#id_proyek").val('<?= $proyekid; ?>');
        $("#ruangan_sertifikat").val('');
        $("#nopesanan_sertifikat").val('').focus();
        $("#progress_sertifikat").val('Sudah Diarsip');
        $("#link_sertifikat").val('');
        $(".btn-submit").hide();
        $('#id_proyek').prop('disabled', true);
        $('#ruangan_sertifikat').prop('disabled', true);
    }

    function sertifikat_qr(namapelanggan) {
        // let note = 'malini;;' + idpemilik + ';;' + nopesanan;
        // let key = "malinicakep";
        // let ciphertext = btoa(CryptoJS.AES.encrypt(note, key).toString());
        let url = 'https://pt-einsten.com/easy2/sertifikat_user?pel=' + namapelanggan;
        url = url.replace(/ /g, '%20');
        console.log(url);

        window.qrcode = new QrCodeWithLogo({
            content: url,
            width: 380,
            logo: {
                src: "./images/img/ens10.png",
                logoSize: 0.2,
                borderRadius: 100
            },
            // nodeQrCodeOptions: {
            // 	errorCorrectionLevel: "H"
            // }
        });
        qrcode.downloadImage(namapelanggan + '.png');
    }
    </script>

</body>

</html>