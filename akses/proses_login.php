<?php 
    session_start();
    $koneksi = mysqli_connect('localhost', 'root', '', 'printer');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    $cek = mysqli_num_rows($login);

    if($cek > 0){
        $cek_pengguna = mysqli_fetch_assoc($login);
        
        if($cek_pengguna['roles'] == 'Admin'){
            $_SESSION['username'] = $username;
            $_SESSION['roles'] = 'Admin';
            $_SESSION['status']='login';
            header("location:../admin/index.php");
        }else if($cek_pengguna['roles'] == 'Customer'){
            $_SESSION['username'] = $username;
            $_SESSION['roles'] = 'Customer';
            $_SESSION['status']='login';
            header("location:../user/index.php");
        }
    }else{
        header("location:proses_login.php?pesan=gagal");
    }
    
?>