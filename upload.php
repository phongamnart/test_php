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
    if(!empty($statusMsg)){
        echo $statusMsg;
    }

    $sql = $conn->query("select * from images ORDER BY uploaded_on DESC");
    if($sql->num_rows > 0){
        while($row = $sql->fetch_assoc()){
            $imageURL = 'uploads/'.$row['file_name'];
        }
    } else {
        echo "No image found";
    }
    ?>

    <form action="upload_be.php" method="POST" enctype="multipart/form-data">
        <h2>Select image file to upload</h2>
        <input type="file" name="file" accept="image/gif, image/jpeg, image/png"><br><br>
        <input type="submit" name="submit" value="Upload">

        <img src="<?php echo $imageURL ?>" alt="" width="100%">

    </form>
</body>
</html>