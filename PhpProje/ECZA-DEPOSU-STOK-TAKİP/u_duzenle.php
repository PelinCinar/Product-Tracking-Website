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
            padding: 20px;
            text-align: left;
            border-bottom: 5px solid #ddd;
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
    </style>
</head>
<body>
<a href="javascript:history.back()" class="back-button" style="position: fixed; top: 15px; right: 100px; background-color: orange; color: white; padding: 2px 10px; border-radius: 4px; border: 1px solid #45a049; text-decoration: none;">Geri</a>
<?php

$con = mysqli_connect("localhost", "root", "", "eczane1");

if(isset($_POST['duzenle'])) {
    if(isset($_POST['ID'])){
        $ID = $_POST['ID'];

        $query = "SELECT * FROM urun WHERE ID='$ID'";
        $result = mysqli_query($con, $query);
        
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $u_adi = $row['u_adi'];
            $u_adedi = $row['u_adedi'];
            $u_fiyati = $row['u_fiyati'];
        }
        else{
            echo "Kullanıcı bulunamadı!";
        }
    } else {
        echo "ID belirtilmedi!";
    }
}

if(isset($u_adi)) {
    ?>

    <form action="" method="POST">
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <label>Ürün Adı:</label>
        <input type="text" name="u_adi" value="<?php echo $u_adi; ?>"><br><br>
        <label>Ürün Adedi:</label>
        <input type="text" name="u_adedi" value="<?php echo $u_adedi; ?>"><br><br>
        <label>Ürün Fiyatı:</label>
        <input type="text" name="u_fiyati" value="<?php echo $u_fiyati; ?>">₺<br><br>
        <input type="submit" name="kaydet" value="Kaydet">
    </form>

    <?php
}

if(isset($_POST['kaydet'])) {

    if(isset($_POST['ID'], $_POST['u_adi'], $_POST['u_adedi'], $_POST['u_fiyati'])) {
        $ID = $_POST['ID'];
        $u_adi = $_POST['u_adi'];
        $u_adedi = $_POST['u_adedi'];
        $u_fiyati = $_POST['u_fiyati'];

        $query = "UPDATE urun SET u_adi='$u_adi', u_adedi='$u_adedi', u_fiyati='$u_fiyati' WHERE ID='$ID'";

        if (mysqli_query($con, $query)) {
            echo "Ürün güncelleme işlemi başarıyla gerçekleştirildi.";
            header("refresh:1;url=urun.php");
        } else {
            echo "Hata: " . mysqli_error($con);
        }
    }
    else{
        echo "Eksik bilgi!";
    }
}
mysqli_close($con);
?>
    <form action="index.html">
        <input type="submit" id="logoutBtn" value="Çıkış" onclick="return confirm('Emin misiniz?')"  style="position: fixed; top: 15px; right: 10px; background-color: red; color: white; padding: 2px 10px; border-radius: 4px; border: 1px solid #45a049; text-decoration: none;">
    </form>
</body>
</html>