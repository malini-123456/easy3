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
                                                        <h6>SERTIFIKAT PERLU E-SIGNATURE</h6>
                                                    </div>
                                                    <div class="card-inner">
                                                        <table class="datatable-init-export_action1asc wrap table fs-12px" data-export-title="Export">
                                                            <thead>
                                                                <tr>
                                                                    <th>Action</th>
                                                                    <th>No</th>
                                                                    <th>Kode Dokumen</th>
                                                                    <th>Nama Alat</th>
                                                                    <th>Nama Pelanggan</th>
                                                                    <th>TTD</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-block nk-block-lg">
                                                <div class="card">
                                                    <div class="card-header bg-indigo text-white">
                                                        <h6>SERTIFIKAT TERBIT</h6>
                                                    </div>
                                                    <div class="card-inner">
                                                        <table class="datatable-init-export_action1asc wrap table fs-12px" data-export-title="Export">
                                                            <thead>
                                                                <tr>
                                                                    <th>Action</th>
                                                                    <th>No</th>
                                                                    <th>Kode Dokumen</th>
                                                                    <th>Nama Alat</th>
                                                                    <th>Nama Pelanggan</th>
                                                                    <th>TTD</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
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