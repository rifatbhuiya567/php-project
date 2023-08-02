<?php
    session_start();
    require '../db.php';

    $user_photo = $_FILES['user_photo'];
    $photo_explode = explode('.', $user_photo['name']);
    $extension = end($photo_explode);
    $allowed_extension = ['jpg', 'png', 'jpeg', 'webp'];

    $id = $_SESSION['user_id'];

    $select_user = "SELECT * FROM re_users WHERE id = $id";
    $select_user_res = mysqli_query($db_connect, $select_user);
    $user_assoc = mysqli_fetch_assoc($select_user_res);

    if($user_assoc['photo'] == null) {
        if(in_array($extension, $allowed_extension)) {
            if($user_photo['size'] <= 1000000) {
                $file_name = $id.'.'.$extension;
                $location = "../uploads/user_photo/".$file_name;
                move_uploaded_file($user_photo['tmp_name'], $location);
    
                $photo_update = "UPDATE re_users SET photo = '$file_name' WHERE id = '$id'";
                mysqli_query($db_connect, $photo_update);
    
                $_SESSION['photo_update'] = "Photo Updated!";
                header('location:user-profile.php');
            }else {
                $_SESSION['size_err'] = "Allowed size maximum 1 MB!";
                header('location:user-profile.php');
            }
        }else {
            $_SESSION['extension_err'] = "Allowed format is (jpg, jpeg, png, webp)!";
            header('location:user-profile.php');
        }
    }else {
        if(in_array($extension, $allowed_extension)) {
            $delete_location = "../uploads/user_photo/".$user_assoc['photo'];
            unlink($delete_location);

            if(in_array($extension, $allowed_extension)) {
                if($user_photo['size'] <= 1000000) {
                    $file_name = $id.'.'.$extension;
                    $location = "../uploads/user_photo/".$file_name;
                    move_uploaded_file($user_photo['tmp_name'], $location);
        
                    $photo_update = "UPDATE re_users SET photo = '$file_name' WHERE id = '$id'";
                    mysqli_query($db_connect, $photo_update);
        
                    $_SESSION['photo_update'] = "Photo Updated!";
                    header('location:user-profile.php');
                }else {
                    $_SESSION['size_err'] = "Allowed size maximum 1 MB!";
                    header('location:user-profile.php');
                }
            }else {
                $_SESSION['extension_err'] = "Allowed format is (jpg, jpeg, png, webp)!";
                header('location:user-profile.php');
            }
        }else {
            $_SESSION['extension_err'] = "Allowed format is (jpg, jpeg, png, webp)!";
            header('location:user-profile.php');
        }
    }

    

