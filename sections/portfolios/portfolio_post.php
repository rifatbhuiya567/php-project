<?php 
    session_start();
    require '../../db.php';
    require '../../vendor/autoload.php';

    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];

    $insert = "INSERT INTO portfolios(title, sub_title) VALUES('$title', '$sub_title')";
    $insert_res = mysqli_query($db_connect, $insert);
    $id = mysqli_insert_id($db_connect);

    $image = $_FILES['image'];
    $image_explode = explode('.', $image['name']);
    $image_extension = end($image_explode);
    $file_name = $id.'.'.$image_extension;
    
    $new_location = "../../uploads/portfolios/".$file_name;
    move_uploaded_file($image['tmp_name'], $new_location);

    $update = "UPDATE portfolios SET image='$file_name' WHERE id=$id";
    mysqli_query($db_connect, $update);

    $_SESSION['submit'] = "Portfolio Added!";
    header("location:portfolio.php");



