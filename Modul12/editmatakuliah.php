<?php
include("koneksi.php");

if (isset($_GET['kodeMK'])) {
    $db  = new Database();
    $con = $db->getConnection();

    $kodeMK = $_GET['kodeMK'];

    $stmt = $con->prepare("SELECT * FROM t_matakuliah WHERE kodeMK = ?");
    $stmt->bind_param("i", $kodeMK);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        header("location:viewmatakuliah.php");
        exit;
    }

    $data   = $result->fetch_assoc();
    $kodeMK = $data['kodeMK'];
    $namaMK = $data['namaMK'];
    $sks    = $data['sks'];
    $jam    = $data['jam'];

    $stmt->close();
    $con->close();
} else {
    header("location:viewmatakuliah.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="wrapper">
    <h1 class="page-title">Edit Data Mata Kuliah</h1>

    <div class="card">
        <form action="proses_editmatakuliah.php" method="post">
            <fieldset>
                <legend>Edit Data Mata Kuliah</legend>

                <div class="form-group">
                    <label>Kode MK :</label>
                    <input type="hidden" name="kodeMK" value="<?php echo $kodeMK; ?>">
                    <input type="text" value="<?php echo $kodeMK; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="namaMK">Nama Mata Kuliah :</label>
                    <input type="text" name="namaMK" id="namaMK"
                           value="<?php echo htmlspecialchars($namaMK); ?>" required>
                </div>

                <div class="form-group">
                    <label for="sks">SKS :</label>
                    <select name="sks" id="sks" required>
                        <?php for ($i = 1; $i <= 4; $i++): ?>
                            <option value="<?php echo $i; ?>" <?php echo ($i == $sks) ? 'selected' : ''; ?>>
                                <?php echo $i; ?> SKS
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jam">Jam (menit) :</label>
                    <input type="number" name="jam" id="jam"
                           value="<?php echo $jam; ?>" required>
                </div>
            </fieldset>

            <div style="display:flex; gap:10px;">
                <input type="submit" name="edit" value="Update Data" class="btn btn-primary">
                <a href="viewmatakuliah.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>