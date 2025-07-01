<?php
require_once 'koneksi.php';
//Mengambil Data Dari tombol hapus
$id = $_GET['id'];
$sql = "DELETE FROM iphone WHERE id ='$id'";
$query = mysqli_query($koneksi, $sql);
//apabila query pada update data benar
if ($query) {
    header("location:../admin.php");
} else {
    echo "Data Gagal Dihapus";
}
?>

