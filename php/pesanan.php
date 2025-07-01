<?php
require_once 'koneksi.php';

$id_barang = $_POST['produk'];
$nama = $_POST['nama'];
$nomor_hp = $_POST['nomor_hp'];
$alamat = $_POST['alamat'];
$lama_sewa = $_POST['lama_sewa'];
$harga_total = $_POST['total_harga'];


// Masukkan data ke tabel order
$sql = "INSERT INTO orderan (`id_barang`, `nama`, `nomor_hp`, `alamat`, `harga_total`, `lama_sewa`)
        VALUES ('$id_barang', '$nama', '$nomor_hp', '$alamat', '$harga_total', '$lama_sewa')";

if ($koneksi->query($sql) === TRUE) {
    echo "Pesanan berhasil disimpan!";
    header('location:../index.php');
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
