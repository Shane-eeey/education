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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Module</title>
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
        <h1>Update Module</h1>
        <form method="post" action="update_process.php" enctype="multipart/form-data">
        <div class="input-box">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        </div>
        <div class="input-box">
            <input type="text" name="moduleName" value="<?php echo $row['moduleName']; ?>" required><br>
        </div>
        <div class="input-box">
                <select id="module_category" name="module_category" value="<?php echo $row['category']; ?>"required>
                    <option value="" disabled selected>Category:</option>
                    <?php
                        $category = $row['category'];
                        if ($category == "English") {
                            echo "<option value='English' selected>English</option>";
                            echo "<option value='Math'>Math</option>";
                            echo "<option value='Filipino'>Filipino</option>";
                        } elseif ($category == "Math") {
                            echo "<option value='English'>English</option>";
                            echo "<option value='Math' selected>Math</option>";
                            echo "<option value='Filipino'>Filipino</option>";
                        } elseif ($category == "Filipino") {
                            echo "<option value='English'>English</option>";
                            echo "<option value='Math'>Math</option>";
                            echo "<option value='Filipino' selected>Filipino</option>";
                        }
                    ?>
                </select>
                <i class='bx bxs-book'></i>
        </div>
        <div class="input-box">
            <label for="pdfFile">Uploaded PDF:</label>
            <input type="file" id="pdfFile" name="pdfFile" accept="application/pdf" value="<?php echo $row['pdfFile']; ?>"required>
            <p>Current PDF: <?php echo $row['pdfFile'];?></p> 
            
        </div>
        <input type="submit" name="updbtn" class="btn" value="Update Module">
    </div>
</body>
</html>
