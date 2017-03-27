<?php
    require 'dbController.php';
    $db_controller = new DB_Controller();

    $sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
    $targetPath = "../files/img/profile/".$_FILES['file']['name']; // Target path where file is to be stored
    move_uploaded_file($sourcePath,$targetPath) ;    // Moving Uploaded file
    echo 'uploaded';
?>