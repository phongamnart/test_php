<!DOCTYPE html>
<html>
<head>
    <title>Add Employee and Upload PDF</title>
</head>
<body>
    <h2>Add Employee and Upload PDF</h2>
    <form action="add_be.php" method="post" enctype="multipart/form-data">
        <label for="fname">Name:</label>
        <input type="text" name="fname" id="fname" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="department">Department:</label>
        <input type="text" name="department" id="department" required>
        <br>
        <label for="doc_name">Document Name:</label>
        <input type="text" name="doc_name" id="doc_name" required>
        <br>
        <label for="doc_file">Upload PDF:</label>
        <input type="file" name="doc_file" id="doc_file" accept=".pdf" required>
        <br>
        <input type="submit" name="submit" value="Add new employees">
    </form>
</body>
</html>