<?php
    session_start();
    require '../db.php';

    $sub_title = $_POST['sub_title'];
    $title = $_POST['title'];
    $paragraph = $_POST['paragraph'];
    $action_name = $_POST['action_name'];
    $action_link = $_POST['action_link'];
    $banner_image = $_FILES['banner_image'];

    $image_explode = explode('.', $banner_image['name']);
    $image_extension = end($image_explode);
    $allowed_extension = ['jpg', 'jpeg', 'webp', 'png'];

    $h_select = "SELECT * FROM hero_area";
    $h_select_res = mysqli_query($db_connect, $h_select);
    $h_select_assoc = mysqli_fetch_assoc($h_select_res);

    if($banner_image['name']) {
        if($h_select_assoc['image'] == null) {
            $file_name = "banner_image".".".$image_extension;
            $new_location = "../uploads/banner_image/".$file_name;
            move_uploaded_file($banner_image['tmp_name'], $new_location);

            $update = "UPDATE hero_area SET sub_title = '$sub_title', title = '$title', paragraph = '$paragraph', action_name = '$action_name', action_link = '$action_link', image = '$file_name'";
            mysqli_query($db_connect, $update);

            $_SESSION['updated'] = "Update successfully!";
            header('location:hero_area.php');
        }else {
            $delete_location = "../uploads/banner_image/".$h_select_assoc['image'];
            unlink($delete_location);

            $file_name = "banner_image".".".$image_extension;
            $new_location = "../uploads/banner_image/".$file_name;
            move_uploaded_file($banner_image['tmp_name'], $new_location);

            $update = "UPDATE hero_area SET  sub_title = '$sub_title', title = '$title', paragraph = '$paragraph', action_name = '$action_name', action_link = '$action_link', image = '$file_name'";
            mysqli_query($db_connect, $update);

            $_SESSION['updated'] = "Update successfully!";
            header('location:hero_area.php');
        }
    }else {
        $update = "UPDATE hero_area SET  sub_title = '$sub_title', title = '$title', paragraph = '$paragraph', action_name = '$action_name', action_link = '$action_link'";
        mysqli_query($db_connect, $update);

        $_SESSION['updated'] = "Update successfully!";
        header('location:hero_area.php');
    }