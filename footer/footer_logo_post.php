<?php
    session_start();
    require '../db.php';

    $logo = $_FILES['footer_logo'];
    $logo_explode = explode('.', $logo['name']);
    $extension = end($logo_explode);
    $allowed_extension = ['jpg', 'jpeg', 'webp', 'png'];

    $f_select = "SELECT * FROM footer_logo";
    $f_select_res = mysqli_query($db_connect, $f_select);
    $f_select_assoc = mysqli_fetch_assoc($f_select_res);

    if($f_select_assoc['footer_logo'] == null) {
        if(in_array($extension, $allowed_extension)) {

            if(in_array($extension, $allowed_extension)) {
                if($logo['size'] <= 1000000) {
                    $file_name = "footer_logo".'.'.$extension;
                    $new_location = "../uploads/logos/".$file_name;
                    move_uploaded_file($logo['tmp_name'], $new_location);

                    $logo_update = "UPDATE footer_logo SET footer_logo = '$file_name'";
                    mysqli_query($db_connect, $logo_update);
        
                    $_SESSION['tl_success'] = "Photo updated!";
                    header('location:footer_logo.php');
                }else {
                    $_SESSION['tls_error'] = "Maximum size 1MB!";
                    header('location:footer_logo.php');
                }
            }else {
                $_SESSION['tl_error'] = "Allowed extension is 'jpg', 'jpeg', 'webp', 'png'!";
                header('location:footer_logo.php');
            }
        }else {
            $_SESSION['tl_error'] = "Allowed extension is 'jpg', 'jpeg', 'webp', 'png'!";
            header('location:footer_logo.php');
        }
    }else {
        if(in_array($extension, $allowed_extension)) {
            $delete_location = "../uploads/logos/".$f_select_assoc['footer_logo'];
            unlink($delete_location);

            if(in_array($extension, $allowed_extension)) {
                if($logo['size'] <= 1000000) {
                    $file_name = "footer_logo".'.'.$extension;
                    $new_location = "../uploads/logos/".$file_name;
                    move_uploaded_file($logo['tmp_name'], $new_location);

                    $logo_update = "UPDATE footer_logo SET footer_logo = '$file_name'";
                    mysqli_query($db_connect, $logo_update);
        
                    $_SESSION['tl_success'] = "Photo updated!";
                    header('location:footer_logo.php');
                }else {
                    $_SESSION['tls_error'] = "Maximum size 1MB!";
                    header('location:footer_logo.php');
                }
            }else {
                $_SESSION['tl_error'] = "Allowed extension is 'jpg', 'jpeg', 'webp', 'png'!";
                header('location:footer_logo.php');
            }
        }else {
            $_SESSION['tl_error'] = "Allowed extension is 'jpg', 'jpeg', 'webp', 'png'!";
            header('location:footer_logo.php');
        }
    }