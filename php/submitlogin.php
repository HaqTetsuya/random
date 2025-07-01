<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username =$_POST['username'];
    $password =$_POST['pass'];    
    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($koneksi, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if ($password == $user['password']) {
                header("Location: ../admin.php");
                exit();
            } else {
                die("Password yang dimasukkan salah.");
            }
        } else {
            die("Username tidak ditemukan.");
        }
    } else {
        die("Username dan Password tidak boleh kosong.");
    }
} else {
    die("Metode tidak valid.");
}
mysqli_close($koneksi);
?>
