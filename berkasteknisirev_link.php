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
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="kajiulang_rev(<?= $proyekid; ?>)">KAJI ULANG PERMINTAAN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#" onclick="jadwal_rev(<?= $proyekid; ?>)">JADWAL PEKERJAAN DAN
                                                AKOMODASI</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#" onclick="berkasteknisi_rev(<?= $proyekid; ?>)">PEMINJAMAN
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


                                        <div class="tab-pane active" id="tabItem12">
                                            <div class="nk-block">
                                                <div class="nk-block">
                                                    <div class="d-flex left-content-around">
                                                        <a href="#" onclick="berkasteknisirev_pdf(<?= $proyekid; ?>)" class="btn btn-round btn-dim btn-outline-info"><em class="icon ni ni-printer-fill"></em><span>Peminjaman Kalibrator</span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <!-- Form Inputan  -->
                                                <!-- <div class="nk-block">
                                                    <div class="card">
                                                        <div class="card-inner">
                                                            <div class="preview-block">
                                                                <form id="hl_form" name="hl_form" class="form-validate is-alter" novalidate="novalidate">
                                                                    <input type="hidden" id="form_name" name="form_name" value="add_berkasteknisi" />
                                                                    <input type="hidden" id="id_berkasteknisi" name="id_berkasteknisi" value="0" />
                                                                    <input type="hidden" id="id_proyek" name="id_proyek" value="<?= $proyekid; ?>" value="<?= $row0['id_proyek']; ?>" />
                                                                    <div class="row g-3">
                                                                        <div class="col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="id_alat">Pilih Alat</label>
                                                                                <div class="form-control-wrap ">
                                                                                    <select class="form-control form-control-lg form-select" data-search="on" id="id_alat" name="id_alat" required data-msg="Mohon pilih layanan">
                                                                                        <?php
                                                                                        require_once('connect.php');
                                                                                        $sql = mysqli_query($conn, "SELECT * FROM alatkalibrasi WHERE kembali='Ya' ORDER BY nama_alat ASC");
                                                                                        echo "<option value=''>-- alat --</option>";
                                                                                        while ($row = $sql->fetch_assoc()) {
                                                                                            echo "<option value=" . $row['id_alat'] . ">" . $row['nama_alat'] . "</option>";
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6 col-sm-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="kondisi_berkasteknisi">Kategori</label>
                                                                                <div class="form-control-wrap ">
                                                                                    <div class="form-control-select">
                                                                                        <select class="form-control" id="kondisi_berkasteknisi" name="kondisi_berkasteknisi">
                                                                                            <option value="Baik">Baik</option>
                                                                                            <option value="Kurang Baik">Kurang Baik</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="kelengkapan_berkasteknisi">Kelengkapan</label>
                                                                                <div class="form-control-wrap">
                                                                                    <textarea class="form-control" id="kelengkapan_berkasteknisi" name="kelengkapan_berkasteknisi"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12">
                                                                            <button class="btn btn-primary btn-form-action btn-submit btn-submit-berkasteknisi"><span>Simpan</span></button>
                                                                            <a href="#" class="btn btn-danger btn-form-action btn-reset">Clear</a>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->


                                                <!-- Data Peminjaman  -->
                                                <div class="nk-block">
                                                    <div class="card">
                                                        <div class="card-inner">
                                                            <div class="preview-block">
                                                                <table class="datatable-init-export_action1asc nowrap table" data-export-title="Export">

                                                                    <div class="d-flex flex-row-reverse">
                                                                        <?php
                                                                        if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                                        ?>
                                                                            <a href="#" id="<?= $proyekid; ?>" class="btn btn-round btn-danger btn-triger btn-deleteAll btn-sm"><em class="icon ni ni-trash-fill"></em><span>Delete All</span></a>
                                                                            &nbsp;
                                                                            &nbsp;
                                                                        <?php } ?>
                                                                        <a href="#" id="<?= $proyekid; ?>" class="btn btn-round btn-primary btn-triger btn-kembaliAll btn-sm"><em class="icon ni ni-swap"></em><span>Kembali All</span></a>
                                                                    </div>
                                                                    <br>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Action</th>
                                                                            <th>Tgl Pinjam</th>
                                                                            <th>Kembali</th>
                                                                            <th>Nama Alat</th>
                                                                            <th>Merek</th>
                                                                            <th>Tipe</th>
                                                                            <th>No Seri</th>
                                                                            <!-- <th>Kondisi</th> -->
                                                                            <!-- <th>Kelengkapan</th> -->
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $sno = 0;
                                                                        $query = "SELECT * FROM berkasteknisi WHERE id_proyek = '$proyekid' ORDER BY id_berkasteknisi DESC";
                                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                                        while ($row = mysqli_fetch_array($result)) {

                                                                            $id_alat = $row['id_alat'];
                                                                            $query1 = "SELECT * FROM alatkalibrasi WHERE id_alat = '$id_alat'";
                                                                            $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                                            $row1 = mysqli_fetch_assoc($result1);

                                                                            $sno++;
                                                                        ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <?php if ($row['kembali_berkasteknisi'] == 'T') { ?>
                                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger btn-xs" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                        <div class="dropdown-menu dropdown-menu-left">
                                                                                            <ul class="link-list-opt no-bdr">
                                                                                                <li>
                                                                                                    <a href="#" id="<?= $row['id_berkasteknisi']; ?>" class="toggle btn-kembali"><em class="icon ni ni-edit-fill"></em><span>Kembalikan</span></a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a href="#" id="<?= $row['id_berkasteknisi']; ?>" class="toggle btn-delete"><em class="icon ni ni-trash-fill"></em><span>Delete</span></a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    <?php } ?>
                                                                                </td>
                                                                                <td><?= date('d-m-Y', strtotime($row['lastupdate_berkasteknisi'])); ?>
                                                                                </td>
                                                                                <td class="icon-text text-center">
                                                                                    <?php if ($row['kembali_berkasteknisi'] == 'Y') { ?>
                                                                                        <em class="icon ni ni-check-circle-cut text-success"></em>
                                                                                    <?php } else { ?>
                                                                                        <em class="icon ni ni-cross text-danger"></em>
                                                                                    <?php } ?>
                                                                                </td>
                                                                                <td><?= $row1['nama_alat']; ?>
                                                                                </td>
                                                                                <td><?= $row1['merek']; ?>
                                                                                </td>
                                                                                <td><?= $row1['tipe']; ?>
                                                                                </td>
                                                                                <td><?= $row1['no_seri']; ?>
                                                                                </td>
                                                                                <!-- <td><?= $row['kondisi_berkasteknisi']; ?></td> -->
                                                                                <!-- <td><?= $row['kelengkapan_berkasteknisi']; ?></td> -->
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Form Button  -->
                                                <?php
                                                if ($proyekStatus != 'SELESAI' &&  $proyekStatus != 'BATAL') {
                                                ?>
                                                    <div class="nk-block">
                                                        <div class="card">
                                                            <!-- <div class="card-inner"> -->
                                                            <div class="preview-block">
                                                                <table class="table table-striped table-hover nowrap">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th>Pinjam</th>
                                                                            <th>Nama Barang</th>
                                                                            <th>Nama Layanan</th>
                                                                            <th>Nama Alat</th>
                                                                            <th>No Seri</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php

                                                                        $arrIdAlat = array();
                                                                        $sql = mysqli_query($conn, "SELECT * FROM alatkalibrasi WHERE kembali='Ya' ORDER BY nama_alat ASC");

                                                                        $no_kj = 0;
                                                                        $query_kj = "SELECT * FROM kajiulang WHERE id_proyek='$proyekid' AND kategori_kajiulang!='Tidak Bisa Dikalibrasi' AND kategori_kajiulang!='Subkontrak' ORDER BY id_kajiulang ASC";
                                                                        $result_kj = mysqli_query($conn, $query_kj) or die(mysqli_error($conn));
                                                                        $nomor_urut = 0;
                                                                        while ($row_kj = mysqli_fetch_array($result_kj)) {

                                                                            $id_layanan = $row_kj['id_layanan'];
                                                                            $query_ly = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
                                                                            $result_ly = mysqli_query($conn, $query_ly) or die(mysqli_error($conn));
                                                                            $row_ly = mysqli_fetch_assoc($result_ly);

                                                                            $no_kj++;

                                                                            $daftarAlat = $row_ly['daftaralat_layanan'];
                                                                            $dataDaftarAlat = explode(';', $daftarAlat);

                                                                            $j = count($dataDaftarAlat);
                                                                            if ($j > 0) {
                                                                                for ($i = 0; $i < $j - 1; $i++) {
                                                                                    $nomor_urut++;
                                                                                    $idAlat = $dataDaftarAlat[$i];

                                                                                    if (!in_array($idAlat, $arrIdAlat)) {

                                                                                        array_push($arrIdAlat, $idAlat);
                                                                                        $query_ak = "SELECT * FROM alatkalibrasi WHERE id_alat='$idAlat' ORDER BY nama_alat ASC";
                                                                                        $result_ak = mysqli_query($conn, $query_ak) or die(mysqli_error($conn));
                                                                                        $row_ak = mysqli_fetch_assoc($result_ak);
                                                                        ?>
                                                                                        <tr>
                                                                                            <td class="icon-text text-center">
                                                                                                <?php
                                                                                                if ($row_ak['kembali'] == 'Ya') {
                                                                                                    $query_bt = "SELECT * FROM berkasteknisi WHERE id_proyek='$proyekid' AND id_alat='$idAlat'";
                                                                                                    $result_bt = mysqli_query($conn, $query_bt) or die(mysqli_error($conn));
                                                                                                    $row_jml_bt = mysqli_num_rows($result_bt);

                                                                                                    if ($row_jml_bt > 0) {
                                                                                                ?>
                                                                                                        <em class="icon ni ni-check-circle-cut text-success"></em>
                                                                                                    <?php
                                                                                                    } else {
                                                                                                    ?>
                                                                                                        <a href=" #" id="<?= '0;' . $proyekid . ';' . $row_ak['id_alat'] . ';'; ?>" class="toggle btn btn-AddBerkasteknisi btn-round btn-icon btn-xs btn-success"><em class="icon ni ni-plus-medi-fill"></em></a>
                                                                                                    <?php
                                                                                                    }
                                                                                                } else {
                                                                                                    $query_bt = "SELECT * FROM berkasteknisi WHERE id_proyek='$proyekid' AND id_alat='$idAlat'";
                                                                                                    $result_bt = mysqli_query($conn, $query_bt) or die(mysqli_error($conn));
                                                                                                    $row_jml_bt = mysqli_num_rows($result_bt);

                                                                                                    if ($row_jml_bt > 0) {
                                                                                                    ?>
                                                                                                        <em class="icon ni ni-check-circle-cut text-success"></em>
                                                                                                    <?php
                                                                                                    } else {
                                                                                                    ?>
                                                                                                        <em class="icon ni ni-cross text-danger"></em>
                                                                                                <?php
                                                                                                    }
                                                                                                }
                                                                                                ?>
                                                                                            </td>

                                                                                            <!-- <td><?= $nomor_urut; ?></td> -->
                                                                                            <td><?= $row_kj['nama_barang_kajiulang']; ?></td>
                                                                                            <td><?= $row_ly['nama_layanan']; ?></td>
                                                                                            <td><?= $row_ak['nama_alat']; ?></td>
                                                                                            <td><?= $row_ak['no_seri']; ?></td>
                                                                                        </tr>
                                                                        <?php
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- footer @s -->
                <?php include "./footer.html" ?>
                <!-- footer @e -->
            </div>
            <!-- content @e -->

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

                $('.productTitle').text('Proyek Baru');
                $('.productDes').html('<p>Tambahkan informasi proyek baru.</p>');
                // console.log($("#namalengkap_user").val());

                $("#form_name").val("add_proyek");
                $("#id_proyek").val('');
                $("#no_proyek").val('');
                $("#id_pelanggan").val('');
                // $("#kategori_proyek").val('RS');
                $("#deadline_proyek").val('');
                $("#sumberdana_proyek").val('JKN');
                $("#pagu_proyek").val('');
                $("#marketing_proyek").val('<?= $row_session['nama_user']; ?>');
                $("#alatlaik_proyek").val('Diganti');
                $("#jenisalat_proyek").val('Fix');
                $("#jmlalat_proyek").val('Fix');
                $("#jmldana_proyek").val('Fix');
                $("#jadwalkerja_proyek").val('Disesuaikan');
                $("#daftarinventaris_proyek").val('Ada');
                $("#deadlinesertifikat_proyek").val('Disesuaikan');
                $("#catatan_proyek").val('');
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
                        cmd: "get_proyek_details",
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
                        $("#deadlinesertifikat_proyek").val(result[
                            'deadlinesertifikat_proyek']);
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
                            form_name: "del_berkasteknisi",
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

            $(document).on('click', '.btn-kembali', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                Swal.fire({
                    title: 'Apakah Kembalikan Alat?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, kembalikan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "kembali_berkasteknisi",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Alat telah dikembalikan.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Alat gagal dikembalikan.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Alat gagal dikembalikan.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            });

            // $(document).on('click', '.btn-AddBerkasteknisi', function(ev) {
            //     ev.preventDefault();
            //     var tbl_id = $(this).attr("id").split(';');

            //     Swal.fire({
            //         title: 'Apakah pinjam Alat?',
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonText: 'Ya, pinjam!'
            //     }).then(function(result) {
            //         if (result.value) {
            //             // hapus data
            //             $.post('save_details.php', {
            //                 form_name: "add_berkasteknisi",
            //                 berkasteknisi_id: tbl_id[0],
            //                 proyek_id: tbl_id[1],
            //                 alat_id: tbl_id[2]
            //             }, function(data, status) {
            //                 console.log(data);
            //                 if (data == "1") {
            //                     Swal.fire({
            //                         icon: "success",
            //                         title: "Alat telah dipinjam.",
            //                         showConfirmButton: false,
            //                         timer: 750,
            //                     });
            //                     setTimeout(function() {
            //                         location.reload();
            //                     }, 2000);
            //                 } else if (data == "404-del") {
            //                     Swal.fire({
            //                         icon: "error",
            //                         title: "Alat gagal dipinjam.",
            //                         showConfirmButton: false,
            //                         timer: 750,
            //                     });
            //                 } else {
            //                     Swal.fire({
            //                         icon: "error",
            //                         title: "Alat gagal dipinjam.",
            //                         showConfirmButton: false,
            //                         timer: 750,
            //                     });
            //                 }
            //             });
            //         }
            //     });
            // });

            $(document).on('click', '.btn-AddBerkasteknisi', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id").split(';');

                $.post('save_details.php', {
                    form_name: "add_berkasteknisi",
                    berkasteknisi_id: tbl_id[0],
                    proyek_id: tbl_id[1],
                    alat_id: tbl_id[2]
                }, function(data, status) {
                    console.log(data);
                    if (data == "1") {
                        setTimeout(function() {
                            location.reload();
                        }, 25);
                    } else if (data == "404-del") {
                        Swal.fire({
                            icon: "error",
                            title: "Alat gagal dipinjam.",
                            showConfirmButton: false,
                            timer: 750,
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Alat gagal dipinjam.",
                            showConfirmButton: false,
                            timer: 750,
                        });
                    }
                });
            });

            $(document).on('click', '.btn-deleteAll', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                Swal.fire({
                    title: 'Apakah menghapus semua kalibrator?',
                    text: "Data yang terhapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus data!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "del_berkasteknisiAll",
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

            $(document).on('click', '.btn-kembaliAll', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                Swal.fire({
                    title: 'Apakah kembalikan semua kalibrator?',
                    text: "Kalibrator akan dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, kembalikan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "kembaliAll_berkasteknisi",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Kalibrator telah dikembalikan.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Kalibrator gagal dikembalikan.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Kalibrator gagal dikembalikan.",
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
    </script>

</body>

</html>