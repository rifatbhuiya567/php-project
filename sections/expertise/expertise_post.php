<?php 
    session_start();
    require "../../db.php";

    $topic = $_POST['topic'];
    $percentage = $_POST['percentage'];

    if($topic or $percentage) {
        $insert = "INSERT INTO expertise(topic, percentage) VALUES('$topic', '$percentage')";
        mysqli_query($db_connect, $insert);

        $_SESSION['added'] = "Expertise Added!";
        header("location:expertise.php");
    }else {
        $_SESSION['empty'] = "Add New Expertise!";
        header("location:expertise.php");
    }

    