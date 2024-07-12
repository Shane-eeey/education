<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $moduleName = $_POST['moduleName'];
    $module_category = $_POST['module_category'];
    $pdfFile = $_FILES['pdfFile']['name'];

    if ($pdfFile) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["pdfFile"]["name"]);

        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $target_file)) {
            $sql = "UPDATE modules SET moduleName='$moduleName', category= '$module_category', pdfFile='$pdfFile' WHERE id=$id";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        $sql = "UPDATE modules SET moduleName='$moduleName', category= '$module_category' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: adminIndex.php");
}
?>
