<?php
// Data produk dalam bentuk array multidimensi
$dataproduk = array(
    array("Standar", "Jalan A. Yani KM 2,5 No.138, Sungai Baru, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70233.", "Telepon: (0511) 3277777.", "email: @galaxyhotelbjm.com", 500000, "standar.jpg"),
    array("Deluxe",  "Jalan A. Yani KM 2,5 No.138, Sungai Baru, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70233.", "Telepon: (0511) 3277777.", "email: @galaxyhotelbjm.com", 750000, "deluxe.jpg"),
    array("Executif",  "Jalan A. Yani KM 2,5 No.138, Sungai Baru, Kec. Banjarmasin Tengah, Kota Banjarmasin, Kalimantan Selatan 70233.", "Telepon: (0511) 3277777.", "email: @galaxyhotelbjm.com", 1000000, "executif.jpg"),
);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar {
            font-size: 18px;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: transform 0.2s ease-in-out;
        }

        .btn-primary {
            background-color: #ffffff;
            /* Background putih */
            color: black !important;
            /* Tulisan hitam */
            border: 1px solid black;
            /* Garis pinggir hitam */
        }

        .btn-primary:hover {
            background-color: #f8f9fa;
            /* Hover abu-abu */
            color: black !important;
            border: 1px solid black;
        }

        .banner {
            height: 500px;
            object-fit: cover;
            position: relative;
            text-align: center;
            color: white;
        }

        .banner-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="beranda.php">Produk</a>
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

    <!-- Banner -->
    <div class="mb-4 p-0">
        <div class="container-fluid p-0">
            <img src="img/banner.png" class="img-fluid w-100" alt="" style="height: 500px; object-fit: cover;">
        </div>
    </div>

    <!-- Daftar Produk -->
    <div class="container-fluid mt-5">
        <h2 class="text-left mb-4">Daftar Produk</h2>
        <div class="row justify-content-start">
            <?php foreach ($dataproduk as $index => $paket) : ?>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <img src="img/<?= $paket[5] ?>" class="card-img-top" alt="<?= $paket[0] ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $paket[0] ?></h5>
                            <p class="card-text"><?= $paket[1] ?></p>
                            <p class="card-text"><?= $paket[2] ?></p>
                            <p class="card-text"><?= $paket[3] ?></p>
                            <p class="card-text"><strong>Rp <?= number_format($paket[4], 0, ',', '.') ?></strong></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Tombol SELANJUTNYA di Tengah -->
        <div class="text-center mt-4">
            <a href="booking.php" class="btn btn-primary btn-lg px-5 py-3 fw-bold">SELANJUTNYA</a>
        </div>
    </div>

    <br>
    <div class="footer">
        <p>@copyright zaelena</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>