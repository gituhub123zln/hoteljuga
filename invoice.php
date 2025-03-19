<?php
session_start();
if (!isset($_SESSION['nama_pemesan'])) {
    header("Location: booking.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Invoice Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center fw-bold">Invoice Pemesanan</h2>
        <div class="card shadow">
            <div class="card-body">
                <h5>Nama Pemesan: <?= $_SESSION['nama_pemesan'] ?></h5>
                <p>Jenis Kelamin: <?= $_SESSION['jenis_kelamin'] ?></p>
                <p>Nomor Identitas: <?= $_SESSION['nomor_identitas'] ?></p>
                <p>Tanggal Pesan: <?= $_SESSION['tanggal'] ?></p>
                <p>Durasi Menginap: <?= $_SESSION['durasi'] ?> Hari</p>
                <p>Tipe Kamar: <?= $_SESSION['tipe_kamar'] ?></p>
                <p>Total Bayar: Rp <?= number_format($_SESSION['total_harga'], 0, ',', '.') ?></p>
                <img src="gambar/<?= $_SESSION['gambar'] ?>" class="img-fluid rounded" width="300">
            </div>
            <div class="card-footer text-center">
                <a href="booking.php" class="btn btn-dark">Kembali</a>
            </div>
        </div>
    </div>
</body>

</html>