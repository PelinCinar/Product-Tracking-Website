<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Lisu+Bosa:wght@600;800&family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet"/>
 
  <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 5px;
            text-align: center;
            border-bottom: 1px solid #ddd;
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
        #logoutBtn {
            background-color: #FF5733;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>

</head>
<body>
<a href="javascript:history.back()" class="back-button" style="position: fixed; top: 15px; right: 100px; background-color: orange; color: white; padding: 2px 10px; border-radius: 4px; border: 1px solid #45a049; text-decoration: none;">Geri</a>

<?php

$con=mysqli_connect("localhost","root","","eczane1");
$b=mysqli_query($con, "select * from urun");

echo "<h1 style='text-align: center;'>STOKTAKİ ÜRÜNLER</h1>";

echo "<table border='3'>
<tr>
    <td>ID</td><td>Ürün adı</td><td>Ürün adedi</td><td>Fiyatı</td>
</tr>";

while ($deger = mysqli_fetch_array ($b)) { 
    echo "<tr>
        <td>" . $deger['ID'] . "</td>
        <td>" . $deger['u_adi'] . "</td>
        <td>" . $deger['u_adedi'] . "</td>
        <td>" . $deger['u_fiyati'] . '₺' . "</td>
        </tr>";
}
echo "</table>";
?>

<form action="index.html">
    <input type="submit" id="logoutBtn" value="Çıkış" onclick="return confirm('Emin misiniz?')" style="position: fixed; top: 15px; right: 10px; background-color: red; color: white; padding: 2px 10px; border-radius: 4px; border: 1px solid #45a049; text-decoration: none;">
</form>


</body>
</html>