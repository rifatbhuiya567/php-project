<?php
    session_start();
    require "../db.php" ;

    $name = $_POST['reg_name'];
    $email = $_POST['reg_email'];
    $password = $_POST['reg_pass'];
    $con_password = $_POST['reg_con_pass'];
    $gender = $_POST['gender'];
    // $choice = $_POST['choice'];
    // $select = $_POST['device'];
    
    $flag = false;

    $field_err = "This field is required!";
    $upper = preg_match("`[A-Z]`", $password);
    $lower = preg_match("`[a-z]`", $password);
    $number = preg_match("`[0-9]`", $password);
    $sp_charaters = preg_match("`[[~!@#$%^&*()[]|%:;.,'?<>-_=+]`", $password);

    if(!$name) {
        $flag = true;
        $_SESSION['name_err'] = $field_err;
    }else {
        $_SESSION['old_name'] = $name;
    }
    // Name Error

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = true;
        $_SESSION['email_err'] = "Enter a valid email address!";
    }else {
        $email_check = "SELECT COUNT(*) AS email_check FROM re_users WHERE email = '$email'";
        $email_check_result = mysqli_query($db_connect, $email_check);
        $after_check_assoc = mysqli_fetch_assoc($email_check_result);

        if(!($after_check_assoc['email_check'] == 0)) {
            $flag = true;
            $_SESSION['email_err'] = "This email alredy taken, try with a new email!";
            $_SESSION['old_email'] = $email;
        }else {
            $_SESSION['old_email'] = $email;
        }
    }
    // Email Error

    if(!$password) {
        $flag = true;
        $_SESSION['pass_err'] = $field_err;
    }else {
        if(!$upper) {
            $flag = true;
            $_SESSION['pass_err'] = "Write uppercase letter!";
        }

        if(!$lower) {
            $flag = true;
            $_SESSION['pass_err'] = "Write lowercase letter!";
        }

        if(!$number) {
            $flag = true;
            $_SESSION['pass_err'] = "Write numbers!";
        }

        if(!$sp_charaters) {
            $flag = true;
            $_SESSION['pass_err'] = "Write special charaters!";
        }

        if(strlen($password) < 8) {
            $flag = true;
            $_SESSION['pass_err'] = "Minimum 8 Charaters!";
        }
        
        if(!empty($password)) {
            $_SESSION['old_pass'] = $password;
        }
    }

    if($password != $con_password) {
        $flag = true;
        $_SESSION['con_pass_err'] = "Password doesn't matched!";
        $_SESSION['old_conf_pass'] = $con_password;
    }else {
        $_SESSION['old_conf_pass'] = $con_password;
    }
    // Password Error

    if(!$gender) {
        $flag = true;
        $_SESSION['gen_err'] = "Select your gender!";
    }else {
        $_SESSION['old_gen'] = $gender;
    }
    // Gender Error

    // if(!$choice) {
    //     $flag = true;
    //     $_SESSION['choice_err'] = "Check your choice!";
    // }else {
    //     $_SESSION['old_check'] = $choice;
    // }
    // Choice Error

    // if(!$select) {
    //     $flag = true;
    //     $_SESSION['select_err'] = "Select an option!";
    // }else {
    //     $_SESSION['old_select'] = $select;
    // }
    // Select Error


    if($flag) {
        header("location:users-table.php");
    }else {
        $_SESSION['old_name'] = '';
        $_SESSION['old_email'] = '';
        $_SESSION['old_pass'] = '';
        $_SESSION['old_conf_pass'] = '';
        $_SESSION['old_gen'] = '';

        header('location:users-table.php');
        $_SESSION['re_success'] = "Your registration successfully!";

        $after_hash = password_hash($password, PASSWORD_DEFAULT);

        $data_insert = "INSERT INTO re_users(name, email, password, gender) VALUES ('$name', '$email', '$after_hash', '$gender') ";
        mysqli_query($db_connect, $data_insert);
    } 