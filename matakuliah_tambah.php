<?php
include 'db.php';

$pesan = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];
    
    $sql = "INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES ('$kodemk', '$nama', $jumlah_sks)";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: matakuliah.php");
        exit;
    } else {
        $pesan = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Tambah Data Mata Kuliah</h2>
        
        <?php if($pesan != ''): ?>
            <div class="alert alert-danger"><?= $pesan ?></div>
        <?php endif; ?>
        
        <form method="post">
            <div class="mb-3">
                <label for="kodemk" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control" id="kodemk" name="kodemk" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_sks" class="form-label">Jumlah SKS</label>
                <input type="number" class="form-control" id="jumlah_sks" name="jumlah_sks" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="matakuliah.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>