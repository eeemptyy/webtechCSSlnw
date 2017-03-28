<?php
    session_start();
    require 'dbController.php';
    $db_controller = new DB_Controller();
    $username = $_SESSION['username'];
    $sourcePath = $_FILES['inputFile']['tmp_name'];
    $targetPath = "../files/img/profile/".$username.".".explode(".",$_FILES['inputFile']['name'])[1];
    move_uploaded_file($sourcePath,$targetPath);
    $_SESSION['picPath'] = explode("../",$targetPath)[1];
    echo $username.' uploaded at :'.$targetPath.':'
         .$db_controller->editProfilePicture($username, explode("../",$targetPath)[1]).":".$_FILES['inputFile']['name'];
?>