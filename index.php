<?php
    if($_COOKIE['user'] == ''){
        header("Location: login/login.php");
    }else{
        $login = $_COOKIE['user'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="logo/favico.png">
    <title>Головна</title>
</head>
<body>
    <p><?php echo $login;?></p>

    <a href="sign_in/sign_in.php">Зареєструватися</a>
    <br>
    <a href="login/login.php">Увійти</a>
    <br>
    <a href="php/exit.php">Вийти</a>
</body>
</html>