<?php
session_start();
include 'db.php';
?>
   <?php
               
                   if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $cek = mysqli_query($conn, "SELECT * FROM tb_admin 
    WHERE username = '".$user."' 
    AND password = '".$pass."'");

    if(mysqli_num_rows($cek) > 0){
        $d = mysqli_fetch_object($cek);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d->id_admin;

        header("Location: dashboard.php");
        exit;
    } else {
        echo '<script>alert("Username atau Password Anda salah!")</script>';
    }
}
            ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | BananaChips Admin</title>
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
            background: linear-gradient(135deg, #fef9e6 0%, #fff8e7 30%, #f5f0e0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Decorative Banana Elements */
        body::before {
            position: absolute;
            font-size: 180px;
            opacity: 0.08;
            top: -80px;
            right: -60px;
            transform: rotate(15deg);
            pointer-events: none;
        }

        body::after {
            position: absolute;
            font-size: 150px;
            opacity: 0.06;
            bottom: -60px;
            left: -60px;
            transform: rotate(-10deg);
            pointer-events: none;
        }

        /* Floating bananas decoration */
        .banana-deco-1 {
            position: absolute;
            top: 15%;
            left: 5%;
            font-size: 45px;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
            pointer-events: none;
        }

        .banana-deco-2 {
            position: absolute;
            bottom: 15%;
            right: 5%;
            font-size: 55px;
            opacity: 0.1;
            animation: float 8s ease-in-out infinite reverse;
            pointer-events: none;
        }

        .banana-deco-3 {
            position: absolute;
            top: 40%;
            right: 8%;
            font-size: 35px;
            opacity: 0.08;
            animation: float 7s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        #bg-login {
            width: 100%;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .box-login {
            max-width: 450px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 32px;
            padding: 50px 42px;
            box-shadow: 0 25px 50px rgba(90, 143, 76, 0.15), 
                        0 8px 20px rgba(0, 0, 0, 0.08),
                        inset 0 1px 0 rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(245, 166, 35, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .box-login:hover {
            transform: translateY(-6px);
            box-shadow: 0 30px 55px rgba(90, 143, 76, 0.2);
            border-color: rgba(245, 166, 35, 0.5);
        }

        /* Logo/Brand */
        .brand-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .brand-logo i {
            font-size: 48px;
            color:  #5a8f4c;
            background: linear-gradient(135deg,  #5a8f4c,  #5a8f4c);
            -webkit-background-clip: text;
            background-clip: text;
            color:  #5a8f4c;
        }

        .brand-logo span {
            font-size: 28px;
            font-weight: 800;
            background: linear-gradient(135deg, #f5a623, #d48a1a);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            letter-spacing: -0.5px;
        }

        .box-login h2 {
            text-align: center;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #5a8f4c;
            letter-spacing: -0.3px;
        }

        .subtitle {
            text-align: center;
            font-size: 13px;
            color: #a8b89e;
            margin-bottom: 30px;
            font-weight: 500;
        }

        /* Decorative line under title */
        .box-login h2::after {
            display: block;
            font-size: 18px;
            letter-spacing: 4px;
            margin: 8px auto 0;
            color: #f5a623;
            opacity: 0.7;
        }

        .input-control {
            width: 100%;
            padding: 14px 18px 14px 48px;
            margin: 10px 0;
            border: 2px solid #e8dcb0;
            border-radius: 50px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            background: #fefcf5;
            transition: all 0.3s ease;
            color: #3a5a35;
        }

        /* Input wrapper for icons */
        .input-wrapper {
            position: relative;
            width: 100%;
        }

        .input-wrapper i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #c0b28a;
            font-size: 18px;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .input-control:focus {
            outline: none;
            border-color: #f5a623;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(245, 166, 35, 0.15);
        }

        .input-control:focus + i {
            color: #f5a623;
        }

        .btn {
            width: 100%;
            padding: 14px;
            margin-top: 25px;
            background: linear-gradient(135deg, #f5a623 0%, #e8951a 100%);
            color: #2d3e2b;
            border: none;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(245, 166, 35, 0.35);
            letter-spacing: 0.5px;
        }

        .btn:hover {
            background: linear-gradient(135deg, #e8951a 0%, #d48a1a 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(245, 166, 35, 0.45);
            color: #1a3a17;
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Additional small text */
        .login-footer {
            text-align: center;
            margin-top: 28px;
            font-size: 12px;
            color: #a8b89e;
        }

        .login-footer a {
            color: #5a8f4c;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-footer a:hover {
            color: #f5a623;
            text-decoration: underline;
        }

        /* Banana leaf decoration */
        .leaf-icon {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #c0b28a;
            letter-spacing: 6px;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .box-login {
                padding: 35px 25px;
                margin: 0 15px;
            }
            
            .box-login h2 {
                font-size: 26px;
            }
            
            .input-control {
                padding: 12px 16px 12px 44px;
                font-size: 13px;
            }

            .brand-logo span {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>



<div id="bg-login">
    <div class="box-login">
        <div class="brand-logo">
            <i class="fas fa-leaf"></i>
        </div>
        <h2>Welcome Back</h2>
        <div class="subtitle">Login to your admin account</div>
        <form action="" method="POST">
            <div class="input-wrapper">
                <i class="fas fa-user"></i>
                <input type="text" name="user" placeholder="Username" class="input-control" autocomplete="off">
            </div>
            <div class="input-wrapper">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" placeholder="Password" class="input-control">
            </div>
            <input type="submit" name="submit" value="Login →" class="btn">
        </form>
       
    </div>
</div>
</body>
</html>