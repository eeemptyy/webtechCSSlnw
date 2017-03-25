<?php
   require 'dbController.php';

    /* this file will act as a gate to db_controller on ajax called */ 

    $db_controller = new DB_Controller();

    $case_sw = $_POST['func'];
    switch ($case_sw) {
        case "get_user":
            echo $db_controller->getAllUser();
            break;
        case "create_user":
            $username = $_POST['username'];
            $pass = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $role = $_POST['role'];
            echo $db_controller->addUser($username, $pass, $firstname, $lastname, $role);
        default:
            echo "Function Not Found.";
}

?>