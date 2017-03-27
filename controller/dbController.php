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

    public function getAllStudent(){
        try{
            $sql = 'SELECT user.username, user.fname, user.lname, role.role_name FROM user, role WHERE user.role_id = "1" AND user.role_id = role.id';
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
            // $sql = 'SELECT DISTINCT subject_semester.id_subject as SubjectID, subject.name, subject.credit, subject_teacher.username as TeacherID, user.fname, user.lname '.
            //         'FROM subject_semester, subject, subject_teacher, user '.
            //         'WHERE subject_semester.year = "'.$year.'" and subject_semester.semester = "'.$semester.'" and subject_semester.id_subject = subject.id and subject_teacher.username = user.username';
            $sql = 'SELECT DISTINCT subject_semester.id_subject as SubjectID, subject.name, subject.credit, subject_teacher.username as TeacherID, user.fname, user.lname '.
                    'FROM subject_semester, subject_teacher, user, subject '.
                    'WHERE subject_semester.year = "'.$year.'" and subject_semester.semester = "'.$semester.'" and subject_semester.id = subject_teacher.id_subject_semester '.
                    'and user.username = subject_teacher.username and subject_semester.id_subject = subject.id ';            
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

    public function getAllSubjectByStudentID($username, $semester, $year){
        if ($semester == "now" && $year == "now"){
            $semester = $this->currentSemester;
            $year = $this->currentYear;
        }
        try{
            $sql = 'SELECT DISTINCT subject.id AS CourseID, subject.name AS CourseName, subject.credit, takes.grade '.
                    'FROM takes, user, subject_semester, subject '.
                    'WHERE takes.username = "'.$username.'" and subject.id = subject_semester.id_subject and '.
                    'subject_semester.id = takes.id_subject_semester and subject_semester.year = "'.$year.'" and subject_semester.semester = "'.$semester.'" ';
            $q = $this->connection->prepare($sql);
            $q->execute();
            
            $tempArr = array();
            $n =0;
            // echo $q->rowCount()." ASA";
            while ($row = $q->fetch()) {
                $temp = array();
                $temp['CourseID'] = $row['CourseID'];
                $temp['CourseName'] = $row['CourseName'];
                $temp['credit'] = $row['credit'];
                $temp['grade'] = $row['grade'];
                $tempArr[$n] = $temp;
                $n++;
            }
            echo json_encode($tempArr);
        } catch (PDOException $e){
            die("Couldn't getAllSubjectByStudentID from the database ".$this->dbname.": ".$e->getMessage());
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

    public function readCSV($target_file){
        $out = $target_file."\n";
        $file = fopen($target_file,"r");
        $mode = '0';// t = teacher // s = student
        while(! feof($file)){
            $line = preg_replace('/\s+/', '', fgets($file));
            if ($line == "#AddSubject"){
                $out .= $this->readSubjectCSV($file);
            }else if ($line == "#AddSem"){
                $out .= $this->readSubjectSemesterCSV($file);
            }else {
                $lineArr = explode(",", $line);
                try{           
                    $username = $lineArr[0];
                    $password = sha1(substr($username,6));
                    $fname = $lineArr[1];
                    $lname = $lineArr[2];
                    $role_id = $lineArr[3];
                    
                    $sql = 'INSERT INTO `user` (`username`, `password`, `fname`, `lname`, `pic_path`, `role_id`, `email`, `address`, `tel`)'.
                            ' VALUES ("'.$username.'", "'.$password.'", "'.$fname.'", "'.$lname.'",'.
                            ' "files/img/profile/contact-default3.png", "'.$role_id.'", NULL, NULL, NULL)';
                    $q = $this->connection->prepare($sql);
                    $q->execute();
                    // echo "Database Inserte successful.";
                } catch (PDOException $e){
                    die("Couldn't addUser to the database ".$this->dbname.": ".$e->getMessage());
                }
            }
            $out .= $line."\n";
        }
        fclose($file);
        echo "Data from file read by server \n".$out;
    }

    private function readSubjectCSV($file){
        $out = "";
        while(! feof($file)){
            $line = preg_replace('/\s+/', '', fgets($file));
            $lineArr = explode(",", $line);
            try{           
                $subjectID = $lineArr[0];
                $name = $lineArr[1];
                $credit = $lineArr[2];

                $sql = 'INSERT INTO subject (id, name, credit)'.
                ' VALUES ("'.$subjectID.'", "'.$name.'", "'.$credit.'")';
                $q = $this->connection->prepare($sql);
                $q->execute();
                    // echo "Database Inserte successful.";
            } catch (PDOException $e){
                die("Couldn't addUser to the database ".$this->dbname.": ".$e->getMessage());
            }
            $out .= $line."\n";
        }
        return $out;
    }

    private function readSubjectSemesterCSV($file){
        $out = "";
        $mode = '0';
        $line = preg_replace('/\s+/', '', fgets($file));
        try{           
            $lineArr = explode(",", $line);
            $subjectID = $lineArr[0];
            $semester = $lineArr[1];
            $year = $lineArr[2];
            $section = $lineArr[3]; 
            $timee = $lineArr[4];
            
            $sql = 'INSERT INTO subject_semester (id, id_subject, semester, year, section, time) '.
                    'VALUES (NULL, "'.$subjectID.'", "'.$semester.'", "'.$year.'", "'.$section.'", "'.$timee.'") ';
            $q = $this->connection->prepare($sql);
            $q->execute();

            $sql = 'SELECT * FROM subject_semester ORDER BY id DESC LIMIT 1 ';
            $q = $this->connection->prepare($sql);
            $q->execute();
            $row = $q->fetch();
            $subjectSemesterID = $row['id'];

                    // echo "Database Inserte successful.";
        } catch (PDOException $e){
            die("Couldn't addUser to the database ".$this->dbname.": ".$e->getMessage());
        }
        
        while(! feof($file)){
            $line = preg_replace('/\s+/', '', fgets($file));
            if (($line == '@') && ($mode == '0')){
                $mode = 't';
                $line = preg_replace('/\s+/', '', fgets($file));
            }else if (($line == '@') && ($mode == 't')){
                $mode = 's';
                $line = preg_replace('/\s+/', '', fgets($file));
            }

            if ($mode =='t'){
                try{           
                    $username = $line;
                    
                    $sql = 'INSERT INTO subject_teacher (username, id_subject_semester) VALUES ("'.$username.'", "'.$subjectSemesterID.'") ';
                    $q = $this->connection->prepare($sql);
                    $q->execute();
                        // echo "Database Inserte successful.";
                } catch (PDOException $e){
                    die("Couldn't addUser to the database ".$this->dbname.": ".$e->getMessage());
                }
            }else if ($mode == 's'){
                try{           
                    $username = $line;
                    
                    $sql = 'INSERT INTO takes (username, id_subject_semester, grade) VALUES ("'.$username.'", "'.$subjectSemesterID.'", NULL)';
                    $q = $this->connection->prepare($sql);
                    $q->execute();
                        // echo "Database Inserte successful.";
                } catch (PDOException $e){
                    die("Couldn't addUser to the database ".$this->dbname.": ".$e->getMessage());
                }
            }
            $out .= $line."\n";
        }
        return $out;
    }

    public function getAllClass(){
        try{
            $sql = 'SELECT DISTINCT class.id, class.time_limit AS Time, subject_semester.id_subject AS SubjectID, '.
                    ' subject.name, subject_teacher.username, user.fname, user.lname FROM class, subject_semester, subject, '.
                    'subject_teacher, user WHERE class.id_subject_semester = subject_semester.id and subject_semester.id_subject = subject.id '.
                    'AND subject_semester.id = subject_teacher.id_subject_semester AND subject_teacher.username = user.username';
            $q = $this->connection->prepare($sql);
            $q->execute();
            
            $tempArr = array();
            $n =0;
            while ($row = $q->fetch()) {
                $temp = array();
                $temp['id'] = $row['id'];
                $temp['Time'] = $row['Time'];
                $temp['SubjectID'] = $row['SubjectID'];
                $temp['name'] = $row['name'];
                $temp['username'] = $row['username'];
                $temp['fname'] = $row['fname'];
                $temp['lname'] = $row['lname'];
                $tempArr[$n] = $temp;
                $n++;
            }
            echo json_encode($tempArr);
        } catch (PDOException $e){
            die("Couldn't getAllClass from the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function getAllInClass($classID){
        try{
            $sql = 'SELECT take_class.id_class AS id, user.username AS StudentID, user.fname, user.lname '.
                    ' FROM take_class, user WHERE take_class.id_class = "'.$classID.'" AND take_class.username_stu = user.username';
            $q = $this->connection->prepare($sql);
            $q->execute();
            
            $tempArr = array();
            $n =0;
            while ($row = $q->fetch()) {
                $temp = array();
                $temp['id'] = $row['id'];
                $temp['StudentID'] = $row['StudentID'];
                $temp['fname'] = $row['fname'];
                $temp['lname'] = $row['lname'];
                $tempArr[$n] = $temp;
                $n++;
            }
            echo json_encode($tempArr);
        } catch (PDOException $e){
            die("Couldn't getAllInClass from the database ".$this->dbname.": ".$e->getMessage());
        }
    }

    public function getCommentInSubject($username_stu, $year, $semester, $subjectID){
        try {
            $sql = 'SELECT DISTINCT comment.id, comment.username_stu, comment.username_tea AS TeacherID, '.
                    'user.fname AS TeacherFName, user.lname AS TeacherLName, comment.comment_text, subject_semester.id_subject FROM comment, '.
                    'user, subject_semester WHERE comment.username_stu = "'.$username_stu.'" '.
                    'AND comment.id_subject_semester = subject_semester.id and comment.username_tea = user.username '.
                    'AND subject_semester.year = "'.$year.'" AND subject_semester.semester = "'.$semester.'" and subject_semester.id_subject = "'.$subjectID.'"';
            $q = $this->connection->prepare($sql);
            $q->execute();
            
            $tempArr = array();
            $n =0;
            while ($row = $q->fetch()) {
                $temp = array();
                $temp['id'] = $row['id'];
                $temp['username_stu'] = $row['username_stu'];
                $temp['TeacherID'] = $row['TeacherID'];
                $temp['TeacherFName'] = $row['TeacherFName'];
                $temp['TeacherLName'] = $row['TeacherLName'];
                $temp['comment_text'] = $row['comment_text'];
                $temp['id_subject'] = $row['id_subject'];
                $tempArr[$n] = $temp;
                $n++;
            }
            echo json_encode($tempArr);
        } catch (PDOException $e){

        }
    }

    public function getDropSubjectOnQR($username, $year, $semester){
        try {
            $sql = 'SELECT DISTINCT subject_semester.id_subject, subject.name, subject_teacher.username '.
                    'FROM subject_teacher, subject_semester, subject '.
                    'WHERE subject_teacher.username = "'.$username.'" AND subject_semester.id = subject_teacher.id_subject_semester '.
                    'and subject_semester.id_subject = subject.id '.
                    'AND subject_semester.year = "'.$year.'" and subject_semester.semester = "'.$semester.'" ';
            $q = $this->connection->prepare($sql);
            $q->execute();
            
            $tempArr = array();
            $n =0;
            while ($row = $q->fetch()) {
                $temp = array();
                $temp['id_subject'] = $row['id_subject'];
                $temp['name'] = $row['name'];
                $temp['username'] = $row['username'];
                $tempArr[$n] = $temp;
                $n++;
            }
            echo json_encode($tempArr);

        } catch (PDOException $e){

        }
    }

    public function getDropSubjectOnQR2Section($username, $year, $semester, $subjectID){
        try {
            $sql = 'SELECT DISTINCT subject_semester.id_subject, subject.name, subject_teacher.username, subject_semester.section '.
                    'FROM subject_teacher, subject_semester, subject '.
                    'WHERE subject_teacher.username = "'.$username.'" AND subject_semester.id = subject_teacher.id_subject_semester '.
                    'and subject_semester.id_subject = subject.id '.
                    'AND subject_semester.year = "'.$year.'" and subject_semester.semester = "'.$semester.'" '.
                    'AND subject_semester.id_subject = "'.$subjectID.'" ';
            $q = $this->connection->prepare($sql);
            $q->execute();
            
            $tempArr = array();
            $n =0;
            while ($row = $q->fetch()) {
                $temp = array();
                $temp['section'] = $row['section'];
                $tempArr[$n] = $temp;
                $n++;
            }
            echo json_encode($tempArr);

        } catch (PDOException $e){

        }
    }


}
?>