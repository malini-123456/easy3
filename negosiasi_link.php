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
                        <h3>Negosiasi dan Kontrak</h3>
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <button data-target="addNegosiasi" data-dismiss="modal"
                                                class="toggle btn btn-primary d-none d-sm-inline-flex"><em
                                                    class="icon ni ni-plus"></em><span>Add Barang</span></button>
                                            <button data-target="addNegosiasi" data-dismiss="modal"
                                                class="toggle btn btn-icon btn-primary d-inline-flex d-sm-none"><em
                                                    class="icon ni ni-plus"></em></button>
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
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <div class="preview-block">
                                                <table class="datatable-init-export nowrap table"
                                                    data-export-title="Export">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Barang sesuai Order</th>
                                                            <th>Nama Layanan</th>
                                                            <th>Jumlah</th>
                                                            <th>Satuan</th>
                                                            <th>Harga Satuan</th>
                                                            <th>Disc (%)</th>
                                                            <th>Subtotal</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sno = 0; $total = 0; $subtotal = 0;
                                                        $query = "SELECT * FROM negosiasi WHERE id_proyek = '$proyekid' ORDER BY id_negosiasi DESC";
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($result)) {

                                                            $id_layanan = $row['id_layanan'];
                                                            $query1 = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
                                                            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                            $row1 = mysqli_fetch_assoc($result1);

                                                            $subtotal = ( $row['harga_barang_negosiasi'] - ($row['harga_barang_negosiasi'] * $row['diskon_barang_negosiasi'] / 100) ) * $row['jumlah_barang_negosiasi'];
                                                            $total = $total + $subtotal;

                                                            $sno++;
                                                        ?>
                                                        <tr>
                                                            <td><?= $row['nama_barang_negosiasi']; ?></td>
                                                            <td><?= $row1['nama_layanan']; ?></td>
                                                            <td><?= $row['jumlah_barang_negosiasi']; ?></td>
                                                            <td><?= $row['satuan_barang_negosiasi']; ?></td>
                                                            <td><?= 'Rp ' . number_format($row['harga_barang_negosiasi'], 2); ?>
                                                            </td>
                                                            <td><?= $row['diskon_barang_negosiasi']; ?></td>
                                                            <td><?= 'Rp ' . number_format($subtotal, 2); ?></td>
                                                            <td>
                                                                <button id="<?= $row['id_negosiasi']; ?>"
                                                                    data-target="addNegosiasi" data-dismiss="modal"
                                                                    class="toggle btn btn-xs btn-primary btn-edit"><em
                                                                        class="icon ni ni-edit"></em></button>
                                                                <button id="<?= $row['id_negosiasi']; ?>"
                                                                    class="btn btn-xs btn-danger btn-delete">
                                                                    <em class="icon ni ni-trash"></em>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div><!-- .card-inner -->
                                        </div><!-- .card -->
                                        <hr style="margin: 0; border-top: 1px solid #dbdfea;">
                                        <div class="card-inner">
                                            <p class="text-right fw-bold fs-15px">Total:
                                                <?= 'Rp ' . number_format($total, 2); ?></p>
                                        </div>
                                    </div><!-- .col -->
                                </div> <!-- nk-block -->

                                <!-- add  -->
                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addNegosiasi"
                                    data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true"
                                    data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Negosiasi Harga</h5>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                            novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name"
                                                value="add_negosiasi" />
                                            <input type="hidden" id="id_proyek" name="id_proyek"
                                                value="<?= $proyekid; ?>" />
                                            <input type="hidden" id="id_negosiasi" name="id_negosiasi" value="0" />

                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nama_barang_negosiasi">Nama
                                                            Barang sesuai
                                                            Order</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"
                                                                id="nama_barang_negosiasi" name="nama_barang_negosiasi"
                                                                required data-msg="Mohon isi nama barang"
                                                                placeholder="Nama Barang sesuai Order">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Nama
                                                            Layanan</label>
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
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="jumlah_barang_negosiasi">Jumlah</label>
                                                        <div class="form-control-wrap number-spinner-wrap">
                                                            <button
                                                                class="btn btn-icon btn-outline-light number-spinner-btn number-minus"
                                                                data-number="minus">
                                                                <em class="icon ni ni-minus"></em>
                                                            </button>
                                                            <input type="number" class="form-control number-spinner"
                                                                id="jumlah_barang_negosiasi"
                                                                name="jumlah_barang_negosiasi" value="0">
                                                            <button
                                                                class="btn btn-icon btn-outline-light number-spinner-btn number-plus"
                                                                data-number="plus"><em class="icon ni ni-plus"></em>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="harga_barang_negosiasi">Harga
                                                            Satuan</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-sign-idr"></em>
                                                            </div>
                                                            <input type="number" min="0" class="form-control invalid"
                                                                id="harga_barang_negosiasi"
                                                                name="harga_barang_negosiasi" placeholder="Harga Satuan"
                                                                required data-msg="Mohon isi Harga Satuan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="satuan_barang_negosiasi">Satuan</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control"
                                                                    id="satuan_barang_negosiasi"
                                                                    name="satuan_barang_negosiasi" required
                                                                    data-msg="Mohon isi satuan">
                                                                    <option value="Unit">Unit</option>
                                                                    <option value="Paket">Paket</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label"
                                                            for="diskon_barang_negosiasi">Disc</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-percent"></em>
                                                            </div>
                                                            <input type="number" min="0" class="form-control invalid"
                                                                id="diskon_barang_negosiasi"
                                                                name="diskon_barang_negosiasi" placeholder="Disc"
                                                                required data-msg="Mohon isi Disc">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-form-action btn-submit"><span>Simpan
                                                        </span></button>
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
        document.title = 'Negosiasi ' + '<?= $row0['no_proyek']; ?>';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();
            $("#form_name").val("add_negosiasi");
            $("#id_negosiasi").val('');
            $("#nama_barang_negosiasi").val('').focus();
            $("#jumlah_barang_negosiasi").val('');
            $("#satuan_barang_negosiasi").val('Unit');
            $("#harga_barang_negosiasi").val('');
            $("#diskon_barang_negosiasi").val('');

        });

        $(document).on('click', '.btn-submit', function(ev) {
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
                    cmd: "get_negosiasi_details",
                    tbl_id: tbl_id
                }, // post data || get data
                success: function(result) {
                    // btn_button.html(
                    //     '<em class="icon ni ni-edit"></em><span>Edit Proyek</span>'
                    // );
                    console.log(result);

                    $("#form_name").val("edit_negosiasi");
                    $("#id_negosiasi").val(result['id_negosiasi']);
                    $("#id_proyek").val(result['id_proyek']);
                    $("#id_layanan").val(result['id_layanan']);
                    $("#nama_barang_negosiasi").val(result[
                        'nama_barang_negosiasi']).focus();
                    $("#jumlah_barang_negosiasi").val(result[
                        'jumlah_barang_negosiasi']);
                    $("#satuan_barang_negosiasi").val(result[
                        'satuan_barang_negosiasi']);
                    $("#harga_barang_negosiasi").val(result[
                        'harga_barang_negosiasi']);
                    $("#diskon_barang_negosiasi").val(result[
                        'diskon_barang_negosiasi']);
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
                        form_name: "del_negosiasi",
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
    </script>

</body>

</html>