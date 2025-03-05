<?php require_once('session.php');
if ($username) {
    $query_session = "SELECT * FROM user WHERE username = '$username'";
    $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
    $row_session = mysqli_fetch_assoc($result_session);
    $userid = $row_session['id_user'];
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
                        <a href="notify" class="nk-quick-nav-icon"></a>
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <!-- <em class="icon ni ni-user-alt"></em> -->
                                    <?php if ($row_session['foto_user'] != '') { ?>
                                        <img src="./images/user/<?= $row_session['foto_user']; ?>" width="32px" height="32px" alt="">
                                    <?php } else { ?>
                                        <img src="./images/user/0.png" alt="">
                                    <?php } ?>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <?php if ($row_session['foto_user'] != '') { ?>
                                            <img src="./images/user/<?= $row_session['foto_user']; ?>" width="40px" height="40px" alt="">
                                        <?php } else { ?>
                                            <img src="./images/user/0.png" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?= $row_session['posisi_user']; ?></span>
                                        <span class="sub-text"><?= $row_session['nama_user']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="profile"><em class="icon ni ni-user-alt"></em><span>Profile
                                                Setting</span></a></li>
                                    <li><a class="dark-switch" href="#" onclick="darkMode()"><em class="icon ni ni-moon"></em><span>Dark
                                                Mode</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="logout"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>