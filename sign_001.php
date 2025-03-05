<?php
include "inc.php";
    $random = $_POST['document_id'];
    $postdata = [
        "JSONFile" => [
            "userid" => "admineasy@tandatanganku.com",
            "email_user" => "admineasy@tandatanganku.com",
            "document_id" => $random, 
            "view_only" => false
        ] 
     ];

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  	// CURLOPT_URL => 'https://api.tandatanganku.com/gen/genSignPage.html',
	  	CURLOPT_URL => $url.'/gen/genSignPage.html',
	  	CURLOPT_RETURNTRANSFER => true,
	  	CURLOPT_TIMEOUT => 30,
	  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  	CURLOPT_CUSTOMREQUEST => "POST",
	  	CURLOPT_HTTPHEADER => array(
	    	"cache-control: no-cache",
	    	"Content-Type: multipart/form-data",
	    	"Authorization: Bearer 5q4XPe1Jjz992vsPQmwnQm6bWXoApQuFy6RroyNSUPiVI89FrSKQFq68aIgzql",
	    	"Cookie: JPOSEE=2965f20bb8b009b2448f7eb7780df445"
	  	),
	  	CURLOPT_POSTFIELDS => array('jsonfield' => json_encode($postdata))
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);
	echo $response;

?>