<?php require_once('session_user.php');
if ($username_pelanggan) {
    $query_session = "SELECT * FROM pelanggan WHERE username_pelanggan = '$username_pelanggan'";
    $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
    $row_session = mysqli_fetch_assoc($result_session);
    $userid = $row_session['id_pelanggan'];
}
?>

<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="home" class="logo-link">
                    <img class="logo-light logo-img" src="./images/favicon.ico" srcset="./images/favicon.ico 2x" alt="logo">
                    <img class="logo-dark logo-img" src="./images/favicon.ico" srcset="./images/favicon.ico 2x" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-search ml-3 ml-xl-0">
                <h5>EASY - Ensten Administration System</h5>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown notification-dropdown">
                        <a href="logout_user" class="nk-quick-nav-icon"><em class="icon ni ni-signout"></em></a>
                    </li>                    
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>