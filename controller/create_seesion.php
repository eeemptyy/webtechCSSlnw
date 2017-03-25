<?php
session_start();
$_SESSION['login'] = 'true';
$_SESSION['username'] = $_GET['username'];
$uname = $_GET['username'];
header("Location: ../ad.html");
?>