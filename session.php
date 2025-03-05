<?php 
    session_start();
    require_once('connect.php');

    $user = $_SESSION['username'];
    $stmt = $conn->prepare("SELECT * FROM user WHERE username=?");
    $stmt->bind_param("s",$user);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array(MYSQLI_ASSOC);

    $username = $row['username'];
    // $uid = $row['id'];

    if (!isset($user)) {
        header("location:index");
    }
    else {
        if (time() - $_SESSION["login_time_stamp"] > (6*60*60))  {
            session_unset();
            session_destroy();
            header("location:index");
        }
    }
?>