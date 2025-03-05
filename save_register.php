<?php require_once('connect.php');

$form_name = $_POST['form_name'];

if ($form_name == 'add_user') {
	$productnama = mysqli_real_escape_string($conn, trim($_POST['nama_user']));
	$producttelp = mysqli_real_escape_string($conn, trim($_POST['telp_user']));
	$productpass = mysqli_real_escape_string($conn, trim($_POST['pass']));
	$productpass2 = mysqli_real_escape_string($conn, trim($_POST['pass2']));
	$producthash = openssl_encrypt($productpass, "AES-128-ECB", "malinicakep");
	
	$query1 = "SELECT nama_user FROM user WHERE nama_user='$productnama'";
	$result1 = mysqli_query($conn, $query1) or die(mysql_error());
	$row1 = mysqli_num_rows($result1);

	if( ($row1 == 0) && ($productpass == $productpass2) ){
		$query = "INSERT INTO user (nama_user, telp_user, pass) 
		VALUES('$productnama', '$producttelp', '$producthash')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if ($result) 
			echo "1";
		else
			echo "0";
	} else {
		echo "0";
	}
}