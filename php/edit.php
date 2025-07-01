<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $spesifikasi = mysqli_real_escape_string($koneksi, $_POST['spesifikasi']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

    if (!empty($id) && !empty($nama) && !empty($spesifikasi) && !empty($harga)) {
        $sql = "UPDATE iphone SET nama='$nama', spesifikasi='$spesifikasi', harga='$harga' WHERE id='$id'";

        if (mysqli_query($koneksi, $sql)) {
            header("Location: ../admin.php");
            exit();
        } else {
            die("Kesalahan dalam eksekusi query: " . mysqli_error($koneksi));
        }
    } else {
        die("Data tidak lengkap. Pastikan semua input diisi.");
    }
} else {
    die("Metode tidak valid.");
}
mysqli_close($koneksi);
?>
