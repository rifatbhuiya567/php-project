<?php
    require '../db.php';

    $id = $_GET['id'];

    $update = "UPDATE re_users SET role=3 WHERE id=$id";
    mysqli_query($db_connect, $update);

    $_SESSION['role_edited'] = "Role Updated!";
    header("location:edit_user.php?id=".$id);