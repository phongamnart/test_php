<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic upload pdf</title>
</head>
<body>
    <h1>Basic upload pdf</h1>
    <form action="update_pdf_be.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="doc_name" required placeholder="ชื่อเอกสาร"><br><br>
        <input type="file" name="doc_file" required accept="application/pdf"><br><br>    
        <button type="submit">Upload</button> 
    </form>

    <h2>รายการเอกสาร</h2>
    <table>
        <td>
            <tr>
                <th width="5%">ลำดับ</th>
                <th width="85%">ชื่อเอกสาร</th>
                <th width="10%">เปิดดู</th>
            </tr>
        </td>
        <tbody>
            <?php
            include("connect.php");
            $sql = "select * from tbl_pdf";
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>{$row['no']}</td>";
                    echo "<td>{$row['doc_name']}</td>";
                    echo "<td><a href='docs/{$row['doc_file']} target='_blank''>เปิดดู</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "not found";
            }
            ?>
        </tbody>
    </table>
</body>
</html>