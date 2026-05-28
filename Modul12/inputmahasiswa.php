<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="wrapper">
    <h1 class="page-title">Input Data Mahasiswa</h1>

    <div class="card">
        <form action="proses_inputmahasiswa.php" method="post">
            <fieldset>
                <legend>Input Data Mahasiswa</legend>

                <div class="form-group">
                    <label for="npm">NPM :</label>
                    <input type="number" name="npm" id="npm"
                           placeholder="Contoh: 21010004" required>
                </div>

                <div class="form-group">
                    <label for="namaMhs">Nama Mahasiswa :</label>
                    <input type="text" name="namaMhs" id="namaMhs"
                           placeholder="Contoh: Mahendra" required>
                </div>

                <div class="form-group">
                    <label for="prodi">Program Studi :</label>
                    <select name="prodi" id="prodi" required>
                        <option value="">-- Pilih Prodi --</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Teknologi Rekayasa Elektronika">Teknologi Rekayasa Elektronika</option>
                        <option value="Teknologi Rekayasa Otomotif">Teknologi Rekayasa Otomotif</option>
                        <option value="Teknik Listrik">Teknik Listrik</option>
                        <option value="Perkeretaapian">Perkeretaapian</option>
                        <option value="Teknologi Rekayasa Perangkat Lunak">Teknologi Rekayasa Perangkat Lunak</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <input type="text" name="alamat" id="alamat"
                           placeholder="Contoh: Jl. Merdeka No. 1, Surabaya" required>
                </div>

                <div class="form-group">
                    <label for="noHP">No HP :</label>
                    <input type="text" name="noHP" id="noHP"
                           placeholder="Contoh: 081234567890" required>
                </div>
            </fieldset>

            <div style="display:flex; gap:10px;">
                <input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
                <a href="viewmahasiswa.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>