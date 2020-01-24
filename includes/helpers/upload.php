<?php
session_start();
include "../../includes/helpers/userData.php";
$target_dir = "../../assets/img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "O ficheiro é demasiado grande.";
    $uploadOk = 0;
}
// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
) {
    echo "Apenas são aceites ficheiro do tipo JPG, JPEG, PNG";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "O ficheiro não foi enviado.";
    // if everything is ok, try to upload file
} else {
    var_dump($_FILES["fileToUpload"]["tmp_name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "userId" . $user_Id . "." . $imageFileType)) {
        echo "O ficheiro " . basename($_FILES["fileToUpload"]["name"]) . " foi enviado.";
        if ($user_Permissions == 'admin') {
            header("location: ../../views/adminDashboard.view.php");
        }
    } else {
        echo "Ocorreu um erro durante o upload do ficheiro.";
    }
}
