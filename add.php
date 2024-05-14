<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new employee</title>
</head>
<body>
    <h1>Add new employee</h1>
    <form action="add_be.php" method="POST">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email</label><br>
        <input type="text" name="email" id="email" required><br><br>

        <label for="department">Department</label><br>
        <input type="text" name="department" id="department" required><br><br>

        <label for="resume">Resume (.PDF) </label>
        <input type="file" name="resume" id="resume" accept="application/pdf"><br><br>

        <input type="submit" value="Add new employee">
        <button onclick="location.href='index.php';">Back</button>
    </form>
</body>
</html>