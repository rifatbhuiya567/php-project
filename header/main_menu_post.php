<?php 
    session_start();
    require '../db.php';

    $name = $_POST['name'];
    $sec_id = $_POST['id'];

    if($name or $sec_id) {
        $insert = "INSERT INTO main_menu (menu_name, sec_id) VALUES ('$name', '$sec_id')";
        mysqli_query($db_connect, $insert);

        $_SESSION['menu_succ'] = "Menu added!";
        header('location:main_menu.php');
    }else {
        $_SESSION['menu_err'] = "Add a new menu!";
        header('location:main_menu.php');
    }