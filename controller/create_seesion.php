<?php
    session_start();
    $_SESSION['login'] = 'true';
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['role_id'] = $_POST['role_id'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['tel'] = $_POST['tel'];
    $_SESSION['picPath'] = $_POST['picPath'];

    $role = $_SESSION['role_id'];
    if ($role > 3){
        header("Location: ../ad.php");
    }else if ($role < 2){
        header("Location: ../student_profile.php");
    }else{
        header("Location: ../teacher_profile.php");
    }
?>
