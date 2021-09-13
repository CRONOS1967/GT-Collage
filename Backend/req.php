<?php

include 'Backend.php';
$obj = new Backend;
$conn = $obj->connection();
$data = array();
if (isset($_POST['submit'])) {

    $data[0] = null;
    $data[1] = img("fileToUpload");
    $data[2] = img("file");
    $data[3] = $_POST['uname'];
    $data[4] = $_POST['cid'];
    $data[5] = $_POST['sts'];
    $obj->setAttrs($conn, 'Enrole', $data);
    $succ = $obj->insert();
    if ($succ) {
        $_SESSION['msg'] = "Added Successfuly";
    } else {
        $_SESSION['msg'] = "Unable to complete the transcation";
    }

    header('location:../Candidate/send-reg.php');
}
function img($img)
{
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES[$img]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES[$img]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$img]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES[$img]["name"]) . " has been uploaded.";
            return basename($_FILES[$img]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
