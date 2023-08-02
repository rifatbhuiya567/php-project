<?php 
    session_start();
    require "../../db.php";

    $id = $_GET['id'];

    $select = "SELECT * FROM expertise WHERE id=$id";
    $select_res = mysqli_query($db_connect, $select);
    $select_assoc = mysqli_fetch_assoc($select_res);

    $select_count = "SELECT COUNT(*) AS total FROM expertise WHERE status=1";
    $select_count_res = mysqli_query($db_connect, $select_count);
    $select_count_assoc = mysqli_fetch_assoc($select_count_res);

    if($select_assoc['status'] == 0) {
        if($select_count_assoc['total'] >= 6) {
            $_SESSION['max'] = "Maximum 6 items!";
            header("location:expertise.php");
        }else {
            $update = "UPDATE expertise SET status=1 WHERE id=$id";
            mysqli_query($db_connect, $update);

            header("location:expertise.php");
        }
    }else {
        if($select_count_assoc['total'] <= 4) {
            $_SESSION['min'] = "Minimum 4 items!";
            header("location:expertise.php");
        }else {
            $update = "UPDATE expertise SET status=0 WHERE id=$id";
            mysqli_query($db_connect, $update);

            header("location:expertise.php");
        }
    }