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
                        cetak_stiker(code);
                    } else if (code_huruf == 'M' || code_huruf == 'm') {
                        cetak_stiker(code);
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
        $("#form_name").val("add_stiker");
        $("#id_stiker").val('');
        $("#kode_stiker").val('');
    }

    function validate_angka(input) {
        return !isNaN(Number(input));
    }

    function cetak_stiker(kode) {
        let link = 'stiker_pdf?kode=' + kode;
        window.open(link, '_blank');
    }
    </script>

</body>

</html>