<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees information</title>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        th, td{
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid;
        }
    </style>
</head>
<body>
    <h1>Employees information</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Edit</th>
        </tr>
        <?php
        include("connect.php");

        $sql = "select * from employees";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['department']}</td>";
                echo "<td><button onclick='location.href=\"edit.php?id={$row['id']}\";'>Edit</button></td>";
                echo "<tr>";
            }
        } else {
            echo "<tr><td>Not found information</td></tr>";
        }
        ?>
    </table>
</body>
</html>