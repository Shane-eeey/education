<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $moduleName = $_POST['moduleName'];
    $pdfFile = $_FILES['pdfFile']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pdfFile"]["name"]);

    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO modules (moduleName, pdfFile) VALUES ('$moduleName', '$pdfFile')";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("NEW RECORD ADDED SUCCESSFULLY!");</script>';
            $_SESSION['moduleName'] = $moduleName;
            echo '<script>window.location.assign("index2.html");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    header("Location: index2.php");
}
?>
