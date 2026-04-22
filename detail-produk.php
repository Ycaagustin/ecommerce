<?php
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_addres FROM tb_admin 
    WHERE id_admin = 1");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id ='".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
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
            <input type="text" name="search" placeholder="<?php echo $_GET['search']?>">
            <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
            <input type="submit" name="cari" value="Cari Produk">
        </form>
    </div>
 </div>

 <!-- produk detail -->
  <div class="section">
    <div class="container">
        <h3>Detail Produk</h3>
        <div class="box">
        <div class="col-2">
            <img src="produk/<?php echo $p->produk_foto?>" width="100%" >
        </div>
        <div class="col-2">
            <h3><?php echo $p->produk_nama?></h3>
            <h4>Rp. <?php echo number_format($p->produk_harga)?></h4>
            <p> Deskripsi :<br>
                <?php echo $p->produk_deskripsi ?></p>
                <p>
    <!-- Tombol Midtrans -->
    <a href="checkout.php?id=<?php echo $p->produk_id ?>" class="btn-bayar">
        Bayar Sekarang
    </a>
</p>

<p>
    <!-- Tombol WhatsApp -->
    <a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya tertarik dengan produk <?php echo $p->produk_nama ?>" target="_blank" class="btn-wa">
        Order via WhatsApp
    </a>
</p>
                    <img src="img/download.jpeg" width="50px"></a></p>
        </div>
        </div>
    </div>
  </div>
  <style>
    .btn-bayar {
    display: inline-block;
    padding: 10px 20px;
    background-color: #f4b400;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-bottom: 10px;
}

.btn-wa {
    display: inline-block;
    padding: 10px 20px;
    background-color: #25D366;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}
    </style>

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
