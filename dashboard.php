<?php
include 'db.php';
?>

<?php
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BananaChips | Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #fef9e6;
            overflow-x: hidden;
        }

        /* ADMIN WRAPPER - Sidebar + Content */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* ========== SIDEBAR (FITUR DI PINGGIR) ========== */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #2d5a2a 0%, #3a6e36 100%);
            color: #fef5e3;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s ease;
            z-index: 100;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.08);
        }

        .sidebar-header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 248, 231, 0.2);
            margin-bottom: 20px;
        }

        .sidebar-header .logo-icon {
            font-size: 45px;
            color: #f5a623;
            margin-bottom: 10px;
        }

        .sidebar-header h3 {
            font-size: 20px;
            font-weight: 700;
            color: #f5a623;
            letter-spacing: 1px;
        }

        .sidebar-header p {
            font-size: 12px;
            opacity: 0.7;
            margin-top: 5px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0 15px;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            color: #fef5e3;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .sidebar-menu li a i {
            width: 22px;
            font-size: 18px;
            color: #f5a623;
        }

        .sidebar-menu li a:hover {
            background: rgba(245, 166, 35, 0.2);
            color: #f5a623;
            transform: translateX(5px);
        }

        .sidebar-menu li.active a {
            background: #f5a623;
            color: #2d5a2a;
        }

        .sidebar-menu li.active a i {
            color: #2d5a2a;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            padding: 20px;
            text-align: center;
            border-top: 1px solid rgba(255, 248, 231, 0.15);
            margin: 0 15px;
            font-size: 11px;
            opacity: 0.6;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 25px 35px;
        }

        /* Top Navbar */
        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 15px 25px;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(90, 143, 76, 0.08);
            margin-bottom: 30px;
            border: 1px solid #f0e6c5;
        }

        .page-title {
            font-size: 22px;
            font-weight: 700;
            color: #5a8f4c;
        }

        .page-title i {
            color: #f5a623;
            margin-right: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info span {
            color: #3a5a35;
            font-weight: 500;
            font-size: 14px;
        }

        .user-info i {
            font-size: 32px;
            color: #f5a623;
            background: #fef5e3;
            padding: 8px;
            border-radius: 50%;
        }

        /* Card Welcome */
        .welcome-card {
            background: linear-gradient(135deg, #ffffff 0%, #fff8e7 100%);
            border-radius: 24px;
            padding: 35px 30px;
            margin-bottom: 30px;
            border: 1px solid #f5e6b8;
            box-shadow: 0 8px 20px rgba(90, 143, 76, 0.08);
        }

        .welcome-card h2 {
            font-size: 28px;
            color: #2d5a2a;
            margin-bottom: 10px;
        }

        .welcome-card h2 span {
            color: #f5a623;
        }

        .welcome-card p {
            color: #6b7a64;
            font-size: 14px;
            margin-top: 8px;
        }

        .welcome-card .banana-icon {
            font-size: 50px;
            opacity: 0.15;
            position: absolute;
            right: 30px;
            margin-top: -40px;
        }

        /* Statistik Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 22px;
            border: 1px solid #f0e6c5;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(90, 143, 76, 0.12);
            border-color: #f5e6b8;
        }

        .stat-icon {
            font-size: 40px;
            color: #f5a623;
            margin-bottom: 15px;
        }

        .stat-card h3 {
            font-size: 28px;
            font-weight: 700;
            color: #2d5a2a;
            margin-bottom: 5px;
        }

        .stat-card p {
            color: #a8b89e;
            font-size: 13px;
            font-weight: 500;
        }

        /* Recent Activity */
        .recent-section {
            background: #ffffff;
            border-radius: 20px;
            padding: 25px;
            border: 1px solid #f0e6c5;
        }

        .recent-section h4 {
            font-size: 18px;
            color: #5a8f4c;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f5e6b8;
        }

        .recent-section h4 i {
            color: #f5a623;
            margin-right: 8px;
        }

        .activity-list {
            list-style: none;
        }

        .activity-list li {
            padding: 12px 0;
            border-bottom: 1px solid #f0e6c5;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #5a6e54;
            font-size: 14px;
        }

        .activity-list li i {
            width: 30px;
            color: #f5a623;
        }

        .activity-list li:last-child {
            border-bottom: none;
        }

        /* Footer */
        .admin-footer {
            margin-top: 40px;
            text-align: center;
            padding: 20px;
            color: #a8b89e;
            font-size: 12px;
            border-top: 1px solid #f0e6c5;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 250px;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .menu-toggle {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 101;
                background: #f5a623;
                color: #2d5a2a;
                padding: 10px 15px;
                border-radius: 10px;
                cursor: pointer;
            }
        }
        
        @media (min-width: 769px) {
            .menu-toggle {
                display: none;
            }
        }

        /* Scrollbar Styling */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: #f5a623;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="admin-wrapper">
  <div class="sidebar">
    <div class="sidebar-header">
        <div class="logo-icon">
            <i class="fas fa-leaf"></i>
        </div>
        <h3>BANANA CHIPS</h3>
        <p>Admin Dashboard</p>
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="dashboard.php">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="dashboard.php?page=profil">
                <i class="fas fa-user-circle"></i>
                <span>Profil</span>
            </a>
        </li>

        <li>
            <a href="dashboard.php?page=kategori">
                <i class="fas fa-tags"></i>
                <span>Data Kategori</span>
            </a>
        </li>

        <li>
            <a href="dashboard.php?page=produk">
                <i class="fas fa-box"></i>
                <span>Data Produk</span>
            </a>
        </li>

        <li>
            <a href="keluar.php">
                <i class="fas fa-sign-out-alt"></i>
                <span>Keluar</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-footer">
        <i class="fas fa-leaf"></i> BananaChips Store <i class="fas fa-leaf"></i>
    </div>
</div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        
        <!-- Top Navbar -->
        <div class="top-navbar">
            <div class="page-title">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </div>
            <div class="user-info">
                <span><i class="fas fa-user"></i> <?php echo $_SESSION['a_global']->admin_name ?></span>
                <i class="fas fa-user-circle"></i>
            </div>
        </div>

        <!-- Welcome Card -->
        <div class="welcome-card" style="position: relative;">
            <h2> Selamat Datang, <span><?php echo $_SESSION['a_global']->admin_name ?></span>!</h2>
            <p>Selamat datang di dashboard admin BananaChips Store. Kelola produk, kategori, dan toko Anda dengan mudah.</p>
           
        </div>

        <!-- Statistik Cards -->
        <div class="stats-grid">
            <?php
            // Hitung total produk
            $query_produk = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_produk");
            $total_produk = mysqli_fetch_assoc($query_produk);
            
            // Hitung total kategori
            $query_kategori = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_kategori");
            $total_kategori = mysqli_fetch_assoc($query_kategori);
            
            // Hitung produk aktif
            $query_aktif = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_produk WHERE produk_status = 1");
            $total_aktif = mysqli_fetch_assoc($query_aktif);
            ?>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-box"></i>
                </div>
                <h3><?php echo number_format($total_produk['total']) ?></h3>
                <p>Total Produk</p>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <h3><?php echo number_format($total_kategori['total']) ?></h3>
                <p>Total Kategori</p>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3><?php echo number_format($total_aktif['total']) ?></h3>
                <p>Produk Aktif</p>
            </div>
            
        </div>

        <!-- Recent Activity -->
        <div class="recent-section">
            <h4><i class="fas fa-clock"></i> Aktivitas Terbaru</h4>
            <ul class="activity-list">
                <li><i class="fas fa-plus-circle"></i> Tambah produk baru baru saja</li>
                <li><i class="fas fa-edit"></i> Update data kategori</li>
                <li><i class="fas fa-shopping-cart"></i> Ada pesanan masuk</li>
                <li><i class="fas fa-user"></i> Admin <?php echo $_SESSION['a_global']->admin_name ?> login</li>
                <li><i class="fas fa-chart-line"></i> Trafik pengunjung meningkat 15%</li>
            </ul>
        </div>

        <!-- Footer -->
        <div class="admin-footer">
            <small>Copyright &copy; 2025 - BananaChips Store. All rights reserved. 🍌</small>
        </div>
    </div>
</div>

<!-- Mobile menu toggle (optional) -->
<div class="menu-toggle" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</div>

<script>
    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('active');
    }
</script>

</body>
</html>