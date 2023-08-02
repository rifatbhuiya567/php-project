<?php
    session_start();
    require '../db.php';

    $b_name = $_POST['brand_name'];
    $copyright = $_POST['copyright'];

    $update = "UPDATE footer_contents SET brand_name = '$b_name', copyright = '$copyright'";
    mysqli_query($db_connect, $update);

    $_SESSION['updated'] = "Update successfully!";
    header('location:footer-content.php');