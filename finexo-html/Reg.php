<?php
require_once "myconnect.php";

session_start();


$conn = mysqli_connect('localhost', 'root', '', 'edhub');


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (isset($_POST['savebtn'])) {
    $UID = ($_POST['userid']);
    $UFName = ($_POST['fname']);
    $ULName = ($_POST['lname']);
    $UEmail = ($_POST['email']);
    $UPwd = ($_POST['pwd']);


    $query = "SELECT * FROM tbluser WHERE email = '$UEmail'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("USERNAME HAS BEEN TAKEN!");</script>';
        echo '<script>window.location.assign("register.html");</script>';
    } else {
        $insert = "INSERT INTO tbluser(userid, fname, lname, email, pwd)
                    VALUES ('$UID', '$UFName', '$ULName', '$UEmail', '$UPwd')";
        try {
            $insert_result = mysqli_query($conn, $insert);
            if ($insert_result) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo '<script>alert("SUCCESSFULLY REGISTERED!");</script>';
                    $_SESSION['email'] = $UEmail;
                    echo '<script>window.location.assign("loguser.php");</script>';
                } else {
                    echo 'DATA NOT INSERTED!';
                }
            }
        } catch (Exception $ex) {
            echo 'ERROR Insertion!' . $ex->getMessage();
        }
    }
}