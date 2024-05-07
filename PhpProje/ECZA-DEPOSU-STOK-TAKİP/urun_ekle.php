<?php

$u_adi = $_POST["u_adi"];
$u_adedi = $_POST["u_adedi"];
$u_fiyati = $_POST["u_fiyati"];

$con=mysqli_connect("localhost","root","","eczane1");

if(!empty($u_adedi) && !empty($u_adi) && !empty($u_fiyati)){

    $c=mysqli_query($con, "select * from urun");

    while ($kntrl=mysqli_fetch_array($c)){
        if($u_adi==$kntrl['u_adi']){
            echo"BU ÜRÜN ZATEN MEVCUT"; 
            header("refresh:2;url=urun.php");
            exit();
        }
    }
    mysqli_query($con,"insert into urun(u_adi,u_adedi,u_fiyati) values('$u_adi','$u_adedi','$u_fiyati')");
    echo "Yeni ürün başarıyla eklendi";
    header("refresh:2;url=urun.php");
}
else{
    echo "HİÇBİR ALAN BOŞ GEÇİLEMEZ!!!";
    header("refresh:1;url=urun.php");
}
    
?>
