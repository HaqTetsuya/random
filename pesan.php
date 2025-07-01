<?php
require_once 'php/koneksi.php';

// Ambil ID produk dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM iphone WHERE id = '$id'";
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
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Rental Iphone</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style2.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.php">
                        <span>
                            Rental Iphone
                        </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ">
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php"> About</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="service.php">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                        <div class="quote_btn-container">
                            <a href="login.php" class="quote_btn">
                                Login
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
    </div>

    <!-- service section -->
    <section class="service_section layout_padding">
        <div class="container mt-5">
            <?php if (!empty($message)) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
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
                    <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan alamat rumah" required></textarea>
                </div>
                <div class="form-group">
                    <label for="produk">Produk yang Dipilih</label>
                    <input type="text" name="produk" id="produk" class="form-control" value="<?php echo $barang['id']; ?>" hidden>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?php echo $barang['nama']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="harga">Harga per Jam</label>
                    <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $barang['harga']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="lama_sewa">Lama Sewa</label>
                    <div class="input-group">
                        <input type="number" name="lama_sewa_value" id="lama_sewa_value" class="form-control" placeholder="Masukkan lama sewa" min="1" required>
                        <select name="lama_sewa_unit" id="lama_sewa_unit" class="form-control">
                            <option value="jam">Jam</option>
                            <option value="hari">Hari</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="text" name="total_harga" id="total_harga" class="form-control" readonly>
                </div>

                <!-- Input hidden untuk mengirim lama sewa dalam jam -->
                <input type="hidden" name="lama_sewa" id="lama_sewa">

                <br>
                <button type="submit" class="btn btn-block" style="background-color: pink;">Pesan Sekarang</button>
            </form>
        </div>
    </section>
    <!-- end service section -->


    <div class="footer_container">
        <!-- info section -->

        <section class="info_section ">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 ">
                        <div class="info_detail">
                            <h4>
                                Rental Iphone
                            </h4>
                            <p>
                                Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 mx-auto">
                        <div class="info_link_box">
                            <h4>
                                Links
                            </h4>
                            <div class="info_links">
                                <a class="" href="index.php">
                                    Home
                                </a>
                                <a class="" href="about.php">
                                    About
                                </a>
                                <a class="" href="service.php">
                                    Services
                                </a>
                                <a class="" href="contact.php">
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-0 ml-auto">
                        <div class="info_contact">
                            <h4>
                                Address
                            </h4>
                            <div class="contact_link_box">
                                <a href="">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>
                                        Location
                                    </span>
                                </a>
                                <a href="">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span>
                                        Call +01 1234567890
                                    </span>
                                </a>
                                <a href="">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span>
                                        demo@gmail.com
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="info_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end info section -->

        <!-- footer section -->
        <footer class="footer_section">
            <div class="container">
                <p>
                    Rental Iphone
                </p>
            </div>
        </footer>
        <!-- footer section -->
    </div>

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <script src="js/custom2.js"></script>
    <!-- Google Map -->
    <!-- End Google Map -->
    <script>
        const lamaSewaValue = document.getElementById('lama_sewa_value');
        const lamaSewaUnit = document.getElementById('lama_sewa_unit');
        const lamaSewaInput = document.getElementById('lama_sewa');
        const hargaPerJam = parseFloat(document.getElementById('harga').value); // Harga dari PHP
        const totalHarga = document.getElementById('total_harga');

        // Fungsi untuk menghitung total harga
        function updateTotalHarga() {
            const value = parseInt(lamaSewaValue.value) || 0;
            const unit = lamaSewaUnit.value;
            let totalJam = 0;

            if (unit === 'hari') {
                totalJam = value * 24; // Konversi hari ke jam
            } else {
                totalJam = value; // Tetap dalam jam
            }

            // Update hidden input lama_sewa dan total harga
            lamaSewaInput.value = totalJam;
            totalHarga.value = (totalJam * hargaPerJam);
        }

        // Event listener untuk memperbarui total harga saat input berubah
        lamaSewaValue.addEventListener('input', updateTotalHarga);
        lamaSewaUnit.addEventListener('change', updateTotalHarga);
    </script>

</body>

</html>