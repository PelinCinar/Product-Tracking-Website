<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        button {
            background-color: #f44336;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
<a href="javascript:history.back()" class="back-button" style="position: fixed; top: 1px; left: 10px; background-color: orange; color: white; padding: 2px 10px; border-radius: 4px; border: 1px solid #45a049; text-decoration: none;">Geri</a>
<?php

$con = mysqli_connect("localhost", "root", "", "eczane1");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['onay']) && $_POST['onay'] == 'onay') {
    $urun_id = $_POST['ID'];

    $sorgu = "DELETE FROM urun WHERE ID='$urun_id'";
    if (mysqli_query($con, $sorgu)) {
        echo "Ürün başarıyla silindi.";
        header("refresh:2;url=urun.php");
        exit;
    } else {
        echo "Ürün silinirken bir hata oluştu: " . mysqli_error($con);
    }
} else {
   
}

if (isset($_POST['ID'])) {
    $urun_id = $_POST['ID'];
    $sorgu = "SELECT * FROM urun WHERE ID='$urun_id'";
    $result = mysqli_query($con, $sorgu);
    $urun = mysqli_fetch_assoc($result);

    echo "<h2>SİLİNECEK ÜRÜNÜN BİLGİLERİ</h2>";
    echo "<table border='2'>";
    echo "<tr><th>ID</th><th>Ürün Adı</th><th>Ürün Adedi</th><th>Fiyatı</th></tr>";
    echo "<tr>";
    echo "<td>" . $urun['ID'] . "</td>";
    echo "<td>" . $urun['u_adi'] . "</td>";
    echo "<td>" . $urun['u_adedi'] . "</td>";
    echo "<td>" . $urun['u_fiyati'] . "</td>";
    echo "</tr>";
    echo "</table>";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="ID" value="<?php echo $urun['ID']; ?>">
    <input type="hidden" name="onay" value="onay">
    <button type="submit" onclick="return confirm('Bu ürünü silmek istediğinizden emin misiniz?');">Sil</button>
</form>

</body>
</html>