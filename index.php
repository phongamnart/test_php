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
        h1{
            text-align: center;
        }
    </style>
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this employee?")) {
                location.href = 'delete.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <h1>Employees information</h1><br>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Resume</th>
        </tr>
        <?php
        include("connect.php");

        $sql = "select * from employees";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['fname']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['department']}</td>";
                echo "<td><button onclick='location.href=\"edit.php?id={$row['id']}\";'>Edit</button></td>";
                echo "<td><button onclick='confirmDelete({$row['id']})'>Delete</button></td>"; ?>
                <td><button onclick="window.open('docs/<?php echo $row['doc_file'];?>', '_blank');">เปิดไฟล์</button></td>
                <?php echo "<tr>";
            }
        } else {
            echo "<tr><td>Not found information</td></tr>";
        }
        ?>
        
    </table><br><br>
    <button onclick="location.href='add.php';">Add new employee</button>
</body>
</html>