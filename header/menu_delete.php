<?php
    session_start();
    require '../db.php';

    $id = $_GET['id'];

    $delete = "DELETE FROM main_menu WHERE id = $id";
    mysqli_query($db_connect, $delete);

    $_SESSION['delete'] = "Item deleted!";
    header('location:main_menu.php');