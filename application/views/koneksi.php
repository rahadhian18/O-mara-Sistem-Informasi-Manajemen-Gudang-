<?php

$host = "localhost";
$db = "omara";
$user = "root";
$password = "";

$con = mysqli_connect($host, $user, $password, $db);

if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke database";
}

?>