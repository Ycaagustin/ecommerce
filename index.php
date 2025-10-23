<?php
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_addres FROM tb_admin 
    WHERE id_admin = 1");
    $a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bukatoko</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.google.com/share?selection.family=Quicksand:wght@300..700" rel="stylesheet">
</head>
<body>
   <header>
        <div class="container">
        <h1><a href="index.php">Niscare</a></h1>
        <ul>
            <li><a href="produk.php">Produk</a></li>
        </ul>
        </div>
</header>

<!-- search -->
 <div class="search">
    <div class="container">
        <form action="produk.php">
            <input type="text" name="search" placeholder="Cari Produk">
            <input type="submit" name="cari" value="Cari Produk">
        </form>
    </div>
 </div>

 <!-- Tambahkan banner di sini -->
 <div class="slider-banner" style="margin: 20px 0; text-align: center;">
 <div class="slides">
  <img src="img/banner_niscare.png" alt="Banner Promo" style="width: 70%; max-width: 1000px; border-radius: 10px;">
</div>


    <!-- kategori -->
     <div class="section">
        <div class="container">
            <h3>Kategori</h3>
            <div class="box">
                <?php
                   $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY 
                    kategori_id DESC   "); 
                   if(mysqli_num_rows($kategori) > 0){
                        while($k = mysqli_fetch_array($kategori)){
                ?>

                <a href="produk.php?kat=<?php echo $k['kategori_id']?>">
                <div class="col-5">
                    <img src="img/icon.png" width="50px" style="margin-bottom:5px;">
                    <p><?php echo $k['kategori_name']?></p>
                </div>
                <?php }}else{ ?>
                    <p>Kategori tidak ada</p>
                    <?php }?>
            </div>
        </div>
     </div>
    <!-- new produk -->
     <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                <?php
                    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_status = 1 ORDER BY produk_id DESC
                    LIMIT 8");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                ?>
                <a href="detail-produk.php?id=<?php echo $p['produk_id']?>">
                <div class="col-4">
                    <img src="produk/<?php echo $p['produk_foto'] ?>">
                    <p class="nama"><?php echo substr($p['produk_nama'] , 0, 30)?></p>
                    <p class="harga">Rp. <?php echo number_format($p['produk_harga']) ?></p>
                </div>
                <?php } }else {?>
                    <p>Produk tidak ada</p>
                <?php } ?>
            </div>
        </div>
     </div>

     <!-- footer -->
      <div class="footer">
        <div class="container">
        <h4>Alamat</h4>
        <p><?php echo $a->admin_addres ?></p> 
        
        <h4>Email</h4>
        <p><?php echo $a->admin_email ?></p> 

        <h4>No. Hp</h4>
        <p><?php echo $a->admin_telp ?></p> 
            <small>Copyright &copy; 2025 - Niscare</small>
        </div>
      </div>
</body>
</html>
