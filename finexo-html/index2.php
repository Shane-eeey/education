<!DOCTYPE html>
<html>
<head>
    <title>Module Management</title>
</head>
<body>
    <h2>Upload Module</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <label for="moduleName">Module Name:</label>
        <input type="text" name="moduleName" required><br>
        <label for="pdfFile">PDF File:</label>
        <input type="file" name="pdfFile" accept="application/pdf" required><br>
        <input type="submit" value="Upload">
    </form>

    <h2>Module List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Module Name</th>
            <th>PDF File</th>
            <th>Actions</th>
        </tr>

        <?php
        include 'read.php';
        ?>

    </table>
</body>
</html>