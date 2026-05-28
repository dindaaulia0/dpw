<?php
    include 'koneksi.php';

    if (isset($_GET['idDosen'])) {
        
        $id = $_GET["idDosen"];

        $query  = "SELECT * FROM t_dosen WHERE idDosen='$id'";
        $result = mysqli_query($link, $query);

        if (!$result) {
            die("Query Error: " . mysqli_errno($link) .
                " - " . mysqli_error($link));
        }

        $data      = mysqli_fetch_assoc($result);
        $idDosen   = $data["idDosen"];
        $namaDosen = $data["namaDosen"];
        $noHP      = $data["noHP"];

    } else {
        
        header("location:viewdosen.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Dosen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="wrapper">
    <h1 class="page-title">Edit Data</h1>

    <div class="card">
        <form id="form_mahasiswa" action="proses_editdosen.php" method="post">
            <fieldset>
                <legend>Edit Data Dosen</legend>

                <div class="form-group">
                    <label for="idDosen">ID :</label>
    
                    <input type="hidden" name="idDosen" value="<?php echo $idDosen; ?>">
                   
                    <input type="text" name="idDosenDisabled" id="idDosen"
                           value="<?php echo $idDosen; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="namaDosen">Nama Dosen :</label>
                    <input type="text" name="namaDosen" id="namaDosen"
                           value="<?php echo htmlspecialchars($namaDosen); ?>" required>
                </div>

                <div class="form-group">
                    <label for="noHP">No HP :</label>
                    <input type="text" name="noHP" id="noHP"
                           value="<?php echo htmlspecialchars($noHP); ?>" required>
                </div>
            </fieldset>

            <div style="display:flex; gap:10px;">
                <input type="submit" name="edit" value="Update Data" class="btn btn-primary">
                <a href="viewdosen.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>