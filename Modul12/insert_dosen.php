<?php
include("koneksi.php");

$db  = new Database();
$con = $db->getConnection();

$sql = "INSERT INTO t_dosen (idDosen, namaDosen, noHP) VALUES (18, 'Rahmat Dwi Prasetya', 'rahmat@example.com')";

$hasil = $con->query($sql);

if ($hasil === TRUE) {
    echo "Data dosen berhasil ditambahkan";
} else {
    echo "Gagal menambahkan data: " . $con->error;
}

$con->close();
?>