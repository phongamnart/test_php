<?php
include("connect.php");
$statusMsg = "";

$targetDir = "uploads/";

if(isset($_POST['submit'])) {
    if(!empty($_FILES['file']['name'])) {
        $filename = basename($_FILES['file']['name']);
        $targetFilePath = $targetDir . $filename;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)) {
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
                $insert = $conn->query("insert into images(file_name, uploaded_on) values ('".$filename."', NOW())");
                if($insert) {
                    $statusMsg = "the file " .$filename. "has been upload successfully";
                    header("location: index.php");
                } else {
                    $statusMsg = "File upload failed, please try again";
                    header("location: index.php");
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file";
                header("location: index.php");
            }
        } else {
            $statusMsg = "Sorry,  only JPG, JPEG, PNG % GIF files are allowed to upload";
            header("location: index.php");
        }
    } else {
        $statusMsg = "Plaese select a file to upload";
        header("location: index.php");
    }
}
?>