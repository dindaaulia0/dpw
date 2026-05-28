<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Mata Kuliah</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="wrapper">
    <h1 class="page-title">Input Data Mata Kuliah</h1>

    <div class="card">
        <form action="proses_inputmatakuliah.php" method="post">
            <fieldset>
                <legend>Input Data Mata Kuliah</legend>

                <div class="form-group">
                    <label for="kodeMK">Kode MK :</label>
                    <input type="number" name="kodeMK" id="kodeMK"
                           placeholder="Contoh: 104" required>
                </div>

                <div class="form-group">
                    <label for="namaMK">Nama Mata Kuliah :</label>
                    <input type="text" name="namaMK" id="namaMK"
                           placeholder="Contoh: Desain dan Pemrograman Web" required>
                </div>

                <div class="form-group">
                    <label for="sks">SKS :</label>
                    <select name="sks" id="sks" required>
                        <option value="">-- Pilih SKS --</option>
                        <option value="1">1 SKS</option>
                        <option value="2">2 SKS</option>
                        <option value="3">3 SKS</option>
                        <option value="4">4 SKS</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jam">Jam (menit) :</label>
                    <input type="number" name="jam" id="jam"
                           placeholder="Contoh: 150" required>
                </div>
            </fieldset>

            <div style="display:flex; gap:10px;">
                <input type="submit" name="input" value="Simpan" class="btn btn-primary">
                <a href="viewmatakuliah.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>