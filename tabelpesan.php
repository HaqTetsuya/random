<?php session_start();
include 'php/koneksi.php';

// Query untuk mengambil data dari database
$query = "SELECT * FROM pesan";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}
?>
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
                <div class="page-title">
                    <h2>TABEL PESAN</h2>
                </div>
                <table class="table table-striped table-bordered table-hover mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Tampilkan data dari database
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['nama']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['pesan']}</td>";
                            echo "<td><a href='php/deletepesan.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }

                        // Bebaskan memori hasil query
                        mysqli_free_result($result);

                        // Tutup koneksi
                        mysqli_close($koneksi);
                        ?>
                    </tbody>
                </table>

            </div>

        </div>
    </main>

    <!-- Local Scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>