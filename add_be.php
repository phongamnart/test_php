<?php
if (isset($_POST['doc_name'])) {
    include("connect_pdo.php");
    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['doc_name']) ? $_POST['doc_name'] : '');
    $upload = $_FILES['doc_name']['name'];


    if ($upload != '') {
        $typefile = strrchr($_FILES['doc_name']['name'], ".");
        if ($typefile == '.pdf') {
            $path = "docs/";
            $newname = pathinfo($_FILES['doc_name']['name'], PATHINFO_FILENAME) . $typefile;
            $path_copy = $path . $newname;
            move_uploaded_file($_FILES['doc_name']['tmp_name'], $path_copy);
            $doc_name = $_POST['doc_name'];
            $stmt = $conn->prepare("insert into employees (doc_name) values ('$newname')");
            $stmt->bindParam(':doc_name', $doc_name, PDO::PARAM_STR);
            $result = $stmt->execute();
            $conn = null;
            if ($result) {
                header("location: index.php");
                exit();
            } else {
                header("location: index.php");
                exit();
            }
        } else {
            header("location: index.php");
            exit();
        }
    }
}

include("connect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];


$sql = "insert into employees (name, email, department) values ('$name', '$email', '$department')";

if (mysqli_query($conn, $sql)) {
    header("location: index.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>