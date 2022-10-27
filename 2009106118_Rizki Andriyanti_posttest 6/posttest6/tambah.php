<?php

#diperlukan jika sumber beberapa syntax berada di file lain
require 'config.php';

#sambungan ke formulir.php
if(isset($_POST['Sign-Up'])){
    $nama = $_POST['nama'];
    $pw = $_POST['pw'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $ttl = $_POST['ttl'];

    $gambar = $_FILES['gambar']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));

    $newgambar = "$nama.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    if (move_uploaded_file($tmp, 'gambar/'.$newgambar)){
        $query = "INSERT INTO akun (nama,pw,email,nohp,ttl,gambar) VALUES ('$nama','$pw','$email','$nohp','$ttl','$newgambar')";
        $result = $db->query($query);

        #jika pengiriman berhasil
        if($result){
            echo "<script> alert('Data Berhasil Dikirim');</script>";
            header("Location:akun.php");
        } else { # jika pengiriman gagal
            echo "Sending Fail!";
        }
    }
}

?>