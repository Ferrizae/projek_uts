<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db_pendakian";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal");
}

?>