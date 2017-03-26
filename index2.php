<?php

require_once __DIR__."/controller/dbController.php";

$db_con = new DB_Controller();

QRcode::png('http://158.108.30.189:8888/WebtechCSSlnw/login.html', 'files/img/qr/qrIP.png');

?>
