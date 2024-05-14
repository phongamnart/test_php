<?php
include("connect.php");

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "update employees set name='$name', email='$email', department='$department' where id=$id";

    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
