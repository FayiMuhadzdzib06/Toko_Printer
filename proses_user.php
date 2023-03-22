<?php 
    include 'koneksi.php';

    $nama_lengkap = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roles = $_POST['roles'];

    $query = mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nama_lengkap', '$username', '$password', '$roles')");

    if($query){
        ?>
        <script>
            alert('Data Berhasil Ditambah!!');
            window.location = 'index.php';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('Data Gagal Ditambah!!');
            window.location = 'tambah_user.php';
        </script>
        <?php
    }

?>