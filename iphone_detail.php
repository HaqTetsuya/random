<?php
include 'php/koneksi.php';
// Query to fetch data
$sql = "SELECT id, nama, spesifikasi, harga FROM iphone";
$result = $koneksi->query($sql);

$images = ["images/iphone/1.png", "images/iphone/2.png", "images/iphone/3.png"];

if ($result->num_rows > 0) {
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        $id = htmlspecialchars($row['id']); 
        $nama = htmlspecialchars($row['nama']);
        $spesifikasi = htmlspecialchars($row['spesifikasi']);
        $harga = htmlspecialchars($row['harga']);
        $image = htmlspecialchars($images[array_rand($images)]);
        ?>
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="box border shadow-sm rounded">
                <div class="img-box text-center">
                    <img src="<?php echo $image; ?>" alt="Image of <?php echo $nama; ?>" class="img-fluid">
                </div>
                <div class="detail-box p-3">
                    <h5 class="text-primary text-truncate">
                        <?php echo $nama; ?>
                    </h5>
                    <p class="text-muted small text-truncate">
                        <?php echo $spesifikasi; ?>
                    </p>
                    <a href="detail.php?id=<?php echo urlencode($id); ?>" class="btn btn-sm btn-outline-primary w-100">
                        <span>
                            Harga: <?php echo $harga; ?>
                        </span>
                        <i class="fa fa-long-arrow-right ms-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php
    }
    echo '</div>';
} else {
    echo '<div class="alert alert-warning text-center">No data available.</div>';
}


$koneksi->close();
?>
