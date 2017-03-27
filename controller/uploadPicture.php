<?php
    session_start();
    require 'dbController.php';
    $db_controller = new DB_Controller();
    $username = $_SESSION['username'];
    $sourcePath = $_FILES['inputFile']['tmp_name'];       // Storing source path of the file in a variable
    $targetPath = "../files/img/profile/".$_FILES['inputFile']['name']; // Target path where file is to be stored
    move_uploaded_file($sourcePath,$targetPath) ;    // Moving Uploaded file
    $_SESSION['picPath'] = explode("../",$targetPath)[1];
    echo $username.' uploaded at :'.$targetPath;
?>