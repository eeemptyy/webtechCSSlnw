<?php
   require 'dbController.php';

    /* this file will act as a gate to db_controller on ajax called */ 

    $db_controller = new DB_Controller();

    $case_sw = $_POST['func'];
    switch ($case_sw) {
        case "get_year_sem_drop":
            echo $db_controller->getYearSemDrop();
            break;
        case "get_login":
            $uname = $_POST['username'];
            $pass = $_POST['pass'];
            echo $db_controller->getLogin($uname, $pass);
            break;
        case "get_user":
            echo $db_controller->getAllUser();
            break;
        case "delete_user":
            $username = $_POST['username'];
            echo $db_controller->deleteUser($username);
            break;
        case "edit_password":
            $username = $_POST['username'];
            $newPass = $_POST['newPass'];
            $oldPass = $_POST['oldPass'];
            echo $db_controller->editUserPassword($username, $newPass, $oldPass);
            break;
        case "edit_user":
            $username = $_POST['username'];
            $newFname = $_POST['newFname'];
            $newLname = $_POST['newLname'];
            $newRole = $_POST['newRole'];
            echo $db_controller->editUserData($username, $newFname, $newLname, $newRole);
            break;
        case "edit_user_by_user":
            $username = $_POST['username'];
            $newFname = $_POST['newFname'];
            $newLname = $_POST['newLname'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            echo $db_controller->editUserData($username, $newFname, $newLname, $email, $mobile, $address);
            break;
        case "create_user":
            $username = $_POST['username'];
            $pass = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $role = $_POST['role'];
            echo $db_controller->addUser($username, $pass, $firstname, $lastname, $role);
            break;
            // guitar code
        case "create_subject":
            $id = $_POST['id'];
            $name = $_POST['name'];
            $credit = $_POST['credit'];
            echo $db_controller->addSubject($id, $name, $credit);
            break;
            
        case "get_subject_by_semester":
            $semester = $_POST['semester'];
            $year = $_POST['year'];
            echo $db_controller->getAllSubjectBySemester($semester, $year);
            break;
        case "get_QR":
            $subjectID = $_POST['subjectID'];
            $section = $_POST['section'];
            $timeLimit = $_POST['timeLimit'];
            echo $db_controller->generateQRCode($subjectID, $section, $timeLimit);
            break;
        default:
            echo "Function Not Found.";
}

?>