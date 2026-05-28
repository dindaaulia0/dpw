<?php
include("koneksi.php");

if (isset($_POST["edit"])) {
    $db  = new Database();
    $con = $db->getConnection();

    $idDosen   = $_POST["idDosen"];
    $namaDosen = $_POST["namaDosen"];
    $noHP      = $_POST["noHP"];

    $stmt = $con->prepare("UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ?");
    $stmt->bind_param("ssi", $namaDosen, $noHP, $idDosen);

    if (!$stmt->execute()) {
        die("Gagal mengupdate data: " . $stmt->error);
    }

    $stmt->close();
    $con->close();
}

header("location:viewdosen.php?msg=Data dosen berhasil diupdate!");
?>