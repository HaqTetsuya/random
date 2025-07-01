<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM barang WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $nama = $row['nama_produk'];
        $harga = $row['harga'];
        $gambar = $row['gambar'];
    } else {
        echo "Record not found!";
        exit();
    }
} else {
    header("Location: ../inventoryTable.php");
    exit();
}
?>