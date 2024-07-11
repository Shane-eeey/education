<?php
    session_start();

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "edhub";

    try {
        $con = mysqli_connect($server, $user, $pass, $db);
    }
    catch (Exception $ex){
        echo 'Error';
    }

    $email = mysqli_real_escape_string($con, $_POST['userid']);
    $psw = mysqli_real_escape_string($con, $_POST['pwd']);

    $query1 = mysqli_query($con, "SELECT * FROM tbluser WHERE userid = '$email'");

    $exist1 = mysqli_num_rows($query1);

    $table_user1 = "";
    $table_password1 = "";

        if ($exist1 > 0)
        {

            while ($row = mysqli_fetch_assoc($query1))
        {
            $table_user1 = $row['userid'];
            $table_password1 = $row['pwd'];
        }
        if (($email == $table_user1) && ($psw == $table_password1))
        {
            if ($psw == $table_password1)
            {
                $_SESSION['userid'] = $email;
                header('location: index.html');
            }
        }
        else
        {
            Print '<script>alert("Incorect Password! Pls Try Again.");</script>';
            Print '<script>window.location.assign("loguser.php.php");</script>';
        }
    }
        else{
            Print '<script>alert("Incorect Username! Pls Try Again.");</script>';
            Print '<script>window.location.assign("loguser.php");</script>';
        }