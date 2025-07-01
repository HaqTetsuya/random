<?php
include 'php/koneksi.php';

// Query untuk mengambil data dari database
$query = "SELECT * FROM iphone";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style3.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-mobile-alt me-2"></i>
                iPhone Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>
                            Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header p-4">
            <h5 class="mb-0"><i class="fas fa-bars me-2"></i>Menu</h5>
        </div>
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="admin.php">
                        <i class="fas fa-mobile-alt me-3"></i>
                        <span>iPhone Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tabelorder.php">
                        <i class="fas fa-shopping-cart me-3"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tabelpesan.php">
                        <i class="fas fa-envelope me-3"></i>
                        <span>Messages</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">
            <!-- Page Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="page-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h1 class="page-title mb-1">iPhone Products</h1>
                                <p class="text-muted mb-0">Manage your iPhone inventory</p>
                            </div>
                            <a href="tambahiphone.php" class="btn btn-primary btn-lg">
                                <i class="fas fa-plus me-2"></i>Add New Product
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stats-card">
                        <div class="stats-icon bg-primary">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number"><?php echo mysqli_num_rows($result); ?></h3>
                            <p class="stats-label">Total Products</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stats-card">
                        <div class="stats-icon bg-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number">24</h3>
                            <p class="stats-label">Active Orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stats-card">
                        <div class="stats-icon bg-warning">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number">8</h3>
                            <p class="stats-label">Pending</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="stats-card">
                        <div class="stats-icon bg-info">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number">12</h3>
                            <p class="stats-label">Messages</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Table -->
            <div class="row">
                <div class="col-12">
                    <div class="table-card">
                        <div class="table-header">
                            <h5 class="mb-0">Product List</h5>
                            <div class="table-actions">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search products...">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="selectAll">
                                            </div>
                                        </th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Specifications</th>
                                        <th scope="col">Price/Hour</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Reset pointer hasil query
                                    mysqli_data_seek($result, 0);
                                    
                                    // Tampilkan data dari database
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>";
                                        echo "<div class='form-check'>";
                                        echo "<input class='form-check-input' type='checkbox' value='{$row['id']}'>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "<td><span class='badge bg-light text-dark'>#{$row['id']}</span></td>";
                                        echo "<td>";
                                        echo "<div class='product-info'>";
                                        echo "<i class='fas fa-mobile-alt text-primary me-2'></i>";
                                        echo "<strong>{$row['nama']}</strong>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "<td><span class='text-muted'>{$row['spesifikasi']}</span></td>";
                                        echo "<td><span class='price'>Rp " . number_format($row['harga'], 0, ',', '.') . "</span></td>";
                                        echo "<td>";
                                        echo "<div class='action-buttons'>";
                                        echo "<a href='editiphone.php?id=" . $row['id'] . "' class='btn btn-sm btn-outline-primary me-1' title='Edit'>";
                                        echo "<i class='fas fa-edit'></i>";
                                        echo "</a>";
                                        echo "<a href='php/delete.php?id={$row['id']}' class='btn btn-sm btn-outline-danger' title='Delete' onclick='return confirm(\"Are you sure you want to delete this item?\")'>";
                                        echo "<i class='fas fa-trash'></i>";
                                        echo "</a>";
                                        echo "</div>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }

                                    // Bebaskan memori hasil query
                                    mysqli_free_result($result);

                                    // Tutup koneksi
                                    mysqli_close($koneksi);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">Showing 1 to 10 of 50 entries</span>
                                <nav>
                                    <ul class="pagination pagination-sm mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">Previous</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple search functionality (frontend only)
        document.querySelector('input[placeholder="Search products..."]').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Select all checkbox functionality
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
</body>

</html>