<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="wrapper">
    <h1 class="page-title">Tabel Dosen</h1>

    <?php if (isset($_GET['msg'])): ?>
        <div style="background:#d4edda; color:#155724; padding:10px 16px; border-radius:6px; margin-bottom:16px;">
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="top-bar">
            <form class="search-form" action="viewdosen.php" method="get">
                <input type="text" name="keyword" placeholder="Cari nama dosen..."
                       value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if (isset($_GET['keyword']) && $_GET['keyword'] !== ''): ?>
                    <a href="viewdosen.php" class="btn btn-secondary">Reset</a>
                <?php endif; ?>
            </form>
            <a href="input.php" class="btn btn-success">+ Tambah Dosen</a>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Dosen</th>
                        <th>No HP</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, $_GET['keyword']) : '';

                    if ($keyword !== '') {
                        $query = "SELECT * FROM t_dosen WHERE namaDosen LIKE '%$keyword%' ORDER BY idDosen ASC";
                    } else {
                        $query = "SELECT * FROM t_dosen ORDER BY idDosen ASC";
                    }

                    $result = mysqli_query($link, $query);

                    if (!$result) {
                        die("Query Error: " . mysqli_errno($link) .
                            " - " . mysqli_error($link));
                    }

                    if (mysqli_num_rows($result) === 0) {
                        echo '<tr><td colspan="4" class="empty-state">Tidak ada data dosen' .
                             ($keyword ? ' dengan keyword "<b>' . htmlspecialchars($keyword) . '</b>"' : '') .
                             '</td></tr>';
                    } else {
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $data['idDosen']   . "</td>";
                            echo "<td>" . htmlspecialchars($data['namaDosen']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['noHP'])      . "</td>";
                            echo '<td><div class="actions">';
                            echo '<a class="btn btn-warning btn-sm" href="editdosen.php?idDosen=' . $data['idDosen'] . '">Edit</a> ';
                            echo '<a class="btn btn-danger btn-sm" href="hapusdosen.php?idDosen=' . $data['idDosen'] . '" '
                               . 'onclick="return confirm(\'Anda yakin akan menghapus data ini?\')">Hapus</a>';
                            echo '</div></td>';
                            echo "</tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>

        <?php if (isset($keyword) && $keyword !== ''): ?>
            <p style="margin-top:12px; color:#555; font-size:0.88rem;">
                Menampilkan hasil pencarian untuk: <strong><?php echo htmlspecialchars($keyword); ?></strong>
            </p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>