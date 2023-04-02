<?php 
    // echo __DIR__;
    session_start();
    $koneksi = mysqli_connect('localhost', 'root', '', 'printer');

    function query($query){
        global $koneksi;

        $result = mysqli_query($koneksi, $query);
        $rows = [];

        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }

    // proses checkout
    function checkout($data){
        global $koneksi;

        foreach($_SESSION["cart"] as $product_id => $result){
            $barang = query("SELECT * FROM produk WHERE id_produk = '$product_id'")[0];
            $total_harga = $result * $barang["harga"];
            $tanggal = $data["tgl_transaksi"];
            $alamat = $data["alamat"];
            $no_wa = $data["no_wa"];
            $nama_lengkap = $data["nama_lengkap"];
            $nama_produk = $data["nama_produk"];
            $harga = $data["harga"];
            $price = $total_harga;
            $foto = $data["foto"];
            $st = 'proses';

            // Masukin ke database
            $query_checkout = "INSERT INTO transaksi VALUES(
                NULL,
                '$tanggal',
                '$alamat',
                '$no_wa',
                '$nama_lengkap',
                '$nama_produk',
                '$harga',
                '$price',
                '$foto',
                '$st'
            )";

            mysqli_query($koneksi, $query_checkout);
        }
        return mysqli_affected_rows($koneksi);
    }

    // pesan produk
    function pesanProduk($id, $stok){
        global $koneksi;

        $stok = $_POST['qty'];
    
        $query = "UPDATE produk SET stok = stok - '$stok' WHERE id_produk='$id'";
        mysqli_query($koneksi, $query);
    
        return mysqli_affected_rows($koneksi);
    }

    // register dan crud user
    function tambahUser($data){
        global $koneksi;

        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $foto = $_FILES['foto']['name'];
        $files = $_FILES['foto']['tmp_name'];
        $roles = htmlspecialchars($data['roles']);
        
        $query = "INSERT INTO user VALUES('', '$nama_lengkap', '$username', '$password', '$foto', '$roles')";
        move_uploaded_file($files, "C:/xampp/htdocs/TokoPrinter/imageUser/".$foto);

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
    
    function hapusUser($id){
        global $koneksi;

        $query = "DELETE FROM user WHERE id_user='$id'";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
    function updateUser($data){
        global $koneksi;

        $id = htmlspecialchars($data['id_user']);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $username = $data['username'];
        $password = $data['password'];
        $foto = $_FILES['foto']['name'];
        $files = $_FILES['foto']['tmp_name'];
        $roles = $data['roles'];

        if(empty($foto)){ // empty = buat ngecek klo isi variable trsbt kosong / gak ada isinya, klo gak ada isinya bakal diisi dengan nilai TRUE klo ada isinya diisi dengan nilai FALSE
            $query = "UPDATE user SET nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', roles = '$roles' WHERE id_user = '$id'";
            mysqli_query($koneksi, $query);
        }else{
            $query = "UPDATE user SET nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', foto = '$foto', roles = '$roles' WHERE id_user = '$id'";
            move_uploaded_file($files, "C:/xampp/htdocs/TokoPrinter/imageUser/".$foto);
            mysqli_query($koneksi, $query);
        }

        return mysqli_affected_rows($koneksi);
    }

    // crud produk
    function tambahProduk($data){
        global $koneksi;

        $nama_produk = htmlspecialchars($data['nama_produk']);
        $harga = $data['harga'];
        $foto = $_FILES['foto']['name'];
        $files = $_FILES['foto']['tmp_name'];
        $stok = $data['stok'];
        $deskripsi = htmlspecialchars($data['deskripsi']);
        
        $query = "INSERT INTO produk VALUES('', '$nama_produk', '$harga', '$foto', '$stok', '$deskripsi')";
        move_uploaded_file($files, "C:/xampp/htdocs/TokoPrinter/imageProduk/" . $foto);

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function hapusProduk($id){
        global $koneksi;

        $query = "DELETE FROM produk WHERE id_produk='$id'";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function updateProduk($data){
        global $koneksi;

        $id = htmlspecialchars($data['id_produk']);
        $nama_produk = htmlspecialchars($data['nama_produk']);
        $harga = $data['harga'];
        $foto = $_FILES['foto']['name'];
        $files = $_FILES['foto']['tmp_name'];
        $stok = $data['stok'];
        $deskripsi = htmlspecialchars($data['deskripsi']);

        if(empty($foto)){ // empty = buat ngecek klo isi variable trsbt kosong / gak ada isinya
            $query = "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga', stok = '$stok', deskripsi = '$deskripsi' WHERE id_produk = '$id'";
            mysqli_query($koneksi, $query);
        }else{
            $query = "UPDATE produk SET nama_produk = '$nama_produk', harga = '$harga', foto = '$foto', stok = '$stok', deskripsi = '$deskripsi' WHERE id_produk = '$id'";
            move_uploaded_file($files, "C:/xampp/htdocs/TokoPrinter/imageProduk/".$foto);
            mysqli_query($koneksi, $query);
        }

        return mysqli_affected_rows($koneksi);
    }
?>