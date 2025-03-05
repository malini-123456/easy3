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
                                            <h3 class="nk-block-title page-title">Data Mikropipet</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum') || ($row_session['posisi_user'] == 'Admin Teknis') || ($row_session['posisi_user'] == 'PJ Teknis') ) { ?>
                                            <a href="#" data-target="addMikropipet"
                                                class="toggle btn btn-primary btn-reset"><em
                                                    class="icon ni ni-plus"></em><span>Add Mikropipet</span></a>
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
                                                        <th>Merek</th>
                                                        <th>Tipe</th>
                                                        <th>No Seri</th>
                                                        <th>Volume</th>
                                                        <th>Lokasi</th>
                                                        <th>Penyedia</th>
                                                        <th>Tgl. Kalibrasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sno = 0;
                                                    $query = "SELECT * FROM mikropipet ORDER BY id_mikropipet DESC";
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
                                                                            onclick="mikropipet_qr('<?=$row['id_mikropipet'];?>')"
                                                                            class="toggle"><em
                                                                                class="icon ni ni-qr"></em><span>QR
                                                                                Code</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"
                                                                            onclick="mikropipet_info(<?= $row['id_mikropipet']; ?>)"
                                                                            class="toggle"><em
                                                                                class="icon ni ni-info-fill"></em><span>Detail
                                                                                Mikropipet</span></a>
                                                                    </li>
                                                                    <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum') || ($row_session['posisi_user'] == 'Admin Teknis') || ($row_session['posisi_user'] == 'PJ Teknis') ) { ?>
                                                                    <li>
                                                                        <a href="#" id="<?= $row['id_mikropipet']; ?>"
                                                                            data-target="addMikropipet"
                                                                            data-dismiss="modal"
                                                                            class="toggle btn-edit"><em
                                                                                class="icon ni ni-edit-fill"></em><span>Edit
                                                                                Mikropipet</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" id="<?= $row['id_mikropipet']; ?>"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            class="toggle btn-delete"><em
                                                                                class="icon ni ni-trash-fill"></em><span>Delete
                                                                                Mikropipet</span></a>
                                                                    </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <td><?= $row['merek']; ?></td>
                                                        <td><?= $row['tipe']; ?></td>
                                                        <td><?= $row['no_seri']; ?></td>
                                                        <td><?= $row['volume']; ?></td>
                                                        <td><?= $row['lokasi']; ?></td>
                                                        <td><?= $row['penyedia']; ?></td>
                                                        <?php if ($row['tgl_kalibrasi'] == '0000-00-00') { ?>
                                                        <td><?= '-'; ?></td>
                                                        <?php } else { ?>
                                                        <td><?= $row['tgl_kalibrasi']; ?></td>
                                                        <?php } ?>
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
                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addMikropipet"
                                    data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true"
                                    data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Alat Mikropipet Baru</h5>
                                            <div class="nk-block-des productDes">
                                                <p>Tambahkan informasi alat mikropipet baru.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                            novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name"
                                                value="add_mikropipet" />
                                            <input type="hidden" id="id_mikropipet" name="id_mikropipet" value="0" />

                                            <div class="row g-3">

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="merek">Merek
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="merek"
                                                                name="merek" placeholder="merek" required
                                                                data-msg="Mohon isi merek">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tipe">Tipe
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="tipe"
                                                                name="tipe" placeholder="tipe" required
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
                                                                name="no_seri" placeholder="no_seri" required
                                                                data-msg="Mohon isi no seri">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="volume">Volume</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="volume" name="volume"
                                                                    required data-msg="Mohon pilih volume">
                                                                    <option value="0.5-10">0.5-10</option>
																	<option value="5-50">5-50</option>
                                                                    <option value="10-100">10-100</option>
                                                                    <option value="100-1000">100-1000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="tgl_kalibrasi">Tgl. Kalibrasi
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-calendar-booking"></em>
                                                            </div>
                                                            <input type="text" class="form-control date-picker invalid"
                                                                data-date-format="yyyy-mm-dd" id="tgl_kalibrasi"
                                                                name="tgl_kalibrasi" placeholder="tgl_kalibrasi">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="penyedia">Penyedia
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid"
                                                                id="penyedia" name="penyedia" placeholder="penyedia"
                                                                required data-msg="Mohon isi penyedia">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="lokasi">Lokasi
                                                        </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="lokasi"
                                                                name="lokasi" placeholder="lokasi" required
                                                                data-msg="Mohon isi lokasi">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="link_mikropipet">Link Gambar
                                                            Mikropipet</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control invalid" id="link_mikropipet"
                                                                name="link_mikropipet"
                                                                placeholder="Link Gambar Mikropipet (min 2 gambar pisahkan dengan ;;)"
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
        document.title = 'Data Mikropipet';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();

            $("#form_name").val("add_mikropipet");
            $("#id_mikropipet").val('');
            $("#merek").val('');
            $("#tipe").val('');
            $("#no_seri").val('');
            $("#volume").val('');
            $("#lokasi").val('');
            $("#penyedia").val('');
            $("#tgl_kalibrasi").val('');
            $("#link_mikropipet").val('');
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
                    cmd: "get_mikropipet_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    console.log(result);
                    $("#form_name").val("edit_mikropipet");
                    $("#id_mikropipet").val(result['id_mikropipet']);
                    $("#merek").val(result['merek']);
                    $("#tipe").val(result['tipe']);
                    $("#no_seri").val(result['no_seri']);
                    $("#volume").val(result['volume']);
                    $("#lokasi").val(result['lokasi']);
                    $("#penyedia").val(result['penyedia']);
                    $("#tgl_kalibrasi").val(result['tgl_kalibrasi']);
                    $("#link_mikropipet").val(result['link_mikropipet']);
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
                        form_name: "del_mikropipet",
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

    function mikropipet_info(uid) {
        let link = 'mikropipet_detail?uid=' + uid;
        window.open(link, '_self');
    }

    function mikropipet_qr(idmikropipet) {
        let url = 'https://pt-einsten.com/easy3/mikropipet_info?uid=' + idmikropipet;
        console.log(url);

        window.qrcode = new QrCodeWithLogo({
            content: url,
            // content: 'BEGIN:VCARD\r\nVERSION:3.0\r\nFN:Ni Nyoman Sri Malini\r\nTEL;HOME;VOICE:08123456789\r\nEMAIL:malini@pt-einsten.com\r\nORG:PT. Elektromedika Instrumen Tera Nusantara\r\nTITLE:Admin\r\nURL:https://www.pt-einsten.com\r\nEND:VCARD',
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
        qrcode.downloadImage('mikropipet_' + idmikropipet + '.png');
    }
    </script>

</body>

</html>