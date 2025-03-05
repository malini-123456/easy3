<?php require_once('session.php');
if ($username) {
    $query_session = "SELECT * FROM user WHERE username = '$username'";
    $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
    $row_session = mysqli_fetch_assoc($result_session);
}

if (isset($_REQUEST['uid'])) {
    $alatid = $_REQUEST['uid'];

    $query0 = "SELECT * FROM alatkalibrasi WHERE id_alat = '$alatid'";
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
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="row pb-5">

                                                <div class="col-md-8 col-lg-8 col-xxl-8">


                                                    <!-- SLIDER INIT -->

                                                    <div class="slider-init"
                                                        data-slick='{"arrows": true, "dots": true, "slidesToShow": 2, "slidesToScroll": 1, "infinite":false, "responsive":[ {"breakpoint": 992,"settings":{"slidesToShow": 1}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}} ]}'>

                                                        <?php
                                                        if ($row0['link_alat'] != '') {
                                                            $str_alat = explode(';;', $row0['link_alat']);
                                                            if (sizeof($str_alat) == 1) {
                                                        ?>
                                                        <div class="col">
                                                            <div class="card card-bordered">
                                                                <img src="<?= $str_alat[0]; ?>" class="card-img"
                                                                    height="400px">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="card card-bordered">
                                                                <img src="<?= $str_alat[0]; ?>" class="card-img"
                                                                    height="400px">
                                                            </div>
                                                        </div>
                                                        <?php
                                                            } else {
                                                                for ($i = 0; $i < sizeof($str_alat); $i++) {
                                                                ?>
                                                        <div class="col">
                                                            <div class="card card-bordered">
                                                                <img src="<?= $str_alat[$i]; ?>" class="card-img"
                                                                    height="400px">
                                                            </div>
                                                        </div>
                                                        <?php
                                                                }
                                                            }
                                                        } else {
                                                            ?>
                                                        <div class="col">
                                                            <div class="card card-bordered">
                                                                <img src="./images/img/0.png" class="card-img"
                                                                    height="400px">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="card card-bordered">
                                                                <img src="./images/img/0.png" class="card-img"
                                                                    height="400px">
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>

                                                <!-- SLIDER INIT -->


                                                <div class="col-md-4 col-lg-4 col-xxl-4">
                                                    <h3 class="product-title"><?= $row0['nama_alat']; ?></h3>
                                                    <div class="product-meta">
                                                        <ul class="pricing-features">
                                                            <li><span class="w-50">Merek</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['merek']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Tipe</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['tipe']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">No Seri</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['no_seri']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Kode Inventaris</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['kode_inventaris']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Harga</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary">Rp.<?= number_format($row0['harga'], 0); ?></span>
                                                            </li>
                                                            <li><span class="w-50">Penyedia</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['penyedia']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Rentang Ukur</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['rentang_ukur']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Resolusi</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?= $row0['resolusi']; ?></span>
                                                            </li>
                                                            <li><span class="w-50">Tgl Diterima</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?=  date_format(date_create($row0['tgl_diterima']), 'd F Y'); ?></span>
                                                            </li>
                                                            <?php if ($row0['tgl_kalibrasi'] == '0000-00-00') { ?>
                                                            <li><span class="w-50">Tgl Dikalibrasi</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary">-</span>
                                                            </li>
                                                            <?php } else { ?>
                                                            <li><span class="w-50">Tgl Dikalibrasi</span><span
                                                                    class="ml-auto fs-16px fw-bold text-secondary"><?=  date_format(date_create($row0['tgl_kalibrasi']), 'd F Y'); ?></span>
                                                            </li>
                                                            <?php } ?>
                                                            <li>
                                                                <span class="w-50">Dokumen Alat</span>
                                                                <?php if ($row0['doc_alat'] != '') { ?>
                                                                <span class="ml-auto fs-16px fw-bold text-secondary"><a
                                                                        href="<?= $row0['doc_alat']; ?>" target="_blank"
                                                                        class="toogle"><em
                                                                            class="icon ni ni-download"></em><span>Download</span></span></a>
                                                                <?php } else { ?>
                                                                <span class="ml-auto fs-16px fw-bold text-secondary">
                                                                    <a href="#" class="toogle">
                                                                        <em
                                                                            class="icon ni ni-na"></em><span>Download</span></span></a>
                                                                <?php } ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p></p>


                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <h4>History Peminjaman</h4>
                                            <table class="datatable-init-export_noaction1desc nowrap table"
                                                data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Tgl. Dipinjam</th>
                                                        <th>No Proyek</th>
                                                        <th>Nama Pelanggan</th>
                                                        <th>Penanggung Jawab Alat</th>
                                                        <!-- <th>Kondisi</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sno = 0;

                                                    $query1 = "SELECT * FROM berkasteknisi WHERE id_alat = '$alatid' ORDER BY id_berkasteknisi DESC";
                                                    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                    while ($row1 = mysqli_fetch_array($result1)) {

                                                        $proyekid = $row1['id_proyek'];

                                                        $query2 = "SELECT * FROM proyek WHERE id_proyek = '$proyekid'";
                                                        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                                        $row2 = mysqli_fetch_assoc($result2);
                                                        $pelangganid = $row2['id_pelanggan'];

                                                        $query3 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$pelangganid'";
                                                        $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
                                                        $row3 = mysqli_fetch_assoc($result3);

                                                        $query4 = "SELECT * FROM spk WHERE id_proyek = '$proyekid'";
                                                        $result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
                                                        $row4 = mysqli_fetch_assoc($result4);
                                                        $teknisiid = $row4['koordinator_spk'];

                                                        $query5 = "SELECT * FROM user WHERE id_user = '$teknisiid'";
                                                        $result5 = mysqli_query($conn, $query5) or die(mysqli_error($conn));
                                                        $row5 = mysqli_fetch_assoc($result5);

                                                        $sno++;
                                                    ?>
                                                    <tr>
                                                        <!-- <td><?= $sno; ?></td> -->
                                                        <td><?=  date_format(date_create($row1['lastupdate_berkasteknisi']), 'd F Y');  ?></td>
                                                        <td><?= $row2['no_proyek']; ?></td>
                                                        <td><?= $row3['nama_pelanggan']; ?></td>
                                                        <td><?= $row5['nama_user']; ?></td>
                                                        <!-- <td><?= $row1['kondisi_berkasteknisi']; ?></td> -->
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="nk-block-between">
                                                <div class="nk-block-head-content">
                                                    <h4>Riwayat Alat</h4>
                                                </div>
                                                <div class="nk-block-head-content">
                                                    <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Teknisi') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Admin Teknis')) { ?>
                                                    <a href="#" data-target="addRiwayat"
                                                        class="toggle btn btn-primary btn-reset"><em
                                                            class="icon ni ni-plus"></em><span>Add Riwayat</span></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <p></p>
                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Teknisi') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Admin Teknis')) { ?>
                                            <table class="datatable-init-export_action1desc nowrap table"
                                                data-export-title="Export">
                                                <?php } else { ?>
                                                <table class="datatable-init-export_noaction1desc nowrap table"
                                                    data-export-title="Export">
                                                    <?php } ?>
                                                    <thead>
                                                        <tr>
                                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Teknisi') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Admin Teknis')) { ?>
                                                            <th>Action</th>
                                                            <?php } ?>
                                                            <th>Tanggal</th>
                                                            <th>Tindakan</th>
                                                            <th>Deskripsi</th>
                                                            <th>Kategori</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sno = 0;
                                                        $query = "SELECT * FROM riwayat WHERE id_alat = '$alatid' ORDER BY id_riwayat DESC";
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($result)) {

                                                            $sno++;
                                                        ?>
                                                        <tr>
                                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Teknisi') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Admin Teknis')) { ?>
                                                            <td>
                                                                <a href="#" id="<?= $row['id_riwayat']; ?>"
                                                                    class="btn btn-icon btn-trigger btn-sm btn-delete"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Delete"><em
                                                                        class="icon ni ni-trash-fill"></em></a>
                                                            </td>
                                                            <?php } ?>
                                                            <td><?=  date_format(date_create($row['tgl_riwayat']), 'd F Y'); ?></td>
                                                            <td><?= $row['tindakan_riwayat']; ?></td>
                                                            <td><?= $row['deskripsi_riwayat']; ?></td>
                                                            <td><?= $row['kategori_riwayat']; ?></td>
                                                        </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>

                                    <div class="nk-add-product toggle-slide toggle-slide-right"
                                        data-content="addRiwayat" data-toggle-screen="any" data-toggle-overlay="true"
                                        data-toggle-body="true" data-simplebar>
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h5 class="nk-block-title productTitle">Riwayat Alat</h5>
                                                <div class="nk-block-des productDes">
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-block">
                                            <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                                novalidate="novalidate">
                                                <input type="hidden" id="form_name" name="form_name"
                                                    value="add_riwayat" />
                                                <input type="hidden" id="id_riwayat" name="id_riwayat" value="0" />
                                                <input type="hidden" id="id_alat" name="id_alat"
                                                    value="<?= $alatid; ?>" />
                                                <div class="form-group">
                                                    <label class="form-label" for="kategori_riwayat">Kategori</label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-control-select">
                                                            <select class="form-control" id="
                                                            kategori_riwayat" name="kategori_riwayat">
                                                                <option value="Perbaikan">Perbaikan</option>                                                          <option value="Pemeliharaan">Pemeliharaan</option>
<option value="Modifikasi">Modifikasi</option>
<option value="Kalibrasi">Kalibrasi</option>
<option value="Uji Banding">Uji Banding</option>
<option value="Uji Profisiensi">Uji Profisiensi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class=" form-group">
                                                    <label class="form-label" for="deskripsi_riwayat">Deskripsi</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" id="deskripsi_riwayat"
                                                            name="deskripsi_riwayat"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="tgl_riwayat">Tanggal</label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-calendar-booking"></em>
                                                        </div>
                                                        <input type="text" class="form-control date-picker"
                                                            data-date-format="yyyy-mm-dd" id="tgl_riwayat"
                                                            name="tgl_riwayat">
                                                    </div>
                                                    <div class="form-note">Date format <code>yyyy-mm-dd</code></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="tindakan_riwayat">Tindakan</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control" id="tindakan_riwayat"
                                                            name="tindakan_riwayat"></textarea>
                                                    </div>
                                                </div>
                                                <button
                                                    class="btn btn-primary btn-form-action btn-submit btn-riwayat"><span>Simpan
                                                    </span></button>
                                            </form>
                                        </div>
                                    </div>

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
        </div> <!-- main @e -->

        <?php include "./scripts.html" ?>
        <!-- JavaScript -->
        <script>
        $(document).ready(function(e) {
            document.title = 'Detail Alat | ' + '<?= $row0['nama_alat']; ?>';

            $("#hl_form").validate({
                submitHandler: function(form) {
                    form.submit();
                }
            });

            // $(document).on('click', '.btn-reset', function(ev) {
            //     ev.preventDefault();
            //     $("#form_name").val("add_verifikasibelisubkontrak");
            //     $("#id_verifikasibelisubkontrak").val('');
            //     $("#namaproduk_verifikasibelisubkontrak").val('');
            //     $("#penyedia_verifikasibelisubkontrak").val('');
            //     $("#nopo_verifikasibelisubkontrak").val('');
            //     $("#noinvoice_verifikasibelisubkontrak").val('');
            //     $("#jumlah_verifikasibelisubkontrak").val('');
            //     $("#spesifikasi_verifikasibelisubkontrak").val('');
            //     $("#kondisi_verifikasibelisubkontrak").val('');
            //     $("#invoice_verifikasibelisubkontrak").val('');
            //     $("#fakturpajak_verifikasibelisubkontrak").val('');
            //     $("#garansi_verifikasibelisubkontrak").val('');
            //     $("#catatan_verifikasibelisubkontrak").val('');
            //     $("#keputusan_verifikasibelisubkontrak").val('');

            // });

            $(document).on('click', '.btn-riwayat', function(ev) {
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
                            form_name: "del_riwayat",
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