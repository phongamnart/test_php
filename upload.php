<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label>Title</label>
        <input type="text" name="title">
        <label>Upload file</label>
        <input type="file" name="file">
        <input type="submit" name="submit">
    </form>

    <?php
    include("connect.php");
    
    if(isset($_POST["submit"])){
        $title = $_POST['title'];
        $pname = rand(100,10000)."-".$_FILES['file']['name'];
        $tname = $_FILES['file']['tmp_name'];
        $upload_dir = '/images';
        move_uploaded_file($tname, $upload_dir.'/'.$pname);

        $sql = "insert into img(title, image) values('$title', '$pname')";
        if(mysqli_query($conn, $sql)){
            echo "Upload Successfully";
        } else {
            echo "Error";
        }
    }
    ?>
</body>
</html>