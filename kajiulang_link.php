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
                                            <h3>Kaji Ulang Permintaan</h3>
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
                                    <div class="col-md-12 col-lg-12 col-xxl-12">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                                        novalidate="novalidate">
                                                        <input type="hidden" id="form_name" name="form_name"
                                                            value="add_kajiulang" />
                                                        <input type="hidden" id="id_kajiulang" name="id_kajiulang"
                                                            value="0" />
                                                        <input type="hidden" id="id_proyek" name="id_proyek"
                                                            value="<?= $proyekid; ?>"
                                                            value="<?= $row0['id_proyek']; ?>" />

                                                        <div class="row g-3">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="nama_barang_kajiulang">Nama
                                                                        Barang sesuai
                                                                        Order</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control"
                                                                            id="nama_barang_kajiulang"
                                                                            name="nama_barang_kajiulang" required
                                                                            data-msg="Mohon isi nama barang"
                                                                            placeholder="Nama Barang sesuai Order">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="jumlah_barang_kajiulang">Jumlah
                                                                        barang</label>
                                                                    <div class="form-control-wrap"><input type="number"
                                                                            class="form-control invalid"
                                                                            id="jumlah_barang_kajiulang"
                                                                            name="jumlah_barang_kajiulang" min="1"
                                                                            required data-msg="Mohon isi jumlah barang"
                                                                            placeholder="Jumlah barang">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- <div class="col-md-6 col-sm-12">
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
                                                                                    echo "<option value=''>-- layanan --</option>";
                                                                                    while ($row = $sql->fetch_assoc()) {
                                                                                        echo "<option value=" . $row['id_layanan'] . ">" . $row['nama_layanan'] . "</option>";
                                                                                    }
                                                                                    ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <div class="col-md-6 col-sm-12">
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

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="catatan_kajiulang">Catatan</label>
                                                                    <div class="form-control-wrap ">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control"
                                                                                id="catatan_kajiulang"
                                                                                name="catatan_kajiulang">
                                                                                <option value="Mampu">Mampu</option>
                                                                                <option value="Tidak Mampu">Tidak Mampu
                                                                                </option>
                                                                                <option value="Subkontrak">Subkontrak
                                                                                </option>
                                                                                <option value="Uji Keselamatan Listrik">
                                                                                    Uji
                                                                                    Keselamatan
                                                                                    Listrik</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="penyedia_kajiulang">Nama penyedia</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control"
                                                                            id="penyedia_kajiulang"
                                                                            name="penyedia_kajiulang"
                                                                            placeholder="Nama Penyedia">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="kp_kajiulang">KP</label>
                                                                    <div class="form-control-wrap ">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control"
                                                                                id="kp_kajiulang" name="kp_kajiulang">
                                                                                <option value="Ya">Ya</option>
                                                                                <option value="Tidak">Tidak</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="kal_kajiulang">KAL</label>
                                                                    <div class="form-control-wrap ">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control"
                                                                                id="kal_kajiulang" name="kal_kajiulang">
                                                                                <option value="Ya">Ya</option>
                                                                                <option value="Tidak">Tidak</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="bpl_kajiulang">BPL</label>
                                                                    <div class="form-control-wrap ">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control"
                                                                                id="bpl_kajiulang" name="bpl_kajiulang">
                                                                                <option value="Ya">Ya</option>
                                                                                <option value="Tidak">Tidak</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="kpk_kajiulang">KPK</label>
                                                                    <div class="form-control-wrap ">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control"
                                                                                id="kpk_kajiulang" name="kpk_kajiulang">
                                                                                <option value="Ya">Ya</option>
                                                                                <option value="Tidak">Tidak</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label"
                                                                        for="kmk_kajiulang">KMK</label>
                                                                    <div class="form-control-wrap ">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control"
                                                                                id="kmk_kajiulang" name="kmk_kajiulang">
                                                                                <option value="Ya">Ya</option>
                                                                                <option value="Tidak">Tidak</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <div class="col-xs-3">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="kp_kajiulang" name="kp_kajiulang"
                                                                            value='Ya' onchange="kp_cek()" checked>
                                                                        <label class="custom-control-label"
                                                                            for="kp_kajiulang">KP</label>
                                                                    </div>
                                                                    <div class="form-note">
                                                                        <code>Kesiapan Personel</code>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="kal_kajiulang" name="kal_kajiulang"
                                                                            value='Ya' onchange="kal_cek()" checked>
                                                                        <label class="custom-control-label"
                                                                            for="kal_kajiulang">KAL</label>
                                                                    </div>
                                                                    <div class="form-note">
                                                                        <code>Kondisi Akomodasi dan Lingkungan</code>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="bpl_kajiulang" name="bpl_kajiulang"
                                                                            value='Ya' onchange="bpl_cek()" checked>
                                                                        <label class="custom-control-label"
                                                                            for="bpl_kajiulang">BPL</label>
                                                                    </div>
                                                                    <div class="form-note">
                                                                        <code>Beban Pekerjaan Laboratorium</code>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="kpk_kajiulang" name="kpk_kajiulang"
                                                                            value='Ya' onchange="kpk_cek()" checked>
                                                                        <label class="custom-control-label"
                                                                            for="kpk_kajiulang">KPK</label>
                                                                    </div>
                                                                    <div class="form-note">
                                                                        <code>Kondisi Peralatan Kalibrasi</code>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="kmk_kajiulang" name="kmk_kajiulang"
                                                                            value='Ya' onchange="kmk_cek()" checked>
                                                                        <label class="custom-control-label"
                                                                            for="kmk_kajiulang">KMK</label>
                                                                    </div>
                                                                    <div class="form-note">
                                                                        <code>Kesesuaian Metode Kalibrasi</code>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <button
                                                                    class="btn btn-primary btn-form-action btn-submit btn-submit-kajiulang"><span>Simpan</span></button>
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
                                    <div class="col-md-12 col-lg-12 col-xxl-12">
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
                                                                    <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') ) { ?>
                                                                    <th>Action</th>
                                                                    <?php } ?>
                                                                    <th>Nama Barang</th>
                                                                    <th>Nama Layanan</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Catatan</th>
                                                                    <th>Penyedia</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                        $sno = 0; $totalMampu = 0; $totalTidakMampu = 0;
                                                        $query = "SELECT * FROM kajiulang WHERE id_proyek = '$proyekid' ORDER BY id_kajiulang DESC";
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($result)) {

                                                            $id_layanan = $row['id_layanan'];
                                                            $query1 = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
                                                            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                            $row1 = mysqli_fetch_assoc($result1);

                                                            if ($row['catatan_kajiulang'] === 'Tidak Mampu') {
                                                                $totalTidakMampu = $totalTidakMampu + $row['jumlah_barang_kajiulang'];
                                                            } else {
                                                                $totalMampu = $totalMampu + $row['jumlah_barang_kajiulang'];
                                                            }

                                                            $sno++;
                                                        ?>
                                                                <tr>
                                                                    <?php if ( ($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') ) { ?>
                                                                    <td>
                                                                        <a href="#" id="<?= $row['id_kajiulang']; ?>"
                                                                            class="btn btn-icon btn-trigger btn-sm btn-delete"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="Delete"><em
                                                                                class="icon ni ni-trash-fill"></em></a>
                                                                    </td>
                                                                    <?php } ?>

                                                                    <td><?= $row['nama_barang_kajiulang']; ?></td>
                                                                    <td><?= $row1['nama_layanan']; ?></td>
                                                                    <td><?= $row['jumlah_barang_kajiulang']; ?></td>
                                                                    <td><?= $row['catatan_kajiulang']; ?></td>
                                                                    <td><?= $row['penyedia_kajiulang']; ?></td>
                                                                </tr>
                                                                <?php
                                                        }
                                                        ?>
                                                            </tbody>
                                                        </table>
                                                        <h6 class='text-right text-muted'>Total Tidak Mampu :
                                                            <?= $totalTidakMampu; ?></h6>
                                                        <h6 class='text-right text-muted'>Total Mampu :
                                                            <?= $totalMampu; ?></h6>
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
        document.title = 'Kaji Ulang ' + '<?= $row0['no_proyek']; ?>';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();
            $("#form_name").val("add_kajiulang");
            $("#id_kajiulang").val('');
            $("#nama_barang_kajiulang").val('').focus();
            $("#jumlah_barang_kajiulang").val(0);
            $("#catatan_kajiulang").val('Mampu');
            $("#id_layanan").val('');
            $("#penyedia_kajiulang").val('');

            $("#kp_kajiulang").val('Ya');
            $("#kal_kajiulang").val('Ya');
            $("#bpl_kajiulang").val('Ya');
            $("#kpk_kajiulang").val('Ya');
            $("#kmk_kajiulang").val('Ya');

            $("#kp_kajiulang").prop('checked', true);
            $("#kal_kajiulang").prop('checked', true);
            $("#bpl_kajiulang").prop('checked', true);
            $("#kpk_kajiulang").prop('checked', true);
            $("#kmk_kajiulang").prop('checked', true);
        });

        $(document).on('click', '.btn-submit-kajiulang', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);

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
                        form_name: "del_kajiulang",
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


    function kp_cek() {
        if ($("#kp_kajiulang").prop('checked') === true) {
            $("#kp_kajiulang").val('Ya');
        } else {
            $("#kp_kajiulang").val('Tidak');
        }
    }

    function kal_cek() {
        if ($("#kal_kajiulang").prop('checked') === true) {
            $("#kal_kajiulang").val('Ya');
        } else {
            $("#kal_kajiulang").val('Tidak');
        }
    }

    function bpl_cek() {
        if ($("#bpl_kajiulang").prop('checked') === true) {
            $("#bpl_kajiulang").val('Ya');
        } else {
            $("#bpl_kajiulang").val('Tidak');
        }
    }

    function kpk_cek() {
        if ($("#kpk_kajiulang").prop('checked') === true) {
            $("#kpk_kajiulang").val('Ya');
        } else {
            $("#kpk_kajiulang").val('Tidak');
        }
    }

    function kmk_cek() {
        if ($("#kmk_kajiulang").prop('checked') === true) {
            $("#kmk_kajiulang").val('Ya');
        } else {
            $("#kmk_kajiulang").val('Tidak');
        }
    }

    function reset() {
        $("#form_name").val("add_kajiulang");
        $("#id_kajiulang").val('');
        $("#nama_barang_kajiulang").val('').focus();
        $("#jumlah_barang_kajiulang").val(0);
        $("#catatan_kajiulang").val('Mampu');
        $("#id_layanan").val('');
        $("#penyedia_kajiulang").val('');

        $("#kp_kajiulang").val('Ya');
        $("#kal_kajiulang").val('Ya');
        $("#bpl_kajiulang").val('Ya');
        $("#kpk_kajiulang").val('Ya');
        $("#kmk_kajiulang").val('Ya');

        $("#kp_kajiulang").prop('checked', true);
        $("#kal_kajiulang").prop('checked', true);
        $("#bpl_kajiulang").prop('checked', true);
        $("#kpk_kajiulang").prop('checked', true);
        $("#kmk_kajiulang").prop('checked', true);
    }
    </script>

</body>

</html>