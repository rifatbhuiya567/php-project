<?php
    session_start();
    require '../db.php';

    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if($password) {
        $update_info = "UPDATE re_users SET name = '$name', email = '$email', password = '$password' WHERE id = $id";
        mysqli_query($db_connect, $update_info);
        $_SESSION['update_suc'] = "Profile Updated!";
        header('location:edit_user.php?id='.$id);

    }else {
        $update_info = "UPDATE re_users SET name = '$name', email = '$email' WHERE id = $id";
        mysqli_query($db_connect, $update_info);
        $_SESSION['update_suc'] = "Profile Updated!";
        header('location:edit_user.php?id='.$id);
    }