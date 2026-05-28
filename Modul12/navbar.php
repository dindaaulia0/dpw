<nav class="navbar">
    <a class="brand" href="index.php">Sistem Akademik</a>
    <nav>
        <a href="index.php" <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'class="active"' : '' ?>>Beranda</a>
        <a href="viewdosen.php" <?= basename($_SERVER['PHP_SELF']) == 'viewdosen.php' ? 'class="active"' : '' ?>>Dosen</a>
        <a href="viewmahasiswa.php" <?= basename($_SERVER['PHP_SELF']) == 'viewmahasiswa.php' ? 'class="active"' : '' ?>>Mahasiswa</a>
        <a href="viewmatakuliah.php" <?= basename($_SERVER['PHP_SELF']) == 'viewmatakuliah.php' ? 'class="active"' : '' ?>>Mata Kuliah</a>
    </nav>
</nav>