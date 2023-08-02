<?php
    session_start();
    require '../../db.php';

    $id = $_GET['id'];

    $select = "SELECT * FROM portfolios WHERE id=$id";
    $select_res = mysqli_query($db_connect, $select);
    $select_assoc = mysqli_fetch_assoc($select_res);

    $select_total = "SELECT COUNT(*) AS total FROM portfolios title";
    $select_total_res = mysqli_query($db_connect, $select_total);
    $select_total_assoc = mysqli_fetch_assoc($select_total_res);


    if($select_total_assoc['total'] <= 6) {
        $_SESSION['minimum'] = "Minimum 6 items need place!";
        header("location:portfolio.php");
    }else {
        $delete_from = "../../uploads/portfolios/".$select_assoc['image'];
        unlink($delete_from);

        $delete = "DELETE FROM portfolios WHERE id=$id";
        mysqli_query($db_connect, $delete);

        $_SESSION['delete'] = "Delete Successfully!";
        header("location:portfolio.php");
    }