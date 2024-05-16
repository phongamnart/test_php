<?php
include("connect.php");

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    if (!empty($_FILES['doc_file']['name'])) {
        $old_doc_file = $_POST['old_doc_file'];
        if (!empty($old_doc_file)) {
            $file_path = "docs/" . $old_doc_file;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        
        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
        $typefile = strrchr($_FILES['doc_file']['name'], ".");
        if ($typefile == '.pdf') {
            $path = "docs/";
            $newname = 'doc_' . $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;
            move_uploaded_file($_FILES['doc_file']['tmp_name'], $path_copy);
            
            $sql = "UPDATE employees SET fname='$fname', email='$email', department='$department', doc_file='$newname' WHERE id=$id";
        } else {
            echo "Invalid file format.";
            exit();
        }
    } else {
        $sql = "UPDATE employees SET fname='$fname', email='$email', department='$department' WHERE id=$id";
    }

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
