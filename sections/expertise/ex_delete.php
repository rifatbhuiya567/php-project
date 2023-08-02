<?php 
    session_start();
    require '../../db.php';

    $id = $_GET['id'];

    $select = "SELECT COUNT(*) AS total FROM expertise topic";
    $select_res = mysqli_query($db_connect, $select);
    $select_res_assoc = mysqli_fetch_assoc($select_res);

    if($select_res_assoc['total'] <= 7) {
        $_SESSION['do_not'] = "You can't delete 7 minimum items!";
        header("location:expertise.php");
    }else {
        $delete = "DELETE FROM expertise WHERE id=$id";
        mysqli_query($db_connect, $delete);

        $_SESSION['delete'] = "Successfully Deleted!";
        header("location:expertise.php");
    }