<?php
    include("konfigurasi.php");

    $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS);
    if($cnn){
        echo "Koneksi Sukses";
        $sql1 = "CREATE DATABASE " . DBNAME;
        
        $hasil = mysqli_query($cnn, $sql1);
        
        if($hasil){
            echo "Database " . DBNAME . " Berhasil dibuat";
        }else{
            echo "Database " . DBNAME . " gagal dibuat";
        }

    }else{
        echo "Koneksi Gagal<br>" . mysqli_connect_error();
    }