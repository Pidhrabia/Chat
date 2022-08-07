<?php
    include_once "../php/db.php";

    $login = $_POST['login'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];

    $result = $mysql->query("SELECT * FROM `user` WHERE `login` = '$login' OR `email` = '$email'");
    $user = $result->fetch_assoc();
    
    if(isset($login)){
        if(mb_strlen($login) < 3){
            $error = "Логін повинен містити більше 3 символів";
        } elseif(mb_strlen($login) > 90){
            $error = "Логін повинен містити менше 90 символів";
        } else {
            if($login == $user['login']){
                $error = "Користувач з таким лоігном вже існує";
            } else {
                if($email == $user['email']){
                    $error = "Користувач з таким Email вже існує";
                }else{  
                    if(mb_strlen($pass) < 6){
                        $error = "Пароль повинен містити більше 6 символів";
                    }elseif(mb_strlen($pass) > 90){
                        $error = "Пароль повинен містити менше 90 символів";
                    }else{
                        if($pass != $confirm_pass){
                            $error = "Паролі не співпадають";
                        }else{
                            $password = md5($pass);
                            $mysql->query("INSERT INTO `user` (`login`, `email`, `password`, `temp`) VALUES ('$login', '$email', '$password', '$pass')");
                            $mysql->close();
                            header("location: ../index.php");
                        }
                    }
                }
            }
        }
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../logo/favico.png">
    <link rel="stylesheet" href="../slider/style/slick.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/media.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Inter&display=swap" rel="stylesheet">
    <title>Реєстрація</title>
</head>
<body>
    <form action="sign_in.php" method="post">
        <div class="wrapper">
                <div class="slider">
                    <div class="slider-items"> <img src="../slider/img/slide_1.jpg" alt="" class="img"> </div>
                    <div class="slider-items"> <img src="../slider/img/slide_2.jpg" alt="" class="img"> </div>
                    <div class="slider-items"> <img src="../slider/img/slide_3.jpg" alt="" class="img"> </div>
                </div>

            <div class="content">
                <div class="reg">
                    <p class="title">Deer Chat</p>
                    <p class="error"><?echo $error;?></p>
                    <div class="form-input">
                        <input type="text" name="login" placeholder="Логін" required> 
                        <input type="email" name="email" placeholder="Ел. пошта" required> 
                        <input type="password" name="pass" placeholder="Пароль" required> 
                        <input type="password" name="confirm_pass" placeholder="Підтвердіть пароль" required>
                        <button type="submit">Зареєструватися</button>
                    </div>
                    
                </div>

                <div class="new-account">
                    <p class="create">Вже маєте акаунт? <a href="../login/login.php">Увійти</a></p>
                </div>
            </div>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../slider/js/main.js"></script>
    <script src="../slider/js/slick.min.js"></script>
</body>
</html>