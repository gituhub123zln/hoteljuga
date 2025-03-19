<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['nama_pemesan'] = $nama_pemesan;
    $_SESSION['jenis_kelamin'] = $jenis_kelamin;
    $_SESSION['nomor_identitas'] = $nomor_identitas;
    $_SESSION['tanggal'] = $tanggal;
    $_SESSION['durasi'] = $durasi;
    $_SESSION['tipe_kamar'] = $tipe_kamar;
    $_SESSION['total_harga'] = $total_harga;
    $_SESSION['gambar'] = $paket[5];

    // Redirect ke halaman invoice.php
    header("Location: invoice.php");
    exit();
}


// Data produk dalam bentuk array multidimensi
$dataproduk = array(
    array("Standar", "Jalan A. Yani KM 2,5 No.138, Sungai Baru, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70233.", "Telepon: (0511) 3277777.", "email: @galaxyhotelbjm.com", 500000, "standar.jpg"),
    array("Deluxe",  "Jalan A. Yani KM 2,5 No.138, Sungai Baru, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70233.", "Telepon: (0511) 3277777.", "email: @galaxyhotelbjm.com", 600000, "deluxe.jpg"),
    array("Executif",  "Jalan A. Yani KM 2,5 No.138, Sungai Baru, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70233.", "Telepon: (0511) 3277777.", "email: @galaxyhotelbjm.com", 700000, "executif.jpg"),
);

$nama_pemesan = $_POST['nama_pemesan'] ?? "";
$jenis_kelamin = $_POST['jenis_kelamin'] ?? "";
$nomor_identitas = $_POST['nomor_identitas'] ?? "";
$tanggal = $_POST['tanggal'] ?? "";
$durasi = $_POST['durasi'] ?? 1;
$breakfast = isset($_POST['breakfast']);
$tipe_kamar = $_POST['tipe_kamar'] ?? "";
$harga = 0;
$total_harga = 0;

if ($tipe_kamar) {
    foreach ($dataproduk as $paket) {
        if ($paket[0] == $tipe_kamar) {
            $harga = $paket[4];
            break;
        }
    }
}

$total_harga = $durasi * $harga;
if ($durasi > 3) {
    $total_harga *= 0.9;
}
if ($breakfast) {
    $total_harga += 80000 * $durasi;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="harga.php">Daftar Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#footer">Tentang Kami</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center fw-bold">Form Pemesanan</h2>
        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" name="nama_pemesan" value="<?= htmlspecialchars($nama_pemesan) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label><br>
                <input type="radio" name="jenis_kelamin" value="Laki-laki" <?= $jenis_kelamin == "Laki-laki" ? 'checked' : '' ?>> Laki-laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" <?= $jenis_kelamin == "Perempuan" ? 'checked' : '' ?>> Perempuan
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Identitas</label>
                <input type="number" class="form-control" name="nomor_identitas" value="<?= $nomor_identitas ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipe Kamar</label>
                <select class="form-select" name="tipe_kamar" required onchange="this.form.submit()">
                    <option value="" selected disabled>Pilih Tipe Kamar</option>
                    <?php foreach ($dataproduk as $paket) : ?>
                        <option value="<?= htmlspecialchars($paket[0]) ?>" <?= $tipe_kamar == $paket[0] ? 'selected' : '' ?>><?= htmlspecialchars($paket[0]) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="text" class="form-control" value="Rp <?= number_format($harga, 0, ',', '.') ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Pesan</label>
                <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Durasi Menginap (Hari)</label>
                <input type="number" class="form-control" name="durasi" value="<?= htmlspecialchars($durasi) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Termasuk Breakfast</label>
                <input type="checkbox" name="breakfast" <?= $breakfast ? 'checked' : '' ?>> Ya
            </div>
            <button type="submit" class="btn btn-dark">Hitung Total Bayar</button>
            <div class="mt-3">
                <label class="form-label">Total Bayar</label>
                <input type="text" class="form-control" value="Rp <?= number_format($total_harga, 0, ',', '.') ?>" readonly>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>