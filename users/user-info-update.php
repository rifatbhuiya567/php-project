<?php
    session_start();
    require '../db.php';

    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $old_pass = $_POST['old_pass'];
    $new_password = $_POST['pass'];
    $pass_hash = password_hash($new_password, PASSWORD_DEFAULT);
    $con_pass = $_POST['con_pass'];

    $prev_pass = "SELECT * FROM re_users WHERE id = '$id'";
    $prev_pass_res = mysqli_query($db_connect, $prev_pass);
    $prev_pass_assoc = mysqli_fetch_assoc($prev_pass_res);

    if($new_password) {
        if(password_verify($old_pass, $prev_pass_assoc['password'])) {
            if($new_password == $con_pass) {
                $update_info = "UPDATE re_users SET name = '$name', password = '$pass_hash' WHERE id = '$id'";
                mysqli_query($db_connect, $update_info);
                $_SESSION['update'] = "Profile Updated!";
                header('location:user-profile.php');
            }else {
                $_SESSION['match_pass'] = "Password Dosen't Matched!";
                header('location:user-profile.php');
            }
        }else {
            $_SESSION['incorrect_pass'] = "Incorrect Password!";
            header('location:user-profile.php');
        }
    }else {
        $update_name = "UPDATE re_users SET name = '$name' WHERE id = '$id'";
        mysqli_query($db_connect, $update_name);
        $_SESSION['update'] = "Profile Updated!";
        header('location:user-profile.php');
    }