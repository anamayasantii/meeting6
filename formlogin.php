<?php
    include_once("konfigurasi.php");

    $psn = "";
    if(isset($_POST["txUSER"])){
        $user = $_POST["txUSER"];
        $pwd = $_POST["txPASS"];
            
        $sql = "SELECT tu.nama, tu.email, tu.username, tu.passkey, tu.iduser FROM tbuser tu WHERE tu.username='".$user."';";
        $cnn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME, DBPORT) or die("Gagal koneksi ke dbms");
        $hasil = mysqli_query($cnn, $sql);
        $jdata = mysqli_num_rows($hasil);
        if($jdata > 0){
        $h = mysqli_fetch_assoc($hasil);
        // echo "DEBUG:<br>Nama: ".$h["username"];
        if(md5($pwd) == $h["passkey"]){
            echo "DEBUG: Password sama";
        }else{
            $psn = "Akses ditolak";
        }
    }else{
        $psn = "Akses ditolak";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div><?=$psn;?></div>

<form action="formlogin.php" method="POST">
    <h3>Form Login</h3>
        <div>
            Username <br>
            <input type="text" name="txUSER">
        </div>
        <div>
            Password <br>
            <input type="password" name="txPASS">
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
</body>
</html>