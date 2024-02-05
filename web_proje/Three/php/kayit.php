<?php
session_start();

$host="localhost";
$kullanici="root";
$password="";
$vt="shopping";


$baglanti = mysqli_connect($host, $kullanici, $password, $vt);


$username_err="";
$email_err="";
$parola_err="";
$parolatkr_err="";


if (isset($_POST["kaydet"])) {
    //kullanıcı adı kontrol
    if (empty($_POST["user_name"])) {
        $username_err = "Kullanıcı adı boş bırakılamaz.";
    } else if (strlen($_POST["user_name"]) < 2) {
        $username_err = "Kullanıcı adı en az 2 karakterden oluşmalıdır.";
    }
    else {
        $user_name = $_POST["user_name"];
    }

    //email kontrol
    if (empty($_POST["user_mail"])) {
        $email_err = "Email boş bırakılamaz.";
    } else if (!filter_var($_POST["user_mail"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Geçersiz email.";
    } else {
        $user_mail = $_POST["user_mail"];
    }

    //parola kontrol
    if (empty($_POST["user_password"])) {
        $parola_err = "Parola boş bırakılamaz.";
    } else if (strlen($_POST["user_password"]) < 4) {
        $parola_err = "Parola en az 4 karakterden oluşmalıdır.";
    } else {
        $user_password = ($_POST["user_password"]);
    }

    if (empty($_POST["parolatkr"])) {
        $parolatkr_err = "Parolayı tekrar giriniz.";
    } else if ($_POST["user_password"] != $_POST["parolatkr"]) {
        $parolatkr_err = "Parolalar aynı değil.";
    } else {
        $parolatkr = $_POST["parolatkr"];
    }


    if (isset($user_name) && isset($user_mail) && isset($user_password)) {


        $ekle = "INSERT INTO user_info (user_name, user_mail, user_password) VALUES ('$user_name', '$user_mail', '$user_password')";
        $calistir = mysqli_query($baglanti, $ekle);

        if ($calistir) {
            
              
            echo '<div class="alert alert-success" role="alert">
             Başarılı bir şekilde eklendi!
             </div>';
            sleep(0.5);
            header("location:ana_sayfa.php");
        } else {
            echo '<div class="alert alert-danger" role="alert">
             Bir problem oluştu..
            </div>';
        }
        
        mysqli_close($baglanti);





}
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kayıt Sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>




</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kayıt Sayfası</title>
</head>
<body>


<div class="arkaplan alt-kenar-10">
    <div class="ust kapsayici">
        <div class="logo">
            <h1>Uçuş</h1>
        </div>
        <div class="menu">

        </div>
    </div>
</div>




<div class="orta kapsayici" >
    <div class="container p-5">
        <div class="card p-5">

            <form action="kayit.php" method="post">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control
                 <?php
                    if(!empty($username_err))
                    {
                        echo "is-invalid";
                    }
                    ?>" id="exampleInputEmail1" name="user_name">
                    <div class="invalid-feedback">
                        <?php echo $username_err ?>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" class="form-control
                 <?php
                    if(!empty($email_err))
                    {
                        echo "is-invalid";
                    }
                    ?>" id="exampleInputEmail1" name="user_mail">
                    <div class="invalid-feedback">
                        <?php echo $email_err ?>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Şifre</label>
                    <input type="password" class="form-control
                 <?php
                    if(!empty($parola_err))
                    {
                        echo "is-invalid";
                    }
                    ?>" id="exampleInputPassword1" name="user_password">
                    <div class="invalid-feedback">
                        <?php echo $parola_err ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Şifre Tekrar</label>
                    <input type="password" class="form-control
                 <?php
                    if(!empty($parolatkr_err))
                    {
                        echo "is-invalid";
                    }
                    ?>" id="exampleInputPassword1" name="parolatkr">
                    <div class="invalid-feedback">
                        <?php echo $parolatkr_err ?>
                    </div>
                </div>


                <button type="submit" name="kaydet" class="btn btn-primary">Kaydet</button>
            </form>
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