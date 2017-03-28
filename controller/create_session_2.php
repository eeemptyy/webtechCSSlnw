<?php
    session_start();
    $_SESSION['username2'] = $_POST['username'];
    $_SESSION['fname2'] = $_POST['fname'];
    $_SESSION['lname2'] = $_POST['lname'];
    $_SESSION['role_id2'] = $_POST['role_id'];
    $_SESSION['email2'] = $_POST['email'];
    $_SESSION['address2'] = $_POST['address'];
    $_SESSION['tel2'] = $_POST['tel'];
    $_SESSION['picPath2'] = $_POST['picPath'];

    $role = $_SESSION['role_id'];
    if ($role > 3){
        header("Location: ../admin_user.php");
    }else if ($role < 2){
        header("Location: ../student_profile.php");
    }else{
        header("Location: ../teacher_profile.php");
    }
?>
