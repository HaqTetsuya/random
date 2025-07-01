<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    if (!empty($nama) && !empty($email) && !empty($pesan)) {
        $sql = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

        if (mysqli_query($koneksi, $sql)) {
            header('location:../index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            header('location:../contact.php');
        }
    } else {
        header('location:../contact.php');
    }
} else {
    header('location:../contact.php');
}


mysqli_close($koneksi);
?>
