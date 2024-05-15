<?php
include("connect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];


$sql = "insert into employees (name, email, department) values ('$name', '$email', '$department')";

if(mysqli_query($conn, $sql)) {
    header("location: index.php");
    exit();
} else {
    echo "Error: ". mysqli_error($conn);
}

mysqli_close($conn);
?>