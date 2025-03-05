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
    $proyekStatus = $row0['status_proyek'];

    // if (($row0['status_proyek'] == 9) || ($row0['status_proyek'] == 10)) {          // status batal atau selesai ini balik ke home
    //     header("location:home");
    // } else {

    $idpelanggan = $row0['id_pelanggan'];
    $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$idpelanggan'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    $row1 = mysqli_fetch_assoc($result1);
    // }
} else header("location:home");
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
                <?php include "./header.php" ?>
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div>
                                    <ul class="nav nav-tabs nav-tabs-s2">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="proyekdetail_rev(<?= $proyekid; ?>)">PROJECT DETAIL</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#" onclick="kajiulang_rev(<?= $proyekid; ?>)">KAJI ULANG PERMINTAAN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="jadwal_rev(<?= $proyekid; ?>)">JADWAL PEKERJAAN DAN
                                                AKOMODASI</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="berkasteknisi_rev(<?= $proyekid; ?>)">PEMINJAMAN
                                                KALIBRATOR</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="sertifikat_rev(<?= $proyekid; ?>)">SERTIFIKAT</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="nk-block-head nk-block-head-sm">
                                            <div class="d-flex border border-primary bg-white">
                                                <div class="p-2 flex-grow-1">
                                                    <h5><?= $row1['nama_pelanggan'] . ' | ' . $row0['namapemilik_proyek']; ?></h5>
                                                </div>
                                                <div class="p-2">
                                                    <h5><?= '#' . $row0['no_proyek']; ?></h5>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane active" id="tabItem10">
                                            <div class="nk-block nk-block-lg">
                                                <div class="nk-block">
                                                    <div class="d-flex left-content-around">
                                                        <a href="#" onclick="permohonanrev_pdf(<?= $proyekid; ?>)" class="btn btn-round btn-dim btn-outline-info"><em class="icon ni ni-printer-fill"></em><span>BA Permohonan</span>
                                                        </a>&emsp;
                                                        <a href="#" onclick="kajiulangrev_pdf(<?= $proyekid; ?>)" class="btn btn-round btn-dim btn-outline-info"><em class="icon ni ni-printer-fill"></em><span>Kajiulang Permintaan</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                ?>
                                                    <div class="nk-block">
                                                        <div class="card">
                                                            <div class="card-inner">
                                                                <div class="preview-block">
                                                                    <form id="hl_form" name="hl_form" class="form-validate is-alter" novalidate="novalidate">
                                                                        <input type="hidden" id="form_name" name="form_name" value="add_kajiulang" />
                                                                        <input type="hidden" id="id_kajiulang" name="id_kajiulang" value="0" />
                                                                        <input type="hidden" id="id_proyek" name="id_proyek" value="<?= $proyekid; ?>" value="<?= $row0['id_proyek']; ?>" />
                                                                        <div class="row g-3">
                                                                            <div class="col-md-6 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="nama_barang_kajiulang">Nama Barang
                                                                                        sesuai Order</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" class="form-control" id="nama_barang_kajiulang" name="nama_barang_kajiulang" required data-msg="Mohon isi nama barang" placeholder="Nama Barang sesuai Order">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="jumlah_barang_kajiulang">Jumlah
                                                                                        barang</label>
                                                                                    <div class="form-control-wrap"><input type="number" class="form-control invalid" id="jumlah_barang_kajiulang" name="jumlah_barang_kajiulang" min="1" required data-msg="Mohon isi jumlah barang" placeholder="Jumlah barang">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 col-sm-12" id="aaa" name="aaa">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="id_layanan">Pilih
                                                                                        Layanan</label>
                                                                                    <div class="form-control-wrap ">
                                                                                        <select class="form-control form-control-lg form-select" data-search="on" id="id_layanan" name="id_layanan" required data-msg="Mohon pilih layanan">
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
                                                                                    <label class="form-label" for="kategori_kajiulang">Kategori</label>
                                                                                    <div class="form-control-wrap ">
                                                                                        <div class="form-control-select">
                                                                                            <select class="form-control" id="kategori_kajiulang" name="kategori_kajiulang" onchange="updatePenyedia()">
                                                                                                <option value="Insitu">Insitu</option>
                                                                                                <option value="Eksitu">Eksitu</option>
                                                                                                <option value="Subkontrak">Subkontrak</option>
                                                                                                <option value="Uji Keselamatan Listrik">Uji Keselamatan Listrik</option>
                                                                                                <option value="Tidak Bisa Dikalibrasi">Tidak Bisa Dikalibrasi</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="penyedia_kajiulang">Nama
                                                                                        penyedia</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" class="form-control" id="penyedia_kajiulang" name="penyedia_kajiulang" value="ENSTEN" placeholder="Nama Penyedia">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 col-sm-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="catatan_kajiulang">Catatan</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input class="form-control" id="catatan_kajiulang" name="catatan_kajiulang">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-lg-2 col-md-2 col-xs-3" id="bbb1" name="bbb1">
                                                                                <div class="form-group">
                                                                                    <div class="custom-control custom-switch">
                                                                                        <input type="checkbox" class="custom-control-input" id="kp_kajiulang" name="kp_kajiulang" value='Ya' onchange="kp_cek()" checked>
                                                                                        <label class="custom-control-label" for="kp_kajiulang">KP</label>
                                                                                    </div>
                                                                                    <div class="form-note">
                                                                                        <code>Kesiapan Personel</code>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2 col-md-2 col-xs-3" id="bbb2" name="bbb2">
                                                                                <div class="form-group">
                                                                                    <div class="custom-control custom-switch">
                                                                                        <input type="checkbox" class="custom-control-input" id="kal_kajiulang" name="kal_kajiulang" value='Ya' onchange="kal_cek()" checked>
                                                                                        <label class="custom-control-label" for="kal_kajiulang">KAL</label>
                                                                                    </div>
                                                                                    <div class="form-note">
                                                                                        <code>Kondisi Akomodasi dan Lingkungan</code>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2 col-md-2 col-xs-3" id="bbb3" name="bbb3">
                                                                                <div class="form-group">
                                                                                    <div class="custom-control custom-switch">
                                                                                        <input type="checkbox" class="custom-control-input" id="bpl_kajiulang" name="bpl_kajiulang" value='Ya' onchange="bpl_cek()" checked>
                                                                                        <label class="custom-control-label" for="bpl_kajiulang">BPL</label>
                                                                                    </div>
                                                                                    <div class="form-note">
                                                                                        <code>Beban Pekerjaan Laboratorium</code>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2 col-md-2 col-xs-3" id="bbb4" name="bbb4">
                                                                                <div class="form-group">
                                                                                    <div class="custom-control custom-switch">
                                                                                        <input type="checkbox" class="custom-control-input" id="kpk_kajiulang" name="kpk_kajiulang" value='Ya' onchange="kpk_cek()" checked>
                                                                                        <label class="custom-control-label" for="kpk_kajiulang">KPK</label>
                                                                                    </div>
                                                                                    <div class="form-note">
                                                                                        <code>Kondisi Peralatan Kalibrasi</code>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-2 col-md-2 col-xs-3" id="bbb5" name="bbb5">
                                                                                <div class="form-group">
                                                                                    <div class="custom-control custom-switch">
                                                                                        <input type="checkbox" class="custom-control-input" id="kmk_kajiulang" name="kmk_kajiulang" value='Ya' onchange="kmk_cek()" checked>
                                                                                        <label class="custom-control-label" for="kmk_kajiulang">KMK</label>
                                                                                    </div>
                                                                                    <div class="form-note">
                                                                                        <code>Kesesuaian Metode Kalibrasi</code>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- </div> -->

                                                                            <div class="col-12">
                                                                                <button class="btn btn-primary btn-form-action btn-submit btn-submit-kajiulang"><span>Simpan</span></button>
                                                                                <a href="#" class="btn btn-danger btn-form-action btn-reset">Clear</a>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="nk-block">
                                                    <div class="card">
                                                        <div class="card-inner">
                                                            <div class="preview-block">
                                                                <table class="datatable-init-export_action1asc nowrap table" data-export-title="Export">
                                                                    <?php
                                                                    if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                    ?>
                                                                        <div class="d-flex flex-row-reverse">
                                                                            <a href="#" id="<?= $proyekid; ?>" class="btn btn-round btn-danger btn-triger btn-deleteAll btn-sm"><em class="icon ni ni-trash-fill"></em><span>Delete All</span></a>
                                                                        </div>
                                                                        <br>
                                                                    <?php } ?>
                                                                    <thead>
                                                                        <tr>
                                                                            <?php
                                                                            if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                            ?>
                                                                                <th>Action</th>
                                                                            <?php } ?>
                                                                            <th>Nama Barang</th>
                                                                            <th>Nama Layanan</th>
                                                                            <th>Jumlah</th>
                                                                            <th>Kategori</th>
                                                                            <th>Catatan</th>
                                                                            <th>Penyedia</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $sno = 0;
                                                                        $totalMampu = 0;
                                                                        $totalTidakMampu = 0;
                                                                        $insitu = 0;
                                                                        $eksitu = 0;
                                                                        $subkon = 0;
                                                                        $ujilistrik = 0;
                                                                        $query = "SELECT * FROM kajiulang WHERE id_proyek = '$proyekid' ORDER BY id_kajiulang DESC";
                                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                                        while ($row = mysqli_fetch_array($result)) {

                                                                            $id_layanan = $row['id_layanan'];
                                                                            $query1 = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
                                                                            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                                            $row1 = mysqli_fetch_assoc($result1);

                                                                            if ($row['kategori_kajiulang'] === 'Tidak Bisa Dikalibrasi') {
                                                                                $totalTidakMampu = $totalTidakMampu + $row['jumlah_barang_kajiulang'];
                                                                            } else {
                                                                                $totalMampu = $totalMampu + $row['jumlah_barang_kajiulang'];
                                                                            }

                                                                            if ($row['kategori_kajiulang'] === 'Insitu') {
                                                                                $insitu = $insitu + $row['jumlah_barang_kajiulang'];
                                                                            } else if ($row['kategori_kajiulang'] === 'Eksitu') {
                                                                                $eksitu = $eksitu + $row['jumlah_barang_kajiulang'];
                                                                            } else if ($row['kategori_kajiulang'] === 'Subkontrak') {
                                                                                $subkon = $subkon + $row['jumlah_barang_kajiulang'];
                                                                            } else if ($row['kategori_kajiulang'] === 'Uji Keselamatan Listrik') {
                                                                                $ujilistrik = $ujilistrik + $row['jumlah_barang_kajiulang'];
                                                                            }

                                                                            $sno++;
                                                                        ?>
                                                                            <tr>
                                                                                <?php
                                                                                if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                                ?>
                                                                                    <!-- <td>
                                                                                        <a href="#" id="<?= $row['id_kajiulang']; ?>" class="btn btn-icon btn-trigger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Delete"><em class="icon ni ni-trash-fill"></em></a>
                                                                                    </td> -->

                                                                                    <td>
                                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger btn-xs" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                        <div class="dropdown-menu dropdown-menu-left">
                                                                                            <ul class="link-list-opt no-bdr">
                                                                                                <li>
                                                                                                    <a href="#" id="<?= $row['id_kajiulang']; ?>" class="toggle btn-edit-kajiulang"><em class="icon ni ni-edit-fill"></em><span>Edit Kajiulang</span></a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" id="<?= $row['id_kajiulang']; ?>" class="toggle btn-delete"><em class="icon ni ni-trash-fill"></em><span>Delete Kajiulang</span></a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </td>
                                                                                <?php } ?>
                                                                                <td><?= $row['nama_barang_kajiulang']; ?>
                                                                                </td>
                                                                                <td><?= $row1['nama_layanan']; ?>
                                                                                </td>
                                                                                <td><?= $row['jumlah_barang_kajiulang']; ?>
                                                                                </td>
                                                                                <td><?= $row['kategori_kajiulang']; ?>
                                                                                </td>
                                                                                <td><?= $row['catatan_kajiulang']; ?>
                                                                                </td>
                                                                                <td><?= $row['penyedia_kajiulang']; ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                                <h6 class='text-right text-muted'>Total Insitu : <?= $insitu; ?></h6>
                                                                <h6 class='text-right text-muted'>Total Eksitu : <?= $eksitu; ?></h6>
                                                                <h6 class='text-right text-muted'>Total Subkon : <?= $subkon; ?></h6>
                                                                <h6 class='text-right text-muted'>Total Uji Listrik : <?= $ujilistrik; ?></h6>
                                                                <h6 class='text-right text-muted'>Total Mampu : <?= $totalMampu; ?></h6>
                                                                <h6 class='text-right text-muted'>Total Tidak Mampu : <?= $totalTidakMampu; ?></h6>
                                                            </div><!-- .card-inner -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php include "./footer.html" ?>
            </div>
            <!-- content @e -->
            <!-- footer @s -->

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
            document.title = 'DP Revisi ' + '<?= $row0['no_proyek']; ?>';

            $("#hl_form").validate({
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $(document).on('click', '.btn-reset', function(ev) {
                ev.preventDefault();

                // $('.productTitle').text('Proyek Baru');
                // $('.productDes').html('<p>Tambahkan informasi proyek baru.</p>');
                // console.log($("#namalengkap_user").val());

                $("#form_name").val("add_kajiulang");
                $("#id_kajiulang").val('');
                $("#nama_barang_kajiulang").val('');
                $("#jumlah_barang_kajiulang").val('');
                $("#id_layanan").val('');
                $("#kategori_kajiulang").val('Insitu');
                $("#penyedia_kajiulang").val('ENSTEN');
                $("#catatan_kajiulang").val('');

                $("#aaa").show();
                $("#bbb1").show();
                $("#bbb2").show();
                $("#bbb3").show();
                $("#bbb4").show();
                $("#bbb5").show();
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

            $(document).on('click', '.btn-edit-kajiulang', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                $("#aaa").hide();
                $("#bbb1").hide();
                $("#bbb2").hide();
                $("#bbb3").hide();
                $("#bbb4").hide();
                $("#bbb5").hide();

                $.ajax({
                    cache: false,
                    url: 'get_ajax_details.php', // url where to submit the request
                    type: "GET", // type of action POST || GET
                    dataType: 'json', // data type
                    data: {
                        cmd: "get_kajiulang_details",
                        tbl_id: tbl_id
                    }, // post data || get data
                    success: function(result) {
                        // console.log(result);
                        $("#form_name").val("edit_kajiulang");
                        $("#id_kajiulang").val(result['id_kajiulang']);
                        $("#id_proyek").val(result['id_proyek']);
                        $("#nama_barang_kajiulang").val(result['nama_barang_kajiulang']);
                        $("#jumlah_barang_kajiulang").val(result['jumlah_barang_kajiulang']);
                        // $("#id_layanan").val(result['id_layanan']);
                        $("#kategori_kajiulang").val(result['kategori_kajiulang']);
                        $("#penyedia_kajiulang").val(result['penyedia_kajiulang']);
                        $("#catatan_kajiulang").val(result['catatan_kajiulang']);

                    },
                    error: function(xhr, resp, text) {
                        console.log(xhr, resp, text);
                    }
                });
            });

            $(document).on('click', '.btn-edit', function(ev) {
                ev.preventDefault();

                // $('.nk-body').addClass('toggle-shown');
                // $('.nk-add-proyek').addClass('content-active');
                // $('.nk-content-body').append('<div class="toggle-overlay" data-target="addProyek"></div>');
                $('.productTitle').text('Edit Proyek');
                $('.productDes').html('<p>Edit proyek.</p>');

                // var btn_button = $(this);
                // btn_button.html('<i class="fas fa-spinner fa-spin"></i>');
                var tbl_id = $(this).attr("id");

                $.ajax({
                    cache: false,
                    url: 'get_ajax_details.php', // url where to submit the request
                    type: "GET", // type of action POST || GET
                    dataType: 'json', // data type
                    data: {
                        cmd: "get_kajiulang_details",
                        tbl_id: tbl_id
                    }, // post data || get data
                    success: function(result) {
                        // btn_button.html(
                        //     '<em class="icon ni ni-edit"></em><span>Edit Proyek</span>'
                        // );
                        console.log(result);
                        $("#form_name").val("edit_proyek");
                        $("#id_proyek").val(result['id_proyek']);
                        $("#no_proyek").val(result['no_proyek']);
                        $("#id_pelanggan").val(result['id_pelanggan']);
                        // $("#kategori_proyek").val(result['kategori_proyek']);
                        $("#deadline_proyek").val(result['deadline_proyek']);
                        $("#sumberdana_proyek").val(result['sumberdana_proyek']);
                        $("#pagu_proyek").val(result['pagu_proyek']);
                        $("#marketing_proyek").val(result['marketing_proyek']);
                        $("#alatlaik_proyek").val(result['alatlaik_proyek']);
                        $("#jenisalat_proyek").val(result['jenisalat_proyek']);
                        $("#jmlalat_proyek").val(result['jmlalat_proyek']);
                        $("#jmldana_proyek").val(result['jmldana_proyek']);
                        $("#jadwalkerja_proyek").val(result['jadwalkerja_proyek']);
                        $("#daftarinventaris_proyek").val(result['daftarinventaris_proyek']);
                        $("#deadlinesertifikat_proyek").val(result['deadlinesertifikat_proyek']);
                        $("#catatan_proyek").val(result['catatan_proyek']);
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

            $(document).on('click', '.btn-deleteAll', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                Swal.fire({
                    title: 'Apakah menghapus semua layanan?',
                    text: "Data yang terhapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus data!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "del_kajiulangAll",
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

            $(document).on('click', '.btn-add', function(ev) {
                ev.preventDefault();
                var btn_button = $(this);
                console.log($(".select2-search__field").val());

                $("#form_name").val("add_pelanggan2");
                $("#nama_pelanggan").val($(".select2-search__field").val());

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
            });

            $('#id_pelanggan').select2({
                closeOnSelect: false,
                allowClear: true,
                placeholder: "Pilih Pelanggan",
                escapeMarkup: function(markup) {
                    return markup;
                },
                language: {
                    noResults: function() {
                        return "Data tidak ditemukan. <a href='#' class='toggle btn btn-primary btn-add'><span>Add Pelanggan</span></a>";
                        // return $("<a href='http://google.com/'>Add</a>");
                    }
                }
            });

            cekDark();
        });

        function proyek_info(uid) {
            let link = 'proyek_detail?uid=' + uid;
            window.open(link, '_self');
        }

        function proyek_finish(uid) {
            let link = 'proyek_finish?uid=' + uid;
            window.open(link, '_self');
        }

        function proyek_cancel(uid) {
            let link = 'proyek_cancel?uid=' + uid;
            window.open(link, '_self');
        }

        function proyekdetail_rev(uid) {
            let link = 'proyekrev_detail?uid=' + uid;
            window.open(link, '_self');
        }

        function kajiulang_rev(uid) {
            let link = 'kajiulangrev?uid=' + uid;
            window.open(link, '_self');
        }

        function jadwal_rev(uid) {
            let link = 'jadwalrev?uid=' + uid;
            window.open(link, '_self');
        }

        function berkasteknisi_rev(uid) {
            let link = 'berkasteknisirev?uid=' + uid;
            window.open(link, '_self');
        }

        /////////////////////////////////////////////

        function permohonanrev_pdf(uid) {
            let link = 'permohonanrev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function kajiulangrev_pdf(uid) {
            let link = 'kajiulangrev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function jadwalrev_pdf(uid) {
            let link = 'jadwalrev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function spkrev_pdf(uid) {
            let link = 'spkrev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function akomodasirev_pdf(uid) {
            let link = 'akomodasirev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function berkasteknisirev_pdf(uid) {
            let link = 'berkasteknisirev_pdf?uid=' + uid;
            window.open(link, '_blank');
        }

        function sertifikat_rev(uid) {
            let link = 'esertifikat?uid=' + uid;
            window.open(link, '_self');
        }

        function updatePenyedia() {
            var kk = $("#kategori_kajiulang").val();
            if (kk === 'Insitu')
                $("#penyedia_kajiulang").val('ENSTEN');
            else
                $("#penyedia_kajiulang").val('');
            return false;
        }
    </script>

</body>

</html>