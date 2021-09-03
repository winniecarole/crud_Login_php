<?php

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "usermanager";

$conn = mysqli_connect($sname, $uname, $password, $db_name);// Verbindung mit der Datenbank

if (!$conn) { // error mit der Verbindung von datenbank
    echo "Connection failed!";
}
