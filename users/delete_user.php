<?php
    require '../db.php';

    $user = $_GET['id'];
    $delete_user = "DELETE FROM re_users WHERE id = '$user'";
    mysqli_query($db_connect, $delete_user);
    header('location:users-table.php');