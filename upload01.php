<?php
$uploadStatus = 1;
$target_directory = 'data/pdf/';
if (!file_exists($target_directory)) mkdir($target_directory);
// $target_file = $target_directory . basename($_FILES["file"]["name"]);   //name is to get the file name of uploaded file
// $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// $newfilename = $target_directory . $productid . "." . $filetype;
// $namaFileSave = $productid . "." . $filetype;

$errors = []; // Store errors here

// Count total files
$countfiles = count($_FILES['file']['name']);
for ($i = 0; $i < $countfiles; $i++) {
    $filename = $_FILES['file']['name'][$i];
    // Upload file
    $newfilename = $target_directory . $filename;
    $pdfFileType = strtolower(pathinfo($newfilename, PATHINFO_EXTENSION));
    if ($pdfFileType == 'pdf') {
        if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $newfilename)) {
        } else {
            if ($i != 0) {
                $uploadStatus = 0;
                $errors[] = $newfilename . " Gagal Upload ke Server";
            }
        }
    } else {
        $uploadStatus = 0;
        $errors[] = $newfilename . " Bukan File PDF";
    }
}

// foreach ($errors as $error) {
//     echo $error . "\n";
// }

if ($uploadStatus == 1) {
    echo "1";
} else {
    echo "0";
}