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
    <h2>DÜZENLENECEK ÇALIŞANIN BİLGİLERİ</h2>
<?php

$con = mysqli_connect("localhost", "root", "", "eczane1");

if(isset($_POST['duzenle'])) {

    if(isset($_POST['ID'])) {
        $ID = $_POST['ID'];

        $query = "SELECT * FROM calisan WHERE ID='$ID'";
        $result = mysqli_query($con, $query);
        
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $ad = $row['Ad'];
            $soyad = $row['Soyad'];
            $sifre = $row['Sifre'];
        } else {
            echo "Kullanıcı bulunamadı!";
        }
    }
    else {
        echo "ID belirtilmedi!";
    }
}

if(isset($ad)) {
    ?>
    <form action="" method="POST">
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <label>Ad:</label>
        <input type="text" name="ad" value="<?php echo $ad; ?>"><br><br>
        <label>Soyad:</label>
        <input type="text" name="soyad" value="<?php echo $soyad; ?>"><br><br>
        <label>Şifre:</label>
        <input type="text" name="sifre" value="<?php echo $sifre; ?>"><br><br>
        <input type="submit" name="kaydet" value="Kaydet">
    </form>
    <?php
}

if(isset($_POST['kaydet'])) {

    if(isset($_POST['ID'], $_POST['ad'], $_POST['soyad'], $_POST['sifre'])) {
        $ID = $_POST['ID'];
        $ad = $_POST['ad'];
        $soyad = $_POST['soyad'];
        $sifre = $_POST['sifre'];

        $query = "UPDATE calisan SET Ad='$ad', Soyad='$soyad', Sifre='$sifre' WHERE ID='$ID'";

        if (mysqli_query($con, $query)) {
            echo "Çalışan düzenleme işlemi başarıyla gerçekleştirildi.";
            header("refresh:1.5;url=calisan.php");
        } else {
            echo "Hata: " . mysqli_error($con);
        }
    } else {
        echo "Eksik bilgi!";
    }
}
mysqli_close($con);
?>
</body>
</html>