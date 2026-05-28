<?php
include("koneksi.php");

if (isset($_POST["tambah"])) {
    $db  = new Database();
    $con = $db->getConnection();

    $namaDosen = $_POST["namaDosen"];
    $noHP      = $_POST["noHP"];

    $stmt = $con->prepare("INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)");
    $stmt->bind_param("ss", $namaDosen, $noHP);

    if (!$stmt->execute()) {
        die("Gagal menambah data: " . $stmt->error);
    }

    $stmt->close();
    $con->close();
}

header("location:viewdosen.php?msg=Data dosen berhasil ditambahkan!");
?>