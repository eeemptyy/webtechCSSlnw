<?php

class DB_Controller{
    private $username = "";
    private $password = "";
    private $hostname = "";
    private $dbname = "";   
    private $connection;

    private $currentSemester = "";
    private $currentYear = "";
    
    public function __construct(){
        include("dbconfig.php");
        include("phpqrcode/qrlib.php");
        $this->username = $uname;
        $this->password = $pass;
        $this->hostname = $host;
        $this->dbname = $db;
        try{
            $this->connection = new PDO("mysql:host={$this->hostname};"."dbname={$this->dbname}",$this->username,$this->password);         
            $this->getCurrentData();            
        } catch (PDOException $e){
            die("Couldn't connect to the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    private function getCurrentData(){
        try{
            $sql = 'SELECT * FROM subject_semester ORDER BY year DESC, semester DESC LIMIT 1';
            // $sql = "SELECT * FROM user";
            $q = $this->connection->prepare($sql);
            $q->execute();

            $row = $q->fetch();
            $this->currentSemester = $row['semester'];
            $this->currentYear = $row['year'];
            // echo $this->currentSemester.":".$this->currentYear;

        } catch (PDOException $e){
            die("Couldn't getAllUser from the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function getYearSemDrop(){
        try{
            $sql = 'SELECT DISTINCT year, semester FROM subject_semester '.
                    'ORDER by year DESC, semester DESC';
            $q = $this->connection->prepare($sql);
            $q->execute();

            $tempArr = array();
            $n =0;
            while ($row = $q->fetch()) {
                $temp = array();
                $temp['year'] = $row['year'];
                $temp['semester'] = $row['semester'];
                $tempArr[$n] = $temp;
                $n++;
            }
            echo json_encode($tempArr);
            
        } catch (PDOException $e){
            die("Couldn't get Data.");
        }
    }

    public function getLogin($uname, $pass){
        try{
            $sql = 'SELECT user.username, user.password, user.fname, user.lname, role.role_name, user.role_id, user.email, user.address, user.tel, user.pic_path '.
            'FROM user, role WHERE user.username = "'.$uname.'" and user.role_id = role.id';
            $q = $this->connection->prepare($sql);
            $q->execute();

            $row = $q->fetch();
            if ($row['password'] == $pass){
                $userin = array();
                $userin["username"] = $row['username'];
                $userin['firstname'] = $row['fname'];
                $userin['lastname'] = $row['lname'];
                $userin['role'] = $row['role_id'];
                $userin['email'] = $row['email'];
                $userin['address'] = $row['address'];
                $userin['tel'] = $row['tel'];
                $userin['picPath'] = $row['pic_path'];
                echo json_encode($userin);
            }else {
                echo "Username/Password not found.";
            }

        } catch (PDOException $e){
            die("Couldn't Login to the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function getAllUser(){
        try{
            $sql = 'SELECT user.username, user.fname, user.lname, role.role_name FROM user, role WHERE user.role_id = role.id';
            // $sql = "SELECT * FROM user";
            $q = $this->connection->prepare($sql);
            $q->execute();

            $tempArr = array();
            $n =0;
            while ($row = $q->fetch()) {
                $temp = array();
                $temp['username'] = $row['username'];
                $temp['firstname'] = $row['fname'];
                $temp['lastname'] = $row['lname'];
                $temp['role'] = $row['role_name'];
                $tempArr[$n] = $temp;
                $n++;
            }
            echo json_encode($tempArr);

        } catch (PDOException $e){
            die("Couldn't getAllUser from the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function editUserPassword($username, $newPass, $oldPass){
        try{
            $sql = 'UPDATE user SET password = "'.$newPass.'" WHERE user.username = "'.$username.'" and user.password = "'.$oldPass.'" ';
            $q = $this->connection->prepare($sql);
            $q->execute();
            echo "Database Update successful.";
        } catch (PDOException $e){
            die("Couldn't Update the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function editUserData($username, $newFname, $newLname, $newRole){
        try{
            $sql = 'UPDATE user SET user.fname = "'.$newFname.'", user.lname = "'.$newLname.'", user.role_id = "'.$newRole.'" WHERE user.username = "'.$username.'"';
            $q = $this->connection->prepare($sql);
            $q->execute();
            echo "Database Update successful.";
        } catch (PDOException $e){
            die("Couldn't Update the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function editUserDataByUser($username, $newFname, $newLname, $email, $mobile, $address){
        try{-
            $sql = 'UPDATE user SET user.fname = "'.$newFname.'", user.lname = "'.$newLname.
                    '", user.address = "'.$address.'", user.email = "'.$email.'", user.tel = "'.$mobile.'" WHERE user.username = "'.$username.'"';
            $q = $this->connection->prepare($sql);
            $q->execute();
            echo "Database Update successful.";
        } catch (PDOException $e){
            die("Couldn't Update the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function editProfilePicture($username, $targetPath){
        try{
            $sql = 'UPDATE user SET user.pic_path = "'.$targetPath.'"'.
                    ' WHERE user.username = "'.$username.'"';
            $q = $this->connection->prepare($sql);
            $q->execute();
            echo "Database Update successful.";
        } catch (PDOException $e){
            die("Couldn't Update the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function addUser($username, $pass, $firstname, $lastname, $role){
        try{
            $sql = 'INSERT INTO project_webtech_csslnw.user (username, password, fname, lname, pic_path, role_id) '.
            'VALUES ("'.$username.'", "'.$pass.'", "'.$firstname.'", "'.$lastname.'", "", "'.$role.'")';
            $q = $this->connection->prepare($sql);
            $q->execute();
            echo "Database Inserte successful.";
        } catch (PDOException $e){
            die("Couldn't addUser to the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function deleteUser($username){
        try{
            $sql = 'DELETE FROM user WHERE user.username = "'.$username.'"';
            $q = $this->connection->prepare($sql);
            $q->execute();
            echo "Delete User successful.";
        } catch (PDOException $e){
            die("Couldn't delete user from the database ".$this->dbname.": ".$e->getMessage());            
        }
    }
 //addSubject -- guitar
    public function addSubject($id,$name,$credit)
    {
        try{           
         $sql = 'INSERT INTO project_webtech_csslnw.subject (id, name, credit) '.
            'VALUES ("'.$id.'", "'.$name.'", "'.$credit.'")';
            $q = $this->connection->prepare($sql);
            $q->execute();
            echo "Database Inserte successful.";
        } catch (PDOException $e){
            die("Couldn't addUser to the database ".$this->dbname.": ".$e->getMessage());
        }
    }
    
    public function getAllSubjectBySemester($semester, $year){
        if ($semester == "now" && $year == "now"){
            $semester = $this->currentSemester;
            $year = $this->currentYear;
        }
        try{
            // $sql = 'SELECT * FROM `subject_semester` WHERE year = ".$year." and semester = ".$semester.';
            $sql = 'SELECT DISTINCT subject_semester.id_subject as SubjectID, subject.name, subject.credit, subject_teacher.username as TeacherID, user.fname, user.lname '.
                    'FROM subject_semester, subject, subject_teacher, user '.
                    'WHERE subject_semester.year = "'.$year.'" and subject_semester.semester = "'.$semester.'" and subject_semester.id_subject = subject.id and subject_teacher.username = user.username';
            $q = $this->connection->prepare($sql);
            $q->execute();
            
            $tempArr = array();
            $n =0;
            // echo $q->rowCount()." ASA";
            while ($row = $q->fetch()) {
                $temp = array();
                $temp['subjectID'] = $row['SubjectID'];
                $temp['name'] = $row['name'];
                $temp['credit'] = $row['credit'];
                $temp['teacherID'] = $row['TeacherID'];
                $temp['firstname'] = $row['fname'];
                $temp['lastname'] = $row['lname'];
                $tempArr[$n] = $temp;
                $n++;
            }
            echo json_encode($tempArr);
        } catch (PDOException $e){
            die("Couldn't getAllSubjectBySemester from the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function generateQRCode($subjectID, $section, $timeLimit){
        try{
            $sql = 'SELECT * FROM subject_semester '.
            'WHERE semester = "'.$this->currentSemester.'" and year = "'.$this->currentYear.
            '" and id_subject = "'.$subjectID.'" and section = "'.$section.'"';
            $q = $this->connection->prepare($sql);
            $q->execute();
            
            $row = $q->fetch();
            $subjectSemesterID = $row['id'];
            if ($subjectSemesterID != NULL){
                $sql = 'INSERT INTO class (id, id_subject_semester, time_limit, qr_path)'.
                ' VALUES (NULL, "'.$subjectSemesterID.'", "'.$timeLimit.'", NULL)';
                $q = $this->connection->prepare($sql);
                $q->execute();

                $sql = 'SELECT * FROM class ORDER BY id DESC ';
                $q = $this->connection->prepare($sql);
                $q->execute();
                $row = $q->fetch();
                
                $classID = $row['id'];
                
                $qrPath = '../files/img/qr/qr_'.$classID.'_'.$subjectSemesterID.'.png';
                QRcode::png($classID.' '.$subjectSemesterID, $qrPath);

                echo $qrPath;
            }else {
                echo "Cann't find subject";
            }

        } catch (PDOException $e){
            die("Couldn't Login to the database ".$this->dbname.": ".$e->getMessage());
        }

    }


}
?>