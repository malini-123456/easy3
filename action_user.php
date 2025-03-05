<?php 
    require_once('connect.php'); 
    
    if (isset($_POST['action']) && $_POST['action']=='login') {
        session_start();

        $username_pelanggan = $_POST['username_pelanggan'];
        $pass_pelanggan = $_POST['pass_pelanggan'];

        // $stmt_l = $conn->prepare("SELECT * FROM user WHERE username_pelanggan=? AND pass=?");
        $stmt_l = $conn->prepare("SELECT * FROM pelanggan WHERE username_pelanggan=? AND pass_pelanggan=?");
        $stmt_l->bind_param("ss",$username_pelanggan, $pass_pelanggan);
        $stmt_l->execute();
        $user = $stmt_l->fetch();

        if ($user != null) {
            $_SESSION['username_pelanggan'] = $username_pelanggan;
            $_SESSION["login_time_stamp"] = time();
            echo 'ok1';

            if (!empty($_POST['rem'])) {
                setcookie("username_pelanggan", $_POST['username_pelanggan'], time()+(10*365*24*60*60));
                setcookie("pass_pelanggan", $_POST['pass_pelanggan'], time()+(10*365*24*60*60));
            }
            else {
                if (isset($_COOKIE['username_pelanggan'])) {
                    setcookie("username_pelanggan","");
                }
                if (isset($_COOKIE['pass_pelanggan'])) {
                    setcookie("pass_pelanggan","");
                }
            }
        }
        else {
            echo 'Login failed. Check username_pelanggan & password!';
        }
    }

?>