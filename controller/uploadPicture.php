<?php
require 'dbController.php';
$db_controller = new DB_Controller();

$target_dir = "../files/img/profile/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$upFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file empty.
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    // echo $check;
    if($check !== false) {
        // echo "File is an correct - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    // shell_exec("del ../files/csv/");
    // echo "Sorry, file already exists. <BR><big>If you want to upload new version of this file please 'Delete' first.<BR></big>";
    echo "Files alredy exists, Replaced files. <br>";
    $uploadOk = 1;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.<BR>";
    $uploadOk = 0;
}
// Allow certain file formats // Temp save && $upFileType != "py"
$fileType = array('png', 'PNG', 'JPG', 'jpg');
if (!in_array($upFileType, $fileType)){
// if($upFileType != "png") {
    echo "Sorry, only 'png', 'PNG', 'JPG', 'jpg' files are allowed.<BR>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.<BR>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $prob = array();
        $prob['file'] = $_FILES["fileToUpload"]["name"];

        // $out = $db_controller->addProblem($json_prob);
        // $ff = readfile("../files/csv/".basename( $_FILES["fileToUpload"]["name"]));
        echo "\File ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.".'<br>';
    } else {
        echo "Sorry, there was an error uploading your file.<BR> ";
    }
}
?>