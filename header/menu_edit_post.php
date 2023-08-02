<?php 
    session_start();
    require '../db.php';

    $name = $_POST['name'];
    $s_id = $_POST['s_id'];
    $id = $_POST['id'];

    $update = "UPDATE main_menu SET menu_name = '$name', sec_id = '$s_id' WHERE id = $id";
    mysqli_query($db_connect, $update);

    $_SESSION['update'] = "Update successfully!";
    header("location:menu_edit.php?id=".$id);