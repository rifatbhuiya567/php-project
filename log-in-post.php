<?php
    session_start();
    require 'db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $flag = false;

    if(!$email){
        $flag = true;
        $_SESSION['email_err'] = "Enter your email!";
    }else {
        $user_email_check = "SELECT COUNT(*) AS email_check FROM re_users WHERE email = '$email'";
        $user_email_check_result = mysqli_query($db_connect, $user_email_check);
        $email_check_assoc = mysqli_fetch_assoc($user_email_check_result);

        if($email_check_assoc['email_check'] == 1) {
            if($password){
                $user_password = "SELECT * FROM re_users WHERE email = '$email'";
                $user_password_result = mysqli_query($db_connect, $user_password);
                $password_assoc = mysqli_fetch_assoc($user_password_result);

                if(!password_verify($password, $password_assoc['password'])) {
                    $flag = true;
                    $_SESSION['email_value'] = $email;
    
                    $_SESSION['password_err'] = "Incorrect password!";
                    $_SESSION['password_value'] = $password;
                }else {
                    $_SESSION['login_issue'] = '' ;
                    $_SESSION['user_id'] = $password_assoc['id'];
                    header('location:dashboard.php');
                }
            }else {
                $flag = true;
                $_SESSION['password_err'] = "Enter your password!";
                $_SESSION['email_value'] = $email;
            }
        }else {
            $flag = true;
            $_SESSION['email_err'] = "Incorrect email address!";
            $_SESSION['email_value'] = $email;
            $_SESSION['password_value'] = $password;
        }
    }

    if($flag) {
        header('location:log-in.php');
    }

    

    