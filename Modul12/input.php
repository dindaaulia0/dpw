<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="wrapper">
    <h1 class="page-title">Input Data</h1>

    <div class="card">
        <form action="proses_inputdosen.php" method="post">
            <fieldset>
                <legend>Input Data Dosen</legend>

                <div class="form-group">
                    <label for="namaDosen">Nama Dosen :</label>
                    <input type="text" name="namaDosen" id="namaDosen"
                           placeholder="Contoh: Dinda Putri S.Kom., M.Kom.," required>
                </div>

                <div class="form-group">
                    <label for="noHP">No HP :</label>
                    <input type="text" name="noHP" id="noHP"
                           placeholder="Contoh: 081222333444" required>
                </div>
            </fieldset>

            <div style="display:flex; gap:10px;">
                <input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
                <a href="viewdosen.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>