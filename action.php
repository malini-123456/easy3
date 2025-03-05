<?php 
    require_once('connect.php'); 
    
    if (isset($_POST['action']) && $_POST['action']=='login') {
        session_start();

        $username = $_POST['username'];
        $password = openssl_encrypt($_POST['password'], "AES-128-ECB", "malinicakep");

        // $stmt_l = $conn->prepare("SELECT * FROM user WHERE username=? AND pass=?");
        $stmt_l = $conn->prepare("SELECT * FROM user WHERE username=? AND pass=? AND status_user='Aktif'");
        $stmt_l->bind_param("ss",$username,$password);
        $stmt_l->execute();
        $user = $stmt_l->fetch();

        if ($user != null) {
            $_SESSION['username'] = $username;
            $_SESSION["login_time_stamp"] = time();
            echo 'ok1';

            if (!empty($_POST['rem'])) {
                setcookie("username", $_POST['username'], time()+(10*365*24*60*60));
                setcookie("password", $_POST['password'], time()+(10*365*24*60*60));
            }
            else {
                if (isset($_COOKIE['username'])) {
                    setcookie("username","");
                }
                if (isset($_COOKIE['password'])) {
                    setcookie("password","");
                }
            }
        }
        else {
            echo 'Login failed. Check username & password!';
        }
    }

?>