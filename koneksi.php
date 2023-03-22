<?php 
    // echo __DIR__;
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

    // register
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