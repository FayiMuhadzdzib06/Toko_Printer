<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Printer</title>
</head>
<body>
    <h1>Selamat Datang Di Toko Printer</h1>
    <h4>Memiliki Berbagai Jenis Printer</h4>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Jenis Produk</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php 
        include '../koneksi.php';
            $query = mysqli_query($koneksi, "SELECT * FROM produk");
            $no = 1;
            foreach($query as $data){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_produk']; ?></td>
                    <td><?php echo "Rp. " . number_format($data['harga']) . " ,-" ?></td>
                    <td><?php echo $data['foto']; ?></td>
                    <td><?php echo $data['stok']; ?></td>
                    <td>
                        <a href="#">Detail</a>
                        <a href="#">Pesan</a>
                    </td>
                </tr>
                <?php
            }
            ?>
    </table>
    <a href="../akses/logout.php">Logout</a>
</body>
</html>