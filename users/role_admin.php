<?php
    require '../db.php';

    $id = $_GET['id'];

    $update = "UPDATE re_users SET role=2 WHERE id=$id";
    mysqli_query($db_connect, $update);

    $_SESSION['role_update'] = "Role Updated!";
    header("location:users-table.php");