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

    $status_proyek = $row0['status_proyek'];
    $query2 = "SELECT * FROM status_proyek WHERE id_status =  '$status_proyek'";
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
                                            <h3>Verifikasi Pembelian Subkontrak</h3>
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
                                <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum') ) { ?>
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <div class="preview-block">
                                                <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                                    novalidate="novalidate">
                                                    <input type="hidden" id="form_name" name="form_name"
                                                        value="add_verifikasibelisubkontrak" />
                                                    <input type="hidden" id="id_verifikasibelisubkontrak"
                                                        name="id_verifikasibelisubkontrak " value="0" />
                                                    <input type="hidden" id="id_proyek" name="id_proyek"
                                                        value="<?= $proyekid; ?>" value="<?= $row0['id_proyek']; ?>" />

                                                    <div class="row g-3">

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="namaproduk_verifikasibelisubkontrak">Nama
                                                                    Produk/Jasa</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control invalid"
                                                                        id="namaproduk_verifikasibelisubkontrak"
                                                                        name="namaproduk_verifikasibelisubkontrak"
                                                                        placeholder="Nama Produk/Jasa" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="penyedia_verifikasibelisubkontrak">Nama
                                                                    Penyedia</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control invalid"
                                                                        id="penyedia_verifikasibelisubkontrak"
                                                                        name="penyedia_verifikasibelisubkontrak"
                                                                        placeholder="Nama Penyedia" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="nopo_verifikasibelisubkontrak">No PO</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control invalid"
                                                                        id="nopo_verifikasibelisubkontrak"
                                                                        name="nopo_verifikasibelisubkontrak"
                                                                        placeholder="No PO" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="noinvoice_verifikasibelisubkontrak">No
                                                                    Invoice</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control invalid"
                                                                        id="noinvoice_verifikasibelisubkontrak"
                                                                        name="noinvoice_verifikasibelisubkontrak"
                                                                        placeholder="No Invoice" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="jumlah_verifikasibelisubkontrak"
                                                                        name="jumlah_verifikasibelisubkontrak"
                                                                        value='Memenuhi' onchange="jumlah_cek()"
                                                                        checked>
                                                                    <label class="custom-control-label"
                                                                        for="jumlah_verifikasibelisubkontrak">Jumlah
                                                                        <code>(Memenuhi)</code></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="spesifikasi_verifikasibelisubkontrak"
                                                                        name="spesifikasi_verifikasibelisubkontrak"
                                                                        value='Memenuhi' onchange="spesifikasi_cek()"
                                                                        checked>
                                                                    <label class="custom-control-label"
                                                                        for="spesifikasi_verifikasibelisubkontrak">Spesifikasi
                                                                        <code>(Memenuhi)</code></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="kondisi_verifikasibelisubkontrak"
                                                                        name="kondisi_verifikasibelisubkontrak"
                                                                        value='Memenuhi' onchange="kondisi_cek()"
                                                                        checked>
                                                                    <label class="custom-control-label"
                                                                        for="kondisi_verifikasibelisubkontrak">Kondisi
                                                                        <code>(Memenuhi)</code></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="invoice_verifikasibelisubkontrak"
                                                                        name="invoice_verifikasibelisubkontrak"
                                                                        value='Ada' onchange="invoice_cek()" checked>
                                                                    <label class="custom-control-label"
                                                                        for="invoice_verifikasibelisubkontrak">Invoice
                                                                        <code>(Ada)</code></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="fakturpajak_verifikasibelisubkontrak"
                                                                        name="fakturpajak_verifikasibelisubkontrak"
                                                                        value='Ada' onchange="fakturpajak_cek()"
                                                                        checked>
                                                                    <label class="custom-control-label"
                                                                        for="fakturpajak_verifikasibelisubkontrak">Faktur
                                                                        Pajak
                                                                        <code>(Ada)</code></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="garansi_verifikasibelisubkontrak"
                                                                        name="garansi_verifikasibelisubkontrak"
                                                                        value='Ada' onchange="garansi_cek()" checked>
                                                                    <label class="custom-control-label"
                                                                        for="garansi_verifikasibelisubkontrak">Garansi
                                                                        <code>(Ada)</code></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="catatan_verifikasibelisubkontrak">Catatan</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control"
                                                                        id="catatan_verifikasibelisubkontrak"
                                                                        name="catatan_verifikasibelisubkontrak"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-3">
                                                            <div class="form-group">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="keputusan_verifikasibelisubkontrak"
                                                                        name="keputusan_verifikasibelisubkontrak"
                                                                        value='Diterima' onchange="keputusan_cek()"
                                                                        checked>
                                                                    <label class="custom-control-label"
                                                                        for="keputusan_verifikasibelisubkontrak">Keputusan
                                                                        <code>(Diterima)</code></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <button
                                                                class="btn btn-primary btn-form-action btn-submit btn-verifikasi"><span>Simpan</span></button>
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
                                                <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum') ) { ?>
                                                <table class="datatable-init-export_action1asc nowrap table"
                                                    data-export-title="Export">
                                                    <?php } else { ?>
                                                    <table class="datatable-init-export_noaction1asc nowrap table"
                                                        data-export-title="Export">
                                                        <?php } ?>
                                                        <thead>
                                                            <tr>
                                                                <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum') ) { ?>
                                                                <th>Action</th>
                                                                <?php } ?>
                                                                <th>Nama Produk/Jasa</th>
                                                                <th>Nama Penyedia</th>
                                                                <th>No PO</th>
                                                                <th>No Invoice</th>
                                                                <th>Jumlah</th>
                                                                <th>Spesifikasi</th>
                                                                <th>Kondisi</th>
                                                                <th>Invoice</th>
                                                                <th>Faktur Pajak</th>
                                                                <th>Garansi</th>
                                                                <th>Catatan</th>
                                                                <th>Keputusan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                    $sno = 0;
                                                    $query = "SELECT * FROM verifikasibelisubkontrak WHERE id_proyek='$proyekid' ORDER BY id_verifikasibelisubkontrak DESC";
                                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $sno++;
                                                    ?>
                                                            <tr>
                                                                <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Umum') ) { ?>
                                                                <td>
                                                                    <a href="#"
                                                                        id="<?= $row['id_verifikasibelisubkontrak']; ?>"
                                                                        class="btn btn-icon btn-trigger btn-sm btn-delete del_verifikasibelisubkontrak"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Delete"><em
                                                                            class="icon ni ni-trash-fill"></em></a>
                                                                </td>
                                                                <?php } ?>

                                                                <td><?= $row['namaproduk_verifikasibelisubkontrak']; ?>
                                                                </td>
                                                                <td><?= $row['penyedia_verifikasibelisubkontrak']; ?>
                                                                </td>
                                                                <td><?= $row['nopo_verifikasibelisubkontrak']; ?></td>
                                                                <td><?= $row['noinvoice_verifikasibelisubkontrak']; ?>
                                                                </td>
                                                                <td><?= $row['jumlah_verifikasibelisubkontrak']; ?></td>
                                                                <td><?= $row['spesifikasi_verifikasibelisubkontrak']; ?>
                                                                </td>
                                                                <td><?= $row['kondisi_verifikasibelisubkontrak']; ?>
                                                                </td>
                                                                <td><?= $row['invoice_verifikasibelisubkontrak']; ?>
                                                                </td>
                                                                <td><?= $row['fakturpajak_verifikasibelisubkontrak']; ?>
                                                                </td>
                                                                <td><?= $row['garansi_verifikasibelisubkontrak']; ?>
                                                                </td>
                                                                <td><?= $row['catatan_verifikasibelisubkontrak']; ?>
                                                                </td>
                                                                <td><?= $row['keputusan_verifikasibelisubkontrak']; ?>
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
        document.title = 'Verifikasi Pembelian ' + '<?= $row0['no_proyek']; ?>';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();
            $("#form_name").val("add_verifikasibelisubkontrak");
            $("#id_verifikasibelisubkontrak").val('');
            $("#namaproduk_verifikasibelisubkontrak").val('');
            $("#penyedia_verifikasibelisubkontrak").val('');
            $("#nopo_verifikasibelisubkontrak").val('');
            $("#noinvoice_verifikasibelisubkontrak").val('');
            $("#jumlah_verifikasibelisubkontrak").val('Memenuhi');
            $("#spesifikasi_verifikasibelisubkontrak").val('Memenuhi');
            $("#kondisi_verifikasibelisubkontrak").val('Memenuhi');
            $("#invoice_verifikasibelisubkontrak").val('Ada');
            $("#fakturpajak_verifikasibelisubkontrak").val('Ada');
            $("#garansi_verifikasibelisubkontrak").val('Ada');
            $("#catatan_verifikasibelisubkontrak").val('');
            $("#keputusan_verifikasibelisubkontrak").val('Diterima');

        });

        $(document).on('click', '.btn-verifikasi', function(ev) {
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
                            reset();
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
                        form_name: "del_verifikasibelisubkontrak",
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

    function reset() {
        $("#form_name").val("add_verifikasibelisubkontrak");
        $("#id_verifikasibelisubkontrak").val('');
        $("#namaproduk_verifikasibelisubkontrak").val('');
        $("#penyedia_verifikasibelisubkontrak").val('');
        $("#nopo_verifikasibelisubkontrak").val('');
        $("#noinvoice_verifikasibelisubkontrak").val('');
        $("#jumlah_verifikasibelisubkontrak").val('Memenuhi');
        $("#spesifikasi_verifikasibelisubkontrak").val('Memenuhi');
        $("#kondisi_verifikasibelisubkontrak").val('Memenuhi');
        $("#invoice_verifikasibelisubkontrak").val('Ada');
        $("#fakturpajak_verifikasibelisubkontrak").val('Ada');
        $("#garansi_verifikasibelisubkontrak").val('Ada');
        $("#catatan_verifikasibelisubkontrak").val('');
        $("#keputusan_verifikasibelisubkontrak").val('Diterima');
    }

    function proyek_info(uid) {
        let link = 'proyek_detail?uid=' + uid;
        window.open(link, '_self');
    }

    function jumlah_cek() {
        if ($("#jumlah_verifikasibelisubkontrak").prop('checked') === true) {
            $("#jumlah_verifikasibelisubkontrak").val('Memenuhi');
        } else {
            $("#jumlah_verifikasibelisubkontrak").val('Tidak Memenuhi');
        }
    }

    function spesifikasi_cek() {
        if ($("#spesifikasi_verifikasibelisubkontrak").prop('checked') === true) {
            $("#spesifikasi_verifikasibelisubkontrak").val('Memenuhi');
        } else {
            $("#spesifikasi_verifikasibelisubkontrak").val('Tidak Memenuhi');
        }
    }

    function kondisi_cek() {
        if ($("#kondisi_verifikasibelisubkontrak").prop('checked') === true) {
            $("#kondisi_verifikasibelisubkontrak").val('Memenuhi');
        } else {
            $("#kondisi_verifikasibelisubkontrak").val('Tidak Memenuhi');
        }
    }

    function invoice_cek() {
        if ($("#invoice_verifikasibelisubkontrak").prop('checked') === true) {
            $("#invoice_verifikasibelisubkontrak").val('Ada');
        } else {
            $("#invoice_verifikasibelisubkontrak").val('Tidak Ada');
        }
    }

    function fakturpajak_cek() {
        if ($("#fakturpajak_verifikasibelisubkontrak").prop('checked') === true) {
            $("#fakturpajak_verifikasibelisubkontrak").val('Ada');
        } else {
            $("#fakturpajak_verifikasibelisubkontrak").val('Tidak Ada');
        }
    }

    function garansi_cek() {
        if ($("#garansi_verifikasibelisubkontrak").prop('checked') === true) {
            $("#garansi_verifikasibelisubkontrak").val('Ada');
        } else {
            $("#garansi_verifikasibelisubkontrak").val('Tidak Ada');
        }
    }

    function keputusan_cek() {
        if ($("#keputusan_verifikasibelisubkontrak").prop('checked') === true) {
            $("#keputusan_verifikasibelisubkontrak").val('Diterima');
        } else {
            $("#keputusan_verifikasibelisubkontrak").val('Ditolak');
        }
    }
    </script>

</body>

</html>