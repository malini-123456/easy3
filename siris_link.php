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
                                            <h3 class="nk-block-title page-title">Data Sertifikat Pelanggan</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <!-- <a href="#" data-target="addPelanggan" class="toggle btn btn-primary btn-reset"><em class="icon ni ni-plus"></em><span>Add Pelanggan</span></a> -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init-export_action1asc wrap table" data-export-title="Export">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Nama Pelanggan</th>
                                                        <!-- <th>Alamat</th>
                                                        <th>Kontak</th>
                                                        <th>Kategori</th>
                                                        <th>NPWP</th>
                                                        <th>Nama NPWP</th>
                                                        <th>Karakteristik</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sno = 0;
                                                    $arrIdPelanggan = array();
                                                    $query_sertifikat = "SELECT * FROM sertifikat ORDER BY id_sertifikat DESC";
                                                    $result_sertifikat = mysqli_query($conn, $query_sertifikat) or die(mysqli_error($conn));
                                                    while ($row_sertifikat = mysqli_fetch_array($result_sertifikat)) {
                                                        $sno++;

                                                        $id_proyek = $row_sertifikat['id_proyek'];
                                                        $query_proyek = "SELECT * FROM proyek WHERE id_proyek = '$id_proyek'";
                                                        $result_proyek = mysqli_query($conn, $query_proyek) or die(mysqli_error($conn));
                                                        $row_proyek = mysqli_fetch_assoc($result_proyek);
                                                        $pelangganId = $row_proyek['id_pelanggan'];

                                                        if (!in_array($pelangganId, $arrIdPelanggan)) {
                                                            array_push($arrIdPelanggan, $pelangganId);
                                                            $query = "SELECT * FROM pelanggan WHERE id_pelanggan='$pelangganId'";
                                                            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                            $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                            <tr>
                                                                <td width='75'>
                                                                    <a href="#" id="<?= $row['id_pelanggan']; ?>" onclick="viewDetails('<?= $row['id_pelanggan']; ?>')" class="btn btn-icon btn-trigger btn-sm" data-toggle="tooltip" data-placement="top" title="Detail"><em class="icon ni ni-info-fill"></em></a>
                                                                </td>
                                                                <td><?= $row['nama_pelanggan']; ?></td>
                                                                <!-- <td><?= $row['alamat_pelanggan']; ?></td>
                                                            <td><?= $row['kontak_pelanggan']; ?></td>
                                                            <td><?= $row['kategori_pelanggan']; ?></td>
                                                            <td><?= $row['npwp_pelanggan']; ?></td>
                                                            <td><?= $row['namanpwp_pelanggan']; ?></td>
                                                            <td><?= $row['catatan_pelanggan']; ?></td> -->
                                                            </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
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
                $("#logo_pelanggan").val('');
                $("#catatan_pelanggan").val('');
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
                        $("#logo_pelanggan").val(result['logo_pelanggan']);
                        $("#catatan_pelanggan").val(result['catatan_pelanggan']);
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

        function viewDetails(uid) {
            let link = 'sertifikatrev?uid=' + uid;
            window.open(link, '_self');
        }

    </script>

</body>

</html>