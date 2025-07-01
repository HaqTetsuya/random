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
    <title>Admin Dashboard - iPhone Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #6366f1;
            --sidebar-bg: #1f2937;
            --sidebar-hover: #374151;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar Styling */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: var(--primary-color) !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--secondary-color) !important;
            transform: translateY(-1px);
        }

        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            top: 76px;
            left: 0;
            height: calc(100vh - 76px);
            width: 280px;
            background: var(--sidebar-bg);
            padding: 2rem 0;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar h4 {
            color: white;
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .sidebar .nav-link {
            color: #d1d5db;
            padding: 1rem 2rem;
            border-radius: 0;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar .nav-link:hover {
            background: var(--sidebar-hover);
            color: white;
            border-left-color: var(--primary-color);
            transform: translateX(8px);
        }

        .sidebar .nav-link.active {
            background: var(--primary-color);
            color: white;
            border-left-color: #fff;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            padding: 2rem;
            min-height: calc(100vh - 76px);
            margin-top: 76px;
        }

        .content-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .page-title {
            text-align: center;
            margin-bottom: 2rem;
        }

        .page-title h2 {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .page-title p {
            color: #6b7280;
            font-size: 1.1rem;
        }

        /* Button Styling */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(245, 158, 11, 0.3);
        }

        .btn-warning:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.4);
        }

        /* Table Styling */
        .table-container {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-top: 2rem;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            font-weight: 600;
            padding: 1.2rem 1rem;
            border: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 500;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background: rgba(79, 70, 229, 0.05);
            transform: scale(1.01);
        }

        /* Stats Cards */
        .stats-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        .stats-card .icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: white;
        }

        .stats-card h3 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stats-card p {
            color: #6b7280;
            margin: 0;
        }

        /* Action Buttons Container */
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .main-content {
                margin-left: 0;
            }

            .content-card {
                margin: 1rem;
                padding: 1rem;
            }

            .page-title h2 {
                font-size: 1.8rem;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            font-size: 1.5rem;
            box-shadow: 0 4px 20px rgba(79, 70, 229, 0.3);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .fab:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 30px rgba(79, 70, 229, 0.4);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-mobile-alt me-2"></i>iPhone Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-sign-out-alt me-1"></i>Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4><i class="fas fa-cog me-2"></i>MENU</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="admin.php">
                    <i class="fas fa-mobile-alt"></i>
                    Tabel iPhone
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tabelorder.php">
                    <i class="fas fa-shopping-cart"></i>
                    Tabel Order
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tabelpesan.php">
                    <i class="fas fa-envelope"></i>
                    Tabel Pesan
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">
            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="stats-card">
                        <div class="icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3><?php echo mysqli_num_rows($result); ?></h3>
                        <p>Total iPhone Models</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card">
                        <div class="icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Active</h3>
                        <p>System Status</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card">
                        <div class="icon" style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Admin</h3>
                        <p>Current User</p>
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="content-card">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="page-title">
                        <h2><i class="fas fa-mobile-alt me-3"></i>TABEL PRODUK</h2>
                        <p>Manage your iPhone inventory</p>
                    </div>
                    <a href="tambahiphone.php" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Product
                    </a>
                </div>

                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag me-2"></i>ID</th>
                                <th><i class="fas fa-mobile-alt me-2"></i>Nama</th>
                                <th><i class="fas fa-cogs me-2"></i>Spesifikasi</th>
                                <th><i class="fas fa-dollar-sign me-2"></i>Harga/Jam</th>
                                <th><i class="fas fa-tools me-2"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Reset pointer untuk mengulang data
                            mysqli_data_seek($result, 0);
                            
                            // Tampilkan data dari database
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td><span class='badge bg-primary'>{$row['id']}</span></td>";
                                echo "<td><strong>{$row['nama']}</strong></td>";
                                echo "<td class='text-muted'>{$row['spesifikasi']}</td>";
                                echo "<td><span class='text-success fw-bold'>Rp " . number_format($row['harga'], 0, ',', '.') . "</span></td>";
                                echo "<td>";
                                echo "<div class='action-buttons'>";
                                echo "<a href='editiphone.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm' title='Edit'>";
                                echo "<i class='fas fa-edit'></i>";
                                echo "</a>";
                                echo "<a href='php/delete.php?id={$row['id']}' class='btn btn-danger btn-sm' title='Delete' onclick='return confirm(\"Are you sure you want to delete this item?\")'>";
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
            </div>
        </div>
    </main>

    <!-- Floating Action Button -->
    <button class="fab" onclick="window.location.href='tambahiphone.php'" title="Add New Product">
        <i class="fas fa-plus"></i>
    </button>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth scrolling and animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate table rows on load
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    row.style.transition = 'all 0.5s ease';
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Add loading state to buttons
            const deleteButtons = document.querySelectorAll('.btn-danger');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (confirm('Are you sure you want to delete this item?')) {
                        this.innerHTML = '<div class="loading"></div>';
                        this.disabled = true;
                    } else {
                        e.preventDefault();
                    }
                });
            });

            // Sidebar active state management
            const currentPage = window.location.pathname.split('/').pop();
            const sidebarLinks = document.querySelectorAll('.sidebar .nav-link');
            sidebarLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === currentPage) {
                    link.classList.add('active');
                }
            });
        });

        // Add hover effects to stats cards
        const statsCards = document.querySelectorAll('.stats-card');
        statsCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>

</html>