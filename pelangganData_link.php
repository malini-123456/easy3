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
                                            <h3 class="nk-block-title page-title">Data Pelanggan</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing') || ($row_session['posisi_user'] == 'Admin Umum')) { ?>
                                                <a href="#" data-target="addPelanggan" class="toggle btn btn-primary btn-reset"><em class="icon ni ni-plus"></em><span>Add Pelanggan</span></a>
                                            <?php } ?>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing') || ($row_session['posisi_user'] == 'Admin Umum')) { ?>
                                                <table class="datatable-init-export_action1asc wrap table" data-export-title="Export">
                                                <?php } else { ?>
                                                    <table class="datatable-init-export_noaction1asc wrap table" data-export-title="Export">
                                                    <?php } ?>
                                                    <thead>
                                                        <tr>
                                                            <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing') || ($row_session['posisi_user'] == 'Admin Umum')) { ?>
                                                                <th>Action</th>
                                                            <?php } ?>
                                                            <th>Nama Pelanggan</th>
                                                            <th>Alamat</th>
                                                            <th>Kontak</th>
                                                            <th>Kategori</th>
                                                            <th>NPWP</th>
                                                            <th>Nama NPWP</th>
                                                            <th>PIC Keuangan</th>
                                                            <th>PIC Teknis</th>
                                                            <th>Karakteristik</th>
                                                            <th>Username</th>
                                                            <th>Pass</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sno = 0;
                                                        $query = "SELECT * FROM pelanggan ORDER BY id_pelanggan DESC";
                                                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $sno++;
                                                        ?>
                                                            <tr>
                                                                <?php if (($row_session['posisi_user'] == 'SA') || ($row_session['posisi_user'] == 'Marketing') || ($row_session['posisi_user'] == 'Admin Umum')) { ?>
                                                                    <td>
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger btn-xs" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-left">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <!-- <li>
                                                                                    <a href="#" onclick="pelanggan_qr('<?= $row['nama_pelanggan']; ?>')" class="toggle"><em class="icon ni ni-qr"></em><span>QR Code</span></a>
                                                                                </li> -->
                                                                                <!-- <li><a href="#" onclick="pelanggan_pdf(<?= $row['id_pelanggan']; ?>)" class="toggle"><em class="icon ni ni-file-pdf"></em><span>Account Access</span></a>
                                                                                </li> -->
                                                                                <li>
                                                                                    <a href="#" id="<?= $row['id_pelanggan']; ?>" data-target="addPelanggan" data-dismiss="modal" class="toggle btn-edit"><em class="icon ni ni-edit-fill"></em><span>Edit
                                                                                            Pelanggan</span></a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#" id="<?= $row['id_pelanggan']; ?>" class="toggle btn-delete"><em class="icon ni ni-trash-fill"></em><span>Delete
                                                                                            Pelanggan</span></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </td>
                                                                <?php } ?>

                                                                <td><?= $row['nama_pelanggan']; ?></td>
                                                                <td><?= $row['alamat_pelanggan']; ?></td>
                                                                <td><?= $row['kontak_pelanggan']; ?></td>
                                                                <td><?= $row['kategori_pelanggan']; ?></td>
                                                                <td><?= $row['npwp_pelanggan']; ?></td>
                                                                <td><?= $row['namanpwp_pelanggan']; ?></td>
                                                                <td><?= $row['keuangan_pelanggan']; ?></td>
                                                                <td><?= $row['teknis_pelanggan']; ?></td>
                                                                <td><?= $row['catatan_pelanggan']; ?></td>
                                                                <td><?= $row['username_pelanggan']; ?></td>
                                                                <td><?= $row['pass_pelanggan']; ?></td>
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
                                <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addPelanggan" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title productTitle">Pelanggan Baru</h5>
                                            <div class="nk-block-des productDes">
                                                <p>Tambahkan informasi pelanggan baru.</p>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <form id="hl_form" name="hl_form" class="form-validate is-alter" novalidate="novalidate">
                                            <input type="hidden" id="form_name" name="form_name" value="add_pelanggan" />
                                            <input type="hidden" id="id_pelanggan" name="id_pelanggan" value="0" />
                                            <input type="hidden" id="keuangan_pelanggan" name="keuangan_pelanggan" value="0" />
                                            <input type="hidden" id="teknis_pelanggan" name="teknis_pelanggan" value="0" />

                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="nama_pelanggan">Nama
                                                            Pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control invalid" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" required data-msg="Mohon isi nama pelanggan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="alamat_pelanggan">Alamat
                                                            pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-map-pin"></em>
                                                            </div>
                                                            <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" placeholder="Alamat pelanggan" required data-msg="Mohon isi alamat pelanggan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kontak_pelanggan">Kontak pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="kontak_pelanggan" name="kontak_pelanggan" placeholder="Kontak pelanggan" required data-msg="Mohon isi kontak pelanggan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="kategori_pelanggan">Pilih Kategori:</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" id="kategori_pelanggan" name="kategori_pelanggan">
                                                                    <option value="Instansi Pemerintah">Instansi Pemerintah</option>
                                                                    <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                                                                    <option value="RS Pemerintah">RS Pemerintah</option>
                                                                    <option value="RS Swasta">RS Swasta</option>
                                                                    <option value="Puskesmas">Puskesmas</option>
                                                                    <option value="General">General</option>
                                                                    <option value="Klinik">Klinik</option>
                                                                    <option value="Nakes">Nakes</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="npwp_pelanggan">NPWP
                                                            pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="npwp_pelanggan" name="npwp_pelanggan" placeholder="NPWP pelanggan" required data-msg="Mohon isi NPWP pelanggan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="namanpwp_pelanggan">Nama NPWP
                                                            pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="namanpwp_pelanggan" name="namanpwp_pelanggan" placeholder="Nama NPWP pelanggan" required data-msg="Mohon isi nama NPWP pelanggan">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="logo_pelanggan">Logo pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="logo_pelanggan" name="logo_pelanggan" placeholder="Logo pelanggan">
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="catatan_pelanggan">Karakteristik
                                                            pelanggan</label>
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control" id="catatan_pelanggan" name="catatan_pelanggan"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="username_pelanggan">Username</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="username_pelanggan" name="username_pelanggan" placeholder="Username">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="pass_pelanggan">Pass</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="pass_pelanggan" name="pass_pelanggan" placeholder="Pass">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-form-action btn-submit"><em class="icon ni ni-plus"></em><span>Simpan</span></button>
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
            document.title = 'Data Pelanggan';

            $("#hl_form").validate({
                submitHandler: function(form) {
                    form.submit();
                }
            });

            $(document).on('click', '.btn-reset', function(ev) {
                ev.preventDefault();

                $('.productTitle').text('Pelanggan Baru');
                $('.productDes').html('<p>Tambahkan informasi pelanggan baru.</p>');
                // console.log($("#namalengkap_user").val());

                $("#form_name").val("add_pelanggan");
                $("#id_pelanggan").val('');
                $("#nama_pelanggan").val('');
                $("#alamat_pelanggan").val('');
                $("#kontak_pelanggan").val('');
                $("#kategori_pelanggan").val('Instansi Pemerintah');
                $("#npwp_pelanggan").val('');
                $("#namanpwp_pelanggan").val('');
                $("#keuangan_pelanggan").val('');
                $("#teknis_pelanggan").val('');
                // $("#logo_pelanggan").val('');
                $("#catatan_pelanggan").val('');
                $("#username_pelanggan").val('');
                $("#pass_pelanggan").val('');
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
                // $('.nk-add-pelanggan').addClass('content-active');
                // $('.nk-content-body').append('<div class="toggle-overlay" data-target="addPelanggan"></div>');
                $('.productTitle').text('Edit pelanggan');
                $('.productDes').html('<p>Edit pelanggan.</p>');

                // var btn_button = $(this);
                // btn_button.html('<i class="fas fa-spinner fa-spin"></i>');
                var tbl_id = $(this).attr("id");

                $.ajax({
                    cache: false,
                    url: 'get_ajax_details.php', // url where to submit the request
                    type: "GET", // type of action POST || GET
                    dataType: 'json', // data type
                    data: {
                        cmd: "get_pelanggan_details",
                        tbl_id: tbl_id
                    }, // post data || get data
                    success: function(result) {
                        // btn_button.html(
                        //     '<em class="icon ni ni-edit"></em><span>Edit pelanggan</span>'
                        // );
                        console.log(result);
                        $("#form_name").val("edit_pelanggan");
                        $("#id_pelanggan").val(result['id_pelanggan']);
                        $("#nama_pelanggan").val(result['nama_pelanggan']);
                        $("#alamat_pelanggan").val(result['alamat_pelanggan']);
                        $("#kontak_pelanggan").val(result['kontak_pelanggan']);
                        $("#kategori_pelanggan").val(result['kategori_pelanggan']);
                        $("#npwp_pelanggan").val(result['npwp_pelanggan']);
                        $("#namanpwp_pelanggan").val(result['namanpwp_pelanggan']);
                        $("#keuangan_pelanggan").val(result['keuangan_pelanggan']);
                        $("#teknis_pelanggan").val(result['teknis_pelanggan']);
                        // $("#logo_pelanggan").val(result['logo_pelanggan']);
                        $("#catatan_pelanggan").val(result['catatan_pelanggan']);
                        $("#username_pelanggan").val(result['username_pelanggan']);
                        $("#pass_pelanggan").val(result['pass_pelanggan']);
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
                            form_name: "del_pelanggan",
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

        function pelanggan_pdf(uid) {
            let link = 'useracc_pdf?uid=' + uid;
            window.open(link, '_blank');
        }
        
        function pelanggan_qr(namapelanggan) {
            // let note = 'malini;;' + idpemilik + ';;' + nopesanan;
            // let key = "malinicakep";
            // let ciphertext = btoa(CryptoJS.AES.encrypt(note, key).toString());
            let url = 'https://pt-einsten.com/easy3/sertifikat_user?pel=' + namapelanggan;
            url = url.replace(/ /g, '%20');
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
            qrcode.downloadImage(namapelanggan + '.png');
        }
    </script>

</body>

</html>