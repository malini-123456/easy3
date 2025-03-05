<?php
    require_once('session.php');
    include "inc.php";

    $result = mysqli_query($conn, "SELECT * FROM tb_multiple WHERE status=2");
    $status = false;
    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        mysqli_query($conn,"UPDATE tb_multiple set status=3 WHERE id='".$row['id']."'");
        $random = $row['document_id'];
        $postdata = [
            "JSONFile" => [
                "userid" => "admineasy@tandatanganku.com",
                "document_id" => $random
            ] 
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            // CURLOPT_URL => 'https://api.tandatanganku.com/DWMITRA64.html',
            CURLOPT_URL => $url . '/DWMITRA64.html',
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

        # Decode the Base64 string, making sure that it contains only valid characters
        $b64 = json_decode($response, true)['JSONFile']['file'];
        $bin = base64_decode($b64, true);
        header('Content-Type: application/pdf');


        # Perform a basic validation to make sure that the result is a valid PDF file
        # Be aware! The magic number (file signature) is not 100% reliable solution to validate PDF files
        # Moreover, if you get Base64 from an untrusted source, you must sanitize the PDF contents
        if (strpos($bin, '%PDF') !== 0) {
            throw new Exception('Missing the PDF file signature');
        }

        # Write the PDF contents to a local file
        $uploadpath = 'pdf/';
        $filename = $row['name'];
        $file = $uploadpath.$filename;
        file_put_contents($file, $bin);
        $status = true;
    }

    if($status===true){
        return 'success';
    }

    return 'failed';
?>