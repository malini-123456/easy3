<?php require_once('session.php');
if ($username) {
    $query_session = "SELECT * FROM user WHERE username = '$username'";
    $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
    $row_session = mysqli_fetch_assoc($result_session);

    $query_stikerH = "SELECT * FROM stiker WHERE huruf_stiker = 'H'";
    $result_stikerH = mysqli_query($conn, $query_stikerH) or die(mysqli_error($conn));
    $row_stikerH = mysqli_fetch_assoc($result_stikerH);
    $kodeH = 'H' . $row_stikerH['angka_stiker'];

    $query_stikerM = "SELECT * FROM stiker WHERE huruf_stiker = 'M'";
    $result_stikerM = mysqli_query($conn, $query_stikerM) or die(mysqli_error($conn));
    $row_stikerM = mysqli_fetch_assoc($result_stikerM);
    $kodeM = 'M' . $row_stikerM['angka_stiker'];
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
                                    <h3>Cetak Stiker</h3>
                                    <div class="nk-block-between">
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->

                                <div class="nk-block nk-block-lg">
                                    <div class="col-md-12 col-lg-12 col-xxl-12">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                                        novalidate="novalidate">
                                                        <input type="hidden" id="form_name" name="form_name"
                                                            value="edit_stiker" />
                                                        <input type="hidden" id="id_stiker" name="id_stiker"
                                                            value="0" />

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="kode_stiker">Kode
                                                                    Stiker</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="kode_stiker" name="kode_stiker"
                                                                        minlength="6" maxlength="6" required
                                                                        data-msg="Mohon isi Kode Stiker (Ex: H00001 atau M00001)"
                                                                        placeholder="Kode Stiker (Ex: H00001 atau M00001)">
                                                                </div>
                                                                <small class="text-muted">Note : kode stiker terakhir
                                                                    adalah
                                                                    <span class="code-tag"><?= $kodeH; ?></span> dan
                                                                    <span class="code-tag"><?= $kodeM; ?></span></small>
                                                            </div>
                                                        </div>

                                                        <br>

                                                        <div class="col-12">
                                                            <button
                                                                class="btn btn-primary btn-form-action btn-submit"><span>Cetak</span></button>
                                                            <a href="#"
                                                                class="btn btn-danger btn-form-action btn-reset">Clear</a>
                                                        </div>
                                                    </form>
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
        reset();
        document.title = 'Cetak Stiker';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();
            $("#form_name").val("edit_stiker");
            $("#id_stiker").val('');
            $("#kode_stiker").val('');
        });

        $(document).on('click', '.btn-submit', function(ev) {
            ev.preventDefault();
            var btn_button = $(this);
            var dataURL = '';
            var file = '';

            var code = $("#kode_stiker").val();
            var code_huruf = code.substring(0, 1);
            var code_angka = code.substring(1, 6);

            if ($("#hl_form").valid() == true) {
                var form_data = new FormData($('#hl_form')[0]);

                if (validate_angka(code_angka) == false) {
                    Swal.fire({
                        icon: "error",
                        title: "5 Digit terakhir harus angka",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                } else {
                    if (code_huruf == 'H' || code_huruf == 'h') {
                        code_huruf = 'H';
                        code = code_huruf + code_angka;
                        zip_stiker(code, code_huruf, code_angka);

                        // =================== UPDATE STIKER ====================
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
                                        title: "Data stiker terupdate.",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                    setTimeout(function() {
                                        location.reload();
                                    }, 3000);
                                } else {
                                    // Swal.fire({
                                    //     icon: "error",
                                    //     title: "Data stiker gagal tersimpan.",
                                    //     showConfirmButton: false,
                                    //     timer: 1500,
                                    // });
                                    // setTimeout(function() {
                                    //     location.reload();
                                    // }, 2000);
                                }
                            },
                            error: function(xhr, resp, text) {
                                console.log(xhr, resp, text);
                            }
                        });
                    } else if (code_huruf == 'M' || code_huruf == 'm') {
                        code_huruf = 'M';
                        code = code_huruf + code_angka;
                        zip_stiker(code, code_huruf, code_angka);

                        // =================== UPDATE STIKER ====================
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
                                        title: "Data stiker terupdate.",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                    setTimeout(function() {
                                        location.reload();
                                    }, 3000);
                                } else {
                                    // Swal.fire({
                                    //     icon: "error",
                                    //     title: "Data stiker gagal tersimpan.",
                                    //     showConfirmButton: false,
                                    //     timer: 1500,
                                    // });
                                    // setTimeout(function() {
                                    //     location.reload();
                                    // }, 2000);
                                }
                            },
                            error: function(xhr, resp, text) {
                                console.log(xhr, resp, text);
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Kode awal harus H atau M",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                }
            }
        });

        cekDark();
    });

    function reset() {
        $("#form_name").val("edit_stiker");
        $("#id_stiker").val('');
        $("#kode_stiker").val('');
    }

    function validate_angka(input) {
        return !isNaN(Number(input));
    }

    var urls = [];

    function zip_stiker(kode, churuf, cangka) {
        cangka0 = cangka;
        for (let i = 1; i <= 42; i++) {
            let url = 'https://pt-einsten.com/easy3/data/stiker/' + churuf + '/' + churuf + cangka + '.pdf';
            url = url.replace(/ /g, '%20');
            console.log('Ke-' + i + '=' + url);
            urls.push(url);

            if (i != 42) {
                cangka++;
                cangka = cangka.toString().padStart(5, '0');
            }
        }
        generatePDF(churuf, cangka0, cangka);
    }

    function generatePDF(huruf, angka0, angka) {
        var zip = new JSZip();
        var count = 0;
        var count2 = 0;
        var zipFilename = huruf + angka0 + '-' + huruf + angka + '.zip';
        var nameFromURL = [];

        var the_arr = "";
        for (var i = 0; i < urls.length; i++) {
            the_arr = urls[i].split('/');
            nameFromURL[i] = the_arr.pop();

        }

        urls.forEach(function(url) {
            var filename = nameFromURL[count2];
            count2++;
            // loading a file and add it in a zip file
            JSZipUtils.getBinaryContent(url, function(err, data) {
                if (err) {
                    throw err; // or handle the error
                }
                zip.file(filename, data, {
                    binary: true
                });
                count++;
                if (count === urls.length) {
                    zip.generateAsync({
                        type: 'blob'
                    }).then(function(content) {
                        saveAs(content, zipFilename);
                    });
                }
            });
        });
    }
    </script>

</body>

</html>