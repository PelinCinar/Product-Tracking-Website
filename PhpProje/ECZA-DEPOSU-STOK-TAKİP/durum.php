<?php
$ID = $_POST["c_ID"];
$Ad = $_POST["c_Isim"];
$Soyad = $_POST["c_Soyisim"];
$Sifre = $_POST["c_Sifre"];

$con=mysqli_connect("localhost","root","","eczane1");
$b=mysqli_query($con, "select * from calisan");

if(!empty($ID) &&!empty($Ad) &&!empty($Soyad) &&!empty($Sifre)){
    $a = mysqli_query($con, "insert into calisan(ID,Ad,Soyad,Sifre) values('$ID','$Ad','$Soyad','$Sifre')");

    echo "<table border = '3'>
<tr>
    <td>ID</td><td>İsim</td><td>Soyisim</td><td>Sifre</td>
</tr>";

while ($deger = mysqli_fetch_array ($b)) { 
    echo "<tr>
        <td>" . $deger['ID'] . "</td>
        <td>" . $deger['Ad'] . "</td>
        <td>" . $deger['Soyad'] . "</td>
        <td>" . $deger['Sifre'] . "</td>
        </tr>";
}
echo "</table>";
}else{
    echo "HİÇBİR ALAN BOŞ GEÇİLEMEZ!!!";
    header("Refresh:1;url=calisan_ekle.php");
}
?>