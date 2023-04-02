<?php
include '../koneksi.php';
if ($_SESSION['status'] = 'login') {
    if ($_SESSION['roles'] = 'Admin') {
        ?>
            <script>
                alert('Minimal Logout dlu!!!!');
                window.location = '../admin/index.php?pesan=logout_dlu';
            </script>
        <?php
    }
    ?>
    <script>
        alert('Silahkan Login Terlebih dahulu!!!!');
        window.location = '../akses/login.php?pesan=belum_login';
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Toko Printer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #fcfcfc;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        nav {
            width: 100%;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #70bda2;
            background-color: #f0fdfb;
        }

        nav h1 {
            font-size: 2em;
            margin-left: 30px;
            color: #016124;
        }

        nav h1 span {
            color: #27915c;
        }

        nav form {
            width: 800px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        nav form::after {
            content: '';
            position: absolute;
            height: calc(100% - 20px);
            width: 10px;
            left: 0;
            background-color: #f06e12;
            border-radius: 5px 0 0 5px;
            z-index: 1;
        }

        nav form input {
            width: calc(100% - 10px);
            height: calc(100% - 20px);
            outline: none;
            border: none;
            font-size: 18px;
            padding: 0 50px 0 20px;
            color: #455045;
        }

        nav form .btn {
            position: absolute;
            height: calc(100% - 20px);
            width: 50px;
            right: 0;
            border: none;
            background-color: #f06e12;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            color: #fcfcfc;
            font-size: 20px;
        }

        nav .login {
            width: 100px;
            height: 40px;
            border: 2px solid #27915c;
            font-size: 15px;
            font-weight: bold;
            color: #016124;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }

        nav a i {
            width: 40px;
            height: 40px;
            border: 2px solid #27915c;
            font-size: 15px;
            font-weight: bold;
            color: #016124;
            margin-right: 30px;
            font-size: 20px;
            padding: 10px 11px;
            border-radius: 5px;
        }

        .hero {
            width: calc(100% - 60px);
            height: 400px;
            margin: 50px auto 0;
            border-radius: 10px;
            background-color: #27915c;
            background: linear-gradient(to top left, );
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            z-index: -2;
        }

        .hero .teks {
            width: 600px;
            height: calc(100% - 100px);
            position: relative;
            z-index: 3;
        }

        .hero .teks::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 100%;
            background-color: #70bda275;
            bottom: -50px;
            border-radius: 0 100% 0 0;
            z-index: -1;
        }

        .hero .teks h1 {
            margin: 30px 0 10px 70px;
            font-size: 2.5em;
            color: #fcfcfc;
        }

        .hero .teks p {
            margin: 20px 0 10px 75px;
            color: #fcfcfc;
        }

        .hero .gambar {
            width: 500px;
            margin-right: 70px;
            height: calc(100% - 100px);
            background-image: url('../imageProduk/contoh.png');
            background-size: 500px;
            background-repeat: no-repeat;
            background-position: -10px 30px;
        }

        .np {
            color: #455045;
            padding: 30px 40px;
        }

        ul .produk {
            width: 100%;
            display: flex;
            align-items: flex-start;
            flex-wrap: wrap;
            flex-flow: row wrap;
            margin: -60px auto 50px;
            padding: 0 10px;
        }

        ul .produk .list-produk {
            width: 200px;
            height: auto;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            margin-left: 18px;
            margin-top: 60px;
        }

        ul .produk .list-produk li:nth-child(1) {
            width: calc(100% - 30px);
            height: 150px;
            margin: 15px auto 10px;
            border: 2px solid #27915c;
            display: grid;
            place-items: center;
            background-color: #f0fdfb;
            border-radius: 10px;
        }

        ul .produk .list-produk li:nth-child(1) img {
            width: 70%;
            height: auto;
        }

        ul .produk .list-produk li:nth-child(2) {
            padding: 5px 17px 10px;
            font-weight: bold;
            font-size: 18px;
        }

        ul .produk .list-produk li:nth-child(3) {
            padding: 0 18px 10px;
            font-weight: bold;
            color: rgba(0, 0, 0, .5);
            font-size: 18px;
        }

        ul .produk .list-produk li:nth-child(4) {
            width: 100%;
            height: 50px;
            margin: 10px 0;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        ul .produk .list-produk li:nth-child(4) a:nth-child(1) {
            padding: 10px 32px;
            border: 2px solid #70bda2;
            border-radius: 5px;
            background-color: #f0fdfb;
            text-align: center;
            color: #27915c;
            /* margin-left: 14px; */
        }

        ul .produk .list-produk li:nth-child(4) a:nth-child(2) {
            border: 2px solid #70bda2;
            border-radius: 5px;
            background-color: #f0fdfb;
            text-align: center;
            color: #27915c;
            padding: 10px 15px;
            /* margin-right: 10px; */
        }
    </style>
</head>

<body>
    <nav>
        <h1>Prin<span>store</span></h1>
        <form action="index.php">
            <input type="text" name="cari" placeholder="Search Produk">
            <button type="submit" class="btn">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
        <div style="display: flex; align-items: center;">
            <div class="login"><?= $_SESSION['nama_lengkap']; ?></div>
            <a href="../akses/logout.php">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </a>
        </div>
    </nav>
    <div class="hero">
        <div class="teks">
            <h1>Printer Berkualitas dan Terjangkau</h1>
            <p>Memiliki Berbagai Jenis Printer yang berkualitas, aman dan terjangkau</p>
        </div>
        <div class="gambar"></div>
    </div>
    <h1 class="np">Product</h1>
    <ul>
        <li class="produk">
            <?php
            if (isset($_GET['cari'])) {
                $cari = $_GET['cari'];
                $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%" . $cari . "%'");
            } else {
                $data = mysqli_query($koneksi, "SELECT * FROM produk");
            }
            $no = 1;
            while ($row = mysqli_fetch_array($data)) {
            ?>
                <ul class="list-produk">
                    <li><img src="../imageProduk/<?= $row['foto']; ?>" alt="" width="70px"></li>
                    <li><?php echo $row['nama_produk']; ?></li>
                    <li><?php echo "Rp. " . number_format($row['harga']) . " ,-" ?></li>
                    <li>
                        <a href="detail.php?id_produk=<?= $row['id_produk']; ?>">Detail</a>
                        <a href="keranjang.php?id_produk=<?= $row['id_produk']; ?>">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <!-- <form action="pesan.php?id_produk=" method="POST">
                        <input type="number" name="qty">
                        <button type="submit" name="beli" onclick="return confirm('Apakah anda ingin memesan?')">Pesan</button>
                        </form> -->
                    </li>
                </ul>
            <?php
            }
            ?>
        </li>
    </ul>
</body>

</html>