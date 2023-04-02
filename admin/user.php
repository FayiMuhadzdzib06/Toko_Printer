<?php
session_start(); //jika ingin menggunakan session selalu awali dengan session_start()
if ($_SESSION['status'] != 'login') {
?>
    <script>
        alert('Silahkan Login Terlebih dahulu!!!!');
        window.location = '../akses/login.php?pesan=belum_login';
    </script>
<?php
}
if ($_SESSION['roles'] != 'Admin') {
?>
    <script>
        alert('Anda Tidak bisa akses halaman Admin!!!!');
        window.location = '../user/index.php?pesan=hanya_elit_global_yg_bisa_masukk';
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
    <title>Halaman Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: 100%;
            height: 100%;
            display: grid;
            grid-template-areas: 'sidebar main';
            grid-template-columns: 300px 1fr;
            grid-template-rows: 649px;
        }

        .sidebar {
            grid-area: 'sidebar';
            background-color: #f0fdfb;
        }

        .sidebar h1 {
            margin: 20px 0 40px 20px;
            color: #016124;
            font-size: 2.5em;
        }

        .sidebar h1 span {
            color: #27915c;
            font-weight: normal;
        }

        .sidebar a:nth-child(3) li {
            margin-top: 10px;
            color: #455045;
            background-color: #70bda2;
        }

        .sidebar a:hover li {
            background-color: #70bda2;
            color: #455045;
        }

        .sidebar li {
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px auto;
            font-weight: bold;
            color: rgba(0, 0, 0, .2);
            transition: .3s;
        }

        .main {
            grid-area: 'main';
        }

        .main .nav {
            width: 100%;
            height: 100px;
            border-bottom: 3px solid rgba(0, 0, 0, .1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .main h1 {
            padding-left: 20px;
            color: #016124;
        }

        .main h1 span {
            color: #27915c;
        }

        .main .nameAdmin {
            width: 180px;
            height: 50px;
            background-color: #f0fdfb;
            border: 2px solid #70bda2;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin-right: 30px;
        }

        .main .nameAdmin .foto {
            width: 40px;
            height: 40px;
        }

        .main h2 {
            margin: 20px 0 30px 25px;
            color: #455045;
        }

        .main .tp {
            padding: 6px 20px;
            margin-left: 25px;
            border-radius: 5px;
            color: #016124;
            background-color: #f0fdfb;
            border: 2px solid #016124;
            font-weight: bold;
            font-size: 15px;
        }

        .main table {
            width: calc(100% - 50px);
            margin: 25px auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <ul class="sidebar">
            <h1>Prin<span>Store</span></h1>
            <a href="index.php">
                <li>Data Produk</li>
            </a>
            <a href="">
                <li>Data User</li>
            </a>
            <a href="transaksi.php">
                <li>Data Transaksi</li>
            </a>
            <a href="../akses/logout.php">
                <li>Logout</li>
            </a>
        </ul>
        <div class="main">
            <div class="nav">
                <h1>Welcome <span>Admin</span></h1>
                <div class="nameAdmin">
                    <img src="../imageUser/<?= $_SESSION['foto'] ?>" class="foto">
                    <p><?= $_SESSION['nama_lengkap']; ?></p>
                </div>
            </div>
            <h2>Data User</h2>
            <a href="produk/crud/tambah_produk.php" class="tp">Tambah Produk</a>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Foto</th>
                    <th>Roles</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include '../koneksi.php';

                $query = mysqli_query($koneksi, "SELECT * FROM user");
                $no = 1;
                foreach ($query as $data) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_lengkap']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><img src="../imageUser/<?= $data["foto"] ?>" alt="" width="70px"></td>
                        <td><?php echo $data['roles']; ?></td>
                        <td>
                            <a href="crudUser/edit_user.php?id_user=<?= $data['id_user']; ?>">Edit</a>
                            <a href="crudUser/hapus_user.php?id_user=<?= $data['id_user']; ?>" onclick="return confirm('Yakin Mau dihapuss??')">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>