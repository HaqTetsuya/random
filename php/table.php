<?php
include 'koneksi.php';

// Query untuk mengambil data dari database
$query = "SELECT * FROM iphone";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}
?>
<table class="table table-striped table-bordered table-hover mt-4">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Spesifikasi</th>
            <th>Harga/Jam</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Tampilkan data dari database
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['nama']}</td>";
            echo "<td>{$row['spesifikasi']}</td>";
            echo "<td>{$row['harga']}</td>";            
            echo "<td><a href='updateTable.php?id=" . $row['id'] . "' class='btn btn-primary'>Update</a></td>";
            echo "<td><a href='php/deletedata.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }

        // Bebaskan memori hasil query
        mysqli_free_result($result);

        // Tutup koneksi
        mysqli_close($koneksi);
        ?>
    </tbody>
</table>
