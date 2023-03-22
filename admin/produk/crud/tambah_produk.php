<?php 
    include '../../../koneksi.php';

    if(isset($_POST['submit'])){
        if(tambahProduk($_POST) > 0){
            ?>
            <script>
                // alert('Data Berhasil Ditambah!!');
                // window.location = '../../index.php';
            </script>
            <?php
        }else{
            ?>
            <!-- <script>
                alert('Data Gagal Ditambah!!');
                window.location = '../../index.php';
            </script> -->
            <?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ini deskripsi">
    <title>Halaman Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk">
        <br> <br>
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga">
        <br> <br>
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto">
        <br> <br>
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok">
        <br> <br>
        <label for="deskripsi">Deskripsi</label> <br>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
        <br> <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>