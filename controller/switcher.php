<?php
   require 'db_controller.php';

    /* this file will act as a gate to db_controller on ajax called */ 

    $db_controller = new DB_Controller();

    $case_sw = $_POST['func'];
    switch ($case_sw) {
        case "get_login":
            $username = $_POST['username'];
            echo $db_controller->getLogin($username);
            break;
        default:
            echo "Function Not Found.";
}

?>