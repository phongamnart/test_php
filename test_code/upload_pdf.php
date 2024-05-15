<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Upload pdf file PHP PDO</title>
</head>

<body>
    <h1>PHP PDO Basic Upload PDF File</h1>
    <form action="upload_pdf_be.php" method="post" enctype="multipart/form-data">
        <input type="text" name="doc_name" required class="form-control" placeholder="ชื่อเอกสาร">
        <input type="file" name="doc_file" required class="form-control" accept="application/pdf"> <br><br>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    <h2>รายการเอกสาร </h2>
    <table class="table table-striped  table-hover table-responsive table-bordered">
        <thead>
            <tr>
                <th width="5%">ลำดับ</th>
                <th width="85%">ชื่อเอกสาร</th>
                <th width="10%">เปิดดู</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("connect.php");
            $stmt = $conn->prepare("select * from tbl_pdf");
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
            ?>
                <tr>
                    <td><?= $row['no']; ?></td>
                    <td><?= $row['doc_name']; ?></td>
                    <td><a href="docs/<?php echo $row['doc_file']; ?>" target="_blank" class="btn btn-info btn-sm"> เปิดดู </a></td>
                <?php } ?>
        </tbody>
    </table>
</body>

</html>

