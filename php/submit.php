<?php
include 'koneksi.php';
$username = $_POST['username'];
$password1 = $_POST['pass1'];
$password2 = $_POST['pass2'];
$level = 1;
// cek kesamaan password1
if ($password1 == $password2) {
    // mengenkripsi password dengan md5()
    $password1 = ($password1);
    // menyimpan username dan password terenkripsi ke

    $sql = "INSERT INTO user (username, password, level) VALUES ('$username','$password1', '$level')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] == "login";
        header('location:../');
    }
} else {
    echo "Password yang dimasukkan tidak sama ";
    echo "<a href='../register.php'> Regiatrasi Ulang</a>";
}
