<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bigblook";
$connect = mysqli_connect($servername, $username, $password, $dbname);
if (!$connect) {
    die("Conexión fallida: " . mysqli_connect_error());
}
