<?php
    session_start(); 
    $host="localhost";
    $user="root";
    $password="";
    $db="shopping";
    

    $link = mysqli_connect("localhost", "root", "", "shopping");


    if(isset($_POST['user_mail'])){

        function validate($data){

            $data = trim($data);

            $data = stripslashes($data);

            $data = htmlspecialchars($data);

            return $data;

         }



        $email= validate($_POST['user_mail']);
        $password= validate($_POST['user_password']);


        $sql="select * from user_info where user_mail='".$email."'AND user_password='".$password."' limit 1";

        $result=mysqli_query($link,$sql);

        if(mysqli_num_rows($result)===1){

            $row = mysqli_fetch_assoc($result);

            if ($row['user_mail'] === $email && $row['user_password'] === $password) {

                echo "Logged in!";

                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_mail'] = $row['user_mail'];
                $_SESSION['user_name'] = $row['user_name'];


                header("Location: Loggedin.php");

                exit();

            }
        }
        else{
            echo " You Have Entered Incorrect Password";
            exit();
        }

    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
<body>


    <div class="arkaplan alt-kenar-10">
        <div class="ust kapsayici">
            <div class="logo">
                <h1>Alışveriş</h1>
            </div>
            <div class="menu">
             
            </div>
        </div>
    </div>
    


    
    <div class="orta kapsayici" >
                    <div class="bolum1">
                    <form action="Login.php" method="post" class="form" role="form" >
                     <div class="uzunluk">
                            <label for = "email">Email: </label><input class="form-control" name="user_mail" id = "user_mail" type="text" required autofocus /><br /><br />
                           <label for = "password">Şifre: </label><input class="form-control" name="user_password" id = "user_password" type="password" required />
                    <br />
                    <br />
                    <br />
                    <a href="kayit.php">Kayit ol</a>
                    <br />
                    <br />
                    
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Giriş Yap</button>
                    </div>
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