<?php
require_once 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM pesan WHERE id ='$id'";
$query = mysqli_query($koneksi, $sql);
//apabila query pada update data benar
if ($query) {
    header("location:../tabelpesan.php");
} else {
    echo "Data Gagal Dihapus";
}
