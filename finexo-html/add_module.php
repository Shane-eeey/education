<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $moduleName = $_POST['moduleName'];
    $module_category = $_POST['module_category'];
    $module_grade = $_POST['grade'];
    $pdfFile = $_FILES['pdfFile']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pdfFile"]["name"]);

    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO modules (moduleName, `category`, `grade`, `pdfFile`) VALUES ('$moduleName', '$module_category',  '$module_grade', '$pdfFile')";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("NEW RECORD ADDED SUCCESSFULLY!");</script>';
            $_SESSION['moduleName'] = $moduleName;
            echo '<script>window.location.assign("adminIndex.php");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    header("Location: adminIndex.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Module</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #4071db;
            background-size: cover;
            background-position: center;
        }
        .wrapper{
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(9px);
            color: #fff;
            border-radius: 12px;
            padding: 30px 40px;
        }
        .wrapper h1{
            font-size: 36px;
            text-align: center;
        }
        .wrapper .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
        }
        .input-box input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;.
            appearance: none; /* Remove default dropdown arrow */
            -webkit-appearance: none;
            -moz-appearance: none;
        }
        .input-box select{
            width: 100%;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            font-size: 16px;
            color: #fff;
            background-color:black;
            padding: 20px 45px 20px 20px;.
            appearance: none; /* Remove default dropdown arrow */
            -webkit-appearance: none;
            -moz-appearance: none;
        }
        .input-box select option:hover {
             background-color: #eee;
        }
        .input-box input::placeholder {
            color: #fff;
            padding: 10px;
        }
        .input-box select option {
            color: black;
            padding: 10px;
        }
        .input-box i{
            position: absolute;
            right: 20px;
            top: 30%;
            transform: translate(-50%);
            font-size: 20px;
        }
        .wrapper .btn{
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
        }
        .wrapper .register-link{
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }
        .register-link p a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }
        .register-link p a:hover{
            text-decoration: underline;
        }
        .input-box select {
            background: url('data:image/svg+xml;utf8,<svg fill="%23fff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 15px center;
            background-size: 12px 12px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
    <h1>Add New Module</h1>
    <form method="post" action="add_module.php" enctype="multipart/form-data">
        <div class="input-box">
            <input type="text" id="moduleName" name="moduleName" placeholder="Module name: "required>
        </div>
        <div class="input-box">
                <select id="module_category" name="module_category" required>
                    <option value="" disabled selected>Category:</option>
                    <option value="English">English</option>
                    <option value="Math">Math</option>
                    <option value="Filipino">Filipino</option>
                </select>
                <i class='bx bxs-book'></i>
        </div>
        <div class="input-box">
                <select id="grade" name="grade" required>
                    <option value="" disabled selected>Grade:</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                </select>
                <i class='bx bxs-book'></i>
        </div>
        <div class="input-box">
            <label for="pdfFile">Upload PDF:</label>
            <input type="file" id="pdfFile" name="pdfFile" accept="application/pdf" required>
        </div>
        <input type="submit" name="addbtn" class="btn" value="Add Module">
    </form>

    </div>
</body>
</html>
