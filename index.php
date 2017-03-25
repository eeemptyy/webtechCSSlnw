<?php

require_once __DIR__."/controller/dbController.php";

$db_con = new DB_Controller();

echo $db_con->testQuery();