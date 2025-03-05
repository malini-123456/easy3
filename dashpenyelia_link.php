home_link.php<?php require_once('session.php');
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
                                <div>
                                    <div class=" tab-content">
                                        <div class="tab-pane active" id="tabItem9">
                                            <div class="nk-block nk-block-lg">
                                                <div class="card">
                                                    <div class="card-header bg-success">
                                                        <h6>PROJECT DEAL (ON-GOING)</h6>
                                                    </div>
                                                    <div class="card-inner">
                                                        <table class="datatable-init-export_action1asc wrap table fs-12px" data-export-title="Export">
                                                            <thead>
                                                                <tr>
                                                                    <th>Action</th>
                                                                    <th>Kode</th>
                                                                    <th>Nama Pelanggan</th>
                                                                    <th class="text-center">Jumlah Realisasi</th>
                                                                    <th>Tanggal Penyeliaan</th>
                                                                    <th>Deadline Sertif</th>
                                                                    <th class="text-center">Nama Penyelia</th>
                                                                    <th class="text-center">Sertif Terbit</th>
                                                                    <th class="text-center">Laporan</th>
                                                                    <th class="text-center">Tanggal BAST Diterima</th>
                                                                    <th>Catatan Penyelia</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sno = 0;
                                                                $query = "SELECT * FROM proyek WHERE status_proyek = 'ON GOING' ORDER BY id_proyek DESC";
                                                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                                while ($row = mysqli_fetch_array($result)) {

                                                                    $id_pelanggan = $row['id_pelanggan'];
                                                                    $id_proyek = $row['id_proyek'];
                                                                    $query2 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
                                                                    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                                                    $row2 = mysqli_fetch_assoc($result2);

                                                                    $timezone = time() + (60 * 60 * 8);
                                                                    $timezone7Min = time() + (60 * 60 * 8) - (7 * 24 * 3600);
                                                                    $dateNow = gmdate('Y-m-d', $timezone);
                                                                    $date7Min = gmdate('Y-m-d', $timezone7Min);

                                                                    $query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$id_proyek'";
                                                                    $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
                                                                    $row_kajiulang = mysqli_fetch_assoc($result_kajiulang);
                                                                    $row_jml_kajiulang = mysqli_num_rows($result_kajiulang);


                                                                    $totalAll = 0;
                                                                    $totalMampu = 0;
                                                                    $totalTidakMampu = 0;
                                                                    $insitu = 0;
                                                                    $eksitu = 0;
                                                                    $subkon = 0;
                                                                    if ($row_jml_kajiulang > 0) {
                                                                        $query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$id_proyek' ORDER BY id_kajiulang ASC";
                                                                        $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
                                                                        while ($row_kajiulang = mysqli_fetch_array($result_kajiulang)) {

                                                                            $id_layanan = $row_kajiulang['id_layanan'];
                                                                            $query_layanan = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
                                                                            $result_layanan = mysqli_query($conn, $query_layanan) or die(mysqli_error($conn));
                                                                            $row_layanan = mysqli_fetch_assoc($result_layanan);

                                                                            if ($row_kajiulang['kategori_kajiulang'] === 'Tidak Bisa Dikalibrasi') {
                                                                                $totalTidakMampu = $totalTidakMampu + $row_kajiulang['jumlah_barang_kajiulang'];
                                                                            } else {
                                                                                $totalMampu = $totalMampu + $row_kajiulang['jumlah_barang_kajiulang'];
                                                                            }

                                                                            if ($row_kajiulang['kategori_kajiulang'] === 'Insitu') {
                                                                                $insitu = $insitu + $row_kajiulang['jumlah_barang_kajiulang'];
                                                                            } else if ($row_kajiulang['kategori_kajiulang'] === 'Eksitu') {
                                                                                $eksitu = $eksitu + $row_kajiulang['jumlah_barang_kajiulang'];
                                                                            } else if ($row_kajiulang['kategori_kajiulang'] === 'Subkontrak') {
                                                                                $subkon = $subkon + $row_kajiulang['jumlah_barang_kajiulang'];
                                                                            }
                                                                        }
                                                                        $totalAll = $totalMampu + $totalTidakMampu;
                                                                    }

                                                                    $query_spk = "SELECT * FROM spk WHERE id_proyek = '$id_proyek'";
                                                                    $result_spk = mysqli_query($conn, $query_spk) or die(mysqli_error($conn));
                                                                    $row_spk = mysqli_fetch_assoc($result_spk);
                                                                    $row_jml_spk = mysqli_num_rows($result_spk);

                                                                    if ($row_jml_spk > 0) {
                                                                        $idtekkoor = $row_spk['koordinator_spk'];
                                                                        $query_tekkoor = "SELECT * FROM user WHERE id_user='$idtekkoor'";
                                                                        $result_tekkoor = mysqli_query($conn, $query_tekkoor) or die(mysqli_error($conn));
                                                                        $row_tekkoor = mysqli_fetch_assoc($result_tekkoor);
                                                                    }


                                                                    $query_berkasteknisi = "SELECT * FROM berkasteknisi WHERE id_proyek = '$id_proyek'";
                                                                    $result_berkasteknisi = mysqli_query($conn, $query_berkasteknisi) or die(mysqli_error($conn));
                                                                    $row_berkasteknisi = mysqli_fetch_assoc($result_berkasteknisi);
                                                                    $row_jml_berkasteknisi = mysqli_num_rows($result_berkasteknisi);

                                                                    $query_berkasteknisiT = "SELECT * FROM berkasteknisi WHERE id_proyek='$id_proyek' AND kembali_berkasteknisi='T'";
                                                                    $result_berkasteknisiT = mysqli_query($conn, $query_berkasteknisiT) or die(mysqli_error($conn));
                                                                    $row_berkasteknisiT = mysqli_fetch_assoc($result_berkasteknisiT);
                                                                    $row_jml_berkasteknisiT = mysqli_num_rows($result_berkasteknisiT);


                                                                    $sno++;
                                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger btn-xs" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-left">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li>
                                                                                        <a href="#" id="<?= $id_proyek; ?>" class="toggle btn-down"><em class="icon ni ni-edit"></em><span>Edit</span></a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#" id="<?= $id_proyek; ?>" class="toggle btn-finish"><em class="icon ni ni-check-circle-fill"></em><span>Penyeliaan Selesai</span></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>

                                                                        <!-- <td><?= $sno . '.'; ?></td> -->
                                                                        <!-- <td><?= $row['no_proyek']; ?></td> -->
                                                                        <td>
                                                                            <a href="#" onclick="penyelia_detail(<?= $row['id_proyek']; ?>)"><?= $row['no_proyek']; ?></a>
                                                                        </td>
                                                                        <td><?= $row2['nama_pelanggan']; ?></td>

                                                                        <?php
                                                                        if ($totalAll > 0) {
                                                                        ?>
                                                                            <td class="text-center"><?= $totalAll; ?></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class="text-center">-</td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($row_jml_spk > 0) {
                                                                        ?>
                                                                            <td><?= $row_tekkoor['nama_user']; ?></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td>-</td>
                                                                        <?php
                                                                        }
                                                                        ?>



                                                                        <td><?= $row['namapemilik_proyek']; ?></td>
                                                                        <td class="text-center"><?= date("d F Y", strtotime($row['tglorder_proyek'])); ?></td>


                                                                        <?php
                                                                        if ($insitu > 0) {
                                                                        ?>
                                                                            <td class="text-center"><?= $insitu; ?></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class="text-center">-</td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($eksitu > 0) {
                                                                        ?>
                                                                            <td class="text-center"><?= $eksitu; ?></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class="text-center">-</td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($subkon > 0) {
                                                                        ?>
                                                                            <td class="text-center"><?= $subkon; ?></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class="text-center">-</td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($row_jml_berkasteknisi > 0) {
                                                                            if ($row_jml_berkasteknisiT > 0) {
                                                                        ?>
                                                                                <td class="icon-text pl-4 pr-4">
                                                                                    <em class="icon ni ni-swap text-azure"></em>
                                                                                </td>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <td class="icon-text pl-4 pr-4">
                                                                                    <em class="icon ni ni-check-circle-cut text-success"></em>
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class="text-center">-</td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <!-- <td><?= $row['lastupdate_proyek']; ?></td> -->
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-block nk-block-lg">
                                                <div class="card">
                                                    <div class="card-header bg-indigo text-white">
                                                        <h6>PROJECT SELESAI</h6>
                                                    </div>
                                                    <div class="card-inner">
                                                        <table class="datatable-init-export_action1asc wrap table fs-12px" data-export-title="Export">
                                                            <thead>
                                                                <tr>
                                                                    <th>Kode</th>
                                                                    <th>Nama Pelanggan</th>
                                                                    <th class="text-center">Jumlah Realisasi</th>
                                                                    <th>Tanggal Penyeliaan</th>
                                                                    <th>Deadline Sertif</th>
                                                                    <th class="text-center">Nama Penyelia</th>
                                                                    <th class="text-center">Sertif Terbit</th>
                                                                    <th class="text-center">Laporan</th>
                                                                    <th class="text-center">Tanggal BAST Diterima</th>
                                                                    <th>Catatan Penyelia</th>
                                                                </tr>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sno = 0;
                                                                $query = "SELECT * FROM proyek WHERE status_proyek = 'SELESAI' ORDER BY id_proyek DESC";
                                                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                                while ($row = mysqli_fetch_array($result)) {

                                                                    $id_pelanggan = $row['id_pelanggan'];
                                                                    $id_proyek = $row['id_proyek'];
                                                                    $query2 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
                                                                    $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
                                                                    $row2 = mysqli_fetch_assoc($result2);

                                                                    $timezone = time() + (60 * 60 * 8);
                                                                    $timezone7Min = time() + (60 * 60 * 8) - (7 * 24 * 3600);
                                                                    $dateNow = gmdate('Y-m-d', $timezone);
                                                                    $date7Min = gmdate('Y-m-d', $timezone7Min);

                                                                    $query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$id_proyek'";
                                                                    $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
                                                                    $row_kajiulang = mysqli_fetch_assoc($result_kajiulang);
                                                                    $row_jml_kajiulang = mysqli_num_rows($result_kajiulang);


                                                                    $totalAll = 0;
                                                                    $totalMampu = 0;
                                                                    $totalTidakMampu = 0;
                                                                    $insitu = 0;
                                                                    $eksitu = 0;
                                                                    $subkon = 0;
                                                                    if ($row_jml_kajiulang > 0) {
                                                                        $query_kajiulang = "SELECT * FROM kajiulang WHERE id_proyek = '$id_proyek' ORDER BY id_kajiulang ASC";
                                                                        $result_kajiulang = mysqli_query($conn, $query_kajiulang) or die(mysqli_error($conn));
                                                                        while ($row_kajiulang = mysqli_fetch_array($result_kajiulang)) {

                                                                            $id_layanan = $row_kajiulang['id_layanan'];
                                                                            $query_layanan = "SELECT * FROM layanan WHERE id_layanan = '$id_layanan'";
                                                                            $result_layanan = mysqli_query($conn, $query_layanan) or die(mysqli_error($conn));
                                                                            $row_layanan = mysqli_fetch_assoc($result_layanan);

                                                                            if ($row_kajiulang['kategori_kajiulang'] === 'Tidak Bisa Dikalibrasi') {
                                                                                $totalTidakMampu = $totalTidakMampu + $row_kajiulang['jumlah_barang_kajiulang'];
                                                                            } else {
                                                                                $totalMampu = $totalMampu + $row_kajiulang['jumlah_barang_kajiulang'];
                                                                            }

                                                                            if ($row_kajiulang['kategori_kajiulang'] === 'Insitu') {
                                                                                $insitu = $insitu + $row_kajiulang['jumlah_barang_kajiulang'];
                                                                            } else if ($row_kajiulang['kategori_kajiulang'] === 'Eksitu') {
                                                                                $eksitu = $eksitu + $row_kajiulang['jumlah_barang_kajiulang'];
                                                                            } else if ($row_kajiulang['kategori_kajiulang'] === 'Subkontrak') {
                                                                                $subkon = $subkon + $row_kajiulang['jumlah_barang_kajiulang'];
                                                                            }
                                                                        }
                                                                        $totalAll = $totalMampu + $totalTidakMampu;
                                                                    }

                                                                    $query_spk = "SELECT * FROM spk WHERE id_proyek = '$id_proyek'";
                                                                    $result_spk = mysqli_query($conn, $query_spk) or die(mysqli_error($conn));
                                                                    $row_spk = mysqli_fetch_assoc($result_spk);
                                                                    $row_jml_spk = mysqli_num_rows($result_spk);

                                                                    if ($row_jml_spk > 0) {
                                                                        $idtekkoor = $row_spk['koordinator_spk'];
                                                                        $query_tekkoor = "SELECT * FROM user WHERE id_user='$idtekkoor'";
                                                                        $result_tekkoor = mysqli_query($conn, $query_tekkoor) or die(mysqli_error($conn));
                                                                        $row_tekkoor = mysqli_fetch_assoc($result_tekkoor);
                                                                    }


                                                                    $query_berkasteknisi = "SELECT * FROM berkasteknisi WHERE id_proyek = '$id_proyek'";
                                                                    $result_berkasteknisi = mysqli_query($conn, $query_berkasteknisi) or die(mysqli_error($conn));
                                                                    $row_berkasteknisi = mysqli_fetch_assoc($result_berkasteknisi);
                                                                    $row_jml_berkasteknisi = mysqli_num_rows($result_berkasteknisi);

                                                                    $query_berkasteknisiT = "SELECT * FROM berkasteknisi WHERE id_proyek='$id_proyek' AND kembali_berkasteknisi='T'";
                                                                    $result_berkasteknisiT = mysqli_query($conn, $query_berkasteknisiT) or die(mysqli_error($conn));
                                                                    $row_berkasteknisiT = mysqli_fetch_assoc($result_berkasteknisiT);
                                                                    $row_jml_berkasteknisiT = mysqli_num_rows($result_berkasteknisiT);


                                                                    $sno++;
                                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <a href="#" onclick="penyelia_detail(<?= $row['id_proyek']; ?>)"><?= $row['no_proyek']; ?></a>
                                                                        </td>
                                                                        <td><?= $row2['nama_pelanggan']; ?></td>

                                                                        <?php
                                                                        if ($totalAll > 0) {
                                                                        ?>
                                                                            <td class="text-center"><?= $totalAll; ?></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class="text-center">-</td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($row_jml_spk > 0) {
                                                                        ?>
                                                                            <td><?= $row_tekkoor['nama_user']; ?></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td>-</td>
                                                                        <?php
                                                                        }
                                                                        ?>



                                                                        <td><?= $row['namapemilik_proyek']; ?></td>
                                                                        <td class="text-center"><?= date("d F Y", strtotime($row['tglorder_proyek'])); ?></td>


                                                                        <?php
                                                                        if ($insitu > 0) {
                                                                        ?>
                                                                            <td class="text-center"><?= $insitu; ?></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class="text-center">-</td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($eksitu > 0) {
                                                                        ?>
                                                                            <td class="text-center"><?= $eksitu; ?></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class="text-center">-</td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($subkon > 0) {
                                                                        ?>
                                                                            <td class="text-center"><?= $subkon; ?></td>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class="text-center">-</td>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($row_jml_berkasteknisi > 0) {
                                                                            if ($row_jml_berkasteknisiT > 0) {
                                                                        ?>
                                                                                <td class="icon-text pl-4 pr-4">
                                                                                    <em class="icon ni ni-swap text-azure"></em>
                                                                                </td>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <td class="icon-text pl-4 pr-4">
                                                                                    <em class="icon ni ni-check-circle-cut text-success"></em>
                                                                                </td>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <td class="text-center">-</td>
                                                                        <?php
                                                                        }
                                                                        ?>
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
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <?php include "./scripts.html" ?>
    <!-- JavaScript -->
    <script>
        $(document).ready(function(e) {
            document.title = 'Data Proyek';

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
                $("#tglorder_proyek").val('');
                $("#marketing_proyek").val('<?= $row_session['nama_user']; ?>');
                $("#namapemilik_proyek").val('');
                $("#alamatpemilik_proyek").val('');
                $("#permohonan_proyek").val('');
                $("#catatan_proyek").val('');

                $("#insitu_proyek").val('');
                $("#insitu_progres_proyek").val('');
                $("#eksitu_proyek").val('');
                $("#eksitu_progres_proyek").val('');
                $("#subkon_proyek").val('');
                $("#subkon_progres_proyek").val('');
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
                        $("#tglorder_proyek").val(result['tglorder_proyek']);
                        $("#marketing_proyek").val('<?= $row_session['nama_user']; ?>');
                        $("#namapemilik_proyek").val(result['namapemilik_proyek']);
                        $("#alamatpemilik_proyek").val(result['alamatpemilik_proyek']);
                        $("#permohonan_proyek").val(result['permohonan_proyek']);
                        $("#catatan_proyek").val(result['catatan_proyek']);

                        $("#insitu_proyek").val(result['insitu_proyek']);
                        $("#insitu_progres_proyek").val(result['insitu_progres_proyek']);
                        $("#eksitu_proyek").val(result['eksitu_proyek']);
                        $("#eksitu_progres_proyek").val(result['eksitu_progres_proyek']);
                        $("#subkon_proyek").val(result['subkon_proyek']);
                        $("#subkon_progres_proyek").val(result['subkon_progres_proyek']);
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
                            form_name: "del_proyek",
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
                $("#nama_pelanggan2").val($(".select2-search__field").val());

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



            $(document).on('click', '.btn-up', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                Swal.fire({
                    title: 'Apakah upgrade status proyek?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, upgrade!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "up_proyek",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Status telah diupgrade.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Status gagal diupgrade.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Status gagal diupgrade.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            });

            $(document).on('click', '.btn-down', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                Swal.fire({
                    title: 'Apakah downgrade status proyek?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, downgrade!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "down_proyek",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Status telah didowngrade.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Status gagal didowngrade.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Status gagal didowngrade.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            });

            $(document).on('click', '.btn-finish', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                Swal.fire({
                    title: 'Apakah menyelesaikan proyek?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, selesaikan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "finish_proyek",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Status proyek telah selesai.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Status proyek gagal selesai.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Status proyek gagal selesai.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            }
                        });
                    }
                });
            });

            $(document).on('click', '.btn-cancel', function(ev) {
                ev.preventDefault();
                var tbl_id = $(this).attr("id");

                Swal.fire({
                    title: 'Apakah membatalkan proyek?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, batalkan!'
                }).then(function(result) {
                    if (result.value) {
                        // hapus data
                        $.post('save_details.php', {
                            form_name: "cancel_proyek",
                            tbl_id: tbl_id
                        }, function(data, status) {
                            console.log(data);
                            if (data == "1") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Status proyek telah dibatalkan.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else if (data == "404-del") {
                                Swal.fire({
                                    icon: "error",
                                    title: "Status proyek gagal dibatalkan.",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Status proyek gagal dibatalkan.",
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


        function penyelia_detail(uid) {
            let link = 'penyelia_detail?uid=' + uid;
            window.open(link, '_self');
        }
    </script>

</body>

</html>