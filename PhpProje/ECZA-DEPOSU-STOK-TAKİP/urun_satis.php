

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Satışı</title>

    <style>
        body {

            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
               }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        form {
            margin-top: 20px;
        }
        input[type="number"] {
            width: 100px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #45a049;
        }
        tr:first-child  {
        background-color: #FF5733;
        color:white;
        text:bold;
        }
    </style>
</head>
<body>

<?php

$con = mysqli_connect("localhost", "root", "", "eczane1");


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['satis'])) {

    $urun_id = $_POST['ID'];


    $adet = isset($_POST['adet']) ? $_POST['adet'] : '';

    if ($adet == '') {
        $query = "SELECT * FROM urun WHERE ID='$urun_id'";
        $result = mysqli_query($con, $query);
        $urun = mysqli_fetch_assoc($result);

        echo "<h2>ÜRÜN BİLGİLERİ</h2>";
        echo "<table border='2'>";
        echo "<tr><td>ID</td><td>Ürün Adı</td><td>Ürün Adedi</td><td>Fiyatı</td></tr>";
        echo "<tr>";
        echo "<td>" . $urun['ID'] . "</td>";
        echo "<td>" . $urun['u_adi'] . "</td>";
        echo "<td>" . $urun['u_adedi'] . "</td>";
        echo "<td>" . $urun['u_fiyati']. '₺' . "</td>";
        echo "</tr>";
        echo "</table>";
    } else {

        $query = "SELECT * FROM urun WHERE ID='$urun_id'";
        $result = mysqli_query($con, $query);
        $urun = mysqli_fetch_assoc($result);

        $fiyat = $urun['u_fiyati'];
        $tutar = $adet * $fiyat;

        $query = "UPDATE urun SET u_adedi = u_adedi - $adet WHERE ID='$urun_id'";
        if (mysqli_query($con, $query)) {
            echo "<h2>ÜRÜN SATIŞ DETAYLARI</h2>";
            echo "<table border='1'>";
            echo "<tr><td>Ürün Adı</td><td>Satılan Ürün Adedi</td><td>Fiyatı</td><td>Toplam Tutar</td></tr>";
            echo "<tr>";
            echo "<td>" . $urun['u_adi'] . "</td>";
            echo "<td>" . $adet . "</td>";
            echo "<td>" . $fiyat . "₺</td>";
            echo "<td>" . $tutar . "₺</td>";
            echo "</tr>";
            echo "</table>";
        }
    }
}
?>

<h2>Ürün Satışı</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="ID" value="<?php echo $_POST['ID']; ?>">
    <label for="adet">Satış Adedi:</label>
    <input type="number" name="adet" min="1" required><br>
    <input type="submit" name="satis" value="Satış Yap">
</form>

<form action="urun.php" method="get">
        <button type="submit" style="position: fixed; cursor:pointer; top: 270px; right: 30px; background-color:black; color: white; padding: 10px 10px; border-radius: 4px; border: 1px solid #45a049; text-decoration: none;"> Tabloya Dön</button>
</form>
<form action="index.html">
        <input type="submit" id="logoutBtn" value="Çıkış" onclick="return confirm('Emin misiniz?')"  style="position: fixed; top: 15px; right: 10px; background-color: red; color: white; padding: 2px 10px; border-radius: 4px; border: 1px solid #45a049; text-decoration: none;">
</form>

</body>
</html>
