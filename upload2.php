<?php
require_once('session.php');
include "inc.php";
$data = array();
for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
    $random = $i . '_' . substr(md5(mt_rand()), 0, 7);
    $postdata = [
        "JSONFile" => [
            "userid" => "easyttd@pt-einsten.com",
            "document_id" => $random,
            "payment" => "2",
            "redirect" => true,
            "send-to" => [],
            "req-sign" => [
                [
                    "name" => "Dewa Gde Ardha Putra, S.T.",
                    "email" => "signature@pt-einsten.com",
                    "user" => "ttd1",
                    "page" => "1",
                    "llx" => "404",
                    "lly" => "55",
                    "urx" => "500",
                    "ury" => "135",
                    "visible" => "1"
                ]
            ]
        ]
    ];

    $cfile = curl_file_create($_FILES['file']['tmp_name'][$i], $_FILES['file']['type'][$i], $_FILES['file']['name'][$i]);

    $curl = curl_init();

    curl_setopt_array($curl, array(
        // CURLOPT_URL => 'https://api.tandatanganku.com/SendDocMitraAT.html',
        CURLOPT_URL => $url . '/mitra/v3/SendDocMitraAT.html',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            'Content-Type: multipart/form-data',
            'Authorization: Bearer TXcuE9IFj5Lp2dvbGp36pMF9a9IJDTCuQlEbouQjqAVU7PcLy3wQTVJsEVBx8K',
            'Cookie: JPOSEE=2965f20bb8b009b2448f7eb7780df445'
        ),
        CURLOPT_POSTFIELDS => array('jsonfield' => json_encode($postdata), 'File' => $cfile)
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    $data[$i]['name'] = $_FILES['file']['name'][$i];
    $data[$i]['document_id'] = $random;
    $data[$i]['response'] = $response;
    $data[$i]['request'] = $postdata;
    $q = "INSERT INTO tb_multiple (name, document_id, status) VALUES ('" . $_FILES['file']['name'][$i] . "', '" . $random . "', 1)";
    $sql = mysqli_query($conn, $q);
}
echo json_encode($data);