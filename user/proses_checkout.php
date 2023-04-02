<?php
include '../koneksi.php';
$id = $_GET['id_produk'];
$qty = $_POST['qty'];

if (isset($_POST['checkout'])) {
    if (checkout($_POST) > 0) {
        if (pesanProduk($id, $qty) > 0) {
            $_SESSION["cart"][$id] = $qty;
        ?>
            <script>
                alert("Yeayyy!! Barang berhasil dipesan, silahkan ditunggu proses verifikasinya ya");
                window.location = 'index.php';
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Barang Gagal Dipesan!!');
                window.location = 'index.php';
            </script>
        <?php
        }
    } else {
        echo mysqli_error($koneksi);
    }
}


?>