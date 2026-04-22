<?php
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_addres FROM tb_admin WHERE id_admin = 1");
$a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BananaChips Store</title>

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
    color: #2d3e2b;
}

a {
    text-decoration: none;
    color: inherit;
}

/* TOP BAR - Banana Theme */
.top-bar {
    background: #5a8f4c;
    color: #fff8e7;
    padding: 8px 60px;
    display: flex;
    justify-content: space-between;
    font-size: 12px;
}

.top-bar-left span {
    margin-right: 20px;
}

.top-bar-left i, .top-bar-right i {
    margin-right: 5px;
    font-size: 11px;
}

.top-bar-right a {
    color: #fff8e7;
    margin-left: 15px;
    transition: opacity 0.2s;
}

.top-bar-right a:hover {
    opacity: 0.8;
}

/* NAVBAR */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 60px;
    background: #ffffff;
    box-shadow: 0 2px 12px rgba(90, 143, 76, 0.08);
    position: sticky;
    top: 0;
    z-index: 100;
}

.logo {
    font-size: 24px;
    font-weight: 800;
    letter-spacing: 1px;
    color: #f5a623;
    display: flex;
    align-items: center;
    gap: 8px;
}

.logo i {
    font-size: 28px;
    color: #5a8f4c;
}

.logo span {
    color: #5a8f4c;
    font-weight: 600;
}

.menu {
    list-style: none;
    display: flex;
    gap: 28px;
}

.menu li a {
    text-decoration: none;
    color: #3a5a35;
    font-weight: 500;
    font-size: 14px;
    transition: color 0.2s;
}

.menu li a:hover {
    color: #f5a623;
}

.nav-icons {
    display: flex;
    gap: 22px;
    color: #3a5a35;
    font-size: 18px;
    cursor: pointer;
}

.nav-icons i {
    transition: color 0.2s;
}

.nav-icons i:hover {
    color: #f5a623;
}

/* SEARCH SECTION */
.search-section {
    background: #ffffff;
    padding: 15px 60px;
    border-bottom: 1px solid #f0e6c5;
}

.search-box {
    max-width: 550px;
    margin: 0 auto;
    position: relative;
}

.search-box i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #c0b28a;
    font-size: 14px;
}

.search-box input {
    width: 100%;
    padding: 12px 20px 12px 45px;
    border-radius: 50px;
    border: 1px solid #e8dcb0;
    background: #fefcf5;
    font-size: 14px;
    transition: all 0.2s;
}

.search-box input:focus {
    outline: none;
    border-color: #f5a623;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(245, 166, 35, 0.1);
}

.search-box input[type="submit"] {
    position: absolute;
    right: 5px;
    top: 5px;
    width: auto;
    background: #f5a623;
    color: #2d3e2b;
    border: none;
    padding: 7px 22px;
    border-radius: 50px;
    cursor: pointer;
    font-weight: 600;
    font-size: 12px;
    transition: background 0.2s;
}

.search-box input[type="submit"]:hover {
    background: #e8951a;
}

/* BANNER */
.banner-container {
    padding: 30px 60px 15px 60px;
}

.banner-img {
    width: 100%;
    border-radius: 28px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(90, 143, 76, 0.12);
}

.banner-img img {
    width: 100%;
    display: block;
}

/* SECTION HEADER */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    padding: 20px 60px 10px 60px;
    border-bottom: 2px solid #f5e6b8;
    margin-top: 20px;
}

.section-header h3 {
    font-size: 20px;
    font-weight: 700;
    color: #5a8f4c;
    letter-spacing: -0.3px;
    position: relative;
}

.section-header h3:before {
    margin-right: 8px;
    font-size: 18px;
}

.section-header a {
    font-size: 13px;
    color: #f5a623;
    font-weight: 600;
    transition: color 0.2s;
}

.section-header a:hover {
    color: #d48a1a;
    text-decoration: underline;
}

/* GRID */
.box {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    gap: 25px;
    padding: 25px 60px;
}

/* CARD - Banana Chips Style */
.col-4 {
    width: 240px;
    background: #ffffff;
    border-radius: 20px;
    overflow: hidden;
    transition: 0.3s ease;
    box-shadow: 0 4px 12px rgba(90, 143, 76, 0.08);
    position: relative;
    border: 1px solid #f0e6c5;
}

.col-4:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 28px rgba(245, 166, 35, 0.12);
    border-color: #f5e6b8;
}

.badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: #f5a623;
    color: #2d3e2b;
    font-size: 10px;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 30px;
    z-index: 2;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.badge-soldout {
    background: #a8c99e;
    color: #2d3e2b;
}

.col-4 img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    background: #fef5e3;
}

.product-info {
    padding: 14px 12px 16px 12px;
}

.nama {
    font-weight: 600;
    font-size: 14px;
    color: #3a5a35;
    margin-bottom: 6px;
    line-height: 1.4;
}

.price-row {
    display: flex;
    align-items: baseline;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 8px;
}

.harga {
    font-weight: 700;
    font-size: 15px;
    color: #f5a623;
}

.harga-old {
    font-size: 12px;
    color: #c0b28a;
    text-decoration: line-through;
}

.save {
    font-size: 11px;
    color: #5a8f4c;
    font-weight: 600;
    background: #eaf5e6;
    display: inline-block;
    padding: 2px 8px;
    border-radius: 12px;
    margin-top: 5px;
}

.colors {
    font-size: 11px;
    color: #a8b89e;
    margin-top: 8px;
    letter-spacing: 0.3px;
}

.extra-discount {
    background: #f5a623;
    color: #2d3e2b;
    font-size: 10px;
    font-weight: 700;
    display: inline-block;
    padding: 3px 10px;
    border-radius: 16px;
    margin-top: 8px;
}

/* Social Proof */
.social-proof {
    background: #ffffff;
    margin: 10px 60px 25px 60px;
    padding: 12px 24px;
    border-radius: 60px;
    font-size: 13px;
    color: #6b7a64;
    border: 1px solid #f0e6c5;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.02);
}

.social-proof i {
    color: #f5a623;
    font-size: 14px;
}

.social-proof span {
    font-weight: 600;
    color: #5a8f4c;
}

/* KATEGORI - Circle style */
.kategori-section {
    background-color: #f7f1e3
    margin: 20px 60px;
    border-radius: 32px;
    padding: 20px 0;
}


.kategori-title {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: #5a8f3d;
    margin-bottom: 30px;
}

.kategori-title:before {
    font-size: 16px;
}

.kategori-box {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
}

.col-5 {
    width: 90px;
    text-align: center;
    transition: 0.2s;
}

.col-5:hover {
    transform: translateY(-4px);
}

.col-5 img {
    background: #fef5e3;
    padding: 14px;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    object-fit: contain;
    transition: background 0.2s;
}

.col-5:hover img {
    background: #f5e6b8;
}

.col-5 p {
    margin-top: 10px;
    font-size: 12px;
    font-weight: 500;
    color: #5a6e54;
}

/* FOOTER */
.footer {
    margin-top: 60px;
    background: #2d5a2a;
    color: #fef5e3;
    padding: 40px 60px 25px 60px;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 40px;
    margin-bottom: 30px;
}

.footer-col h4 {
    color: #f5a623;
    font-size: 16px;
    margin-bottom: 15px;
    font-weight: 700;
}

.footer-col p {
    font-size: 13px;
    line-height: 1.7;
    margin-bottom: 8px;
    opacity: 0.9;
}

.footer-col i {
    width: 24px;
    color: #f5a623;
}

.footer-bottom {
    text-align: center;
    padding-top: 25px;
    border-top: 1px solid #4a7a45;
    font-size: 12px;
    opacity: 0.8;
}

/* Responsive */
@media (max-width: 768px) {
    .navbar, .top-bar, .search-section, .banner-container, .section-header, .box, .kategori-section, .footer {
        padding-left: 20px;
        padding-right: 20px;
    }
    
    .menu {
        display: none;
    }
    
    .col-4 {
        width: calc(50% - 12px);
    }
    
    .col-4 img {
        height: 220px;
    }
    
    .kategori-box {
        gap: 20px;
    }
}

/* Banana Chips decorative element */
.banana-bg {
    position: fixed;
    bottom: 20px;
    right: 20px;
    opacity: 0.03;
    pointer-events: none;
    font-size: 100px;
    z-index: -1;
}

html {
    scroll-behavior: smooth;
}

/* Section umum */
.section {
    padding: 60px 5%;
    background-color: #f7f1e3; /* samakan background */
}

/* Judul seperti kategori */
.section-title {
    text-align: center;
    color: #5a8f3d; /* hijau */
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
}

/* Deskripsi */
.section-desc {
    text-align: center;
    color: #555;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

/* Container produk */
.produk-list {
    display: flex;
    justify-content: center;
    gap: 25px;
    flex-wrap: wrap;
    margin-top: 30px;
}

/* Card produk */
.produk-card {
    background: #fff;
    border-radius: 15px;
    padding: 15px;
    width: 200px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    transition: 0.3s;
}

.produk-card:hover {
    transform: translateY(-5px);
}

/* Gambar */
.produk-card img {
    width: 100%;
    border-radius: 10px;
}

/* Nama produk */
.produk-card h3 {
    font-size: 16px;
    margin: 10px 0;
    color: #333;
}

/* Harga */
.harga {
    color: #5a8f3d;
    font-weight: bold;
    margin-bottom: 10px;
}

/* Tombol */
.btn-beli {
    display: inline-block;
    padding: 8px 15px;
    background-color: #5a8f3d;
    color: #fff;
    text-decoration: none;
    border-radius: 20px;
    font-size: 14px;
}

.btn-beli:hover {
    background-color: #4a7c32;
}

/* Box utama */
.tentang-box {
    display: flex;
    align-items: center;
    gap: 40px;
    background: #ffffff;
    padding: 30px;
    border-radius: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

/* Foto */
.tentang-img img {
    width: 300px;
    border-radius: 20px;
}

/* Text */
.tentang-text h2 {
    color: #5a8f3d;
    margin-bottom: 10px;
}

.tentang-text p {
    color: #555;
    line-height: 1.6;
}

/* Responsive (HP) */
@media (max-width: 768px) {
    .tentang-box {
        flex-direction: column;
        text-align: center;
    }

    .tentang-img img {
        width: 100%;
    }
}

.produk-action {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 10px;
}

.btn-beli {
    background-color: #5a8f3d;
    color: #fff;
    padding: 8px 12px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 13px;
}

.btn-keranjang {
    background-color: #eee;
    color: #333;
    padding: 8px 12px;
    border-radius: 20px;
    text-decoration: none;
    font-size: 13px;
}

</style>

</head>
<body>

<div class="banana-bg">🍌</div>

<!-- TOP BAR -->
<div class="top-bar">
    <div class="top-bar-left">
        <span><i class="fas fa-leaf"></i> 100% NATURAL</span>
    </div>
    
</div>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">
        <i class="fas fa-leaf"></i>
        BANANA CHIPS
    </div>

    <ul class="menu">
        <li><a href="#home">HOME</a></li>
        <li><a href="#tentang">TENTANG KAMI</a></li>
        <li><a href="#produk">PRODUK</a></li>
        <li><a href="#kontak">KONTAK</a></li>
    </ul>

    <div class="nav-icons">
        <i class="fas fa-search"></i>
        <i class="far fa-user"></i>
        <i class="fas fa-shopping-cart"></i>
    </div>
</div>

<!-- SEARCH -->
<div class="search-section">
    <div class="search-box">
        <i class="fas fa-search"></i>
        <form action="produk.php">
            <input type="text" name="search" placeholder="Cari produk banana chips...">
            <input type="submit" value="Cari">
        </form>
    </div>
</div>

<!-- HOME / BANNER -->
<div id="home" class="banner-container">
    <div class="banner-img">
        <img src="img/benner.png" alt="Banner Banana Chips">
    </div>
</div>

<div id="tentang" class="section">
    <div class="tentang-box">

        <!-- FOTO -->
        <div class="tentang-img">
            <img src="produk/ckl200.jpg" alt="Tentang Kami">
        </div>

        <!-- TEXT -->
        <div class="tentang-text">
            <h2> TENTANG KAMI</h2>
            <p>
                Kami menyediakan keripik pisang berkualitas dengan berbagai varian rasa 
                yang renyah, gurih, dan dibuat dari pisang pilihan terbaik. 
                Cocok untuk camilan sehari-hari maupun oleh-oleh.
            </p>
        </div>

    </div>
</div>

<!-- KATEGORI -->

    <div class="kategori-title">KATEGORI</div>
    <div class="kategori-box">
        <?php
        $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY kategori_id DESC");
        if(mysqli_num_rows($kategori) > 0){
            while($k = mysqli_fetch_array($kategori)){
        ?>
        <a href="produk.php?kat=<?php echo $k['kategori_id'] ?>">
            <div class="col-5">
                <img src="img/icon.png" width="50px">
                <p><?php echo $k['kategori_name'] ?></p>
            </div>
        </a>
        <?php }}else{ ?>
            <p>Kategori tidak ada</p>
        <?php } ?>
    </div>
</div>

<!-- NEW ARRIVAL SECTION -->
<div id="produk" class="section produk">
    <h2 class="section-title">🍌 PRODUK KAMI</h2>
    <p class="section-desc">Pilihan keripik pisang terbaik dengan berbagai varian rasa.</p>

    <div class="produk-list">

        <!-- ITEM PRODUK -->
        

       <div class="produk-list">

<?php
$produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_status = 1 ORDER BY produk_id DESC LIMIT 8");

if(mysqli_num_rows($produk) > 0){
while($p = mysqli_fetch_array($produk)){
?>

    <div class="produk-card">

        <img src="produk/<?php echo $p['produk_foto']; ?>">

        <h3><?php echo substr($p['produk_nama'], 0, 25); ?></h3>

        <p class="harga">
            Rp <?php echo number_format($p['produk_harga']); ?>
        </p>

        <div class="produk-action">
            <a href="detail-produk.php?id=<?php echo $p['produk_id']; ?>" class="btn-beli">
                Beli
            </a>

            <a href="keranjang.php?id=<?php echo $p['produk_id']; ?>" class="btn-keranjang">
                + Keranjang
            </a>
        </div>

    </div>

<?php }} else { ?>
    <p>Produk tidak ada</p>
<?php } ?>

</div>


    </div>
</div>
   

<div id="kontak" class="section">
    <h2>Kontak</h2>
    <p>No WA / alamat...</p>
</div>

<!-- FOOTER -->
<div class="footer">
    <div class="footer-content">
        <div class="footer-col">
            <h4>BANANA CHIPS</h4>
            <p><i class="fas fa-map-marker-alt"></i> <?php echo $a->admin_addres ?></p>
            <p><i class="fas fa-envelope"></i> <?php echo $a->admin_email ?></p>
            <p><i class="fas fa-phone"></i> <?php echo $a->admin_telp ?></p>
        </div>
        <div class="footer-col">
            <h4>Informasi</h4>
            <p>Tentang Kami</p>
            <p>Cara Pemesanan</p>
            <p>Pengiriman</p>
            <p>Kebijakan Privasi</p>
        </div>
        <div class="footer-col">
            <h4>Follow Us</h4>
            <p>Instagram</p>
            <p>Facebook</p>
            <p>TikTok</p>
            <p>YouTube</p>
        </div>
    </div>
    <div class="footer-bottom">
        <small>Copyright &copy; 2025 - BananaChips Store. All rights reserved. 🍌</small>
    </div>
</div>

</body>
</html>