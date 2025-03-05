<?php
require_once('session.php');
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
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3>Generate Stiker</h3>
                                        </div>
                                        <div class="nk-block-head-content"></div>
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->


                                <div class="nk-block nk-block-lg">
                                    <div class="col-md-12 col-lg-12 col-xxl-12">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <!-- <h5>Proyek <?= $row0['no_proyek']; ?></h5><br> -->
                                                    <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                                        novalidate="novalidate">
                                                        <input type="hidden" id="form_name" name="form_name"
                                                            value="add_stiker" />
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
                                                            </div>
                                                        </div>

                                                        <br>

                                                        <div class="col-12">
                                                            <button
                                                                class="btn btn-primary btn-form-action btn-submit"><span>Generate</span></button>
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
        document.title = 'Generate Stiker';

        $("#hl_form").validate({
            submitHandler: function(form) {
                form.submit();
            }
        });

        $(document).on('click', '.btn-reset', function(ev) {
            ev.preventDefault();
            $("#form_name").val("add_stiker");
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
                        generate_stiker(code_huruf, code_angka, generate_stiker);
                    } else if (code_huruf == 'M' || code_huruf == 'm') {
                        code_huruf = 'M';
                        generate_stiker(code_huruf, code_angka, generate_stiker);
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

    var i = 1;

    function reset() {
        $("#form_name").val("add_stiker");
        $("#id_stiker").val('');
        $("#kode_stiker").val('');
    }

    function validate_angka(input) {
        return !isNaN(Number(input));
    }

    function sleep(time) {
        return new Promise((resolve) => setTimeout(resolve, time));
    }

    async function generate_stiker(churuf, cangka, callbackFn) {
        let url = 'https://pt-einsten.com/easy3/data/pdf/' + churuf + cangka + '.pdf';
        url = url.replace(/ /g, '%20');
        console.log('Ke-' + i + '=' + url);

        window.qrcode = new QrCodeWithLogo({
            content: url,
            width: 380,
            logo: {
                src: "./images/img/ens10.png",
                logoSize: 0.2,
                borderRadius: 100
            },
        });
        qrcode.downloadImage(churuf + cangka + '.png');

        await sleep(1000);
        if (i < 1000) {
            i++;
            cangka++;
            cangka = cangka.toString().padStart(5, '0');
            callbackFn(churuf, cangka, callbackFn);
        }
    }
    </script>

</body>

</html>