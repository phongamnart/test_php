<?php
include("connect.php");

$targetDir = "uploads/";

if(isset($_POST['submit'])) {
    if(!empty($_FILES['file']['name'])) {
        $filename = basename($_FILES['file']['name']);
        $targetFilePath = $targetDir . $filename;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
        if(in_array($fileType, $allowTypes)) {
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
                $insert = $conn->query("insert into images(file_name, uploaded_on) values ('".$filename."', NOW())");
                if($insert) {
                    header("location: upload_img.php");
                    exit();
                } else {
                    header("location: upload_img.php");
                    exit();
                }
            } else {
                header("location: upload_img.php");
                exit();
            }
        } else {
            header("location: upload_img.php");
            exit();
        }
    } else {
        header("location: upload_img.php");
        exit();
    }
}
?>