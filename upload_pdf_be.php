<?php
include("connect_pdo.php");
if (isset($_POST['doc_name'])) {
    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
    $upload = $_FILES['doc_file']['name'];

    if ($upload != '') {
        $typefile = strrchr($_FILES['doc_file']['name'], ".");

        if ($typefile == '.pdf') {

            $path = "docs/";
            $newname = 'doc_' . $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;
            move_uploaded_file($_FILES['doc_file']['tmp_name'], $path_copy);

            $doc_name = $_POST['doc_name'];

            $stmt = $conn->prepare("INSERT INTO tbl_pdf (doc_name, doc_file)
    VALUES (:doc_name, '$newname')");
            $stmt->bindParam(':doc_name', $doc_name, PDO::PARAM_STR);
            $result = $stmt->execute();
            $conn = null;
            if ($result) {
                header('location: upload_pdf.php');
                exit();
            } else {
                header('location: upload_pdf.php');
                exit();
            }
        } else {
            header('location: upload_pdf.php');
            exit();
        }
    }
}
