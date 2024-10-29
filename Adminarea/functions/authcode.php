<?php
session_start();
include('../config/dbconn.php');

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    $query = "SELECT * FROM USERS WHERE email='$email' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $user = mysqli_fetch_assoc($query_run);


        if (password_verify($password, $user['mypassword'])) {

            $_SESSION['auth'] = true;
            $_SESSION['auth_user'] = [
                'id' => $user['id'],
                'fullname' => $user['fullname'],
                'email' => $user['email'],
                'username' => $user['username'],
                'image' => $user['image'],
                'role_as' => $user['role_as']
            ];

            $_SESSION['role_as'] = $role_as;

            if ($role_as == 1) {
                $_SESSION['message'] = "loggedin as admin";
                header('location: ../Admin/index.php');
            }





            $_SESSION['message'] = "Welcome, " . $user['fullname'] . "!";
            header("Location: ../Admin/index.php");
            exit; // End the script
        } else {
            $_SESSION['message'] = "Invalid password.";
            header("Location: ../login.php");
            exit; // End the script
        }
    } else {
        $_SESSION['message'] = "Email address not found.";
        header("Location: ../login.php");
        exit; // End the script 
    }
}
?>