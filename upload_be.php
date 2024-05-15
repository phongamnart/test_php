<?php
include("connect.php");

$targetDir = "uploads/";

if(isset($_POST['submit'])) {
    if(!empty($_FILES['file']['name'])) {
        $filename = basename($_FILES['file']['name']);
        $targetFilePath = $targetDir . $filename;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)) {
            if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
                $insert = $conn->query("insert into pdf(filename, uploaded_on) values ('".$filename."', NOW())");
                if($insert) {
                    header("location: test.php");
                    exit();
                } else {
                    header("location: test.php");
                    exit();
                }
            } else {
                header("location: test.php");
                exit();
            }
        } else {
            header("location: test.php");
            exit();
        }
    } else {
        header("location: test.php");
        exit();
    }
}
?>