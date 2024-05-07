<?php

$con = mysqli_connect("localhost", "root", "", "eczane1");

if(isset($_POST['sil'])) {
    
    if(isset($_POST['ID'])) {
        $ID = $_POST['ID'];

        $sorgu = "delete from calisan where ID='$ID'";

        if (mysqli_query($con, $sorgu)) {
            echo "Çalışan silme işlemi başarıyla gerçekleştirildi.";
            header("refresh:2;url=calisan.php");
        } else {
            echo "Hata: " . mysqli_error($con);
        }
    }
    else {
        echo "BİR HATA OLUŞTU DAHA SONRA TEKRAR DENEYİNİZ!";
        header("refresh:2;url=calisan.php");
    }
}
?>
