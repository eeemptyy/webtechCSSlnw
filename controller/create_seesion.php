<?php
session_start();
$_SESSION['login'] = 'true';
$_SESSION['username'] = $_POST['username'];
$uname = $_POST['username'];
echo $_GET['fname']." >".$_POST['role_id']."< > ".intval($_POST['role_id'])." > "."ASD ";
$role = intval($_POST['role_id']);
if ($role > 3){
    header("Location: ../ad.html");
}
// else if ($role < 1){
//     header("Location: ../login.html");
// }else {
//     header("Location: ../login.html");
// }
?>