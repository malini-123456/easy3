<?php
    require_once('session.php');
    
    $uploadsDir = "images/";
    $allowedFileType = array('jpg','png','jpeg','doc','pdf');
    if (!empty(array_filter($_FILES['fileUpload']['name']))) {
        $images = [];
        foreach($_FILES['fileUpload']['name'] as $id=>$val){
            $fileName        = $_FILES['fileUpload']['name'][$id];
            $tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
            $targetFilePath  = $uploadsDir . $fileName;
            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $uploadOk = 1;
            if(in_array($fileType, $allowedFileType)){
                if(move_uploaded_file($tempLocation, $targetFilePath)){
                    $images[] = $fileName;
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "File coud not be uploaded."
                    );
                }
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Only .jpg, .jpeg and .png file formats allowed."
                );
            }
        }
        if(!empty($images)) {
            $images = json_encode($images);
            $q = "INSERT INTO user(image) VALUES ('{$images}')";
            $sql = mysqli_query($conn, $q);
            if($sql) {
                $response = array(
                    "status" => "alert-success",
                    "message" => "Files successfully uploaded.",
                    "data" => $images
                );
            } else {
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Files coudn't be uploaded due to database error."
                );
            }
        }
    } else {
        $response = array(
            "status" => "alert-danger",
            "message" => "Please select a file to upload."
        );
    }
    echo json_encode($response);
?>