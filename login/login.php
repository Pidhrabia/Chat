<?php
    include_once "../php/db.php";

    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $password = md5($pass);

    $result = $mysql->query("SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");
    $user = $result->fetch_assoc();

    if(isset($login)){
        if($login != $user['login'] || $password != $user['password']){
            $error = "Неправильний логін або пароль!";
        } else {
            setcookie('user', $user['login'], time() + 3600, "/");
            header("Location: ../index.php");
        }
    }

    $mysql->close();    
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
    <link rel="stylesheet" href="style/deer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis&family=Inter&display=swap" rel="stylesheet">
    <title>Авторизація</title>
</head>
<body>
    

    <form action="" method="post">
        <div class="wrapper">
                <div class="slider">
                    
                    <div class="slider-items"> <img src="../slider/img/slide_1.jpg" alt=""> </div>
                    <div class="slider-items"> <img src="../slider/img/slide_2.jpg" alt=""> </div>
                    <div class="slider-items"> <img src="../slider/img/slide_3.jpg" alt=""> </div>
                </div>

            <div class="content">
                <div class="reg">
                    <p class="title">Deer Chat</p>
                    <p class="error"><?php echo $error;?></p>
                    <input type="text" name="login" class="input" placeholder="Логін" autocomplete="off" required> 
                    <input type="password" name="pass" class="input" placeholder="Пароль" required> 
                    <button type="submit" class="button">Увійти</button>
                    <p class="reset"><a href="#" onclick="openbox('respass'); return false">Забули пароль?</a></p>
                </div>

                <div class="new-account">
                    <p class="create">Не маєте облікового запису? <a href="../sign_in/sign_in.php">Зареєструйтеся</a></p>
                </div>
            </div>
        </div>
    </form>

    <form action="" method="post">
        <div id="respass" class="respass" style="display: none;">
            <p class="e-title">Введіть Email для відновлення пароля</p>
            <input type="text" name="resetpass" autocomplete="off" required class="email-input">
            <button class="email-button">Відновити</button>
        </div>
    </form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../slider/js/main.js"></script>
    <script src="../slider/js/slick.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>