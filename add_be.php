<?php
include("connect_pdo.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $date1 = date("Ymd_His");
    $numrand = mt_rand();
    $upload = $_FILES['doc_file']['name'];

    if ($upload != '') {
        $typefile = strrchr($_FILES['doc_file']['name'], ".");

        if ($typefile == '.pdf') {
            $path = "docs/";
            $newname = 'doc_' . $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;
            move_uploaded_file($_FILES['doc_file']['tmp_name'], $path_copy);

            $stmt = $conn->prepare("INSERT INTO employees (fname, email, department, doc_file, dateCreate) VALUES (:fname, :email, :department, :doc_file, NOW())");
            $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':department', $department, PDO::PARAM_STR);
            $stmt->bindParam(':doc_file', $newname, PDO::PARAM_STR);

            if ($stmt->execute()) {
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        } else {
            echo "Error: Only PDF files are allowed.";
        }
    } else {
        echo "Error: No file was uploaded.";
    }
}

$conn = null;
?>