<?php

$host   = "localhost";
$user   = "root";
$paswd  = "";
$name   = "db_praktikum";

$link = mysqli_connect($host, $user, $paswd, $name);

if (!$link) {
    die("Koneksi dengan database gagal: " . mysqli_connect_errno() .
        " - " . mysqli_connect_error());
}
?>