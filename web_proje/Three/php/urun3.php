<?php
session_start();
$host="localhost";
$kullanici="root";
$password="";
$vt="shopping";


$baglanti = mysqli_connect($host, $kullanici, $password, $vt);
mysqli_set_charset($baglanti,"UTF8");    
$id = $_SESSION['user_id'];

if (isset($_POST['result']))
{
   
    $ekle = "INSERT INTO `user_urun` (`user_urun_id`, `urun_id`) VALUES ('$id', '3') ";
    mysqli_query($baglanti, $ekle);
    $adet_bul = "SELECT urun_adet FROM urun where urun_id = '3' ";
    $query = mysqli_query($baglanti,$adet_bul);
    
    $adet = mysqli_fetch_assoc($query);

    $urun_adet =$adet["urun_adet"]-1;
    


    $update_adet = "UPDATE urun SET urun_adet ='$urun_adet' Where urun_id = '3'";
    mysqli_query($baglanti,$update_adet);

    
        
    header("location:sepet.php");

    mysqli_close($baglanti);
}







?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa</title>
    <link href="/web_proje/Three/php/style.css" rel="stylesheet">
</head>
<body>

<div class="arkaplan">
    <div class="ust kapsayici">
        <div class="menu">
            <ul>


                <li><a href="sepet.php">Sepetim</a>
                <a href="logout.php">Çıkış</a> </li>
                


            </ul>
        </div>
    </div>
</div>


<!-- sayfa üstü-->
<div class="arkaplan alt-kenar-10">
    <div class="ortaust kapsayici">
        <div class="logo">
            <h1>Alışveriş</h1>
        </div>
        
    </div>
</div>

<!-- sayfa ortası-->
<div class="orta kapsayici">
    <div class="bolum4 urun">
        <a href="/web_proje/Three/html/porsche.html">
        <img src="/web_proje/jpg/Porsche_911.jpg" alt="Kapak resmi"  height="350">
        </a>
       <div class=urun_bilgi >
            <h1>Ürün adı:  porsche</h1>
            <h1>Ürün fiyatı: 400000 TL</h1>
            <h1>Kalan ürün adeti:
             <?php 
             $baglanti = mysqli_connect($host, $kullanici, $password, $vt);

             $getir = "SELECT urun_adet FROM `urun` WHERE urun_id = '3' " ;
                
             $yazdir = mysqli_query($baglanti, $getir);   
             if(!$yazdir){
                die(mysqli_error($baglanti));
             }
                if (mysqli_num_rows($yazdir) === 1) {
                    $rowData = mysqli_fetch_assoc($yazdir);
                        if($rowData["urun_adet"]>1){
                            echo $rowData["urun_adet"];
                            ?>
                            <form action="urun3.php" method="post" class="form" role="form" name="form">
                            <button class="btn btn-lg btn-primary btn-block"type="result" name="result">Satın al</button>
                            </form>
                            <?php
                            
                        }  
                        else
                         echo 'ürünümüz bulunmamakta';
                        
             }
            
            
            ?>
            </h1>
            
        </div>

        

        
        

    </div>
</div>




<!-- sayfa altı-->
<div class="arkaplan">
    <div class="alt kapsayici" style="height: 141px;">
        <div class="baglanti">
            <ul>
                <li style="border-bottom: solid 1px #FCB941"><a href="#">Ozan eliş</a></li>
                <li><a href="https://www.instagram.com/soren_kuleli/">Instagram</a></li>
                <li><a href="#">LinkedIn</a></li>
            </ul>
        </div>
        <div class="baglanti">
            <ul>
                <li style="border-bottom: solid 1px #FCB941"><a href="#">Oğuz Cum</a></li>
                <li><a href="https://www.instagram.com/oguz_cum/">Instagram</a></li>
                <li><a href="#">LinkedIn</a></li>

            </ul>
        </div>
    </div>
</div>


</body>
</html>