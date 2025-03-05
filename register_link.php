<?php require_once('connect.php'); ?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<?php include "./head.html" ?>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div
                            class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">

                                        <div class="nk-block-des">
                                            <p class="lead">Selamat Bergabung dengan PT. Elektromedika Instrumen Tera
                                                Nusantara.
                                            </p>
                                            <p>Untuk dapat mengakses ENS10 Administration System, kami harus
                                                mengonfirmasi status kepegawaian Anda dengan mengisi data personel di
                                                bawah. </p>
                                            <p>Semua data pribadi Anda akan dirahasiakan dan hanya digunakan untuk
                                                kebutuhan internal perusahaan.</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form id="hl_form" name="hl_form" class="form-validate is-alter"
                                    novalidate="novalidate">
                                    <input type="hidden" id="form_name" name="form_name" value="add_user" />
                                    <h5 class="nk-block-title">Register</h5>
                                    <div class="form-group">
                                        <label class="form-label" for="nama_user">Nama Lengkap</label>
                                        <div class="form-control-wrap invalid">
                                            <input type="text" class="form-control" id="nama_user" name="nama_user"
                                                required placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="telp_user">No Telepon (WhatsApp)</label>
                                        <div class="form-control-wrap invalid">
                                            <input type="text" class="form-control" id="telp_user" name="telp_user"
                                                required placeholder="WhatsApp">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="pass">Password</label>
                                        <div class="form-control-wrap invalid">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                                                data-target="pass">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control" id="pass" name="pass" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="pass2">Confirm password</label>
                                        <div class="form-control-wrap invalid">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                                                data-target="pass2">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control" id="pass2" name="pass2"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="rem" class="custom-control-input"
                                                id="customCheck" required>
                                            <label for="customCheck" class="custom-control-label"></label>
                                            <strong class="text-primary" data-toggle="modal" data-target="#Pakta">Pakta
                                                Integritas</strong>
                                        </div>
                                    </div>

                                    <div class=" form-group">
                                        <button class="btn btn-primary btn-block btn-submit">Register</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> Already have an account ? <a href="index"><strong>Sign
                                            in instead</strong></a>
                                </div>
                            </div><!-- .nk-block -->

                        </div><!-- nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-azure-dim d-flex toggle-break-lg toggle-slide toggle-slide-right"
                            data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="./images/slides/ens_1.jpg">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">

                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="./images/slides/ens_2.jpg">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">

                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- nk-split-content -->
                    </div><!-- nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
        <div class="modal fade" tabindex="-1" id="Pakta">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                    <div class="modal-header">
                        <h5 class="modal-title">Pakta Integritas</h5>
                    </div>
                    <div class="modal-body">
                        <article class="center">
                            <p class="lead"><strong>Personel Laboratorium Kalibrasi PT. Elektromedika Instrumen Tera
                                    Nusantara</strong>
                            </p>

                        </article>
                        <p>Saya yang bertanda tangan di bawah ini dengan penuh kesadaran dan tanggung jawab melaksanakan
                            pakta integritas personel laboratorium dengan kesepakatan sebagai berikut:</p>
                        <p>1. Bekerja secara teamwork berlandaskan profesionalisme, independensi, kejujuran, semangat,
                            dan
                            menjunjung tinggi integritas sehingga validitas data kalibrasi serta ketertelusuran
                            metrologi
                            dapat dibuktikan secara ilmiah;</p>
                        <p>2. Memberikan standar pelayanan secara konsisten dan menjaga komunikasi yang baik serta
                            melindungi kerahasiaan informasi dan hak kepemilikan pelanggan dari pihak-pihak yang tidak
                            berkepentingan;</p>
                        <p>3. Mempertimbangankan pengelolaan lingkungan hidup serta keselamatan dan kesehatan kerja
                            sehingga
                            tercapai nol kecelakaan dalam setiap kegiatan kalibrasi;</p>
                        <p>4. Memelihara semua aset, dokumen, rekaman, dan hak kekayaan intelektual yang dimiliki
                            laboratorium serta tidak mengubah/memperbanyak/mengutip/menyalin sebagian atau keseluruhan
                            dokumen dan rekaman untuk kepentingan pribadi maupun pihak-pihak lain;</p>
                        <p>5. Berkomitmen meningkatkan lingkungan yang sehat, aman, dan kondusif, serta bebas dari
                            penyalahgunaan narkotika dan obat terlarang, alkohol, senjata api atau senjata tajam, serta
                            tidak merokok di ruang kerja.</p>
                    </div>
                    <div class="modal-footer bg-light">
                        <span class="sub-text"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=2.9.0"></script>
    <script src="./assets/js/scripts.js?ver=2.9.0"></script>

    <script>
    $(document).ready(function() {

        reset();

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
                    url: 'save_register.php',
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
                                text: 'Anda telah teregistrasi dalam sistem kami, mohon menunggu ID Karyawan anda sedang diproses oleh HR.',
                                showConfirmButton: true,
                                // timer: 1500,
                            }).then(function(result) {
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            });
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

        function reset() {
            $('#form_name').val('add_user');
            $('#nama_user').val('');
            $('#telp_user').val('');
            $('#pass').val('');
            $('#pass2').val('');
            $('#customCheck').prop('checked', false);
        }

        // cekDark();
    });
    </script>

</html>