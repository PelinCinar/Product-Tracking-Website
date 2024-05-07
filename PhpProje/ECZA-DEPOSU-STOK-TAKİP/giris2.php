
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link
    href="https://fonts.googleapis.com/css2?family=Lisu+Bosa:wght@600;800&family=Poppins:wght@100;200;300;400;600;700&display=swap"
    rel="stylesheet"
  />
    <style>
    .hosgeldiniz {
        font-family: Arial, sans-serif;
        font-size: 24px;
        color: #4CAF50;
        background-color: #f2f2f2;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .basaririsiz{
      font-family: Arial, sans-serif;
        font-size: 24px;
        color: black;
        background-color: red;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    input[type="submit"] {
        display: inline-block;
        padding: 10px 20px;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: #fff;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .error-message {
    color: red; 
    font-weight: bold; 
}

    .button-container {
            text-align: center;
            margin-top: 50px; 
            padding: auto;
        }

       
     .card {
            display: inline-block;
            margin: 20px;
        }
</style>

</head>
<body>
<?php

$ID = $_POST["ID"];
$Sifre = $_POST["Sifre"];

$con=mysqli_connect("localhost","root","","eczane1");
$a=mysqli_query($con, "select * from calisan where ID='$ID' and Sifre='$Sifre'");

if (mysqli_num_rows($a)>0){

    while ($b = mysqli_fetch_Array($a)) {
        echo "<span class='hosgeldiniz'>" . $b["Ad"] . " - " . $b["Soyad"] . " Hoşgeldiniz</span>";
    }
}
else
{
  echo "<span class='basaririsiz'> KULLANICI ADI VEYA ŞİFRE HATALI !!!</span>";
  header("refresh:2;url=index.html");
  exit();
}
?>



<div class="container"> 
      
    
      <div class="card">
        <div class="imgBx">
        
            <img src="urun-duzenle.jpg" />
          </a>

         
          <p class="button-container">
          
          <form action="urun.php" method="POST">
          <input type="submit" value="ÜRÜNLERİ DÜZENLE">
          </form>

          Ürünleri kaydetme, silme ve düzenleme işlemlerinin yapıldığı yer.
          </p>
        
        </div>
      </div>

      <div class="card">
        <div class="imgBx">
          
            <img src="stok-takip.jpg" />
          </a>

          
          <p class="button-container">
          <form action="stok_takip.php" method="POST">
          <input type="submit" value="STOK TAKİP">
          </form>
          Stoktaki ürünlerin güncel durumunun listelendiği yer.
           
          </p>
        
        </div>
      </div>

  
      <form action="index.html">
        <input type="submit" id="logoutBtn" value="Çıkış" onclick="return confirm('Emin misiniz?')"  style="position: fixed; top: 7px; right: 6px; background-color: red; color: white; padding: 2px 10px; border-radius: 4px; border: 1px solid #45a049; text-decoration: none;">
    </form>

</body>
</html>