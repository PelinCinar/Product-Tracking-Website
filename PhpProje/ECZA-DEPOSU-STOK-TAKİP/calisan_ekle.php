<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .warning {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>

</head>
<body>
<?php

$Ad = $_POST["c_Isim"];
$Soyad = $_POST["c_Soyisim"];
$Sifre = $_POST["c_Sifre"];

$con=mysqli_connect("localhost","root","","eczane1");

if(isset($_POST["onay"])){

    if(!empty($Ad) && !empty($Soyad) && !empty($Sifre)){
        mysqli_query($con,"insert into calisan(Ad,Soyad,Sifre) values('$Ad','$Soyad','$Sifre')");
        echo "<div class='message success'>Yeni çalışan ekleme işlemi başarıyla gerçekleştirildi.</div>";
        header("refresh:1.5;url=calisan.php");
    } 
    else{
        echo "<div class='message error'>HİÇBİR ALAN BOŞ GEÇİLEMEZ!</div>";
        header("refresh:1;url=calisan.php");
    }
}
else{
    echo "<div class='message warning'>ONAY GEREKLİ!</div>";
    header("refresh:2;url=calisan.php");
}
?>

</body>
</html>