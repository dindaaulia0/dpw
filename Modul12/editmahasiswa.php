<?php
include("koneksi.php");

if (isset($_GET['npm'])) {
    $db  = new Database();
    $con = $db->getConnection();

    $npm = $_GET['npm'];

    $stmt = $con->prepare("SELECT * FROM t_mahasiswa WHERE npm = ?");
    $stmt->bind_param("i", $npm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        header("location:viewmahasiswa.php");
        exit;
    }

    $data    = $result->fetch_assoc();
    $npm     = $data['npm'];
    $namaMhs = $data['namaMhs'];
    $prodi   = $data['prodi'];
    $alamat  = $data['alamat'];
    $noHP    = $data['noHP'];

    $stmt->close();
    $con->close();
} else {
    header("location:viewmahasiswa.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="wrapper">
    <h1 class="page-title">Edit Data Mahasiswa</h1>

    <div class="card">
        <form action="proses_editmahasiswa.php" method="post">
            <fieldset>
                <legend>Edit Data Mahasiswa</legend>

                <div class="form-group">
                    <label>NPM :</label>
                    <input type="hidden" name="npm" value="<?php echo $npm; ?>">
                    <input type="text" value="<?php echo $npm; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="namaMhs">Nama Mahasiswa :</label>
                    <input type="text" name="namaMhs" id="namaMhs"
                           value="<?php echo htmlspecialchars($namaMhs); ?>" required>
                </div>

                <div class="form-group">
                    <label for="prodi">Program Studi :</label>
                    <select name="prodi" id="prodi" required>
                        <?php
                        $prodis = [
                            'Teknologi Informasi',
                            'Teknologi Rekayasa Elektronika',
                            'Teknologi Rekayasa Otomotif',
                            'Teknik Listrik',
                            'Perkeretaapian',
                            'Teknologi Rekayasa Perangkat Lunak'
                        ];
                        foreach ($prodis as $p) {
                            $sel = ($p === $prodi) ? 'selected' : '';
                            echo "<option value=\"$p\" $sel>$p</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <input type="text" name="alamat" id="alamat"
                           value="<?php echo htmlspecialchars($alamat); ?>" required>
                </div>

                <div class="form-group">
                    <label for="noHP">No HP :</label>
                    <input type="text" name="noHP" id="noHP"
                           value="<?php echo htmlspecialchars($noHP); ?>" required>
                </div>
            </fieldset>

            <div style="display:flex; gap:10px;">
                <input type="submit" name="edit" value="Update Data" class="btn btn-primary">
                <a href="viewmahasiswa.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>