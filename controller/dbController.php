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
    
}
?>