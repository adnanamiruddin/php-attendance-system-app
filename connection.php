<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "db_absensi";

$db = new mysqli($host, $user, $pass, $db_name);

if ($db->connect_error) {
    echo "Connection failed";
}
