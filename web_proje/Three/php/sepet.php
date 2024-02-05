<?php

session_start();

$host = "localhost";
$kullanici = "root";
$password = "";
$vt = "shopping";

$baglanti = mysqli_connect($host, $kullanici, $password, $vt);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['erase'])) {
    $user_id = $_SESSION['user_id'];
    $urun_id = $_POST['urun_id'];
    $urun_name = $_POST['urun_name'];
    $islem_id = $_POST['islem_id'];
    $user_name = $_SESSION['user_name'];

    // user_urun tablosundan ilgili kaydı sil
    $silme_sorgusu = "DELETE FROM user_urun WHERE islem_id = $islem_id";
    
    $silme_sonuc = mysqli_query($baglanti, $silme_sorgusu);

    
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
                <li>

                <a href="Loggedin.php">Ana Sayfa</a>
                <a href="logout.php">Çıkış</a> 
            </li>


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
    <div class="bolum1">
        
       <?php
        $user_id = $_SESSION['user_id'];
        $bool =1;
            
        
        
        
            $yazdir = "SELECT * FROM `urun`,`user_urun` WHERE `urun`.`urun_id` = `user_urun`.`urun_id` AND `user_urun_id` = '$user_id' "; 
            
            $hepsiniyazdir = mysqli_query($baglanti,$yazdir);

            if(!$hepsiniyazdir){

                die(mysqli_error($baglanti));
                $bool = 0;
            }

              $sayi = mysqli_num_rows($hepsiniyazdir);


            while ($sayi>= 1) {
                

                $rowData = mysqli_fetch_assoc($hepsiniyazdir);
                
                
                $foto=$rowData["urun_foto"];    
                    
                    ?>
                    <div class="bolum4">
                    <img src="<?php echo $foto ;  ?>"alt="Kapak resmi"  height="350">
                    <h1>
                
                    
                    <?php
                
                    echo 'işlem numaranız: '.$rowData["islem_id"]. '<br>';
                    echo 'Ürün numaranız: '.$rowData["urun_id"]. '<br>';
                    echo 'Ürün adı: '.$rowData["urun_name"]. '<br>';
                    echo 'Ürün ücreti: '.$rowData["urun_fiyat"] ;
           
                    ?></h1>   
                <form method="POST" action="">
    <input type="hidden" name="urun_id" value="<?php echo $rowData["urun_id"]; ?>">
    <input type="hidden" name="urun_name" value="<?php echo $rowData["urun_name"]; ?>">
    <input type="hidden" name="islem_id" value="<?php echo $rowData["islem_id"]; ?>">
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="erase">ürünü sil</button>
</form>
                
                
                </div>    <?php
             
                    $sayi -=1;
            }   
             
        
        
            ?>



            



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