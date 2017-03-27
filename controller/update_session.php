<?php
session_start();
$_SESSION['username'] = $_POST['username'];
$_SESSION['fname'] = $_POST['fname'];
$_SESSION['lname'] = $_POST['lname'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['tel'] = $_POST['tel'];
$_SESSION['role_id'] = $_POST['role_id'];
echo "Session_Updated.";

?>