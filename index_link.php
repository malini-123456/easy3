<?php
session_start();
require_once('connect.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query_session = "SELECT * FROM user WHERE username = '$username'";
    $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
    $row_session = mysqli_fetch_assoc($result_session);
    header("location:home");
}
?>

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
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em
                                        class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5 text-center">
                                    <a href="index" class="logo-link">
                                        <img class="logo-light logo-img" src="./images/logo.jpg"
                                            srcset="./images/logo.jpg 2x" alt="logo">
                                        <img class="logo-dark logo-img" src="./images/logo.jpg"
                                            srcset="./images/logo.jpg 2x" alt="logo-dark">
                                    </a>
                                    <br>
                                    <br>
                                    <span class="fw-bold fs-17px">PT Elektromedika Instrumen Tera Nusantara</span>
                                    <br>
                                    <span>
                                        <h6 class="nk-block-title text-center">ENS10 Administration System (EASY)</h6>
                                    </span>
                                </div>
                                <!-- <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title text-center">Einsten Administration System (EASY)</h5>
                                    </div>
                                </div> -->
                                <br>
                                <form action="" method="post" role="form" id="login-frm" class="form-validate">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="username">ID Pegawai</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="username"
                                                name="username" placeholder="ID Pegawai" required
                                                value="<?php if (isset($_COOKIE['username'])) {
                                                                                                                                                                                echo $_COOKIE['username'];
                                                                                                                                                                            } ?>">
                                        </div>
                                    </div><!-- .form-group -->

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password"
                                                name="password" placeholder="Password" required
                                                value="<?php if (isset($_COOKIE['password'])) {
                                                                                                                                                                                    echo $_COOKIE['password'];
                                                                                                                                                                                } ?>">
                                        </div>
                                    </div><!-- .foem-group -->

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="rem" class="custom-control-input"
                                                id="customCheck" <?php if (isset($_COOKIE['username'])) { ?> checked
                                                <?php } ?>>
                                            <label for="customCheck" class="custom-control-label">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="login" name="login"
                                            class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 pt-4"> Do not have account ? <a
                                        href="register"><strong>Register</strong></a>
                                </div>
                            </div><!-- .nk-block -->
                            <?php include "./footer.html" ?>
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
                            data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="./images/slides/ens_1.jpg"
                                                    srcset="./images/slides/ens_1.jpg 2x" alt="">
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="./images/slides/ens_2.jpg"
                                                    srcset="./images/slides/ens_2.jpg 2x" alt="">
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=2.9.0"></script>
    <script src="./assets/js/scripts.js?ver=2.9.0"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        // $("#login-box").show();
        $("#login-frm").validate();
        $("#login").click(function(e) {
            if (document.getElementById('login-frm').checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: $("#login-frm").serialize() + '&action=login',
                    success: function(response) {
                        if (response == "ok0") {
                            console.log('katalog');
                            window.open(katalog, '_self');
                        } else if (response == "ok1") {
                            console.log('home');
                            window.open('home', '_self');
                        } else {
                            console.log(response);
                            Swal.fire({
                                icon: "error",
                                title: "Gagal Login",
                                text: 'ID Pegawai atau Password anda tidak sesuai',
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        }
                    }
                });
            }
            return true;
        });

        // cekDark();
    });
    </script>

</html>