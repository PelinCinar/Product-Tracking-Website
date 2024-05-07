<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-family: "Poppins", sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-family: "Poppins", sans-serif;
        }
        th, td {
            padding: 5px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-family: "Poppins", sans-serif;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        form {
            margin-top: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 50%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        tr:first-child  {
        background-color: #FF5733;
        }
    </style>
</head>

<body>
<?php
$con=mysqli_connect("localhost","root","","eczane1");
$b=mysqli_query($con, "select * from calisan");
echo "<h2>ÇALIŞANLARIN GÜNCEL LİSTESİ </h2>";
echo "</br></br>";

echo "<table border='3'> <!-- Boşlukları burada sıfıra indirme -->
    <tr>
        <td align='center'>ID</td><td align='center'>AD</td><td align='center'>SOYAD</td><td align='center'>Sifre</td>
        <td align='center'>DÜZENLE</td><td align='center'>SİL</td>
    </tr>";

while ($deger = mysqli_fetch_array ($b)) { 
    echo "<tr>
        <td>".$deger['ID']."</td>
        <td>".$deger['Ad']."</td>
        <td>".$deger['Soyad']."</td>
        <td>".$deger['Sifre']."</td>
        <td> <form action='c_duzenle.php' method='POST'>
                <input type='hidden' name='ID' value='".$deger['ID']."'>
                <input type='submit' name='duzenle' value='DUZENLE'>
            </form></td>
        <td> <form action='c_sil.php' method='POST' onsubmit='return confirm(\"Emin misiniz?\");'>
                <input type='hidden' name='ID' value='".$deger['ID']."'>
                <input type='submit' name='sil' value='SİL'>
            </form></td>
        </tr>";
}
echo "</table>";
echo "</br>";
?>

<h2>Yeni Çalışan Ekleme</h2>

<form action="calisan_ekle.php" method="post">
    Adi: <input type="text" name="c_Isim"><br>
    Soyadi: <input type="text" name="c_Soyisim"><br>
    Sifre: <input type="text" name="c_Sifre"><br>
    <input type="checkbox" name="onay"> ONAYLIYORUM<br>
    <input type="submit" value="EKLE">
</form>
<form action="index.html">
    <input type="submit" id="logoutBtn" value="Çıkış" onclick="return confirm('Emin misiniz?')"  style="position: fixed; top: 15px; right: 10px; background-color: red; color: white; padding: 2px 10px; border-radius: 4px; border: 1px solid #45a049; text-decoration: none;">
</form>

</body>
</html>