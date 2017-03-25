<?php

class DB_Controller{
    
    private $username = "";
    private $password = "";
    private $hostname = "";
    private $dbname = "";   

    private $connection;
    
    public function __construct(){
        include("dbconfig.php");
        $this->username = $uname;
        $this->password = $pass;
        $this->hostname = $host;
        $this->dbname = $db;
        
        try{
            //
            $this->connection = new PDO("mysql:host={$this->hostname};"."dbname={$this->dbname}",$this->username,$this->password);
            
        } catch (PDOException $e){
            die("Couldn't connect to the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function testInsert(){
        try{
            $sql = 'INSERT INTO project_webtech_csslnw.user (username, password, fname, lname, pic_path, role_id) VALUES ("5610404452", "4452", "Boonyaporn", "Narkjumrussri", "xxxxxxx_aaaxxxaaxx", "4")';
            // $sql = "SELECT * FROM user";
            $q = $this->connection->prepare($sql);
            $q->execute();

            echo "Inserted";
            // while ($row = $q->fetch()) {
            //     echo $row['username']." s ".$row['password'];
            // }
        } catch (PDOException $e){
            die("Couldn't Insert to the database ".$this->dbname.": ".$e->getMessage());
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

    public function addUser($username, $pass, $firstname, $lastname, $role){
        try{
            $sql = 'INSERT INTO project_webtech_csslnw.user (username, password, fname, lname, pic_path, role_id) VALUES ($username, $pass, $firstname, $lastname, "", $role)';
            $q = $this->connection->prepare($sql);
            $q->execute();
            echo "Database Inserte successful.";
        } catch (PDOException $e){
            die("Couldn't addUser to the database ".$this->dbname.": ".$e->getMessage());
        }
    }
    public function getAllSubjectBySemester($semester, $year){
        try{
            $sql = 'SELECT * FROM `subject_semester` WHERE year = ".$year." and semester = ".$semester.';
            $q = $this->connection->prepare($sql);
            $q->execute();
            
            $tempArr = array();
            $n =0;
            while ($row = $q->fetch()) {
                $temp = array();
                $temp['subjectID'] = $row['id_subject'];
                $temp['semester'] = $row['semester'];
                $temp['year'] = $row['year'];
                $temp['section'] = $row['section'];
                $temp['time'] = $row['time'];
                $tempArr[$n] = $temp;
                $n++;
            }
            echo json_encode($tempArr);
        } catch (PDOException $e){
            die("Couldn't getAllSubjectBySemester from the database ".$this->dbname.": ".$e->getMessage());
        }
    }
    
}
?>