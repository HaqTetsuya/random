<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar p-3">
        <h4>Menu</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Tabel Iphone</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tabelorder.php">Tabel Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tabelpesan.php">Tabel Pesan</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <main role="main" class="main-content">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post" action="php/add.php" enctype="multipart/form-data">
                        <h3 class="display-4">TAMBAH IPHONE</h3>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi</label>
                            <textarea type="text" name="spesifikasi" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>
                        <input type="submit" value="Kirim" class="btn btn-primary">
                    </form>

                </div>
            </div>
        </div>
    </main>

    <!-- Local Scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>