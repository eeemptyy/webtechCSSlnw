<?php
session_start();
$_SESSION['login'] = 'true';
$_SESSION['username'] = $_POST['username'];
$uname = $_POST['username'];
echo $_POST['fname']." >".$_POST['role_id']."< > ".intval($_POST['role_id'])." > "."ASD ";
$role = intval($_POST['role_id']);
if ($role > 3){
    header("Location: ../ad.php");
}
else if ($role < 1){
    header("Location: ../student_profile.php");
}else {
    header("Location: ../teacher_profile.php");
}
?>
