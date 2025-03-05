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
                                    <h3>Data Peminjaman</h3>
                                    <div class="nk-block-between">
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                <!-- <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Admin Teknis') || ($row_session['posisi_user'] == 'PJ Teknis') || ($row_session['posisi_user'] == 'Teknisi')) { ?> -->
                                <div class="nk-block nk-block-lg">
                                    <div class="col-md-12 col-lg-12 col-xxl-12">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <!-- <h5>Proyek <?= $row0['no_proyek']; ?></h5><br> -->
                                                    <form id="hl_form" name="hl_form" class="form-validate is-alter" novalidate="novalidate">
                                                        <input type="hidden" id="form_name" name="form_name" value="add_peminjamanmikropipet" />
                                                        <input type="hidden" id="id_peminjaman" name="id_peminjaman" value="0" />

                                                        <div class="row g-3">
                                                            <div class="col-md-6 col-sm-12" id="no_proyek_add">
                                                                <div class="form-group">
                                                                    <label class="form-label">No.Proyek</label>
                                                                    <div class="form-control-wrap">
                                                                        <div class="form-control-select">
                                                                            <select class="form-control" id="no_proyek" name="no_proyek" required data-msg="Mohon pilih proyek">
                                                                                <?php
                                                                                require_once('connect.php');
                                                                                $sql = mysqli_query($conn, "SELECT * FROM proyek WHERE status_proyek != 'SELESAI' AND status_proyek != 'BATAL' ORDER BY no_proyek DESC");
                                                                                echo "<option value=''>-- proyek --</option>";
                                                                                while ($row = $sql->fetch_assoc()) {
                                                                                    $idpelanggan = $row['id_pelanggan'];
                                                                                    $query1 = "SELECT * FROM pelanggan WHERE id_pelanggan = '$idpelanggan'";
                                                                                    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                                                    $row1 = mysqli_fetch_assoc($result1);

                                                                                    echo "<option value=" . $row['no_proyek'] . ">" . $row['no_proyek'] . ' | ' . $row1['nama_pelanggan'] . "</option>";
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12" id="no_proyek_edit">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="no_proyek">No.Proyek</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="no_proyek2" name="no_proyek2" required readonly data-msg="Mohon isi No.Proyek" placeholder="No.Proyek">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="nama_peminjam">Nama
                                                                        Peminjam</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $row_session['nama_user']; ?>" required data-msg="Mohon isi Nama Peminjam" placeholder="Nama Peminjam" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="nama_pelanggan">Nama
                                                                        Instansi</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required data-msg="Mohon isi Nama Pelanggan" placeholder="Nama Instansi">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="tgl_peminjaman">Tgl.
                                                                        Peminjaman</label>
                                                                    <div class="form-control-wrap">
                                                                        <div class="form-icon form-icon-right">
                                                                            <em class="icon ni ni-calendar-booking"></em>
                                                                        </div>
                                                                        <input type="text" class="form-control date-picker invalid" data-date-format="yyyy-mm-dd" id="tgl_peminjaman" name="tgl_peminjaman" required data-msg="Mohon isi Tgl Peminjaman" placeholder="Tgl Peminjaman">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="nama_penerima">Nama
                                                                        Penerima</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="link_peminjaman">Link
                                                                        Peminjaman</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="link_peminjaman" name="link_peminjaman" placeholder="Link Peminjaman">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-12">
                                                                <button class="btn btn-primary btn-form-action btn-submit"><span>Simpan</span></button>
                                                                <a href="#" class="btn btn-danger btn-form-action btn-reset">Clear</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- <?php } ?> -->
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
                                                    <table class="datatable-init-export_action1desc nowrap table" data-export-title="Export">
                                                        <thead>
                                                            <tr>
                                                                <th>Action</th>
                                                                <th>Tgl. Pinjam</th>
                                                                <th>Kembali</th>
                                                                <th>No. Proyek</th>
                                                                <th>Nama Peminjam</th>
                                                                <th>Nama Instansi</th>
                                                                <th>Nama Penerima</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sno = 0;
                                                            $query = "SELECT * FROM peminjamanmikropipet ORDER BY tgl_peminjaman DESC";
                                                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                            while ($row = mysqli_fetch_array($result)) {

                                                                $noso = $row['no_proyek'];
                                                                $status = true;
                                                                $query1 = "SELECT * FROM detailpeminjamanmikropipet INNER JOIN mikropipet ON detailpeminjamanmikropipet.id_mikropipet = mikropipet.id_mikropipet 
                                                            WHERE detailpeminjamanmikropipet.no_proyek='$noso' ORDER BY mikropipet.merek ASC";
                                                                $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                                                                while ($row1 = mysqli_fetch_array($result1)) {
                                                                    if ($row1['kembali'] == 'Dikembalikan') $status = true;
                                                                    else $status = false;
                                                                }

                                                                $sno++;
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger btn-xs" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-left">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li>
                                                                                    <a href="#" onclick="peminjaman_pdf('<?= $row['id_peminjaman']; ?>')" class="toggle"><em class="icon ni ni-file-pdf"></em><span>PDF</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <?php if ($row['link_peminjaman'] != '') { ?>
                                                                                        <a href="<?= $row['link_peminjaman']; ?>" target="_blank" class="toogle">
                                                                                            <em class="icon ni ni-download"></em>
                                                                                            <span>Link Dokumen</span>
                                                                                        </a>
                                                                                    <?php } else { ?>
                                                                                        <a href="#" class="toogle">
                                                                                            <em class="icon ni ni-na"></em>
                                                                                            <span>Link Dokumen</span>
                                                                                        </a>
                                                                                    <?php } ?>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" onclick="peminjaman_detail_page('<?= $row['no_proyek']; ?>')" class="toggle"><em class="icon ni ni-info-fill"></em><span>Detail
                                                                                            Peminjaman</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" id="<?= $row['id_peminjaman']; ?>" class="toggle btn-edit"><em class="icon ni ni-edit-fill"></em><span>Edit
                                                                                            Peminjaman</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" id="<?= $row['id_peminjaman']; ?>" class="toggle btn-delete"><em class="icon ni ni-trash-fill"></em><span>Delete
                                                                                            Peminjaman</span></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>

                                                                    <!-- <td><?= date_format(date_create($row['tgl_peminjaman']), 'd F Y'); ?></td> -->
                                                                    <td><?= $row['tgl_peminjaman']; ?></td>
                                                                    <td class="icon-text text-center">
                                                                        <?php if ($status == true) { ?>
                                                                            <em class="icon ni ni-check-circle-cut text-success"></em>
                                                                        <?php } else { ?>
                                                                            <em class="icon ni ni-cross text-danger"></em>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td><?= $row['no_proyek']; ?></td>
                                                                    <td><?= $row['nama_peminjam']; ?></td>
                                                                    <td><?= $row['nama_pelanggan']; ?></td>
                                                                    <td><?= $row['nama_penerima']; ?></td>
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
            document.title = 'Peminjaman Mikropipet';

            // var table = $('.datatable-init-export').DataTable();
            // table.order([4, 'desc']).draw();

            $("#hl_form").validate({
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $(document).on('click', '.btn-reset', function(ev) {
                ev.preventDefault();
                $("#form_name").val("add_peminjamanmikropipet");
                $("#id_peminjaman").val('');
                $("#no_proyek").val('');
                $("#nama_peminjam").val('<?= $row_session['nama_user']; ?>').focus();
                $("#nama_pelanggan").val('');
                $("#tgl_peminjaman").val('');
                $("#nama_penerima").val('');
                $("#link_peminjaman").val('');

                $("#no_proyek_add").show();
                $("#no_proyek_edit").hide();
            });

            $(document).on('click', '.btn-submit', function(ev) {
                ev.preventDefault();
                var btn_button = $(this);
                var dataURL = '';
                var file = '';

                if ($("#hl_form").valid() == true) {
                    // btn_button.attr("disabled", true);

                    var form_data = new FormData($('#hl_form')[0]);
                    // console.log(form_data);
                    // var form_data = new FormData($('#hl_form')[0]);
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

                $("#no_proyek_add").hide();
                $("#no_proyek_edit").show();

                $.ajax({
                    cache: false,
                    url: 'get_ajax_details.php', // url where to submit the request
                    type: "GET", // type of action POST || GET
                    dataType: 'json', // data type
                    data: {
                        cmd: "get_peminjamanmikropipet_details",
                        tbl_id: tbl_id
                    }, // post data || get data
                    success: function(result) {
                        // console.log(result);
                        $("#form_name").val("edit_peminjamanmikropipet");
                        $("#id_peminjaman").val(result['id_peminjaman']);
                        $("#no_proyek2").val(result['no_proyek']);
                        $("#nama_peminjam").val(result['nama_peminjam']).focus();
                        $("#nama_pelanggan").val(result['nama_pelanggan']);
                        $("#tgl_peminjaman").val(result['tgl_peminjaman']);
                        $("#nama_penerima").val(result['nama_penerima']);
                        $("#link_peminjaman").val(result['link_peminjaman']);
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
                            form_name: "del_peminjamanmikropipet",
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

        function peminjaman_detail_page(uid) {
            let link = 'peminjaman_detail?uid=' + uid;
            window.open(link, '_self');
        }

        function peminjaman_pdf(idpeminjaman) {
            let link = 'peminjamanmikropipet_pdf?uid=' + idpeminjaman;
            window.open(link, '_blank');
        }

        function reset() {
            $("#form_name").val("add_peminjamanmikropipet");
            $("#id_peminjaman").val('');
            $("#no_proyek").val('');
            $("#nama_peminjam").val('<?= $row_session['nama_user']; ?>');
            $("#nama_pelanggan").val('');
            $("#tgl_peminjaman").val('');
            $("#nama_penerima").val('');
            $("#link_peminjaman").val('');

            $("#no_proyek_add").show();
            $("#no_proyek_edit").hide();
        }
    </script>

</body>

</html>