<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM modules WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Module</title>
</head>
<body>
    <h2>Update Module</h2>
    <form action="update_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="moduleName">Module Name:</label>
        <input type="text" name="moduleName" value="<?php echo $row['moduleName']; ?>" required><br>
        <label for="pdfFile">PDF File:</label>
        <input type="file" name="pdfFile" accept="application/pdf"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
