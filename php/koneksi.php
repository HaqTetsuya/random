<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "uas";
$koneksi = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
if (!$koneksi) {
    die("Gagal terhubung dengan database" . mysqli_connect_error());
}
