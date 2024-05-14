<?php
include("connect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];
$file = null;

if(isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $file = file_get_contents($_FILES['resume']['tmp_name']);
}

$sql = "insert into employees (name, email, department, resume) values (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssb", $name, $email, $department, $file);

if($stmt->execute()) {
    header("location: index.php");
    exit();
} else {
    echo "Error: ". $stmt->error;
}

$stmt->close();
$conn->close();
?>