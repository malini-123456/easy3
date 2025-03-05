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
                                            <h3 class="nk-block-title page-title">Data Alat Kalibrator</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'PJ Teknis')) { ?>
                                            <a href="#" data-target="addAlat"
                                                class="toggle btn btn-primary btn-reset"><em
                                                    class="icon ni ni-plus"></em><span>Add Alat</span></a>
                                            <?php } ?>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init-export_action1asc nowrap table"
                                                data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Nama Alat</th>
                                                        <th>Merek</th>
                                                        <th>Tipe</th>
                                                        <th>No Seri</th>
                                                        <th>Kode Inventaris</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sno = 0;
                                                    $query = "SELECT * FROM alatkalibrasi ORDER BY id_alat DESC";
                                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                    while ($row = mysqli_fetch_array($result)) {
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
                                                                            onclick="alat_qr('<?= $row['id_alat']; ?>')"
                                                                            class="toggle"><em
                                                                                class="icon ni ni-qr"></em><span>QR
                                                                                Code</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"
                                                                            onclick="alat_info(<?= $row['id_alat']; ?>)"
                                                                            class="toggle"><em
                                                                                class="icon ni ni-info-fill"></em><span>Detail
                                                                                Alat</span></a>
                                                                    </li>
                                                                    <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'PJ Teknis')) { ?>
                                                                    <li>
                                                                        <a href="#" id="<?= $row['id_alat']; ?>"
                                                                            data-target="addAlat" data-dismiss="modal"
                                                                            class="toggle btn-edit"><em
                                                                                class="icon ni ni-edit-fill"></em><span>Edit
                                                                                Alat</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" id="<?= $row['id_alat']; ?>"
                                                                            class="toggle btn-delete"><em
                                                                                class="icon ni ni-trash-fill"></em><span>Delete
                                                                                Alat</span></a>
                                                                    </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="user-info">
                                                                <a href="#"
                                                                    onclick="alat_info(<?= $row['id_alat']; ?>)">
                                                                    <span
                                                                        class="text-primary text-capitalize"><?= $row['nama_alat']; ?></span>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td><?= $row['merek']; ?></td>
                                                        <td><?= $row['tipe']; ?></td>
                                                        <td><?= $row['no_seri']; ?></td>
                                                        <td><?= $row['kode_inventaris']; ?></td>
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
                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addAlat"
                                    data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true"
                                    data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Alat Kalibrator Baru</h5>
                                            <div class="nk-block-des productDes">
                                                <p>Tambahkan informasi alat kalibrator baru.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                            novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name" value="add_alat" />
                                            <input type="hidden" id="id_alat" name="id_alat" value="0" />

                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nama_alat">Nama
                                                            Alat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid"
                                                                id="nama_alat" name="nama_alat" placeholder="Nama Alat"
                                                                required data-msg="Mohon isi nama alat">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="merek">merek
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="merek"
                                                                name="merek" placeholder="Merek" required
                                                                data-msg="Mohon isi merek">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tipe">tipe
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="tipe"
                                                                name="tipe" placeholder="Tipe" required
                                                                data-msg="Mohon isi tipe">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="no_seri">No Seri
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="no_seri"
                                                                name="no_seri" placeholder="No Seri" required
                                                                data-msg="Mohon isi no seri">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kode_inventaris">Kode Inventaris
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid"
                                                                id="kode_inventaris" name="kode_inventaris"
                                                                placeholder="Kode Inventaris" required
                                                                data-msg="Mohon isi kode">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="harga">Harga
                                                            Beli</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-sign-idr"></em>
                                                            </div>
                                                            <input type="number" min="0" class="form-control invalid"
                                                                id="harga" name="harga" placeholder="Harga Beli">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="penyedia">Penyedia
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid"
                                                                id="penyedia" name="penyedia" placeholder="Penyedia"
                                                                required data-msg="Mohon isi penyedia">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="rentang_ukur">Rentang Ukur
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid"
                                                                id="rentang_ukur" name="rentang_ukur"
                                                                placeholder="Rentang Ukur">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="resolusi">Resolusi
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid"
                                                                id="resolusi" name="resolusi" placeholder="Resolusi">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tgl_diterima">Tgl. Diterima
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-booking"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker invalid"
                                                                data-date-format="yyyy-mm-dd" id="tgl_diterima"
                                                                name="tgl_diterima" placeholder="Tgl Diterima" required
                                                                data-msg="Mohon isi tgl_diterima">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tgl_kalibrasi">Tgl. Kalibrasi
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-booking"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker invalid"
                                                                data-date-format="yyyy-mm-dd" id="tgl_kalibrasi"
                                                                name="tgl_kalibrasi" placeholder="Tgl Kalibrasi">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="doc_alat">Link Dokumen Alat
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid"
                                                                id="doc_alat" name="doc_alat"
                                                                placeholder="Dokumen Alat">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="link_alat">Link Gambar
                                                            Alat</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control invalid" id="link_alat"
                                                                name="link_alat"
                                                                placeholder="Link Gambar Alat (min 2 gambar pisahkan dengan ;;)"
                                                                required data-msg="Mohon isi link gambar"></textarea>
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
        document.title = 'Data Alat';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();

            $("#form_name").val("add_alat");
            $("#id_alat").val('');
            $("#nama_alat").val('');
            $("#merek").val('');
            $("#tipe").val('');
            $("#no_seri").val('');
            $("#kode_inventaris").val('');
            $("#harga").val('');
            $("#penyedia").val('');
            $("#rentang_ukur").val('');
            $("#resolusi").val('');
            $("#tgl_diterima").val('');
            $("#tgl_kalibrasi").val('');
            $("#link_alat").val('');
            $("#doc_alat").val('');
        });

        $(document).on('click', '.btn-submit', function(ev) {
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
            var tbl_id = $(this).attr("id");

            $.ajax({
                cache: false,
                url: 'get_ajax_details.php', // url where to submit the request
                type: "GET", // type of action POST || GET
                dataType: 'json', // data type
                data: {
                    cmd: "get_alat_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    console.log(result);
                    $("#form_name").val("edit_alat");
                    $("#id_alat").val(result['id_alat']);
                    $("#nama_alat").val(result['nama_alat']);
                    $("#merek").val(result['merek']);
                    $("#tipe").val(result['tipe']);
                    $("#no_seri").val(result['no_seri']);
                    $("#kode_inventaris").val(result['kode_inventaris']);
                    $("#harga").val(result['harga']);
                    $("#penyedia").val(result['penyedia']);
                    $("#rentang_ukur").val(result['rentang_ukur']);
                    $("#resolusi").val(result['resolusi']);
                    $("#tgl_diterima").val(result['tgl_diterima']);
                    $("#tgl_kalibrasi").val(result['tgl_kalibrasi']);
                    $("#link_alat").val(result['link_alat']);
                    $("#doc_alat").val(result['doc_alat']);
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
                        form_name: "del_alat",
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

    function alat_info(uid) {
        let link = 'alat_detail?uid=' + uid;
        window.open(link, '_self');
    }

    function alat_qr(idalat) {
        let url = 'https://pt-einsten.com/easy3/alat_info?uid=' + idalat;
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
        qrcode.downloadImage('alat_' + idalat + '.png');
    }
    </script>

</body>

</html>