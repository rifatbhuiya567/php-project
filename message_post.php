<?php
    session_start();
    require 'db.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    date_default_timezone_set("Asia/Dhaka");
    $time = date("h:i:s a");
    $created_at = date("d-m-Y - h:i:s a");

    $insert = "INSERT INTO messages(name, email, subject, message, time, created_at) VALUES('$name', '$email', '$subject', '$message', '$time', '$created_at')";
    mysqli_query($db_connect, $insert);

    $_SESSION['message_sent'] = "Message sent successfully!";
    header("location:index.php#contact");