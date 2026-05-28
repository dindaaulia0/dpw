<?php include 'koneksi.php'; ?>
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
                       value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if (!empty($_GET['keyword'])): ?>
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
                    $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, $_GET['keyword']) : '';

                    if ($keyword !== '') {
                        $query = "SELECT * FROM t_mahasiswa WHERE namaMhs LIKE '%$keyword%' ORDER BY npm ASC";
                    } else {
                        $query = "SELECT * FROM t_mahasiswa ORDER BY npm ASC";
                    }

                    $result = mysqli_query($link, $query);

                    if (!$result) {
                        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
                    }

                    if (mysqli_num_rows($result) === 0) {
                        echo '<tr><td colspan="6" class="empty-state">Tidak ada data mahasiswa' .
                             ($keyword ? ' dengan keyword "<b>' . htmlspecialchars($keyword) . '</b>"' : '') .
                             '</td></tr>';
                    } else {
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $data['npm']    . "</td>";
                            echo "<td>" . htmlspecialchars($data['namaMhs']) . "</td>";
                            echo "<td><span class='badge badge-blue'>" . htmlspecialchars($data['prodi'])  . "</span></td>";
                            echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                            echo "<td>" . htmlspecialchars($data['noHP'])   . "</td>";
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

        <?php if (!empty($keyword)): ?>
            <p style="margin-top:12px; color:#555; font-size:0.88rem;">
                Hasil pencarian: <strong><?php echo htmlspecialchars($keyword); ?></strong>
            </p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>