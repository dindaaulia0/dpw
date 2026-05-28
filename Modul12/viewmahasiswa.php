<?php
include("koneksi.php");

$db  = new Database();
$con = $db->getConnection();

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

if ($keyword !== '') {
    $stmt = $con->prepare("SELECT * FROM t_mahasiswa WHERE namaMhs LIKE ? ORDER BY npm ASC");
    $like = "%" . $keyword . "%";
    $stmt->bind_param("s", $like);
} else {
    $stmt = $con->prepare("SELECT * FROM t_mahasiswa ORDER BY npm ASC");
}

$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="wrapper">
    <h1 class="page-title">Tabel Mahasiswa</h1>

    <?php if (isset($_GET['msg'])): ?>
        <div style="background:#d4edda; color:#155724; padding:10px 16px; border-radius:6px; margin-bottom:16px;">
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="top-bar">
            <form class="search-form" action="viewmahasiswa.php" method="get">
                <input type="text" name="keyword" placeholder="Cari nama mahasiswa..."
                       value="<?php echo htmlspecialchars($keyword); ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if ($keyword !== ''): ?>
                    <a href="viewmahasiswa.php" class="btn btn-secondary">Reset</a>
                <?php endif; ?>
            </form>
            <a href="inputmahasiswa.php" class="btn btn-success">+ Tambah Mahasiswa</a>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($result->num_rows === 0) {
                    echo '<tr><td colspan="6" class="empty-state">Tidak ada data mahasiswa' .
                         ($keyword ? ' dengan keyword "<b>' . htmlspecialchars($keyword) . '</b>"' : '') .
                         '</td></tr>';
                } else {
                    while ($data = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $data['npm'] . "</td>";
                        echo "<td>" . htmlspecialchars($data['namaMhs']) . "</td>";
                        echo "<td><span class='badge badge-blue'>" . htmlspecialchars($data['prodi']) . "</span></td>";
                        echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                        echo '<td><div class="actions">';
                        echo '<a class="btn btn-warning btn-sm" href="editmahasiswa.php?npm=' . $data['npm'] . '">Edit</a>';
                        echo '<a class="btn btn-danger btn-sm"  href="hapusmahasiswa.php?npm=' . $data['npm'] . '" '
                           . 'onclick="return confirm(\'Hapus data mahasiswa ini?\')">Hapus</a>';
                        echo '</div></td>';
                        echo "</tr>";
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

        <?php if ($keyword !== ''): ?>
            <p style="margin-top:12px; color:#555; font-size:0.88rem;">
                Hasil pencarian: <strong><?php echo htmlspecialchars($keyword); ?></strong>
            </p>
        <?php endif; ?>
    </div>
</div>

<?php
$stmt->close();
$con->close();
?>
</body>
</html>