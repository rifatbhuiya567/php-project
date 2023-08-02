<?php
    session_start();
    require '../db.php';

    $logo = $_FILES['main_logo'];
    $logo_explode = explode('.', $logo['name']);
    $extension = end($logo_explode);
    $allowed_extension = ['jpg', 'jpeg', 'webp', 'png'];

    $select = "SELECT * FROM main_logos";
    $select_res = mysqli_query($db_connect, $select);
    $select_assoc = mysqli_fetch_assoc($select_res); 

    if($select_assoc['main_logo'] == null) {
        if(in_array($extension, $allowed_extension)) {
            if(in_array($extension, $allowed_extension)) {
                if($logo['size'] <= 1000000) {
                    $file_name = "main_logo".'.'.$extension;
                    $new_location = "../uploads/logos/".$file_name;
                    move_uploaded_file($logo['tmp_name'], $new_location);

                    $logo_update = "UPDATE main_logos SET main_logo = '$file_name'";
                    mysqli_query($db_connect, $logo_update);
        
                    $_SESSION['tl_success'] = "Photo updated!";
                    header('location:main_logo.php');
                }else {
                    $_SESSION['tls_error'] = "Maximum size 1MB!";
                    header('location:main_logo.php');
                }
            }else {
                $_SESSION['tl_error'] = "Allowed extension is 'jpg', 'jpeg', 'webp', 'png'!";
                header('location:main_logo.php');
            }
        }else {
            $_SESSION['tl_error'] = "Allowed extension is 'jpg', 'jpeg', 'webp', 'png'!";
            header('location:main_logo.php');
        }
    }else {
        if(in_array($extension, $allowed_extension)) {
            $delete_location = "../uploads/logos/".$select_assoc['main_logo'];
            unlink($delete_location);

            if(in_array($extension, $allowed_extension)) {
                if($logo['size'] <= 1000000) {
                    $file_name = "main_logo".'.'.$extension;
                    $new_location = "../uploads/logos/".$file_name;
                    move_uploaded_file($logo['tmp_name'], $new_location);

                    $logo_update = "UPDATE main_logos SET main_logo = '$file_name'";
                    mysqli_query($db_connect, $logo_update);
        
                    $_SESSION['tl_success'] = "Photo updated!";
                    header('location:main_logo.php');
                }else {
                    $_SESSION['tls_error'] = "Maximum size 1MB!";
                    header('location:main_logo.php');
                }
            }else {
                $_SESSION['tl_error'] = "Allowed extension is 'jpg', 'jpeg', 'webp', 'png'!";
                header('location:main_logo.php');
            }
        }else {
            $_SESSION['tl_error'] = "Allowed extension is 'jpg', 'jpeg', 'webp', 'png'!";
            header('location:main_logo.php');
        }
    }