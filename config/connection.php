<?php
$hostname = "localhost";
$username = "root";
$pass = "";
$db_name = "db_absensi";

$db = new mysqli($hostname, $username, $pass, $db_name);

if ($db->connect_error) {
    echo "Connection failed";
}
