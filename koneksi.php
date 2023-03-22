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

    function updateUser($data){
        global $koneksi;

        $id = htmlspecialchars($data['id_user']);
        $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $foto = $_FILES['foto']['name'];
        $files = $_FILES['foto']['tmp_name'];
        $roles = htmlspecialchars($data['roles']);

        if(empty($foto)){ // empty = buat ngecek klo isi variable trsbt kosong / gak ada isinya
            $query = "UPDATE user SET nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', roles = '$roles' WHERE id_user = '$id'";
            mysqli_query($koneksi, $query);
        }else{
            $query = "UPDATE user SET nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', foto = '$foto', roles = '$roles' WHERE id_user = '$id'";
            move_uploaded_file($files, "image/".$foto);
            mysqli_query($koneksi, $query);
        }

        return mysqli_affected_rows($koneksi);
    }
?>