<?php
require_once 'php/koneksi.php';

// Ambil ID produk dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM barang WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $barang = mysqli_fetch_assoc($result);
    } else {
        echo "Produk tidak ditemukan.";
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Barang</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Font CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body>
    <div class="header_section header_bg">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php"><img src="images/logo2.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="banana.php">Product</a></li>
                        <li class="nav-item active"><a class="nav-link" href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container mt-5">
        <h3 class="text">Form Pemesanan</h3>
        <form action="php/pesanan.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            <div class="form-group">
                <label for="nomor_hp">Nomor HP</label>
                <input type="tel" name="nomor_hp" id="nomor_hp" class="form-control" placeholder="Masukkan nomor HP Anda" required pattern="[0-9]+" title="Hanya boleh angka">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan alamat pengiriman" required></textarea>
            </div>
            <div class="form-group">
                <label for="produk">Produk yang Dipilih</label>
                <input type="text" name="produk" id="produk" class="form-control" value="<?php echo $barang['id']; ?>" hidden>
                <input type="text" name="nama_produk" id="produk" class="form-control" value="<?php echo $barang['nama_produk']; ?>" readonly>
            </div>
            <br>
            <button type="submit" class="btn btn-block" style="background-color: pink;">Pesan Sekarang</button>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>