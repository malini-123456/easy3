<?php
/*
$servername = 'localhost';
$username   = 'root';
$password   = '';
$dbname     = "db_multiple";
$conn       = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
    die('Could not Connect MySql Server:' . mysql_error());
}
*/
?>


<?php
$server = "localhost";
// $username = "root";
// $password = "";
$username="api_ttd";
$password="5zZ6ju37_";
$database = "db_multiple";
$conn = mysqli_connect($server, $username, $password, $database) or die(mysqli_error($conn));
// $db = mysql_select_db("php_crud",$conn) or die(mysql_error());
// date_default_timezone_set('Asia/Kolkata');