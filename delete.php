<?php
include("connect.php");

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from employees where id = $id";
    if(mysqli_query($conn, $sql)){
        header("location: index.php");
        exit();
    } else {
        echo "Error: ". mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>