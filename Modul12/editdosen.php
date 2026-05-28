<?php
include("koneksi.php");

if (isset($_GET['idDosen'])) {
    $db  = new Database();
    $con = $db->getConnection();

    $idDosen = $_GET['idDosen'];

    $stmt = $con->prepare("SELECT * FROM t_dosen WHERE idDosen = ?");
    $stmt->bind_param("i", $idDosen);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        header("location:viewdosen.php");
        exit;
    }

    $data      = $result->fetch_assoc();
    $idDosen   = $data['idDosen'];
    $namaDosen = $data['namaDosen'];
    $noHP      = $data['noHP'];

    $stmt->close();
    $con->close();
} else {
    header("location:viewdosen.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="wrapper">
    <h1 class="page-title">Edit Data</h1>

    <div class="card">
        <form action="proses_editdosen.php" method="post">
            <fieldset>
                <legend>Edit Data Dosen</legend>

                <div class="form-group">
                    <label for="idDosen">ID :</label>
                    <input type="hidden" name="idDosen" value="<?php echo $idDosen; ?>">
                    <input type="text" value="<?php echo $idDosen; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="namaDosen">Nama Dosen :</label>
                    <input type="text" name="namaDosen" id="namaDosen"
                           value="<?php echo htmlspecialchars($namaDosen); ?>" required>
                </div>

                <div class="form-group">
                    <label for="noHP">No HP :</label>
                    <input type="text" name="noHP" id="noHP"
                           value="<?php echo htmlspecialchars($noHP); ?>" required>
                </div>
            </fieldset>

            <div style="display:flex; gap:10px;">
                <input type="submit" name="edit" value="Update Data" class="btn btn-primary">
                <a href="viewdosen.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>