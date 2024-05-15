<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file</title>
</head>
<body>
    <?php
    include("connect.php");

    $sql = $conn->query("select * from pdf ORDER BY uploaded_on DESC");
    if($sql->num_rows > 0){
        while($row = $sql->fetch_assoc()){
            $pdf = 'uploads/'.$row['filename'];
        }
    } else {
        echo "Not found";
    }
    ?>

    <form action="upload_be.php" method="POST" enctype="multipart/form-data">
        <h2>Select pdf file to upload</h2>
        <input type="file" name="file" accept="application/pdf"><br><br>
        <input type="submit" name="submit" value="Upload">

        <img src="<?php echo $pdf ?>" alt="" width="100%">

    </form>
</body>
</html>