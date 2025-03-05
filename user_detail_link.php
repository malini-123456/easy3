<?php require_once('session.php'); 
    if ($username) {
        $query_session = "SELECT * FROM user WHERE username = '$username'";
        $result_session = mysqli_query($conn, $query_session) or die(mysqli_error($conn));
        $row_session = mysqli_fetch_assoc($result_session);
    }

if (isset($_REQUEST['uid'])) {
    $userid = $_REQUEST['uid'];

    $query0 = "SELECT * FROM user WHERE id_user = '$userid'";
    $result0 = mysqli_query($conn, $query0) or die(mysqli_error($conn));
    $row0 = mysqli_fetch_assoc($result0);
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
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <div class="content-page wide-md m-auto">
                                                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                                    <div class="nk-block-head-content text-center">
                                                        <img src="./images/avatar/a-sm.jpg">
                                                        <p></p>
                                                        <div class="nk-block-des">
                                                            <h4 class="title text-primary text-uppercase">
                                                                <?= $row0['nama_user']; ?>
                                                            </h4>
                                                            <h4 class="text-soft text-capitalize">
                                                                <?= $row0['posisi_user']; ?></h4>
                                                            <ul class="team-info">
                                                                <li><span>ID.
                                                                        No.</span><span><?= $row0['username']; ?></span>
                                                                </li>
                                                                <li><span>Email</span><span><?= $row0['email_user']; ?></span>
                                                                </li>
                                                                <li><span>Phone</span><span><?= $row0['telp_user']; ?></span>
                                                                </li>
                                                                <li><span>Join
                                                                        Date</span><span><?= $row0['join_user']; ?></span>
                                                                </li>
                                                                <li><span>
                                                                        <a href="https://wa.me/6283114794575?text=Hi,%20Putu%20Widya"
                                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                                            Icon WA</a>
                                                                    </span></li>
                                                                <li><span>
                                                                        <a href="tel:+6283114794575"
                                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                                            Icon Telp</a>
                                                                    </span></li>
                                                                <li><span>
                                                                        <a href="mailto:ayiptulang95@gmail.com"
                                                                            class="btn btn-round btn-sm btn-dim btn-outline-info">
                                                                            Icon Email</a>
                                                                    </span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                            </div><!-- .content-page -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <!-- select region modal -->

</html>