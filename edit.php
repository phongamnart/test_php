<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit information</title>
</head>

<body>
    <h1>Edit information</h1>
    
    <?php
    include("connect.php");
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "select * from employees where id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Employee not found";
        }
    } else {
        echo "Invalid request";
    }
    mysqli_close($conn);
    ?>

    <form action="edit_be.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="fname">Name: </label><br>
        <input type="text" name="fname" id="fname" value="<?php echo $row['fname']; ?>" required><br><br>

        <label for="email">Email: </label><br>
        <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required><br><br>

        <label for="department">Department: </label><br>
        <input type="text" name="department" id="department" value="<?php echo $row['department']; ?>" required><br><br>

        <input type="submit" value="Save changes">
        <button type="button" onclick="location.href='index.php';">Back</button>
    </form>

</body>

</html>