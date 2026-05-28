<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="wrapper">
    <h1 class="page-title">Tabel Mata Kuliah</h1>

    <?php if (isset($_GET['msg'])): ?>
        <div style="background:#d4edda; color:#155724; padding:10px 16px; border-radius:6px; margin-bottom:16px;">
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="top-bar">
            <form class="search-form" action="viewmatakuliah.php" method="get">
                <input type="text" name="keyword" placeholder="Cari nama mata kuliah..."
                       value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <?php if (!empty($_GET['keyword'])): ?>
                    <a href="viewmatakuliah.php" class="btn btn-secondary">Reset</a>
                <?php endif; ?>
            </form>
            <a href="inputmatakuliah.php" class="btn btn-success">+ Tambah Mata Kuliah</a>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Jam (menit)</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, $_GET['keyword']) : '';

                    if ($keyword !== '') {
                        $query = "SELECT * FROM t_matakuliah WHERE namaMK LIKE '%$keyword%' ORDER BY kodeMK ASC";
                    } else {
                        $query = "SELECT * FROM t_matakuliah ORDER BY kodeMK ASC";
                    }

                    $result = mysqli_query($link, $query);

                    if (!$result) {
                        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
                    }

                    if (mysqli_num_rows($result) === 0) {
                        echo '<tr><td colspan="5" class="empty-state">Tidak ada data mata kuliah' .
                             ($keyword ? ' dengan keyword "<b>' . htmlspecialchars($keyword) . '</b>"' : '') .
                             '</td></tr>';
                    } else {
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><span class='badge badge-yellow'>" . $data['kodeMK'] . "</span></td>";
                            echo "<td>" . htmlspecialchars($data['namaMK']) . "</td>";
                            echo "<td><span class='badge badge-green'>" . $data['sks'] . " SKS</span></td>";
                            echo "<td>" . $data['jam'] . " menit</td>";
                            echo '<td><div class="actions">';
                            echo '<a class="btn btn-warning btn-sm" href="editmatakuliah.php?kodeMK=' . $data['kodeMK'] . '">Edit</a>';
                            echo '<a class="btn btn-danger btn-sm"  href="hapusmatakuliah.php?kodeMK=' . $data['kodeMK'] . '" '
                               . 'onclick="return confirm(\'Hapus mata kuliah ini?\')">Hapus</a>';
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