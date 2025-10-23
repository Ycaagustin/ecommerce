<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | bukatoko</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.google.com/share?selection.family=Quicksand:wght@300..700" rel="stylesheet">
</head>
<body>
    <div id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action="" method="POST">
        <input type="text" name="user" placeholder="Username" class="input-control">
        <input type="password" name="pass" placeholder="Password" class="input-control">
        <input type="submit" name="submit" placeholder="Login" class="btn">
</form>
        <?php
            if(isset($_POST['submit'])){
                session_start();
                include 'db.php';

                $user = $_POST['user'];
                $pass = $_POST['pass'];

                $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' 
                AND password = '".MD5($pass)."'");
                if(mysqli_num_rows($cek) > 0){
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['id'] = $d->id_admin;
                    echo '<script>window.location="dashboard.php"</script>';
                } else {
                    echo '<script>alert("Username atau Password Anda salah!")</script>';
                }
                
            }
        ?>
    </div>
        </div>
</body>
</html>
