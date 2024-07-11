<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $moduleName = $_POST['moduleName'];
    $pdfFile = $_FILES['pdfFile']['name'];

    if ($pdfFile) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["pdfFile"]["name"]);

        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $target_file)) {
            $sql = "UPDATE modules SET moduleName='$moduleName', pdfFile='$pdfFile' WHERE id=$id";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        $sql = "UPDATE modules SET moduleName='$moduleName' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: index.php");
}
?>
